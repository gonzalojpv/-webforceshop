@extends('layouts.admin')


@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            @include('admin.partials.header-content')
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="panel">
                <div class="panel-header">

                </div>
                <div class="panel-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th class="text-center">Nº</th>
                                <th>Name</th>
                                <th class="text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $index => $user)
                                <tr>
                                    <td class="text-center" width="10%">{{ $index + 1 }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td width="20%" class="text-center">
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                            <button type="button" class="btn btn-link edit">Edit</button>
                                            <button type="button" class="btn btn-link delete">Remove</button>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
