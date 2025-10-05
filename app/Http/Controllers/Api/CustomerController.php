<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Services\CustomerAliasFactory;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CustomerController extends Controller
{


    public function store(Request $request, CustomerAliasFactory $aliasFactory)
    {
        $data = $request->validate([
            // customerDetails
            'customerDetails.idInformation' => ['nullable', 'string', 'max:20'],
            'customerDetails.educationLevel' => ['nullable', 'integer', 'min:0', 'max:10'],
            'customerDetails.maritalStatus' => ['nullable', Rule::in(['Single', 'Married', 'Divorced', 'Widowed'])],
            'customerDetails.dateOfBirth' => ['nullable', 'date'],
            'customerDetails.mobilePhoneNumber' => ['nullable', 'string', 'max:30'],
            'customerDetails.email' => ['nullable', 'email', 'max:255'],
            'customerDetails.city' => ['nullable', 'integer'],
            'customerDetails.postCode' => ['nullable', 'string', 'max:20'],
            'customerDetails.numberOfDependents' => ['nullable', 'integer', 'min:0', 'max:20'],

            // customerExpenses
            'customerExpenses.foodExpense' => ['nullable', 'numeric'],
            'customerExpenses.housingExpense' => ['nullable', 'numeric'],
            'customerExpenses.utilities' => ['nullable', 'numeric'],
            'customerExpenses.insurance' => ['nullable', 'numeric'],
            'customerExpenses.healthcareService' => ['nullable', 'numeric'],
            'customerExpenses.transportationExpense' => ['nullable', 'numeric'],
            'customerExpenses.educationExpense' => ['nullable', 'numeric'],
            'customerExpenses.domesticHelp' => ['nullable', 'numeric'],
            'customerExpenses.futureExpense' => ['nullable', 'numeric'],
            'customerExpenses.mps' => ['nullable', 'numeric'],
            'customerExpenses.totalExpenses' => ['nullable', 'numeric'],

            // customerSecondaryIncome
            'customerSecondaryIncome.secondaryIncomeType' => ['nullable', 'string', 'max:50'],
            'customerSecondaryIncome.secondaryIncomeAmount' => ['nullable', 'numeric'],
            'customerSecondaryIncome.secondaryIncomeFrequency' => ['nullable', 'string', 'max:10'],

            // loanDetails
            'loanDetails.purposeOfLoan' => ['nullable', 'integer'],
            'loanDetails.homeOwnership' => ['nullable', 'integer'],
            'loanDetails.residentialType' => ['nullable', 'integer'],
        ]);

        $cd = $data['customerDetails'] ?? [];
        $ce = $data['customerExpenses'] ?? [];
        $csi = $data['customerSecondaryIncome'] ?? [];
        $ld = $data['loanDetails'] ?? [];

        $customer = Customer::create([
            'id_information' => $cd['idInformation'] ?? null,
            'education_level' => $cd['educationLevel'] ?? null,
            'marital_status' => $cd['maritalStatus'] ?? null,
            'date_of_birth' => $cd['dateOfBirth'] ?? null,
            'mobile_phone' => $cd['mobilePhoneNumber'] ?? null,
            'email' => $cd['email'] ?? null,
            'city_id' => $cd['city'] ?? null,
            'post_code' => $cd['postCode'] ?? null,
            'dependents' => $cd['numberOfDependents'] ?? null,

            'food_expense' => $ce['foodExpense'] ?? null,
            'housing_expense' => $ce['housingExpense'] ?? null,
            'utilities' => $ce['utilities'] ?? null,
            'insurance' => $ce['insurance'] ?? null,
            'healthcare_service' => $ce['healthcareService'] ?? null,
            'transportation_expense' => $ce['transportationExpense'] ?? null,
            'education_expense' => $ce['educationExpense'] ?? null,
            'domestic_help' => $ce['domesticHelp'] ?? null,
            'future_expense' => $ce['futureExpense'] ?? null,
            'mps' => $ce['mps'] ?? null,
            'total_expenses' => $ce['totalExpenses'] ?? null,

            'secondary_income_type' => $csi['secondaryIncomeType'] ?? null,
            'secondary_income_amount' => $csi['secondaryIncomeAmount'] ?? null,
            'secondary_income_frequency' => $csi['secondaryIncomeFrequency'] ?? null,

            'purpose_of_loan' => $ld['purposeOfLoan'] ?? null,
            'home_ownership' => $ld['homeOwnership'] ?? null,
            'residential_type' => $ld['residentialType'] ?? null,
        ]);

        // تأكد من وجود alias
        app(CustomerAliasFactory::class)->ensureAlias($customer);

        return response()->json([
            'status' => 201,
            'message' => 'Customer created',
            'id' => $customer->id,
            'lookupKey' => $customer->alias->alias_id_number,
        ], 201);
    }
}
