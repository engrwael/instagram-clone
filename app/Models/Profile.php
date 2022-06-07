<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Profile extends Model
{
    use HasFactory;

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public static function makeProfileDirectory()
    {
        $username = auth()->user()->username;
        $subfolder = 'profiles/' . $username;
        Storage::makeDirectory($subfolder);
        return $subfolder;
    }

    public function getImageUrl()
    {
        return Storage::url($this->image);
    }

    public function followers()
    {
        return $this->belongsToMany(User::class);
    }
}