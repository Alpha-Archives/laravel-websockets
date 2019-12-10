<?php

use Illuminate\Database\Seeder;

class MesagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\User::class, 2)->create()->each(function ($u) {
            $u->messages()->save(factory(App\Message::class,3)->make());
        });
    }
}
