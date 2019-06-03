<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Army extends Model
{
    protected $table = 'army1';

    protected $fillable = ['name','number_of_soliders', 'number_of_generals'];
}
