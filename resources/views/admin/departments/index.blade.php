<x-admin-master>
    @section('content')
    <div class="row">
    @if(session('department-deleted'))
        <div class="alert alert-danger">{{session('department-deleted')}}</div>
    @elseif (session('department-created-messages'))
        <div class="alert alert-success">{{session('department-created-messages')}}</div>
    @endif
    </div>
    <div class="row">
            <div class  = "col-sm-3">
                <form method="post" action="{{route('departments.store')}}">
                    @csrf
                    <div class="form-group">
                        <label for="name">Tên phòng ban</label>
                        <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror">
                        @error('name')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Create</button>
                </form>
            </div>
            <div class  = "col-sm-9">
            <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Phòng ban</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                            <tr>
                                <th>Id</th>
                                <th>Tên phòng ban</th>
                                <th>Delete</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($departments as $department)
                                <tr>
                                    <td>{{$department->id}}</td>
                                    <td> <a href="{{route('departments.edit', $department->id)}}">{{$department->name}}</a></td>
                                    <td>
                                        <form action="{{route('departments.destroy', $department->id)}}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
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
    
    </x-admin-master>