<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class FilteredProducts extends Component
{
    use WithPagination;

    protected $listeners = ['filter',
        'filterAsideCategory',
        'searchProducts',
        'filterAsideTHC',
        'filterAsideCBD'
        ];

    public $filter = 'default';
    public $thc;
    public $cbd;
    public $categoryIdSelected;
    public $searchProducts;
//    public $products;
    public function paginationView()
    {
        return 'front.partials.paginator';
    }

    public function mount() {
//        $this->products = Product::paginate(9);
    }

    public function filter($selected)
    {
        $this->filter = $selected;
    }

    public function filterAsideCategory($categoryIdSelected)
    {
        $this->categoryIdSelected = $categoryIdSelected;
    }

    public function filterAsideTHC($thc)
    {
        $this->thc =  json_decode($thc, true);
    }

    public function filterAsideCBD($cbd)
    {
        $this->cbd = json_decode($cbd, true);
    }

    public function searchProducts($searchProducts)
    {
        $this->searchProducts = $searchProducts;
    }

    public function render()
    {
        $filter = $this->filter;
        $products = Product::select('*');
            if($this->categoryIdSelected) $products = $products->where('category_id', $this->categoryIdSelected);
            if($this->thc) $products = $products->whereBetween('thc', $this->thc);
            if($this->cbd) $products = $products->whereBetween('cbd', $this->cbd);
            if($this->searchProducts) {$products = $products->search($this->searchProducts);}
        if($filter === 'default') $products = $products->paginate(9);
        if($filter === 'lowest') $products = $products->orderBy('price')->paginate(9);
        if($filter === 'highest') $products = $products->orderByDesc('price')->paginate(9);
        if($filter === 'popular') $products = $products->orderBy('name')->paginate(9);
        return view('front.livewire.filtered-products', ['products' => $products]);
    }
}
