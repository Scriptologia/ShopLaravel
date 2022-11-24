<?php

namespace App\Http\Livewire;

use Livewire\Component;

class SearchProducts extends Component
{
    public $search;

    public function searchProducts()
    {
        $this->emit('searchProducts' , $this->search);
//        $this->reset('categoryIdSelected');
    }

    public function render()
    {
        return view('front.livewire.search-products');
    }
}
