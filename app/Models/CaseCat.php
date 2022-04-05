<?php

namespace App\Models;

use App\Models\Latestcase;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CaseCat extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];

    public function latestcase(){
        return $this->hasMany(Latestcase::class, 'casecat_id','id',);
    }

  
}
