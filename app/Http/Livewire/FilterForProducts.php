<?php

namespace App\Http\Livewire;

use Livewire\Component;

class FilterForProducts extends Component
{

    public $selected;

    public function mount()
    {
//        $this->selected = 'default';
    }

//    public function selected($selected)
//    {
//        $this->selected = $selected;
//        $this->emitUp('filter' ,$selected);
//        $this->reset('selected');
//    }

    public function updatedSelected($selected)
    {
        $this->selected = 'lowest-price';
        $this->emitUp('filter' ,$selected);
        $this->reset('selected');
    }

    public function render()
    {
        return view('front.livewire.filter-for-products');
    }
}
