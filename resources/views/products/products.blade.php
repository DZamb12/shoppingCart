<x-layout>
    <div class="row mt-5">
        <h1 class>{{ $heading }}</h1>

        @if (session()->has('success'))
        <x-notify type="success" title="Success" content="{{ session('success') }}" />
        @endif

        <table class="table align-middle">
    <tr>        
        <th class="table-success">No.</th>
        <th class="table-success">Image</th>    
        <th class="table-success">Name</th>
        <th class="table-success">Unit</th>
        <th class="table-success">Unit Price</th>
        <th class="table-success">Category</th>
        <th class="table-success">View Detail</th>
    </tr>

    @php
    $count = 1;
    @endphp

    @foreach ($products as $product)
    <tr>        
        <td class="table-warning">{{ $count++ }}</td>
        <td class="table-warning">
            <div class="row align-items-center">
                <div class="align-middle">
                    <img src="{{ $product->image_url ? asset('storage/' . $product->image_url) : asset('/images/icon.png') }}"
                        style="max-width: 10%; height: auto; mix-blend-mode: multiply;">
                </div>
            </div>
        </td>
        <td class="table-warning">{{ $product->name }}</td>
        <td class="table-warning">{{ $product->unit }}</td>
        <td class="table-warning">₱{{ $product->unitPrice }}</td>
        <td class="table-warning">{{ $product->category }}</td>
        <td>
            <form method="POST" action="/products/{{ $product->id }}">
                <div class="d-flex">
                    <a href="/product/{{ $product->id }}" class="me-2"><i class="bi-eye"></i></a>
                    <a href="/product/{{ $product->id }}/edit" class="me-2"><i class="bi-pencil"></i></a>
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-link" type="submit">
                        <i class="bi-trash"></i>
                    </button>
                </div>
            </form>
        </td>
    </tr>
    @endforeach
</table>

        <nav>
            {{-- display pagination links --}}
            {{ $products->links() }}
        </nav>
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