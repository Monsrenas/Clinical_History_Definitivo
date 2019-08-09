<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Specialistnote extends Eloquent
{
    protected $connection = 'mongodb';
    protected $collection = 'specialistnote';
    
    protected $fillable = [
							'identification', 
							'user',
							'specialty',
							'text',
    ];
}
