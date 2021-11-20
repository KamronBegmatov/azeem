<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\AllahName
 *
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|AllahName newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AllahName newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AllahName query()
 * @method static \Illuminate\Database\Eloquent\Builder|AllahName whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AllahName whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AllahName whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AllahName whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class AllahName extends Model
{
    protected $guarded=[];
}
