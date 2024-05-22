<?php

namespace App\Livewire\Products;

use App\Models\Product;
use Livewire\Component;

class ProductView extends Component
{
    public function render()
    {
        return view('livewire.products.product-view')->layout('layouts.app');
    }
}
