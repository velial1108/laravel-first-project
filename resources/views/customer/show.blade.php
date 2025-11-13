@extends('layouts.main')
@section('content')
    <div>

        <div>
            {{$customer->id}}.
            {{$customer->first_name}}
            ||
            {{$customer->email}}
        </div>
        <div>
            <a href="{{route('customer.edit', $customer->id)}}">Edit</a>
        </div>
        <div>
            <form action="{{route('customer.delete', $customer->id)}}" method="post">
                @csrf
                @method('delete')
                <input type="submit" class="btn btn-danger" value="Delete">
            </form>
        </div>
        <div>
            <a href="{{route('customer.index')}}">Back</a>
        </div>
    </div>
@endsection
