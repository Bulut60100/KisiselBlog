@extends('layouts.adminapp')
@section('title','Makaleler')
@section('content')

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <span><strong>{{$articles->count()}}</strong> Makale bulundu.</span>
                            <a href="{{route('admin.trashed.article')}}" class="btn btn-warning btn-sm"><i class="fa fa-trash">&nbsp; Silinen Makaleler</i></a>
                        </div>
                        <div class="card-body">

                            @if (session('status'))
                            <div class="alert alert-success" role="alert">
                            {{session("status")}}
                            </div>
                            @endif

                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Başlık</th>
                                            <th>Kategori</th>
                                            <th>Oluşturma Tarihi</th>
                                            <th>İmage</th>
                                            <th>Durum</th>
                                            <th>İşlemler</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($articles as $key => $value)
                                        <tr>
                                            <td>{{$value['title']}}</td>
                                            <td>{{$value->getcategory->name}}</td>
                                            <td>{{$value['created_at']->diffForHumans()}}</td>
                                            <td><img style="width:180px; height:100px" src="{{asset($value['image'])}}" /></td>
                                            <td><input class="toggle-event" article-id="{{$value->id}}" type="checkbox" data-on="Aktif" data-off="Pasif" data-onstyle="success" data-offstyle="danger" @if($value->status==1) checked @endif data-toggle="toggle"></td>
                                            <td style="width: 105px">
                                                <a target="_blank" href="{{route('single',$value->slug)}}" title="Görüntüle" class="btn btn-sm btn-success"><i class="fa fa-eye"></i></a>
                                                <a href="{{route('admin.makaleler.edit',$value->id)}}" title="Düzenle" class="btn btn-sm btn-primary"><i class="fa fa-pen"></i></a>
                                                <a href="{{route('admin.delete.article',$value->id)}}" title="Sil" class="btn btn-sm btn-danger"><i class="fa fa-times"></i></a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>




                    <!-- Page level plugins -->
                    <script src="{{asset('adminAssets/vendor/datatables/jquery.dataTables.min.js')}}"></script>
                    <script src="{{asset('adminAssets/vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>

                    <!-- Page level custom scripts -->
                    <script src="{{asset('adminAssets/js/demo/datatables-demo.js')}}"></script>

@endsection
