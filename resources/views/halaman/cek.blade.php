@extends('halaman/layout/app')
@section('title','Visit Lapangan')
@section('content')
<div class="bgded overlay light" style="background-image:url('images/demo/backgrounds/01.png');">
  <section id="services" class="hoc container clear"> 
    <!-- ################################################################################################ -->
    <div class="sectiontitle">
      <p class="nospace font-xs">Data Boking</p>
      <h6 class="heading font-x2">Sarana di Gunakan</h6>
    </div>
    <ul class="nospace group elements elements-three">
      @foreach($data as $dt)
      <?php date_default_timezone_set('Asia/Jakarta');
      $mulai=strtotime($dt->jam_mulai);
      $selesai=strtotime($dt->jam_selesai);

      $dif=$selesai-$mulai;

      $jam=floor($dif/(60*60));
      $menit=$dif-$jam*(60*60);
      $menit2=floor($menit/60);
      
      if ($menit2>=30) {
        $jam+=1;
      }
      ?>

      <li class="one_third">
        <article><a href="#"><i class="fas fa-hourglass-half"></i></a>
          <h6 class="heading">{{$dt->nama_lap}} - {{$dt->nama_jenis}}</h6>
          <p>{{$dt->tanggal}}</p>
          <p>
            {{$dt->jam_mulai}} - {{$dt->jam_selesai}}
          </p>
          <br>
          <p>
            Lama Sewa : 
            {{$jam}} Jam
          </p>
        </article>
      </li>
      @endforeach
    </ul>
    <!-- ################################################################################################ -->
  </section>
</div>
@endsection