<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;

class AffiliateCodeForExistingUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * @return void
     */
    public function run()
    {
        $users = User::wherehas('roles', function ($role) {
            $role->where('name', '!=', Role::ROLE_SUPER_ADMIN);
        })->get();

        foreach ($users as $user) {
            if ($user->affiliate_code) {
                continue;
            }
            $user->affiliate_code = generateUniqueAffiliateCode();
            $user->save();
        }
    }
}
