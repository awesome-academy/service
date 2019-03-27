<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreMenuRequest;
use App\Http\Requests\UpdateMenuRequest;
use App\Repositories\Facades\DishRepository;
use App\Repositories\Facades\MenuRepository;
use App\Repositories\Facades\TypeMenuRepository;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = config('paginate.perPage');

        if (!empty($keyword)) {
            $menu = MenuRepository::where('name', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $menu = MenuRepository::latest()->paginate($perPage);
        }

        return view('admin.menu.index', compact('menu'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $typeMenus = TypeMenuRepository::get()->pluck('name', 'id');
        $dishes = DishRepository::get()->pluck('name', 'name');

        return view('admin.menu.create', compact('typeMenus', 'dishes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreMenuRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMenuRequest $request)
    {
        $requestData = $request->except(['dishes', 'typeMenu']);
        $requestData['type_menu_id'] = $request->typeMenu;
        $menu = MenuRepository::create($requestData);
        $menu->assignDish($request->dishes);

        return redirect('admin/menu')->with('flash_message', __('menu.notification.add'));
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $menu = MenuRepository::with('dishes', 'typeMenu')->findOrFail($id);

        return view('admin.menu.show', compact('menu'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $menu = MenuRepository::with('dishes', 'typeMenu')->findOrFail($id);
        $dishes = DishRepository::get()->pluck('name', 'name');
        $typeMenus = TypeMenuRepository::get()->pluck('name', 'id');
        $dishNames = $menu->getDishNames();

        return view('admin.menu.edit', compact('menu', 'dishes', 'typeMenus', 'dishNames'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateMenuRequest $request
     * @param int               $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMenuRequest $request, $id)
    {
        $requestData = $request->except(['dishes', 'typeMenu']);
        $requestData['type_menu_id'] = $request->typeMenu;
        $menu = MenuRepository::with('dishes')->findOrFail($id);

        $menu->update($requestData);
        $menu->syncDish($request->dishes);

        return redirect('admin/menu')->with('flash_message', __('menu.notification.update'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        MenuRepository::destroy($id);

        return redirect('admin/menu')->with('flash_danger', __('menu.notification.delete'));
    }
}
