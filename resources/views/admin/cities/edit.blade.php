@extends('layout')

@section('content')

    <div class="container">
        <div class="panel panel-default">
            <div class="panel-heading">
                Edit Zone
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-xs-12 col-md-12">
                        {!! Form::model($city, ['method' => 'PATCH', 'route' => ['cities.update', $zone->id], 'class' => 'form-inline']) !!}
                        <div class="form-group">
                            <label for="name">Name</label>
                            {!! Form::text('name', null, ['class' => 'form-control']) !!}
                        </div>
                        <div class="form-group">
                            <label for="zone_id">Zone</label>
                            {!! Form::select('zone_id', $zones, null, ['class' => 'form-control', 'placeholder' => 'Select Zone']) !!}
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection