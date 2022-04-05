<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Latestcase extends Model
{
    use HasFactory;

    protected $fillable = [
        'casecat_id',
        'name',
        'description',
        'image',
        'save_by',
        'updated_by',
        'save_by',
    ];
    public function casecat(){
        return $this->belongsTo(CaseCat::class, 'casecat_id', 'id');
    }
}
