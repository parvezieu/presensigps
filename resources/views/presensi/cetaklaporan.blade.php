<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>A4</title>

  <!-- Normalize or reset CSS with your favorite library -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/7.0.0/normalize.min.css">

  <!-- Load paper.css for happy printing -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/paper-css/0.4.1/paper.css">

  <!-- Set page size here: A5, A4 or A3 -->
  <!-- Set also "landscape" if you need -->
  <style>
    @page { 
      size: A4 
    }

    #title{
      font-family: Arial, Helvetica, sans-serif;
      font-size: 18px;
      font-weight: bold;
    }

    .tabeldatakaryawan{
      margin-top: 40px;
    }

    .tabeldatakaryawan td{
      padding: 4px;
    }
    
    .tabelpresensi{
      width: 100%;
      margin-top: 20px;
      border-collapse: collapse;
    }

    .tabelpresensi>tr, th{
      border: 1px solid #000000;
      padding: 8px;
      background-color: #D3D3D3;      
    }

    .tabelpresensi td{
      border: 1px solid #000000;
      padding: 5px;
      font-size: 12px;
    }
    .foto{
      width: 50px;
      height: 50px;
    }

    .center {
  display: block;
  margin-left: auto;
  margin-right: auto;
  width: 100%;
  }

  </style>
</head>

<!-- Set "A5", "A4" or "A3" for class name -->
<!-- Set also "landscape" if you need -->
<body class="A4">
  @php
  function selisih($jam_masuk, $jam_keluar)
  {
      list($h, $m, $s) = explode(":", $jam_masuk);
      $dtAwal = mktime($h, $m, $s, "1", "1", "1");
      list($h, $m, $s) = explode(":", $jam_keluar);
      $dtAkhir = mktime($h, $m, $s, "1", "1", "1");
      $dtSelisih = $dtAkhir - $dtAwal;
      $totalmenit = $dtSelisih / 60;
      $jam = explode(".", $totalmenit / 60);
      $sisamenit = ($totalmenit / 60) - $jam[0];
      $sisamenit2 = $sisamenit * 60;
      $jml_jam = $jam[0];
      return $jml_jam . ":" . round($sisamenit2);
  }
  @endphp 
  <!-- Each sheet element should have the class "sheet" -->
  <!-- "padding-**mm" is optional: you can set 10, 15, 20 or 25 -->
  <section class="sheet padding-10mm">

    <table style="width: 100%">
      <tr>
        <td style="width: 30px">
          <img src="{{ asset('assets/img/logopim.png')}}" width="120" height="60" alt="" style="margin-right: 40px">
        </td>
        <td>
          <span id="title">
            LAPORAN PRESENSI <br>
            PERIODE {{ strtoupper($namabulan[$bulan]) }} {{ $tahun }}<br>
            PT Pintar Inovasi Mandiri
          </span>
          <br>
        </td>
      </tr>
      <table class="tabeldatakaryawan">
        <tr>
          <td rowspan="6">
            @php
              $path = Storage::url('uploads/karyawan/'.$karyawan->foto);
            @endphp
            <img src="{{ url($path) }}" alt="" width="100px" height="150px" style="margin-right: 10px">
          </td>
        </tr>
        <tr>
          <td>NIK</td>
          <td>:</td>
          <td>{{ $karyawan->nik }}</td>
        </tr>
        <tr>
          <td>Nama Karyawan</td>
          <td>:</td>
          <td>{{ $karyawan->nama_lengkap }}</td>
        </tr>
        <tr>
          <td>Jabatan</td>
          <td>:</td>
          <td>{{ $karyawan->jabatan }}</td>
        </tr>
        <tr>
          <td>Departemen</td>
          <td>:</td>
          <td>{{ $karyawan->nama_dept }}</td>
        </tr>
        <tr>
          <td>Nomor Handphone</td>
          <td>:</td>
          <td>{{ $karyawan->no_hp }}</td>
        </tr>
      </table>
    </table>
    <table class="tabelpresensi">
      <thead>
        <tr>
          <th>No.</th>
          <th>Tanggal</th>
          <th>Jam Masuk</th>
          <th>Foto</th>
          <th>Jam Pulang</th>
          <th>Foto</th>
          <th>Keterangan</th>
          <th>Jumlah Jam</th>
        </tr>        
      </thead>
      <tbody>
      @foreach ($presensi as $d)
      @php
        $path_in = Storage::url('uploads/absensi/'.$d->foto_in);
        $path_out = Storage::url('uploads/absensi/'.$d->foto_out);
        $jamterlambat = selisih('09:00:00',$d->jam_in);
      @endphp
        <tr>
          <td>{{ $loop->iteration }}</td>
          <td>{{ date("d-m-Y", strtotime($d->tgl_presensi))}}</td>
          <td>{{ $d->jam_in}}</td>
          <td><img src="{{ url($path_in) }}" class="foto" alt=""></td>
          <td>{{ $d->jam_out != null ? $d->jam_out : 'Tidak Absen'}}</td>
          <td>
            @if ($d->jam_out != null)
            <img src="{{ url($path_out) }}" class="foto" alt="">
            @else
            <img src="{{asset('assets/img/nofoto.png')}}" class="foto" alt="">
            @endif
          </td>
          <td>
            @if ($d->jam_in > '09:00')
            Terlambat {{ $jamterlambat }}
            @else
            Tepat Waktu
            @endif
          </td>
          <td>
            @if ($d->jam_out != null)
            @php
              $jmljamkerja = selisih($d->jam_in,$d->jam_out);
            @endphp
            @else
            @php
              $jmljamkerja = 0;
            @endphp              
            @endif
            {{ $jmljamkerja }}
          </td>
        </tr>            
      @endforeach
      </tbody>
    </table>

    <table width="100%" style="margin-top: 150px">
    <tr>
      <td></td>
      <td style="text-align: right;">
        <div style="text-align: center;">Depok, {{date('d-m-Y')}}</div>
      </td>
    </tr>
    <tr>
      <td style="text-align:center; vertical-align:bottom; height:100px">
        <u>Tsumuri</u><br>
      <i><b>HRD Manager</b></i>
      </td>
      <td style="text-align:center; vertical-align:bottom; height:100px">
        <u>Uun Endang Saputra</u><br>
        <i><b>Direktur</b></i>
      </td>
    </tr>
    </table>

    <table style="margin-top: 120px">
      <tr>
        <td>
          <img src="{{asset('assets/img/footerpim2.png')}}" alt="" width="650px" height="150px" class="center">
        </td>
      </tr>
    </table>
  </section>
</body>
</html>