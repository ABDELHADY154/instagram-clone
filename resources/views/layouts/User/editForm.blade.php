<form class="user" method="POST" action="{{ route('profile.update') }}">
    @method('PUT')
    @csrf
    <div class="">

        <div class="avatar-upload" {{ "data-image=\"".asset("images/avatar/".$user->image)."\"" }}>
            <img class="avatar-preview" id="output" src=" {{asset('images/avatar/'. $user->image) }}">
        </div>
        <div class="row text-center justify-content-center">
            <div class="col-xl-8">
                <div class="form-group mb-3">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="customFile" onchange="loadFile(event)"
                            accept=".png, .jpg, .jpeg" name="image">
                        <label class="custom-file-label" for="customFile" id="labelIMG">Choose file</label>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="row text-center justify-content-center">
        <div class="form-group w-75">
            <label for="userName" class="float-left">User Name</label>

            <input type="text" class="form-control form-control-user" id="userName" placeholder="User Name"
                name="user_name" value="{{ $user->user_name }}" autocomplete="user_name" autofocus>

            @error('user_name')
            <span class="text-danger" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror

        </div>
    </div>
    <div class="row text-center justify-content-center">
        <div class="form-group w-75">
            <label for="Name" class="float-left">Full Name</label>
            <input type="text" class="form-control form-control-user" id="Name" placeholder="Full Name"
                value="{{ $user->name }}" name="name" autocomplete="name" autofocus>

            @error('name')
            <span class="text-danger" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror

        </div>
    </div>
    <div class="row text-center justify-content-center">
        <div class="form-group w-75">
            <label for="email" class="float-left">E-mail</label>
            <input type="email" class="form-control form-control-user" id="email" placeholder="Email Address"
                autocomplete="email" name="email" value="{{$user->email}}">

            @error('email')
            <span class="text-danger" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror

        </div>
    </div>

    <div class="row text-center justify-content-center">
        <div class="form-group w-75">
            <label for="phone" class="float-left">Phone Number</label>
            <input type="text" class="form-control form-control-user" name="phone_number" id="phone"
                placeholder="Phone Number" autocomplete="phone_number" value="{{$user->phone_number}}">

            @error('phone_number')
            <span class="text-danger" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror

        </div>
    </div>
    <div class="row text-center justify-content-center">
        <div class="form-group w-75">
            <label for="website" class="float-left">Website</label>
            <input type="text" class="form-control form-control-user" name="website" id="website" placeholder="Website"
                autocomplete="phone_number" value="{{$user->website}}">

            @error('website')
            <span class="text-danger" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror

        </div>
    </div>

    <div class="row text-center justify-content-center">
        <div class="form-group w-75">
            <label for="website" class="float-left">Bio</label>
            <textarea name="bio" id="bio" cols="30" rows="5"
                class="form-control form-control-user">{{$user->bio}}</textarea>

            @error('bio')
            <span class="text-danger" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror

        </div>
    </div>
    <div class="row text-center justify-content-center">
        <div class="form-group w-75">
            <label for="gender" class="float-left">Gender:</label>
            <div class="form-group text-left" id="gender">
                <div class="form-check form-check-inline">
                    <input class="form-check-input ml-3" type="radio" name="gender" id="inlineRadio1" value="male"
                        {{$user->gender == 'male'?'checked':''}}>
                    <label class=" form-check-label" for="inlineRadio1">Male</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="gender" id="inlineRadio2" value="female"
                        {{$user->gender == 'female'?'checked':''}}>
                    <label class="form-check-label" for="inlineRadio2">Female</label>
                </div>
                <div class="text-center">
                    @error('gender')
                    <span class="text-danger" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror</div>
            </div>
        </div>
    </div>

    <div class="row text-center justify-content-center">
        <div class="form-group w-75">
            <input type="submit" value="Update" class="btn btn-primary">
        </div>
    </div>
    {{-- <button type="submit" class="nav-link active">
        {{ __('Update') }}
    </button> --}}



</form>
