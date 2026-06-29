<?php

namespace App\Http\Requests;

use App\Models\StudyTrack;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreStudyTrackRequest extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => ['required', 'string', 'max:120'],
            'area' => ['required', 'string', 'max:80'],
            'level' => ['required', Rule::in(array_keys(StudyTrack::levels()))],
            'status' => ['required', Rule::in(array_keys(StudyTrack::statuses()))],
            'target_hours' => ['required', 'integer', 'min:1', 'max:500'],
            'completed_hours' => ['required', 'integer', 'min:0', 'lte:target_hours'],
            'start_date' => ['nullable', 'date'],
            'due_date' => ['nullable', 'date', 'after_or_equal:start_date'],
            'notes' => ['nullable', 'string', 'max:2000'],
        ];
    }
}
