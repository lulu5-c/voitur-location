<?php

namespace App\Models;
use App\Models\Voiture;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
    ];
    public function voiture()
    {
        return $this->hasMany(Voiture::class);
    }
}
