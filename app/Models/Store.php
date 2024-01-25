<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Book;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Store extends Model
{
    use HasFactory;

    // public function book(){
    //     // Eloquent hasOne 關聯式  一對一
    //     return $this->hasOne(Book::class);  
    // }
    public function books(){
        // Eloquent hasMany 關聯式  一對多
        return $this->hasMany(Book::class);
    }
    protected $fillable = [
        'title',
    ];
}
