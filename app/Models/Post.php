<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;


class Post extends Model
{
    use HasFactory;

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    public static function makeDirectory()
    {
        $subFolder = 'posts/' . date('Y-m-d');
        Storage::makeDirectory($subFolder);
        return $subFolder;
    }

    public function getImageUrl()
    {
        return Storage::url($this->image);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}