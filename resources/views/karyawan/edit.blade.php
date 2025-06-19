<form action="/karyawan/{{ $karyawan->nik }}/update" method="POST" id="frmKaryawan" enctype="multipart/form-data"> 
  @csrf 
  <div class="row">
    <div class="col-12">
      <div class="input-icon mb-3">
        <span class="input-icon-addon">
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-id">
            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
            <path d="M3 4m0 3a3 3 0 0 1 3 -3h12a3 3 0 0 1 3 3v10a3 3 0 0 1 -3 3h-12a3 3 0 0 1 -3 -3z" />
            <path d="M9 10m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" />
            <path d="M15 8l2 0" />
            <path d="M15 12l2 0" />
            <path d="M7 16l10 0" />
          </svg>
        </span>
        <input type="text" value="{{ $karyawan->nik }}" id="nik" class="form-control" placeholder="NIK" name="nik" readonly>
      </div>
    </div>
  </div>
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
        <input type="text" value="{{ $karyawan->nama_lengkap }}" id="nama_lengkap" class="form-control" name="nama_lengkap" placeholder="Nama Lengkap">
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-12">
      <div class="input-icon mb-3">
        <span class="input-icon-addon">
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-address-book">
            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
            <path d="M20 6v12a2 2 0 0 1 -2 2h-10a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2h10a2 2 0 0 1 2 2z" />
            <path d="M10 16h6" />
            <path d="M13 11m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" />
            <path d="M4 8h3" />
            <path d="M4 12h3" />
            <path d="M4 16h3" />
          </svg>
        </span>
        <input type="text" value="{{ $karyawan->jabatan }}" id="jabatan" class="form-control" placeholder="Jabatan" name="jabatan">
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-12">
      <div class="input-icon mb-3">
        <span class="input-icon-addon">
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-device-mobile">
            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
            <path d="M6 5a2 2 0 0 1 2 -2h8a2 2 0 0 1 2 2v14a2 2 0 0 1 -2 2h-8a2 2 0 0 1 -2 -2v-14z" />
            <path d="M11 4h2" />
            <path d="M12 17v.01" />
          </svg>
        </span>
        <input type="text" value="{{ $karyawan->no_hp }}" id="no_hp" class="form-control" placeholder="Nomor Handphone" name="no_hp">
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-12">
      <select name="kode_dept" id="kode_dept" class="form-select">
        <option value="" hidden>Departemen</option> 
        @foreach ($departemen as $d) 
        <option {{ $karyawan->kode_dept == $d->kode_dept ? 'selected' : '' }} value="{{ $d->kode_dept }}">{{ $d->nama_dept }}</option> 
        @endforeach
      </select>
    </div>
  </div>
  <div class="row mt-3">
    <div class="col-12 ">
      <input type="file" name="foto" class="form-control ">
      <input type="hidden" name="old_foto" value="{{ $karyawan->foto }}">
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
          </svg> Save changes </button>
      </div>
    </div>
  </div>
</form>