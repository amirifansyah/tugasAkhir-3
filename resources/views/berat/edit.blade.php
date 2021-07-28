@extends('Admin')
@section('tittle', 'Edit Menu')
@section('content')


<div class="container">
    <div class="row">
        <div class="col-md-12">


            <form action="{{route('berat.update', $berat->id)}}" method="POST" enctype="multipart/form-data">
              @method('PATCH')
                @csrf
                <div class="modal-body">   
                    <div class="row">
                      <div class="col">
                        <div class="mb-3">
                          <label for="gambar" class="form-label">Gambar</label>
                          <img src="{{asset('storage/berat/'.$berat->gambar)}}" width="80px" alt="gambar">
                          <input type="file" name="gambar" class="form-control @error('gambar') is-invalid @enderror">
                        </div>
                        <div class="mb-3">
                          <label for="harga" class="form-label">Harga</label>
                          <input type="text" name="harga" class="form-control @error('harga') is-invalid @enderror" value="{{old('harga') ?? $berat->harga}}">
                          @error('harga')
                                <div class="alert alert-danger">{{ $message }}</div>
                          @enderror
                        </div>
                        <div class="mb-3">
                          <label for="nama" class="form-label">Nama</label>
                          <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" value="{{old('nama') ?? $berat->nama}}">
                          @error('nama')
                                <div class="alert alert-danger">{{ $message }}</div>
                          @enderror
                        </div>
                        <div class="mb-3">
                          <label for="desc" class="form-label">Deskripsi</label>
                          <textarea name="desc" id="desc" rows="3" class="form-control  @error('desc') is-invalid @enderror">{{old('desc') ?? $berat->desc}}</textarea>
                          @error('desc')
                                <div class="alert alert-danger">{{ $message }}</div>
                          @enderror
                        </div>
                      </div>
                    </div>
                </div>
                <div class="modal-footer">
              <button type="submit" class="btn btn-primary">Simpan</button>
            </form>


        </div>
    </div>
</div>


@endsection