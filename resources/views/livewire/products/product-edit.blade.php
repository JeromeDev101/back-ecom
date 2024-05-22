<div class="container mx-auto p-4">
    <form wire:submit.prevent="update" class="mb-4">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
            <div>
                <input type="text" wire:model="name" placeholder="Name" class="w-full p-2 border rounded">
                @error('name') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>
            <div>
                <input type="text" wire:model="code" placeholder="Code" class="w-full p-2 border rounded">
                @error('code') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>
            <div>
                <textarea wire:model="description" placeholder="Description" class="w-full p-2 border rounded"></textarea>
                @error('description') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>
            <div>
                <input type="number" wire:model="price" placeholder="Price" class="w-full p-2 border rounded">
                @error('price') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>
            <div>
                <input type="number" wire:model="quantity" placeholder="Quantity" class="w-full p-2 border rounded">
                @error('quantity') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>
            <div>
                <input type="file" wire:model="image_path" class="w-full p-2 border rounded">
                @error('image_path') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>
        </div>
        <div class="mt-4">
            <button type="submit" class="bg-green-500 text-white p-2 rounded">Update</button>
        </div>
    </form>
</div>
