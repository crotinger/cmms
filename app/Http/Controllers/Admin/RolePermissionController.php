<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;

class RolePermissionController extends Controller
{
    public function index()
    {
        return view('admin.roles.index', [
            'roles' => Role::with('permissions')->get(),
            'permissions' => Permission::all()
        ]);
    }

    public function store(Request $request)
    {
        $request->validate(['name' => 'required|unique:roles,name']);
        Role::create(['name' => $request->name]);
        return back()->with('success', 'Role created successfully.');
    }

    public function edit(Role $role)
    {
        return view('admin.roles.edit', [
            'role' => $role,
            'permissions' => Permission::all()
        ]);
    }

    public function update(Request $request, Role $role)
    {
        $role->syncPermissions($request->permissions ?? []);
        return redirect()->route('admin.roles.index')->with('success', 'Permissions updated.');
    }

    public function destroy(Role $role)
    {
        $role->delete();
        return back()->with('success', 'Role deleted.');
    }

    public function editUserPermissions(User $user)
    {
        return view('admin.users.permissions', [
            'user' => $user,
            'roles' => Role::all(),
            'permissions' => Permission::all()
        ]);
    }

    public function updateUserPermissions(Request $request, User $user)
    {
        $user->syncRoles($request->roles ?? []);
        $user->syncPermissions($request->permissions ?? []);
        return back()->with('success', 'User permissions updated.');
    }
}
