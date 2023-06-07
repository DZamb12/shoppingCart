<x-layout2>
    <h1>Product Catalogue</h1>
    @php
        $total = 0;
    @endphp

    </div>
    @if (session()->has('success'))
        <x-notify type="success" title="Success" content="{{ session('success') }}" />
    @endif
    @unless ($products->isEmpty())
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12">
                    <div class="card my-4 card-registration  card-registration-2" style="border-radius: 15px;">
                        <div class="card-body p-0">
                            <div class="row g-0">
                                <div class="col-lg-8">
                                    <div class="p-5">
                                        <div class="d-flex justify-content-between align-items-center mb-5">
                                            <h1 class="fw-bold mb-0 text-black">Shopping Cart</h1>

                                        </div>
                                        <hr class="my-4">
                                        @foreach ($products as $product)
                                            @php $total += $product->unitPrice   @endphp
                                            <div class="card my-4 card-registration  card-registration-2"
                                                style="border-radius: 15px;">
                                                <div class="row mb-4 d-flex justify-content-between align-items-center">
                                                    <div class="col-md-2 col-lg-2 col-xl-2">
                                                        <img src="{{ $product->image_url ? asset('storage/' . $product->image_url) : asset('/images/iconhome.png') }}"
                                                            class="card-img-top">
                                                    </div>
                                                    <div class="col-md-3 col-lg-3 col-xl-3">
                                                        <h6 class="text-muted">Name: {{ $product->name }}</h6>
                                                        <h6 class="text-black mb-0">Category: {{ $product->category }}</h6>
                                                    </div>
                                                    <div class="col-md-3 col-lg-3 col-xl-2 d-flex">
                                                        <form method="POST"action="/cart/{{ $product['id'] }}/remove">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button class="btn btn-warning" type submit>Remove</i></button>
                                                        </form>
                                                    </div>
                                                    <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
                                                        <h6 class="mb-0">{{ $product->unitPrice }}/{{ $product->unit }}
                                                        </h6>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                        <hr class="my-4">

                                        <div class="pt-5">
                                            <h6 class="mb-0"><a href="/userproducts" class="text-body"><i
                                                        class="fas fa-long-arrow-alt-left me-2"></i>Back to shop</a></h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 bg-grey">
                                    <div class="p-5">
                                        <h3 class="fw-bold mb-5 mt-2 pt-1">Total: {{ $total }}
                                        </h3>
                                        <hr class="my-4">
                                        <form method="POST"action="/cart/{{ $product->id }}/destroyall">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-dark btn-block btn-lg"
                                                data-mdb-ripple-color="dark">Buy</button>
                                        </form>



                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @else
            <div class="container py-5 h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-12">
                        <div class="card my-4 card-registration card-registration-2" style="border-radius: 15px;">
                            <div class="card-body p-0">
                                <div class="row g-0">
                                    <div class="col-lg-8">
                                        <div class="p-5">
                                            <div class="d-flex justify-content-between align-items-center mb-5">
                                                <h1 class="fw-bold mb-0 text-black">Shopping Cart</h1>

                                            </div>
                                            <hr class="my-4">
                                            <h1>No Products Added Yet</h1>
                                            <hr class="my-4">

                                            <div class="pt-5">
                                                <h6 class="mb-0"><a href="/userproducts" class="text-body"><i
                                                            class="fas fa-long-arrow-alt-left me-2"></i>Back to shop</a>
                                                </h6>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 bg-grey">
                                        <div class="p-5">
                                            <h3 class="fw-bold mb-5 mt-2 pt-1">Summary</h3>
                                            <hr class="my-4">
                                            <button type="button" class="btn btn-dark btn-block btn-lg"
                                                data-mdb-ripple-color="dark">Buy</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endunless
        </div>
    </div>
    </div>
</x-layout2>
