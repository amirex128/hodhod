<?php

namespace App\model;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\model\Discount
 *
 * @property int $id
 * @property int $user_id
 * @property string|null $title
 * @property string|null $code
 * @property int|null $price
 * @property int|null $type
 * @property int|null $max_user
 * @property int|null $max_price
 * @property int|null $min_price
 * @property array|null $users
 * @property array|null $categories
 * @property string|null $expire
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read mixed $day
 * @property-read mixed $month
 * @property-read mixed $year
 * @property-read \App\model\Order $order
 * @property-read \App\User $user
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Discount newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Discount newQuery()
 * @method static \Illuminate\Database\Query\Builder|\App\model\Discount onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Discount query()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Discount whereCategories($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Discount whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Discount whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Discount whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Discount whereExpire($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Discount whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Discount whereMaxPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Discount whereMaxUser($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Discount whereMinPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Discount wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Discount whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Discount whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Discount whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Discount whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Discount whereUsers($value)
 * @method static \Illuminate\Database\Query\Builder|\App\model\Discount withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\model\Discount withoutTrashed()
 * @mixin \Eloquent
 */
class Discount extends Model
{
    use SoftDeletes;

    protected $appends = ['day', 'month', 'year'];
    protected $guarded = [];
    protected $casts = ['users' => 'array', 'categories' => 'array'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function order()
    {
        return $this->belongsTo(Order::class);
    }


    // in this segment i use Accessor for create three virtual Attribute such as day,month,year that extract from expire attribute in database
    public function getDayAttribute($value)
    {
        return jdate($this->expire)->getDay();
    }

    public function getMonthAttribute($value)
    {
        return jdate($this->expire)->getMonth();
    }

    public function getYearAttribute($value)
    {
        return jdate($this->expire)->getYear();
    }
}
