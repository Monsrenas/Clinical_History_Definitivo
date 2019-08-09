<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Interrogation extends Eloquent
{
    protected $connection = 'mongodb';
    protected $collection = 'interrogation';
    
    protected $fillable = [	'identification',
    						'adm', 
							'cc',
							'hpi',
    ];
}
