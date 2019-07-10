<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\model\Size
 *
 * @property int $id
 * @property string $title
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\model\Product[] $Products
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Size newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Size newQuery()
 * @method static \Illuminate\Database\Query\Builder|\App\model\Size onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Size query()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Size whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Size whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Size whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Size whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Size whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\model\Size withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\model\Size withoutTrashed()
 * @mixin \Eloquent
 */
class Size extends Model
{

    use SoftDeletes;

    protected $guarded=[];
	
	public function Products()
	{
		return $this->belongsToMany(Product::class)->withTimestamps();
		
    }
}
