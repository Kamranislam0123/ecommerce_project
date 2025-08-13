<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $countries = [
            ['id' => '1', 'code' => 'BD', 'name' => 'Bangladesh'],
        ];

        try {
            // Disable foreign key checks to avoid issues during truncation
            DB::statement('SET FOREIGN_KEY_CHECKS=0');
            DB::table('countries')->truncate();
            DB::statement('ALTER TABLE countries AUTO_INCREMENT = 1');
            DB::statement('SET FOREIGN_KEY_CHECKS=1');

            // Begin transaction and insert data
            DB::beginTransaction();
            DB::table('countries')->insert($countries);
            DB::commit();

            $this->command->info('Countries seeded successfully.');
        } catch (\Exception $e) {
            // Rollback in case of error
            DB::rollBack();
            \Log::error('CountrySeeder failed: ' . $e->getMessage());
            $this->command->error('Error seeding countries: ' . $e->getMessage());
        }
    }
}
