<?php

use Faker\Generator as Faker;

$factory->define(App\Tag::class, function (Faker $faker) {
    return [
        //
        'name'=>'tag'.$faker->text($maxNbChars = 6)   
    ];
});



