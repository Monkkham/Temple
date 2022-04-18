<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\laryhub1;
use App\Models\laryjaiy1;

class Dashboard extends Component
{
    public function render()
    {
        $laryjaiy = laryjaiy1::orderBy('id','desc')->get();
        $laryhub = laryhub1::orderBy('id','desc')->get();
        return view('livewire.dashboard',compact('laryjaiy','laryhub'))->layout('livewire.layouts.style');
    }
}
