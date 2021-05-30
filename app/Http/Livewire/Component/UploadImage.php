<?php

namespace App\Http\Livewire\Component;

use Livewire\Component;
use Livewire\WithFileUploads;

class UploadImage extends Component
{
    use WithFileUploads;

    public $photo;

    public function mount()
    {

    }

    public function updatedPhoto()
    {
        $this->validate([
            'photo' => 'image|max:1024',
        ]);
        $this->photo->store('/stock', ['disk'=>'public']);
        $this->dispatchBrowserEvent('image', $this->photo->hashName());
    }

    public function render()
    {
        return view('livewire.component.upload-image');
    }
}
