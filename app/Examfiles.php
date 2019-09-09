<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Examfiles extends Eloquent
{
    protected $connection = 'mongodb';
    protected $collection = 'exams';
    
    protected $fillable = [
							'identification', 
							'exams',
    ];
}
/*
0 'title'
1 'description', 
2 'filepath',
*/