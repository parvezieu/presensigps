<div class="modal-body">
  <form action="/departemen/{{ $departemen->kode_dept }}/update" method="POST" id="frmDepartemen" enctype="multipart/form-data"> @csrf <div class="row">
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
          <input type="text" value="{{ $departemen->kode_dept }}" id="kode_dept" class="form-control" placeholder="Kode Departemen" name="kode_dept" readonly>
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
          <input type="text" value="{{ $departemen->nama_dept }}" id="nama_dept" class="form-control" name="nama_dept" placeholder="Nama Departemen" required>
        </div>
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
</div>