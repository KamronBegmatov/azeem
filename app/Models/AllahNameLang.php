<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\AllahNameLang
 *
 * @property int $id
 * @property int $allah_name_id
 * @property string $name
 * @property string $language_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\AllahName $allahName
 * @property-read \App\Models\Language $language
 * @method static \Illuminate\Database\Eloquent\Builder|AllahNameLang newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AllahNameLang newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AllahNameLang query()
 * @method static \Illuminate\Database\Eloquent\Builder|AllahNameLang whereAllahNameId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AllahNameLang whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AllahNameLang whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AllahNameLang whereLanguageId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AllahNameLang whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AllahNameLang whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class AllahNameLang extends Model
{
    protected $guarded = [];

    public function allahName(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(AllahName::class, 'allah_name_id');
    }

    public function language(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Language::class);
    }
}
