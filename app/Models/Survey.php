<?php

namespace App\Models;

class Survey extends \Moloquent
{
    protected $fillable = ['title', 'class', 'semester', 'questions', 'active', 'repeat'];
}
