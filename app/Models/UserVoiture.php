<?php
namespace App\Models;
use App\Models\Voiture;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserVoiture extends Model
{
    use HasFactory;
    protected $fillable = [
        'voiture_marque',
        'louer',
        'nombre',
        'restituer',
        'user_id',
        'voiture_id'
    ];
    public function voiture()
    {
        return $this->hasMany(Voiture::class);
    }
}
