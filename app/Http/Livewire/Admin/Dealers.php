<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Dealer;

class Dealers extends Component
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
    public $account_number;
    public $registered_name;
    public $trading_name;
    public $vat_number;
    public $physical_address;
    public $contact_person;
    public $mobile;
    public $office_number;
    public $website;
    public $email;
    public $logo;
    public $is_active;
    
    protected $rules = [
        'registered_name'=>'required',
        'trading_name'=>'string',
        'vat_number'=>'numeric',
        'physical_address'=>'required',
        'contact_person'=>'required',
        'mobile'=>'required',
        'email'=>'required|email'
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
        $res = Dealer::find($id);
        $this->row_id = isset($res->id) ? $res->id : '';
        $this->account_number = isset($res->account_number) ? $res->account_number : '' ;
        $this->registered_name = isset($res->registered_name) ? $res->registered_name : '' ;
        $this->trading_name = isset($res->trading_name) ? $res->trading_name : '' ;
        $this->vat_number = isset($res->vat) ? $res->vat : '' ;
        $this->physical_address = isset($res->physical_address) ? $res->physical_address : '' ;
        $this->contact_person = isset($res->contact_person) ? $res->contact_person : '' ;
        $this->mobile = isset($res->mobile) ? $res->mobile : '' ;
        $this->office_number = isset($res->office_number) ? $res->office_number : '' ;
        $this->website = isset($res->website) ? $res->website : '' ;
        $this->email = isset($res->email) ? $res->email : '' ;
        $this->logo = isset($res->logo) ? $res->logo : '' ;
        $this->is_active = isset($res->is_active) ? $res->is_active : '' ;
    }

    public function recordAction()
    {
        if($this->action=='delete')
        {
            Dealer::destroy($this->row_id);
            $this->dispatchBrowserEvent('alert', ['type' => 'success',  'message' => 'Record Deleted']);
        }else{
            $this->validate();
            $record = Dealer::where('id', $this->row_id)->first();
            $fields = [
                'account_number'=>$this->account_number,
                'registered_name'=>$this->registered_name,
                'trading_name'=>$this->trading_name,
                'vat_number'=>$this->vat_number,
                'physical_address'=>$this->physical_address,
                'contact_person'=>$this->contact_person,
                'mobile'=>$this->mobile,
                'office_number'=>$this->office_number,
                'website'=>$this->website,
                'email'=>$this->email,
                'logo'=>$this->logo,
                'is_active'=>$this->is_active,
            ];
            if($record !== null){
                // Update
                $record->update(
                    $fields
                );
                $this->dispatchBrowserEvent('alert', ['type' => 'success',  'message' => 'Record Updated']);
            }else{
                // Insert
                Dealer::create($fields);
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
            $data = Dealer::where('registered_name', 'like', '%'.$this->search.'%')->orderBy('registered_name', 'asc')->paginate($this->page_size);
        }else{
            $data = Dealer::orderBy('registered_name', 'asc')->paginate($this->page_size);
        }
        
        return view('livewire.admin.dealers', compact('data'));
    }
}
