<x-layout>
    <h1>Product Catalogue</h1>

    @php
        $total = 0;
    @endphp

    @if (session()->has('success'))
    @endif

    @unless ($products->isEmpty())
        <div class="container py-6 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12">
                    <div class="card text-white bg-dark mb-3 my-4 card-registration card-registration-2">
                        <div class="card-body p-0">
                            <div class="row g-0">
                                <div class="col-lg-8">
                                    <div class="p-5">
                                        <div class="d-flex justify-content-between align-items-center mb-5">
                                            <h1 class="fw-bold mb-0 text-white">Shopping Cart</h1>
                                        </div>
                                        <hr class="my-4">
                                        @foreach ($products as $product)
                                            @php $total += $product->unitPrice @endphp
                                            <div class="card my-2 card-registration card-registration-2 mb-3"
                                                style="border-radius: 15px;">
                                                <div class="row d-flex justify-content-between align-items-center">
                                                    <div class="col-md-2 col-lg-5 col-xl-3 d-flex justify-content-center">
                                                        <img src="{{ $product->image_url ? asset('storage/' . $product->image_url) : asset('/images/iconhome.png') }}"
                                                            class="card-img-top" style="max-width: 80%">
                                                    </div>
                                                    <div class="col-md-3 col-lg-3 col-xl-3">
                                                        <h6 class="text-muted">Name: {{ $product->name }}</h6>
                                                        <h6 class="text-black mb-0">Category: {{ $product->category }}</h6>
                                                    </div>
                                                    <div class="col-md-3 col-lg-3 col-xl-2 d-flex">
                                                        <form method="POST" action="/cart/{{ $product['id'] }}/remove">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button class="btn btn-danger" type="submit">Remove</button>
                                                        </form>
                                                    </div>
                                                    <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
                                                        <h6 class="mb-0">₱{{ $product->unitPrice }}/{{ $product->unit }}
                                                        </h6>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                        <hr class="my-4">

                                        <div class="pt-5">
                                            <div class="row align-items-center">
                                                <div class="col">
                                                    <h3 class="mb-0">
                                                        <a href="/" class="btn btn-secondary text-white">
                                                            Back to shop
                                                        </a>
                                                    </h3>
                                                </div>
                                                <div class="col">
                                                    <nav>
                                                        <br>
                                                        {{-- display pagination links --}}
                                                        {{ $products->links() }}
                                                    </nav>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 bg-grey">
                                    <div class="p-5">
                                        <h3 class="fw-bold mb-5 mt-2 pt-1">Total: ₱{{ $total }}</h3>
                                        <hr class="my-4">
                                        <form method="POST" action="/cart/{{ $product->id }}/destroyall">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-warning btn-lg"
                                                data-mdb-ripple-color="dark">Buy</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="container py-2 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12">
                    <div class="card my-4 card-registration card-registration-2" style="border-radius: 0px;">
                        <div class="card-body p-0">
                            <div class="row g-0">
                                <div class="col-lg-8">
                                    <div class="p-5 text-white bg-dark">
                                        <div class="d-flex justify-content-between align-items-center mb-2">
                                            <h1 class="fw-bold mb-0">Shopping Cart</h1>
                                        </div>
                                        <hr class="my-4">
                                        <h3>No Products Added Yet</h1>
                                            <hr class="my-4">
                                            <div class="pt-5">
                                                <h3 class="mb-0">
                                                    <a href="/" class="btn btn-secondary text-white">
                                                        Back to shop
                                                    </a>
                                                </h3>
                                            </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 bg-grey">
                                    <div class="p-5">
                                        <h3 class="fw-bold mb-3 mt-2 pt-1">Summary</h3>
                                        <h6 class="text-muted">No products in the cart.</h6>
                                        <hr class="my-4">
                                        <a href="/"><button type="button" class="btn btn-success btn-block btn-lg"
                                                data-mdb-ripple-color="dark">Buy</button></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endunless
</x-layout>
