<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\Facades\RoleRepository;
use App\Repositories\Facades\UserRepository;
use Illuminate\Http\Request;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;

class UserController extends Controller
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
            $user = UserRepository::latest()->paginate($perPage);
        } else {
            $user = UserRepository::latest()->paginate($perPage);
        }

        return view('admin.user.index', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $roles = RoleRepository::get()->pluck('name', 'name');

        return view('admin.user.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreUserRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(StoreUserRequest $request)
    {
        $requestData = $request->except('roles');
        $roles = $request->roles;
        $user = UserRepository::create($requestData);

        $user->assignRole($roles); // assign Role for user

        return redirect('admin/user')->with('flash_message', __('user.notification.add'));
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
        $user = UserRepository::with('roles', 'permissions')->findOrFail($id);
        $roles = $user->roles->pluck('name')->toArray();

        $permissions = $user->getPermissionsViaRoles()->pluck('name')->unique()->toArray();

        return view('admin.user.show', compact('user', 'roles', 'permissions'));
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
        $user = UserRepository::with('roles')->findOrFail($id);
        $roles = RoleRepository::get()->pluck('name', 'name');

        return view('admin.user.edit', compact('user', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateUserRequest $request
     * @param int               $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(UpdateUserRequest $request, $id)
    {
        $requestData = $request->except('roles');

        $user = UserRepository::with('roles')->findOrFail($id);
        $user->update($requestData);

        $user->syncRoles($request->roles);

        return redirect('admin/user')->with('flash_message', __('user.notification.update'));
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
        UserRepository::destroy($id);

        return redirect('admin/user')->with('flash_danger', __('user.notification.delete'));
    }
}
