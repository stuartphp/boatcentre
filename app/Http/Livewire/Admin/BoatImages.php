<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\BoatImage;

class BoatImages extends Component
{
    use WithFileUploads;
    public $boat_id;
    public $images;
    public $photos = [];

    public function mount($id)
    {
        $this->boat_id = $id;
    }

    public function save()
    {
        $this->validate([
            'photos.*' => 'image|max:1024', // 1MB Max
        ]);

        foreach ($this->photos as $photo) {
            $photo->store('boats');
            //$photo->storeAs('boats', $this->boat_id, 'boats');
        }
    }
    public function render()
    {
        $this->images = BoatImage::where('boat_id', $this->boat_id)->orderBy('sort_order')->get();
        return view('livewire.admin.boat-images', ['images'=>$this->images]);
    }
}
