<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    use HasFactory;
    public $timestamps = FALSE;

    protected $table = 'category';
    protected $primaryKey = 'id';
    protected $guarded = [];
    protected $fillable  = [
      'namecategory',
  
    ];
}
