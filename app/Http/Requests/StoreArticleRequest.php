<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreArticleRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'spaceflight_id' => 'required|unique:articles,article_id',
            'title' => 'required|string',
            'url' => 'required|url',
            'image_url' => 'required|url',
            'news_site' => 'required|string',
            'summary' => 'required|string',
            'published_at' => 'required|date',
            'last_updated_at' => 'required|date',
            'featured' => 'required|boolean',
            'events' => 'array|nullable',
            'events.*.event_id' => 'required_if:events,!=,null|uuid',
            'events.*.provider' => 'required_if:events,!=,null|string',
            'launches' => 'array|nullable',
            'launches.*.launch_id' => 'required_if:launches,!=,null|uuid',
            'launches.*.provider' => 'required_if:launches,!=,null|string'
        ];
    }
}
