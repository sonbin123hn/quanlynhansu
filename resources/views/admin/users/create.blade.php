<x-admin-master>
    @section('content')
    <h1>Create a new user</h1>
    <div class="row">
        <div class="col-sm-12">
            <form method="post" action="{{route('users.store')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label>Avatar</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Upload hình</span>
                            </div>
                            <div>
                                <input type="file" name="avatar" class="form-control hidden">
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
                                <input type="text" name="username" class="form-control @error('username') is-invalid @enderror" id="username" value="{{ old('username')}}">
                                @error('username')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="name">Họ và tên</label>
                                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" value="{{ old('name')}}">
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
                                <input type="text" name="email" class="form-control @error('email') is-invalid @enderror" id="email" value="{{ old('email')}}">
                                @error('email')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="birthday">Ngày sinh</label>
                                <input type="date" name="birthday" class="form-control @error('birthday') is-invalid @enderror" id="birthday" value="{{ old('birthday')}}">
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
                                <input type="number" name="phone" class="form-control @error('phone') is-invalid @enderror" id="phone" value="{{ old('phone')}}">
                                @error('phone')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="address">Địa chỉ</label>
                                <input type="text" name="address" class="form-control @error('address') is-invalid @enderror" id="address" value="{{ old('address')}}">
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
                                <input type="text" name="place_of_origin" class="form-control @error('place_of_origin') is-invalid @enderror" id="place_of_origin" value="{{ old('place_of_origin')}}">
                                @error('place_of_origin')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="ethnicity">Dân tộc</label>
                                <input type="text" name="ethnicity" class="form-control @error('ethnicity') is-invalid @enderror" id="ethnicity" value="{{ old('ethnicity')}}">
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
                                <input type="number" name="cmnd" class="form-control @error('cmnd') is-invalid @enderror" id="cmnd" value="{{ old('cmnd')}}">
                                @error('cmnd')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="sobhxh">Số BHXH</label>
                                <input type="number" name="sobhxh" class="form-control @error('sobhxh') is-invalid @enderror" id="sobhxh" value="{{ old('sobhxh')}}">
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
                                    <option value="{{$valuePositions->id}}">{{$valuePositions->name}}</option>
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
                                    <option value="{{$valueDepartments->id}}">{{$valueDepartments->name}}</option>
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
    @endsection
</x-admin-master>
