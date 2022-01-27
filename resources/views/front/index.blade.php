@extends('layouts.app')
@section('title','Anasayfa')
@section('content')
<?php
use Illuminate\Support\Str;
?>


  <section class="section bg-light py-5  bottom-slant-gray">
    <div class="container">
      <div class="row">
        <div class="col-md-6 mb-4 mb-lg-0 col-lg-3 text-left service-block" data-aos="fade-up" data-aos-delay="">
          <span class="wrap-icon"><span class="bi bi-laptop"></span></span>
          <h3 class="mb-2 text-primary">Web Yazılım</h3>
          <p>PHP & Mysql ile birlikte Laravel alt yapısı kullanarak mevcut yazılım ihtiyacınızı en iyi şekilde karşılıyoruz.</p>
        </div>
        <div class="col-md-6 mb-4 mb-lg-0 col-lg-3 text-left service-block" data-aos="fade-up" data-aos-delay="100">
          <span class="wrap-icon"><span class="bi bi-code"></span></span>
          <h3 class="mb-2 text-primary">Web Tasarım</h3>
          <p>En güncel teknolojileri kullanarak iş ihtiyaçlarınıza göre size özel mobil uyumlu web siteleri hazırlıyoruz.</p>
        </div>
        <div class="col-md-6 mb-4 mb-lg-0 col-lg-3 text-left service-block" data-aos="fade-up" data-aos-delay="200">
          <span class="wrap-icon"><span class="bi bi-phone"></span></span>
          <h3 class="mb-2 text-primary">Mobil Uygulama</h3>
          <p>Sitenize özel veya sizin istediğiniz gibi uygulama projelerinizi native bir şekilde hazırlıyoruz.</p>
        </div>
        <div class="col-md-6 mb-4 mb-lg-0 col-lg-3 text-left service-block" data-aos="fade-up" data-aos-delay="300">
          <span class="wrap-icon"><span class="bi bi-wordpress"></span></span>
          <h3 class="mb-2 text-primary">Wordpress</h3>
          <p>En güncel teknolojileri kullanarak iş ihtiyaçlarınıza göre size özel mobil uyumlu web siteleri hazırlıyoruz.</p>
        </div>
      </div>
    </div>
  </section>

  <section class="section  bg-light">
    <div class="clearfix mb-5 pb-5">
      <div class="container-fluid">
        <div class="row" data-aos="fade">
          <div class="col-md-12 text-center heading-wrap">
            <h2>Blog</h2>
          </div>
        </div>
      </div>
    </div>

    <div class="container">
      <div class="row">
          @foreach ($article as $key => $value)
          <div class="col-md-6" data-aos="fade-up" data-aos-delay="100">
            <div class="blog d-block">
              <a class="bg-image d-block" href="{{route('single',$value->slug)}}" style="background-image: url('{{asset($value['image'])}}');"></a>
              <div class="text">
                <h3><a href="{{route('single',$value->slug)}}">{{$value['title']}}</a></h3>
                <p class="sched-time">
                  <span><span class="bi bi-tag"></span>{{$value->getcategory->name}}</span><br>
                  <span><span class="fa fa-calendar"></span>&nbsp;{{$value['created_at']->diffForHumans()}}</span> <br>
                </p>
                <p>{{Str::limit($value->content,200)}}</p>

                <p><a href="{{route('single',$value->slug)}}" class="btn btn-primary btn-sm">Devamını Oku</a></p>

              </div>

            </div>
          </div>
          @endforeach
      </div>
    </div>

  </section> <!-- .section -->

  @endsection
