<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class ResidentialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
 $residentialData =  [
 [
      "id"=> -68920886,
      "langId"=> "mollit quis laboris ullamco aute",
      "residentialRegion"=>"velit dolore aute commodo",
      "residentialRegionCode"=> -35896765
 ],
    [
      "id"=> 80905560,
      "langId"=> "velit eu ex",
      "residentialRegion"=> "dolore ut Ut minim",
      "residentialRegionCode"=> 71603850
    ]
    ];
  

  foreach ($residentialData as $data) {
    \App\Models\Residential::create([
        'langId' => $data['langId'],
        'residentialRegion' => $data['residentialRegion'],
        'residentialRegionCode' => $data['residentialRegionCode'],
    ]);
}

}
}
