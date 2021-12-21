<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'veiculo_id',
        'booked_for',
    ];

    public   $rules = [
        'booked_for' => 'unique',
    ];

    public function veiculo()
    {
        return $this->belongsTo('App\Models\Veiculo');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
