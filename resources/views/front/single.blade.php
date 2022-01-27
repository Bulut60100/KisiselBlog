@extends('layouts.app')
@section('title','blog')
@section('content')
<section class="section pt-4 bg-light">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 blog-content">


            <h3 class="mb-4">{{$article->title}}</p>
          <p><img src="{{asset($article->image)}}" alt="" class="img-fluid rounded"></p>
          <span>{!!$article->content!!}</span>


        </div>

        <div class="col-lg-4 sidebar pl-lg-5">
          <div class="sidebar-box">
            <form action="#" class="search-form">
              <div class="form-group">
                <span class="icon fa fa-search"></span>
                <input type="text" class="form-control form-control-lg" placeholder="Arama">
              </div>
            </form>
          </div>

          <div class="sidebar-box">
            <div class="categories">
              <h3>Kategoriler</h3>
              @foreach ($categories as $key => $value)
              <li><a href="{{route('category',$value->slug)}}">{{$value['name']}} <span style="color:gray">( {{$value->articleCount()}} )</span></a></li>
              @endforeach
            </div>
          </div>


        </div>
      </div>
    </div>
  </section>
@endsection
