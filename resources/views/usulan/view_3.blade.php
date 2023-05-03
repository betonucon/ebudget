@extends('layouts.app')

@section('content')
            <main class="page-content">
				<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">Form Usulan </div>
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
									@if($ide>0)
									<div class="row">
										<div class="col-6">
											<label class="form-label">Nomor Dokumen</label>
											<div class="input-group input-group-sm"> 
												<input type="text" disabled class="form-control" name="no_dokumen" value="{{$data->no_dokumen}}">
											</div>
											
										</div>
									</div>
									@endif
									<div class="row">
										<div class="col-3">
											<label class="form-label">Id Form</label>
											<div class="input-group input-group-sm"> 
												<span class="input-group-text" id="basic-addon1" @if($ide==0) onclick="show_form()" @endif><i class="fadeIn animated bx bx-search-alt"></i></span>
												<input type="text" class="form-control" readonly name="kode_form"  value="{{$data->kode_form}}" id="kode_form" placeholder="Enter......">
											</div>
										</div>
										<div class="col-9">
											<label class="form-label">Jenis Anggaran</label>
											<div class="input-group input-group-sm"> 
												<input type="text" class="form-control" readonly name="jenis_anggaran"  value="{{$data->jenis_anggaran}}" id="jenis_anggaran" placeholder="Enter......">
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-12">
											<label class="form-label">Aktifitas</label>
											<div class="input-group input-group-sm"> 
												<input type="text" class="form-control"  name="aktifitas"  value="{{$data->aktifitas}}" placeholder="Enter......">
											</div>
										</div>
										
									</div>
									
									<div class="row">
										<div class="col-4">
											<label class="form-label">Mata Uang</label>
											<div class="input-group input-group-sm"> 
												<select name="m_matauang_id"     class="form-control form-control-sm mb-3">  
													<option value="">Pilih-----</option>
													@foreach(get_matauang() as $pus)
														<option value="{{$pus->id}}" @if($data->m_matauang_id==$pus->id) selected @endif >{{$pus->mata_uang}}</option>
													@endforeach
												</select>
												
											</div>
										</div>
										<div class="col-4">
											<label class="form-label">Periode Nilai</label>
											<div class="input-group input-group-sm"> 
												<select name="periode_nilai"  onchange="pilih_periode(this.value)"   class="form-control form-control-sm mb-3">  
													<option value="">Pilih-----</option>
													<option value="1" @if($data->periode_nilai==1) selected @endif >Nilai Perbulan</option>
													<option value="2"  @if($data->periode_nilai==2) selected @endif >Nilai Pertahun</option>
													
												</select>
											</div>
										</div>
									</div>
									<div class="card-body" style="border: dotted #f5dfdf 2px;">
							
										<div class="row" id="tampil-bulanan">
											<div class="col-6">
												@for($x=1;$x<7;$x++)
													<?php
														if(periode_value($data->id,ubah_bulan($x),1)>0){
															$value=periode_value($data->id,ubah_bulan($x),1);
															$checked="checked";
														}else{
															$value=0;
															$checked="";
														}
													?>
													<div class="row mb-2">
														<label for="inputEnterYourName" class="col-sm-4 col-form-label">{{bulan(ubah_bulan($x))}}  
														<input type="checkbox" id="checkbox{{$x}}" {{$checked}} name="bulan[]" value="{{ubah_bulan($x)}}"></label>
														<div class="col-sm-4">
															<div class="input-group input-group-sm"> 
																<input type="number" id="value{{$x}}" class="form-control" name="nillai[{{ubah_bulan($x)}}]" value="{{$value}}" placeholder="Enter......">
															</div>
														</div>
													</div>
												@endfor
											</div>
											<div class="col-6">
												@for($x=7;$x<13;$x++)
													<?php
														if(periode_value($data->id,ubah_bulan($x),1)>0){
															$value=periode_value($data->id,ubah_bulan($x),1);
															$checked="checked";
														}else{
															$value=0;
															$checked="";
														}
													?>
													<div class="row mb-2">
														<label for="inputEnterYourName" class="col-sm-4 col-form-label">{{bulan(ubah_bulan($x))}} 
														<input type="checkbox" id="checkbox{{$x}}"  {{$checked}} name="bulan[]" value="{{ubah_bulan($x)}}"></label>
														<div class="col-sm-4">
															<div class="input-group input-group-sm"> 
																<input type="number" id="value{{$x}}" class="form-control" name="nillai[{{ubah_bulan($x)}}]"  value="{{$value}}" placeholder="Enter......">
															</div>
														</div>
													</div>
												@endfor
											</div>
										</div>
										<div class="row" id="tampil-tahunan">
											<div class="row mb-2">
												<label for="inputEnterYourName" class="col-sm-2 col-form-label">Nilai Pertahun</label>
												<div class="col-sm-4">
													<div class="input-group input-group-sm"> 
														<input type="number" class="form-control" name="nilai_tahunan" value="" placeholder="Enter......">
													</div>
												</div>
											</div>
										</div>
										
							
									
									</div>
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
		@if($ide>0)
			@if($data->periode_nilai==1)
				$('#tampil-tahunan').hide();
				$('#tampil-bulanan').show();
			@else
				$('#tampil-tahunan').show();
				$('#tampil-bulanan').hide();
			@endif
		@else
			$('#tampil-tahunan').hide();
			$('#tampil-bulanan').hide();
		@endif
		
		function show_form(){
			$('#modal-form').modal('show');
		}
		function pilih(kode_form,jenis_anggaran){
			$('#modal-form').modal('hide');
			$('#kode_form').val(kode_form);
			$('#jenis_anggaran').val(jenis_anggaran);
		}
		@for($x=1;$x<13;$x++)
			@if(periode_value($data->id,ubah_bulan($x),1)>0)
				document.getElementById("value{{$x}}").readOnly = false;
			@else
				document.getElementById("value{{$x}}").readOnly = true;
			@endif
			
			$('#checkbox{{$x}}').click(function() { 
				if (!$(this).is(':checked')) { 
					document.getElementById("value{{$x}}").readOnly = true;
				}else{
					document.getElementById("value{{$x}}").readOnly = false;
					$('#value{{$x}}').val(0);
				}
			});

			
		@endfor
										
		function pilih_periode(id){
			if(id==1){
				$('#tampil-bulanan').show();
				$('#tampil-tahunan').hide();
			}else{
				$('#tampil-tahunan').show();
				$('#tampil-bulanan').hide();
			}
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
