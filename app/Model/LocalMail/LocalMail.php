<?php

namespace App\Model\LocalMail;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\User;

class LocalMail extends Model
{
    protected $table = 'mails';
    protected $fillable = ['user_id', 'mail_body', 'to', 'status'];
    
    public function from(){
        return $this->belongsTo('App\User', 'user_id');
    }

    public function toUser(){
        return $this->belongsTo('App\User', 'to');
    }
}
