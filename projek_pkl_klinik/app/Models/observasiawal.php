<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class observasiawal extends Model
{
    use HasFactory;

    // /**
    //  * Get the user that owns the observasiawal
    //  *
    //  * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
    //  */

    public function pasien(): BelongsTo
    {
        return $this->belongsTo(Pasien::class, 'pasien_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

}
