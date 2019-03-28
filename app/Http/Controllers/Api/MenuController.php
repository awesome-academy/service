<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Facades\MenuRepository;

class MenuController extends Controller
{
    public function index(Request $request)
    {
        $perPage = config('paginate.apiMenu');
        $menu = MenuRepository::with('typeMenu', 'dishes')->latest()->paginate($perPage);
        foreach ($menu as $key => $value) {
            $value['collapse'] = true;
        }

        return response()->json(['result' => $menu]);
    }
}
