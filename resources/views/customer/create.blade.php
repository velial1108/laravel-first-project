@extends('layouts.main')
@section('content')
    <form action="{{route('customer.store')}}" method="post">
        @csrf
        <div class="mb-3 row">
            <label for="first_name" class="col-sm-2 col-form-label">Добавьте имя:</label>
            <div class="col-sm-10">
                <input type="text" name="first_name" class="form-control" id="first_name" placeholder="First_name">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="last_name" class="col-sm-2 col-form-label">Добавьте фамилию</label>
            <div class="col-sm-10">
                <input type="text" name="last_name" class="form-control" id="last_name" placeholder="Last_name">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="middle_name" class="col-sm-2 col-form-label">Добавьте отчество</label>
            <div class="col-sm-10">
                <input type="text" name="middle_name" class="form-control" id="middle_name" placeholder="Middle_name">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="email" class="col-sm-2 col-form-label">Добавьте email</label>
            <div class="col-sm-10">
                <input type="text" name="email" class="form-control" id="email" placeholder="Email">
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Добавить</button>
    </form>
@endsection
