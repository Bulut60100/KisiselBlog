@extends('layouts.adminapp')
@section('title','Hakkimizda Sayfası')
@section('content')

@if (session('status'))
    <div class="alert alert-success" role="alert">
        {{session("status")}}
    </div>
@endif

<div class="col-md-12">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h4 class="m-0 font-weight-bold text-primary">Hakkımızda</h4>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Hakkımızda Yazısı</th>
                                        <th>İşlemler</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($aboutus as $key => $value)
                                    <tr>
                                        <td>{{$value->content}}</td>
                                        <td style="width: 105px">
                                            <a target="_blank" href="{{route('aboutus',$value->slug)}}" title="Görüntüle" class="btn btn-sm btn-success"><i class="fa fa-eye"></i></a>
                                            <a href="{{route('admin.aboutus.delete',$value->id)}}" title="Sil" class="btn btn-sm btn-danger"><i class="fa fa-times"></i></a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
        </div>
    </div>
</div>

@endsection
