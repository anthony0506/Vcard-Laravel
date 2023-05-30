<?php

namespace App\Repositories;

use App\Mail\AppointmentMail;
use App\Mail\UserAppointmentMail;
use App\Models\ScheduleAppointment;
use Illuminate\Support\Facades\Mail;
use Stripe\Checkout\Session;
use Symfony\Component\HttpKernel\Exception\UnprocessableEntityHttpException;

/**
 * Class AppointmentRepository
 */
class AppointmentRepository extends BaseRepository
{
    /**
     * @return string
     */
    public function model()
    {
        return ScheduleAppointment::class;
    }

    public function getFieldsSearchable()
    {
        //
    }

    /**
     * @param $appointment
     * @param $userId
     * @param $vcard
     * @param $input
     * @return array
     */
    public function userCreateSession($userId, $vcard, $input)
    {
        try {
            setUserStripeApiKey($userId);

            $successUrl = route('user.payment-success');
            $cancelUrl = route('user.failed-payment');

            $session = Session::create([
                'payment_method_types' => ['card'],
                'customer_email' => $input['email'],
                'line_items' => [
                    [
                        'price_data' => [
                            'product_data' => [
                                'name' => $vcard->name,
                            ],
                            'unit_amount' => $input['amount'] * 100,
                            'currency' => $input['currency_code'],
                        ],
                        'quantity' => 1,
                    ],
                ],
                'client_reference_id' => $vcard->id,
                'mode' => 'payment',
                'success_url' => url($successUrl).'?session_id={CHECKOUT_SESSION_ID}&vcard_id='.$vcard->id,
                'cancel_url' => url($cancelUrl.'?error=payment_cancelled&vcard_id='.$vcard->id),
            ]);

            session()->put([
                'appointment_details' => $input,
                'vcard_id' => $vcard->id,
            ]);

            $result = [
                'sessionId' => $session['id'],
            ];

            return $result;
        } catch (\Exception $e) {
            throw new UnprocessableEntityHttpException($e->getMessage());
        }
    }

    /**
     * @param $input
     * @param $vcardUserEmail
     * @return mixed
     */
    public function appointmentStoreOrEmail($input, $vcardUserEmail)
    {
        $appointment = ScheduleAppointment::create($input);

        Mail::to($input['email'])
            ->send(new AppointmentMail('emails.appointment_mail',
                __('messages.mail.book_appointment'),
                $input));

        Mail::to($vcardUserEmail)
            ->send(new UserAppointmentMail('emails.user_appointment_mail',
                __('messages.mail.book_appointment'),
                $input));

        return $appointment;
    }
}
