<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class chapter extends Model
{
    use HasFactory;
    public $timestamps = FALSE;

    protected $table = 'chapter';
    protected $primaryKey = 'id';
    protected $guarded = [];
    protected $fillable  = [
      'title',
      'content',
      'chapter',
      'form_doc',
      'slug'
    ];

  
}
