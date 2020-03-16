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
                    <h5 class="panel-title">All Customers</h5>
                    <p class="text-right">Lorem ipsum dolor sit amet consectetur adipiscing elit, urna consequat felis vehicula class ultricies mollis dictumst, aenean non a in donec nulla.</p>
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
                                            <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-link edit">Edit</a>
                                            <a
                                                href="javascript:void(0)"
                                                onclick="event.preventDefault();
                                                    document.getElementById('remove-form-' + {{ $user->id }}).submit();"
                                                class="btn btn-link delete">Remove</a>
                                            <form
                                                style="display: none;"
                                                id="remove-form-{{ $user->id }}"
                                                action="{{ route('admin.users.destroy', $user->id) }}"
                                                method="POST">
                                                @method('DELETE')
                                                @csrf
                                            </form>
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
