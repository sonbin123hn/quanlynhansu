<x-admin-master>
    @section('content')
    <h1>Create a new user</h1>
    <div class="row">
        <div class="col-sm-6">
            <form method="post" action="{{route('users.store')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                            <input type="file" name="avatar">
                    </div>
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text"
                            name="username"
                            class="form-control @error('username') is-invalid @enderror"
                            id="username"
                            value="{{ old('username')}}">
                        @error('username')
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text"
                                name="name"
                                class="form-control @error('name') is-invalid @enderror"
                                id="name"
                                value="{{ old('name')}}">
                        @error('name')
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text"
                                name="email"
                                class="form-control @error('email') is-invalid @enderror"
                                id="email"
                                value="{{ old('email')}}">
                        @error('email')
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password"
                                name="password"
                                class="form-control @error('password') is-invalid @enderror"
                                id="password">
                        @error('password')
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="password-confirmation">Confirm Password</label>
                        <input type="password"
                                name="password_confirmation"
                                class="form-control @error('password_confirmation') is-invalid @enderror"
                                id="password-confirmation">
                        @error('password_confirmation')
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
    @endsection
</x-admin-master>