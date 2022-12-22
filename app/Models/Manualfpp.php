<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Manualfpp extends Model
{
    use HasFactory;

    protected $primaryKey = 'np2';
    public $incrementing = false;
    protected $keyType = 'string';

    public function tunggakans()
    {
        return $this->belongsTo(Vtunggakan::class, 'np2', 'np2');
    }
}
