<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Boat;

class Boats extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    // Standard
    public $page_size=12;
    public $action;
    public $modal_title;
    public $modal_btn;
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
        $this->modal_title = 'Add new record';
        $this->modal_btn = 'Save';
        $this->action='add';
    }
    
    public function render()
    {
        $data = Boat::orderBy('reference')->paginate($this->page_size);
        return view('livewire.admin.boats', compact('data'));
    }
}
