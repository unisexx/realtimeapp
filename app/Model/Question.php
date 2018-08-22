<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Question extends Model
{
    public function getRouteKeyName()
    {
        return 'slug';
    }

    // protected $fillable = ['title','slug','body','category_id','user_id'];
    protected $guarded = []; // ถ้าเป็นแบบนี้แสดงว่าบันทึกลงทุกช่อง เพราะไม่ได้ ignore ฟิลด์ไหนเลย

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function replies()
    {
        return $this->hasMany(Reply::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function getPathAttribute()
    {
        // return asset("api/question/$this->slug");
        return "/question/$this->slug";
    }
}
