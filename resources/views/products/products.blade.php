<x-layout>
    <div class="card mt-5">
        <div class="card-header">
            <h1>{{ $heading }}</h1>
        </div>
        @if (session()->has('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <div class="card-body">
            <table class="table align-middle">
                <thead class="table-success">
                    <tr>
                        <th>No.</th>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Unit</th>
                        <th>Unit Price</th>
                        <th>Category</th>
                        <th>View Detail</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $count = 1;
                    @endphp
                    @foreach ($products as $product)
                        <tr>
                            <td>{{ $count++ }}</td>
                            <td>
                                <div class="row align-items-center">
                                    <div class="align-middle">
                                        <img src="{{ $product->image_url ? asset('storage/' . $product->image_url) : asset('/images/icon.png') }}" style="max-width: 30%; height: auto;">
                                    </div>
                                </div>
                            </td>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->unit }}</td>
                            <td>₱{{ $product->unitPrice }}</td>
                            <td>{{ $product->category }}</td>
                            <td class="align-middle">
                                <div class="d-flex justify-content-center align-items-center" style="padding: 10px;">
                                    <a href="/product/{{ $product->id }}" class="me-2"><i class="bi bi-eye"></i></a>
                                    <a href="/product/{{ $product->id }}/edit" class="me-2"><i class="bi bi-pencil"></i></a>
                                    <form method="POST" action="/products/{{ $product->id }}">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-link" type="submit">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <nav>
                {{-- display pagination links --}}
                {{ $products->links() }}
            </nav>
        </div>
    </div>
</x-layout>


{{-- @extends('layout')

@section('content')
<h1>{{ $heading }}</h1>

<style>
    a {
        padding: 6px 12px;
    }
</style>

<div class="row">

    @if (session()->has('success'))
    <x-notify type="success" title="Success" content="{{ session('success') }}" />
    @endif


    <table class='table table-striped'>
        <tr>
            <th>ID</th>
            <th>Product Name</th>
            <th>Unit</th>
            <th>Unit Price</th>
            <th>Category</th>
            <th>View Details</th>
        </tr>

        @php
        $count = 1;
        @endphp

        @foreach ($products as $product)
        <tr>
            <td>{{ $count++ }}</td>
            <td>{{ $product->name }}</td>
            <td>{{ $product->unit }}</td>
            <td>{{ $product->unitPrice }}</td>
            <td>{{ $product->category }}</td>
            <td class="table-info">
                <form method="POST" action="/products/{{ $product->id }}">
                    <a href="/product/{{ $product->id }}"><i class="bi-eye"></i></a>
                    <a href="/product/{{ $product->id }}/edit"><i class="bi-pencil"></i></a>
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-link" type="submit">
                        <i class="bi-trash"></i>
                    </button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    <nav>
        {{ $products->links() }}
    </nav>
</div>

<div class="row">
    <div class="col-2">
        <a href="/products/create" class="btn btn-primary">New Product</a>
    </div>
</div>
@endsection
--}}