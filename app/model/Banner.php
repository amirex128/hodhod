<?php
	
	namespace App\model;
	
	use Illuminate\Database\Eloquent\Model;
    use Illuminate\Database\Eloquent\SoftDeletes;

    /**
 * App\model\Banner
 *
 * @property int $id
 * @property string $title
 * @property array|null $image1
 * @property string|null $image2
 * @property int $side
 * @property int $position
 * @property int $priority
 * @property int $status
 * @property array $type
 * @property array|null $select
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Banner newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Banner newQuery()
 * @method static \Illuminate\Database\Query\Builder|\App\model\Banner onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Banner query()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Banner whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Banner whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Banner whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Banner whereImage1($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Banner whereImage2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Banner wherePosition($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Banner wherePriority($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Banner whereSelect($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Banner whereSide($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Banner whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Banner whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Banner whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Banner whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\model\Banner withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\model\Banner withoutTrashed()
 * @mixin \Eloquent
 */
class Banner extends Model
	{

        use SoftDeletes;

        protected $casts = [
			'select' => 'array' ,
			'image1' => 'array' ,
			'type' => 'array' ,
		];
		
		protected $guarded = ['id'];
	}
