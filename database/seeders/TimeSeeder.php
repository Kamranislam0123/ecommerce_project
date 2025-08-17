<?php

namespace Database\Seeders;

use App\Models\DeliveryTime;
use Illuminate\Database\Seeder;

class TimeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Saturday (group_id = 1)
        DeliveryTime::create([
            'group_id'  => '1',
            'time' => '09:00 - 10:00',
            'is_active' => true,
        ]);
        DeliveryTime::create([
            'group_id'  => '1',
            'time' => '10:00 - 11:00',
            'is_active' => true,
        ]);
        DeliveryTime::create([
            'group_id'  => '1',
            'time' => '11:00 - 12:00',
            'is_active' => true,
        ]);
        DeliveryTime::create([
            'group_id'  => '1',
            'time' => '14:00 - 15:00',
            'is_active' => true,
        ]);
        DeliveryTime::create([
            'group_id'  => '1',
            'time' => '15:00 - 16:00',
            'is_active' => true,
        ]);
        DeliveryTime::create([
            'group_id'  => '1',
            'time' => '16:00 - 17:00',
            'is_active' => true,
        ]);

        // Sunday (group_id = 2)
        DeliveryTime::create([
            'group_id'  => '2',
            'time' => '10:00 - 11:00',
            'is_active' => true,
        ]);
        DeliveryTime::create([
            'group_id'  => '2',
            'time' => '11:00 - 12:00',
            'is_active' => true,
        ]);
        DeliveryTime::create([
            'group_id'  => '2',
            'time' => '15:00 - 16:00',
            'is_active' => true,
        ]);
        DeliveryTime::create([
            'group_id'  => '2',
            'time' => '16:00 - 17:00',
            'is_active' => true,
        ]);

        // Monday (group_id = 3)
        DeliveryTime::create([
            'group_id'  => '3',
            'time' => '09:00 - 10:00',
            'is_active' => true,
        ]);
        DeliveryTime::create([
            'group_id'  => '3',
            'time' => '10:00 - 11:00',
            'is_active' => true,
        ]);
        DeliveryTime::create([
            'group_id'  => '3',
            'time' => '11:00 - 12:00',
            'is_active' => true,
        ]);
        DeliveryTime::create([
            'group_id'  => '3',
            'time' => '14:00 - 15:00',
            'is_active' => true,
        ]);
        DeliveryTime::create([
            'group_id'  => '3',
            'time' => '15:00 - 16:00',
            'is_active' => true,
        ]);

        // Tuesday (group_id = 4)
        DeliveryTime::create([
            'group_id'  => '4',
            'time' => '09:00 - 10:00',
            'is_active' => true,
        ]);
        DeliveryTime::create([
            'group_id'  => '4',
            'time' => '10:00 - 11:00',
            'is_active' => true,
        ]);
        DeliveryTime::create([
            'group_id'  => '4',
            'time' => '11:00 - 12:00',
            'is_active' => true,
        ]);
        DeliveryTime::create([
            'group_id'  => '4',
            'time' => '14:00 - 15:00',
            'is_active' => true,
        ]);
        DeliveryTime::create([
            'group_id'  => '4',
            'time' => '15:00 - 16:00',
            'is_active' => true,
        ]);

        // Wednesday (group_id = 5)
        DeliveryTime::create([
            'group_id'  => '5',
            'time' => '09:00 - 10:00',
            'is_active' => true,
        ]);
        DeliveryTime::create([
            'group_id'  => '5',
            'time' => '10:00 - 11:00',
            'is_active' => true,
        ]);
        DeliveryTime::create([
            'group_id'  => '5',
            'time' => '11:00 - 12:00',
            'is_active' => true,
        ]);
        DeliveryTime::create([
            'group_id'  => '5',
            'time' => '14:00 - 15:00',
            'is_active' => true,
        ]);
        DeliveryTime::create([
            'group_id'  => '5',
            'time' => '15:00 - 16:00',
            'is_active' => true,
        ]);

        // Thursday (group_id = 6)
        DeliveryTime::create([
            'group_id'  => '6',
            'time' => '09:00 - 10:00',
            'is_active' => true,
        ]);
        DeliveryTime::create([
            'group_id'  => '6',
            'time' => '10:00 - 11:00',
            'is_active' => true,
        ]);
        DeliveryTime::create([
            'group_id'  => '6',
            'time' => '11:00 - 12:00',
            'is_active' => true,
        ]);
        DeliveryTime::create([
            'group_id'  => '6',
            'time' => '14:00 - 15:00',
            'is_active' => true,
        ]);
        DeliveryTime::create([
            'group_id'  => '6',
            'time' => '15:00 - 16:00',
            'is_active' => true,
        ]);

        // Friday (group_id = 7)
        DeliveryTime::create([
            'group_id'  => '7',
            'time' => '09:00 - 10:00',
            'is_active' => true,
        ]);
        DeliveryTime::create([
            'group_id'  => '7',
            'time' => '10:00 - 11:00',
            'is_active' => true,
        ]);
        DeliveryTime::create([
            'group_id'  => '7',
            'time' => '11:00 - 12:00',
            'is_active' => true,
        ]);
        DeliveryTime::create([
            'group_id'  => '7',
            'time' => '14:00 - 15:00',
            'is_active' => true,
        ]);
        DeliveryTime::create([
            'group_id'  => '7',
            'time' => '15:00 - 16:00',
            'is_active' => true,
        ]);
    }
}
