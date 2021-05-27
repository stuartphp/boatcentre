<?php

namespace App\Http\Livewire\Site;

use Livewire\Component;
use App\Models\Boat;
use Livewire\WithPagination;

class Showroom extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public function mount()
    {

    }

    public function render()
    {
        $boats = Boat::with('images')->paginate(9);
        //dd($boats);
        return view('livewire.site.showroom', compact('boats'));
    }
}
