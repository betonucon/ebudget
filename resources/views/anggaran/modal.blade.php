<input type="hidden" name="id" value="{{$id}}">
<div class="row">
    
    <div class="col-2">
        <label class="form-label"> Nomor Form</label>
        <div class="row">
    
            <div class="col-4" style="padding-right: 0px;">
                <input type="text" readonly name="kode_group" value="{{$kode_group}}" class="form-control form-control-sm mb-3">
            </div>
            <div class="col-8" style="padding-left: 0px;">
                <input type="text" name="nomor" {{$disabled}} value="{{$data->nomor}}" class="form-control form-control-sm mb-3">
            </div>
        </div>
        
    </div>
    
    <div class="col-10">
        <label class="form-label"> Jenis Anggaran</label>
        <input type="text" name="jenis_anggaran"  value="{{$data->jenis_anggaran}}"  class="form-control form-control-sm mb-3">  
    </div>
    <div class="col-10">
        <label class="form-label">Nama Pusat Kendali </label>
        <select name="kode_pk"     class="form-control form-control-sm mb-3">  
            <option value="">Pilih-----</option>
            @foreach(get_pusat_kendali() as $pus)
                <option value="{{$pus->kode_pk}}" @if($data->kode_pk==$pus->kode_pk) selected @endif >({{$pus->kode_pk}}) {{$pus->nama_pk}}</option>
            @endforeach
        </select>
    </div>
    
</div>

<script>
    $('#datepick').datepicker();

    
</script>