<input type="hidden" name="id" value="{{$id}}">
<div class="row">
    
    <div class="col-2">
        <label class="form-label">Kode Unit </label>
        <input type="text" name="kode_pk" value="{{$data->kode_pk}}" class="form-control form-control-sm mb-3">
    </div>
    
    <div class="col-10">
        <label class="form-label">Aktivitas </label>
        <input type="text" name="aktivitas_pk"  value="{{$data->aktivitas_pk}}"  class="form-control form-control-sm mb-3">  
    </div>
    <div class="col-12">
        <label class="form-label">Deskripsi </label>
        <input type="text" name="nama_pk"   value="{{$data->nama_pk}}"   class="form-control form-control-sm mb-3">  
    </div>
    
</div>

<script>
    $('#datepick').datepicker();

    
</script>