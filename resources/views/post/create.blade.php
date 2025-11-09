@extends('layouts.main')
@section('content')
<div>
    <div class="mb-3 row">
        <label for="title" class="col-sm-2 col-form-label">Email address</label>
        <div class="col-sm-10">
        <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
        </div>
    </div>
    <div class="mb-3 row">
        <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
        <div class="col-sm-10">
            <input type="password" class="form-control" id="inputPassword">
        </div>
    </div>
</div>
@endsection
