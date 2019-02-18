<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class LocalMail extends Model
{
    protected $fillable = ['user_id', 'mail_body', 'to'];
    protected $table = 'mails';
}
