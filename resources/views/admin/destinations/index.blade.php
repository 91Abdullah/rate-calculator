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
                        <h2>Destinations</h2>
                        <h3>
                            <a href="{{ url('admin/destinations/create') }}" class="btn btn-primary"><i class="fa fa-plus"></i> Create Destination</a>
                        </h3>
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <tr>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th colspan="2">Actions</th>
                                </tr>
                                @foreach($destinations as $destination)
                                    <tr>
                                        <td>{{ $destination->id }}</td>
                                        <td>{{ $destination->name }}</td>
                                        <td>
                                            <form action="{{ route('destinations.delete') }}" method="post">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}
                                                <input type="hidden" name="id" value="{{ $destination->id }}">
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </form>
                                        </td>
                                        <td><a href="{{ route('destinations.edit', ['id' => $destination->id]) }}" class="btn btn-warning">Edit</a></td>
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