<?php

namespace App\model;
use App\User;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\model\Province
 *
 * @property int $id
 * @property string $name
 * @property array $city
 * @property int|null $price
 * @property string|null $created_at
 * @property string|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\User[] $users
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Province newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Province newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Province query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Province whereCity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Province whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Province whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Province whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Province wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Province whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Province extends Model
{

    protected $guarded=[];
    protected $casts=[
        "city"=>'array'
    ];
    public $timestamps=false;
    public function users()
    {
        return $this->hasMany(User::class);
    }
}
