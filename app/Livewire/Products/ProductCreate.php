<?php

namespace App\Livewire\Products;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithFileUploads;

class ProductCreate extends Component
{
    use WithFileUploads;

    public $name, $code, $description, $price, $quantity, $image_path;

    protected $rules = [
        'name' => 'required|string|max:255',
        'code' => 'required|string|max:255',
        'description' => 'nullable|string',
        'price' => 'required|numeric',
        'quantity' => 'required|integer',
        'image_path' => 'nullable|image|max:1024', // 1MB Max
    ];

    public function store()
    {
        $this->validate();

        $imagePath = $this->image_path ? $this->image_path->store('images', 'public') : null;

        Product::create([
            'name' => $this->name,
            'code' => $this->code,
            'description' => $this->description,
            'price' => $this->price,
            'quantity' => $this->quantity,
            'image_path' => $imagePath,
        ]);

        session()->flash('message', 'Product Created Successfully.');
        return redirect()->route('products.index');
    }
    public function render()
    {
        return view('livewire.products.product-create')->layout('layouts.app');
    }
}
