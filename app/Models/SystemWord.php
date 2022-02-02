<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\SystemWord
 *
 * @property int $id
 * @property string $title
 * @property string $text
 * @property int $language_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Language $language
 * @method static \Illuminate\Database\Eloquent\Builder|SystemWord newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SystemWord newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SystemWord query()
 * @method static \Illuminate\Database\Eloquent\Builder|SystemWord whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SystemWord whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SystemWord whereIsoCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SystemWord whereText($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SystemWord whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SystemWord whereUpdatedAt($value)
 * @mixin \Eloquent
 * @method static \Illuminate\Database\Eloquent\Builder|SystemWord whereLanguageId($value)
 */
class SystemWord extends Model
{
    protected $guarded=[];

    public function language()
    {
        return $this->belongsTo(Language::class);
    }

    public static function add($request)
    {
        return self::create([
            'title' => $request->title,
            'text' => $request->text,
            'language_id' => $request->language_id,
        ]);
    }
}
