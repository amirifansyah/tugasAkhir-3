@extends('Admin')
@section('tittle', 'Daftar Promo Makanan')
@section('content')


<div class="row">
  <div class="col-12">
    <div class="card">
        @if (session('pesan'))
            <div class="alert alert-success">
                {{ session('pesan') }}
            </div>
        @endif
        @if (session('delete'))
        <div class="alert alert-danger">
            {{ session('delete') }}
        </div>
        @endif

      <div class="card-header">
        <h2 class="card-title">Daftar Promo Makanan</h2>
        
        <div class="card-tools">
          <div class="input-group input-group-sm" style="width: 150px;">
            <a href="{{route('promo.create')}}" class="btn btn-success">Create new</a>
             
    
          </div>
        </div>
      </div>
      <!-- /.card-header -->
      <div class="card-body table-responsive p-0">
        <table class="table table-hover text-nowrap">
          
          <thead>
            <tr>
              <th>No</th>
              <th>Gambar</th>
              <th>Nama Promo</th>
              <th>Harga Promo</th>
              <th>Deskripsi </th>
              <th>Nama Makanan</th>
              <th>Edit</th>
              <th>Hapus</th>
            </tr>
          </thead>
          <tbody>
              @forelse ($promos as $promo)
              <tr>
                  <td>{{ $loop->iteration}}</td>
                  <td><img src="{{asset('storage/promo/'.$promo->gambar)}}" width="80px" alt=""></td>
                  <td>{{ $promo->nama}}</td>
                  <td>{{ $promo->harga}}</td>
                  <td>{{ $promo->desc}}</td>
                  <td>
                    <ul>
                      <li>{{ $promo->berat->nama}}</li>
                      <li>{{ $promo->ringan->nama}}</li>  
                    </ul>  
                  </td>
                  <th>
                    <a href="{{route('promo.edit', $promo->id)}}"><button class="btn btn-info"><i class="fas fa-edit"></i></button></a>
                  </th>
                  <td>
                    <form action="{{route('promo.destroy', $promo->id)}}" method="POST">
                      @method('DELETE')
                      @csrf
                      <button class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
                    </form>
                  </td>
              </tr>    
              @empty
                  <td colspan="8" class="text-center" >Data Kosong</td>
              @endforelse
              
          </tbody>
        </table>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
  </div>
</div>
@endsection