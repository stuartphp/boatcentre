<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\BoatImage;
use App\Models\Boat;

class BoatImages extends Component
{
    use WithFileUploads;
    public $boat_id;
    public $images;
    public $boat;
    public $photos = [];

    public function mount($id)
    {
        $this->boat_id = $id;
        $this->boat = Boat::findOrFail($this->boat_id);
    }

    public function save()
    {
        $this->validate([
            'photos.*' => 'image|max:1024', // 1MB Max
        ]);
        $x=1;
        foreach ($this->photos as $photo) {
            $photo->store('/boats', ['disk'=>'public']);
            $rec = [
                'boat_id'=>$this->boat_id,
                'image'=>$photo->hashName(),
                'sort_order'=>$x,
            ];
            $x++;
            BoatImage::create($rec);
            $this->dispatchBrowserEvent('alert', ['type' => 'success',  'message' => 'Image Uploaded']);
        }
    }
    public function render()
    {

        $this->images = BoatImage::where('boat_id', $this->boat_id)->orderBy('sort_order')->get();
        return view('livewire.admin.boat-images', ['images'=>$this->images]);
    }
}
