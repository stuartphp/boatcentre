<?php

namespace App\Http\Livewire\Admin\Website;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\WebsiteBanner;

class Banners extends Component
{
    use WithPagination;

    public $page_size=12;
    public $modal_title;
    public $modal_btn;
    // Model
    public $row_id;
    public $image;
    public $slogan;
    public $title;
    public $link;
    public $is_active;


    protected $paginationTheme = 'bootstrap';

    public function mount()
    {
        $this->modal_title = 'Add new record';
        $this->modal_btn = 'Save';
    }

    public function loadModal($val, $id)
    {
        switch($val)
        {
            case 'add':
                $this->modal_btn = 'Add new record';
                $this->modal_title = 'Save';
                break;
            case 'edit':
                $res = WebsiteBanner::find($id);
                $this->row_id = $res->id;
                $this->image = $res->image;
                $this->slogan = $res->slogan;
                $this->title = $res->title;
                $this->link = $res->link;
                $this->is_active = $res->is_active;
                // Modal
                $this->modal_btn = 'Update';
                $this->modal_title = 'Update Record';
                break;
        }
        $this->dispatchBrowserEvent('modal', ['modal'=>'formModal', 'action'=>'show']);
    }

    public function recordAction()
    {
        dd($this->row_id);

        $this->dispatchBrowserEvent('modal', ['modal'=>'formModal', 'action'=>'hide']);
    }

    public function render()
    {
        $data = WebsiteBanner::where('is_active', 1)->paginate($this->page_size);
        return view('livewire.admin.website.banners', ['data'=>$data]);
    }
}
