<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DivisionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $divisions = [
            ['id' => '1', 'country_id' => '1', 'name' => 'Chattogram', 'bn_name' => 'চট্টগ্রাম', 'status' => 1],
            ['id' => '2', 'country_id' => '1', 'name' => 'Rajshahi', 'bn_name' => 'রাজশাহী', 'status' => 1],
            ['id' => '3', 'country_id' => '1', 'name' => 'Khulna', 'bn_name' => 'খুলনা', 'status' => 1],
            ['id' => '4', 'country_id' => '1', 'name' => 'Barisal', 'bn_name' => 'বরিশাল', 'status' => 1],
            ['id' => '5', 'country_id' => '1', 'name' => 'Sylhet', 'bn_name' => 'সিলেট', 'status' => 1],
            ['id' => '6', 'country_id' => '1', 'name' => 'Dhaka', 'bn_name' => 'ঢাকা', 'status' => 1],
            ['id' => '7', 'country_id' => '1', 'name' => 'Rangpur', 'bn_name' => 'রংপুর', 'status' => 1],
            ['id' => '8', 'country_id' => '1', 'name' => 'Mymensingh', 'bn_name' => 'ময়মনসিংহ', 'status' => 1],
        ];

        try {
            // Disable foreign key checks to avoid issues during truncation
            DB::statement('SET FOREIGN_KEY_CHECKS=0');
            DB::table('divisions')->truncate();
            DB::statement('ALTER TABLE divisions AUTO_INCREMENT = 1');
            DB::statement('SET FOREIGN_KEY_CHECKS=1');

            // Begin transaction and insert data
            DB::beginTransaction();
            DB::table('divisions')->insert($divisions);
            DB::commit();

            $this->command->info('Divisions seeded successfully.');
        } catch (\Exception $e) {
            // Rollback in case of error
            DB::rollBack();
            \Log::error('DivisionSeeder failed: ' . $e->getMessage());
            $this->command->error('Error seeding divisions: ' . $e->getMessage());
        }
    }
}
