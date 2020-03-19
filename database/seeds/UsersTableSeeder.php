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
        User::create([
            'name' => 'Gonzalo Vargas',
            'email' => 'gonzalojpv@gmail.com',
            'password' => bcrypt('test123test'),
            'admin' => true,
        ]);

        factory(User::class, 10)->create();
    }
}
