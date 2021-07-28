<div class="form-group">
    <label for="">Origin</label>
    <select name="origin" id="origin" class="form-control">
        <option value="" selected="selected">Pilih Origin</option>
        @foreach ($city as $item)
            <option value="{{ $item->id }}" type="text"> {{ $item->name}}</option>
        @endforeach
    </select>
</div>