<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class AdminPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Set default permissions for admin users
        User::where('role', 1)->update([
            'action_process' => 1,
            'action_view' => 1,
            'action_edit' => 1,
            'action_create' => 1,
            'action_delete' => 1,
        ]);
    }
}
