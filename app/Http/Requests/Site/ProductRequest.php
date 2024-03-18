<?php

namespace App\Http\Requests\Site;

use App\Product;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class ProductRequest extends FormRequest
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
            'title' => 'required',
            'description' => 'required',
            'no_of_beds' => 'required|numeric',
            'no_of_guests' => 'required|numeric',
            'area' => 'required|numeric',
            'price' => 'required',
            'region' => 'required',
            'address' => 'required',
            'type' => 'required',
            'amenities' => 'required',
            'images' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Please enter your ad title',
            'description.required' => 'Please enter your ad description',
            'no_of_beds.required' => 'Please enter the number of beds allowed',
            'no_of_beds.numeric' => 'Number of beds must be numeric',
            'no_of_guests.required' => 'Please enter the number of guests allowed',
            'no_of_guests.numeric' => 'Number of guests must be numeric',
            'area.required' => 'Please enter the area ',
            'area.numeric' => 'Area should be numbers',
            'price.required' => 'Please enter the price for a night',
            'region.required' => 'Please enter the region',
            'address.required' => 'Please enter the address',
            'type.required' => 'Please choose the property type',
            'amenities.required' => 'Please choose amenities allowed for this property',
            'images.required' => 'Please enter the property images'
        ];
    }

    public function store()
    {
        $product = new Product();

        $product->title = $this->title;
        $product->slug = Product::where('slug' , Str::slug($this->title , '-'))->first() ? Str::slug($this->title , '-').''.rand(0 , 9) : Str::slug($this->title , '-');
        $product->description = $this->description;
        $product->no_of_beds = $this->no_of_beds;
        $product->no_of_guests = $this->no_of_guests;
        $product->area = $this->area;
        $product->price = $this->price;
        $product->region = $this->region;
        $product->address = $this->address;
        $product->type = $this->type;
        $product->amenities = json_encode($this->amenities);
        $product->city_id = $this->city_id;
        $product->user_id = auth()->id();

        if ($product->save()){
            for ($i=0 ; $i < sizeof($this->images) ; $i++){
                $product->images()->create([
                    'image' => $this->images[$i]->hashName()
                ]);
                $this->images[$i]->store('products');
                Image::make(storage_path('uploads/products/'.$this->images[$i]->hashName()))
                    ->resize(767 , 470)
                    ->save(storage_path('uploads/products/'.$this->images[$i]->hashName()));
            }
        }
    }
}
