<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    protected $fillable = ['name', 'type', 'profile_id'];

    public function messages()
    {
        return $this->hasMany(Message::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class)->withTimestamps()->withPivot('admin_assigned_at', 'removed_at');
    }

    public function profile()
    {
        return $this->belongsTo(Attachment::class, 'profile_id');
    }
}
