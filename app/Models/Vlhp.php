<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vlhp extends Model
{
    use HasFactory;

    protected $primaryKey = 'np2';
    public $incrementing = false;
    protected $keyType = 'string';

    public function vskps()
    {
        return $this->hasMany(Vskp::class, 'np2', 'np2');
    }

    public function komitmens()
    {
        return $this->hasOne(Komitmen::class, 'np2', 'np2');
    }

    public function manualfpps()
    {
        return $this->hasOne(Manualfpp::class, 'np2', 'np2');
    }
}
