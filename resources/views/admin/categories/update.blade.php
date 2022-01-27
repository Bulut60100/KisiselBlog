@extends('layouts.adminapp')
@section('title','Kategori Güncelle')
@section('content')

<div class="card shadow mb-4">
    <div class="card-header py-3"></div>
    <div class="card-body">
        @if (session('status'))
        <div class="alert alert-success" role="alert">
        {{session("status")}}
        </div>
        @endif
        <form method="POST" action="{{route('admin.category.update',$categories->id)}}">
            @csrf
            <div class="form-group">
                <label>Makale Başlığı</label>
                <input type="text" value="{{$categories->name}}" name="name" class="form-control">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-block">Makale Güncelle</button>
            </div>
        </form>
    </div>
</div>
@endsection
