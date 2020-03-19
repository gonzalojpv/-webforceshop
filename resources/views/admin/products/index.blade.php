@extends('layouts.admin')


@section('content')
<div class="container">
    <div class="row header-content">
        <div class="col-12 col-sm-10">
                <div class="page-title">
                <h4 class="font-weight-bolder"><span class="font-weight-bold">Products</span> - List</h4>
            </div>
        </div>
        <div class="col-12 col-sm-2">
            <div class="heading-elements">
                <div class="heading-btn-group">
                    <a
                        href="{{ route('admin.products.create') }}"
                        class="btn btn-primary">new product</a>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="panel">
                <div class="panel-header">
                    <h5 class="panel-title">All Products</h5>
                    <p class="text-right">Lorem ipsum dolor sit amet consectetur adipiscing elit, urna consequat felis vehicula class ultricies mollis dictumst, aenean non a in donec nulla.</p>
                </div>
                <div class="panel-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th class="text-center">Nº</th>
                                <th>Picture</th>
                                <th>Name</th>
                                <th>Price</th>
                                <th>Description</th>
                                <th>Category</th>
                                <th class="text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $index => $product)
                                <tr>
                                    <td class="text-center" width="10%">{{ $index + 1 }}</td>
                                    <td>
                                        @if( $product->getFirstMediaUrl('images') )
                                        <img class="img-thumbnail" src="{{ $product->getFirstMediaUrl('images') }}" />
                                        @endif
                                    </td><td>
                                        {{ $product->name }}
                                    </td>
                                    <td>{{ $product->price }}</td>
                                    <td>{{ $product->description }}</td>
                                    <td>{{ $product->category? $product->category->name : 'General' }}</td>
                                    <td width="20%" class="text-center">
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                            <a href="{{ route('admin.products.edit', $product->id) }}" class="btn btn-link edit">Edit</a>
                                            <a
                                                href="javascript:void(0)"
                                                onclick="event.preventDefault();
                                                    document.getElementById('remove-form-' + {{ $product->id }}).submit();"
                                                class="btn btn-link delete">Remove</a>
                                            <form
                                                style="display: none;"
                                                id="remove-form-{{ $product->id }}"
                                                action="{{ route('admin.products.destroy', $product->id) }}"
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

    @if ( session('notification') )
    <script>
        swal("Good job!", "{{ session('notification') }}", "success");
    </script>
    @endif
@endsection
