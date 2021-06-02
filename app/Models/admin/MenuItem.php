<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MenuItem extends Model
{
    use HasFactory;

    protected $fillable = [
      'name',
      'link',
      'status',
      'menu',
      'icon',
      'target'
    ];

    public function submenus()
    {
      return $this->hasMany('App\Models\admin\SubMenuItem')->where('status', '1');
    }
    public function submenusadmin()
    {
      return $this->hasMany('App\Models\admin\SubMenuItem');
    }
}
