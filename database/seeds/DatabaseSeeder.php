<?php

use Illuminate\Database\Seeder;
use App\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user->name = 'Zahid';
        $user->email = 'zahid.hasan6@gmail.com';
        $user->password = bcrypt('54646');
        $user->save();
    }
}
