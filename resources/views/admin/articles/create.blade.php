@extends('layouts.adminapp')
@section('title','Makale Oluştur')
@section('content')

<div class="card shadow mb-4">
    <div class="card-header py-3"></div>
    <div class="card-body">
        @if ($errors->any())
        <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
            {{$error}}
            @endforeach
        </div>
        @endif
        @if (session('status'))
        <div class="alert alert-success" role="alert">
        {{session("status")}}
        </div>
        @endif
        <form method="POST" action="{{route('admin.makaleler.store')}}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label>Makale Başlığı</label>
                <input type="text" name="title" class="form-control">
            </div>
            <div class="form-group">
                <label>Makale Kategori</label>
                <select class="form-control" name="kategori" required>
                    <option value="">Seçim Yapınız</option>
                    @foreach ($categories as $key => $value)
                    <option value="{{$value['id']}}">{{$value['name']}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>Makale Fotoğrafı</label>
                <input type="file" name="image" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Makale İçeriği</label>
                <textarea id="summernote" rows="4" name="content" class="form-control"></textarea>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-block">Makale Oluştur</button>
            </div>
        </form>
    </div>
</div>
@endsection
