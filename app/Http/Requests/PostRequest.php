<?php

namespace App\Http\Requests;

use App\Models\Post;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;



class PostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'caption' => "required|max:255",
            'image' => "required"
        ];
    }

    public function getPostData()
    {
        $data = $this->validated() + [
            'user_id' => auth()->user()->id
        ];

        if ($this->hasFile('image')) {
            $dir = Post::makeDirectory();
            $data['image'] = Storage::putFile($dir, $this->image);
        }

        $image = Image::make(public_path('storage/'.$data['image']))->fit(400,400);
        $image->save();

        return $data;
    }
}