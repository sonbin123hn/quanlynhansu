<x-admin-master>
    @section('content')
    <h1>Edit event</h1>
    <div class="row">
        <div class="col-sm-6">
            <form method="post" action="{{route('user.update-point', $point->id)}}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="name">Point</label>
                        <input type="text"
                                name="points"
                                class="form-control @error('points') is-invalid @enderror"
                                id="points"
                                value="{{ $point->points}}">
                        @error('points')
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="event">Event</label>
                        <input type="text"
                                name="event"
                                class="form-control @error('event') is-invalid @enderror"
                                id="event"
                                value="{{ $point->event}}">
                        @error('event')
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Select Type</label>
                        <div>
                            <select class="form-control form-control-line" type="text"
                                name="type"
                                class="form-control @error('type') is-invalid @enderror"
                                id="type"
                                value="{{ $point->type}}">>
                                @if($point->type == 0)
                                    <option value="0" selected>minus point</option>
                                    <option value="1">plus mark</option>
                                @else
                                    <option value="0">minus point</option>
                                    <option value="1" selected>plus mark</option>
                                @endif
                            </select>
                            @error('type')
                                <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
    @endsection
</x-admin-master>