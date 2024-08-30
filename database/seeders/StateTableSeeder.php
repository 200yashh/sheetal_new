<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\State;

class StateTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $states = array(
            array(
                "name" => "ANDHRA PRADESH",
                "country_id" => 105,
            ),
            array(
                "name" => "ASSAM",
                "country_id" => 105,
            ),
            array(
                "name" => "ARUNACHAL PRADESH",
                "country_id" => 105,
            ),
            array(
                "name" => "BIHAR",
                "country_id" => 105,
            ),
            array(
                "name" => "GUJRAT",
                "country_id" => 105,
            ),
            array(
                "name" => "HARYANA",
                "country_id" => 105,
            ),
            array(
                "name" => "HIMACHAL PRADESH",
                "country_id" => 105,
            ),
            array(
                "name" => "JAMMU & KASHMIR",
                "country_id" => 105,
            ),
            array(
                "name" => "KARNATAKA",
                "country_id" => 105,
            ),
            array(
                "name" => "KERALA",
                "country_id" => 105,
            ),
            array(
                "name" => "MADHYA PRADESH",
                "country_id" => 105,
            ),
            array(
                "name" => "MAHARASHTRA",
                "country_id" => 105,
            ),
            array(
                "name" => "MANIPUR",
                "country_id" => 105,
            ),
            array(
                "name" => "MEGHALAYA",
                "country_id" => 105,
            ),
            array(
                "name" => "MIZORAM",
                "country_id" => 105,
            ),
            array(
                "name" => "NAGALAND",
                "country_id" => 105,
            ),
            array(
                "name" => "ORISSA",
                "country_id" => 105,
            ),
            array(
                "name" => "PUNJAB",
                "country_id" => 105,
            ),
            array(
                "name" => "RAJASTHAN",
                "country_id" => 105,
            ),
            array(
                "name" => "SIKKIM",
                "country_id" => 105,
            ),
            array(
                "name" => "TAMIL NADU",
                "country_id" => 105,
            ),
            array(
                "name" => "TRIPURA",
                "country_id" => 105,
            ),
            array(
                "name" => "UTTAR PRADESH",
                "country_id" => 105,
            ),
            array(
                "name" => "WEST BENGAL",
                "country_id" => 105,
            ),
            array(
                "name" => "DELHI",
                "country_id" => 105,
            ),
            array(
                "name" => "GOA",
                "country_id" => 105,
            ),
            array(
                "name" => "PONDICHERY",
                "country_id" => 105,
            ),
            array(
                "name" => "LAKSHDWEEP",
                "country_id" => 105,
            ),
            array(
                "name" => "DAMAN & DIU",
                "country_id" => 105,
            ),
            array(
                "name" => "DADRA & NAGAR",
                "country_id" => 105,
            ),
            array(
                "name" => "CHANDIGARH",
                "country_id" => 105,
            ),
            array(
                "name" => "ANDAMAN & NICOBAR",
                "country_id" => 105,
            ),
            array(
                "name" => "UTTARANCHAL",
                "country_id" => 105,
            ),
            array(
                "name" => "JHARKHAND",
                "country_id" => 105,
            ),
            array(
                "name" => "CHATTISGARH",
                "country_id" => 105,
            ),
        );

        if (State::count() <= 0) {
            State::insert($states);
        }
    }
}
