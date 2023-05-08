<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert(['rol' => 'Admin', 'dip_tp' => 'DNI', 
            'dip' => '1', 'password' => md5('123456'), 'name' => 'Admin',
            'domicilio' => 'Peru', 'email' => 'admin@admin.com']);
    }
}
