          <ul class="metismenu" id="menu">
            <li class="@if(Request::is('home')==1 || Request::is('/')==1) mm-active @endif">
              <a href="{{url('/')}}" aria-expanded="true">
                <div class="parent-icon"><i class="bi bi-house-fill"></i>
                </div>
                <div class="menu-title">Home</div>
              </a>
            </li>
            @if(auth_admin()>0)
            <li class="@if(Request::is('master/*')==1) mm-active @endif">
              <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="fadeIn animated bx bx-collection"></i>
                </div>
                <div class="menu-title">Master</div>
              </a>
              <ul>
                
                    <li> <a href="{{url('master/employe')}}"><i class="bi bi-circle"></i>Employe</a></li>
                    <li> <a href="{{url('master/pusatkendali')}}"><i class="bi bi-circle"></i>Pusat Kendali</a></li>
                    <li> <a href="{{url('master/unit')}}"><i class="bi bi-circle"></i>Unit Kerja</a></li>
                    <li> <a href="{{url('master/group')}}"><i class="bi bi-circle"></i>Group</a></li>
                    <li> <a href="{{url('master/periode')}}"><i class="bi bi-circle"></i>Periode</a></li>
                    <li> <a href="{{url('master/anggaran')}}"><i class="bi bi-circle"></i>Anggaran</a></li>
               
              </ul>
            </li>
           @endif
            <li class="@if(Request::is('usulan/*')==1) mm-active @endif">
              <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="fadeIn animated bx bx-file"></i>
                </div>
                <div class="menu-title">Usulan </div>
              </a>
              <ul>
                @foreach(get_usulan() as $usl)
                    <li> <a href="{{url('usulan/'.$usl->id)}}"><i class="bi bi-circle"></i>{{$usl->nama_group}}</a></li>
                @endforeach
              </ul>
            </li>
            @if(count_unit_verifikasi()>0)
            <li class="@if(Request::is('usulan/*')==1 || Request::is('usulan/*')==1) mm-active @endif">
              <a href="{{url('/usulanverifikasi')}}" aria-expanded="true">
                <div class="parent-icon"><i class="fadeIn animated bx bx-file"></i>
                </div>
                <div class="menu-title">Verifikasi Usulan</div>
              </a>
            </li>
            @endif
            
          </ul>