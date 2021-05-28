<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Boat;
use App\Models\BoatAdditional as Additional;

class BoatAdditional extends Component
{
    public $boat_id;
    public $items;
    public $boat;
    public $name;
    public $value;


    public function mount($id)
    {
        $this->boat_id = $id;
        $this->boat = Boat::findOrFail($this->boat_id);
    }

    public function save()
    {
        $this->validate([
            'name'=>'required',
            'value'=>'required'
        ]);
        Additional::create(
            [
                'boat_id'=>$this->boat_id,
                'name'=>$this->name,
                'value'=>$this->value
            ]
        );
        $this->dispatchBrowserEvent('alert', ['type' => 'success',  'message' => 'Additional Added']);
    }

    public function deleteItem($id)
    {
        Additional::destroy($id);
        $this->dispatchBrowserEvent('alert', ['type' => 'success',  'message' => 'Item Deleted']);
    }

    public function render()
    {
        $this->items = Additional::where('boat_id', $this->boat_id)->orderBy('name')->get();
        return view('livewire.admin.boat-additional', ['items'=>$this->items]);
    }
}
