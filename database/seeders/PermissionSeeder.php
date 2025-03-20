use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    public function run()
    {
        $roles = ['super-admin', 'sales-manager', 'service-manager', 'inventory-manager'];
        $permissions = ['view dashboard', 'manage users', 'manage inventory', 'manage sales', 'manage service orders'];

        foreach ($roles as $role) {
            Role::firstOrCreate(['name' => $role]);
        }

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

        // Assign all permissions to super-admin
        Role::where('name', 'super-admin')->first()->givePermissionTo($permissions);
    }
}
