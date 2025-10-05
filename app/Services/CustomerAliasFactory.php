<?php

namespace App\Services;

use App\Models\Customer;
use App\Models\CustomerAlias;
use Illuminate\Support\Str;

class CustomerAliasFactory
{
    protected function generateAliasIdNumber(?string $realId): string
    {
        $length = ($realId && preg_match('/^\d+$/',$realId)) ? strlen($realId) : 10;
        do {
            $alias = '';
            for ($i=0; $i<$length; $i++) {
                $alias .= mt_rand(0,9);
            }
        } while (CustomerAlias::where('alias_id_number', $alias)->exists());

        return $alias;
    }

    public function ensureAlias(Customer $c): CustomerAlias
    {
        if ($c->alias) return $c->alias;

        $faker = fake('ar_SA'); 
        $alias = new CustomerAlias([
            'alias_id_number' => $this->generateAliasIdNumber($c->id_information),
            'fake_full_name'  => $faker->name(),
            'fake_email'      => 'customer+'.Str::ulid().'@example.com',
            'fake_mobile'     => '+9665'.mt_rand(10000000, 99999999),
            'fake_date_of_birth' => $faker->date('Y-m-d','-25 years'),
        ]);

        $c->alias()->save($alias);

        return $alias;
    }
}
