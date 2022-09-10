<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Storage;
use App\Models\Category ;
class CategoryUpdateRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255',
            'description' => 'required|string',
            'status' => 'nullable',
            'popular' => 'nullable',
            'meta_title' => 'required|string|max:255',
            'meta_description' => 'required|string|max:255',
            'meta_keywords' => 'required|string|max:255',
            'category_picture' => 'nullable|mimes:png,jpeg,bmp'
        ];
    }


    public function handleRequest($category_id)
    {
        $category = Category::find($category_id) ;
        $allRequestData = $this->validated();
        if ($this->hasFile('category_picture')) {
            if($category['category_picture']) {
                // In Case it Had Old Photo
                // Because Photo is Nullable & Can Be Empty
                Storage::delete($category['category_picture']) ;
            }
            $picture = $this->category_picture;
            $fileName = Storage::putFile('category', $picture);
            $allRequestData['category_picture'] = $fileName;
        }

        $allRequestData['status'] = ($this->status == 'on' ? '1' : '0') ;
        $allRequestData['popular'] = ($this->popular == 'on' ? '1' : '0')   ;

        return $allRequestData;
    }
}
