<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Physiciansnote extends Eloquent
{
    protected $connection = 'mongodb';
    protected $collection = 'physiciansnote';
    
	
public function User_id()
{
    return $this->belongsTo(Login::class,'user','name');
}

    protected $fillable = [	'identification', 
							'note',
							  'ndate',
							  'user',
							  'speciality',
							'diagnosis',
							'plan',
							'followup',
							'physician',
							'date'
    ];
}
