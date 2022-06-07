<?php

namespace App\Http\Requests;

use App\Models\Profile;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;


class ProfileRequest extends FormRequest
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
            'title' => "required",
            'description' => "required",
            'url'=>"required",
        ];
    }

    public function getProfileData()
    {

        $path = Profile::makeProfileDirectory();

        $data = array_merge($this->validated(), [
            'user_id' => auth()->user()->id,
            'image' => $this->image ? Storage::putFile($path, $this->image) : auth()->user()->profile->image
        ]);

        if($data['image']){
            $image = Image::make(public_path('storage/'.$data['image']))->fit(200,200);
            $image->save();
        }

        return $data;
    }
}