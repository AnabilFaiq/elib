<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Peminjaman extends Model
{
    //
    protected $table = 'peminjamans';
    protected $fillable = [
        'book_id',
        'user_id',
        'tanggal_peminjaman',
        'tanggal_kembali',
        'status',
        'denda'
    ];

    public function book() : BelongsTo{
        return $this->belongsTo(Book::class, 'book_id');
    }
    
    public function user() : BelongsTo{
        return $this->belongsTo(user::class, 'user_id');
    }
}
