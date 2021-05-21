<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\[MODEL];

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
    
    protected $rules = [
        
    ];

    public function mount()
    {
        $this->search='';
        $this->modal_title = 'Add new record';
        $this->modal_btn_title = 'Save';
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
                $this->modal_title = 'Save';
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

    public function loadForm($id)
    {
        $res = [MODEL]::find($id);
        $this->row_id = isset($res->id) ? $res->id : '';
        
    }

    public function recordAction()
    {
        if($this->action=='delete')
        {
            [MODEL]::destroy($this->row_id);
            $this->dispatchBrowserEvent('alert', ['type' => 'success',  'message' => 'Record Deleted']);
        }else{
            $this->validate();
            $record = [MODEL]::where('id', $this->row_id)->first();
            if($record !== null){
                // Update
                $record->update(
                    [
                        
                    ]
                );
                $this->dispatchBrowserEvent('alert', ['type' => 'success',  'message' => 'Record Updated']);
            }else{
                // Insert
                [MODEL]::create([
                    
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
            $data = [MODEL]::where('name', 'like', '%'.$this->search.'%')->orderBy('parent_id', 'asc')->orderBy('name', 'asc')->paginate($this->page_size);
        }else{
            $data = [MODEL]::orderBy('parent_id', 'asc')->orderBy('name', 'asc')->paginate($this->page_size);
        }
        
        $cats = $this->category();
        return view('livewire.admin.boat-categories', compact('data', 'cats'));
    }

    public function category()
    {
        return [MODEL]::where('parent_id', 0)->pluck('name', 'id')->toArray();
    }
}
