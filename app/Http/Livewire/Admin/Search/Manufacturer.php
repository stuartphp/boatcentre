<?php

namespace App\Http\Livewire\Admin\Search;

use Livewire\Component;
use App\Models\BoatManufacturer;
use App\Models\BoatManufacturerModel;

class Manufacturer extends Component
{
    public $manufacturers;
    public $manufacturer;
    public $models;
    public $model;

    public function mount()
    {
        $this->manufacturers = BoatManufacturer::orderBy('name')->get();
        $this->models = collect();
    }

    public function updateManufacturer($value)
    {
        $this->models = BoatManufacturerModel::where('boat_manufacturer_id', $value)->get();
        $this->model = $this->models->first()->id ?? null;
    }

    public function render()
    {
        return view('livewire.admin.search.manufacturer', ['manufacturers'=>$this->manufacturers]);
    }
}
