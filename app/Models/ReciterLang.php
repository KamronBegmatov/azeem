<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\ReciterLang
 *
 * @property-read \App\Models\Language $language
 * @property-read \App\Models\Reciter $reciter
 * @property-read \App\Models\Style $style
 * @method static \Illuminate\Database\Eloquent\Builder|ReciterLang newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ReciterLang newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ReciterLang query()
 * @mixin \Eloquent
 * @property int $id
 * @property string $name
 * @property string $info
 * @property int $reciter_id
 * @property int $style_id
 * @property int $language_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|ReciterLang whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ReciterLang whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ReciterLang whereInfo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ReciterLang whereLanguageId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ReciterLang whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ReciterLang whereReciterId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ReciterLang whereStyleId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ReciterLang whereUpdatedAt($value)
 */
class ReciterLang extends Model
{
    protected $guarded=[];

    public function style(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Style::class);
    }

    public function language(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Language::class);
    }

    public function reciter(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Reciter::class);
    }

    public static function add($request)
    {
        return self::create([
            'name' => $request->name,
            'info' => $request->info,
            'reciter_id' => $request->reciter_id,
            'style_id' => $request->style_id,
            'language_id' => $request->language_id
        ]);
    }
}
