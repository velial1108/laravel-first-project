@extends('layouts.main')
@section('content')
<div class="me-6">
    <div><a href="{{route('customer.create')}}">Создать клиента</a> </div>
@foreach($customers as $customer)
    <div class="me-6"><a href="{{route('customer.show', $customer->id)}}">
    {{$customer->id}}.
    {{$customer->first_name}}.
    {{$customer->last_name}}
        </a> </div>
@endforeach
</div>
@endsection
