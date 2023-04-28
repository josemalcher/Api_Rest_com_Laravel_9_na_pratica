<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Versiculo extends Model
{
    use HasFactory;

    protected $fillable = ['capitulo', 'versiculo', 'texto', 'livro_id'];

//    public function scopeCapitulo($query, $capitulo)
//    {
//        return $query->where('capitulo', $capitulo);
//    }
    public function scopeFilters($query, array $filters)
    {
        if ($filters['capitulo']) {
            $query->where('capitulo', $filters['capitulo']);
        }
        if ($filters['versiculo']) {
            $query->where('versiculo', $filters['versiculo']);
        }
    }

    public function livro()
    {
        return $this->belongsTo(Livro::class);
    }
}
