<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

/**
 * App\model\Media
 *
 * @property int $id
 * @property string $name_user
 * @property string $name_host
 * @property string|null $mime_type
 * @property string $path
 * @property int $size
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Media newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Media newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Media query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Media whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Media whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Media whereMimeType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Media whereNameHost($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Media whereNameUser($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Media wherePath($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Media whereSize($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Media whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Media extends Model
{
    //
}
