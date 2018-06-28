<?php

namespace Ge\Lararole\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Ge\Lararole\Http\Models\Permission;

class PermissionsController extends Controller
{
    public function __construct()
    {
        $this->middleware(['web', 'auth']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response | mixed
     */
    public function index()
    {
        $data['permissions'] = Permission::all();
        return view('lararole::permissions.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [];

        $data['permission'] = new Permission;

        return view('lararole::permissions.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate($this->getValidationRole());

        $permission = new Permission($request->all());

        $permission->save();

        session('success', 'Permission Created Successfully.');

        return redirect()->route('roles');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response | mixed
     */
    public function show(Permission $permission)
    {
        return $permission;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Permission $permission)
    {
        $data = [];

        $data['permission'] = $permission;

        return view('lararole::permissions.create', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Permission $permission)
    {
        $request->validate($this->getValidationRole($permission));

        $permission->fill($request->all());

        $permission->save();

        session('success', 'Permission Updated Successfully.');

        return redirect()->route('permissions');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Permission $role)
    {
        //
    }

    private function getValidationRole($permission = false)
    {
        $unique = $permission ? ',' . request('gate'): '';

        return [
            'name' => 'required',
            'gate' => 'required|unique:permissions,gate'. $unique,
            'module' => 'required'
        ];
    }
}
