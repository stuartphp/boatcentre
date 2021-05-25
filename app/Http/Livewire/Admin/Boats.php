<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Boat;
use Illuminate\Support\Facades\DB;

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
            //$data = Boat::orderBy('name', 'asc')->paginate($this->page_size);
            $data = DB::table('boats')
                ->join('boat_manufacturers', 'boat_manufacturers.id', '=', 'boats.boat_manufacturer_id')
                ->join('boat_manufacturer_models', 'boat_manufacturer_models.id', '=', 'boats.boat_manufacturer_model_id')
                ->join('provinces', 'provinces.id', '=', 'boats.province_id')
                ->join('sa_postal_codes', 'sa_postal_codes.id', '=', 'boats.city_id')
                ->select('boats.*',
                'boat_manufacturers.name as manufacturere_name',
                'boat_manufacturer_models.model as model_name',
                'provinces.name as province',
                'sa_postal_codes.city as city',
                )
                ->paginate($this->page_size);
        }

        return view('livewire.admin.boats', compact('data'));
    }
}
