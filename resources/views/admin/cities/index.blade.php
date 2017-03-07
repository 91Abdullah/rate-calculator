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
                        <h2>City</h2>
                        <h3>
                            <a href="{{ url('admin/cities/create') }}" class="btn btn-primary"><i class="fa fa-plus"></i> Add City</a>
                        </h3>
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <tr>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>Zone</th>
                                    <th colspan="2">Actions</th>
                                </tr>
                                @foreach($cities as $city)
                                    <tr>
                                        <td>{{ $city->id }}</td>
                                        <td>{{ $city->name }}</td>
                                        <td>{{ $city->zone->name }}</td>
                                        <td>
                                            <form action="{{ route('cities.delete') }}" method="post">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}
                                                <input type="hidden" name="id" value="{{ $city->id }}">
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </form>
                                        </td>
                                        <td><a href="{{ route('cities.edit', ['id' => $city->id]) }}" class="btn btn-warning">Edit</a></td>
                                    </tr>
                                @endforeach
                            </table>
                        </div>
                        {{ $cities->links() }}
                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection