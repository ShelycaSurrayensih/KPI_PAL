@extends('layouts.userLayout')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header align-items-center d-flex">
                <h4 class="card-title mb-0 flex-grow-1">Realisasi KPI {{$kpidir->desc_kpidir}}</h4>
                <div class="flex-shrink-0">
                    <button type="button" class="btn btn-soft-info btn-sm shadow-none">
                        <i class="ri-file-list-3-line align-middle"></i> Generate Report
                    </button>
                </div>
            </div><!-- end card header -->

            <div class="card-body">
                <div id="IndivRealisasi">
                    <div class="row g-4 mb-3">
                        <div class="col-sm-auto">
                            <div>
                                <button type="button" class="btn btn-success edit-btn" data-bs-toggle="modal"
                                    id="create-btn" data-bs-target="#showModal"><i
                                        class="ri-add-line align-bottom me-1"></i>
                                    Add</button>
                                <button class="btn btn-soft-danger" onClick="deleteMultiple()"><i
                                        class="ri-delete-bin-2-line"></i></button>
                            </div>
                        </div>
                        <div class="col-sm">
                            <div class="d-flex justify-content-sm-end">
                                <div class="search-box ms-2">
                                    <input type="text" class="form-control search" placeholder="Search...">
                                    <i class="ri-search-line search-icon"></i>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="table-responsive table-card mt-3 mb-1">
                        <table class="table align-middle table-nowrap" id="timTable">

                            <thead class="table-light">
                                <tr>

                                    <th class="sort" data-sort="tw">TW</th>
                                    <th class="sort" data-sort="progres">Progres</th>
                                    <th class="sort" data-sort="realisasi">Deskripsi Realisasi</th>
                                    <th class="sort" data-sort="prognosa">Prognosa</th>
                                    <th class="sort" data-sort="keterangan">Keterangan</th>
                                    <th class="sort" data-sort="action">Action</th>
                                </tr>
                            </thead>
                            <tbody class="list form-check-all">

                                @foreach($indivRealisasi as $indivReal)
                                @if($users->divisi_id == $indivReal->divisi)
                                @if($indivReal->id_kpidir == $kpidir->id_kpidir)
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="flex-grow-1">{{ $indivReal->tw }}</div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="flex-grow-1">{{ $indivReal->progres }}</div>
                                        </div>
                                    </td>

                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="flex-grow-1">{{ $indivReal->realisasi }}</div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="flex-grow-1">{{ $indivReal->prognosa }}</div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="flex-grow-1">{{ $indivReal->keterangan }}</div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex gap-2">
                                            <div class="edit">
                                                <button class="btn btn-sm btn-success edit-item-btn"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#showModal{{ $indivReal->id_realisasi }}">Edit</button>
                                            </div>
                                            <div class="remove">
                                                <form
                                                    action="{{ route('KPI_IndivRealisasi.destroy', $indivReal->id_realisasi) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger remove-item-btn"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#deleteRecordModal">Delete</button>
                                                </form>
                                            </div>
                                        </div>
                                    </td>
                                </tr>

                                <!-- edit Modal -->
                                <div class="modal fade" id="showModal{{ $indivReal->id_realisasi }}" tabindex=" -1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header bg-light p-3">
                                                <h5 class="modal-title" id="exampleModalLabel">Edit Data</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close" id="close-modal"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form method="post"
                                                    action="{{ route('indivReal.update', $indivReal->id_realisasi) }}"
                                                    enctype="multipart/form-data" id="myForm">
                                                    @csrf
                                                    <div class="mb-3">
                                                        <label for="id_kpidir">ID KPI</label>
                                                        <input name="id_kpidir" class="form-control" id="id_kpidir"
                                                            value="{{$kpidir->id_kpidir}}" readonly="">

                                                        </input>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="tw">TW</label>
                                                        <input type="text" name="tw" class="form-control" id="tw"
                                                            value="{{$indivReal->tw}}">

                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="progres">Progres</label>
                                                        <input type="text" name="progres" class="form-control"
                                                            id="progres" value="{{$indivReal->progres}}">

                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="realisasi">Deskripsi Realisasi</label>
                                                        <input type="text" name="realisasi" class="form-control"
                                                            id="realisasi" value="{{$indivReal->realisasi}}">

                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="prognosa">Prognosa</label>
                                                        <input type="text" name="prognosa" class="form-control"
                                                            id="prognosa" value="{{$indivReal->prognosa}}">

                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="keterangan">Keterangan</label>
                                                        <input type="text" name="keterangan" class="form-control"
                                                            id="keterangan" value="{{$indivReal->keterangan}}">

                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="id_divisi">ID Divisi</label>
                                                        @foreach($divisi as $div)
                                                        @if($users->id_divisi == $div->id_divisi)
                                                        <input name="id_divisi" value="{{ $div->id_divisi }}"
                                                            class="form-control" id="id_divisi" readonly="">

                                                        @endif @endforeach
                                                    </div>
                                                    <div class=" modal-footer">
                                                        <div class="hstack gap-2 justify-content-end">
                                                            <button type="button" class="btn btn-light"
                                                                data-bs-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-success"
                                                                id="edit-btn">Update</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                    @endif
                                    @endforeach
                            </tbody>
                        </table>
                        <div class="noresult" style="display: none">
                            <div class="text-center">
                                <lord-icon src="https://cdn.lordicon.com/msoeawqm.json" trigger="loop"
                                    colors="primary:#121331,secondary:#08a88a" style="width:75px;height:75px">
                                </lord-icon>
                                <h5 class="mt-2">Sorry! No Result Found</h5>
                                <p class="text-muted mb-0">We've searched more than 150+ Orders We did not find any
                                    orders for you search.</p>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex justify-content-end">
                        <div class="pagination-wrap hstack gap-2">
                            <a class="page-item pagination-prev disabled" href="#">
                                Previous
                            </a>
                            <ul class="pagination listjs-pagination mb-0"></ul>
                            <a class="page-item pagination-next" href="#">
                                Next
                            </a>
                        </div>
                    </div>
                </div>
            </div><!-- end card -->
        </div>
        <!-- end col -->
    </div>
    <!-- end col -->
</div>

<!-- add Modal -->
<div class="modal fade" id="showModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-light p-3">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                    id="close-modal"></button>
            </div>
            <div class="modal-body">
                <form method="post" action="{{ route('KPI_IndivRealisasi.store') }}" enctype="multipart/form-data"
                    id="myForm">
                    @csrf

                    <div class="mb-3">
                        <label for="id_kpidir">ID KPI</label>
                        <select name="id_kpidir" class="form-control" id="id_kpidir">
                            <option value="{{$kpidir->id_kpidir}}">{{ "$kpidir->desc_kpidir" }}</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="tw">TW</label>
                        <input type="text" name="tw" class="form-control" id="tw">

                    </div>
                    <div class="mb-3">
                        <label for="progres">Progres</label>
                        <input type="text" name="progres" class="form-control" id="progres">

                    </div>
                    <div class="mb-3">
                        <label for="realisasi">Deskripsi Realisasi</label>
                        <input type="text" name="realisasi" class="form-control" id="realisasi">

                    </div>
                    <div class="mb-3">
                        <label for="prognosa">Prognosa</label>
                        <input type="text" name="prognosa" class="form-control" id="prognosa">

                    </div>
                    <div class="mb-3">
                        <label for="keterangan">Keterangan</label>
                        <input type="text" name="keterangan" class="form-control" id="keterangan"
                            placeholder="Dapat diisi dengan kendala ketidaktercapaian">

                    </div>
                    <div class=" mb-3">
                        <label for="id_divisi">ID Divisi</label>
                        @foreach($divisi as $div)
                        @if($users->id_divisi == $div->id_divisi)
                        <input name="id_divisi" value="{{ $div->id_divisi }}" class="form-control" id="id_divisi"
                            readonly="">
                        @endif @endforeach
                    </div>

                    <div class="modal-footer">
                        <div class="hstack gap-2 justify-content-end">
                            <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-success" id="add-btn">Add data</button>
                        </div>
                    </div>

                </form>

            </div>
        </div>
    </div>



    @endsection