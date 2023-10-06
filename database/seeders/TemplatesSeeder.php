<?php

namespace Database\Seeders;

use App\Models\Template;
use Illuminate\Database\Seeder;

class TemplatesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $templates = [
            'vcard1' => ('assets/img/templates/vcard1.png'),
            'vcard2' => ('assets/img/templates/vcard2.png'),
            'vcard3' => ('assets/img/templates/vcard3.png'),
            'vcard4' => ('assets/img/templates/vcard4.png'),
            'vcard5' => ('assets/img/templates/vcard5.png'),
            'vcard6' => ('assets/img/templates/vcard6.png'),
            'vcard7' => ('assets/img/templates/vcard7.png'),
            'vcard8' => ('assets/img/templates/vcard8.png'),
            'vcard9' => ('assets/img/templates/vcard9.png'),
            'vcard10' => ('assets/img/templates/vcard10.png'),
        ];

        foreach ($templates as $name => $template) {
            $templateData = Template::create(['name' => $name, 'path' => $template]);
        }
    }
}
