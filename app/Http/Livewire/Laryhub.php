<?php

namespace App\Http\Livewire;

use App\Models\Type;
use App\Models\Curren;
use Livewire\Component;
use App\Models\laryhub1;
use Livewire\WithPagination;

class Laryhub extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $hiddenId, $name, $qty_price, $date, $curren_id, $type_id, $created_at;
    public function render()
    {
        $laryjaiy = laryhub1::orderBy('id','desc')->get();
        $curren = Curren::orderBy('id','desc')->get();
        $type = Type::orderBy('id','desc')->get();
        return view('livewire.laryhub',compact('laryjaiy','type','curren'))->layout('livewire.layouts.style');
    }
    public function resetField()
    {
        $this->name = '';
        $this->qty_price = '';
        $this->date = '';
        $this->curren_id = '';
        $this->type_id = '';
    }
        public function create(){

        $this->resetField();
        $this->dispatchBrowserEvent('show-modal-add');
    }

    public function store()
    {
        $this->validate([
            'name'=>'required',
            'qty_price'=>'required',
            'curren_id'=>'required',
            'type_id'=>'required',
            'date'=>'required',
        ],[
            'name.required'=>'ໃສ່ຊື່ກ່ອນ!',
            'qty_price.required'=>'ໃສ່ຈຳນວນກ່ອນ!',
            'curren_id.required'=>'ເລືອກສະກຸນເງິນກ່ອນ!',
            'type_id.required'=>'ເລືອກປະເພດເງິນກ່ອນ!',
            'date.required'=>'ເລືອກວັນທີ່ກ່ອນ!',
        ]);

        $data = new laryhub1();
        $data->name = $this->name;
        $data->qty_price = $this->qty_price;
        $data->curren_id = $this->curren_id;
        $data->type_id = $this->type_id;
        $data->date = $this->date;
        $data->save();
        $this->dispatchBrowserEvent('hide-modal-add');
        $this->emit('alert', ['type' => 'success', 'message' => 'ບັນທຶກຂໍ້ມູນສຳເລັດ!']);
        $this->resetField();
    }
    public function edit($ids)
    {
        $this->dispatchBrowserEvent('show-modal-edit');

        $Data = laryhub1::find($ids);
        $this->hiddenId = $Data->id;
        $this->name = $Data->name;
        $this->qty_price = $Data->qty_price;
        $this->curren_id = $Data->curren_id;
        $this->type_id = $Data->type_id;
        $this->date = $Data->date;
    }
    public function update()
    {
        $this->validate([
            'name'=>'required',
            'qty_price'=>'required',
            'curren_id'=>'required',
            'type_id'=>'required',
            'date'=>'required',
        ],[
            'name.required'=>'ໃສ່ຊື່ກ່ອນ!',
            'qty_price.required'=>'ໃສ່ຈຳນວນກ່ອນ!',
            'curren_id.required'=>'ເລືອກສະກຸນເງິນກ່ອນ!',
            'type_id.required'=>'ເລືອກປະເພດເງິນກ່ອນ!',
            'date.required'=>'ເລືອກວັນທີ່ກ່ອນ!',
        ]);
        $ids = $this->hiddenId;
        $data = laryhub1::find($ids);
        $data->name = $this->name;
        $data->qty_price = $this->qty_price;
        $data->curren_id = $this->curren_id;
        $data->type_id = $this->type_id;
        $data->date = $this->date;
        $data->save();
        $this->dispatchBrowserEvent('hide-modal-edit');
        $this->emit('alert', ['type' => 'success', 'message' => 'ແກ້ໄຂຂໍ້ມູນສຳເລັດ!']);
        $this->resetField();
    }
    public function showDestroy($ids)
    {
        $this->dispatchBrowserEvent('show-modal-delete');
        $Data = laryhub1::find($ids);
        $this->hiddenId = $Data->id;
    }
    public function destroy()
    {
        $ids = $this->hiddenId;
        $data = laryhub1::find($ids);
        $data->delete();
        $this->dispatchBrowserEvent('hide-modal-delete');
        $this->emit('alert', ['type' => 'success', 'message' => 'ລຶບຂໍ້ມູນສຳເລັດ!']);
    }
}
