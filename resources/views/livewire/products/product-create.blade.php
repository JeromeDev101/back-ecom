<div class="container mx-auto p-4">

    <form wire:submit.prevent="store">
        <div class="grid gap-6 mb-6 md:grid-cols-2">
            <div>
                <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                <input type="text" wire:model="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
                @error('name') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>

            <div>
                <label for="code" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Code</label>
                <input type="text" wire:model="code" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
                @error('code') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>

            <div>
                <label for="price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Price</label>
                <input type="number" wire:model="price" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
                @error('price') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>

            <div>
                <label for="quantity" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Quantity</label>
                <input type="number" wire:model="quantity" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"  required />
                @error('quantity') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>
        </div>

        <div class="mb-6">
            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="file_input">Upload Image</label>
            <input wire:model="image_path" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" type="file">
            @error('image_path') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>

        <div class="mb-6">
            <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
            <textarea wire:model="description" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" ></textarea>
            @error('description') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>

        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
    </form>
</div>
