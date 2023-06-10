<?php

namespace App\Http\Livewire\Promotions;

use App\Models\control;
use Livewire\Component;
use App\Models\Promotions;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $perPage = 28;
    public $subCategory_id;

    public function render()
    {
        $promotions = Promotions::with('product')->paginate($this->perPage);
        $panierActif = control::first()->PanierActif;

        return view('livewire.promotions.index', [
            'promotions' => $promotions,
            'panierActif' => $panierActif,
        ]);
    }
}
