<?php

namespace App\Models;

use App\Models\Category;
use App\Models\Chapter;
use App\Models\Theloai;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Story extends Model
{
    use HasFactory;
    protected $dates = [
        'create_at',
        'update_at',
    ];
    public $timestamps = false;
    protected $fillable = [
        'tentruyen', 'slug', 'tomtat', 'image', 'danhmuc_id', 'theloai_id','kichhoat', 'create_at', 'update_at', 'truyen_noibat'
    ];
    protected $primaryKey = 'id';
    protected $table = 'truyen';

    public function danhmuctruyen() {
        return $this->belongsTo(Category::class, 'danhmuc_id', 'id');
    }

    public function theloaitruyen() {
        return $this->belongsTo(Theloai::class, 'theloai_id', 'id');
    }

    public function chapter() {
        return $this->hasMany(Chapter::class, 'truyen_id', 'id');
    }

    public function thuocnhieudanhmuctruyen() {
        return $this->belongsToMany(Category::class, 'thuocdanh', 'truyen_id', 'danhmuc_id');
    }

    public function thuocnhieutheloaitruyen() {
        return $this->belongsToMany(Theloai::class, 'thuocloai', 'truyen_id', 'theloai_id');
    }
}
