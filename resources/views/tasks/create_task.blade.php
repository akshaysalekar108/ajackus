@extends('layouts.app')

@section('content');
{{-- {{!! $map['js'] !!}} --}}
<div class="container">
        <h1 class="text-center">Create Task</h1>
        @include('tasks.messages')
        {!! Form::open(['action' => 'PostsController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
        <div class="form-group">
            {{Form::label('task', 'Task')}}
            {{Form::text('task', '', ['class' => 'form-control', 'placeholder' => 'Task'])}}
        </div>
        <div class="form-group">
                {{Form::label('month', 'Month')}}
                {{-- {{Form::text('month', '', ['class' => 'form-control', 'placeholder' => 'month'])}} --}}
                 {{-- {{Form::selectMonth('month')}}; --}}
                 {{Form::select('month', array('January' => 'January', 'February' => 'February','March'=>'March','April'=>'April','May'=>'May','June'=>'June','July'=>'July','August'=>'August','September'=>'September','October'=>'October','November'=>'November','December'=>'December'), null, ['class' => 'form-control'])}}
            </div>
            <div class="form-group">
                {{-- @if($names != null)
                    <select class="form-control" id="cities">
                        @foreach ($names as $item)
                    <option>{{$item}}</option>
                        @endforeach
                    </select>
                    @endif --}}
                   
               
                </div>

            <div class="form-group">
                    {{Form::label('location', 'Location')}} : <small>Enter Country</small>
                    {{Form::text('location', '', ['class' => 'form-control', 'placeholder' => 'Location', 'data-dependent="cities"'])}}
                    {{ Form::hidden('logitude', '', array('id' => 'lng')) }}
                    {{ Form::hidden('latitude', '', array('id' => 'lat')) }}
                </div>

                <div id="map-canvas"></div>
                <div class="form-group">
                        {{Form::label('city', 'City')}}
                        {{-- {{Form::text('city', '', ['class' => 'form-control', 'placeholder' => 'City'])}} --}}
                        {{-- {!! Form::select('city',  $names, null, ['class' => 'form-control']) !!} --}}
                        <select id="cities" name="city" class="form-control">
                           
                            <select>
                        
                    </div>
      
        {{Form::submit('Submit', ['class'=>'btn btn-primary'])}}
    {!! Form::close() !!}

</div>

@endsection