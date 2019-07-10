<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * App\model\Slider
 *
 * @property int $id
 * @property string $title
 * @property string $image
 * @property int $status
 * @property int $type
 * @property mixed|null $selected
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Slider newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Slider newQuery()
 * @method static \Illuminate\Database\Query\Builder|\App\model\Slider onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Slider query()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Slider whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Slider whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Slider whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Slider whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Slider whereSelected($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Slider whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Slider whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Slider whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Slider whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\model\Slider withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\model\Slider withoutTrashed()
 * @mixin \Eloquent
 */
class Slider extends Model
{

    use SoftDeletes;

    protected $guarded=['id'];
	
	protected $casts=[
    	'selected'=>'Array'
    ];

    public function media()
    {
        return $this->morphToMany(Media::class,"mediable");
    }
}
