<?php

use App\Contact;
use App\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        factory(Contact::class, 10)->create();
        factory(User::class)->create([
            'email' => 'test@test.test',
        ]);
    }
}
