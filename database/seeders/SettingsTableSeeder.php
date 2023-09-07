<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SettingsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('settings')->delete();
        
        \DB::table('settings')->insert(array (
            0 => 
            array (
                'id' => 5,
                'group' => 'general',
                'key' => 'app_name',
                'value' => 'Laravel',
                'type' => 'text',
                'options' => NULL,
                'created_at' => '2022-06-16 15:29:36',
                'updated_at' => '2022-06-16 15:29:36',
            ),
            1 => 
            array (
                'id' => 6,
                'group' => 'general',
                'key' => 'site_url',
                'value' => 'http://localhost',
                'type' => 'text',
                'options' => NULL,
                'created_at' => '2022-06-16 15:29:58',
                'updated_at' => '2022-06-16 15:42:38',
            ),
            2 => 
            array (
                'id' => 7,
                'group' => 'general',
                'key' => 'site_description',
                'value' => NULL,
                'type' => 'textarea',
                'options' => NULL,
                'created_at' => '2022-06-16 15:30:18',
                'updated_at' => '2023-08-13 08:37:19',
            ),
            3 => 
            array (
                'id' => 8,
                'group' => 'general',
                'key' => 'site_keywords',
                'value' => NULL,
                'type' => 'text',
                'options' => NULL,
                'created_at' => '2022-06-16 15:30:29',
                'updated_at' => '2022-06-16 15:30:29',
            ),
            4 => 
            array (
                'id' => 9,
                'group' => 'general',
                'key' => 'logo_light',
                'value' => 'rio-logo-light.png',
                'type' => 'image',
                'options' => NULL,
                'created_at' => '2022-06-16 15:30:50',
                'updated_at' => '2023-08-13 08:41:13',
            ),
            5 => 
            array (
                'id' => 10,
                'group' => 'general',
                'key' => 'logo_dark',
                'value' => 'rio-logo-light.png',
                'type' => 'image',
                'options' => NULL,
                'created_at' => '2022-06-16 15:31:01',
                'updated_at' => '2023-08-13 08:41:13',
            ),
            6 => 
            array (
                'id' => 11,
                'group' => 'general',
                'key' => 'favicon',
                'value' => 'rio-emoji.png',
                'type' => 'image',
                'options' => NULL,
                'created_at' => '2022-06-16 15:31:13',
                'updated_at' => '2023-08-13 08:15:13',
            ),
            7 => 
            array (
                'id' => 12,
                'group' => 'mail',
                'key' => 'host',
                'value' => NULL,
                'type' => 'text',
                'options' => NULL,
                'created_at' => '2022-06-16 15:32:39',
                'updated_at' => '2023-08-12 21:32:31',
            ),
            8 => 
            array (
                'id' => 13,
                'group' => 'mail',
                'key' => 'username',
                'value' => NULL,
                'type' => 'text',
                'options' => NULL,
                'created_at' => '2022-06-16 15:32:54',
                'updated_at' => '2023-08-12 21:32:31',
            ),
            9 => 
            array (
                'id' => 14,
                'group' => 'mail',
                'key' => 'password',
                'value' => '',
                'type' => 'password',
                'options' => NULL,
                'created_at' => '2022-06-16 15:33:02',
                'updated_at' => '2022-06-16 15:33:02',
            ),
            10 => 
            array (
                'id' => 15,
                'group' => 'mail',
                'key' => 'port',
                'value' => NULL,
                'type' => 'text',
                'options' => NULL,
                'created_at' => '2022-06-16 15:33:16',
                'updated_at' => '2023-08-12 21:32:31',
            ),
            11 => 
            array (
                'id' => 16,
                'group' => 'mail',
                'key' => 'encryption',
                'value' => NULL,
                'type' => 'text',
                'options' => '"SSL,TLS"',
                'created_at' => '2022-06-16 15:33:49',
                'updated_at' => '2023-08-12 21:32:31',
            ),
            12 => 
            array (
                'id' => 17,
                'group' => 'general',
                'key' => 'product_placeholder_image',
                'value' => 'img/documentation/img8.jpg',
                'type' => 'image',
                'options' => NULL,
                'created_at' => '2022-09-07 19:41:13',
                'updated_at' => '2022-09-09 09:39:04',
            ),
            13 => 
            array (
                'id' => 18,
                'group' => 'general',
                'key' => 'post_placeholder_image',
                'value' => 'img/documentation/img8.jpg',
                'type' => 'image',
                'options' => NULL,
                'created_at' => '2022-09-07 20:04:31',
                'updated_at' => '2022-09-09 09:38:45',
            ),
        ));
        
        
    }
}