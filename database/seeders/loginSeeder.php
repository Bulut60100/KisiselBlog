<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class loginSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('logins')->insert([
            'name'=>'muhammed',
            'email'=>'muhammed@gmail.com',
            'password'=>bcrypt(123456789),
        ]);
    }
}
