<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class Message extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'content',
        'user_id',
        'chat_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function chat()
    {
        return $this->belongsTo(Chat::class, 'chat_id');
    }

    public function getAutor()
    {
        $autor = $this->user->name;

        if ($this->user->name === Auth::user()->name) {
            $autor = "Вы";
        }
        return $autor;
    }
}
