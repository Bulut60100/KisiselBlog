@extends('layouts.app')
@section('title','İletişim')
@section('content')

<section class="section  pt-5 top-slant-white2 relative-higher bottom-slant-gray">

    <div class="container">
      <div class="row">
        <div class="col-lg-6">
            @if (session('status'))
        <div class="alert alert-success" role="alert">
        {{session("status")}}
        </div>
        @endif
          <form action="{{route('contact.post')}}" method="post">
            @csrf
            @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            @error('message')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
            <div class="row">
              <div class="col-md-6 form-group">
                <label>Ad</label>
                <input type="text" name="name" class="form-control ">
              </div>
              <div class="col-md-6 form-group">
                <label>Konu</label>
                <input type="text" name="konu" class="form-control ">
              </div>
            </div>
            <div class="row">
              <div class="col-md-12 form-group">
                <label>Email</label>
                <input type="email" name="email" class="form-control ">
              </div>
            </div>
            <div class="row">
              <div class="col-md-12 form-group">
                <label>Mesajınız</label>
                <textarea name="message" name="message" class="form-control " cols="30" rows="8"></textarea>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6 form-group">
                <input type="submit" value="Gönder" class="btn btn-primary">
              </div>
            </div>
          </form>
        </div>

        <div class="col-lg-6 pl-2 pl-lg-5">

          <div class="col-md-8 mx-auto contact-form-contact-info">
            <h4 class="mb-5">İletişim Detay</h4>
              <p class="d-flex">
                <span class="ion-ios-location icon mr-5"></span>
                <span>Tokat/Merkez</span>
              </p>

              <p class="d-flex">
                <span class="ion-ios-telephone icon mr-5"></span>
                <span>+90 534 977 08 69</span>
              </p>

              <p class="d-flex">
                <span class="ion-android-mail icon mr-5"></span>
                <span>muhammedmustafabulut6@gmail.com</span>
              </p>
            </div>

        </div>
      </div>
    </div>

  </section>

@endsection
