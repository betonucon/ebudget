@extends('layouts.app')
@push('datatable')
	<script>
		var handleDataTableFixedHeader = function() {
            "use strict";
            
            if ($('#data-table-fixed-header').length !== 0) {
                var table=$('#data-table-fixed-header').DataTable({
                    lengthMenu: [20,50,100],
                    searching:true,
                    lengthChange:false,
                    ordering:false,
                    fixedHeader: {
                        header: true,
                        headerOffset: $('#header').height()
                    },
                    dom: 'lrtip',
                    responsive: true,
                    ajax:"{{ url('usulanverifikasi/get_data')}}",
					columns: [
                        { data: 'id', render: function (data, type, row, meta) 
							{
								return meta.row + meta.settings._iDisplayStart + 1;
							} 
						},
						{ data: 'nodok' },
						{ data: 'keterangan_informasi' },
						{ data: 'tahun', className: "text-center" },
						{ data: 'total_harga', className: "text-right" },
						{ data: 'status', className: "text-center" },
						{ data: 'publish', className: "text-center" },
						{ data: 'action', className: "text-center" },
						
					],
					language: {
						paginate: {
							// remove previous & next text from pagination
							previous: '<< previous',
							next: 'Next>>'
						}
					}
                });
				$('#cari_datatable').keyup(function(){
                  table.search($(this).val()).draw() ;
                })
            }
        };
		function cari_group(kode_group){
			var status_id=$('#status_id').val();
            var tables=$('#data-table-fixed-header').DataTable();
                tables.ajax.url("{{ url('usulanverifikasi/get_data')}}?kode_group="+kode_group+"&status_id="+status_id).load();
        }
		function cari_status(status_id){
			var kode_group=$('#kode_group').val();
            var tables=$('#data-table-fixed-header').DataTable();
                tables.ajax.url("{{ url('usulanverifikasi/get_data')}}?kode_group="+kode_group+"&status_id="+status_id).load();
        }
        var TableManageFixedHeader = function () {
            "use strict";
            return {
                //main function
                init: function () {
                    handleDataTableFixedHeader();
                }
            };
        }();

        $(document).ready(function() {
			TableManageFixedHeader.init();

		});
	</script>
@endpush
@section('content')
            <main class="page-content">
				<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">Verifikasi Usulan </div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Verifikasi</li>
							</ol>
						</nav>
					</div>
					
				</div>
				<!--end breadcrumb-->
				<h6 class="mb-0 text-uppercase">&nbsp;</h6>
				<div class="btn-group">
					<!-- <span style="border-color: #fff;" class="btn btn-secondary  text-white" onclick="tambah(`{{coder(0)}}`)"><i class="bi bi-plus-circle"></i> Tambah Verifikasi</span> -->
				</div>
				<div class="card">
					<div class="card-body">
						<div class="row">
							<div class="col-md-4">

							</div>
							<div class="col-md-2">
								<select  onchange="cari_status(this.value)" id="status_id"  class="form-control form-control-sm mb-3">  
									<option value="">All Status-----</option>
									@foreach(get_status() as $pus)
										<option value="{{$pus->id}}" >{{$pus->id}}.{{$pus->status}}</option>
									@endforeach
								</select>
							</div>
							<div class="col-md-2">
								<select  onchange="cari_group(this.value)" id="kode_group" class="form-control form-control-sm mb-3">  
									<option value="">All Usulan----</option>
									@foreach(get_usulan() as $pus)
										<option value="{{$pus->kode_group}}" >{{$pus->kode_group}}.{{$pus->nama_group}}</option>
									@endforeach
								</select>
							</div>
							<div class="col-md-4">
								<input type="text" id="cari_datatable" placeholder="Search....." class="form-control  form-control-sm mb-3">
							</div>
						</div>
						<div class="table-responsive">
							
							<table id="data-table-fixed-header" class="table table-striped table-bordered dataTable" style="width: 100%;" role="grid" aria-describedby="example_info">
								<thead>
									<tr role="row">
										<th class="sorting_asc" width="5%">No</th>
										<th class="sorting_asc" width="10%">No Dokumen</th>
										<th class="sorting_asc">Keterangan</th>
										<th class="sorting_asc" width="7%">Tahun</th>
										<th class="sorting_asc" width="12%">Total</th>
										<th class="sorting_asc" width="12%">Status</th>
										<th class="sorting_asc" width="3%"></th>
										<th class="sorting_asc" width="5%">Action</th>
									</tr>
								</thead>
								
							</table>
						</div>
					</div>
				</div>
				<div class="col">
					<div id="modal-tambah" class="modal fade" tabindex="-1" aria-hidden="true">
						<div class="modal-dialog modal-lg">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title"></h5>
									<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
								</div>
								<form id="mydata" class="">
									@csrf
									<div class="modal-body">
										<div id="tampil-form"></div>
									</div>
									<div class="modal-footer">
										<span id="btn-save" class="btn btn-primary"><i class="bi bi-save"></i> Simpan</span>
										
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</main>
@endsection
@push('ajax')
	<script>
		function tambah(id){
			location.assign("{{url('usulanverifikasi/view')}}?id="+id)
		}
		
		$('#btn-save').on('click', () => {
            
            var form=document.getElementById('mydata');
                $.ajax({
                    type: 'POST',
                    url: "{{ url('usulanverifikasi/save') }}",
                    data: new FormData(form),
                    contentType: false,
                    cache: false,
                    processData:false,
                    beforeSend: function() {
                        document.getElementById("loadnya").style.width = "100%";
                    },
                    success: function(msg){
                        var bat=msg.split('@');
                        if(bat[1]=='ok'){
                            
                            location.reload();
                        }else{
                            document.getElementById("loadnya").style.width = "0px";
                            $('#notifikasi').html(msg);
                            $('#modal-notifikasi').modal('show');
                        }
                        
                        
                    }
                });
        });

		function delete_data(id){
           
		   swal({
			   title: "Yakin menghapus data ini ?",
			   text: "data akan hilang dari daftar ini",
			   type: "warning",
			   icon: "error",
			   showCancelButton: true,
			   align:"center",
			   confirmButtonClass: "btn-danger",
			   confirmButtonText: "Yes, delete it!",
			   closeOnConfirm: false
		   }).then((willDelete) => {
			   if (willDelete) {
					   $.ajax({
						   type: 'GET',
						   url: "{{url('usulanverifikasi/delete')}}",
						   data: "id="+id,
						   success: function(msg){
							   swal("Success! berhasil terhapus!", {
								   icon: "success",
							   });
							   var tables=$('#data-table-fixed-header').DataTable();
          							tables.ajax.url("{{ url('usulanverifikasi/get_data')}}").load();
						   }
					   });
				   
				   
			   } else {
				   
			   }
		   });
		   
	    } 
		function publish_data(id){
           
		   swal({
			   title: "Yakin publish data ini ?",
			   text: "",
			   type: "warning",
			   icon: "info",
			   showCancelButton: true,
			   align:"center",
			   confirmButtonClass: "btn-danger",
			   confirmButtonText: "Yes, delete it!",
			   closeOnConfirm: false
		   }).then((willDelete) => {
			   if (willDelete) {
					   $.ajax({
						   type: 'GET',
						   url: "{{url('usulanverifikasi/publish')}}",
						   data: "id="+id,
						   success: function(msg){
							   swal("Success! berhasil diproses!", {
								   icon: "success",
							   });
							   var tables=$('#data-table-fixed-header').DataTable();
          							tables.ajax.url("{{ url('usulanverifikasi/get_data')}}").load();
						   }
					   });
				   
				   
			   } else {
				   
			   }
		   });
		   
	    } 
	</script>
@endpush
