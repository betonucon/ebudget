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
                    ajax:"{{ url('usulan/'.$ide.'/get_data')}}",
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
					<div class="breadcrumb-title pe-3">Usulan </div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">{{$data->nama_group}}</li>
							</ol>
						</nav>
					</div>
					
				</div>
				<!--end breadcrumb-->
				<h6 class="mb-0 text-uppercase">&nbsp;</h6>
				<div class="btn-group">
					<span style="border-color: #fff;" class="btn btn-secondary  text-white" onclick="tambah(`{{coder(0)}}`)"><i class="bi bi-plus-circle"></i> Tambah {{$data->nama_group}}</span>
				</div>
				<div class="card">
					<div class="card-body">
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
			location.assign("{{url('usulan/'.$data->id.'/view')}}?id="+id)
		}
		
		$('#btn-save').on('click', () => {
            
            var form=document.getElementById('mydata');
                $.ajax({
                    type: 'POST',
                    url: "{{ url('usulan/'.$data->id.'/save') }}",
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
	</script>
@endpush
