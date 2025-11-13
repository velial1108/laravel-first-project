@extends('layouts.main')
@section('content')
    <form action="{{route('customer.update', $customer->id)}}" method="post">
        @csrf
        @method('patch')
        <div class="mb-3 row">
            <label for="first_name" class="col-sm-2 col-form-label">Измените имя:</label>
            <div class="col-sm-10">
                <input type="text" name="first_name" class="form-control" id="first_name" placeholder="First_name" value="{{$customer->first_name}}">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="last_name" class="col-sm-2 col-form-label">Измените фамилию</label>
            <div class="col-sm-10">
                <input type="text" name="last_name" class="form-control" id="last_name" placeholder="Last_name" value="{{$customer->last_name}}">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="middle_name" class="col-sm-2 col-form-label">Измените отчество</label>
            <div class="col-sm-10">
                <input type="text" name="middle_name" class="form-control" id="middle_name" placeholder="Middle_name" value="{{$customer->middle_name}}">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="email" class="col-sm-2 col-form-label">Измените email</label>
            <div class="col-sm-10">
                <input type="text" name="email" class="form-control" id="email" placeholder="Email" value="{{$customer->email}}">
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Изменить</button>
    </form>
@endsection
