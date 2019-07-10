<?php

namespace App\model;

use App\User;
use Illuminate\Database\Eloquent\Model;

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
class Ticket extends Model
{
    protected $guarded = [];

    protected $appends=["time"];

    public function getTimeAttribute()
    {
        return \Morilog\Jalali\Jalalian::forge($this->created_at)->ago();
    }

    public function category()
    {
        return $this->belongsTo(Category::class);

    }

    public function comments()
    {
        return $this->hasMany(Comment::class, 'ticket_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
