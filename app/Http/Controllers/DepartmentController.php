<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use App\Role;
use App\Permission;
use App\Department;

class DepartmentController extends Controller
{
    public function index(){
        $departments = Department::all();
        return view('admin.departments.index', ['departments'=>$departments]);
    }

    public function store(){
        request()->validate([
            'name' => 'required',
        ]);
        Department::create([
            'name' => Str::ucfirst(request('name')),
        ]);
        session()->flash('department-created-messages', 'Tạo phòng ban thành công');
        return back();
        
    }

    public function destroy(Department $department){
        $department->delete();
        session()->flash('department-deleted', 'Xóa phòng ban thành công' . $department->name);
        return back();
    }

    public function edit(Department $department){
        return view('admin.departments.edit', [
            'department'=>$department,
        ]);
    }

    public function update(Department $department){
        request()->validate([
            'name' => 'required',
        ]);
        session()->flash('department-updated', 'Cập nhập phòng ban thành công' . request('name'));
        $department->update([
            'name' => Str::ucfirst(request('name'))
        ]);
        return back();
    }
}
