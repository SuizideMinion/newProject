<?php

namespace App\Models\admin\users;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
  use HasFactory;

  protected $fillable = ['name', 'email', 'created_at', 'updated_at', 'is_admin', 'closed', 'reason'];

}
