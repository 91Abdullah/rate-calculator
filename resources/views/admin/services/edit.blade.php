@extends('layout')

@section('content')

    <div class="container">
        <div class="panel panel-default">
            <div class="panel-heading">
                Edit Service
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-xs-12 col-md-12">
                        {!! Form::model($service, ['method' => 'PATCH', 'route' => ['services.update', $service->id], 'class' => 'form-horizontal']) !!}
                        <div class="form-group">
                            <label for="name" class="col-sm-2">Name</label>
                            <div class="col-sm-10">
                                {!! Form::text('name', null, ['class' => 'form-control']) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="description" class="col-sm-2">Description</label>
                            <div class="col-sm-10">
                                {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <button type="submit" class="btn btn-primary">Create</button>
                            </div>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection