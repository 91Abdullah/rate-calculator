@extends('layout')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-md-6 col-lg-6 col-md-offset-3">
                @include('admin.partials.validation')
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                Add City
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-xs-12 col-md-12">
                        {!! Form::open(['route' => 'cities.create', 'class' => 'form-inline']) !!}
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Name of City">
                            </div>
                            <div class="form-group">
                                <label for="zone_id">Zone</label>
                                {!! Form::select('zone_id', $zones, null, ['class' => 'form-control', 'placeholder' => 'Select Zone']) !!}
                            </div>
                            <button type="submit" class="btn btn-primary">Create</button>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection