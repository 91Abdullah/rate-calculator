@extends('layout')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-md-6 col-lg-6 col-md-offset-3">
                @include('admin.partials.alerts')
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">

                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h2>Rates</h2>
                        <h3>
                            <a href="{{ url('admin/rates/create') }}" class="btn btn-primary"><i class="fa fa-plus"></i> Create Rate</a>
                        </h3>
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-hover table-bordered">
                                <tr>
                                    <th>Id</th>
                                    <th>Service</th>
                                    <th>Destination</th>
                                    <th>Rate (Rs)</th>
                                    <th>Weight Upto</th>
                                    <th>Additional Rate</th>
                                    <th>Per</th>
                                    <th colspan="2">Actions</th>
                                </tr>
                                @foreach($rates as $rate)
                                    <tr>
                                        <td>{{ $rate->id }}</td>
                                        <td>{{ $rate->service->name }}</td>
                                        <td>{{ $rate->destination->name }}</td>
                                        <td>{{ $rate->rate }}</td>
                                        <td>{{ $rate->upto }} Kg</td>
                                        <td>{{ $rate->additional_rate }}</td>
                                        <td>{{ $rate->additional_weight }} Kg</td>
                                        <td>
                                            <form action="{{ route('rates.delete') }}" method="post">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}
                                                <input type="hidden" name="id" value="{{ $rate->id }}">
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </form>
                                        </td>
                                        <td><a href="{{ route('rates.edit', ['id' => $rate->id]) }}" class="btn btn-warning">Edit</a></td>
                                    </tr>
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection