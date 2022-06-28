@extends('halaman/layout/app')
@section('title','Halaman Page')
@section('content')
<?php 
$profil=DB::table('profil')->get();
?>
@foreach($profil as $pf)
<div class="bgded overlay" style="background-image:url('{{asset('bg.jpg')}}');">
  <div id="pageintro" class="hoc clear"> 

    <!-- ################################################################################################ -->
    <article>
      <h4 class="heading">{{$pf->jenis_apk}}</h4>
      <p>Klik Login untuk Menyewa Lapangan secara online</p>
      <footer><a class="btn" href="{{route('login')}}">Login</a> <a class="btn" href="{{route('register')}}">Register</a></footer>
    </article>
    <!-- ################################################################################################ -->
  </div>
</div>


<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<div class="wrapper coloured" id="prosedur">
  <section id="testimonials" class="hoc container clear"> 
    <!-- ################################################################################################ -->
    <div class="sectiontitle">
      <h6 class="heading font-x2">PROSEDUR PENYEWAAN</h6>
      <h6 class="heading font-x2">GOR GLORIA</h6>
    </div>
    <article class="one_half first">
      <figure class="clear">
        <figcaption>
          <em>Login</em></figcaption>
        </figure>
        <blockquote>Penyewa melakukan Login, melalui halaman Login</blockquote>
      </article>
      <article class="one_half">
        <figure class="clear">
          <figcaption>
            <em>Profil Penyewa</em></figcaption>
          </figure>
          <blockquote>Lengkapi Profil anda setelah melakukan Login sebelum input Data Penyewaan.</blockquote>
        </article>
        <article class="one_half first">
          <figure class="clear">
            <figcaption>
              <em>Input Data dan Upload Bukti Pembayaran</em></figcaption>
            </figure>
            <blockquote>
              Setelah input data Penyewaan, Upload Bukti Pembayaran ketika sudah Transfer melalui Kode Pembayaran yang di terapkan di Halaman Data Sewa Anda.
            </blockquote>
          </article>
          <article class="one_half">
            <figure class="clear">
              <figcaption>
                <em>Penyewaan Di Setujui</em></figcaption>
              </figure>
              <blockquote>
                Data Penyewaan akan di Konfirmasi ketika profil anda sudah lengkap dan telah membayar Penyewaan di No Rekening yang di Terpakan/ Meng-Upload Gambar Bukti Transfer
              </blockquote>
            </article>
            <!-- ################################################################################################ -->
          </section>
        </div>
        <!-- ################################################################################################ -->
        <!-- ################################################################################################ -->
        <!-- ################################################################################################ -->
        <div class="wrapper row3" id="lapangan">
          <section class="hoc container clear"> 
            <!-- ################################################################################################ -->
            <div class="sectiontitle">
              <p class="nospace font-xs">Sarana</p>
              <h6 class="heading font-x2">Data Sarana</h6>
            </div>
            <ul id="latest" class="nospace group">
              @foreach($lapangan as $lp)
              <li class="one_third" style="width: 330px;">
                <article><a class="imgover" href="{{route('boking',$lp->id_lapangan)}}"><img src="{{asset('gambar')}}/{{$lp->gambar}}" alt=""></a>
                  <ul class="nospace meta clear">
                    <li><i class="fas fa-user"></i> <a href="{{route('cek_boking',$lp->id_lapangan)}}">Cek Booking</a></li>
                    <li><i class="fas fa-eye"></i> <a href="{{route('visit',$lp->id_lapangan)}}">Visit</a></li>
                  </ul>
                  <div class="excerpt">
                    <p class="heading">
                      {{$lp->nama_lap}} -
                      {{$lp->nama_jenis}}
                      <br> Kegiatan : {{$lp->kegiatan}}
                    </p>
                    <br>
                    <time datetime="2045-04-05T08:15+00:00">Rp {{number_format($lp->harga,0,",",".")}}</time>
                    <p class="heading"><a href="">{{
                      $lp->det_lapangan
                    }}</a></p>
                  </div>
                </article>
              </li>
              @endforeach
            </ul>
            <!-- ################################################################################################ -->
          </section>
        </div>
        <!-- ################################################################################################ -->
        <!-- ################################################################################################ -->
        <!-- ################################################################################################ -->
        <div class="wrapper row2" id="contact" style="text-align: center">
          <section id="ctdetails" class="hoc container clear"> 
            <!-- ################################################################################################ -->
            <div class="sectiontitle">
              <!-- <p class="nospace font-xs">Enim eleifend dignissim bibendum</p> -->
              <h6 class="heading font-x2">LOKASI CONTACT</h6>
              <b>{{$pf->no_profil}}</b>
            </div>
            <iframe class="form-control" height="400" width="1000" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?width=1000&amp;height=600&amp;hl=en&amp;q={{$pf->lokasi}}+(My%20Business%20Name)&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe>
            <!-- ################################################################################################ -->
          </section>
        </div>
        @endforeach
        @endsection