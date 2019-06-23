@extends('layouts.app')

@section('content');

<div class="container">
        <h1 class="text-center">All Tasks</h1>
        @if(count($tasks)>=1)
        @foreach ($tasks as $task)
        <div class="well">
                <h3>( {{$task -> id}} ) {{$task -> task}}</h1>
                <h4>{{$task -> month}} , {{$task -> city}} , {{$task -> location}}</h4>
                <h5>Logitude :=> {{$task-> logitude}}  |  Latitude :=>  {{$task -> latitude}}</h5>
                <h5>Created At : {{$task -> created_at}}</h5>
              
                 
        </div>
        @endforeach
    
    @else
        <h6>No Task Found </h6>
    @endif

</div>

@endsection