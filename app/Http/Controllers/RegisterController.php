<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserStoreRequest;
use App\Models\Tenant;
use Illuminate\Http\Request;

class RegisterController extends Controller
{

    function index(){
        return view('auth.register');
    }

    function storeUser(UserStoreRequest $request){
        $tenant =  Tenant::create($request->validated());
        $tenant->createDomain($tenant->domain);

        return redirect(tenant_route($tenant->domain,'login'));
    }
}
