<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class PurposeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
//  $purposeData =   [
//     {
//       "value": -89946972,
//       "descriptionE": "ullamco tempor",
//       "descriptionA": "pariatur esse irure ad laboris"
//     },
//     {
//       "value": 81612590,
//       "descriptionE": "ad minim",
//       "descriptionA": "dolor anim in"
//     }
//   ]


$purposeData =   [
    [
        "value"=> -89946972,
        "descriptionE"=> "ullamco tempor",
        "descriptionA"=> "pariatur esse irure ad laboris"
    ],
    [
        "value"=> 81612590,
        "descriptionE"=> "ad minim",
        "descriptionA"=> "dolor anim in"
    ]
    ];

  foreach ($purposeData as $data) {
    \App\Models\Purpose::create([
        'value' => $data['value'],
        'description' => [
            'ar' => $data['descriptionA'],
            'en' => $data['descriptionE'],
        ]
    ]);
}


}
}
