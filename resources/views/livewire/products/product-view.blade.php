<div class="container mx-auto p-4">

    <div class="flex justify-between items-center mb-4">
        <a href="{{ route('products.create') }}" class="text-white bg-green-500 hover:bg-green-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">New Product</a>
    </div>

    <livewire:product-table />

</div>
