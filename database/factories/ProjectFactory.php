<?php

use Faker\Generator as Faker;
use App\Category;
use App\Tag;
use App\Company;
use App\User;



$factory->define(App\Project::class, function (Faker $faker) {
    $categories = Category::pluck('id')->all();
    $tags = Tag::pluck('id')->all();
    $companies = Company::pluck('id')->all();
    $users = User::pluck('id')->all();
    
    return [
        //
        'title'=>$faker->name(),
        'description'=>$faker->paragraphs(rand(2,10),true),
        'budget'=>$faker->randomNumber($max = 8),
        'category_id'=>$faker->randomElement($categories),
        'tag_id'=>$faker->randomElement($tags),
        'company_id'=>$faker->randomElement($companies),
        'user_id'=>$faker->randomElement($users),
    ];
    
});
