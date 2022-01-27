@extends('layouts.adminapp')
@section('title','Silinen Makaleler')
@section('content')

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <span><strong>{{$articles->count()}}</strong> Makale bulundu.</span>
                            <a href="{{route('admin.makaleler.index')}}" class="btn btn-primary btn-sm"><i class="fa fa-book">&nbsp; Tüm Makaleler</i></a>
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
                                            <td>
                                                <a href="{{route('admin.recover.article',$value->id)}}" title="Kurtar" class="btn btn-sm btn-primary"><i class="fa fa-recycle"></i></a>
                                                <a href="{{route('admin.destroyed.article',$value->id)}}" title="Sil" class="btn btn-sm btn-danger"><i class="fa fa-times"></i></a>
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
