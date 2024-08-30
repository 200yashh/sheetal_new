<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\MasterPackage;

class MasterPackageTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $packages = ['super_deluxe' => 'Super Deluxe', 'deluxe' => 'Deluxe', 'standard' => 'Standard', 'economy' => 'Economy'];
        if (MasterPackage::count() <= 0) {
            foreach ($packages as  $pK => $pV) {
                MasterPackage::create([
                    "name" => $pV,
                    "slug" => $pK,
                ]);
            }
        }
    }
}
