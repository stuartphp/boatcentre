<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\User;
use Livewire\WithPagination;
use Mail;

class Users extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $page_size=12;

    public $dealer_id;
    public $name;
    public $email;
    public $note;


    public function mount()
    {
        $this->dealer_id = auth()->user()->dealer_id;
    }

    public function sendInvation()
    {
        dd();
        //  Send mail to admin
        Mail::send('admin.invatation', array(
            'name' => $this->name,
            'email' => $this->email,
            'token' => md5(time()),
        ), function($message){
            $message->from(session()->get('email'));
            $message->to('stuart@itecassist.co.za', 'Admin')->subject('BoatCenter Colaborator Invitation');
        });
    }
    public function render()
    {
        $data = User::where('dealer_id', $this->dealer_id)->paginate($this->page_size);
        return view('livewire.admin.users', compact('data'));
    }
}
