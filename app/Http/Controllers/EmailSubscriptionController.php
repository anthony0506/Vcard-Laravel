<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateEmailSubscriptionRequest;
use App\Models\EmailSubscription;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;

class EmailSubscriptionController extends AppBaseController
{
    /**
     * @return Application|Factory|View
     */
    public function index()
    {
        return view('email_subscription.index');
    }

    /**
     * @param  Request  $request
     * @return Application|RedirectResponse|Redirector
     */
    public function store(CreateEmailSubscriptionRequest $request)
    {
        EmailSubscription::create($request->all());

        return $this->sendSuccess(__('messages.placeholder.subscribed_successfully'));
    }

    /**
     * @param  EmailSubscription  $emailSubscription
     * @return mixed
     */
    public function destroy(EmailSubscription $emailSubscription)
    {
        $emailSubscription->delete();

        return $this->sendSuccess('Email deleted successfully.');
    }
}
