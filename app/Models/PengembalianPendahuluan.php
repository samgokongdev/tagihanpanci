<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PengembalianPendahuluan extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_spt';
    public $incrementing = false;
    protected $keyType = 'string';

    public function vspts()
    {
        return $this->belongsTo(Vspt::class, 'ID_SPT', 'id_spt');
    }
}
