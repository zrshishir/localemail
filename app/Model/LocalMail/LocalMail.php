<?php

namespace App\Model\LocalMail;

use Illuminate\Database\Eloquent\Model;

class LocalMail extends Model
{
    protected $fillable = ['user_id', 'mail_body', 'to'];
    protected $table = 'mails';

    public function from(){
        $this->belongsTo('App\User', 'user_id');
    }
    public function to(){
        $this->belongsTo('App\User', 'to');
    }
}
