@extends('layouts.crud')
@section('content')
        <div class="container">
                <div class="row">
                    
                    <div class="col-md-12" >
                         

                        <div class="card">
                            <div class="card-header">
                                <h2 class="font-semibold text-xl text-gray-800 leading-tight text-center">
                                Crud Laravel 8
                                </h2>
                                <a href="#" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">Tambah Data</a>
                            </div>
                            <div class="card-body">
                                <table class="table">
                                    <thead>
                                        <tr class="text-center">
                                        <th scope="col">#</th>
                                        <th scope="col">Nama</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i =1 ?>
                                       @foreach ($data as $item)
                                           <tr class="text-center">
                                               <td><?= $i; ?></td>
                                               <td>{{$item->nama}}</td>
                                               <td>{{$item->email}}</td>
                                               <td>
                                                <a href="{{route('siswa.edit',$item->id)}}" class="btn btn-primary btn-sm">Edit</a>
                                               <form action="{{route('siswa.delete',$item->id)}}" onclick="return confirm('Yakin Data Mau Dihapus??');" method="POST" class="d-inline">
                                                       @csrf
                                                       @method("DELETE")
                                                       <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                                   </form>
                                               </td>
                                           </tr>
                                           <?php $i++ ?>
                                       @endforeach
                                    </tbody>
                                    </table>
                            </div>
                        </div>
                    
                    </div>
                    
                </div>
        </div>
        <!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h5 class="modal-title " id="exampleModalLabel" >Tambah Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{route('siswa.store')}}" method="POST">
            @csrf
            <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" name="nama" id="nama" class="form-control" placeholder="Masukan Nama">
            </div>
             <div class="form-group my-2">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" class="form-control" placeholder="Masukan Email">
            </div>
             <div class="form-group my-2">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" class="form-control" placeholder="Masukan Password">
            </div>
            <div class="form-group ">
                <button type="submit" class="btn btn-primary">Save changes</button>

                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

            </div>
        </form>
      </div>
     
    </div>
  </div>
</div>
@endsection
@push('addon-script')
<script>
//   function myFunction() {
//  swal({
//   title: "Good job!",
//   text: "You clicked the button!",
//   icon: "success",
// });
// }
</script>
    
@endpush
