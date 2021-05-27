<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\User;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Hash;

class Users extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $page_size=12;

    public $dealer_id;
    public $profile;

    public $model =[
        'id', 'name', 'password', 'email'
    ];
    public $modal=[
        'id', 'action', 'title', 'btn_title'
    ];

    public function mount()
    {
        $this->dealer_id = auth()->user()->dealer_id;
        $this->profile = auth()->user()->profile;
        $this->modal = [
            'id'=>'', 'action'=>'add', 'title'=>'Create new User', 'btn_title'=>'Save'
        ];
        $this->model = [ 'id'=>0];
    }

    public function modalAction($action, $id)
    {

        switch($action)
        {
            case 'add':
                $this->modal = [
                    'action'=>'store', 'title'=>'Create new User', 'btn_title'=>'Create'
                ];
                $this->model = [ 'id'=>0];

                $this->dispatchBrowserEvent('modal', ['modal'=>'formModal', 'action'=>'show']);
                break;
            case 'edit':
                $this->modal = [
                    'id'=>'', 'action'=>'update', 'title'=>'Update User', 'btn_title'=>'Update'
                ];
                $this->loadModel($id);
                $this->dispatchBrowserEvent('modal', ['modal'=>'formModal', 'action'=>'show']);
                break;
            case 'store':
                $data = $this->model;
                dd($data);
                break;
            case 'update':

                break;
            case 'destroy':

                break;
        }
        $this->resetValidation();
    }

    public function loadModel($id)
    {
        $rec = User::find($id);
        $this->model = [
            'id'=>$id,
            'name' => isset($rec->name) ? $rec->name : '',
            'email' => isset($rec->email) ? $rec->email : ''
        ];
    }

    public function setPassword($val)
    {
        return Hash::make($val);
    }

    public function render()
    {
        $data = User::where('dealer_id', $this->dealer_id)->paginate($this->page_size);
        return view('livewire.admin.users', compact('data'));
    }
}
