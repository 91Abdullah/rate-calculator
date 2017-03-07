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
                Specify weight limit
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-xs-12 col-md-12">
                        {!! Form::open(['route' => 'types.create', 'class' => 'form-horizontal']) !!}
                        <div class="form-group">
                            <label class="col-lg-2" for="name">Name</label>
                            <div class="col-lg-10">
                                <input type="text" class="form-control" id="name" name="name">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-2" for="weight_limit">Weight Limit or Additional weight (in Kg)</label>
                            <div class="col-lg-10">
                                <input type="text" class="form-control" id="weight_limit" name="weight_limit">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Create</button>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection