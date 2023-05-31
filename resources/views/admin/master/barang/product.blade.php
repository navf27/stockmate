@extends('layouts.layout4')

@section('content')

<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">Product</h4>
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
                        <a href="#">Product Data</a>
                    </li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <h4 class="card-title">Product Data</h4>
                                <a class="btn btn-success btn-round ml-auto" href="{{ route('export.excel') }}">
                                    <i class="fa fa-file-excel"></i>
                                    Export Excel
                                </a>
                                <p style="opacity: 0">i</p>
                                <button class="btn btn-primary btn-round" data-toggle="modal"
                                    data-target="#modalAddBarang">
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
                                            <th>Product Name</th>
                                            <th>Category</th>
                                            <th>Price</th>
                                            <th>Stock</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $no=1; @endphp
                                        @foreach ($barang as $row)

                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $row->nama_barang }}</td>
                                            <td>{{ $row->nama_kategori }}</td>
                                            <td>{{ number_format($row->harga) }}</td>
                                            <td>{{ $row->stok }}</td>
                                            <td>
                                                <a href="#modalEditBarang{{$row->id}}" data-toggle="modal"
                                                    class="btn btn-primary btn-xs"><i class="fa fa-edit"></i> Edit</a>
                                                <a href="#modalHapusBarang" data-toggle="modal"
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

<div class="modal fade" id="modalImportExcel" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Import Product</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form action="{{ route('import.excel') }}" method="POST" enctype="multipart/form-data"> @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="">Select .xlsx file</label>
                        <div class="input-group mb-3">
                            <input type="file" name="file" class="form-control" required>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-undo"></i>
                        Close</button>
                    <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Import</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="modalAddBarang" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Add Product</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form action="/products/store" method="POST"> @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="">Product Name</label>
                        <input type="text" class="form-control" name="nama_barang" placeholder="Product Name" required>
                    </div>
                    <div class="form-group">
                        <label>Category</label>
                        <select name="id_kategori" class="form-control" required>
                            <option value="" hidden="">-- Choose Category --</option>
                            @foreach ($kategori as $cat)
                            <option value="{{ $cat->id }}">{{ $cat->nama_kategori }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Price</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">Rp.</span>
                            </div>
                            <input type="number" class="form-control" placeholder="Price" name="harga" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="">Stock</label>
                        <div class="input-group mb-3">
                            <input type="number" name="stok" class="form-control" placeholder="Stock" required>
                            <div class="input-group-append">
                                <span class="input-group-text" id="basic-addon2">unit</span>
                            </div>
                        </div>
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

@foreach ($barang as $rowd)
<div class="modal fade" id="modalEditBarang{{ $rowd->id }}" tabindex="-1" role="dialog"
    aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Add Product</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form action="products/{{ $rowd->id }}/upd" method="POST" enctype="multipart/form-data">@csrf
                <div class="modal-body">
                    <input type="hidden" value="{{ $rowd->id }}" name="id" required>

                    <div class="form-group">
                        <label for="">Product Name</label>
                        <input type="text" value="{{ $rowd->nama_barang }}" class="form-control" name="nama_barang"
                            placeholder="Product Name" required>
                    </div>
                    <div class="form-group">
                        <label>Category</label>
                        <select name="id_kategori" class="form-control" required>
                            <option value="{{ $rowd->id_kategori }}">{{ $rowd->nama_kategori }}</option>
                            @foreach ($kategori as $cat)
                            <option value="{{ $cat->id }}">{{ $cat->nama_kategori }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Price</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">Rp.</span>
                            </div>
                            <input type="number" value="{{ $rowd->harga }}" class="form-control" placeholder="Price"
                                name="harga" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="">Stock</label>
                        <div class="input-group mb-3">
                            <input type="number" name="stok" value="{{ $rowd->stok }}" class="form-control"
                                placeholder="Stock" required>
                            <div class="input-group-append">
                                <span class="input-group-text" id="basic-addon2">unit</span>
                            </div>
                        </div>
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

@foreach ($barang as $rowg)
<div class="modal fade" id="modalHapusBarang" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Delete User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form action="products/{{ $rowd->id }}/del" method="GET" enctype="multipart/form-data">@csrf
                <div class="modal-body">
                    <input type="hidden" value="{{ $rowd->id }}" name="id" required>

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