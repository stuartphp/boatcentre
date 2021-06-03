<?php

namespace App\Http\Livewire\Site;

use Livewire\Component;

class Currency extends Component
{
    public $currency;


    public function mount()
    {
        if(!session()->get('currency'))
        {
            $this->currency = 'ZAR';
            session()->put('currency', 'ZAR');
            session()->put('cur_symbol', 'R');
            session()->put('cur_ratio', 1);
        }else{
            $this->currency = session()->get('currency');
        }
    }

    public function updatedCurrency()
    {
        session()->put('currency', $this->currency);
        switch($this->currency)
        {
            case 'ZAR':
                session()->put('cur_symbol', 'R');
                session()->put('cur_ratio', 1);
                break;
            case 'USD':
                session()->put('cur_symbol', '$');
                session()->put('cur_ratio', 14.5);
                break;
        }

    }
    public function render()
    {
        return view('livewire.site.currency');
    }
}
