<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Qazo
 *
 * @property int $id
 * @property int $user_id
 * @property string $madhab
 * @property int $gender
 * @property string $birth_date
 * @property int $adolescence_age
 * @property int $age_started_namaz
 * @property int|null $number_of_children
 * @property int|null $regular_nifos_days
 * @property int|null $regular_hayz_days
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User $users
 * @method static \Illuminate\Database\Eloquent\Builder|Qazo newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Qazo newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Qazo query()
 * @method static \Illuminate\Database\Eloquent\Builder|Qazo whereAdolescenceAge($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Qazo whereAgeStartedNamaz($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Qazo whereBirthDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Qazo whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Qazo whereGender($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Qazo whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Qazo whereMadhab($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Qazo whereNumberOfChildren($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Qazo whereRegularHayzDays($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Qazo whereRegularNifosDays($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Qazo whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Qazo whereUserId($value)
 * @mixin \Eloquent
 */
class Qazo extends Model
{
    protected $guarded=[];

    public function users(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
