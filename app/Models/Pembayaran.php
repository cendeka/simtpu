<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    use HasFactory;
    protected $table = 'tbl_pembayaran';
    protected $guarded = [];
    
    /**
     * Get all of the comments for the Herregistrasi
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function registrasi()
    {
        return $this->hasMany(Registrasi::class, 'id', 'registrasi_id');
    }
    
    /**
     * Get the user associated with the Pembayaran
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function herregistrasi()
    {
        return $this->hasOne(Herregistrasi::class, 'id', 'herr_id');
    }
}
