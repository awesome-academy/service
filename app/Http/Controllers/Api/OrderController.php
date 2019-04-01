<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Events\NotificationOrder;
use App\Http\Controllers\Controller;
use App\Repositories\Facades\OrderRepository;
use App\Repositories\Facades\ConfirmationRepository;
use App\Repositories\Facades\PermissionRepository;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        $order = OrderRepository::create($request->all());
        $confirmation = ConfirmationRepository::create(['order_id' => $order->id]);
        $confirmation = $confirmation->load('order');
        $users = PermissionRepository::findByName('notification-confirmation')->getUsersViaRoles();
        foreach ($users as $user) {
            broadcast(new NotificationOrder($confirmation, $user, $user->id));
        }

        return response(['data' => $order, 'message' => 'success']);
    }
}
