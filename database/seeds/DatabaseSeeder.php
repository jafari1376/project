<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserSeeder::class);
        DB::table('users')->insert([
            'name'=>'پیشفرض',
            'email'=>'info@test1.com',
            'level'=>'admin',
            'password'=>Hash::make('12345678'),
            'admin_active'=>1,
            'email_verified_at'=>Carbon::now(),
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now(),
        ]);
    }
}
