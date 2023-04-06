<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ProductSearch extends Component
{
    public $query;

    public function render()
    {
        return view('livewire.product-search');
    }

    public function search()
    {
        $this->emit('reloadProducts', $this->query);
    }
}
