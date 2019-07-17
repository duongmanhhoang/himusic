<?php

use Illuminate\Database\Seeder;

class WebSettingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('web_setting')->insert([
            'logo' => 'mjustudio.png',
            'email' => 'mju.studio01@gmail.com',
            'phone' => '084 8686 678',
            'address' => 'Số 7 Đại Cồ Việt, Hai Bà Trưng, Hà Nội',
            'facebook' => 'https://www.facebook.com/Mju.Studio'
        ]);
    }
}
