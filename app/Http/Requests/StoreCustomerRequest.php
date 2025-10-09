<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCustomerRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'id_information' => 'required|string|unique:customers,id_information|max:20',
            'education_level' => 'required|integer|min:1|max:7',
            'marital_status' => 'required|in:Single,Married,Divorced,Widowed',
            'date_of_birth' => 'required|date|before:today',
            'mobile_phone' => 'required|string|max:20',
            'email' => 'required|email|unique:customers,email|max:255',
            'city_id' => 'required|integer|min:1|max:13',
            'post_code' => 'required|string|max:10',
            'dependents' => 'required|integer|min:0|max:20',
            'food_expense' => 'required|numeric|min:0',
            'housing_expense' => 'required|numeric|min:0',
            'utilities' => 'required|numeric|min:0',
            'insurance' => 'required|numeric|min:0',
            'healthcare_service' => 'required|numeric|min:0',
            'transportation_expense' => 'required|numeric|min:0',
            'education_expense' => 'required|numeric|min:0',
        ];
    }

    /**
     * Get custom validation messages.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'name.required' => __('validation.required', ['attribute' => __('dashboard.name')]),
            'name.string' => __('validation.string', ['attribute' => __('dashboard.name')]),
            'name.max' => __('validation.max.string', ['attribute' => __('dashboard.name'), 'max' => 255]),

            'id_information.required' => __('validation.required', ['attribute' => __('dashboard.id_information')]),
            'id_information.string' => __('validation.string', ['attribute' => __('dashboard.id_information')]),
            'id_information.unique' => __('validation.unique', ['attribute' => __('dashboard.id_information')]),
            'id_information.max' => __('validation.max.string', ['attribute' => __('dashboard.id_information'), 'max' => 20]),

            'education_level.required' => __('validation.required', ['attribute' => __('dashboard.education_level')]),
            'education_level.integer' => __('validation.integer', ['attribute' => __('dashboard.education_level')]),
            'education_level.min' => __('validation.min.numeric', ['attribute' => __('dashboard.education_level'), 'min' => 1]),
            'education_level.max' => __('validation.max.numeric', ['attribute' => __('dashboard.education_level'), 'max' => 7]),

            'marital_status.required' => __('validation.required', ['attribute' => __('dashboard.marital_status')]),
            'marital_status.in' => __('validation.in', ['attribute' => __('dashboard.marital_status')]),

            'date_of_birth.required' => __('validation.required', ['attribute' => __('dashboard.date_of_birth')]),
            'date_of_birth.date' => __('validation.date', ['attribute' => __('dashboard.date_of_birth')]),
            'date_of_birth.before' => __('validation.before', ['attribute' => __('dashboard.date_of_birth'), 'date' => 'today']),

            'mobile_phone.required' => __('validation.required', ['attribute' => __('dashboard.mobile_phone')]),
            'mobile_phone.string' => __('validation.string', ['attribute' => __('dashboard.mobile_phone')]),
            'mobile_phone.max' => __('validation.max.string', ['attribute' => __('dashboard.mobile_phone'), 'max' => 20]),

            'email.required' => __('validation.required', ['attribute' => __('dashboard.email')]),
            'email.email' => __('validation.email', ['attribute' => __('dashboard.email')]),
            'email.unique' => __('validation.unique', ['attribute' => __('dashboard.email')]),
            'email.max' => __('validation.max.string', ['attribute' => __('dashboard.email'), 'max' => 255]),

            'city_id.required' => __('validation.required', ['attribute' => __('dashboard.city')]),
            'city_id.integer' => __('validation.integer', ['attribute' => __('dashboard.city')]),
            'city_id.min' => __('validation.min.numeric', ['attribute' => __('dashboard.city'), 'min' => 1]),
            'city_id.max' => __('validation.max.numeric', ['attribute' => __('dashboard.city'), 'max' => 13]),

            'post_code.required' => __('validation.required', ['attribute' => __('dashboard.post_code')]),
            'post_code.string' => __('validation.string', ['attribute' => __('dashboard.post_code')]),
            'post_code.max' => __('validation.max.string', ['attribute' => __('dashboard.post_code'), 'max' => 10]),

            'dependents.required' => __('validation.required', ['attribute' => __('dashboard.dependents')]),
            'dependents.integer' => __('validation.integer', ['attribute' => __('dashboard.dependents')]),
            'dependents.min' => __('validation.min.numeric', ['attribute' => __('dashboard.dependents'), 'min' => 0]),
            'dependents.max' => __('validation.max.numeric', ['attribute' => __('dashboard.dependents'), 'max' => 20]),

            'food_expense.required' => __('validation.required', ['attribute' => __('dashboard.food_expense')]),
            'food_expense.numeric' => __('validation.numeric', ['attribute' => __('dashboard.food_expense')]),
            'food_expense.min' => __('validation.min.numeric', ['attribute' => __('dashboard.food_expense'), 'min' => 0]),

            'housing_expense.required' => __('validation.required', ['attribute' => __('dashboard.housing_expense')]),
            'housing_expense.numeric' => __('validation.numeric', ['attribute' => __('dashboard.housing_expense')]),
            'housing_expense.min' => __('validation.min.numeric', ['attribute' => __('dashboard.housing_expense'), 'min' => 0]),

            'utilities.required' => __('validation.required', ['attribute' => __('dashboard.utilities')]),
            'utilities.numeric' => __('validation.numeric', ['attribute' => __('dashboard.utilities')]),
            'utilities.min' => __('validation.min.numeric', ['attribute' => __('dashboard.utilities'), 'min' => 0]),

            'insurance.required' => __('validation.required', ['attribute' => __('dashboard.insurance')]),
            'insurance.numeric' => __('validation.numeric', ['attribute' => __('dashboard.insurance')]),
            'insurance.min' => __('validation.min.numeric', ['attribute' => __('dashboard.insurance'), 'min' => 0]),

            'healthcare_service.required' => __('validation.required', ['attribute' => __('dashboard.healthcare_service')]),
            'healthcare_service.numeric' => __('validation.numeric', ['attribute' => __('dashboard.healthcare_service')]),
            'healthcare_service.min' => __('validation.min.numeric', ['attribute' => __('dashboard.healthcare_service'), 'min' => 0]),

            'transportation_expense.required' => __('validation.required', ['attribute' => __('dashboard.transportation')]),
            'transportation_expense.numeric' => __('validation.numeric', ['attribute' => __('dashboard.transportation')]),
            'transportation_expense.min' => __('validation.min.numeric', ['attribute' => __('dashboard.transportation'), 'min' => 0]),

            'education_expense.required' => __('validation.required', ['attribute' => __('dashboard.education_expense')]),
            'education_expense.numeric' => __('validation.numeric', ['attribute' => __('dashboard.education_expense')]),
            'education_expense.min' => __('validation.min.numeric', ['attribute' => __('dashboard.education_expense'), 'min' => 0]),
        ];
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array<string, string>
     */
    public function attributes(): array
    {
        return [
            'name' => __('dashboard.name'),
            'id_information' => __('dashboard.id_information'),
            'education_level' => __('dashboard.education_level'),
            'marital_status' => __('dashboard.marital_status'),
            'date_of_birth' => __('dashboard.date_of_birth'),
            'mobile_phone' => __('dashboard.mobile_phone'),
            'email' => __('dashboard.email'),
            'city_id' => __('dashboard.city'),
            'post_code' => __('dashboard.post_code'),
            'dependents' => __('dashboard.dependents'),
            'food_expense' => __('dashboard.food_expense'),
            'housing_expense' => __('dashboard.housing_expense'),
            'utilities' => __('dashboard.utilities'),
            'insurance' => __('dashboard.insurance'),
            'healthcare_service' => __('dashboard.healthcare_service'),
            'transportation_expense' => __('dashboard.transportation'),
            'education_expense' => __('dashboard.education_expense'),
        ];
    }
}
