<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SIP extends Model
{
    protected $table = 'sippeers';
    protected $primaryKey = 'name';
    public $incrementing = false;
    public $timestamps = false;
    protected $fillable = [
        'name', // ramal
        'defaultuser', //ramal
        'host', // dynamic
        'type', // friend
        'context', // barrei_sip
        'md5secret', //v01pb4rr31@<6 últimos dígitos do MAC do telefone > só que criptografado em md5
        'transport', // udp
        'dtmfmode', // rfc2833
        'callgroup',
        'pickupgroup',
        'language', // pt_BR
        'disallow', // all
        'allow', // ulaw,alaw,ilbc
        'accountcode', // SETOR-ramal
        'callerid', // SETOR<ramal>
        'description', // SETOR
        'call-limit' // 2
    ];
}
