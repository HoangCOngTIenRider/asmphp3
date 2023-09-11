<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class khoahoc extends Model
{
    use HasFactory,SoftDeletes;
    protected $table="khoa_hoc";
    protected $fillable = ['id','name','price','describe','process','image','id_category'];
}
