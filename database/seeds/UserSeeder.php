<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

    $user = factory(App\User::class)->create([
        'name'=>'Admin',
        'email'=>'admin@admin.com'
    ]);
    }
}
