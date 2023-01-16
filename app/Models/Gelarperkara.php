<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gelarperkara extends Model
{
    use HasFactory;

    public function vtunggakans()
    {
        return $this->hasOne(Vtunggakan::class, 'np2', 'np2');
    }
}
