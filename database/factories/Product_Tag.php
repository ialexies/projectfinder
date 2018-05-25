<?php
use App\Tag;
use App\Project;
use App\Project_tag;
use Faker\Generator as Faker;

$factory->define(App\Project_tag::class, function (Faker $faker) {

    $projects = Project::pluck('id')->all();
    $tags = Tag::pluck('id')->all();
    return [
        //
        'project_id'=>$faker->randomElement($projects),
        'tag_id'=>$faker->randomElement($tags),
    ];
});
