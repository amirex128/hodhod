<?php

namespace App\model;

use App\Event\Event\newOrderEvent;
use App\User;
use Illuminate\Database\Eloquent\Model;

/**
 * App\model\Order
 *
 * @property int $id
 * @property int $user_id
 * @property int|null $discount_id
 * @property int|null $province_id
 * @property int|null $payment_type
 * @property int|null $surprize
 * @property string|null $receiver_name
 * @property string|null $receiver_mobile
 * @property string|null $state
 * @property string|null $city
 * @property string|null $address
 * @property array|null $location
 * @property string|null $postal_code
 * @property string|null $home_phone
 * @property string|null $code_phone
 * @property string|null $admin_description
 * @property string|null $user_description
 * @property int|null $total_price
 * @property int|null $total_raw
 * @property int|null $discount_price
 * @property int|null $province_price
 * @property int|null $payment_status
 * @property int|null $time_receive
 * @property string|null $receive_at
 * @property string|null $payment_reference
 * @property string|null $payment_authority
 * @property int|null $status
 * @property int|null $visit
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\model\Discount|null $discount
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\model\OrderItem[] $order_item
 * @property-read \App\model\Province|null $province
 * @property-read \App\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Order newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Order newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Order query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Order whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Order whereAdminDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Order whereCity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Order whereCodePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Order whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Order whereDiscountId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Order whereDiscountPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Order whereHomePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Order whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Order whereLocation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Order wherePaymentAuthority($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Order wherePaymentReference($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Order wherePaymentStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Order wherePaymentType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Order wherePostalCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Order whereProvinceId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Order whereProvincePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Order whereReceiveAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Order whereReceiverMobile($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Order whereReceiverName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Order whereState($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Order whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Order whereSurprize($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Order whereTimeReceive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Order whereTotalPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Order whereTotalRaw($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Order whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Order whereUserDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Order whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Order whereVisit($value)
 * @mixin \Eloquent
 */
class Order extends Model
{

    protected $guarded = [];

    protected static function boot()
    {
        parent::boot(); // TODO: Change the autogenerated stub
        self::created(function ($order) {
            event(new newOrderEvent($order));
        });
    }



    protected $casts = [
        'location' => 'array'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function discount()
    {
        return $this->belongsTo(Discount::class);
    }

    public function order_item()
    {
        return $this->hasMany(OrderItem::class, "order_id");
    }

    public function province()
    {
        return $this->belongsTo(Province::class);
    }
}