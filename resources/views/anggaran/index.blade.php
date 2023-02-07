@extends('layouts.app')
@push('datatable')
	<script>
		var handleDataTableFixedHeader = function() {
            "use strict";
            
            if ($('#data-table-fixed-header').length !== 0) {
                var table=$('#data-table-fixed-header').DataTable({
                    lengthMenu: [20, 40, 60],
                    fixedHeader: {
                        header: true,
                        headerOffset: $('#header').height()
                    },
                    responsive: true,
					ajax:"{{ url('master/anggaran/get_data')}}?kode_group={{$group}}",
					columns: [
                        { data: 'id', render: function (data, type, row, meta) 
							{
								return meta.row + meta.settings._iDisplayStart + 1;
							} 
						},
						{ data: 'kode_form' },
						{ data: 'jenis_anggaran' },
						{ data: 'kode_pk' },
						{ data: 'nama_pk' },
						{ data: 'action' },
						
					],
					language: {
						paginate: {
							// remove previous & next text from pagination
							previous: '<< previous',
							next: 'Next>>'
						}
					}
                });
            }
        };

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
					<div class="breadcrumb-title pe-3">Page</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Pusat Kendali</li>
							</ol>
						</nav>
					</div>
					
				</div>
				<!--end breadcrumb-->
				<h6 class="mb-0 text-uppercase">&nbsp;</h6>
				
				<div class="card">
					<div class="card-body" style="background: #f1f1ff;">
						<ul class="nav nav-tabs nav-primary" role="tablist">
							@foreach(get_group() as $no=>$grp)
							<li class="nav-item" role="presentation">
								<a href="{{url('master/anggaran?group='.$grp->kode_group)}}" class="nav-link @if($group==$grp->kode_group) active @endif" role="tab" aria-selected="@if($group==$grp->kode_group) true @endif">
									<div class="d-flex align-items-center">
										<div class="tab-icon"><i class="bx bx-note font-18 me-1"></i>
										</div>
										<div class="tab-title">({{$grp->kode_group}}) {{$grp->nama_group}}</div>
									</div>
								</a>
							</li>
							@endforeach
						</ul>
						<div class="tab-content py-3" style=" padding: 1%;background: #fff">
							<div class="btn-group" style="margin-bottom:2%">
								<span style="border-color: #fff;" class="btn btn-sm btn-secondary  text-white" onclick="tambah(`{{coder(0)}}`)"><i class="bi bi-plus-circle"></i> Tambah {{nama_group($group)}}</span>
								<!-- <span style="border-color: #fff;" class="btn btn-sm btn-secondary  text-white">Button</span>
								<span style="border-color: #fff;" class="btn btn-sm btn-secondary  text-white">Button</span> -->
							</div>
							<div class="tab-pane fade active show" id="teb" role="tabpanel">
								<div class="table-responsive">
							
									<table id="data-table-fixed-header" class="table table-striped table-bordered dataTable" style="width: 100%;" role="grid" aria-describedby="example_info">
										<thead>
											<tr role="row">
												<th class="sorting_asc" width="5%">No</th>
												<th class="sorting_asc" width="10%">Kode Form</th>
												<th class="sorting_asc">Jenis Anggaran</th>
												<th class="sorting_asc" width="8%">Kode PK </th>
												<th class="sorting_asc" width="25%">Pusat Kendali </th>
												<th class="sorting_asc" width="9%">Act</th>
											</tr>
										</thead>
										
									</table>
								</div>
							</div>
							
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
								<form id="mydata" method="post" action="{{ url('master/anggaran') }}" enctype="multipart/form-data">
									@csrf
									<!-- <input type="submit"> -->
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
			$('#modal-tambah .modal-title').text('Tambah {{nama_group($group)}}');
			$('#modal-tambah').modal('show');
			$('#tampil-form').load("{{url('master/anggaran/modal')}}?kode_group={{$group}}&id="+id);
		}

		$('#btn-save').on('click', () => {
            
            var form=document.getElementById('mydata');
                $.ajax({
                    type: 'POST',
                    url: "{{ url('master/anggaran') }}",
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
							$('#modal-tambah').modal('hide');
							document.getElementById("loadnya").style.width = "0px";
                            var tables=$('#data-table-fixed-header').DataTable();
          							tables.ajax.url("{{ url('master/anggaran/get_data')}}?kode_group={{$group}}").load();
                                
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
						   url: "{{url('master/anggaran/delete')}}",
						   data: "id="+id,
						   success: function(msg){
							   swal("Success! berhasil terhapus!", {
								   icon: "success",
							   });
							   var tables=$('#data-table-fixed-header').DataTable();
          							tables.ajax.url("{{ url('master/anggaran/get_data')}}?kode_group={{$group}}").load();
						   }
					   });
				   
				   
			   } else {
				   
			   }
		   });
		   
	   } 
	</script>
@endpush
