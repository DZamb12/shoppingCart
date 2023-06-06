<x-layout>
    <div class="container">
        <div class="card">
            <div class="row">
                <div class="col-md-4">
                    <img src="{{$product->image_url ? asset('storage/'.$product->image_url) : asset('/images/iconhome.png')}}" class="card-img" alt="Product Image">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h1 class="card-title">Product Details</h1>
                        <h2>Name: {{$product->name}}</h2>
                        <h2>Category: {{$product->category}}</h2>
                        <h2>Price: {{$product->unitPrice}}/{{$product->unit}}</h2>
                    </div>
                </div>
            </div>
            <div class="card-footer d-flex justify-content-end">
                <a href="/index2" class="btn btn-secondary me-2">Go Back</a>
                <a href="/product/{{$product['id']}}/edit" class="btn btn-warning">Edit Product</a>
            </div>
        </div>
    </div>
</x-layout>
