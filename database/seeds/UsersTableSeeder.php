<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User;
        $user->id();
        $user->name = "watame";
        $user->email = "watame@watame";
        $user->password = "watamewatame";
        $user->image = '';
        $user->introduction = '駆け出しプログラマーです。よろしくお願いします。';
    }
}
