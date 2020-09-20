@extends('layouts.app')

@section('title','Create')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mt-3">
                @include('layouts.Post.form')
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
