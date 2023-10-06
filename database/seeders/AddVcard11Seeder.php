<?php

namespace Database\Seeders;

use App\Models\Template;
use Illuminate\Database\Seeder;

class AddVcard11Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $input = [
            'name' => 'vcard11',
            'path' => 'assets/img/templates/vcard11.png',
        ];

        $vcard11Exist = Template::where('name', 'vcard11')->first();
        if (! $vcard11Exist) {
            Template::create($input);
        }
    }
}
