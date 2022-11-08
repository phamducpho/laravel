<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('nguoidung')->insert([
            'TaiKhoan'=>'nguoidung',
            'HoTen'=>'Thien',
            'SDT'=>'22131231231',
            'ngDk'=>'2016-12-11',
            'trangthai'=>'1',
        	'password' => bcrypt('123456789'),
            'level'=>'2',
        ]);
    }
}
