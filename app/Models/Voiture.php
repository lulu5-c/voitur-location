<?php

namespace App\Models;
use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Voiture extends Model
{

    use HasFactory;
    protected $fillable = [
        'marque',
        'description',
        'image',
        'porte',
        'energie',
        'boite',
        'categorie_id',
        'prix'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function user()
    {
        return $this->hasMany(User::class);
    }
}
