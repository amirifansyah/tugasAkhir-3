@extends('Admin')
@section('tittle', 'Create promo')
@section('content')


<div class="container">
    <div class="row">
        <div class="col-md-12">


            <form action="{{route('promo.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                
                <div class="form-group">
                  <label for="gambar" class="form-label">Gambar</label>
                  <input type="file" name="gambar" class="form-control @error('gambar') is-invalid @enderror">
                </div>
                <div class="form-group">
                  <label for="nama" class="form-label">Nama Promo</label>
                  <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror">
                  @error('nama')
                        <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="desc" class="form-label">Deskripsi</label>
                  <textarea name="desc" id="desc" rows="3" class="form-control  @error('desc') is-invalid @enderror"></textarea>
                  @error('desc')
                        <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="harga" class="form-label">Harga Diskon</label>
                  <input type="number" name="harga" class="form-control @error('harga') is-invalid @enderror">
                  @error('harga')
                        <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="ringan_id" class="form-label">Pilih Makanan Ringan Promo</label>
                  <select name="ringan_id" id="ringan_id" class="form-control">
                    @foreach ($ringans as $ringan)
                        <option value="{{ $ringan->id }}" {{old('ringan_id') == "$ringan->nama" ? 'selected' : ''}}>
                            {{$ringan->nama}}
                        </option>
                    @endforeach
                  </select>
                </div>
                <div class="form-group">
                  <label for="berat_id" class="form-label">Pilih Makanan Berat Promo</label>
                  <select name="berat_id" id="berat_id" class="form-control">
                    @foreach ($berats as $berat)
                        <option value="{{ $berat->id }}" {{old('berat_id') == "$berat->nama" ? 'selected' : ''}}>
                            {{$berat->nama}}
                        </option>
                    @endforeach
                  </select>
                </div>
              <button type="submit" class="btn btn-primary">Simpan</button>
            </form>


        </div>
    </div>
</div>


@endsection