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
				<form id="mydata" >
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
												<input type="text" class="form-control" name="no_dokumen" value="{{$data->no_dokumen}}">
											</div>
											
										</div>
									</div>
									@endif
									<div class="row">
										<div class="col-3">
											<label class="form-label">Id Form</label>
											<div class="input-group input-group-sm"> 
												<span class="input-group-text" id="basic-addon1" onclick="show_form()"><i class="fadeIn animated bx bx-search-alt"></i></span>
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
										<div class="col-9">
											<label class="form-label">Deskripsi Pekerjaan</label>
											<div class="input-group input-group-sm"> 
												<input type="text" class="form-control"  name="pekerjaan"  value="{{$data->pekerjaan}}"  placeholder="Enter......">
											</div>
										</div>
										<div class="col-3">
											<label class="form-label">Nilai Pekerjaan</label>
											<div class="input-group input-group-sm"> 
												<input type="number" class="form-control"  name="nilai_pekerjaan"  value="{{$data->nilai_pekerjaan}}"  placeholder="Enter......">
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
											<label class="form-label">Tujuan</label>
											<div class="input-group input-group-sm"> 
												<select name="tujuan_id"     class="form-control form-control-sm mb-3">  
													<option value="">Pilih-----</option>
													@foreach(get_tujuan() as $pus)
														<option value="{{$pus->id}}" @if($data->tujuan_id==$pus->id) selected @endif >{{$pus->tujuan}}</option>
													@endforeach
												</select>
											</div>
										</div>
									</div>
									<div class="card-body">
							
										<div class="row">
											@for($x=1;$x<13;$x++)
											<div class="col-3" style="background:#ededc1;margin: 3px;">
												<input type="checkbox" name="bulan[]" value="">&nbsp;{{bulan(ubah_bulan($x))}}
											</div>
											@endfor
										</div>
										
							
									
									</div>
									<div class="card-footer">
										<span id="btn-kembali" class="btn btn-danger"><i class="bi bi-save"></i> Kembali</span>
										<span id="btn-save" class="btn btn-primary"><i class="bi bi-save"></i> Simpan</span>
										
									</div>
								</div>
								<div class="tab-pane fade show" id="dangerprofile" role="tabpanel">
									sdsds
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
