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
<script>showPopUp()</script>
<div id="snackbar">
    <ul>
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

@if(session('success'))
<script>showPopUp()</script>
<div id="snackbar">
    {{session('success')}}
</div>
@endif

