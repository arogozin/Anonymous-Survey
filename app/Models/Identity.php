<?php

namespace App\Models;

class Identity extends \Moloquent
{
    protected $fillable = ['secret', 'name', 'taken', 'confirmed', 'ipaddr', 'answers'];
}
