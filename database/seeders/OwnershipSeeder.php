<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class OwnershipSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // "houseOwnerTypeResponseList": [
        //     {
        //         "value": "1",
        //         "descriptionA": "مالك",
        //         "descriptionE": "Owned"
        //     },
        //     {
        //         "value": "2",
        //         "descriptionA": "مستأجر",
        //         "descriptionE": "Rented"
        //     },
        //     {
        //         "value": "3",
        //         "descriptionA": "مزود من الشركة",
        //         "descriptionE": "Company Provided"
        //     },
        //     {
        //         "value": "4",
        //         "descriptionA": "مع الاهل",
        //         "descriptionE": "Living with Parents"
        //     },
        //     {
        //         "value": "5",
        //         "descriptionA": "أخرى",
        //         "descriptionE": "Other"
        //     }
        // ]

        $ownershipData =   [
            [
                "value"=> "1",
                "descriptionA"=> "مالك",
                "descriptionE"=> "Owned"
            ],
            [
                "value"=> "2",
                "descriptionA"=> "مستأجر",
                "descriptionE"=> "Rented"
            ],
            [
                "value"=> "3",
                "descriptionA"=> "مزود من الشركة",
                "descriptionE"=> "Company Provided"
            ],
            [
                "value"=> "4",
                "descriptionA"=> "مع الاهل",
                "descriptionE"=> "Living with Parents"
            ],
            [
                "value"=> "5",
                "descriptionA"=> "أخرى",
                "descriptionE"=> "Other"
            ]
      ];
    
      foreach ($ownershipData as $data) {
        \App\Models\Ownership::create([
            'value' => $data['value'],
            'description' => [
                'ar' => $data['descriptionA'],
                'en' => $data['descriptionE'],
            ]
        ]);
    }

}
}
