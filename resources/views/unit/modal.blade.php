<div class="row">
    <div class="col-3">
        <label class="form-label">Kode Unit </label>
        <input type="text" name="kode_unit" class="form-control form-control-sm mb-3">
    </div>
    <div class="col-9">
        <label class="form-label">Nama Unit </label>
        <input type="text" name="nama_unit" class="form-control form-control-sm mb-3">  
    </div>
    <div class="col-3">
        <label class="form-label">Pimpinan </label>
        <div class="input-group input-group-sm mb-3"> 
            <input type="text" name="nik" onkeyup="ubah_cari()" class="form-control" placeholder="NIK" id="nik">
            <span class="input-group-text" onclick="cari_nik()" id="inputGroup-sizing-sm">Cari</span>
        </div>
    </div>
    <div class="col-4">
        <label class="form-label">Nama Pimpinan </label>
        <input type="text" name="nama_atasan" readonly id="add_nama_atasan" class="form-control form-control-sm mb-3">  
    </div>
    <div class="col-5">
        <label class="form-label">Posisi </label>
        <input type="text" name="posisi"  readonly  id="add_position_name" class="form-control form-control-sm mb-3">  
    </div>
</div>

<script>
    $('#datepick').datepicker();

    function cari_nik(){
        var nik=$('#nik').val();
        $.ajax({
            type: 'GET',
            url: "{{url('unit/get_nik')}}",
            data: "nik="+nik,
            beforeSend: function() {
                document.getElementById("loadnya").style.width = "100%";
            },
            success: function(msg){
                var data=msg.split('@');
                document.getElementById("loadnya").style.width = "0px";
                $('#add_nama_atasan').val(data[0]);
                $('#add_position_name').val(data[1]);
                
            }
        });
    }
    function ubah_cari(){
       
        $('#add_nama_atasan').val("");
        $('#add_position_name').val("");
                
           
    }
</script>