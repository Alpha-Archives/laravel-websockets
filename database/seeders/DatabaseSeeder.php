<?php

namespace Database\Seeders;

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
        $user = \App\Models\User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@admin.com'
        ]);

        $user->messages()->insert(
            \App\Models\Message::factory()->count(10)->make()->toArray()
        );

        \App\Models\User::factory()->count(2)->create()->each(function ($u) {
            $u->messages()->insert(
                \App\Models\Message::factory()->count(10)->make()->toArray()
            );
        });
    }
}
