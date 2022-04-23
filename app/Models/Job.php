<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'category_id',
        'name',
        'description',
        'salary_id',
        'requirement',
        'education_id',
        'shift_id',
        'location_id',
        'created_at',
        'updated_at'
    ];
    

    public function category()
    {
        return $this->belongsTo(Category::class);
    }


    public function user()
    {
        return $this->belongsTo(User::class);
    }


    public function shift()
    {
        return $this->belongsTo(Shift::class);
    }


    public function education()
    {
        return $this->belongsTo(Education::class);
    }

    
    public function salary()
    {
        return $this->belongsTo(Salary::class);
    }


    public function location()
    {
        return $this->belongsTo(Location::class);
    }


}
