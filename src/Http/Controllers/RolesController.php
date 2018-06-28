<?php

namespace Ge\Lararole\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Ge\Lararole\Http\Models\Permission;
use Ge\Lararole\Http\Models\Role;

class RolesController extends Controller
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
        $data['roles'] = Role::all();
        return view('lararole::roles.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [];

        $data['permissions'] = Permission::findModulePermissions();

        $data['hasPerms'] = collect([]);

        $data['role'] = new Role;

        return view('lararole::roles.create', $data);
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

        $role = new Role($request->all());

        $role->slug = kebab_case($request->name);

        $role->save();

        $role->syncPermissions($request->permissions);

        session('success', 'Role Created Successfully.');

        return redirect()->route('roles');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response | mixed
     */
    public function show(Role $role)
    {
        return $role;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        $data = [];

        $data['role'] = $role;

        $data['permissions'] = Permission::findModulePermissions();

        $data['hasPerms'] = $role->permissions->pluck('id');

        return view('lararole::roles.create', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {
        $request->validate($this->getValidationRole());

        $role->fill($request->all());

        $role->slug = kebab_case($request->name);

        $role->save();

        $role->syncPermissions($request->permissions);

        session('success', 'Role Updated Successfully.');

        return redirect()->route('roles');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        //
    }

    private function getValidationRole()
    {
        return [
            'name' => 'required',
            'permissions' => 'required|array'
        ];
    }
}
