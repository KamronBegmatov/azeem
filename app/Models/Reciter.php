<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image as Intervention;

/**
 * App\Models\Reciter
 *
 * @property int $id
 * @property string $name
 * @property string $info
 * @property string $image
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Sura[] $suras
 * @property-read int|null $suras_count
 * @method static \Illuminate\Database\Eloquent\Builder|Reciter newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Reciter newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Reciter query()
 * @method static \Illuminate\Database\Eloquent\Builder|Reciter whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Reciter whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Reciter whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Reciter whereInfo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Reciter whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Reciter whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property string $style
 * @method static \Illuminate\Database\Eloquent\Builder|Reciter whereStyle($value)
 * @property string $title
 * @method static \Illuminate\Database\Eloquent\Builder|Reciter whereTitle($value)
 */
class Reciter extends Model
{
    protected $guarded=[];

    public function suras(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Sura::class);
    }

    public static function add($request)
    {
        $reciter = self::create([
            'title' => $request->title
        ]);

        $image_db = $reciter->saveImage($request);

        $reciter->image = $image_db;

        $reciter->save();
    }

    public function edit($request)
    {
        if ($request->has('title')) {
            $this->title = $request->title;
        }

        if ($request->has('image')) {
            Storage::disk('public')->delete($this->image);
            $image = Intervention::make($request->image);
            $image->save(public_path('storage/reciters/'.$image->filename.'.webp'));
            $this->image = 'reciters/' . $image->filename . '.webp';
        }

        $this->save();
    }

    public function saveImage($request): string
    {
        $image = Intervention::make($request->image);

        if (!file_exists('storage/reciters/' . $this->id)) {
            mkdir('storage/reciters/' . $this->id, 0777, true);
        }

        $image->save(public_path('storage/reciters/' . $this->id . '/' . $image->filename . '.webp'));

        return 'reciters/' . $this->id . '/' . $image->filename . '.webp';
    }
}
