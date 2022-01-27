@extends('layouts.adminapp')
@section('title','Kategoriler')
@section('content')

@if (session('status'))
        <div class="alert alert-success" role="alert">
        {{session("status")}}
        </div>
        @endif
<div class="row">
    <div class="col-md-4">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h4 class="m-0 font-weight-bold text-primary">Yeni Kategori Oluştur</h4>
            </div>
            <div class="card-body">
                <form method="POST" action="{{route('admin.category.store')}}">
                    @csrf
                    <div class="form-group">
                        <label>Kategori Adı</label>
                        <input type="text" name="name" class="form-control">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-block">Makale Oluştur</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-8">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h4 class="m-0 font-weight-bold text-primary">Tüm Kategoriler</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Kategori Adı</th>
                                            <th>Toplam Makale Sayısı</th>
                                            <th>İşlemler</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($categories as $key => $value)
                                        <tr>
                                            <td>{{$value->name}}</td>
                                            <td>( {{$value->articleCount()}} )</td>
                                            <td style="width: 105px">
                                                <a href="{{route('admin.category.edit',$value->id)}}" title="Düzenle" class="btn btn-sm btn-primary"><i class="fa fa-pen"></i></a>
                                                <a href="{{route('admin.delete.category',$value->id)}}" title="Sil" class="btn btn-sm btn-danger"><i class="fa fa-times"></i></a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
            </div>
        </div>
    </div>
</div>


@endsection
