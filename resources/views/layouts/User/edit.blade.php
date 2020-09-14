@extends('layouts.app')

@section('title','Edit Profile')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col">
            <div class="card ">
                <div class="card-body">
                    <div class="row">
                        <div class="col-3">
                            <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist"
                                aria-orientation="vertical">

                                <a class="nav-link active" id="v-pills-edit-tab" data-toggle="pill" href="#v-pills-edit"
                                    role="tab" aria-controls="v-pills-edit" aria-selected="true">Edit Profile</a>
                            </div>
                            <hr>
                        </div>
                        <div class="col-9 text-center border-left">
                            <div class="tab-content" id="v-pills-tabContent">
                                <div class="tab-pane fade show active" id="v-pills-edit" role="tabpanel"
                                    aria-labelledby="v-pills-edit-tab">
                                    @include('layouts.User.editForm')

                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
@section('js')
<script>
    var loadFile = function(event) {
    var output = document.getElementById('output');
    var imgInput = document.getElementById('customFile');
    var label = document.getElementById('labelIMG');
    output.src = URL.createObjectURL(event.target.files[0]);
    output.onload = function() {
      URL.revokeObjectURL(output.src)
    }
    label.innerHTML = imgInput.value;

  };

</script>
@endsection
