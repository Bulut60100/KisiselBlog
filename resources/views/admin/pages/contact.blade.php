@extends('layouts.adminapp')
@section('title','Iletisim Sayfası')
@section('content')
@if (session('status'))
                            <div class="alert alert-success" role="alert">
                            {{session("status")}}
                            </div>
                            @endif
<div class="col-md-12">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h4 class="m-0 font-weight-bold text-primary">Tüm İletişimler</h4>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>İsim</th>
                                        <th>Konu</th>
                                        <th>Email</th>
                                        <th>Mesaj</th>
                                        <th>Tarih</th>
                                        <th>İşlemler</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($contact as $key => $value)
                                    <tr>
                                        <td>{{$value->name}}</td>
                                        <td>{{$value->konu}}</td>
                                        <td>{{$value->email}}</td>
                                        <td>{{$value->message}}</td>
                                        <td>{{$value['created_at']->diffForHumans()}}</td>
                                        <td>
                                            <a href="{{route('admin.contact.delete',$value->id)}}" title="Sil" class="btn btn-sm btn-danger"><i class="fa fa-times"></i></a>
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
