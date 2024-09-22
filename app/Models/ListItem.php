<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; // インポートを追加

class ListItem extends Model
{
    use HasFactory,SoftDeletes;

    protected $table = 'lists'; // テーブル名を指定

    protected $fillable = ['text', 'user_id'];

    // ユーザーとのリレーションシップ
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function comments ()
    {
        return $this->hasMany(Comment::class);
    }
    
}

