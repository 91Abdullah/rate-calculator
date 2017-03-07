@extends('layout')

@section('content')

    <div class="container">
        <div class="panel panel-default">
            <div class="panel-heading">
                Edit Limit Type
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-xs-12 col-md-12">
                        {!! Form::model($limit_type, ['method' => 'PATCH', 'route' => ['limit_types.update', $limit_type->id], 'class' => 'form-inline']) !!}
                        <div class="form-group">
                            <label for="name">Name</label>
                            {!! Form::text('name', null, ['class' => 'form-control']) !!}
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection