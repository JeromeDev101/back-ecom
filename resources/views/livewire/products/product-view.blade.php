<div class="container mx-auto p-4">

    <div class="flex justify-between items-center mb-4">
        <a href="{{ route('products.create') }}" class="bg-blue-500 text-white p-2 rounded">New Product</a>
    </div>

    <livewire:product-table />

</div>
