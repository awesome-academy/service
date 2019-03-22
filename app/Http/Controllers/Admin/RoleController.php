<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\RoleRequest;
use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateRoleRequest;
use App\Repositories\Facades\RoleRepository;
use App\Repositories\Facades\PermissionRepository;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = config('paginate.perPage');

        if (!empty($keyword)) {
            $role = RoleRepository::where('name', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $role = RoleRepository::latest()->paginate($perPage);
        }

        return view('admin.role.index', compact('role'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $permissions = PermissionRepository::get()->pluck('name', 'name');

        return view('admin.role.create', compact('permissions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param App\Http\Requests\RoleRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(RoleRequest $request)
    {
        $requestData = $request->except('permissions');
        $permissions = $request->permissions;

        $role = RoleRepository::create($requestData);
        $role->givePermissionTo($permissions);

        return redirect('admin/role')->with('flash_message', __('role.notification.add'));
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $role = RoleRepository::with('permissions')->findOrFail($id);

        $permissions = $role->permissions->pluck('name')->toArray();

        return view('admin.role.show', compact('role', 'permissions'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $role = RoleRepository::with('permissions')->findOrFail($id);
        $permissions = PermissionRepository::get()->pluck('name', 'name');

        return view('admin.role.edit', compact('role', 'permissions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param App\Http\Requests\UpdateRoleRequest $request
     * @param int                                 $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(UpdateRoleRequest $request, $id)
    {
        $requestData = $request->except('permissions');
        $permissions = $request->permissions;

        $role = RoleRepository::with('permissions')->findOrFail($id);
        $role->update($requestData);

        $role->syncPermissions($permissions);

        return redirect('admin/role')->with('flash_message', __('role.notification.update'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        RoleRepository::destroy($id);

        return redirect('admin/role')->with('flash_danger', __('role.notification.delete'));
    }
}
