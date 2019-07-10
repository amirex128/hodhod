<?php

namespace App;

use App\model\Article;
use App\model\Comment;
use App\model\Order;
use App\model\Product;
use App\model\Province;
use App\model\Role;
use App\model\Ticket;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notifiable;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Auth\Notifications\ResetPassword as ResetPasswordNotification;
use Illuminate\Support\Facades\Lang;

class ResetPasswordCustom extends ResetPasswordNotification
{
    public function toMail($notifiable)
    {
        if (static::$toMailCallback) {
            return call_user_func(static::$toMailCallback, $notifiable, $this->token);
        }

        return (new MailMessage)
            ->subject(Lang::getFromJson('لینک فعال سازی تغییر رمز عبور '))
            ->line(Lang::getFromJson('شما این پیام را به این دلیل دریافت کردید که در خواستی از طرف شما برای ما جهت تغییر رمز عبور ارسال شده'))
            ->action(Lang::getFromJson('تغییر رمز عبور'), url(config('app.url').route('password.reset', ['token' => $this->token, 'email' => $notifiable->getEmailForPasswordReset()], false)))
            ->line(Lang::getFromJson('لینک تغییر رمز عبور پسورد شما تا  :count دقیقه دیگر منسوخ میشود', ['count' => config('auth.passwords.users.expire')]))
            ->line(Lang::getFromJson('اگر شما نمیخواهید پسورد شما تغغیر کند هیچ اقدامی نیاز نیست انجام دهید'));
    }

}

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
class User extends Authenticatable implements JWTSubject
{
    use SoftDeletes;

    use Notifiable;

    public function sendPasswordResetNotification($token)
    {

        $this->notify(new ResetPasswordCustom($token));

    }


    protected $guarded = ['id'];
    protected $hidden = [
        'password', 'remember_token',
    ];
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected static function boot()
    {
        parent::boot(); // TODO: Change the autogenerated

        self::addGlobalScope('order', function (Builder $builder) {
            $builder->orderBy('name');
        });

        self::creating(function ($model) {

        });
    }

    public function hasRole($role)
    {
        if (is_string($role)){
            // roles was sent if string
          return  $this->roles->contains('name',$role);


            // roles was sent if array
        }else{
            foreach ($role as $r){

                // send role to condition if string was sent
                if( $this->hasRole($r))
                    return true;

            }
        }
         return false;
    }

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }

    public function articles()
    {
        return $this->hasMany(Article::class);

    }

    public function products()
    {
        return $this->hasMany(Product::class);

    }

    public function Comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function ticket()
    {
        return $this->hasMany(Ticket::class);
    }

    public function province()
    {
        return $this->belongsTo(Province::class);
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class,'roles_users')->withTimestamps();
    }

    public function order()
    {
        return $this->hasMany(Order::class);
    }
}
