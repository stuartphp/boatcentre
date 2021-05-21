<?php

namespace App\Http\Livewire\Admin\Dealers;

use Livewire\Component;
use App\Models\Dealer;

class Info extends Component
{
    public $dealer_id;

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
