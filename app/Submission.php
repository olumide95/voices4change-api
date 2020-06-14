<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Submission extends Model 
{
    protected $table = 'submissions';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'country','state','message','motivation',
    ];

    
}