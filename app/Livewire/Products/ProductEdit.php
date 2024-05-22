<?php

namespace App\Livewire\Products;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithFileUploads;

class ProductEdit extends Component
{
    use WithFileUploads;

    public $productId;
    public $name, $code, $description, $price, $quantity, $image_path;

    protected $rules = [
        'name' => 'required|string|max:255',
        'code' => 'required|string|max:255',
        'description' => 'nullable|string',
        'price' => 'required|numeric',
        'quantity' => 'required|integer',
        'image_path' => 'nullable|image|max:1024', // 1MB Max
    ];

    public function mount($id)
    {
        $product = Product::findOrFail($id);

        $this->productId = $product->id;
        $this->name = $product->name;
        $this->code = $product->code;
        $this->description = $product->description;
        $this->price = $product->price;
        $this->quantity = $product->quantity;
        $this->image_path = $product->image_path;
    }

    public function update()
    {
        $this->validate();

        $product = Product::find($this->productId);

        $imagePath = $this->image_path ? $this->image_path->store('images', 'public') : $product->image_path;

        $product->update([
            'name' => $this->name,
            'code' => $this->code,
            'description' => $this->description,
            'price' => $this->price,
            'quantity' => $this->quantity,
            'image_path' => $imagePath,
        ]);

        session()->flash('message', 'Product Updated Successfully.');
        return redirect()->route('products.index');
    }
    public function render()
    {
        return view('livewire.products.product-edit')->layout('layouts.app');
    }
}
