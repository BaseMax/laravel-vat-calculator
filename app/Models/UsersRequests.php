<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UsersRequests extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'request_id',
        'ip_id',
    ];

    /**
     * Define the relationship with the User model.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Define the relationship with the IP model.
     */
    public function ip(): BelongsTo
    {
        return $this->belongsTo(GeoIP::class);
    }

    /**
     * Define the relationship with the Request model.
     */
    public function request(): BelongsTo
    {
        return $this->belongsTo(Request::class);
    }
}
