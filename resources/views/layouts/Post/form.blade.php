<form class="user" method="POST" action="{{ route('post.store') }}" enctype="multipart/form-data">
    @csrf

    <div class="">
        <div class="avatar-upload">
            <img class="avatar-preview  rounded-0" id="output" src=" {{asset('storage/images/avatars/default.png') }}">
        </div>
        <div class="row text-center justify-content-center">
            <div class="col-xl-8">
                <div class="form-group mb-3">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="customFile" onchange="loadFile(event)"
                            name="image">
                        <label class="custom-file-label" for="customFile" id="labelIMG">Choose
                            file</label>
                    </div>
                    @error('image')
                    <span class="text-danger" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
        </div>
        <div class="row text-center justify-content-center">
            <div class="col-xl-8">
                <div class="form-group mb-3">
                    <label class="float-left" for="customFile" id="labelIMG">
                        Caption</label>
                    <textarea name="caption" id="" cols="30" rows="3" class="form-control"></textarea>
                    @error('caption')
                    <span class="text-danger" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
        </div>
        <div class="row text-center justify-content-center">
            <div class="col-xl-8">
                <div class="form-group mb-3">
                    <label>Tags:</label>
                    <br />
                    <input data-role="tagsinput" type="text" name="tags" class="form-control" style="color: black">
                    <br>
                    @error('tags')
                    <span class="text-danger" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

            </div>
        </div>
    </div>

    <br>
    <div class="row text-center justify-content-center">
        <div class="form-group w-75">
            <button type="submit" class="btn btn-primary">Create</button>
        </div>
    </div>

</form>
