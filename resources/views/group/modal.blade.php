<input type="hidden" name="id" value="{{$id}}">
<div class="row">
    
    <div class="col-2">
        <label class="form-label">Kode Group </label>
        <input type="text" name="kode_group" value="{{$data->kode_group}}" class="form-control form-control-sm mb-3">
    </div>
    
    <div class="col-10">
        <label class="form-label">Nama Group </label>
        <input type="text" name="nama_group"  value="{{$data->nama_group}}"  class="form-control form-control-sm mb-3">  
    </div>
    <div class="col-12">
        <label class="form-label">Deskripsi </label>
        <input type="text" name="deskripsi_group"   value="{{$data->deskripsi_group}}"   class="form-control form-control-sm mb-3">  
    </div>
    
</div>

<script>
    $('#datepick').datepicker();

    
</script>