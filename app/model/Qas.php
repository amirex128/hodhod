<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\model\Qas
 *
 * @property int $id
 * @property string $quest
 * @property string $answer
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Qas newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Qas newQuery()
 * @method static \Illuminate\Database\Query\Builder|\App\model\Qas onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Qas query()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Qas whereAnswer($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Qas whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Qas whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Qas whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Qas whereQuest($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Qas whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\model\Qas withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\model\Qas withoutTrashed()
 * @mixin \Eloquent
 */
class Qas extends Model
{

    use SoftDeletes;

    protected $table='qas';
    protected $guarded=[];
}
