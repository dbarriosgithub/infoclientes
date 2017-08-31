<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        // $this->call('UserTableSeeder'); llamar al seeder
         factory('App\Country',5)->create();
         factory('App\Department',10)->create();
         factory('App\City',20)->create();
        Model::reguard();
    }
}
