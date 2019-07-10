<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

/**
 * App\model\Setting
 *
 * @property int $id
 * @property string|null $name
 * @property array|null $value
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Setting newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Setting newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Setting query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Setting whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Setting whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Setting whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Setting whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Setting whereValue($value)
 * @mixin \Eloquent
 */
class Setting extends Model
{
    public $autoincrement = false;

    protected $guarded=[];
    protected $casts=[
        "value"=>'array'
    ];
}
