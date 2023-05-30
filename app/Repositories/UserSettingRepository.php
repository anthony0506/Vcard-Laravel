<?php

namespace App\Repositories;

use App\Models\UserSetting;
use Illuminate\Support\Arr;

/**
 * Class UserRepository
 */
class UserSettingRepository extends BaseRepository
{
    /**
     * {@inheritDoc}
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * {@inheritDoc}
     */
    public function model()
    {
        return UserSetting::class;
    }

    /**
     * @param  array  $input
     * @param  int  $id
     * @return UserSetting
     */
    public function update($input, $id)
    {
        $inputArr = Arr::except($input, ['_token', 'sectionName']);

        $inputArr['stripe_enable'] = isset($inputArr['stripe_enable']) ? '1' : '0';
        $inputArr['paypal_enable'] = isset($inputArr['paypal_enable']) ? '1' : '0';
        $inputArr['enable_affiliation'] = isset($inputArr['enable_affiliation']) ? '1' : '0';

        foreach ($inputArr as $key => $value) {
            /** @var UserSetting $setting */
            $setting = UserSetting::where('key', $key)->where('user_id', $id)->first();

            if (! $setting) {
                UserSetting::create([
                    'user_id' => $id,
                    'key' => $key,
                    'value' => $value,
                ]);
            } else {
                $setting->update(['value' => $value]);
            }
        }

        return $setting;
    }
}
