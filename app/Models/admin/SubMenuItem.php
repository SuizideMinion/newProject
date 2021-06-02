<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubMenuItem extends Model
{
    use HasFactory;

    protected $fillable = [
      'name',
      'link',
      'status',
      'menu_item_id',
      'icon',
      'target'
    ];

}
