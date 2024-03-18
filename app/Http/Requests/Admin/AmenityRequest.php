<?php

namespace App\Http\Requests\Admin;

use App\Amenity;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Intervention\Image\Facades\Image;

class AmenityRequest extends FormRequest
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

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json(['status' => 'error' ,'data' => $validator->errors()->first()] , 500));
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'image' => request()->route()->getName() == 'admin.amenities' ? 'required|max:5120' : 'max:5120'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Please enter amenity name',
            'image.required' => request()->route()->getName() == 'admin.amenities' ? 'Please enter amenity image' : ''
        ];
    }

    public function store()
    {
        $amenity = new Amenity();

        $amenity->name = $this->name;
        $this->image->store('amenities');
        $amenity->image = $this->image->hashName();
        Image::make(storage_path('uploads/amenities/' .$this->image->hashName()))
            ->resize(25 , 25)
            ->save(storage_path('uploads/amenities/' .$this->image->hashName()));

        $amenity->save();
    }

    public function edit($id)
    {
        $amenity = Amenity::find($id);

        $amenity->name = $this->name;
        if ($this->image){
            @unlink(storage_path('uploads/amenities/' . $amenity->image));
            $this->image->store('amenities');
            $amenity->image = $this->image->hashName();
            Image::make(storage_path('uploads/amenities/' .$this->image->hashName()))
                ->resize(25 , 25)
                ->save(storage_path('uploads/amenities/' .$this->image->hashName()));
        }

        $amenity->save();
    }
}
