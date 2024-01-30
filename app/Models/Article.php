<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\User;

class Article extends Model
{
    use HasFactory, SoftDeletes;
    // 允許大批寫入 :
    protected $fillable = [
        'title',
        'content'
    ];
    public function user(){
        return $this->belongsTo(User::class);
    }
}
