
<div>
    <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="text-warning"><i class="fa fa-book"></i> ບັນທຶກທົ່ວໄປ</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{route('dashboard')}}">ຫນ້າຫລັກ</a></li>
                <li class="breadcrumb-item active">ບັນທຶກທົ່ວໄປ</li>
              </ol>
            </div>
          </div>
        </div>
      </section>

      <section class="content">
        <div class="container-fluid">
          <div class="row">


            <!--List users- table table-bordered table-striped -->

            <div class="col-md-12">
              <div class="card">
                <div class="card-header">
                  <div class="row">
                    <div class="col-md-6">
                      <a wire:click="create" href="javascript:void(0)" class="btn btn-warning btn-sm"><i class="fa fa-plus"></i> ເພີ່ມໃຫມ່</a>
                    </div>
                  </div>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table id="example1" class="table table-bordered">
                      <thead class="bg-warning">
                        <tr>
                            <th>ແກ້ໄຂ</th>
                            <th>ລຶບອອກ</th>
                          <th>ລຳດັບ</th>
                          <th>ເນື້ອຫາ</th>
                          <th>ຈຳນວນ</th>
                          <th>ວ.ດ.ປ</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php
                          $num = 1;
                        @endphp

                        @foreach ($general as $item)
                        <tr>
                            <td>
                                <button wire:click="edit({{$item->id}})" type="button" class="btn btn-outline-warning btn-sm"><i class="fas fa-pencil-alt"></i> ແກ້ໄຂ</button>
                            </td>
                            <td>
                              <button wire:click="showDestroy({{$item->id}})" type="button" class="btn btn-outline-danger btn-sm"><i class="fas fa-trash"></i> ລຶບອອກ</button>
                            </td>
                          <td>{{$num++}}</td>
                          <td>{{$item->name}}</td>
                          <td>{{$item->number}}</td>
                          {{-- <td>{{number_format($item->number)}}</td> --}}
                          <td>{{$item->date}}</td>

                            </form>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>

                    {{-- <div>
                      {{$item->links() }}
                    </div> --}}

                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

    <!-- /.modal-add -->
       <div wire:ignore.self class="modal fade" id="modal-add">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title"><i class="fa fa-plus text-success"></i> ເພີ່ມໃຫມ່</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>

            <div class="modal-body">
            <form>
              <div class="row">
                <div class="col-md-10">
                  <div class="form-group">
                    <label>ເນືຶ້ອຫາ</label>
                      <input style="height: 100px;" wire:model="name" type="text" class="form-control @error('name') is-invalid @enderror">
                      @error('name') <span style="color: red" class="error">{{ $message }}</span> @enderror
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-5">
                    <div class="form-group">
                      <label>ຈຳນວນ</label>
                        <input wire:model="number" type="text" class="form-control @error('number') is-invalid @enderror" autofocus>
                        @error('number') <span style="color: red" class="error">{{ $message }}</span> @enderror
                    </div>
                  </div>
                  <div class="col-md-5">
                    <div class="form-group">
                      <label>ວ.ດ.ປ</label>
                        <input wire:model="date" type="date" class="form-control @error('date') is-invalid @enderror" autofocus>
                        @error('date') <span style="color: red" class="error">{{ $message }}</span> @enderror
                    </div>
                  </div>
              </div>
        </div>
            </form>
            <div class="modal-footer justify-content-between">
             <button type="button" class="btn btn-danger" data-dismiss="modal">ຍົກເລີກ</button>
              <button wire:click="store" type="button" class="btn btn-success">ບັນທຶກ</button>
            </div>

          </div>
        </div>
      </div>

          <!-- /.modal-edit -->
       <div wire:ignore.self class="modal fade" id="modal-edit">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title"><i class="fa fa-edit text-warning"></i> ແກ້ໄຂ</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>

            <div class="modal-body">
            <form>
                <div class="row">
                    <div class="col-md-10">
                      <div class="form-group">
                        <label>ເນືຶ້ອຫາ</label>
                          <input style="height: 100px;" wire:model="name" type="text" class="form-control @error('name') is-invalid @enderror">
                          @error('name') <span style="color: red" class="error">{{ $message }}</span> @enderror
                      </div>
                    </div>
                  </div>
              <div class="row">
                <div class="col-md-5">
                    <div class="form-group">
                      <label>ຈຳນວນ</label>
                        <input wire:model="number" type="text" class="form-control @error('number') is-invalid @enderror" autofocus>
                        @error('number') <span style="color: red" class="error">{{ $message }}</span> @enderror
                    </div>
                  </div>
                <div class="col-md-5">
                  <div class="form-group">
                    <label>ວ.ດ.ປ</label>
                      <input wire:model="date" type="date" class="form-control @error('date') is-invalid @enderror" autofocus>
                      @error('date') <span style="color: red" class="error">{{ $message }}</span> @enderror
                  </div>
                </div>
              </div>
        </div>
            </form>
            <div class="modal-footer justify-content-between">
             <button type="button" class="btn btn-danger" data-dismiss="modal">ຍົກເລີກ</button>
              <button wire:click="update" type="button" class="btn btn-success">ບັນທຶກ</button>
            </div>

          </div>
        </div>
      </div>

      <!-- /.modal-delete -->
      <div class="modal fade" id="modal-delete">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title"><i class="fa fa-trash text-danger"></i></h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <input type="hidden" wire:model="hiddenId">
              <h3>ຕ້ອງການລຶບອອກບໍ່ຂະນ້ອຍ?</h3>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-danger" data-dismiss="modal">ຍົກເລີກ</button>
              <button wire:click="destroy({{$hiddenId}})" type="button" class="btn btn-success">ລຶບອອກ</button>
            </div>
          </div>
        </div>
      </div>

  </div>

  @push('scripts')
    <script>
      window.addEventListener('show-modal-add', event => {
          $('#modal-add').modal('show');
      })
      window.addEventListener('hide-modal-add', event => {
          $('#modal-add').modal('hide');
      })
      window.addEventListener('show-modal-edit', event => {
          $('#modal-edit').modal('show');
      })
      window.addEventListener('hide-modal-edit', event => {
          $('#modal-edit').modal('hide');
      })
      window.addEventListener('show-modal-delete', event => {
          $('#modal-delete').modal('show');
      })
      window.addEventListener('hide-modal-delete', event => {
          $('#modal-delete').modal('hide');
      })
    </script>
  @endpush

