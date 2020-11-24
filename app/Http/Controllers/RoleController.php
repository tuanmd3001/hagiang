<?php

namespace App\Http\Controllers;

use App\DataTables\RoleDataTable;
use App\Http\Requests\CreateRoleRequest;
use App\Http\Requests\UpdateRoleRequest;
use App\Repositories\RoleRepository;
use Flash;
use Illuminate\Support\Facades\Auth;
use Response;
use Spatie\Permission\Models\Permission;

class RoleController extends AppBaseController
{
    /** @var  RoleRepository */
    private $roleRepository;

    public function __construct(RoleRepository $roleRepo)
    {
        $this->roleRepository = $roleRepo;
    }

    /**
     * Display a listing of the Role.
     *
     * @param RoleDataTable $roleDataTable
     * @return Response
     */
    public function index(RoleDataTable $roleDataTable)
    {
        return $roleDataTable->render('roles.index');
    }

    /**
     * Show the form for creating a new Role.
     *
     * @return Response
     */
    public function create()
    {
        $permissions = Permission::all();
        return view('roles.create', compact('permissions'));
    }

    /**
     * Store a newly created Role in storage.
     *
     * @param CreateRoleRequest $request
     *
     * @return Response
     */
    public function store(CreateRoleRequest $request)
    {
        $input = $request->all();

        $role = $this->roleRepository->create($input);

        if (!empty($input['permissions'])){
            $role->syncPermissions($input['permissions']);
        }
        else {
            $role->syncPermissions([]);
        }

        Flash::success('Thêm mới thành công');

        return redirect(route('roles.index'));
    }

    /**
     * Display the specified Role.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $role = $this->roleRepository->find($id);
        if ($role->name == "SuperAdmin") {
            return redirect(route('roles.index'));
        }
        if (empty($role)) {
            Flash::error('Không tìm thấy thông tin');

            return redirect(route('roles.index'));
        }
        $permissions = Permission::all();
        $rolePermissions = $role->permissions()->pluck('name')->toArray();
        return view('roles.show', compact('role', 'rolePermissions', 'permissions'));
    }

    /**
     * Show the form for editing the specified Role.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $role = $this->roleRepository->find($id);
        if ($role->name == "SuperAdmin") {
            return redirect(route('roles.index'));
        }
        if (empty($role)) {
            Flash::error('Không tìm thấy thông tin');

            return redirect(route('roles.index'));
        }
        $permissions = Permission::all();
        $rolePermissions = $role->permissions()->pluck('name')->toArray();
        return view('roles.edit', compact('role', 'permissions', 'rolePermissions'));
    }

    /**
     * Update the specified Role in storage.
     *
     * @param int $id
     * @param UpdateRoleRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateRoleRequest $request)
    {
        $role = $this->roleRepository->find($id);
        if ($role->name == "SuperAdmin") {
            return redirect(route('roles.index'));
        }
        if (empty($role)) {
            Flash::error('Không tìm thấy thông tin');

            return redirect(route('roles.index'));
        }

        $role = $this->roleRepository->update($request->all(), $id);

        if (!empty($input['permissions'])){
            $role->syncPermissions($input['permissions']);
        }
        else {
            $role->syncPermissions([]);
        }

        Flash::success('Cập nhật thông tin thành công');

        return redirect(route('roles.index'));
    }

    /**
     * Remove the specified Role from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $role = $this->roleRepository->find($id);
        if ($role->name == "SuperAdmin") {
            return redirect(route('roles.index'));
        }
        if (empty($role)) {
            Flash::error('Không tìm thấy thông tin');

            return redirect(route('roles.index'));
        }

        $this->roleRepository->delete($id);

        Flash::success('Xóa thành công');

        return redirect(route('roles.index'));
    }
}
