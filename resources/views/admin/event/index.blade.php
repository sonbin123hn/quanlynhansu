<style>
    .dataTables_length{display: none;}
    #dataTable_filter{display: none;}
</style>
<x-admin-master>
    @section('content')
        <h1>Points</h1>
        @if(session('point-deleted'))
            <div class="alert alert-danger">{{session('point-deleted')}}</div>
        @elseif (session('point-created-messages'))
            <div class="alert alert-success">{{session('point-created-messages')}}</div>
        @endif
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">points</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>Id</th>
                            <th>Sự Kiện</th>
                            <th>Điểm</th>
                            <th>Loại Điểm</th>
                            <th>Cập nhật Sự Kiện</th>
                            <th>Delete</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($points as $key => $point)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$point->event}}</td>
                            <td>{{$point->points}}</td>
                            @if($point->type == 0)
                                <td>Điểm Trừ</td>
                            @else
                                <td>Điểm Cộng</td>
                            @endif
                            <td>
                                <form method="get" action="{{route('user.edit-point', $point->id)}}">
                                    <button class="btn btn-primary">Cập nhật sự kiện</button>
                                </form>
                            </td>
                            <td>
                                <form method="post" action="{{route('user.delete-point', $point->id)}}">
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