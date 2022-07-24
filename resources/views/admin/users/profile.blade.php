<x-admin-master>
    @section('content')
    <h1>User Profile for : {{$user->name}}</h1>
    @if(session('user-updated-messages'))
        <div class="alert alert-success col-sm-6">{{session('user-updated-messages')}}</div>
    @endif
    <div class="row mb-5">
        <div class="col-sm-12">
            <form method="post" action="{{route('user.profile.update', $user)}}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <input type="hidden" name="id" value="{{ $user->id }}">
                <div class="form-group">
                    <label>Avatar</label>
                    <div class="row">
                        <div class="clo-md-6">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Upload hình</span>
                                </div>
                                <div>
                                    <input type="file" name="avatar" class="form-control hidden">
                                </div>
                            </div>
                        </div>
                        <div class="clo-md-6">
                            <div class="form-group">
                                <div class="border input-group">
                                    <img src="{{ asset('upload/user') }}/{{$user->avatar}}" alt="Ảnh Hiện tại" width="100px" />
                                </div>
                            </div>
                        </div>
                    </div>
                    @error('avatar')
                    <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" name="username" class="form-control @error('username') is-invalid @enderror" id="username" value="{{ $user->username}}">
                            @error('username')
                            <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="name">Họ và tên</label>
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" value="{{ $user->name}}">
                            @error('name')
                            <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row">  
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" name="email" class="form-control @error('email') is-invalid @enderror" id="email" value="{{$user->email}}">
                            @error('email')
                            <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="birthday">Ngày sinh</label>
                            @php
                                $date=date_create($user->birthday);
                            @endphp
                            <input type="date" name="birthday" class="form-control @error('birthday') is-invalid @enderror" id="birthday" value="{{date_format($date,'Y-m-d') ?? ''}}">
                            @error('birthday')
                            <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row">  
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="phone">Số điện thoại</label>
                            <input type="number" name="phone" class="form-control @error('phone') is-invalid @enderror" id="phone" value="{{ $user->phone }}">
                            @error('phone')
                            <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="address">Địa chỉ</label>
                            <input type="text" name="address" class="form-control @error('address') is-invalid @enderror" id="address" value="{{ $user->address }}">
                            @error('address')
                            <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row">  
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="place_of_origin">Quê quán</label>
                            <input type="text" name="place_of_origin" class="form-control @error('place_of_origin') is-invalid @enderror" id="place_of_origin" value="{{ $user->place_of_origin }}">
                            @error('place_of_origin')
                            <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="ethnicity">Dân tộc</label>
                            <input type="text" name="ethnicity" class="form-control @error('ethnicity') is-invalid @enderror" id="ethnicity" value="{{ $user->ethnicity }}">
                            @error('ethnicity')
                            <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row">  
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="cmnd">Sô CMND</label>
                            <input type="number" name="cmnd" class="form-control @error('cmnd') is-invalid @enderror" id="cmnd" value="{{ $user->cmnd }}">
                            @error('cmnd')
                            <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="sobhxh">Số BHXH</label>
                            <input type="number" name="sobhxh" class="form-control @error('sobhxh') is-invalid @enderror" id="sobhxh" value="{{ $user->sobhxh }}">
                            @error('sobhxh')
                            <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row">  
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="sel1">Chức vụ:</label>
                            <select class="form-control" id="position_id" name="position_id">
                                <option>Chức vụ</option>
                                @foreach($positions as $valuePositions)
                                    @if($user->position_id == $valuePositions->id)
                                        <option value="{{$valuePositions->id}}" selected>{{$valuePositions->name}}</option>
                                    @else
                                        <option value="{{$valuePositions->id}}">{{$valuePositions->name}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="sel1">Phòng ban:</label>
                            <select class="form-control" id="department_id" name="department_id">
                                <option>Phòng ban</option>
                                @foreach($departments as $valueDepartments)
                                    @if($user->department_id == $valueDepartments->id)
                                        <option value="{{$valueDepartments->id}}" selected>{{$valueDepartments->name}}</option>
                                    @else
                                        <option value="{{$valueDepartments->id}}">{{$valueDepartments->name}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="password">
                            @error('password')
                            <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="password-confirmation">Confirm Password</label>
                            <input type="password" name="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror" id="password-confirmation">
                            @error('password_confirmation')
                            <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Roles</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                            <tr>
                                <th>Option</th>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Slug</th>
                                <th>Attach</th>
                                <th>Detach</th>
                            </tr>
                            </thead>
                            @foreach($roles as $role)
                            <tbody>
                                <tr>
                                <td><input type="Checkbox"
                                @foreach($user->roles as $user_role)
                                        @if($user_role->slug == $role->slug)
                                                checked
                                        @endif
                                @endforeach
                                ></td>
                                <td>{{$role->id}}</td>
                                <td><a href="{{route('roles.edit', $role->id)}}">{{$role->name}}</a></td>
                                <td>{{$role->slug}}</td>
                                <td>
                                    <form method="post" action="{{route('user.role.attach', $user)}}">
                                        @method('PUT')
                                        @csrf
                                    <input type="hidden" name="role" value="{{$role->id}}">
                                    <button type="submit" class="btn btn-primary"
                                        @if($user->roles->contains($role))
                                                disabled
                                        @endif
                                    >Attach
                                    </button>
                                    </form>
                                </td>
                                <td>
                                    <form method="post" action="{{route('user.role.detach', $user)}}">
                                        @method('PUT')
                                        @csrf
                                    <input type="hidden" name="role" value="{{$role->id}}">
                                    <button type="submit" class="btn btn-danger"
                                        @if(!$user->roles->contains($role))
                                                disabled
                                        @endif
                                    >Detach                                                                     
                                    </button>
                                    </form>
                                </td>
                                </tr>   
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @endsection
</x-admin-master>