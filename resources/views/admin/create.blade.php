<x-layout>

    <x-slot name="title">
        Create Product
    </x-slot>

    <div class="container py-0">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-5">
                        <img src="{{ asset('https://upload.wikimedia.org/wikipedia/commons/thumb/f/f8/Agdz-rosino-05.jpg/1200px-Agdz-rosino-05.jpg') }}" alt="Product Image" style="object-fit: cover; width: 100%; height: 100%";>
                    </div>
                    <div class="col-md-6">
                        <h1 class="card-title">Create a New Product</h1>
                        <form method="POST" action="/product" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">Product Name:</label>
                                <input type="text" value="{{ old('name') }}" name="name"
                                    class="form-control @error('name') is-invalid @enderror" />
                                <div class="invalid-feedback">
                                    @error('name')
                                    {{ $message }}
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="unit" class="form-label">Unit:</label>
                                <input type="text" value="{{ old('unit') }}" name="unit"
                                    class="form-control @error('unit') is-invalid @enderror" />
                                <div class="invalid-feedback">
                                    @error('unit')
                                    {{ $message }}
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="unitPrice" class="form-label">Unit Price:</label>
                                <input type="text" name="unitPrice" value="{{ old('unitPrice') }}" name="unitPrice"
                                    class="form-control @error('unitPrice') is-invalid @enderror" />
                                <div class="invalid-feedback">
                                    @error('unitPrice')
                                    {{ $message }}
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="category" class="form-label">Category:</label>
                                <select name="category" class="form-select">
                                    <option value="vegetable">Vegetable</option>
                                    <option value="meat">Meat</option>
                                    <option value="fish">Fish</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="image_url" class="form-label">Image:</label>
                                <input type="file" name="image_url" class="form-control">
                            </div>
                            <button class="btn btn-primary">Save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-layout>
