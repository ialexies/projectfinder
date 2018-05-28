<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project_tag extends Model
{
    //
    protected $table = 'project_tag';

    protected $fillable = [
        'project_id', 'tag_id'
    ];
}
