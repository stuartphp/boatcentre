<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\BoatImage;
use App\Models\Boat;

class BoatImages extends Component
{
    use WithFileUploads;
    public $count;
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

        $x=$this->count;
        foreach ($this->photos as $photo) {
            $x++;
            if($x<13)
            {
                $photo->store('/boats', ['disk'=>'public']);
                $rec = [
                    'boat_id'=>$this->boat_id,
                    'image'=>$photo->hashName(),
                    'sort_order'=>$x,
                ];

                BoatImage::create($rec);
                $this->dispatchBrowserEvent('alert', ['type' => 'success',  'message' => 'Image Uploaded']);
            }else{
                $this->dispatchBrowserEvent('alert', ['type' => 'danger',  'message' => 'Upload Limit Reached']);
            }

        }
    }
    public function render()
    {
        $this->images = BoatImage::where('boat_id', $this->boat_id)->orderBy('sort_order')->get();
        $this->count = $this->images->count();
        return view('livewire.admin.boat-images', ['images'=>$this->images]);
    }

    public function deleteImage($id)
    {
        $rec = BoatImage::findOrFail($id);
        unlink(public_path().'/images/boats/'.$rec->image);
        $rec->delete();
        $this->dispatchBrowserEvent('alert', ['type' => 'success',  'message' => 'Image Deleted']);
    }

    public function updateOrder($list)
    {
        foreach($list as $item) {
            BoatImage::find($item['value'])->update(['sort_order' => $item['order']]);
            $this->dispatchBrowserEvent('alert', ['type' => 'success',  'message' => 'Image order Updated']);
        }
    }
}
