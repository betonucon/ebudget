<input type="hidden" name="id" value="{{$data->id}}">
<div class="row">
    
    <div class="col-12">
        <label class="form-label"> Personal</label>
        <div class="row">
    
            <div class="col-3" style="padding-right: 0px;">
                <input type="text" placeholder="ketik disini" readonly name="nik" value="{{$data->nik}}" class="form-control form-control-sm mb-3">
            </div>
            <div class="col-8" style="padding-left: 0px;">
                <input type="text" placeholder="ketik disini" name="name"  value="{{$data->name}}" class="form-control form-control-sm mb-3">
            </div>
        </div>
        
    </div>
    
    <div class="col-10">
        <div class="row">
            
            <div class="col-6" style="padding-right: 0px;">
                <label class="form-label">Otorisasi </label>
                <select name="role_id"     class="form-control form-control-sm mb-3">  
                    <option value="">Pilih-----</option>
                    @foreach(get_role() as $pus)
                        <option value="{{$pus->id}}" @if($data->role_id==$pus->id) selected @endif >{{$pus->role}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-6" style="padding-left: 0px;">
                <label class="form-label">Otorisasi Admin</label>
                <select name="admin"     class="form-control form-control-sm mb-3">  
                    <option value="0"  @if($data->admin==0 || $data->admin==null) selected @endif>False</option>
                    <option value="1"  @if($data->admin==1) selected @endif >True</option>
                    
                </select>
            </div>
        </div>
        
    </div>
    
</div>

<script>
    $('#datepick').datepicker();

    
</script>