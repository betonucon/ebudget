          <ul class="metismenu" id="menu">
            <li class="@if(Request::is('usulan/*')==1) mm-active @endif">
              <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bi bi-house-fill"></i>
                </div>
                <div class="menu-title">Usulan</div>
              </a>
              <ul>
                @foreach(get_usulan() as $usl)
                    <li> <a href="{{url('usulan/'.$usl->id)}}"><i class="bi bi-circle"></i>{{$usl->nama_usulan}}</a></li>
                @endforeach
              </ul>
            </li>
            <li class="@if(Request::is('pusatkendali')==1 || Request::is('pusatkendali/*')==1) mm-active @endif">
              <a href="{{url('pusatkendali')}}" aria-expanded="true">
                <i class="bx bx-pencil"></i>
                <div class="menu-title">Pusat Kendali</div>
              </a>
            </li>
          </ul>