<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class RoleController extends Controller
{
    /**
     * @return mixed
     * @throws Exception
     */
    public function index(Request $request)
    {

        $roles = Role::query()->select('roles.*');
        if ($request->ajax()) {
            return DataTables::of($roles)
                ->order(function ($query) {
                    if (request()->has('created_at')) {
                        $query->orderBy('created_at', 'desc');
                    }
                })
                ->make(true);
        }
        return view('roles', compact('roles'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return void
     */
    public function create()
    {


    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request)
    {
        $input = $request->all();
        $role = Role::create($input);


        if (!$role) {
            return response()->json(['code' => 0, 'msg' => 'Something went wrong']);
        } else {
            return response()->json(['code' => 1, 'msg' => 'New Role has been successfully saved']);
        }
    }

    /**
     * @param Request $request
     * @return JsonResponse
     *
     */
    public function show(Request $request)
    {
        $role_id = $request->id;
        $roleDetails = Role::find($role_id);

        return response()->json(['details' => $roleDetails]);
    }

    /**
     * @param Role $role
     * @return JsonResponse
     */
    public function edit(Role $role)
    {
        return response()->json(['role' => $role]);
    }

    /**
     * @param Role $role
     * @param Request $request
     * @return JsonResponse
     */
    public function update(Role $role, Request $request)
    {
        $input = $request->all();
        $role->update($input);

        return response()->json(['msg' => 'Role has Been updated']);
    }


    /**
     * @param Request $request
     * @param Role $role
     * @return JsonResponse
     */
    public function destroy(Request $request, Role $role)
    {
        $input = $request->all();
        $role->delete();

        return response()->json(['msg' => 'Role has been deleted from database']);
    }
}
