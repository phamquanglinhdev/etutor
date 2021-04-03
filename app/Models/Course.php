<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
class Course extends Model
{
    use CrudTrait;

    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    protected $table = 'courses';
    // protected $primaryKey = 'id';
    // public $timestamps = false;
    protected $guarded = ['id'];
    // protected $fillable = [];
    // protected $hidden = [];
    // protected $dates = [];

    /*
    |--------------------------------------------------------------------------
    | FUNCTIONS
    |--------------------------------------------------------------------------
    */
    public function setSlugAttribute()
    {
        $this->attributes['slug'] = Str::slug($this->name, '-') . '.html';
    }

    public function setUserAttribute()
    {
        $this->attributes['user_id'] = backpack_user()->id;
    }

    public function viewOnWeb($crud = false)
    {
        return '<a class="btn btn-sm btn-link" target="_blank" href="https://bizenglish.vn/course/' . urlencode($this->slug) . '" data-toggle="tooltip" title="Just a demo custom button."><i class="la la-eye"></i> Xem trên web</a>';
    }
    /*
    |--------------------------------------------------------------------------
    | RELATIONS
    |--------------------------------------------------------------------------
    */
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }


//    public function users()
//    {
//        return $this->belongsTo(User::class, 'user_id', 'id');
//    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    public function scopeTeacher($query)
    {
        return $query->where('role', 1);
    }
    public function tags()
    {
        return $this->belongsToMany(Tags::class, 'pivots', 'course_id', 'tag_id');
    }
    /*
    |--------------------------------------------------------------------------
    | SCOPES
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | ACCESSORS
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | MUTATORS
    |--------------------------------------------------------------------------
    */
}
