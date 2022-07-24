<style>
    .dataTables_length{display: none;}
    #dataTable_filter{display: none;}
</style>
<x-admin-master>

    @section('content')

        <h1>Users</h1>

        @if(session('user-deleted'))
            <div class="alert alert-danger">{{session('user-deleted')}}</div>
        @elseif (session('user-created-messages'))
            <div class="alert alert-success">{{session('user-created-messages')}}</div>
        @endif

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Users</h6>
            </div>
            <form action="{{route('users.index')}}" method="get" class="ml-3">
                <label for="sel1">Search:</label>
                <div class="row">
                    <div class="col-md-3">
                        <div id="example_filter" class="dataTables_filter"><input type="search" name="name" class="form-control form-control-sm" value="{{$request->name}}" placeholder="Tên nhân viên" aria-controls="example"></div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <select class="form-control" id="position_id" name="position_id">
                                <option>Chức vụ</option>
                                @foreach($positions as $valuePositions)
                                    @if($request->position_id == $valuePositions->id)
                                        <option value="{{$valuePositions->id}}" selected>{{$valuePositions->name}}</option>
                                    @else
                                        <option value="{{$valuePositions->id}}">{{$valuePositions->name}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <select class="form-control" id="department_id" name="department_id">
                                <option>Phòng ban</option>
                                @foreach($departments as $valueDepartments)
                                    @if($request->department_id == $valueDepartments->id)
                                        <option value="{{$valueDepartments->id}}" selected>{{$valueDepartments->name}}</option>
                                    @else
                                        <option value="{{$valueDepartments->id}}">{{$valueDepartments->name}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Search</button>
                        </div>
                    </div>
                </div>
            </form>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>STT</th>
                            <th>Username</th>
                            <th>Ảnh</th>
                            <th>Họ Tên</th>
                            <th>Phòng Ban</th>
                            <th>Chức vụ</th>
                            <th>Ngày Tạo</th>
                            <th>Ngày Cập Nhật</th>
                            <td>Delete</td>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $key => $user)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td><a href="{{route('user.profile.show', $user->id)}}">{{$user->username}}</a></td>
                            <td>
                                <img height="50px" src="{{asset('upload/user') }}/{{$user->avatar}}" alt="">
                            </td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->user_Department->name ?? 'chưa cập nhật'}}</td>
                            <td>{{$user->user_Position->name ?? 'chưa cập nhật'}}</td>
                            <td>{{$user->created_at->diffForhumans()}}</td>
                            <td>{{$user->updated_at->diffForhumans()}}</td>
                            <td>
                                <form method="post" action="{{route('user.destroy', $user->id)}}">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    @endsection
    @section('scripts')
        <!-- Page level plugins -->
        <script src="{{asset('vendor/datatables/jquery.dataTables.min.js')}}"></script>
        <script src="{{asset('vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>

        <!-- Page level custom scripts -->
        <script src="{{asset('js/demo/datatables-demo.js')}}"></script>
    @endsection

</x-admin-master>