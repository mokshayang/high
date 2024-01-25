<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Testing\Constraints\SoftDeletedInDatabase;
class Book extends Model
{
    use HasFactory;

    use SoftDeletes; //使用軟刪除 這邊打  上面會增加 use   ....SoftDeletes  真神
    protected $fillable = [
        'title',
        'descript',
        'price',
        'avalable',
    ];
    public function store(){
        return $this->belongsTo(Store::class);
    }
}
