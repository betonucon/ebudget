<?php

   function get_usulan(){
      $data=App\Models\Musulan::orderBy('id','Asc')->get();
      return $data;
   }
   function get_status(){
      $data=App\Models\Mstatus::orderBy('id','Asc')->get();
      return $data;
   }
   function get_status_active(){
      $data=App\Models\Mstatus::whereIn('id',array(1,2))->orderBy('id','Asc')->get();
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
   function get_matauang(){
      $data=App\Models\Matauang::orderBy('id','Asc')->get();
      return $data;
   }
   function get_kategori_unit(){
      $data=App\Models\Mkategoriunit::orderBy('id','Asc')->get();
      return $data;
   }
   function get_log($id){
      $data=App\Models\Viewlogusulan::where('t_usulan_id',$id)->orderBy('id','Asc')->get();
      return $data;
   }
   function get_anggaran($kode_group){
      $data=App\Models\Manggaran::where('kode_group',$kode_group)->orderBy('id','Asc')->get();
      return $data;
   }
   function periode_value($t_usulan_id,$bulan,$no){

      $cek=App\Models\Tdetailusulan::where('t_usulan_id',$t_usulan_id)->where('bulan',$bulan)->count();
      if($cek>0){
         $data=App\Models\Tdetailusulan::where('t_usulan_id',$t_usulan_id)->where('bulan',$bulan)->first();
         if($no==1){
            return $data->value;
         }
         if($no==2){
            return $data->value1;
         }
         if($no==3){
            return $data->value2;
         }
         if($no==4){
            return $data->value3;
         }
      }else{
         return 0;
      }
      
   }
   function get_pusat_kendali(){
      $data=App\Models\Mpusatkendali::orderBy('kode_pk','Asc')->get();
      return $data;
   }
   function get_name($nik){
      error_reporting(0);
      $json = file_get_contents('https://portal.krakatausteel.com/eos/api/structdisp/'.$nik);
      $item = json_decode($json,true);
      
      $unit=$item;
      $personnel_no=$unit['personnel_no'];
      $name=$unit['name'];
      return $name;

  }
   function kode_unit($Objectname){
      $data=App\Models\Munit::where('nama_unit',$Objectname)->first();
      return $data->kode_unit;
   }
   function get_unit_verifikasi(){
      $data  = array_column(
         App\Models\Munit::where('nik',Auth::user()->employeeNumber)
         ->get()
         ->toArray(),'kode_unit'
      );
      return $data;
   }
   function count_unit_verifikasi(){
      $data=App\Models\Munit::where('nik',Auth::user()->employeeNumber)->count();
      return $data;
   }
   function auth_employe(){
      $data=App\Models\Employe::where('nik',Auth::user()->employeeNumber)->first();
      return $data;
   }
   function unit_employe(){
      $data=App\Models\Munit::where('kode_unit',auth_employe()->kode_unit)->first();
      return $data;
   }
   function nama_group($id){
      $data=App\Models\Mgroup::where('kode_group',$id)->first();
      return $data->nama_group;
   }
   function auth_nik(){
      $data=App\Models\Employe::where('nik',Auth::user()->employeeNumber)->first();
      return $data['nik'];
   }
   function auth_name(){
      $data=App\Models\Employe::where('nik',Auth::user()->employeeNumber)->first();
      return $data['name'];
   }
   function auth_role(){
      $data=App\Models\Employe::where('nik',Auth::user()->employeeNumber)->first();
      return $data['role_id'];
   }
   function role(){
      $data=App\Models\Mrole::where('id',auth_role())->first();
      return $data['role'];
   }
   function get_role(){
      $data=App\Models\Mrole::get();
      return $data;
   }
   function auth_admin(){
      $data=App\Models\Employe::where('nik',Auth::user()->employeeNumber)->first();
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

  function no_dokumen($kode_group){
      $cek=App\Models\Tusulan::where('kode_group',$kode_group)->where('tahun',date('Y'))->where('bulan',date('m'))->count();
      if($cek>0){
         $mst=App\Models\Tusulan::where('kode_group',$kode_group)->where('tahun',date('Y'))->where('bulan',date('m'))->orderBy('no_dokumen','Desc')->firstOrfail();
         $urutan = (int) substr($mst['no_dokumen'], 6, 2);
         $urutan++;
         $nomor=date('Ym').sprintf("%02s",  $urutan);
      }else{
         $nomor=date('Ym').sprintf("%02s", 1);
      }
      return $nomor;
   }
?>