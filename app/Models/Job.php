<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;

    protected $fillable = ['user_id','category_id','name','description'];
    

    public function category()
    {
        return $this->belongsTo(JobCategory::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
