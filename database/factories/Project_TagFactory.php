<?php


use App\Tag;
use App\Project;
use Faker\Generator as Faker;

$factory->define(App\Projecttag::class, function (Faker $faker) {

    $projects = Project::pluck('id')->all();
    $tags = Tag::pluck('id')->all();
    return [
        //
        'project_id'=>$faker->randomElement($projects),
        'tag_id'=>$faker->randomElement($tags),
    ];
});
