<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Physical extends Eloquent
{
    protected $connection = 'mongodb';
    protected $collection = 'physical';
    
    protected $fillable = [	'identification', 
							'N',
							'DAF',
							'Weight',
							'Height',
							'BMI',
							'Respiratoryrate',
							'Centralheartrate',
							'Upperextrem',
							'Lowerextrem',
    ];
}
