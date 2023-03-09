<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vspt extends Model
{
    use HasFactory;

    protected $primaryKey = 'ID_SPT';
    public $incrementing = false;
    protected $keyType = 'string';

    public function catatanspts()
    {
        return $this->hasOne(Catatanspt::class, 'id_spt', 'ID_SPT');
    }

    public function pengembalianpendahuluans()
    {
        return $this->hasOne(PengembalianPendahuluan::class, 'id_spt', 'ID_SPT');
    }
}
