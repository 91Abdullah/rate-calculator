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
                    <h2>Limit Types</h2>
                    <h3>
                        <a href="{{ url('admin/limit_types/create') }}" class="btn btn-primary"><i class="fa fa-plus"></i> Create Limit Type</a>
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
                            @foreach($limit_types as $limit_type)
                                <tr>
                                    <td>{{ $limit_type->id }}</td>
                                    <td>{{ $limit_type->name }}</td>
                                    <td>
                                        <form action="{{ route('limit_types.delete') }}" method="post">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                            <input type="hidden" name="id" value="{{ $limit_type->id }}">
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </td>
                                    <td><a href="{{ route('limit_types.edit', ['id' => $limit_type->id]) }}" class="btn btn-info">Edit</a></td>
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