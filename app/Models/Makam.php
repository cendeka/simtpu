<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Makam extends Model
{
    use HasFactory;
    protected $table = 'tbl_makam';
    protected $guarded = [];

    public function scopeSeason($query,$year)
    {
        return $query->whereYear('tanggal_meninggal', '=', $year);
    }

    public function scopeMonth($query,$month)
    {
        return $query->whereMonth('tanggal_meninggal', '=', $month);
    }

    /**
     * Get the user associated with the Makam
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function registrasi()
    {
        return $this->hasOne(Registrasi::class, 'id', 'registrasi_id');
    }

}
