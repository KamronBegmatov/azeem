<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\SuraLang
 *
 * @property int $id
 * @property \App\Models\Sura $sura
 * @property int $ayah
 * @property string $text
 * @property int|null $language_id
 * @property string|null $name
 * @property string|null $location
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Language|null $language
 * @method static \Illuminate\Database\Eloquent\Builder|SuraLang newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SuraLang newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SuraLang query()
 * @method static \Illuminate\Database\Eloquent\Builder|SuraLang whereAyah($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SuraLang whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SuraLang whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SuraLang whereLanguageId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SuraLang whereLocation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SuraLang whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SuraLang whereSura($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SuraLang whereText($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SuraLang whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class SuraLang extends Model
{
    protected $primaryKey = 'sura';

    public function sura(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Sura::class, 'sura', 'sura');
    }

    public function language(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Language::class);
    }
}
