@extends('layouts.app')
@section('title','Search')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <input type="text" id="myInput" class="form-control" onkeyup="myFunction()" autocomplete="off"
                placeholder="Search for names..">

            <ul id="myUL" class="">
                @foreach($users as $user)
                <li style="display: none">

                    <a href="{{route('profile.view',$user->id)}}"> <img
                            src=" {{asset('storage/images/avatars/'. $user->avatar) }}"
                            class="Instagram-card-user-image d-inline"> {{$user->user_name}}</a></li>
                @endforeach
            </ul>
            </form>
        </div>
    </div>
</div>
@endsection
@section('js')

<script>
    function myFunction() {
      // Declare variables
      var input, filter, ul, li, a, i, txtValue;
      input = document.getElementById('myInput');
      filter = input.value.toUpperCase();
      ul = document.getElementById("myUL");
      li = ul.getElementsByTagName('li');

      // Loop through all list items, and hide those who don't match the search query
      for (i = 0; i < li.length; i++) {
        a = li[i].getElementsByTagName("a")[0];
        txtValue = a.textContent || a.innerText;
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
          li[i].style.display = "";
        } else {
          li[i].style.display = "none";
        }
      }
    }
</script>
@endsection
