<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Permission;
use Illuminate\Support\Facades\DB;

class CleanupDuplicatePermissions extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'permissions:cleanup';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Clean up duplicate permissions by keeping only one permission per user per page';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->info('Starting cleanup of duplicate permissions...');

        // Get all users with permissions
        $users = DB::table('permissions')->distinct()->pluck('user_id');

        foreach ($users as $userId) {
            $this->info("Processing user ID: {$userId}");
            
            // Get all permissions for this user
            $permissions = Permission::where('user_id', $userId)->get();
            
            // Group by page_id to find duplicates
            $groupedPermissions = $permissions->groupBy('page_id');
            
            foreach ($groupedPermissions as $pageId => $userPermissions) {
                if ($userPermissions->count() > 1) {
                    $this->warn("Found {$userPermissions->count()} permissions for user {$userId}, page {$pageId}");
                    
                    // Keep the first permission, delete the rest
                    $permissionsToDelete = $userPermissions->slice(1);
                    $deletedCount = $permissionsToDelete->count();
                    
                    foreach ($permissionsToDelete as $permission) {
                        $permission->delete();
                    }
                    
                    $this->info("Deleted {$deletedCount} duplicate permissions for user {$userId}, page {$pageId}");
                }
            }
        }

        $this->info('Cleanup completed successfully!');
        
        // Show final count
        $finalCount = Permission::count();
        $this->info("Final permission count: {$finalCount}");

        return 0;
    }
}
