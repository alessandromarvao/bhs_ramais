<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IAX extends Model
{
    protected $table = 'iaxfriends';
    public $timestamps = false;
    protected $primaryKey = 'name';
    public $incrementing = false;

    protected $fillable = [
        'name', //ramal
        'type', //friend
        'username', //ramal
        'mailbox', // ramal@mailboxiax
        'md5secret', //ramal:10.7.14.10:SENHA
        'context', //barrei_iax
        'host', //dynamic
        'accountcode', //SETOR
        'callgroup', //1
        'pickupgroup', //1
        'language', // pt_BR
        'callerid', //SETOR <ramal>
        'disallow', // all
        'allow', // ulaw,alaw,gsm
        'qualify', // no
        'usr', //Nome do usuário
        'user_siape' //Matrícula do usuário

    ];
}
