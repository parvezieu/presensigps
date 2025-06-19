@extends('layouts.admin.tabler') 
@section('content') 
<div class="page-header d-print-none">
  <div class="container-xl">
    <div class="row g-2 align-items-center">
      <div class="col">
        <!-- Page pre-title -->
        <div class="page-pretitle"> PIM </div>
        <h2 class="page-title"> Data User </h2>
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
              <div class="col-12"> @if (Session::get('success')) <div class="alert alert-success">
                  {{ Session::get('success') }}
                </div> @endif @if (Session::get('warning')) <div class="alert alert-warning">
                  {{ Session::get('warning') }}
                </div> @endif </div>
            </div>
            <div class="row">
              <div class="col-12">
                <a href="#" class="btn btn-primary" id="btnTambahUser">
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-plus">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path d="M12 5l0 14" />
                    <path d="M5 12l14 0" />
                  </svg> Tambah Data </a>
              </div>
            </div>
            <div class="row mt-3">
              <div class="col-12">
                <form action="{{ URL::current() }}" method="GET">
                  <div class="row">
                    <div class="col-10">
                      <div class="form-group">
                        <input type="text" name="name" id="name" class="form-control" placeholder="Nama User" value="{{Request('name')}}">
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
                      <th>Nama</th>
                      <th>Email</th>
                      <th>Departemen</th>
                      <th>Role</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($users as $d)
                      <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$d->name}}</td>
                        <td>{{$d->email}}</td>
                        <td>{{$d->nama_dept}}</td>
                        <td>{{ucwords($d->role)}}</td>
                        <td>
                          <a href="#" class="edit btn btn-primary btn-sm" id_user="{{ $d->id }}">
                          <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-edit"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1" /><path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z" /><path d="M16 5l3 3" /></svg>
                        </a>
                        <form action="/konfigurasi/users/{{ $d->id }}/delete" method="POST">
                          @csrf
                          <a class="btn btn-danger btn-sm delete-confirm">
                            <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-trash"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 7l16 0" /><path d="M10 11l0 6" /><path d="M14 11l0 6" /><path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" /><path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" /></svg>
                          </a>
                        </form>
                        </td>
                      </tr>
                    @endforeach
                  </tbody>
                </table>
                {{$users->links('vendor.pagination.bootstrap-5')}}
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
{{--Tambah Data Users--}}
<div class="modal modal-blur fade" id="modal-inputuser" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Tambah Data User</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="/konfigurasi/users/store" method="POST" id="frmUser" enctype="multipart/form-data"> 
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
                <input type="text" value="" id="nama_user" class="form-control" name="nama_user" placeholder="Nama User" >
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
                <input type="text" value="" id="email" class="form-control" name="email" placeholder="Email">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-12">
              <select name="kode_dept" id="kode_dept" class="form-select">
                <option value="" hidden>Departemen</option> 
                @foreach ($departemen as $d) 
                <option {{ Request('kode_dept') == $d->kode_dept ? 'selected' : '' }} value="{{ $d->kode_dept }}">{{ $d->nama_dept }}</option> 
                @endforeach
              </select>
            </div>
          </div>
          <div class="row mt-3">
            <div class="col-12">
              <select name="role" id="role" class="form-select">
                <option value="" hidden>Role</option> 
                @foreach ($role as $d) 
                <option {{ Request('role') == $d->id ? 'selected' : '' }} value="{{ $d->name }}">{{ ucwords($d->name) }}</option> 
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
                  </svg> Save </button>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div> 
{{--Modal Edit Data User--}}
<div class="modal modal-blur fade" id="modal-edituser" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Edit Data User</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body" id="loadedituser">
      </div>
    </div>
  </div>
</div> 
@endsection 
@push('myscript') 
<script>
  $(function() {
    $("#btnTambahUser").click(function() {
      $("#modal-inputuser").modal("show");
    });

    $(".edit").click(function() {
      var id_user = $(this).attr('id_user');
      $.ajax({
        type: 'POST',
        url: '/konfigurasi/users/edit',
        cache: false,
        data: {
          _token: "{{ csrf_token(); }}",
          id_user : id_user
        },
        success: function(respond) {
          $("#loadedituser").html(respond);
        }
      })
      $("#modal-edituser").modal("show");
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
    $("#frmUser").submit(function() { // Tambahkan parameter 'event'
    var nama_user = $("#nama_user").val();
    var password = $("#password").val();
    var email = $("#email").val();
    var kode_dept = $("#kode_dept").val();
    var role = $("#role").val();

    if (nama_user == "") {
        Swal.fire({
            title: 'Warning!',
            text: 'Nama User Harus Diisi',
            icon: 'warning',
            confirmButtonText: 'Ok'
        }).then((result) => {
            $("#nama_user").focus();
        });
        event.preventDefault(); // Mencegah pengiriman formulir
        return false;
      } else if (password == "") {
        Swal.fire({
            title: 'Warning!',
            text: 'Password Harus Diisi',
            icon: 'warning',
            confirmButtonText: 'Ok'
        }).then((result) => {
            $("#password").focus();
        });
        event.preventDefault(); // Mencegah pengiriman formulir
        return false;
      }else if (email == "") {
        Swal.fire({
            title: 'Warning!',
            text: 'Email Harus Diisi',
            icon: 'warning',
            confirmButtonText: 'Ok'
        }).then((result) => {
            $("#email").focus();
        });
        event.preventDefault(); // Mencegah pengiriman formulir
        return false;
      } else if (kode_dept == "") { // Hapus } yang salah tempat di sini
        Swal.fire({
            title: 'Warning!',
            text: 'Departemen Belum Dipilih',
            icon: 'warning',
            confirmButtonText: 'Ok'
        }).then((result) => {
            $("#kode_dept").focus();
        });
        event.preventDefault(); // Mencegah pengiriman formulir
        return false;
      } else if (role == "") { // Hapus } yang salah tempat di sini
        Swal.fire({
            title: 'Warning!',
            text: 'Role Belum Dipilih',
            icon: 'warning',
            confirmButtonText: 'Ok'
        }).then((result) => {
            $("#role").focus();
        });
        event.preventDefault(); // Mencegah pengiriman formulir
        return false;
      }
    });
  });
</script>
@endpush