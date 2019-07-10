<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\model{
/**
 * App\model\Article
 *
 * @property int $id
 * @property int $user_id
 * @property string|null $title
 * @property string|null $description
 * @property string|null $body
 * @property string|null $image
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\model\Category[] $categories
 * @property-read \App\User $user
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Article newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Article newQuery()
 * @method static \Illuminate\Database\Query\Builder|\App\model\Article onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Article query()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Article whereBody($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Article whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Article whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Article whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Article whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Article whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Article whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Article whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Article whereUserId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\model\Article withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\model\Article withoutTrashed()
 * @mixin \Eloquent
 */
	class Article extends \Eloquent {}
}

namespace App\model{
/**
 * App\model\Banner
 *
 * @property int $id
 * @property string $title
 * @property array|null $image1
 * @property string|null $image2
 * @property int $side
 * @property int $position
 * @property int $priority
 * @property int $status
 * @property array $type
 * @property array|null $select
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Banner newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Banner newQuery()
 * @method static \Illuminate\Database\Query\Builder|\App\model\Banner onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Banner query()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Banner whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Banner whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Banner whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Banner whereImage1($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Banner whereImage2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Banner wherePosition($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Banner wherePriority($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Banner whereSelect($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Banner whereSide($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Banner whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Banner whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Banner whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Banner whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\model\Banner withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\model\Banner withoutTrashed()
 * @mixin \Eloquent
 */
	class Banner extends \Eloquent {}
}

namespace App\model{
/**
 * App\model\Brand
 *
 * @property int $id
 * @property string $title
 * @property string $image
 * @property string $url
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\model\Product[] $Products
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Brand newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Brand newQuery()
 * @method static \Illuminate\Database\Query\Builder|\App\model\Brand onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Brand query()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Brand whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Brand whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Brand whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Brand whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Brand whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Brand whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Brand whereUrl($value)
 * @method static \Illuminate\Database\Query\Builder|\App\model\Brand withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\model\Brand withoutTrashed()
 * @mixin \Eloquent
 */
	class Brand extends \Eloquent {}
}

namespace App\model{
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
	class Category extends \Eloquent {}
}

namespace App\model{
/**
 * App\model\Color
 *
 * @property int $id
 * @property string $title
 * @property string $code
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\model\Product[] $products
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Color newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Color newQuery()
 * @method static \Illuminate\Database\Query\Builder|\App\model\Color onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Color query()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Color whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Color whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Color whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Color whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Color whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Color whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\model\Color withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\model\Color withoutTrashed()
 * @mixin \Eloquent
 */
	class Color extends \Eloquent {}
}

namespace App\model{
/**
 * App\model\Comment
 *
 * @property int $id
 * @property int $user_id
 * @property int $ticket_id
 * @property string $comment
 * @property string|null $type
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read mixed $time
 * @property-read \App\model\Ticket $ticket
 * @property-read \App\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Comment newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Comment newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Comment query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Comment whereComment($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Comment whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Comment whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Comment whereTicketId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Comment whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Comment whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Comment whereUserId($value)
 * @mixin \Eloquent
 */
	class Comment extends \Eloquent {}
}

namespace App\model{
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
	class Design extends \Eloquent {}
}

namespace App\model{
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
	class Discount extends \Eloquent {}
}

namespace App\model{
/**
 * App\model\Media
 *
 * @property int $id
 * @property string $name_user
 * @property string $name_host
 * @property string|null $mime_type
 * @property string $path
 * @property int $size
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Media newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Media newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Media query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Media whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Media whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Media whereMimeType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Media whereNameHost($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Media whereNameUser($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Media wherePath($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Media whereSize($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Media whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class Media extends \Eloquent {}
}

namespace App\model{
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
	class Order extends \Eloquent {}
}

namespace App\model{
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
	class OrderItem extends \Eloquent {}
}

namespace App\model{
/**
 * App\model\Permission
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $label
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\model\Role[] $roles
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Permission newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Permission newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Permission query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Permission whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Permission whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Permission whereLabel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Permission whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Permission whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class Permission extends \Eloquent {}
}

namespace App\model{
/**
 * App\model\Product
 *
 * @property int $id
 * @property int|null $user_id
 * @property int|null $brand_id
 * @property string $title
 * @property string|null $description
 * @property string|null $body
 * @property string|null $video
 * @property string $code
 * @property array $related
 * @property int $stock
 * @property int $price
 * @property int $offer
 * @property string $image
 * @property array|null $gallery
 * @property int $special
 * @property int $status
 * @property int $situation
 * @property int $view_count
 * @property int $order_count
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\model\Brand|null $brand
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\model\Category[] $categories
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\model\Color[] $colors
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\model\Design[] $designs
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\model\OrderItem[] $order_item
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\model\Size[] $sizes
 * @property-read \App\User|null $user
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Product newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Product newQuery()
 * @method static \Illuminate\Database\Query\Builder|\App\model\Product onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Product query()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Product whereBody($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Product whereBrandId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Product whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Product whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Product whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Product whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Product whereGallery($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Product whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Product whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Product whereOffer($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Product whereOrderCount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Product wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Product whereRelated($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Product whereSituation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Product whereSpecial($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Product whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Product whereStock($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Product whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Product whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Product whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Product whereVideo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Product whereViewCount($value)
 * @method static \Illuminate\Database\Query\Builder|\App\model\Product withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\model\Product withoutTrashed()
 * @mixin \Eloquent
 */
	class Product extends \Eloquent {}
}

namespace App\model{
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
	class Province extends \Eloquent {}
}

namespace App\model{
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
	class Qas extends \Eloquent {}
}

namespace App\model{
/**
 * App\model\Role
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $label
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\model\Permission[] $permissions
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\User[] $users
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Role newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Role newQuery()
 * @method static \Illuminate\Database\Query\Builder|\App\model\Role onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Role query()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Role whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Role whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Role whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Role whereLabel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Role whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Role whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\model\Role withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\model\Role withoutTrashed()
 * @mixin \Eloquent
 */
	class Role extends \Eloquent {}
}

namespace App\model{
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
	class Setting extends \Eloquent {}
}

namespace App\model{
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
	class Size extends \Eloquent {}
}

namespace App\model{
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
	class Slider extends \Eloquent {}
}

namespace App\model{
/**
 * App\model\SmsRegister
 *
 * @property int $id
 * @property string $phone
 * @property int $code
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\SmsRegister newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\SmsRegister newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\SmsRegister query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\SmsRegister whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\SmsRegister whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\SmsRegister whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\SmsRegister wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\SmsRegister whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class SmsRegister extends \Eloquent {}
}

namespace App\model{
/**
 * App\model\Social
 *
 * @property int $id
 * @property string $title
 * @property string $image
 * @property string $url
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Social newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Social newQuery()
 * @method static \Illuminate\Database\Query\Builder|\App\model\Social onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Social query()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Social whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Social whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Social whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Social whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Social whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Social whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Social whereUrl($value)
 * @method static \Illuminate\Database\Query\Builder|\App\model\Social withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\model\Social withoutTrashed()
 * @mixin \Eloquent
 */
	class Social extends \Eloquent {}
}

namespace App\model{
/**
 * App\model\Ticket
 *
 * @property int $id
 * @property int $user_id
 * @property int $category_id
 * @property string|null $title
 * @property string|null $message
 * @property string|null $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\model\Category $category
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\model\Comment[] $comments
 * @property-read mixed $time
 * @property-read \App\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Ticket newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Ticket newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Ticket query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Ticket whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Ticket whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Ticket whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Ticket whereMessage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Ticket whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Ticket whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Ticket whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Ticket whereUserId($value)
 * @mixin \Eloquent
 */
	class Ticket extends \Eloquent {}
}

namespace App{
/**
 * App\User
 *
 * @property int $id
 * @property string $name
 * @property string|null $lname
 * @property int|null $sex
 * @property string|null $postal_code
 * @property string|null $phone
 * @property string|null $avatar
 * @property int|null $province_id
 * @property string|null $city
 * @property int|null $status
 * @property string|null $address
 * @property int|null $sms_status
 * @property int|null $filled
 * @property string|null $mac
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\model\Comment[] $Comments
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\model\Article[] $articles
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\model\Order[] $order
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\model\Product[] $products
 * @property-read \App\model\Province|null $province
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\model\Role[] $roles
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\model\Ticket[] $ticket
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User newQuery()
 * @method static \Illuminate\Database\Query\Builder|\App\User onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User query()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereAvatar($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereCity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereFilled($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereLname($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereMac($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User wherePostalCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereProvinceId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereSex($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereSmsStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\User withoutTrashed()
 * @mixin \Eloquent
 */
	class User extends \Eloquent {}
}

