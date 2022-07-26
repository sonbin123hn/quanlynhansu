<x-admin-master>
    @section('content')
    <h1>Cập nhật điểm nhân viên : {{$user->name}}-{{$user->user_Department->name ?? 'chưa cập nhật'}}-{{$user->user_Position->name ?? 'chưa cập nhật'}}</h1>
    @if(session('user-created-point-messages'))
        <div class="alert alert-success col-sm-6">{{session('user-created-point-messages')}}</div>
    @endif
    <div class="row">
        <div class="col-sm-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Danh sách lịch sử điểm của nhân viên</h6>
                </div>
                <form action="{{route('user.show-point',$user)}}" method="get" class="ml-3">
                    <div class="row mt-3">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="birthday">Ngày bắt đầu</label>
                                <input type="date" name="dateStart" class="form-control " id="birthday" value="{{$dateStart}}">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="birthday">Ngày ngày kết thúc</label>
                                <input type="date" name="dateEnd" class="form-control " id="birthday" value="{{$dateEnd}}">
                            </div>
                        </div>
                        <div class="col-md-3" style="margin-top: 30px;">
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
                                <th>Tên Sự Kiện</th>
                                <th>Điểm</th>
                                <th>Loại Điểm</th>
                                <th>Ngày cập nhật</th>
                                <th>delete</th>
                            </tr>
                            </thead>
                            @php
                                $total=0;
                            @endphp
                            @foreach($userPoints as $key => $value)
                            <tbody>
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{$value->event}}</td>
                                    <td>{{$value->points}}</td>
                                    @if($value->type == 0)
                                        <td>Điểm Trừ</td>
                                        @php
                                        $total=$total-$value->points;
                                        @endphp
                                    @else
                                        <td>Điểm Cộng</td>
                                        @php
                                        $total=$total+$value->points;
                                        @endphp
                                    @endif
                                    @php
                                        $date=date_create($value->dateCreatePoint);
                                    @endphp
                                    <td>{{date_format($date,"H:i:s d/m/Y")}}</td>
                                    <td>
                                        <form method="post" action="{{route('userDelete-point', $value->userPointID)}}">
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
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Tổng Điểm:{{$total}}</h6>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Cập nhật điểm</h6>
                </div>
                <div class="card-body">
                    <form method="post" action="{{route('userUpdate-point', $user)}}" enctype="multipart/form-data">
                        @csrf
                        @method('POST')
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                <tr>
                                    <th>Option</th>
                                    <th>Id</th>
                                    <th>Tên Sự Kiện</th>
                                    <th>Điểm</th>
                                    <th>Loại Điểm</th>
                                </tr>
                                </thead>
                                @foreach($points as $key => $point)
                                <tbody>
                                    <tr>
                                        <td><input type="Checkbox" name="<?=$key?>[pointID]" value="{{$point->id}}"></td>
                                        <td>{{$key+1}}</td>
                                        <td>{{$point->event}}</td>
                                        <td>{{$point->points}}</td>
                                        @if($point->type == 0)
                                            <td>Điểm Trừ</td>
                                        @else
                                            <td>Điểm Cộng</td>
                                        @endif
                                    </tr>   
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endsection
</x-admin-master>