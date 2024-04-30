<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ciutat extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'id',
        'nom',
        'n_habitants'
    ];

    public static function getCityById($id){
        return self::where('id', $id)->get()->first();
    }
}
