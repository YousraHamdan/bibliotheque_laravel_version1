<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;

class Auteur extends Model
{
    use HasFactory;
    
    protected $fillable = ['titre', 'annee_publication', 'nombre_pages', 'auteur_id'];

    public function auteur()
    {
        return $this->belongsTo(Auteur::class);
    }

}
