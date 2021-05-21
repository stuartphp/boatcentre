<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Counter;

class Counters extends Component
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
    public $prefix;
    public $number;
    
    protected $rules = [
        'name',
        'prefix',
        'number'
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
        $res = Counter::find($id);
        $this->row_id = isset($res->id) ? $res->id : '';
        $this->name = isset($res->name) ? $res->name : '';
        $this->prefix = isset($res->prefix) ? $res->prefix : '';
        $this->number = isset($res->number) ? $res->number : '';
        
    }

    public function recordAction()
    {
        if($this->action=='delete')
        {
            Counter::destroy($this->row_id);
            $this->dispatchBrowserEvent('alert', ['type' => 'success',  'message' => 'Record Deleted']);
        }else{
            $this->validate();
            $record = Counter::where('id', $this->row_id)->first();
            if($record !== null){
                // Update
                $record->update(
                    [
                        'name'=>$this->name,
                        'prefix'=>$this->prefix,
                        'number'=>$this->number
                    ]
                );
                $this->dispatchBrowserEvent('alert', ['type' => 'success',  'message' => 'Record Updated']);
            }else{
                // Insert
                Counter::create([
                    'name'=>$this->name,
                    'prefix'=>$this->prefix,
                    'number'=>$this->number
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
            $data = Counter::where('name', 'like', '%'.$this->search.'%')->orderBy('name', 'asc')->paginate($this->page_size);
        }else{
            $data = Counter::orderBy('name', 'asc')->paginate($this->page_size);
        }
        
        return view('livewire.admin.counters', compact('data'));
    }
}
