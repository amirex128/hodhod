<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

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
class SmsRegister extends Model
{

    protected $table="sms_registers";
}
