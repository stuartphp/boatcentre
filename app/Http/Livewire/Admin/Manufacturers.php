<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\BoatManufacturer;
use App\Models\BoatManufacturerModel;

class Manufacturers extends Component
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
    public $name;
    // Model for ManufacturerModel
    public $model_row_id;
    public $model_model;
    public $model_boat_manufacturer_id;
    public $model_specifications;
    public $manufacturer;
    public $model_action;

    protected $rules = [
        'name' => 'required'
    ];

    public function mount()
    {
        $this->search='';
        $this->manufacturer='';
        $this->model_model='';
        $this->model_action='';
        $this->model_row_id='';
        $this->model_specifications='';
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
                break;
            case 'edit':
                $this->action='edit';
                // Modal
                $this->modal_btn_title = 'Update';
                $this->modal_title = 'Update Record';
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

    /** Load Manufacturer Models */
    public function loadModel($val, $man_id, $mod_id)
    {
        $this->model_row_id=$mod_id;
        $this->model_boat_manufacturer_id = $man_id;
        switch($val)
        {
            case 'add':
                /** save the model */
                BoatManufacturerModel::create([
                    'boat_manufacturer_id'=>$man_id,
                    'model'=>$this->model_model,
                    'specifications'=>$this->model_specifications]);
                $this->dispatchBrowserEvent('alert', ['type' => 'success',  'message' => 'Record Created']);
                $this->showModelModal('hide');
                break;
            case 'create':
                /** Show clear form */
                $man = $this->getManufacturer($man_id);
                $this->model_model = 'Create a Model';
                $this->manufacturer = $man->name;
                $this->model_row_id=0;
                $this->model_action='add';
                $this->showModelModal('show');
                break;
            case 'update':
                /** Get model detail */
                $man = $this->getManufacturer($man_id);
                $mod = $this->getModel($mod_id);
                $this->model_model = $mod->model;
                $this->model_specifications = $mod->specifications;
                $this->manufacturer = $man->name;
                $this->model_action='save';
                $this->showModelModal('show');
                break;
            case 'save':
                /** Save update */
                $rec = BoatManufacturerModel::where('id', $mod_id)->first();
                //dd($this->model_specifications);
                $rec->update([
                    'boat_manufacturer_id'=>$man_id,
                    'model'=>$this->model_model,
                    'specifications'=>$this->model_specifications
                ]);
                $this->dispatchBrowserEvent('alert', ['type' => 'success',  'message' => 'Record Updated']);
                $this->showModelModal('hide');
                break;
            case 'destroy':
                /** Delete Model */
                BoatManufacturerModel::destroy($mod_id);
                $this->dispatchBrowserEvent('alert', ['type' => 'success',  'message' => 'Record Deleted']);
                $this->showModelModal('hide');
                break;
        }
    }

    /** Get Manufacturer */
    public function getManufacturer($id)
    {
        return BoatManufacturer::find($id);
    }
    /** Get Model */
    public function getModel($id)
    {
        return BoatManufacturerModel::find($id);
    }

    public function showModelModal($action)
    {
        $this->dispatchBrowserEvent('modal', ['modal'=>'formModel', 'action'=>$action]);
    }

    public function loadForm($id)
    {
        $res = BoatManufacturer::with(['models'])->find($id);
        $this->row_id = isset($res->id) ? $res->id : '';
        $this->name = isset($res->name) ? $res->name : '';

    }

    public function recordAction()
    {
        if($this->action=='delete')
        {
            BoatManufacturer::destroy($this->row_id);
            $this->dispatchBrowserEvent('alert', ['type' => 'success',  'message' => 'Record Deleted']);
        }else{
            $this->validate();
            $record = BoatManufacturer::where('id', $this->row_id)->first();
            if($record !== null){
                // Update
                $record->update(
                    [
                        'name' => $this->name
                    ]
                );
                $this->dispatchBrowserEvent('alert', ['type' => 'success',  'message' => 'Record Updated']);
            }else{
                // Insert
                BoatManufacturer::create([
                    'name' => $this->name
                ]);
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
            $data = BoatManufacturer::with('models')->where('name', 'like', '%'.$this->search.'%')->orderBy('name', 'asc')->paginate($this->page_size);
        }else{
            $data = BoatManufacturer::with('models')->orderBy('name', 'asc')->paginate($this->page_size);
        }
        //dd($data);
        return view('livewire.admin.manufacturers', compact('data'));
    }

}
