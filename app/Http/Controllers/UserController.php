<?php

namespace App\Http\Controllers;

use App\DataTables\UserDataTable;
use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\Constants;
use App\Models\User;
use App\Rules\MatchOldPassword;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use App\Repositories\UserRepository;
use Flash;
use Response;

class UserController extends AppBaseController
{
    /** @var  UserRepository */
    private $userRepository;
    private $defaultPassword;

    public function __construct(UserRepository $userRepo)
    {
        $this->userRepository = $userRepo;
    }

    /**
     * Display a listing of the User.
     *
     * @param UserDataTable $userDataTable
     * @return Response
     */
    public function index(UserDataTable $userDataTable)
    {
        return $userDataTable->render('users.index');
    }

    /**
     * Show the form for creating a new User.
     *
     * @return Response
     */
    public function create()
    {
        $roles = Role::all();
        $permissions = Permission::all();
        return view('users.create', compact('roles', 'permissions'));
    }

    /**
     * Store a newly created User in storage.
     *
     * @param CreateUserRequest $request
     *
     * @return Response
     */
    public function store(CreateUserRequest $request)
    {
        $input = $request->all();
        $input['password'] = Hash::make(Constants::DEFAULT_PASSWORD);

        $user = $this->userRepository->create($input);

        if (!empty($input['roles'])){
            $user->syncRoles($input['roles']);
        }
        else {
            $user->syncRoles([]);
        }

        if (!empty($input['permissions'])){
            $user->syncPermissions($input['permissions']);
        }
        else {
            $user->syncPermissions([]);
        }


        Flash::success('Thêm mới thành công');

        return redirect(route('users.index'));
    }

    /**
     * Display the specified User.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $user = $this->userRepository->find($id);
        if ($user->username == 'admin') {
            return redirect(route('users.index'));
        }
        if (empty($user)) {
            Flash::error('Không tìm thấy thông tin');

            return redirect(route('users.index'));
        }
        $permissions = Permission::all();
        $userPermissions = $user->permissions()->pluck('name')->toArray();

        return view('users.show', compact('user', 'permissions', 'userPermissions'));
    }

    /**
     * Show the form for editing the specified User.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $user = $this->userRepository->find($id);
        if ($user->username == 'admin') {
            return redirect(route('users.index'));
        }
        if (empty($user)) {
            Flash::error('Không tìm thấy thông tin');

            return redirect(route('users.index'));
        }
        $roles = Role::all();
        $permissions = Permission::all();
        $userPermissions = $user->permissions()->pluck('name')->toArray();

        return view('users.edit', compact('user', 'roles', 'permissions', 'userPermissions'));
    }

    /**
     * Update the specified User in storage.
     *
     * @param int $id
     * @param UpdateUserRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateUserRequest $request)
    {
        $user = $this->userRepository->find($id);
        if ($user->username == 'admin') {
            return redirect(route('users.index'));
        }
        if (empty($user)) {
            Flash::error('Không tìm thấy thông tin');

            return redirect(route('users.index'));
        }
        $input = $request->all();
        if (!empty($input['password'])) {
            $input['password'] = Hash::make($input['password']);
        } else {
            unset($input['password']);
        }
        $user = $this->userRepository->update($input, $id);

        if (!empty($input['roles'])){
            $user->syncRoles($input['roles']);
        }
        else {
            $user->syncRoles([]);
        }

        if (!empty($input['permissions'])){
            $user->syncPermissions($input['permissions']);
        }
        else {
            $user->syncPermissions([]);
        }

        Flash::success('Cập nhật thông tin thành công');

        return redirect(route('users.index'));
    }

    /**
     * Remove the specified User from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $user = $this->userRepository->find($id);
        if ($user->username == 'admin') {
            return redirect(route('users.index'));
        }
        if (empty($user)) {
            Flash::error('Không tìm thấy thông tin');

            return redirect(route('users.index'));
        }

        $this->userRepository->delete($id);

        Flash::success('Xóa thành công');

        return redirect(route('users.index'));
    }

    public function reset_password($id)
    {
        $user = $this->userRepository->find($id);

        if (empty($user)) {
            Flash::error('Không tìm thấy thông tin');

            return redirect(route('users.index'));
        }
        $user->password = Hash::make(Constants::DEFAULT_PASSWORD);
        $this->userRepository->update($user->toArray(), $id);
        Flash::success('Mật khẩu đã được đặt về mặc định.');
        return redirect(route('users.show', $id));
    }

    public function change_password(Request $request){
        if($request->isMethod('get')){
            return view('users.change_password');
        }
        elseif($request->isMethod('post')) {
            $request->validate( [
                'old_password' => ['required', new MatchOldPassword],
                'new_password' => ['required'],
                're_new_password' => ['same:new_password']
            ]);

            User::find(auth()->user()->id)->update(['password'=> Hash::make($request->new_password)]);

            Flash::success('Đổi mật khẩu thành công.');
            return redirect(route('home'));
        }
        else {
            return redirect(route('home'));
        }

    }
}
