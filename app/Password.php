<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use GregoryDuckworth\Encryptable\EncryptableTrait;
use Illuminate\Database\Eloquent\SoftDeletes;

class Password extends Model
{
    use EncryptableTrait;
    use SoftDeletes;

    protected $table = 'passwords';

    /**
     * Encryptable Rules
     *
     * @var array
     */
    protected $encryptable = [
        'passwd',
    ];

    public function User(){
        $this->belongsTo(App::User);
    }
}
