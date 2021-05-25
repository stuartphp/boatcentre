<?php

namespace App\Http\Livewire\Admin\Dealers;

use Livewire\Component;
use App\Models\Dealer;
use Livewire\WithFileUploads;

class Info extends Component
{
    use WithFileUploads;

    public $dealer_id;
    public $photo;

    public function mount($id)
    {
        $this->dealer_id = $id;
    }

    public function render()
    {
        $data = Dealer::find($this->dealer_id);
        return view('livewire.admin.dealers.info', compact('data'));
    }
}
