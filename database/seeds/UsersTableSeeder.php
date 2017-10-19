<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    { 
		factory(App\Model\Users::class)->create(['email' => 'admin2@previsto.com']);
    }
}
