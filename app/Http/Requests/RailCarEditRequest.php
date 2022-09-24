<?php

namespace App\Http\Requests;

use App\Models\RailCar;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class RailCarEditRequest extends FormRequest
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
        $areaArray = [
            RailCar::AREA_YARD,
            RailCar::AREA_NORTH_GATE,
            RailCar::AREA_SOUTH_SIDE,
            RailCar::AREA_PLATFORM_1,
            RailCar::AREA_PLATFORM_2,
            RailCar::AREA_PLATFORM_3
        ];
        $statusArray = [
            RailCar::STATUS_PARKED,
            RailCar::STATUS_LOADING,
            RailCar::STATUS_LOADED,
            RailCar::STATUS_SHIPPED,
            RailCar::STATUS_ARCHIVED,
        ];
        return [
            'name'=>['required'],
            'area'=> ['required', Rule::in($areaArray)],
            'status'=> ['required', Rule::in($statusArray)],
            'due_date'=> ['required'],
            'arrival_date'=> ['required']
        ];
    }
    public function messages()
    {
        return  [
            'area.in'=>'Please Enter Valid Area',
            'status.in'=>'Please Enter Valid Status'
        ];
    }
}
