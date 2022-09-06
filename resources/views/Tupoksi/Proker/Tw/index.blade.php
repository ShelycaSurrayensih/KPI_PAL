@extends('layouts.userLayout')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header align-items-center d-flex">
                <h4 class="card-title mb-0 flex-grow-1">Tupoksi Tw</h4>
                <div class="flex-shrink-0">
                </div>
            </div><!-- end card header -->

            <div class="card-body">
                <div id="tupoksiDepartemen">
                    <div class="row g-4 mb-3">
                        
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
                                    <th class="sort" data-sort="deskripsi">deskripsi</th>
                                    <th class="sort" data-sort="action">Action</th>
                                </tr>
                            </thead>
                            <tbody class="list form-check-all">
                                @if($twCount == 0)
                                @for($prok_count=1 ; $prok_count <= 4 ; $prok_count++) <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="flex-grow-1">{{ $prok_count }}</div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="flex-grow-1">Belum Terisi</div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex gap-2">
                                            <div class="add">
                                                <button class="btn btn-sm btn-success edit-item-btn" data-bs-toggle="modal" data-bs-target="#Modal{{$prok_count}}">Add Tw</button>
                                            </div>
                                        </div>
                                    </td>
                                    </tr>
                                    <!-- Add Modal -->
                                    <div class="modal fade" id="Modal{{$prok_count}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header bg-light p-3">
                                                    <h5 class="modal-title" id="exampleModalLabel">Add Tw</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="close-modal"></button>
                                                </div>

                                                <div class="modal-body">
                                                    <form method="post" action="{{route('KPI_TupoksiTw.store')}}" enctype="multipart/form-data" id="myForm">
                                                        @csrf
                                                        <input name="id_proker" type="text" class="form-control"  id="id_proker"
                                                        value="{{$tupoksiProker->id_proker }}" readonly hidden>
                                                        <div class="mb-3">
                                                            <label for="tw" class="form-label">TW</label>
                                                            <input name="tw" type="text" class="form-control" id="tw" value="{{$prok_count}}" readonly>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="deskripsi" class="form-label">Deskripsi</label>
                                                            <input name="deskripsi" type="text" class="form-control" id="deskripsi">
                                                        </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <div class="hstack gap-2 justify-content-end">
                                                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-success" id="add-btn">Add TW</button>
                                                    </div>
                                                </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    @endfor
                                    @else
                                    @foreach($tupoksiTw as $tw)
                                    @if($tw->id_proker == $tupoksiProker->id_proker)
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="flex-grow-1">{{ $tw->tw }}</div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="flex-grow-1">{{ $tw->deskripsi }}</div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex gap-2">
                                                <div class="add">
                                                    <button class="btn btn-sm btn-success edit-item-btn" data-bs-toggle="modal" data-bs-target="#showModal{{$tw->id_tw}}">Edit Tw</button>
                                                </div>
                                                <div class="edit">
                                                <a href="{{ route('KPI_TupoksiRealisasi.index') }}">
                                                    <button class="btn btn-sm btn-success edit-item-btn">Realisasi</button>
                                                </a>
                                            </div>
                                            </div>
                                        </td>
                                        
                                    </tr>
                                    <!-- edit Modal -->
                                    <div class="modal fade" id="showModal{{$tw->id_tw}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header bg-light p-3">
                                                    <h5 class="modal-title" id="exampleModalLabel">Edit TW</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="close-modal"></button>
                                                </div>

                                                <div class="modal-body">
                                                    <form method="post" action="{{route('tupoksiTw.update', $tw->id_tw)}}" enctype="multipart/form-data" id="myForm">
                                                        @csrf
                                                        <input name="id_proker" type="text" class="form-control"  id="id_proker"
                                                        value="{{$tupoksiProker->id_proker }}" readonly hidden>
                                                        <div class="mb-3">
                                                            <label for="tw" class="form-label">TW</label>
                                                            <input name="tw" type="text" class="form-control" id="cas_kpiName" value="{{$tw->tw}}" readonly>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="deskripsi" class="form-label">Deskripsi</label>
                                                            <input name="deskripsi" type="text" class="form-control" id="deskripsi" value="{{$tw->deskripsi}}">
                                                        </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <div class="hstack gap-2 justify-content-end">
                                                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-success" id="add-btn">Edit Tw</button>
                                                    </div>
                                                </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                    @endforeach
                                    @for($prok_count= 1 + $twCount ; $prok_count <= 4 ; $prok_count++)<tr>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="flex-grow-1">{{ $prok_count }}</div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="flex-grow-1">Belum Terisi</div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex gap-2">
                                                <div class="add">
                                                    <button class="btn btn-sm btn-success edit-item-btn" data-bs-toggle="modal" data-bs-target="#Modal{{$prok_count}}">Add Tw</button>
                                                </div>
                                            </div>
                                        </td>
                                        </tr>
                                        <!-- Add Modal -->
                                        <div class="modal fade" id="Modal{{$prok_count}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header bg-light p-3">
                                                    <h5 class="modal-title" id="exampleModalLabel">Add Tw</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="close-modal"></button>
                                                </div>

                                                <div class="modal-body">
                                                    <form method="post" action="{{route('KPI_TupoksiTw.store')}}" enctype="multipart/form-data" id="myForm">
                                                        @csrf
                                                        <input name="id_proker" type="text" class="form-control"  id="id_proker"
                                                        value="{{$tupoksiProker->id_proker }}" readonly hidden>
                                                        <div class="mb-3">
                                                            <label for="tw" class="form-label">TW</label>
                                                            <input name="tw" type="text" class="form-control" id="tw" value="{{$prok_count}}" readonly>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="deskripsi" class="form-label">Deskripsi</label>
                                                            <input name="deskripsi" type="text" class="form-control" id="deskripsi">
                                                        </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <div class="hstack gap-2 justify-content-end">
                                                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-success" id="add-btn">Add TW</button>
                                                    </div>
                                                </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                        @endfor
                                        @endif
                            </tbody>
                        </table>
                        <div class="noresult" style="display: none">
                            <div class="text-center">
                                <lord-icon src="https://cdn.lordicon.com/msoeawqm.json" trigger="loop" colors="primary:#121331,secondary:#08a88a" style="width:75px;height:75px">
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
                <h5 class="modal-title" id="exampleModalLabel"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="close-modal"></button>
            </div>
            <div class="modal-body">
                <form method="post" action="{{ route('KPI_TupoksiTw.store') }}" enctype="multipart/form-data" id="myForm">
                    @csrf
                    <div class="mb-3">
                        <label for="tw">Tw</label>
                        <input type="text" name="tw" class="form-control" id="tw">

                    </div>
                    <div class="mb-3">
                        <label for="id_proker">Program Utama</label>
                        <select name="id_proker" class="form-control" id="id_proker" readonly>
                            <option value="{{$tupoksiProker->id_proker}}">{{ "$tupoksiProker->proker" }}</option>
                        </select>

                    </div>
                    <div class="mb-3">
                        <label for="deskripsi">Deskripsi</label>
                        <input type="text" name="deskripsi" class="form-control" id="deskripsi">

                    </div>
                    <div class="modal-footer">
                        <div class="hstack gap-2 justify-content-end">
                            <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-success" id="add-btn">Add Tw</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @endsection