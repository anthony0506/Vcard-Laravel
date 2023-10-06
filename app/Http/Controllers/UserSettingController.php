<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateUserSettingRequest;
use App\Models\ScheduleAppointment;
use App\Models\UserSetting;
use App\Models\Vcard;
use App\Models\User;
use App\Repositories\UserSettingRepository;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Laracasts\Flash\Flash;

class UserSettingController extends AppBaseController
{
    /**
     * @var UserSettingRepository
     */
    private $userSettingRepository;

    /**
     * SettingController constructor.
     *
     * @param  UserSettingRepository  $userSettingRepository
     */
    public function __construct(UserSettingRepository $userSettingRepository)
    {
        $this->userSettingRepository = $userSettingRepository;
    }

    /**
     * @param  Request  $request
     * @return Application|Factory|View
     */
    public function index(Request $request)
    {
        $sectionName = $request->get('section') !== null;
        $setting = UserSetting::where('user_id', getLogInUserId())->pluck('value', 'key')->toArray();

        $user = User::where('id', getLogInUserId())->get()[0];
        
        return view('user-settings.credentials', compact('setting', 'sectionName', 'user'));
    }

    /**
     * @param  Request  $request
     * @return RedirectResponse
     */
    public function update(UpdateUserSettingRequest $request)
    {
        $id = Auth::id();
        $setting = UserSetting::where('user_id', getLogInUserId())->where('key', 'time_format')->first();
        $userVcards = Vcard::where('tenant_id', getLogInTenantId())->pluck('id')->toArray();
        $bookedAppointment = ScheduleAppointment::whereIn('vcard_id', $userVcards)->where('status',
            ScheduleAppointment::PENDING)->count();
        if (!empty($setting) && $bookedAppointment > 0 && $setting->value != $request->time_format) {
            Flash::error(__('messages.flash.can_not_change_time_format'));

            return Redirect::back();
        }
        $this->userSettingRepository->update($request->all(), $id);

        Flash::success(__('messages.flash.setting_update'));

        return Redirect::back();
    }
}
