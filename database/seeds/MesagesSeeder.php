<?php

use Illuminate\Database\Seeder;

class MesagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\User::class, 2)->create()->each(function ($u) {
            $u->messages()->insert(factory(App\Message::class,3)->make()->toArray());
        });
    }
}