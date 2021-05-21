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
    public $search;
    public $page=1;
    protected $queryString = ['search'=>['except'=>''], 'page'=>['except'=>1]];
    public $modal_title;
    public $modal_btn_title;
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
    
    protected $rules = [
        
    ];

    public function mount()
    {
        $this->search='';
        $this->modal_title = 'Add new record';
        $this->modal_btn_title = 'Create Record';
        $this->modal_btn = 'btn-primary';
        $this->action='add';
    }
    public function loadModal($val, $id)
    {
        $this->resetValidation();
        $this->loadForm($id);
        switch($val)
        {
            case 'add':                
                $this->modal_btn_title = 'Add new record';
                $this->modal_title = 'Create Record';
                $this->action='add';
                $this->modal_btn = 'btn-primary';
                break;
            case 'edit':
                $this->action='edit';
                // Modal
                $this->modal_btn_title = 'Update';
                $this->modal_title = 'Update Record';
                $this->modal_btn = 'btn-primary';
                break;
            case 'delete':
                $this->action='delete';
                // Modal
                $this->modal_btn_title = 'Delete';
                $this->modal_title = 'Delete Record';
                $this->modal_btn = 'btn-danger';
                break;
        }
        $this->dispatchBrowserEvent('modal', ['modal'=>'formModal', 'action'=>'show']);
    }

    public function loadForm($id)
    {
        $res = Boat::find($id);
        $this->row_id = isset($res->id) ? $res->id : '';
        
    }

    public function recordAction()
    {
        if($this->action=='delete')
        {
            Boat::destroy($this->row_id);
            $this->dispatchBrowserEvent('alert', ['type' => 'success',  'message' => 'Record Deleted']);
        }else{
            $this->validate();
            $record = Boat::where('id', $this->row_id)->first();
            $fields = [
                
            ];
            if($record !== null){
                // Update
                $record->update($fields);
                $this->dispatchBrowserEvent('alert', ['type' => 'success',  'message' => 'Record Updated']);
            }else{
                // Insert
                Boat::create($fields);
                $this->dispatchBrowserEvent('alert', ['type' => 'success',  'message' => 'Record Created']);
            }
        }
        
        $this->dispatchBrowserEvent('modal', ['modal'=>'formModal', 'action'=>'hide']);
    }

    public function render()
    {
        if($this->search > '')
        {
           // $this->page=1;
            $data = Boat::where('name', 'like', '%'.$this->search.'%')->orderBy('name', 'asc')->paginate($this->page_size);
        }else{
            $data = Boat::orderBy('name', 'asc')->paginate($this->page_size);
        }
        
        return view('livewire.admin.boats', compact('data'));
    }
}
