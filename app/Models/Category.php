<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
class Category extends Model
{
    protected $table='categories';
    protected $fillable = ['title', 'slug', 'rank', 'image', 'icon', 'description', 'status', 'created_by', 'updated_by'];


    public function createdBy()
    {
        return $this->belongsTo(User::class,'created_by','id');
    }
    public function updatedBy()
    {
        return $this->belongsTo(User::class,'updated_by','id');
    }
}
