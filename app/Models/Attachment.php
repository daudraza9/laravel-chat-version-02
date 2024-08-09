<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attachment extends Model
{
    protected $fillable = ['name'];

    public function chats()
    {
        return $this->hasMany(Chat::class, 'profile_id');
    }

    public function messages()
    {
        return $this->hasMany(Message::class, 'attachment_id');
    }
}
