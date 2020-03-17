@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row">
            <div class="col-12 col-sm-10">
                <div class="header-content">
                    <div class="page-title">
                        <h4 class="font-weight-bolder">
                            <a href="{{ route('admin.products.index') }}">
                                <span class="font-weight-bold">Product</span>
                            </a>
                            - Create
                        </h4>
                    </div>
                </div>
            </div>
        </div>
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="panel">
                <div class="panel-header">
                    <h5 class="panel-title">Add Product</h5>
                    <p class="text-right">Lorem ipsum dolor sit amet consectetur adipiscing elit, urna consequat felis vehicula class ultricies mollis dictumst, aenean non a in donec nulla.</p>
                </div>
                <div class="panel-body">
                    <form action="{{ route('admin.products.store',) }}" method="POST">
                         @csrf
                        @include('admin.products._form')
                        <button class="btn btn-primary float-right" type="submit">Add Product</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
