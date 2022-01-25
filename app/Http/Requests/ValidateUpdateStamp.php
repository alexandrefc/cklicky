<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidateUpdateStamp extends FormRequest
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
        return [
            'title'=>'required|string|max:255',
            'description'=>'nullable|string|max:255', 
            'image' => 'nullable|mimes:jpg,png,jpeg|max:2048',
            'imageFS' => 'nullable|mimes:jpg,png,jpeg|max:2048',
            'videoYtId'=>'nullable|string|max:255',
            'managerEmail'=>'required|email',
            'category'=>'nullable|integer',
            'startDate'=>'nullable|date',
            'endDate'=>'nullable|date',
            'xTimeToRedeem'=>'nullable|integer',
            'period'=>'nullable|string|max:255',
            'timeReset'=>'nullable|integer',
            'timeResetPeriod'=>'nullable|string|max:255',
            'age'=>'nullable|array',
            'gender'=>'nullable|string|max:255',
            'scheduled_days'=>'nullable|array',
            'start_time'=>'nullable|date_format:H:i',
            'end_time'=>'nullable|date_format:H:i',
            'availableThrough'=>'required|string|max:255',
            'venue_id'=>'nullable|integer',
            'reward_id'=>'nullable|integer',
            'xStamps'=>'required|integer',
            'total_stamps'=>'required|integer'
        ];
    }
}
