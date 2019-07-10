<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\model\Color
 *
 * @property int $id
 * @property string $title
 * @property string $code
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\model\Product[] $products
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Color newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Color newQuery()
 * @method static \Illuminate\Database\Query\Builder|\App\model\Color onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Color query()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Color whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Color whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Color whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Color whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Color whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Color whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\model\Color withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\model\Color withoutTrashed()
 * @mixin \Eloquent
 */
class Color extends Model
{

    use SoftDeletes;

    protected $guarded=['id'];
	
	public function products()
	{
		return $this->belongsToMany(Product::class)->withTimestamps();
		
	}
}
