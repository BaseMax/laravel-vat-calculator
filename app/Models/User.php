<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Enums\UserRole;
use BadMethodCallException;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class User extends Authenticatable implements HasMedia
{
    use HasApiTokens;
    use HasFactory;
    use InteractsWithMedia;
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'image',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * Get the URL of the user's profile image.
     */
    public function getImageUrl(): string
    {
        return $this->id;
    }

    /**
     * Get the user's role as a string.
     */
    public function roleToString(): string
    {
        try {
            return ucfirst(UserRole::tryFrom($this->is_admin.'')->label); // Note: forcing to have concating with a string to keep it as string and not number.
        } catch (BadMethodCallException $exception) {
            return 'None';
        }
    }

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    /**
     * Define a one-to-many relationship with the UserLogin model.
     */
    public function login(): HasMany
    {
        return $this->hasMany(UserLogin::class);
    }

    /**
     * Define a one-to-many relationship with the Request model.
     */
    public function requests(): HasMany
    {
        return $this->hasMany(Request::class);
    }
}
