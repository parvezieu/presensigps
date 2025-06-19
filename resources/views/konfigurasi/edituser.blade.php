<form action="/konfigurasi/users/{{ $user->id}}/update" method="POST" id="frmUser" enctype="multipart/form-data"> 
          @csrf 
          <div class="row">
            <div class="col-12">
              <div class="input-icon mb-3">
                <span class="input-icon-addon">
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-user-circle">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0" />
                    <path d="M12 10m-3 0a3 3 0 1 0 6 0a3 3 0 1 0 -6 0" />
                    <path d="M6.168 18.849a4 4 0 0 1 3.832 -2.849h4a4 4 0 0 1 3.834 2.855" />
                  </svg>
                </span>
                <input type="text" value="{{$user->name}}" id="nama_user" class="form-control" name="nama_user" placeholder="Nama User" >
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-12">
              <div class="input-icon mb-3">
                <span class="input-icon-addon">
                  <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-lock"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M5 13a2 2 0 0 1 2 -2h10a2 2 0 0 1 2 2v6a2 2 0 0 1 -2 2h-10a2 2 0 0 1 -2 -2v-6z" /><path d="M11 16a1 1 0 1 0 2 0a1 1 0 0 0 -2 0" /><path d="M8 11v-4a4 4 0 1 1 8 0v4" /></svg>
                </span>
                <input type="password" value="" id="password" class="form-control" name="password" placeholder="Password">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-12">
              <div class="input-icon mb-3">
                <span class="input-icon-addon">
                  <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-mail"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M3 7a2 2 0 0 1 2 -2h14a2 2 0 0 1 2 2v10a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2v-10z" /><path d="M3 7l9 6l9 -6" /></svg>
                </span>
                <input type="text" value="{{$user->email}}" id="email" class="form-control" name="email" placeholder="Email">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-12">
              <select name="kode_dept" id="kode_dept" class="form-select">
                <option value="" hidden>Departemen</option> 
                @foreach ($departemen as $d) 
                <option {{ $user->kode_dept == $d->kode_dept ? 'selected' : '' }} value="{{ $d->kode_dept }}">{{ $d->nama_dept }}</option>
                @endforeach
              </select>
            </div>
          </div>
          <div class="row mt-3">
            <div class="col-12">
              <select name="role" id="role" class="form-select">
                <option value="" hidden>Role</option> 
                @foreach ($role as $d) 
                <option {{ $user->role_id == $d->id ? 'selected' : '' }} value="{{ $d->id }}">{{ ucwords($d->name) }}</option>
                @endforeach
              </select>
            </div>
          </div>
          <div class="row mt-3">
            <div class="col-12">
              <div class="form-group">
                <button type="submit" class="btn btn-primary w-100">
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-device-floppy">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path d="M6 4h10l4 4v10a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2" />
                    <path d="M12 14m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" />
                    <path d="M14 4l0 4l-6 0l0 -4" />
                  </svg> Update </button>
              </div>
            </div>
          </div>
        </form>