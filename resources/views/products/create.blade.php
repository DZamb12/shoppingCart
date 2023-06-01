<x-layout>
    <div class="container">
        <div class="card mt-5">
            <div class="card-body">
                <h1 class="card-title">New Product Form</h1>
                <form method="POST" action="/product" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Product Name</label>
                        <input type="text" name="name" value="{{ old('name') }}" class="form-control @error('name') is-invalid @enderror" placeholder="Enter the product name">
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="unit" class="form-label">Unit</label>
                        <input type="text" name="unit" value="{{ old('unit') }}" class="form-control @error('unit') is-invalid @enderror" placeholder="Enter the unit of the product">
                        @error('unit')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="unitPrice" class="form-label">Unit Price</label>
                        <input type="text" name="unitPrice" value="{{ old('unitPrice') }}" class="form-control @error('unitPrice') is-invalid @enderror" placeholder="Enter the unit price of the product">
                        @error('unitPrice')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="category" class="form-label">Category</label>
                        <select name="category" class="form-select">
                            <option value="" disabled selected>Choose category</option>
                            <option value="vegetable">Vegetable</option>
                            <option value="meat">Meat</option>
                            <option value="fish">Fish</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="image_url" class="form-label">Image</label>
                        <input type="file" name="image_url" class="form-control">
                    </div>
                    <button class="btn btn-primary float-end">Save</button>
                </form>
            </div>
        </div>
    </div>
</x-layout>


