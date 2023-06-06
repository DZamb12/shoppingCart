<x-layout>

    <head>
        <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
        <style>
            .card {
                position: relative;
                overflow: hidden;
            }

            .card img {
                width: 100%;
                height: 100%;
                object-fit:contain;
            }

            .card-overlay {
                position: absolute;
                bottom: 0;
                left: 0;
                width: 100%;
                background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.3));
                padding: 20px;
                color: #fff;
            }

            .card-overlay h5 {
                font-size: 1.5rem;
                margin-bottom: 5px;
            }

            .card-overlay p {
                font-size: 2rem;
                margin-bottom: 8px;
            }

            .card-overlay button {
                margin-top: 10px;
				float: right;
            }
        </style>
    </head>

    <h1 class="text-center" style="font-family: 'Pacifico', cursive; font-size: 3rem;">Everything is made fresh</h1>
    <br>
    <hr>
    <div class="d-flex justify-content-end my-3">
        <form class="input-group">
            <input type="text" name="search" class="form-control" placeholder="Search...">
            <button class="btn btn-info" type="submit">Search</button>
        </form>
    </div>

    @if (session()->has('success'))
        <x-notify type="success" title="Success" content="{{ session('success') }}" />
    @endif

    @unless ($products->isEmpty())
        <div class="row">
            @foreach ($products as $product)
                <div class="col-md-4">
                    <div class="card h-50 shadow-sm my-2">
                        <div class="card-image">
                            <img src="{{ $product->image_url ? asset('storage/' . $product->image_url) : asset('/images/iconhome.png') }}"
                                alt="Product Image">
                            <div class="card-overlay">
                                <h5 class="card-title">{{ $product->name }}</h5>
                                <p class="card-text">{{ $product->unitPrice }}/{{ $product->unit }}</p>
                                <div class="text-center">
                                    <form action="/cart/{{ $product['id'] }}">
                                        <input type="hidden" name="name" value="{{ $product['name'] }}">
                                        <input type="hidden" name="unit" value="{{ $product['unit'] }}">
                                        <input type="hidden" name="unitPrice" value="{{ $product['unitPrice'] }}">
                                        <input type="hidden" name="category" value="{{ $product['category'] }}">
                                        <input type="hidden" name="image_url" value="{{ $product['image_url'] }}">
                                        <button type="submit" class="btn btn-success">Add to Cart</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <div class="row">
            <h3 class="text-center text-muted">Sorry no products found! Please come back again!</h3>
        </div>
    @endunless

    <div class="d-flex justify-content-center">
        <nav>
            {{ $products->links() }}
        </nav>
    </div>

</x-layout>
