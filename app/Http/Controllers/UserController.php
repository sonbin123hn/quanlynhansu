<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Role;
use App\User;
use Illuminate\Http\Request;
use DateTime;
use App\Position;
use App\Department;
class UserController extends Controller
{
    public function index(Request $request){
        if(!empty($request)){
            $users = User::searchUser($request);
        }else{
            $users = User::all();
        }
        $positions = Position::all();
        $departments = Department::all();
        return view('admin.users.index', ['users'=>$users,'positions' => $positions,'departments' => $departments,'request' => $request]);

    }

    public function show(User $user){
        return view('admin.users.profile', [
            'user'=>$user,
            'roles' => Role::all(),
            'positions' => Position::all(),
            'departments' => Department::all(),
        ]);
    }

    public function update(User $user, UserRequest $request){
        $birthDay = new DateTime($request->birthday);
        $dataUpdate = [
            'username' => $request->username,
            'name' => $request->name,
            'email' => $request->email,
            'birthday' => $birthDay->format('Y-m-d'),
            'phone' => $request->phone,
            'address' => $request->address,
            'place_of_origin' => $request->place_of_origin,
            'ethnicity' => $request->ethnicity,
            'cmnd' => $request->cmnd,
            'sobhxh' => $request->sobhxh,
            'position_id' => $request->position_id,
            'department_id' => $request->department_id,
        ];
        $file = $request->avatar;
        if (!empty($file)) {
            $tailImage = $file->getClientOriginalExtension();
            $dataUpdate['avatar'] = strtotime(date('Y-m-d H:i:s')) . '.' . $tailImage;
            $path = public_path('upload/user/');
        }
       
        if ($request->password != null) {
            $dataUpdate['password'] = $request->password;
        }

        if($user->update($dataUpdate)){
            if (!empty($file)) {
                $file->move($path, $dataUpdate['avatar']);
            }
        }
        session()->flash('user-updated-messages', 'User was updated successfully');
        return back();
    }

    public function attach(User $user){
        $user->roles()->attach(request('role'));

        return back();
    }

    public function detach(User $user){

        $user->roles()->detach(request('role'));

        return back();
    }

    public function destroy(User $user){
        $user->delete();
        session()->flash('user-deleted', 'User has been deleted');
        return back();

    }

    public function create() {
        $positions = Position::all();
        $departments = Department::all();
        return view('admin.users.create', ['positions'=>$positions,'departments' => $departments]);
    }

    public function store(UserRequest $request){
        $birthDay = new DateTime($request->birthday);
        $dataUpdate = [
            'username' => $request->username,
            'name' => $request->name,
            'email' => $request->email,
            'birthday' => $birthDay->format('Y-m-d'),
            'phone' => $request->phone,
            'address' => $request->address,
            'place_of_origin' => $request->place_of_origin,
            'ethnicity' => $request->ethnicity,
            'cmnd' => $request->cmnd,
            'sobhxh' => $request->sobhxh,
            'password' => $request->password,
            'position_id' => $request->position_id,
            'department_id' => $request->department_id,
        ];
        $file = $request->avatar;
        if (!empty($file)) {
            $tailImage = $file->getClientOriginalExtension();
            $dataUpdate['avatar'] = strtotime(date('Y-m-d H:i:s')) . '.' . $tailImage;
            $path = public_path('upload/user/');
        }
        if(User::create($dataUpdate)){
            if (!empty($file)) {
                $file->move($path, $dataUpdate['avatar']);
            }
        }
        session()->flash('user-created-messages', 'User was created successfully');
        return redirect()->route('users.index');
    }
}
