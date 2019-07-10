<?php

namespace App\model;

use App\User;
use Illuminate\Database\Eloquent\Model;

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
class Comment extends Model
{

    protected $guarded=[];

    protected $appends=["time"];

    public function getTimeAttribute()
    {
        return \Morilog\Jalali\Jalalian::forge($this->created_at)->ago();
    }

    public function ticket()
    {
        return $this->belongsTo(Ticket::class);
	}

    public function user()
    {
        return $this->belongsTo(User::class);
	}
}
