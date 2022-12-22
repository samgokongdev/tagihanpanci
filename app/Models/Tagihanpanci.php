<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tagihanpanci extends Model
{
    use HasFactory;

    protected $primaryKey = 'np2';
    public $incrementing = false;
    protected $keyType = 'string';

    public function komitmens()
    {
        return $this->hasOne(Komitmen::class, 'np2', 'np2');
    }
}
