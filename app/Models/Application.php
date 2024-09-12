<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    use HasFactory;

    protected $fillable = [
        'listing_id',
        'name',
        'email',
        'phone',
        'resume',
    ];

    public function listing()
    {
        return $this->belongsTo(Listing::class);
    }
}
