<x-admin-master>
    @section('content')
    <div class="row">
    @if(session('position-deleted'))
        <div class="alert alert-danger">{{session('position-deleted')}}</div>
    @elseif (session('position-created-messages'))
        <div class="alert alert-success">{{session('position-created-messages')}}</div>
    @endif
    </div>
    <div class="row">
            <div class  = "col-sm-3">
                <form method="post" action="{{route('positions.store')}}">
                    @csrf
                    <div class="form-group">
                        <label for="name">Tên chức vụ</label>
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
                    <h6 class="m-0 font-weight-bold text-primary">Chức vụ</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                            <tr>
                                <th>Id</th>
                                <th>Tên chức vụ</th>
                                <th>Delete</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($positions as $position)
                                <tr>
                                    <td>{{$position->id}}</td>
                                    <td> <a href="{{route('positions.edit', $position->id)}}">{{$position->name}}</a></td>
                                    <td>
                                        <form action="{{route('positions.destroy', $position->id)}}" method="post">
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