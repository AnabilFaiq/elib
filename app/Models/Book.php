<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Book extends Model
{
    //
    protected $fillable = [
        'title',
        'author',
        'categories_id',
        'description',
        'cover'
    ];

    public function category() : BelongsTo{
        return $this->belongsTo(Category::class, 'categories_id');
    }
    
    public function peminjaman() : HasMany {
        return $this->hasMany(Peminjaman::class, 'book_id');
    }
}
