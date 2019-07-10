<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * App\model\Brand
 *
 * @property int $id
 * @property string $title
 * @property string $image
 * @property string $url
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\model\Product[] $Products
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Brand newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Brand newQuery()
 * @method static \Illuminate\Database\Query\Builder|\App\model\Brand onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Brand query()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Brand whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Brand whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Brand whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Brand whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Brand whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Brand whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Brand whereUrl($value)
 * @method static \Illuminate\Database\Query\Builder|\App\model\Brand withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\model\Brand withoutTrashed()
 * @mixin \Eloquent
 */
class Brand extends Model
{

    use SoftDeletes;

    protected $guarded=['id'];
	
	public function Products()
	{
		return $this->hasMany(Product::class);
	}
}
