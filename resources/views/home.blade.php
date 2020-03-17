@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Catalogue</div>
                <div class="card-body">
                    <a href="{{ route('admin.users.index') }}"  class="btn btn-link btn-lg btn-block">Users</a>
                    <a href="{{ route('admin.categories.index') }}" class="btn btn-link btn-lg btn-block">Category</a>
                    <a href="#" class="btn btn-link btn-lg btn-block">Products</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
