<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\SelectFromList
 *
 * @property int $id
 * @property string $text
 * @property string $title
 * @property int $language_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Language $language
 * @method static \Illuminate\Database\Eloquent\Builder|SelectFromList newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SelectFromList newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SelectFromList query()
 * @method static \Illuminate\Database\Eloquent\Builder|SelectFromList whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SelectFromList whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SelectFromList whereLanguageId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SelectFromList whereText($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SelectFromList whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SelectFromList whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class SelectFromList extends Model
{
    protected $guarded=[];

    public function language()
    {
        return $this->belongsTo(Language::class);
    }

    public static function add($request)
    {
        return self::create([
            'text' => $request->text,
            'title' => $request->title,
            'language_id' => $request->language_id,
        ]);
    }
}
