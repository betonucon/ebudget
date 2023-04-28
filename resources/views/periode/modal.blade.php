<input type="hidden" name="id" value="{{$id}}">
<div class="row">
    
    <div class="col-12">
        <label class="form-label">Start Date </label>
        <div class="input-group form-control-sm mb-3"> 
            <span class="input-group-text" id="basic-addon1"><i class="fadeIn animated bx bx-calendar-event"></i></span>
            <input type="text" name="start_date" id="start_date" value="{{$data->start_date}}" class="form-control" >
        </div>
    </div>
    <div class="col-12">
        <label class="form-label">End Date </label>
        <div class="input-group form-control-sm mb-3"> 
            <span class="input-group-text" id="basic-addon1"><i class="fadeIn animated bx bx-calendar-event"></i></span>
            <input type="text" name="end_date" id="end_date" value="{{$data->end_date}}" class="form-control" >
        </div>
    </div>
    <div class="col-12">
        <label class="form-label">Status Periode </label>
        <div class="input-group form-control-sm mb-3"> 
            <select name="status_id"     class="form-control form-control-sm mb-3">  
                <option value="">Pilih-----</option>
                @foreach(get_status() as $pus)
                    <option value="{{$pus->id}}" @if($data->status_id==$pus->id) selected @endif >{{$pus->status}}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="col-12">
        <label class="form-label">Tahun Periode </label>
        <div class="input-group form-control-sm mb-3"> 
            <select name="tahun"     class="form-control form-control-sm mb-3">  
                <option value="">Pilih-----</option>
                @for($x=2020;$x<(date('Y')+1);$x++)
                    <option value="{{$x}}" @if($data->tahun==$x) selected @endif >{{$x}}</option>
                @endfor
            </select>
        </div>
    </div>
    
</div>

<script>
    $('#start_date').datepicker({format:'yyyy-mm-dd'});
    $('#end_date').datepicker({format:'yyyy-mm-dd'});

    
</script>