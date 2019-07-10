<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\model\Category
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $icon
 * @property string|null $image
 * @property int|null $type
 * @property int|null $parent_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\model\Ticket[] $Tickets
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\model\Article[] $articles
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\model\Category[] $children
 * @property-read mixed $last
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\model\Product[] $products
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Category newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Category newQuery()
 * @method static \Illuminate\Database\Query\Builder|\App\model\Category onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Category query()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Category whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Category whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Category whereIcon($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Category whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Category whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Category whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Category whereParentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Category whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Category whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\model\Category withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\model\Category withoutTrashed()
 * @mixin \Eloquent
 */
class Category extends Model
{

    use SoftDeletes;


    protected $guarded=[];

    protected $appends = ['last'];

    public function getLastAttribute()
    {
        return $this->children()->first() ? true : false;
    }



    protected $parent = 'parent_id';

    public function articles()
	{
		return $this->morphedByMany(Article::class, 'categorical');
	}

    public function Tickets()
    {
        return $this->hasMany(Ticket::class);
    }

	public function products()
	{
		return $this->morphedByMany(Product::class, 'categorical');
	}


/****************************************new System************************************/

    public function children()
	{
		return $this->hasMany(Category::class, 'parent_id');
	}

    public function childrenRecursive()
    {
        return $this->children()->with("childrenRecursive");
	}
    public function childrenRecursiveArticle()
    {
        return $this->children()->whereType(2)->with(["childrenRecursive" => function ($query) {
            $query->whereType(2);
        }]);

    }

    public function childrenRecursiveProduct()
    {
        return $this->children()->whereType(2)->with(["childrenRecursive"=>function($query){
            $query->whereType(1);
        }]);
    }

    public function media()
    {
        return $this->morphToMany(Media::class,"mediable");
    }
}
