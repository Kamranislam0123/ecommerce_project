<?php
/**
 * Debug Script for Admin Sidebar Issues
 * Place this file in your Laravel project root and run: php debug_sidebar.php
 */

require_once 'vendor/autoload.php';

// Bootstrap Laravel
$app = require_once 'bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

use App\Models\Permission;
use App\Models\Page;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

echo "=== Admin Sidebar Debug Report ===\n\n";

try {
    // 1. Check if database connection is working
    echo "1. Database Connection Test:\n";
    $connection = DB::connection()->getPdo();
    echo "   ✓ Database connection successful\n";
    echo "   Database: " . DB::connection()->getDatabaseName() . "\n\n";

    // 2. Check if tables exist
    echo "2. Table Existence Check:\n";
    $tables = ['users', 'pages', 'permissions'];
    foreach ($tables as $table) {
        if (Schema::hasTable($table)) {
            echo "   ✓ Table '{$table}' exists\n";
        } else {
            echo "   ✗ Table '{$table}' does NOT exist\n";
        }
    }
    echo "\n";

    // 3. Check if there are any users
    echo "3. Users Check:\n";
    $userCount = User::count();
    echo "   Total users: {$userCount}\n";
    
    if ($userCount > 0) {
        $firstUser = User::first();
        echo "   First user ID: {$firstUser->id}\n";
        echo "   First user email: {$firstUser->email}\n";
    }
    echo "\n";

    // 4. Check if there are any pages
    echo "4. Pages Check:\n";
    $pageCount = Page::count();
    echo "   Total pages: {$pageCount}\n";
    
    if ($pageCount > 0) {
        $activePages = Page::where('status', 1)->count();
        echo "   Active pages: {$activePages}\n";
        
        $samplePages = Page::take(5)->get();
        echo "   Sample pages:\n";
        foreach ($samplePages as $page) {
            echo "     - ID: {$page->id}, Name: {$page->name}, Status: {$page->status}\n";
        }
    }
    echo "\n";

    // 5. Check permissions
    echo "5. Permissions Check:\n";
    $permissionCount = Permission::count();
    echo "   Total permissions: {$permissionCount}\n";
    
    if ($permissionCount > 0) {
        $permissionsWithPages = Permission::with('page')->get();
        echo "   Permissions with page relationships:\n";
        foreach ($permissionsWithPages->take(10) as $permission) {
            if ($permission->page) {
                echo "     - User ID: {$permission->user_id}, Page: {$permission->page->name} (Status: {$permission->page->status})\n";
            } else {
                echo "     - User ID: {$permission->user_id}, Page: NULL (orphaned permission)\n";
            }
        }
    }
    echo "\n";

    // 6. Check for specific user permissions (if user ID 1 exists)
    if ($userCount > 0) {
        $testUserId = 1;
        echo "6. User {$testUserId} Permissions:\n";
        $userPermissions = Permission::with('page')->where('user_id', $testUserId)->get();
        echo "   User {$testUserId} has {$userPermissions->count()} permissions\n";
        
        foreach ($userPermissions as $permission) {
            if ($permission->page) {
                echo "     - Page: {$permission->page->name} (Status: {$permission->page->status})\n";
            } else {
                echo "     - Page: NULL (orphaned)\n";
            }
        }
    }
    echo "\n";

    // 7. Check for common issues
    echo "7. Common Issues Check:\n";
    
    // Check for orphaned permissions
    $orphanedPermissions = Permission::whereDoesntHave('page')->count();
    echo "   Orphaned permissions (no page): {$orphanedPermissions}\n";
    
    // Check for orphaned permissions with users
    $orphanedPermissionsWithUsers = Permission::whereDoesntHave('user')->count();
    echo "   Orphaned permissions (no user): {$orphanedPermissionsWithUsers}\n";
    
    // Check for pages without permissions
    $pagesWithoutPermissions = Page::whereDoesntHave('permissions')->count();
    echo "   Pages without permissions: {$pagesWithoutPermissions}\n";
    
    echo "\n";

    // 8. Route check simulation
    echo "8. Route Check Simulation:\n";
    $testRoutes = [
        'admin.index',
        'order.index',
        'product.index',
        'customer.list',
        'category.index'
    ];
    
    foreach ($testRoutes as $routeName) {
        $page = Page::where('name', $routeName)->first();
        if ($page) {
            echo "   ✓ Route '{$routeName}' has page (ID: {$page->id}, Status: {$page->status})\n";
        } else {
            echo "   ✗ Route '{$routeName}' has NO page\n";
        }
    }
    echo "\n";

    // 9. Recommendations
    echo "9. Recommendations:\n";
    
    if ($pageCount == 0) {
        echo "   - Run page seeder: php artisan db:seed --class=PageSeeder\n";
    }
    
    if ($permissionCount == 0) {
        echo "   - Run permission seeder: php artisan db:seed --class=PermissionSeeder\n";
    }
    
    if ($orphanedPermissions > 0) {
        echo "   - Clean up orphaned permissions\n";
    }
    
    echo "   - Check if all routes in sidebar have corresponding pages in database\n";
    echo "   - Verify user authentication is working\n";
    echo "   - Check if middleware is properly configured\n";

} catch (Exception $e) {
    echo "Error: " . $e->getMessage() . "\n";
    echo "Stack trace:\n" . $e->getTraceAsString() . "\n";
}

echo "\n=== End Debug Report ===\n";
