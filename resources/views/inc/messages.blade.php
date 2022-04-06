{{-- <div class="section">
    <div class="container">
        <div class="row">
@if($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

@if(session('success'))
<div class="alert alert-success">
    {{session('success')}}
</div>
@endif
        </div>
    </div>
</div> --}}
@if($errors->any())
{{-- <script>showPopUp()</script> --}}
<div id="snackbar" class="snackbar_error">
    <ul>
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

@if(session('success'))
{{-- <script>showPopUp()</script> --}}
<div id="snackbar" class="snackbar_success">
    {{session('success')}}
</div>
@endif

