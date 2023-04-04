<?php

   function get_usulan(){
      $data=App\Models\Musulan::orderBy('id','Asc')->get();
      return $data;
   }
   function get_group(){
      $data=App\Models\Mgroup::orderBy('kode_group','Asc')->get();
      return $data;
   }
   function get_tujuan(){
      $data=App\Models\Mtujuan::orderBy('id','Asc')->get();
      return $data;
   }
   function get_anggaran($kode_group){
      $data=App\Models\Manggaran::where('kode_group',$kode_group)->orderBy('id','Asc')->get();
      return $data;
   }
   function get_pusat_kendali(){
      $data=App\Models\Mpusatkendali::orderBy('kode_pk','Asc')->get();
      return $data;
   }
   function nama_group($id){
      $data=App\Models\Mgroup::where('kode_group',$id)->first();
      return $data->nama_group;
   }
   function auth_nik(){
      $data=App\Models\User::where('nik',Auth::user()->employeeNumber)->first();
      return $data['nik'];
   }
   function auth_name(){
      $data=App\Models\User::where('nik',Auth::user()->employeeNumber)->first();
      return $data['name'];
   }
   function auth_role(){
      $data=App\Models\User::where('nik',Auth::user()->employeeNumber)->first();
      return $data['role_id'];
   }
   function auth_admin(){
      $data=App\Models\User::where('nik',Auth::user()->employeeNumber)->first();
      return $data['admin'];
   }

   function penomoran($id){
      $usl=App\Models\Musulan::where('id',$id)->first();
      $cek=App\Models\Tusulan::where('m_usulan_id',$id)->count();
      if($cek>0){
          $mst=App\Models\Tusulan::where('m_usulan_id',$id)->orderBy('kode_usulan','Desc')->firstOrfail();
          $urutan = (int) $mst['kode_usulan'];
          $urutan++;
          $nomor=$usl->kode.sprintf("%02s",  $urutan);
      }else{
          $nomor=$usl->kode.sprintf("%02s", 1);
      }
      return $nomor;
  }
?>