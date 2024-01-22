<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

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

    public function getTitle()
    {
        $title = "Чат с ";

        if ($this->initiator_id === $this->owner_id) {
            $title .= "вами";
        } else if($this->initiator_id == Auth::user()->id) {
            $title .= $this->owner->name;
        } else if($this->owner_id == Auth::user()->id) {
            $title .= $this->initiator->name;
        }
        return $title;
    }
}
