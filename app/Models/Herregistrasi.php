<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Herregistrasi extends Model
{
    use HasFactory;
    protected $table = 'tbl_herregistrasi';
    protected $guarded = [];
    
    /**
     * Get all of the comments for the Herregistrasi
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function registrasi(): HasMany
    {
        return $this->hasMany(Registrasi::class, 'id', 'registrasi_id');
    }
}
