<?php

namespace App\Livewire\Products;

use App\Models\Product;
use Livewire\Component;
use Livewire\Attributes\Lazy;

#[Lazy()]
class ProductView extends Component
{
    public function render()
    {
        return view('livewire.products.product-view');
    }
}
