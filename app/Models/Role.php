<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;
    protected $fillable=[
        'title'
    ];

    public function permission(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Permission::class);
    }

    public function hasPermission(Permission $permission): bool
    {
        $result = $this->permission()->where('permission_id',$permission->id)->exists();
        return $result;
    }

    public function hasStrPermission($permission): bool
    {
        return $this->permission()->where('title' ,$permission)->exists();
     }
}
