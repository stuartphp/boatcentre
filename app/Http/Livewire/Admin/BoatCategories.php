<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\BoatCategory;

class BoatCategories extends Component
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
    public $parent_id;
    public $is_active;
    protected $rules = [
        'name' => 'required',
        'is_active' => 'required'
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
        $res = BoatCategory::find($id);
        $this->row_id = isset($res->id) ? $res->id : '';
        $this->name = isset($res->name) ? $res->name : '';
        $this->parent_id = isset($res->parent_id) ? $res->parent_id : '';
        $this->is_active = isset($res->is_active) ? $res->is_active : '';
    }

    public function recordAction()
    {
        if($this->action=='delete')
        {
            BoatCategory::destroy($this->row_id);
            $this->dispatchBrowserEvent('alert', ['type' => 'success',  'message' => 'Record Deleted']);
        }else{
            $this->validate();
            $record = BoatCategory::where('id', $this->row_id)->first();
            $fields = [
                        'name'=>$this->name,
                        'parent_id'=> $this->parent_id,
                        'is_active'=>$this->is_active
            ];
            if($record !== null){
                // Update
                $record->update($fields);
                $this->dispatchBrowserEvent('alert', ['type' => 'success',  'message' => 'Record Updated']);
            }else{
                // Insert
                BoatCategory::create($fields);
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
            $data = BoatCategory::where('name', 'like', '%'.$this->search.'%')
            ->orderBy('parent_id', 'asc')->orderBy('name', 'asc')->paginate($this->page_size);
        }else{
            $data = BoatCategory::orderBy('parent_id', 'asc')->orderBy('name', 'asc')->paginate($this->page_size);
        }

        $cats = $this->category();
        return view('livewire.admin.boat-categories', compact('data', 'cats'));
    }

    public function category()
    {
        return BoatCategory::where('parent_id', 0)->pluck('name', 'id')->toArray();
    }
}
