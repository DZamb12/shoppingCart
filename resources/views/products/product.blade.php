<x-layout>
    <h1 class="mt-5">{{ $product->name }}</h1>

    <div>
        <ul>
            <li>Price: {{ $product->unitPrice }}/{{ $product->unit }}</li>
            <li>Category: {{ $product->category }}</li>
            <li>Image:
                <div>
                <img src="{{ $product->image_url ? asset('storage/' . $product->image_url) : asset('/images/icon.png') }}"
                style="max-width: 30%; height: auto;"></li>
            </div>
            <a href="/products/manage"><button class="mt-3 btn btn-success">Go Back</button></a>

        </ul>
    </div>
</x-layout>
