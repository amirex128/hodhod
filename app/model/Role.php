<?php

namespace App\model;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

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
class Role extends Model
{

    use SoftDeletes;

    protected $guarded=[];

    public function permissions()
    {
        return $this->belongsToMany(Permission::class,'permissions_roles')->withTimestamps();
    }

    public function users()
    {
       return $this->belongsToMany(User::class,'roles_users')->withTimestamps();
    }
}
