<?php

namespace App\Http\Livewire;

use App\Models\Category;
use Livewire\Component;

class FilterAside extends Component
{
    public $thc;
    public $cbd;
    public $categories;
    public $categoryIdSelected;

    public function mount() {
        $this->categories = Category::get();
    }

    public function updatedCategoryIdSelected($categoryIdSelected)
    {
        $this->emit('filterAsideCategory' , $categoryIdSelected);
    }

    public function updatedThc($thc)
    {
        $this->emit('filterAsideTHC' , $thc);
    }

    public function updatedCbd($cbd)
    {
        $this->emit('filterAsideCBD' , $cbd);
    }

    public function render()
    {
        return view('front.livewire.filter-aside');
    }
}
