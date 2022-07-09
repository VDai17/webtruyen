<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sach extends Model
{
    use HasFactory;
    protected $dates = [
        'create_at',
        'update_at',
    ];
    public $timestamps = false;
    protected $fillable = [
        'tensach', 'slug', 'tomtat', 'hinhsach', 'views', 'kichhoat', 'create_at', 'update_at', 'tukhoa', 'noidung'
    ];
    protected $primaryKey = 'id';
    protected $table = 'sach';

}
