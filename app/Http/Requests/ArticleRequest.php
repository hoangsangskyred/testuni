<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;
use App\Models\ArticleCategory;
class ArticleRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'title' => 'required',
            'content' => 'required'
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => 'Vui lòng cho biết Tên hiển thị',
            'content.required' => 'Vui lòng cho biết Nội dung bài viết',
        ];
    }

    public function category()
    {
        return $this->belongsTo(ArticleCategory::class, 'article_category_id')
            ->withDefault(['display_name' => '-', 'slug' => null]);
    }

    public function prepareForValidation()
    {
        $this->merge([
            'show' => $this->has('show') ? 'Y' : 'N',
            'title' => Str::title($this->title),
            'avatar_path'=>$this->avatar_path ? $this->avatar_path :'/public/img/article-default-avatar.png',
        ]);
    }
}
