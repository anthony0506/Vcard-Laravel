<?php

namespace App\Http\Requests;

use App\Models\Gallery;
use Illuminate\Foundation\Http\FormRequest;

class CreateGalleryRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        $rules = Gallery::$rules;
        if ($this->type == Gallery::TYPE_IMAGE) {
            $rules['image'] = 'mimes:jpg,png,jpeg,webp,gif';
        }
        if ($this->type == Gallery::TYPE_FILE) {
            $rules['gallery_upload_file'] = 'file|mimes:txt,xls,xlsx,csv,xml,pdf,doc,docx';
        }

        return $rules;
    }
}
