<?php

namespace App\Http\Livewire\Site;

use Livewire\Component;
use App\Models\Boat;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;

class Showroom extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $manufacturer;
    public $category;
    public $manufacturers;
    public $categories;

    public function mount()
    {
        $this->manufacturers=$this->getManufacturers();
        $this->categories=$this->getCategory();
    }

    public function getManufacturers()
    {
        return DB::table('boat_manufacturers')->orderBy('name', 'asc')->pluck('name', 'id')->toArray();
    }

    public function getCategory()
    {
        return DB::table('boat_categories')->orderBy('parent_id', 'asc')->orderBy('name', 'asc')->get();
    }

    public function render()
    {
        $manufacturers = $this->getManufacturers();
        $categories = $this->getCategory();
        $boats = Boat::with('images')->paginate(9);
        //dd($boats);
        return view('livewire.site.showroom', compact('boats', 'manufacturers', 'categories'));
    }
}
