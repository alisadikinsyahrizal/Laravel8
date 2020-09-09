@extends('layouts.crud')
@section('content')
        <div class="container">
                <div class="row">
                    <div class="col-md-8" >
                         
                        <div class="card">
                            <div class="card-body">
                            <form action="{{route('siswa.update',$siswa->id)}}" method="POST">
                                    @csrf
                                    @method("PUT")
                                    <div class="form-group">
                                        <label for="nama">Nama</label>
                                        <input type="text" name="nama" id="nama" class="form-control" value="{{$siswa->nama}}">
                                    </div>
                                     <div class="form-group my-2">
                                        <label for="email">Email</label>
                                        <input type="email" name="email" id="email" class="form-control" value="{{$siswa->email}}">
                                    </div>
                                     <div class="form-group my-2">
                                        <label for="password">Password</label>
                                        <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror" placeholder="Masukan Password">
                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                        <p class="text-muted">Kosongkan Jika Tidak diganti</p>
                                    </div>
                                    <div class="form-group my-2">
                                        <label for="password_confirmation">Password Confirmation</label>
                                        <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" placeholder="Masukan Password">
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-success">Update</button>
                                    <a href="{{route('dashboard')}}" class="btn btn-primary ml-2"> Cancel</a>
                                    </div>
                                    
                                </form>
                            </div>
                        </div>
                      
                    
                    </div>
                    
                </div>
        </div>
        <!-- Button trigger modal -->



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
