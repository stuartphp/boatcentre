<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\BoatManufacturer;
use App\Models\BoatManufacturerModel;

class BoatsCrud extends Component
{
    // Collections
    public $manufacturers;
    public $models;
    // Model
    public $row_id;
    public $reference;
    public $company_id;
    public $vin_number;
    public $name;
    public $keywords;
    public $category_id;
    public $cof;
    public $brand;
    public $model;
    public $manufacturer;
    public $year_of_manufacture;
    public $main_color;
    public $new_used;
    public $condition;
    public $province;
    public $city;
    public $short_description;
    public $description;
    public $currency;
    public $retail_price;
    public $is_feature;
    public $special_price;
    public $special_start;
    public $special_end;
    public $viewed;
    public $weight;
    public $loa;
    public $beam;
    public $draft;
    public $crew;
    public $passengers;
    public $fuel_type;
    public $fuel_tank;
    public $max_speed;
    public $hull_construction;
    public $youtube_link;
    public $fb_link;
    public $is_sold;
    public $is_approved;
    public $is_active;

    public function mount()
    {
        $this->manufacturers=BoatManufacturer::orderBy('name', 'desc')->pluck('name', 'id')->toArray();
        $this->models = collect();
        $this->description='';
    }

    public function updatedManufacturer($val)
    {
        $this->models = BoatManufacturerModel::where('boat_manufacturer_id', $val)->pluck('model', 'id')->toArray();
    }

    public function updatedModel($val)
    {
        $rec = BoatManufacturerModel::find($val);
        $this->description = $rec->specifications;
    }


    public function render()
    {
        return view('livewire.admin.boats-crud');
    }
}
