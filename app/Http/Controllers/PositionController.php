<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use App\Role;
use App\Position;
use App\Department;

class PositionController extends Controller
{
    public function index(){
        $positions = Position::all();
        return view('admin.positions.index', ['positions'=>$positions]);
    }

    public function store(){
        request()->validate([
            'name' => 'required',
        ]);
        Position::create([
            'name' => Str::ucfirst(request('name')),
        ]);
        session()->flash('position-created-messages', 'Tạo chức vụ thành công');
        return back();
        
    }

    public function destroy(Position $position){
        $position->delete();
        session()->flash('position-deleted', 'Xóa chức vụ thành công' . $position->name);
        return back();
    }

    public function edit(Position $position){
        return view('admin.positions.edit', [
            'position'=>$position,
        ]);
    }

    public function update(Position $position){
        request()->validate([
            'name' => 'required',
        ]);
        session()->flash('position-updated', 'Cập nhập phòng ban thành công' . request('name'));
        $position->update([
            'name' => Str::ucfirst(request('name'))
        ]);
        return back();
    }
}
