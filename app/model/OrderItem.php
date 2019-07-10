<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

/**
 * App\model\OrderItem
 *
 * @property int $id
 * @property int|null $order_id
 * @property int|null $product_id
 * @property int|null $color_id
 * @property int|null $size_id
 * @property int|null $count
 * @property int|null $price
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\model\Color|null $color
 * @property-read \App\model\Order|null $order
 * @property-read \App\model\Product|null $product
 * @property-read \App\model\Size|null $size
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\OrderItem newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\OrderItem newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\OrderItem query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\OrderItem whereColorId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\OrderItem whereCount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\OrderItem whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\OrderItem whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\OrderItem whereOrderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\OrderItem wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\OrderItem whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\OrderItem whereSizeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\OrderItem whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class OrderItem extends Model
{

    protected $table="order_items";
    protected $guarded=[];


    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function color()
    {
        return $this->belongsTo(Color::class);
    }

    public function size()
    {
        return $this->belongsTo(Size::class);
    }
}
