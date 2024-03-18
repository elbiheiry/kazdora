<?php

namespace App\Http\Requests\Site;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
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

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json(['status' => 'error' , 'data' => $validator->errors()->first()] , 500));
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'first_name' => 'required',
            'last_name' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'image' => 'max:5120'
        ];
    }

    public function messages()
    {
        return [
            'first_name.required' => 'Please enter your first name',
            'last_name.required' => 'Please enter your last name',
            'phone.required' => 'Please enter your phone number',
            'address.required' => 'Please enter your address',
            'image.max' => 'Maximum size allowed for image is 5MB'
        ];
    }

    public function edit()
    {
        $user = auth()->user();

        $user->first_name = $this->first_name;
        $user->last_name = $this->last_name;
        $user->phone = $this->phone;
        $user->address = $this->address;
        if ($this->image){
//            dd($this->image);
            if (file_exists('storage/uploads/users/'.$user->image)){
                @unlink(storage_path('uploads/users/'.$user->image));
            }

            $this->image->store('users');
            $user->image = $this->image->hashName();
            Image::make(storage_path('uploads/users/'.$this->image->hashName()))
                ->resize(200 , 200)
                ->save(storage_path('uploads/users/'.$this->image->hashName()));
        }

        $user->save();
    }
}
