<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'type_id',
        'image_path',
        'image_originale_name',
        'slug',
        'description',
        'technologies',
        'start',
        'end'
    ];

    public function type(){
        return $this->belongsTo(Type::class);
    }

    public function technologies(){
        return $this->belongsToMany(Technology::class);
    }

    public static function generateSlug($str){

        $slug = Str::slug($str, '-');
        $original_slug = $slug;
        $slug_exixts = Post::where('slug', $slug)->first();
        $c = 1;
        while($slug_exixts){
            $slug = $original_slug . '-' . $c;
            $slug_exixts = Post::where('slug', $slug)->first();
            $c++;
        }

        return $slug;
    }
}
