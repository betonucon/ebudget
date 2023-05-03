@extends('layouts.app')

@section('content')
            <main class="page-content">
				<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">Veiw Usulan </div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">{{$mst->nama_group}}</li>
							</ol>
						</nav>
					</div>
					
				</div>
				<!--end breadcrumb-->
				<h6 class="mb-0 text-uppercase">&nbsp;</h6>
				<form id="mydata" action="{{ url('usulan/'.$usulan_id.'/save') }}" method="post"  enctype="multipart/form-data">
					@csrf
					<input type="hidden" name="id" value="{{$ide}}">
					<div class="card">
						<div class="card-body">
							<ul class="nav nav-tabs nav-danger" role="tablist">
								<li class="nav-item" role="presentation">
									<a class="nav-link active" data-bs-toggle="tab" href="#dangerhome" role="tab" aria-selected="true">
										<div class="d-flex align-items-center">
											<div class="tab-icon"><i class="bx bx-home font-18 me-1"></i>
											</div>
											<div class="tab-title">Pengajuan</div>
										</div>
									</a>
								</li>
								<li class="nav-item" role="presentation">
									<a class="nav-link" data-bs-toggle="tab" href="#dangerprofile" role="tab" aria-selected="false">
										<div class="d-flex align-items-center">
											<div class="tab-icon"><i class="bx bx-user-pin font-18 me-1"></i>
											</div>
											<div class="tab-title">Riwayat</div>
										</div>
									</a>
								</li>
								
							</ul>
							<div class="tab-content py-3" style="padding: 1%; background: #f3f3ff;">
								<div class="tab-pane fade show active" id="dangerhome" role="tabpanel">
									<table class="table table-bordered mb-0">
										<tbody>
											<tr>
												<th scope="row" width="15%">No Dokumen</th>
												<td>{{$data->no_dokumen}}</td>
											</tr>
											<tr>
												<th scope="row" width="15%">Cost Center</th>
												<td>{{$data->cost_center}}</td>
											</tr>
											<tr>
												<th scope="row" width="15%">Unit Kerja</th>
												<td>{{$data->nama_unit}}</td>
											</tr>
											<tr>
												<th scope="row">Jenis Anggaran</th>
												<td><b>{{$data->kode_form}}</b> {{$data->jenis_anggaran}}</td>
											</tr>
											<tr>
												<th scope="row">Aktifitas</th>
												<td>{{$data->aktifitas}}</td>
											</tr>
											
											<tr>
												<th scope="row">Mata Uang</th>
												<td>{{$data->mata_uang}}</td>
											</tr>
											<tr>
												<th scope="row">Total Harga</th>
												<td>Rp.{{$data->total_harga}}</td>
											</tr>
											
										</tbody>
									</table>
									<div class="card-footer">
										<span id="btn-kembali" class="btn btn-danger"><i class="bi bi-save"></i> Kembali</span>
										<span id="btn-save" class="btn btn-primary"><i class="bi bi-save"></i> Simpan</span>
										
									</div>
								</div>
								<div class="tab-pane fade show" id="dangerprofile" role="tabpanel">
									@foreach(get_log($ide) as $riw)
									<div class="alert border-0 bg-light-dark alert-dismissible fade show py-2">
										<div class="d-flex align-items-center">
											<div class="fs-3 text-dark"><i class="bi bi-bell-fill"></i>
										</div>
											<div class="ms-3">
												<div class="text-danger">{{$riw->created_at}} By {{$riw->name}}  ({{$riw->role}})</div>
												<div class="text-dark">{{$riw->keterangan}}</div>
											</div>
										</div>
									</div>
									@endforeach
								</div>
							</div>
					
							
						</div>
					</div>
					<div class="card">
							
					</div>
				</form>
				<div class="col">
					<div id="modal-form" class="modal fade" tabindex="-1" aria-hidden="true">
						<div class="modal-dialog modal-lg">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title"></h5>
									<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
								</div>
								<div class="modal-body" style="background: #fff;">
									<h6 class="mb-0 text-uppercase">Pilih Id Form</h6>
									<table class="table table-bordered mb-0">
										<thead>
											<tr>
												<th style="background:aqua" width="8%" scope="col">No</th>
												<th style="background:aqua" width="12%" scope="col">Id Form</th>
												<th style="background:aqua" scope="col">Jenis Anggaran</th>
												<th style="background:aqua" width="8%" scope="col"></th>
											</tr>
										</thead>
										<tbody>
											@foreach(get_anggaran($mst->kode_group) as $no=>$o)
											<tr>
												<th scope="row">{{$no+1}}</th>
												<td>{{$o->kode_form}}</td>
												<td>{{$o->jenis_anggaran}}</td>
												<td>

													<div class="btn-group btn-group-sm">
														<button type="button" onclick="pilih(`{{$o->kode_form}}`,`{{$o->jenis_anggaran}}`)"class="btn btn-primary">Pilih</button>
													</div>
												</td>
											</tr>
											@endforeach
											
										</tbody>
									</table>
								
								</div>
							</div>
						</div>
					</div>
				</div>
			</main>
@endsection
@push('ajax')
	<script>
		$('#btn-kembali').on('click', () => {
			location.assign("{{url('usulan')}}/{{ $usulan_id}}")
		});
		function show_form(){
			$('#modal-form').modal('show');
		}
		function pilih(kode_form,jenis_anggaran){
			$('#modal-form').modal('hide');
			$('#kode_form').val(kode_form);
			$('#jenis_anggaran').val(jenis_anggaran);
		}

		$('#btn-save').on('click', () => {
            
            var form=document.getElementById('mydata');
                $.ajax({
                    type: 'POST',
                    url: "{{ url('usulan/'.$usulan_id.'/save') }}",
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
							swal({
                              title: "Success! berhasil simpan!",
                              icon: "success",
                            });
                            location.assign("{{url('usulan')}}/{{ $usulan_id}}");
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
