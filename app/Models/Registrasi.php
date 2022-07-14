<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Registrasi extends Model
{
    use HasFactory;
    protected $table = 'tbl_registrasi';
    protected $guarded = [];

    
    /**
     * Get the ahliwaris associated with the Registrasi
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function ahliwaris()
    {
        return $this->hasOne(AhliWaris::class, 'id', 'ahliwaris_id');
    }
    /**
     * Get the user associated with the Registrasi
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function makam()
    {
        return $this->hasOne(Makam::class, 'registrasi_id', 'id');
    }
    
    /**
     * Get all of the comments for the Registrasi
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function retribusi()
    {
        return $this->hasMany(Retribusi::class, 'registrasi_id', 'id');
    }
    
    /**
     * Get all of the comments for the Registrasi
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function herregistrasi()
    {
        return $this->hasMany(Herregistrasi::class, 'registrasi_id', 'id');
    }
}
