<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vskp extends Model
{
    use HasFactory;

    protected $primaryKey = 'nomor_ket';
    public $incrementing = false;
    protected $keyType = 'string';

    public function vlhps()
    {
        return $this->belongsTo(Vlhp::class, 'np2', 'np2');
    }
}
