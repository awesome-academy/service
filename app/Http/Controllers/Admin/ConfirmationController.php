<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Facades\MenuRepository;
use App\Repositories\Facades\OrderRepository;
use App\Repositories\Facades\LocationRepository;
use App\Repositories\Facades\ConfirmationRepository;
use Auth;
use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;

class ConfirmationController extends Controller
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
            $confirmation = ConfirmationRepository::with('order')->where('name', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $confirmation = ConfirmationRepository::with('order')->latest()->paginate($perPage);
        }

        return view('admin.confirmation.index', compact('confirmation'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $locations = LocationRepository::where('status_id', 1)->get()->pluck('name', 'id');
        $menus = MenuRepository::get()->pluck('name', 'id');

        return view('admin.confirmation.create', compact('locations', 'menus'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreOrderRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(StoreOrderRequest $request)
    {
        $requestData = $request->except(['location', 'menu']);
        $order = OrderRepository::create($requestData);
        ConfirmationRepository::createConfirm([
            'order_id' => $order->id,
            'user_id' => Auth::user()->id,
            'location_id' => $request->location,
            'menu_id' => $request->menu
        ], 2);

        return redirect('admin/confirmation')->with('flash_message', __('confirmation.notification.add'));
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
        $confirmation = ConfirmationRepository::with('menu', 'order')->findOrFail($id);

        return view('admin.confirmation.show', compact('confirmation'));
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
        $confirmation = ConfirmationRepository::with('menu', 'location')->findOrFail($id);
        if ($confirmation->location_id == null) {
            $locations = LocationRepository::where('status_id', 1)->get()->pluck('name', 'id');
        } else {
            $locations = LocationRepository::freeLocationAndFind(
                1,
                $confirmation->location->id,
                $confirmation->location->name
            );
        }
        $menus = MenuRepository::get()->pluck('name', 'id');

        return view('admin.confirmation.edit', compact('confirmation', 'locations', 'menus'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateOrderRequest $request
     * @param int                $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateOrderRequest $request, $id)
    {
        $requestData = $request->except(['location', 'menu']);
        $confirmation = ConfirmationRepository::findOrFail($id);
        $confirmation->order->update($requestData);
        if ($confirmation->location_id !== null) {
            $confirmation->location->status_id = 1;
            $confirmation->location->save();
        }
        ConfirmationRepository::updateConfirm($id, [
            'user_id' => Auth::user()->id,
            'location_id' => $request->location,
            'menu_id' => $request->menu
        ], 2);

        return redirect('admin/confirmation')->with('flash_message', __('confirmation.notification.update'));
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
        $confirmation = ConfirmationRepository::findOrFail($id);
        ConfirmationRepository::restoreStatusLocation($confirmation);
        $confirmation->order->delete();
        $confirmation->delete();

        return redirect('admin/confirmation')->with('flash_danger', __('confirmation.notification.delete'));
    }
}
