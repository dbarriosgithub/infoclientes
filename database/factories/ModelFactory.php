<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(App\User::class, function ($faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->email,
        'password' => str_random(10),
        'remember_token' => str_random(10),
    ];
});
  
  $factory->define(App\Country::class,function($faker){
      return[
          'codpais'=>$faker->text(10),
          'nompais'=>$faker->country
      ];
  });

  $factory->define(App\Department::class,function($faker){

      return[
          'coddepartamento'=>$faker->text(10),
          'nomdepartamento'=>$faker->state,
          'pais_id'=>factory(App\Country::class)->create()->id,
      ];
  });

  $factory->define(App\City::class,function($faker){
     return[
         'codciudad'=>$faker->text(10),
         'nomciudad'=>$faker->city,
         'departamento_id'=>factory(App\City::class)->create()->id,
     ];
  });
