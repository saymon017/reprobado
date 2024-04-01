<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    use HasFactory;

    protected $fillable = [
        'provider_id',
        'user_id',
        'purcharse_date',
        'tax',
        'total',
        'status',
        'picture',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function provider(){
        return $this->belongsTo(Provider::class);
    }

    public function purcharseDetails(){
        return $this->hasMany(PurchaseDetails::class);
    }
}
