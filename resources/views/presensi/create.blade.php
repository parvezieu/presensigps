@extends('layouts.presensi')
@section('header')
<!-- App Header -->
<div class="appHeader text-light" style="background-color:#febb36">
  <div class="left">
      <a href="javascript:;" class="headerButton goBack">
          <ion-icon name="chevron-back-outline"></ion-icon>
      </a>
  </div>
  <div class="pageTitle" >E-Presensi PIM</div>
  <div class="right"></div>
</div>
<!-- * App Header -->
<style>
  .webcame-capture,
  .webcame-capture video{
    display: block;
    width: 100% !important;
    margin: auto;
    height: auto !important;
    border-radius: 15px;
    text-align: center;
  }

  #map { 
    height: 500px; 
  }
</style>

@endsection
@section('content')
<div class="row" style="margin-top: 70px">
  <div class="col">
    <input type="hidden" id="lokasi">
    <div class="webcame-capture"></div>
  </div>
</div>
<div class="row">
  <div class="col" style="margin-top: 5px">
    @if ($cek > 0)
    <button id="takeabsen" class="btn btn-danger btn-block">
      <ion-icon name="camera"></ion-icon>
      Absen Pulang
    </button>
    @else
    <button id="takeabsen" class="btn btn-warning btn-block">
      <ion-icon name="camera"></ion-icon>
      Absen Masuk
    </button>
    @endif
  </div>
</div>
<div class="row mt-2">
  <div class="col">
    <div id="map">
      <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"/>
      <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
    </div>
  </div>
</div>

<audio id="notifikasi_in">
  <source src="{{ asset('assets/sound/notif_in.mp3')}}" type="audio/mpeg">
</audio>
<audio id="notifikasi_out">
  <source src="{{ asset('assets/sound/notif_out.mp3')}}" type="audio/mpeg">
</audio>
<audio id="radius_sound">
  <source src="{{ asset('assets/sound/radius.mp3')}}" type="audio/mpeg">
</audio>
@endsection

@push('myscript')
<script>
  var notifikasi_in = document.getElementById('notifikasi_in');
  var notifikasi_out = document.getElementById('notifikasi_out');
  var radius_sound = document.getElementById('radius_sound');
  Webcam.set({
    height:480,
    width:640,
    image_format:'jpeg',
    jpeg_quality:80,
  });

  Webcam.attach('.webcame-capture');

  var lokasi = document.getElementById('lokasi');
  if(navigator.geolocation){
    navigator.geolocation.getCurrentPosition(successCallback, errorCallback);
  }
  //-6.346261165716337, 106.73065473924242 unpam
  //position.coords.latitude, position.coords.longitude

  function successCallback(position){
    lokasi.value = -6.346261165716337+","+106.73065473924242;
    var map = L.map('map').setView([-6.346261165716337, 106.73065473924242], 18);
    var lokasi_kantor = "{{ $lok_kantor->lokasi_kantor }}";
    var lok = lokasi_kantor.split(",");
    var lat_kantor = lok[0];
    var long_kantor = lok[1];
    var radius = "{{ $lok_kantor->radius }}";
    L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
    maxZoom: 19,
    attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
    }).addTo(map);
    var marker = L.marker([-6.346261165716337, 106.73065473924242]).addTo(map);
    var circle = L.circle([lat_kantor, long_kantor], {
    color: 'red',
    fillColor: '#f03',
    fillOpacity: 0.5,
    radius: radius
    }).addTo(map);
  }

  function errorCallback(position){
   
  }

  $("#takeabsen").click(function(e){
    Webcam.snap(function(uri){
      image = uri;
    });
    var lokasi = $("#lokasi").val();
    $.ajax({
      type:'POST',
      url:'/presensi/store',
      data:{
        _token:"{{ csrf_token() }}",
        image:image,
        lokasi:lokasi

      },
      cache:false,
      success:function(respond){
        var status = respond.split("|");
        if(status[0] == "success"){
          if(status[2] == "in"){
            notifikasi_in.play();
          }else{
            notifikasi_out.play();
          }
          Swal.fire({
            title: 'Berhasil !',
            text: status[1],
            icon: 'success'
          })
          setTimeout("location.href='/dashboard'",3000);
        }else{
          if(status[2] == "radius"){
            radius_sound.play();
          }
          Swal.fire({
            title: 'Error !',
            text: status[1],
            icon: 'error'
          });
        }

      }
    });
  })

</script>
@endpush