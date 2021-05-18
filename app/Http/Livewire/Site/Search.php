<?php

namespace App\Http\Livewire\Site;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

class Search extends Component
{
    public $catagories;

    public function mount()
    {
        $this->catagories = $this->getCategories();
        //dd($this->catagories);
    }

    public function getCategories()
    {
        $html = '';
        $cat = DB::table('boat_categories')->orderBy('parent_id', 'asc')->orderBy('name')->get();
        
        foreach($cat as $k)
        {
            if($k->parent_id==0)
            {
                $html .= '<optgroup label="'.$k->name.'">';
                foreach($cat as $sub)
                {
                    if($sub->parent_id == $k->id)
                    {
                        $html .='<option value="'.$sub->id.'">'.$sub->name.'</option>';
                    }
                }
                $html .= '</optgroup>';
            }
        }
        return $html;
    }
    public function render()
    {
        return view('livewire.site.search', ['categories'=>$this->catagories]);
    }
}
