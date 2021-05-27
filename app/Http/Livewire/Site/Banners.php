<?php

namespace App\Http\Livewire\Site;

use Livewire\Component;
use App\Models\WebsiteBanner;

class Banners extends Component
{

    public function render()
    {
        $banners = WebsiteBanner::where('is_active', 1)->get();

        return view('livewire.site.banners', ['banners'=>$banners]);
    }
}
