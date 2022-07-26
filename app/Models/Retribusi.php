<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Retribusi extends Model
{
    use HasFactory;
    protected $table = 'tbl_retribusi';
    protected $guarded = [];

    public function scopeSeason($query,$year)
    {
        return $query->whereYear('masa', '=', $year);
    }

    public function scopeMonth($query,$month)
    {
        return $query->whereMonth('masa', '=', $month);
    }
    /**
     * Get the user associated with the Retribusi
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function registrasi()
    {
        return $this->hasOne(Registrasi::class, 'id', 'registrasi_id');
    }

    
}
