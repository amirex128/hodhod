<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\model\Social
 *
 * @property int $id
 * @property string $title
 * @property string $image
 * @property string $url
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Social newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Social newQuery()
 * @method static \Illuminate\Database\Query\Builder|\App\model\Social onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Social query()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Social whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Social whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Social whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Social whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Social whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Social whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Social whereUrl($value)
 * @method static \Illuminate\Database\Query\Builder|\App\model\Social withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\model\Social withoutTrashed()
 * @mixin \Eloquent
 */
class Social extends Model
{

    use SoftDeletes;

	protected $guarded=['id'];


}
