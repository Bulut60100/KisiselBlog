@extends('layouts.app')
@section('title',$category->name)
@section('content')
<?php
use Illuminate\Support\Str;
?>

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
            @if (count($article)>0)
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
                  <p>{{Str::limit($value['content'],200)}}</p>

                  <p><a href="{{route('single',$value->slug)}}" class="btn btn-primary btn-sm">Devamını Oku</a></p>

                </div>

              </div>
            </div>
            @endforeach
            @else
            <div class="alert alert-danger">
                <h2>Bu Kategoriye Ait Yazı Bulunamadı</h2>
            </div>
            @endif
        </div>
      </div>



  </section> <!-- .section -->

  @endsection
