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
                Create Rate
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-xs-12 col-md-12">
                        {!! Form::open(['route' => 'rates.create', 'class' => 'form-horizontal']) !!}
                        <div class="form-group">
                            <label for="service_id" class="col-sm-2 control-label">Rates</label>
                            <div class="col-sm-10">
                                {!! Form::select('service_id', $services, null, ['class' => 'form-control', 'placeholder' => 'Select service type']) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="destination_id" class="col-sm-2 control-label">Destination</label>
                            <div class="col-sm-10">
                                {!! Form::select('destination_id', $destinations, null, ['class' => 'form-control', 'placeholder' => 'Select destination type']) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="rate" class="col-sm-2 control-label">Amount (Rs.)</label>
                            <div class="col-sm-4">
                                {!! Form::text('rate', null, ['class' => 'form-control']) !!}
                            </div>
                            <label for="upto" class="col-sm-2 control-label">Upto</label>
                            <div class="col-sm-4">
                                <div class="input-group">
                                    {!! Form::text('upto', null, ['class' => 'form-control']) !!}
                                    <span class="input-group-addon" id="basic-addon2">Kg</span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="additional_rate" class="col-sm-2 control-label">Additional Rate</label>
                            <div class="col-sm-4">
                                {!! Form::text('additional_rate', null, ['class' => 'form-control']) !!}
                            </div>
                            <label for="additional_weight" class="col-sm-2 control-label">Per</label>
                            <div class="col-sm-4">
                                <div class="input-group">
                                    {!! Form::text('additional_weight', null, ['class' => 'form-control']) !!}
                                    <span class="input-group-addon" id="basic-addon2">Kg</span>
                                </div>
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