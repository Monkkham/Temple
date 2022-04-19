<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\laryhub1;
use App\Models\laryjaiy1;
use DB;
class Dashboard extends Component
{
    public function render()
    {
        $count = DB::table('laryjaiy')->count();
        $count2 = DB::table('laryhub')->count();
        $count3 = DB::table('users')->count();
        $laryjaiy = laryjaiy1::orderBy('id','desc')->get();
        $laryhub = laryhub1::orderBy('id','desc')->get();
        $tatol_jaiy = DB::table("laryjaiy")->sum('qty_price');
        ($tatol_jaiy);
        $tatol_hub = DB::table("laryhub")->sum('qty_price');
        ($tatol_hub);
        return view('livewire.dashboard',compact('laryjaiy','laryhub','count','count2','count3','tatol_jaiy','tatol_hub'))->layout('livewire.layouts.style');
    }
}
