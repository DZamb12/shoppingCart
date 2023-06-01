<x-layout>
    <div class="card mt-5">
        <div class="card-header">
            <h1 class="card-title">Update Product | {{ $product->name }}</h1>
        </div>
        <div class="card-body">
            <form method="POST" action="/products/{{ $product->id }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="name" class="form-label">Product Name</label>
                    <input type="text" name="name" value="{{ $product->name }}"
                        class="form-control @error('name') is-invalid @enderror" />
                    <div class="invalid-feedback">
                        @error('name')
                            {{ $message }}
                        @enderror
                    </div>
                </div>
                <div class="mb-3">
                    <label for="unit" class="form-label">Unit</label>
                    <input type="text" name="unit" value="{{ $product->unit }}"
                        class="form-control @error('unit') is-invalid @enderror">
                    <div class="invalid-feedback">
                        @error('unit')
                            {{ $message }}
                        @enderror
                    </div>
                </div>
                <div class="mb-3">
                    <label for="unitPrice" class="form-label">Unit Price</label>
                    <input type="text" name="unitPrice" value="{{ $product->unitPrice }}"
                        class="form-control @error('unitPrice') is-invalid @enderror">
                    <div class="invalid-feedback">
                        @error('unitPrice')
                            {{ $message }}
                        @enderror
                    </div>
                </div>
                <div class="mb-3">
                    <label for="category" class="form-label">Category</label>
                    <select name="category" class="form-control">
                        <option {{ $product->category == 'vegetable' ? 'selected' : '' }} value="vegetable">Vegetable</option>
                        <option {{ $product->category == 'meat' ? 'selected' : '' }} value="meat">Meat</option>
                        <option {{ $product->category == 'fish' ? 'selected' : '' }} value="fish">Fish</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="image_url" class="form-label">Image</label>
                    <input type="file" name="image_url" class="form-control">
                </div>
                <button class="btn btn-primary float-end">Update</button>
            </form>
        </div>
    </div>
</x-layout>
