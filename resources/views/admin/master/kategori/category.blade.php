@extends('layouts.layout3')

@section('content')

<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">Category</h4>
                <ul class="breadcrumbs">
                    <li class="nav-home">
                        <a href="/home">
                            <i class="flaticon-home"></i>
                        </a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">Main Data</a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">Category Data</a>
                    </li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <h4 class="card-title">Category Data</h4>
                                <button class="btn btn-primary btn-round ml-auto" data-toggle="modal"
                                    data-target="#modalAddCategory">
                                    <i class="fa fa-plus"></i>
                                    Add Row
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="add-row" class="display table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Category Name</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $no=1; @endphp
                                        @foreach ($kategori as $row)

                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $row->nama_kategori }}</td>
                                            <td>
                                                <a href="#modalEditCategory{{$row->id}}" data-toggle="modal"
                                                    class="btn btn-primary btn-xs"><i class="fa fa-edit"></i> Edit</a>
                                                <a href="#modalHapusCategory" data-toggle="modal"
                                                    class="btn btn-danger btn-xs"><i class="fa fa-trash">
                                                    </i> Delete</a>
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
        </div>
    </div>

</div>

<div class="modal fade" id="modalAddCategory" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Add Category</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form action="/categories/store" method="POST"> @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="">Category Name</label>
                        <input type="text" class="form-control" name="nama_kategori" placeholder="Category Name"
                            required>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-undo"></i>
                        Close</button>
                    <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>

@foreach ($kategori as $rowd)
<div class="modal fade" id="modalEditCategory{{ $rowd->id }}" tabindex="-1" role="dialog"
    aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Add Category</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form action="categories/{{ $rowd->id }}/upd" method="POST" enctype="multipart/form-data">@csrf
                <div class="modal-body">
                    <input type="hidden" value="{{ $rowd->id }}" name="id" required>

                    <div class="form-group">
                        <label for="">Category Name</label>
                        <input type="text" class="form-control" value="{{ $rowd->nama_kategori }}" name="nama_kategori"
                            placeholder="Category Name" required>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-undo"></i>
                        Close</button>
                    <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endforeach

@foreach ($kategori as $rowg)
<div class="modal fade" id="modalHapusCategory" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Delete Category</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form action="categories/{{ $rowg->id }}/del" method="GET" enctype="multipart/form-data">@csrf
                <div class="modal-body">
                    <input type="hidden" value="{{ $rowg->id }}" name="id" required>

                    <div class="form-group">
                        <h4>Are you sure to delete this data ?</h4>
                    </div>


                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-undo"></i>
                            Close</button>
                        <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i> Delete</button>
                    </div>
            </form>
        </div>
    </div>
</div>
@endforeach

@endsection