<?php

use Faker\Generator as Faker;

$factory->define(App\Company::class, function (Faker $faker) {
    return [
        //
        'name'=>'Com'.$faker->text($maxNbChars = 6),   
        'contactno'=>$faker->phoneNumber(), 
        'address'=>$faker->address(),
        'email'=>$faker->email()

    ];
});
