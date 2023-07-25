<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Pasien extends Model
{

    use HasFactory;

    /**
     * Get all of the comments for the Pasien
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */

     public function observasiawal(): HasMany
     {
         return $this->hasMany(Observasiawal::class, 'pasien_id', 'id');
     }


    /**
     * Get all of the comments for the Pasien
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function observasilanjutan(): HasMany
    {
        return $this->hasMany(observasilanjut::class, 'pasien_id', 'id');
    }

    /**
     * Get all of the comments for the Pasien
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function rekmed(): HasMany
    {
        return $this->hasMany(rekmed::class, 'pasien_id', 'id');
    }
}
