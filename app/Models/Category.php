<?php

namespace App\Models;

use App\Models\Story;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'tendanhmuc', 'slug', 'mota', 'kichhoat'
    ];
    protected $primaryKey = 'id';
    protected $table = 'danhmuc';

    public function truyen() {
        return $this->hasMany(Story::class, 'danhmuc_id', 'id');
    }
}
