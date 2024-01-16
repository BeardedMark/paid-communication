<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;

class Chat extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['owner_id', 'initiator_id'];

    public function owner()
    {
        return $this->belongsTo(User::class, 'owner_id');
    }

    public function initiator()
    {
        return $this->belongsTo(User::class, 'initiator_id');
    }

    public function messages()
    {
        return $this->hasMany(Message::class, 'chat_id');
    }
}
