<x-layout>
    <main>
        <div class="container-fluid bg-trasparent my-4 p-3" style="position: relative;">
            <form class="mb-4">
                <div class="input-group">
                    <input type="text" value="{{ request('search') }}" name="search" class="form-control"
                        placeholder="Search products.." aria-label="Search products.." aria-describedby="button-addon2">
                    <button class="btn btn-outline-primary" type="submit" id="button-addon2">Search</button>
                </div>
            </form>

            <div class="row">
            <div class="row row-cols-1 row-cols-xs-2 row-cols-sm-2 row-cols-lg-4 g-3">

                @unless ($products->isEmpty())

                    @foreach ($products as $product)
                        <div class="col">
                            <div class="card h-100 shadow-sm"> 
                            <img src="{{ $product->image_url ? asset('storage/' . $product->image_url) : asset('/images/icon.png') }}"
                                    class="card-img-top" alt="..." style="max-height: 200px; width: auto;">
                                <div class="card-body">
                                    <div class="clearfix mb-3"> <span
                                            class="float-start badge rounded-pill bg-primary">{{ $product->getCategory() }}</span>
                                        <span
                                            class="float-end price-hp">&#8369;{{ $product->unitPrice }}/{{ $product->unit }}</span>
                                    </div>
                                    <h5 class="card-title">{{ $product->name }}</h5>
                                    <form action="/cart/{{$product['id']}}">
                                        <input type="hidden" name="name" value="{{$product['name']}}">
                                        <input type="hidden" name="unit" value="{{$product['unit']}}">
                                        <input type="hidden" name="unitPrice" value="{{$product['unitPrice']}}">
                                        <input type="hidden" name="category" value="{{$product['category']}}">
                                        <input type="hidden" name="image_url" value="{{$product['image_url']}}">
                                        <button type="submit" class="btn btn-info">Add to Cart</button>
                                    </form>
                                    {{-- <form action="{{ route('addToCart', ['id' => $product['id']]) }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="name" value="{{ $product['name'] }}">
                                        <input type="hidden" name="unit" value="{{ $product['unit'] }}">
                                        <input type="hidden" name="unitPrice" value="{{ $product['unitPrice'] }}">
                                        <input type="hidden" name="category" value="{{ $product['category'] }}">
                                        <input type="hidden" name="image_url" value="{{ $product['image_url'] }}">
                                        <button type="submit" class="btn btn-info">Add to Cart</button>
                                    </form> --}}
                                    
                                    </div>
                                </div>
                            </div>
                    @endforeach
                @else
                    <div>
                        <span>No products found. Please visit again later!</span>
                    </div>
                @endunless
            </div>
        </div>
    </main>
</x-layout>
