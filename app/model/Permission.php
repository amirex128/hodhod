<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

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
class Permission extends Model
{

    public function roles()
    {
        return $this->belongsToMany(Role::class,'permissions_roles')->withTimestamps();
    }
}
