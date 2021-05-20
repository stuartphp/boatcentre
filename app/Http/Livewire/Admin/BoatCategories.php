<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\BoatCategory;

class BoatCategories extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    // Standard
    public $page_size=12;
    public $action;
    public $modal_title;
    public $modal_btn;
    // Model
    public $name;
    public $parent_id;

    public function mount()
    {
        $this->modal_title = 'Add new record';
        $this->modal_btn = 'Save';
        $this->action='add';
    }

    public function render()
    {
        $data = BoatCategory::orderBy('parent_id', 'asc')->orderBy('name', 'desc')->paginate($this->page_size);
        return view('livewire.admin.boat-categories', compact('data'));
    }
}
