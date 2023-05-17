<?php

    

namespace App\Http\Controllers;

    

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use App\Models\User;

use Spatie\Permission\Models\Role;

use DB;

use Hash;

use Illuminate\Support\Arr;

use Illuminate\View\View;

use Illuminate\Http\RedirectResponse;

    

class StudentController extends Controller

{

    /**

     * Display a listing of the resource.

     *

     * @return \Illuminate\Http\Response

     */

    public function index(Request $request): View

    {
        $role = Role::where('name', 'student')->first();
        $data = User::Role($role)->latest()->paginate(5);

  

        return view('users.index',compact('data'))

            ->with('i', ($request->input('page', 1) - 1) * 5);

    }


    public function show($id): View

    {

        $user = User::find($id);

        return view('users.show',compact('user'));

    }

    


}