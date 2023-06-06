<x-layout>

	<?php
	$count = 1 ?>

    <div class="container">
        <h1 class="text-left">Manage Products</h1>

        @if (session()->has('success'))
            <x-notify type="success" title="Success" content="{{ session('success') }}" />
        @endif

        @unless ($products->isEmpty())
            <table class="table table-striped text-center">
                <thead class="table-dark">
                    <tr>
						<th>No.</th>
                        <th>Name</th>
                        <th>Image</th>
                        <th>Unit</th>
                        <th>Unit Price</th>
                        <th>Category</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                        <tr>
							<td>{{$count++}}</td>
                            <td> <strong> {{ $product['name'] }}</td>
                            <td><img src="{{$product->image_url ? asset('storage/'.$product->image_url):asset('/images/iconhome.png')}}" class="card-img-top" alt="Product Image" style="max-width: 100px; max-height: 100px;"></td>
                            <td>{{ $product['unit'] }}</td>
                            <td>{{ $product['unitPrice'] }}</td>
                            <td>{{ $product['category'] }}</td>
                            <td>
                                <div class="d-flex justify-content-center">
                                    <div class="me-2">
                                        <a href="/product/{{ $product['id'] }}">
                                            <button class="btn btn-info" style="background-color: blue;"><i class="bi bi-eye"></i></button>
                                        </a>
                                    </div>
                                    <div class="me-2">
                                        <a href="/product/{{ $product['id'] }}/edit">
                                            <button class="btn btn-warning" style="background-color: yellow;"><i class="bi bi-pencil"></i></button>
                                        </a>
                                    </div>
                                    <div>
                                        <form method="POST" action="/products/{{ $product['id'] }}/delete">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger" type="submit" style="background-color: red;"><i class="bi bi-trash"></i></button>
                                        </form>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <div class="row">
                <h3 class="text-center">No Products Found</h3>
            </div>
        @endunless

        <div class="d-flex justify-content-center">
            <nav>
                {{ $products->links() }}
            </nav>
        </div>
    </div>
</x-layout>
