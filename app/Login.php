<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Lastmedical extends Eloquent
{
    protected $connection = 'mongodb';
    protected $collection = 'acceslevel
    
    protected $fillable = [
							'user', 
							'password',
							'acceslevel',
							'name',
							'surname',
							'identification',
    ];
}
