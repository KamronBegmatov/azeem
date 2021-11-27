<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Tymon\JWTAuth\Contracts\JWTSubject;

/**
 * App\Models\UserFromSocial
 *
 * @method static \Illuminate\Database\Eloquent\Builder|UserFromSocial newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserFromSocial newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserFromSocial query()
 * @mixin \Eloquent
 * @property int $id
 * @property string $name
 * @property string $google_id
 * @property string $email
 * @property string|null $password
 * @property string|null $avatar
 * @property string|null $avatar_original
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|UserFromSocial whereAvatar($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserFromSocial whereAvatarOriginal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserFromSocial whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserFromSocial whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserFromSocial whereGoogleId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserFromSocial whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserFromSocial whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserFromSocial wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserFromSocial whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserFromSocial whereUpdatedAt($value)
 */
class UserFromSocial extends Authenticatable implements JWTSubject
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
    ];

    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }
}
