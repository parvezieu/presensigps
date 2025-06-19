@extends('layouts.admin.tabler') @section('content') <div class="page-header d-print-none">
  <div class="container-xl">
    <div class="row g-2 align-items-center">
      <div class="col">
        <!-- Page pre-title -->
        <div class="page-pretitle"> PIM </div>
        <h2 class="page-title"> Data Karyawan </h2>
      </div>
    </div>
  </div>
</div>
<div class="page-body">
  <div class="container-xl">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-body">
            <div class="row">
              <div class="col-12"> 
                @if (Session::get('success')) 
                <div class="alert alert-success">
                  {{ Session::get('success') }}
                </div> 
                @endif 
                @if (Session::get('warning')) 
                <div class="alert alert-warning">
                  {{ Session::get('warning') }}
                </div> 
                @endif 
              </div>
            </div>
            @role('administrator','user')
            <div class="row">
              <div class="col-12">
                <a href="#" class="btn btn-primary" id="btnTambahkaryawan">
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-plus">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path d="M12 5l0 14" />
                    <path d="M5 12l14 0" />
                  </svg> Tambah Data </a>
              </div>
            </div>
            @endrole
            <div class="row mt-3">
              <div class="col-12">
                <form action="/karyawan" method="GET">
                  <div class="row">
                    <div class="col-6">
                      <div class="form-group">
                        <input type="text" name="nama_lengkap" id="nama_lengkap" class="form-control" placeholder="Nama Karyawan" value="{{Request('nama_lengkap')}}">
                      </div>
                    </div>
                    <div class="col-4">
                      <div class="form-group">
                        <select name="kode_dept" id="kode_dept" class="form-select">
                          <option value="" hidden>Departemen</option> @foreach ($departemen as $d) <option {{ Request('kode_dept') == $d->kode_dept ? 'selected' : '' }} value="{{ $d->kode_dept }}">{{ $d->nama_dept }}</option> @endforeach
                        </select>
                      </div>
                    </div>
                    <div class="col-2">
                      <div class="form-group">
                        <button type="submit" class="btn btn-primary">
                          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-search">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M10 10m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0" />
                            <path d="M21 21l-6 -6" />
                          </svg> Cari </button>
                      </div>
                    </div>
                  </div>
                </form>
              </div>
            </div>
            <div class="row mt-2">
              <div class="col-12">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Foto</th>
                      <th>NIK</th>
                      <th>Nama</th>
                      <th>Jabatan</th>
                      <th>No. Hp</th>
                      <th>Departemen</th>
                      @role('administrator','user')
                      <th>Aksi</th>
                      @endrole
                    </tr>
                  </thead>
                  <tbody> @foreach ($karyawan as $d) @php $path = Storage::url('uploads/karyawan/' . $d->foto); @endphp <tr>
                      <td>{{ $loop->iteration + $karyawan->firstItem() -1 }}</td>
                      <td> @if (empty($d->foto)) <img src="{{ asset('assets/img/nofoto.png') }}" class="avatar" alt=""> @else <img src="{{ url($path) }}" class="avatar" alt=""> @endif </td>
                      <td>{{ $d->nik }}</td>
                      <td>{{ $d->nama_lengkap }}</td>
                      <td>{{ $d->jabatan }}</td>
                      <td>{{ $d->no_hp }}</td>
                      <td>{{ $d->nama_dept }}</td>
                      @role('administrator','user')
                      <td>                      
                        <a href="#" class="edit btn btn-primary btn-sm" nik="{{ $d->nik }}">
                          <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-edit"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1" /><path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z" /><path d="M16 5l3 3" /></svg>
                        </a>
                        <form action="/karyawan/{{ $d->nik }}/delete" method="POST">
                          @csrf
                          <a class="btn btn-danger btn-sm delete-confirm">
                            <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-trash"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 7l16 0" /><path d="M10 11l0 6" /><path d="M14 11l0 6" /><path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" /><path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" /></svg>
                          </a>
                        </form>
                      </td>
                      @endrole
                    </tr> @endforeach </tbody>
                </table>
                {{$karyawan->links('vendor.pagination.bootstrap-5')}}
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
{{--Tambah Data Karyawan--}}
<div class="modal modal-blur fade" id="modal-inputkaryawan" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Tambah Data Karyawan</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="/karyawan/store" method="POST" id="frmKaryawan" enctype="multipart/form-data"> @csrf <div class="row">
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
                <input type="text" value="" id="nik" class="form-control" placeholder="NIK" name="nik">
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
                <input type="text" value="" id="nama_lengkap" class="form-control" name="nama_lengkap" placeholder="Nama Lengkap" required>
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
                <input type="text" value="" id="jabatan" class="form-control" placeholder="Jabatan" name="jabatan">
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
                <input type="text" value="" id="no_hp" class="form-control" placeholder="Nomor Handphone" name="no_hp">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-12">
              <select name="kode_dept" id="kode_dept" class="form-select" required>
                <option value="" hidden>Departemen</option> @foreach ($departemen as $d) <option {{ Request('kode_dept') == $d->kode_dept ? 'selected' : '' }} value="{{ $d->kode_dept }}">{{ $d->nama_dept }}</option> @endforeach
              </select>
            </div>
          </div>
          <div class="row mt-3">
            <div class="col-12 ">
              <input type="file" name="foto" class="form-control ">
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
    </div>
  </div>
</div> 
{{--Modal Edit Data Karyawan--}}
<div class="modal modal-blur fade" id="modal-editkaryawan" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Edit Data Karyawan</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body" id="loadeditform">
      </div>
    </div>
  </div>
</div> 
@endsection 
@push('myscript') 
<script>
  $(function() {
    $("#btnTambahkaryawan").click(function() {
      $("#modal-inputkaryawan").modal("show");
    });
    $(".edit").click(function() {
      var nik = $(this).attr('nik');
      $.ajax({
        type: 'POST',
        url: '/karyawan/edit',
        cache: false,
        data: {
          _token: "{{ csrf_token(); }}",
          nik: nik
        },
        success: function(respond) {
          $("#loadeditform").html(respond);
        }
      })
      $("#modal-editkaryawan").modal("show");
    });
    $(".delete-confirm").click(function(e) {
      var form = $(this).closest('form');
      e.preventDefault();
      Swal.fire({
        title: "Apakah Anda Yakin Menghapus?",
        text: "Jika Iya Maka Data Akan Dihapus Permanen",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Ya Hapus!"
      }).then((result) => {
        if (result.isConfirmed) {
          form.submit();
          Swal.fire({
            title: "Deleted!",
            text: "Data Sukses Dihapus",
            icon: "success"
          });
        }
        return false;
      });
    });
    $("#frmKaryawan").submit(function() { // Tambahkan parameter 'event'
      var nik = $("#nik").val();
      var nama_lengkap = $("#nama_lengkap").val();
      var jabatan = $("#jabatan").val();
      var no_hp = $("#no_hp").val();
      var kode_dept = $("frmKaryawan").find("#kode_dept").val();
      if (nik == "") {
        Swal.fire({
          title: 'Warning!',
          text: 'Nik Harus Diisi',
          icon: 'warning',
          confirmButtonText: 'Ok'
        }).then((result) => {
          $("#nik").focus();
        });
        return false;
      } else if (jabatan == "") {
        Swal.fire({
          title: 'Warning!',
          text: 'Jabatan Harus Diisi',
          icon: 'warning',
          confirmButtonText: 'Ok'
        }).then((result) => {
          $("#jabatan").focus();
        });
        return false;
      } else if (no_hp == "") {
        Swal.fire({
          title: 'Warning!',
          text: 'Nomor Hanphone Harus Diisi',
          icon: 'warning',
          confirmButtonText: 'Ok'
        }).then((result) => {
          $("#no_hp").focus();
        });
        return false;
      } else if (kode_dept == "") {
        Swal.fire({
          title: 'Warning!',
          text: 'Departemen Harus Dipilih',
          icon: 'warning',
          confirmButtonText: 'Ok'
        }).then((result) => {
          $("#kode_dept").focus();
        });
        return false;
      }
    });
  });
</script>
@endpush