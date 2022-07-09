<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Story;

class Chapter extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'truyen_id', 'tieude', 'slug', 'tomtat', 'noidung', 'kichhoat'
    ];
    protected $primaryKey = 'id';
    protected $table = 'chapter';

    public function truyen() {
        return $this->belongsTo(Story::class, 'truyen_id', 'id');
    }
}
