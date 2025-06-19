@extends('layouts.admin.tabler') 
@section('content')
<div class="page-header d-print-none">
  <div class="container-xl">
    <div class="row g-2 align-items-center">
      <div class="col">
        <!-- Page pre-title -->
        <div class="page-pretitle"> PIM </div>
        <h2 class="page-title"> Data Pengajuan Izin/Sakit/Cuti </h2>
      </div>
    </div>
  </div>
</div>
<div class="page-body">
  <div class="container-xl">
    <div class="row">
      <div class="col-12">
        <form action="/presensi/izinsakit" method="GET" autocomplete="off">
          <div class="row">
            <div class="col-6">
              <div class="input-icon mb-3">
                <span class="input-icon-addon">
                  <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-calendar"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 7a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v12a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12z" /><path d="M16 3v4" /><path d="M8 3v4" /><path d="M4 11h16" /><path d="M11 15h1" /><path d="M12 15v3" /></svg>
                </span>
                <input type="text" value="{{ Request('dari') }}" id="dari" class="form-control" placeholder="Dari" name="dari">
              </div>
            </div>
            <div class="col-6">
              <div class="input-icon mb-3">
                <span class="input-icon-addon">
                  <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="currentColor"  class="icon icon-tabler icons-tabler-filled icon-tabler-calendar"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M16 2a1 1 0 0 1 .993 .883l.007 .117v1h1a3 3 0 0 1 2.995 2.824l.005 .176v12a3 3 0 0 1 -2.824 2.995l-.176 .005h-12a3 3 0 0 1 -2.995 -2.824l-.005 -.176v-12a3 3 0 0 1 2.824 -2.995l.176 -.005h1v-1a1 1 0 0 1 1.993 -.117l.007 .117v1h6v-1a1 1 0 0 1 1 -1zm3 7h-14v9.625c0 .705 .386 1.286 .883 1.366l.117 .009h12c.513 0 .936 -.53 .993 -1.215l.007 -.16v-9.625z" /><path d="M12 12a1 1 0 0 1 .993 .883l.007 .117v3a1 1 0 0 1 -1.993 .117l-.007 -.117v-2a1 1 0 0 1 -.117 -1.993l.117 -.007h1z" /></svg>
                </span>
                <input type="text" value="{{ Request('sampai') }}" id="sampai" class="form-control" placeholder="Sampai" name="sampai">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-3">
              <div class="input-icon mb-3">
                <span class="input-icon-addon">
                  <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="currentColor"  class="icon icon-tabler icons-tabler-filled icon-tabler-user"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 2a5 5 0 1 1 -5 5l.005 -.217a5 5 0 0 1 4.995 -4.783z" /><path d="M14 14a5 5 0 0 1 5 5v1a2 2 0 0 1 -2 2h-10a2 2 0 0 1 -2 -2v-1a5 5 0 0 1 5 -5h4z" /></svg>
                </span>
                <input type="text" value="{{ Request('nik') }}" id="nik" class="form-control" placeholder="NIK" name="nik">
              </div>
            </div>
            <div class="col-3">
              <div class="input-icon mb-3">
                <span class="input-icon-addon">
                  <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-label"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M16.52 7h-10.52a2 2 0 0 0 -2 2v6a2 2 0 0 0 2 2h10.52a1 1 0 0 0 .78 -.375l3.7 -4.625l-3.7 -4.625a1 1 0 0 0 -.78 -.375" /></svg>
                </span>
                <input type="text" value="{{ Request('nama_lengkap') }}" id="nama_lengkap" class="form-control" placeholder="Nama" name="nama_lengkap">
              </div>
            </div>
            <div class="col-3">
              <div class="form-group">
                <select name="status_approved" id="status_approved" class="form-select">
                  <option value="" hidden>Pilih Status</option>
                  <option value="0" {{ Request('status_approved') === '0' ? 'selected' : '' }}>Pending</option>
                  <option value="1" {{ Request('status_approved') == 1 ? 'selected' : '' }}>Disetujui</option>
                  <option value="2" {{ Request('status_approved') == 2 ? 'selected' : '' }}>Ditolak</option>
                </select>
              </div>
            </div>
            <div class="col-3">
              <div class="form-group">
                <button class="btn btn-primary" type="submit">
                  <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-search"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M10 10m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0" /><path d="M21 21l-6 -6" /></svg>
                  Cari Data Pengajuan
                </button>                
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
    <div class="row">
      <div class="col-12">
        <table class="table table-bordered">
          <thead>
            <tr>
              <th>No.</th>
              <th>Tanggal</th>
              <th>NIK</th>
              <th>Nama Karyawan</th>
              <th>Jabatan</th>
              <th>Status</th>
              <th>Keterangan</th>
              <th>Status Ajuan</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($izinsakit as $d)
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ date('d-m-Y',strtotime($d->tgl_izin)) }}</td>
                <td>{{ $d->nik }}</td>
                <td>{{ $d->nama_lengkap }}</td>
                <td>{{ $d->jabatan }}</td>
                <td>{{ $d->status == "i" ? "Izin" : ($d->status == "s" ? "Sakit" : "Cuti") }}</td>
                <td>{{ $d->keterangan }}</td>
                <td>
                  @if ($d->status_approved==1)
                    <span class="badge bg-success">Disetujui</span>
                  @elseif ($d->status_approved==2)
                  <span class="badge bg-danger">Ditolak</span>
                  @else
                  <span class="badge bg-warning">Pending</span>
                  @endif
                </td>
                <td>
                  @if ($d->status_approved==0)
                  <a href="#" class="btn btn-sm btn-primary" id="approved" id_izinsakit="{{ $d->id }}">
                    <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-circle-dashed-check"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M8.56 3.69a9 9 0 0 0 -2.92 1.95" /><path d="M3.69 8.56a9 9 0 0 0 -.69 3.44" /><path d="M3.69 15.44a9 9 0 0 0 1.95 2.92" /><path d="M8.56 20.31a9 9 0 0 0 3.44 .69" /><path d="M15.44 20.31a9 9 0 0 0 2.92 -1.95" /><path d="M20.31 15.44a9 9 0 0 0 .69 -3.44" /><path d="M20.31 8.56a9 9 0 0 0 -1.95 -2.92" /><path d="M15.44 3.69a9 9 0 0 0 -3.44 -.69" /><path d="M9 12l2 2l4 -4" /></svg>
                    Keputusan
                  </a>
                  @else
                  <a href="/presensi/{{ $d->id }}/batalkanizinsakit" class="btn btn-sm btn-danger">
                    <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-x"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M18 6l-12 12" /><path d="M6 6l12 12" /></svg>
                    Batalkan
                  </a>
                  @endif                  
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
        {{$izinsakit->links('vendor.pagination.bootstrap-5')}}
      </div>
    </div>
  </div>
</div>

<div class="modal modal-blur fade" id="modal-izinsakit" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Izin / Sakit</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="/presensi/approveizinsakit" method="POST">
          @csrf
          <input type="hidden" id="id_izinsakit_form" name="id_izinsakit_form"">
          <div class="row">
            <div class="col-12">
              <div class="form-group">
                <select name="status_approved" id="status_approved" class="form-select">
                  <option value="1">Disetujui</option>
                  <option value="2">Ditolak</option>
                </select>
              </div>
            </div>            
          </div>
          <div class="row mt-3">
            <div class="col-12">
              <div class="form-group">
                <button class="btn btn-primary w-100" type="submit">
                  <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-brand-telegram"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M15 10l-4 4l6 6l4 -16l-18 7l4 2l2 6l3 -4" /></svg>
                  Submit
                </button>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection

@push('myscript')
<script>
  $(function(){
    $("#approved").click(function(e){
      e.preventDefault();
      var id_izinsakit = $(this).attr("id_izinsakit");
      $("#id_izinsakit_form").val(id_izinsakit);
      $("#modal-izinsakit").modal("show");
    });

    $("#dari, #sampai").datepicker({ 
          autoclose: true, 
          todayHighlight: true,
          format: 'yyyy-mm-dd'
    });
  });
</script>
@endpush