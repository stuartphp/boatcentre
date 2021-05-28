<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dealer;
use App\Models\User;
use App\Models\Counter;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller// implements Authenticatable
{
    public function dealer(Request $request)
    {
        $validated = $request->validate([
            'trading_name'=>'required',
            'physical_address'=>'required',
            'mobile'=>'required']
        );

        $acc = Counter::where('name', 'dealers')->first();
        $account_number = $acc->prefix.$acc->number;
        $acc->number++;
        $acc->save();

        $id = Dealer::create([
            'account_number'=>$account_number,
            'registered_name'=>request('registered_name'),
            'trading_name'=>request('trading_name'),
            'vat_number'=>request('vat_number'),
            'physical_address'=>request('physical_address'),
            'contact_person'=>request('contact_person'),
            'mobile'=>request('mobile'),
            'office_number'=>request('office_number'),
            'website'=>request('website'),
            'email'=>request('email'),
            'is_active'=>0,
        ]);
        $user = User::findOrFail(auth()->user()->id);
        $user->dealer_id=$id->id;
        $user->save();
        Auth::loginUsingId(auth()->user()->id);
        return redirect('admin/home');

    }
}
