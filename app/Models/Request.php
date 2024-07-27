<?php

namespace App\Models;

use App\Enums\RequestType;
use BadMethodCallException;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\hasMany;

// use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Request extends Model
{
    use HasFactory;

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'amount',
        'vat',
        'vat_result',
        'amount_result',
        'type',
        'currency_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    /**
     * Scope a query to only include add requests.
     */
    public function scopeAddRequests(Builder $query): Builder
    {
        return $query->where('type', RequestType::ADD()->value);
    }

    /**
     * Scope a query to only include exclude requests.
     */
    public function scopeExcludeRequests(Builder $query): Builder
    {
        return $query->where('type', RequestType::EXCLUDE()->value);
    }

    /**
     * Get the request type as a string.
     */
    public function typeToString(): string
    {
        try {
            return ucfirst(RequestType::tryFrom($this->type.'')->label); // Note: forcing to have concatenation with a string to keep it as a string and not a number.
        } catch (BadMethodCallException $exception) {
            return 'None';
        }
    }

    /**
     * Get the currency associated with the request.
     */
    public function currency(): BelongsTo
    {
        return $this->belongsTo(Currency::class);
    }

    /**
     * Get the users associated with the request.
     */
    public function users(): hasMany
    {
        return $this->hasMany(UsersRequests::class);
    }
}
