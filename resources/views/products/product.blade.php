<x-layout>
    <h1 class="mt-5">{{ $product->name }}</h1>

    <div>
        <ul>
            <li>Price: {{ $product->unitPrice }}/{{ $product->unit }}</li>
            <li>Category: {{ $product->category }}</li>

            <a href="/products/manage"><button class="mt-3 btn btn-success">Go Back</button></a>

        </ul>
    </div>
</x-layout>
