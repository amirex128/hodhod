<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\model\Design
 *
 * @property int $id
 * @property string $title
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\model\Design[] $designs
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Design newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Design newQuery()
 * @method static \Illuminate\Database\Query\Builder|\App\model\Design onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Design query()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Design whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Design whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Design whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Design whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Design whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\model\Design withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\model\Design withoutTrashed()
 * @mixin \Eloquent
 */
class Design extends Model
{

    use SoftDeletes;

    protected $guarded=['id'];
	
	public function designs()
	{
		return $this->belongsToMany(Design::class)->withTimestamps();
		
	}

    public function media()
    {
        return $this->morphToMany(Media::class,"mediable");
    }
}
