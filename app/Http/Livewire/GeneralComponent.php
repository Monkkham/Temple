<?php

namespace App\Http\Livewire;

use App\Models\general;
use Livewire\Component;
use Livewire\WithPagination;

class GeneralComponent extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $hiddenId, $name, $number, $date;
    public function render()
    {
        $general = general::orderBy('id','desc')->get();
        return view('livewire.general-component', compact('general'))->layout('livewire.layouts.style');
    }
    public function resetField()
    {
        $this->name = '';
        $this->number = '';
        $this->date = '';
    }
        public function create(){

        $this->resetField();
        $this->dispatchBrowserEvent('show-modal-add');
    }

    public function store()
    {
        $this->validate([
            'name'=>'required',
            // 'number'=>'required',
            'date'=>'required',
        ],[
            'name.required'=>'ໃສ່ຂໍ້ມູນກ່ອນ!',
            // 'number.required'=>'ໃສ່ຈຳນວນກ່ອນ!',
            'date.required'=>'ເລືອກວັນທີ່ກ່ອນ!',
        ]);

        $data = new general();
        $data->name = $this->name;
        $data->number = $this->number;
        $data->date = $this->date;
        $data->save();
        $this->dispatchBrowserEvent('hide-modal-add');
        $this->emit('alert', ['type' => 'success', 'message' => 'ບັນທຶກຂໍ້ມູນສຳເລັດ!']);
        $this->resetField();
    }
    public function edit($ids)
    {
        $this->dispatchBrowserEvent('show-modal-edit');

        $Data = general::find($ids);
        $this->hiddenId = $Data->id;
        $this->name = $Data->name;
        $this->number = $Data->number;
        $this->date = $Data->date;
    }
    public function update()
    {
        $this->validate([
            'name'=>'required',
            // 'number'=>'required',
            'date'=>'required',
        ],[
            'name.required'=>'ໃສ່ຊື່ກ່ອນ!',
            // 'qty_price.required'=>'ໃສ່ຈຳນວນກ່ອນ!',
            'date.required'=>'ເລືອກວັນທີ່ກ່ອນ!',
        ]);
        $ids = $this->hiddenId;
        $data = general::find($ids);
        $data->name = $this->name;
        $data->number = $this->number;
        $data->date = $this->date;
        $data->save();
        $this->dispatchBrowserEvent('hide-modal-edit');
        $this->emit('alert', ['type' => 'success', 'message' => 'ແກ້ໄຂຂໍ້ມູນສຳເລັດ!']);
        $this->resetField();
    }
    public function showDestroy($ids)
    {
        $this->dispatchBrowserEvent('show-modal-delete');
        $Data = general::find($ids);
        $this->hiddenId = $Data->id;
    }
    public function destroy()
    {
        $ids = $this->hiddenId;
        $data = general::find($ids);
        $data->delete();
        $this->dispatchBrowserEvent('hide-modal-delete');
        $this->emit('alert', ['type' => 'success', 'message' => 'ລຶບຂໍ້ມູນສຳເລັດ!']);
    }
}
