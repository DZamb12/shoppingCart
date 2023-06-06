<x-layout>
    <div class="container">
        <div class="card">
            <div class="row">
                <div class="col-md-4">
                    <img src="{{$product->image_url ? asset('storage/'.$product->image_url) : asset('/images/iconhome.png')}}" class="card-img" alt="Product Image" style="object-fit: cover; width: 100%; height: 100%;">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h1 class="card-title">Product Update | {{$product->name}}</h1>
                        <form method="POST" action="/products/{{$product->id}}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row mb-3">
                                <label for="name" class="col-sm-2 col-form-label">Product Name:</label>
                                <input type="text" value="{{$product->name}}" name="name" class="form-control @error('name') is-invalid @enderror">
                                <div class="text-danger">
                                    @error('name')
                                    {{$message}}
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="unit" class="col-sm-2 col-form-label">Unit:</label>
                                <input type="text" value="{{$product->unit}}" name="unit" class="form-control @error('unit') is-invalid @enderror">
                                <div class="text-danger">
                                    @error('unit')
                                    {{$message}}
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="unitPrice" class="col-sm-2 col-form-label">Unit Price:</label>
                                <input type="text" value="{{$product->unitPrice}}" name="unitPrice" class="form-control @error('unitPrice') is-invalid @enderror">
                                <div class="text-danger">
                                    @error('unitPrice')
                                    {{$message}}
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="category">Category:</label>
                                <div class="col-sm-10">
                                    <select name="category" class="form-control">
                                        <option {{$product->category == "vegetable" ? "selected" : ""}} value="vegetable">Vegetable</option>
                                        <option {{$product->category == "meat" ? "selected" : ""}} value="meat">Meat</option>
                                        <option {{$product->category == "fish" ? "selected" : ""}} value="fish">Fish</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="image_url">Image</label>
                                <input value="{{$product['image_url']}}" type="file" name="image_url" class="form-control">
                            </div>
                            <button class="btn btn-primary">Save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>
