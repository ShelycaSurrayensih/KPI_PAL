@extends('layouts.userLayout')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header align-items-center d-flex">
                <h4 class="card-title mb-0 flex-grow-1"><strong>Indhan</strong></h4>
                <div class="flex-shrink-0">
                </div>
            </div><!-- end card header -->

            <div class="card-body">
                <div id="IndhanTim">
                    <div class="row g-4 mb-3">
                        <div class="col-sm-auto">
                            <div>
                                <button type="button" class="btn btn-success edit-btn" data-bs-toggle="modal"
                                    id="create-btn" data-bs-target="#showModal"><i
                                        class="ri-add-line align-bottom me-1"></i>
                                    Add</button>
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

                                    <th class="sort" data-sort="no">No</th>
                                    <th class="sort" data-sort="program_strategis">Program Strategis</th>
                                    <th class="sort" data-sort="entitas">Entitas</th>
                                    <th class="sort" data-sort="entitas">Program Utama</th>
                                    <th class="sort" data-sort="target">Target/Milestone</th>
                                    <th class="sort" data-sort="action">Action</th>
                                </tr>
                            </thead>
                            <tbody class="list form-check-all">
                                <?php $no = 0;?>
                                @foreach($indhan as $indhan)
                                @if($users->divisi_id == $indhan->divisi)

                                <tr>

                                    <?php $no++ ;?>
                                    <td>{{ $no }}</td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="flex-grow-1">{{ $indhan->program_strategis }}</div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="flex-grow-1">{{ $indhan->entitas }}</div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="flex-grow-1">{{ $indhan->program_utama }}</div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="flex-grow-1">{{ $indhan->target }}</div>
                                        </div>
                                    </td>



                                    <td>
                                        <div class="d-flex gap-2">
                                            <div class="edit">
                                                <button class="btn btn-sm btn-success edit-item-btn"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#showModal{{ $indhan->id_indhan }}">Edit</button>
                                            </div>
                                            <div class="edit">
                                                <a href="{{ route('indhanRealisasi.index', $indhan->id_indhan) }}">
                                                    <button
                                                        class="btn btn-sm btn-success edit-item-btn">Realisasi</button>
                                                </a>
                                            </div>
                                            <div class="remove">
                                                <form action="{{ route('KPI_Indhan.destroy', $indhan->id_indhan) }}"
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
                                <div class="modal fade" id="showModal{{ $indhan->id_indhan }}" tabindex=" -1"
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
                                                    action="{{ route('indhan.update', $indhan->id_indhan) }}"
                                                    enctype="multipart/form-data" id="myForm">
                                                    @csrf
                                                    <div class="mb-3">
                                                        <label for="id_tim">ID Tim</label>
                                                        <select name="id_tim" class="form-control" id="id_tim">
                                                            @foreach ($indhanTim as $tim)
                                                            <option value="{{$tim->id_tim}}">{{ "$tim->nama_tim" }}
                                                            </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="id_divisi">ID Divisi</label>
                                                        @foreach($divisi as $div)
                                                        @if($users->id_divisi == $div->id_divisi)
                                                        <input name="id_divisi" value="{{ $div->id_divisi }}"
                                                            class="form-control" id="id_divisi" readonly="">

                                                        @endif @endforeach
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="program_strategis">Program Strategis</label>
                                                        <input type="text" name="program_strategis" class="form-control"
                                                            id="program_strategis"
                                                            value="{{ $indhan->program_strategis }}">

                                                    </div>
                                                    <div class=" mb-3">
                                                        <label for="entitas">Entitas</label>
                                                        <input type="text" name="entitas" class="form-control"
                                                            id="entitas" value="{{ $indhan->entitas }}">

                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="program_utama">Program Utama</label>
                                                        <input type="text" name="program_utama" class="form-control"
                                                            id="program_utama" value="{{ $indhan->program_utama }}">

                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="target">Target/Milestone</label>
                                                        <input type="text" name="target" class="form-control"
                                                            id="target" value="{{ $indhan->target }}">

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
                <form method="post" action="{{ route('KPI_Indhan.store') }}" enctype="multipart/form-data" id="myForm">
                    @csrf
                    <div class="mb-3">
                        <label for="id_tim">ID Tim</label>
                        <select name="id_tim" class="form-control" id="id_tim">
                            @foreach ($indhanTim as $tim)
                            <option value="{{$tim->id_tim}}">{{ "$tim->nama_tim" }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="id_divisi">ID Divisi</label>
                        @foreach($divisi as $div)
                        @if($users->id_divisi == $div->id_divisi)
                        <input name="id_divisi" value="{{ $div->id_divisi }}" class="form-control" id="id_divisi"
                            readonly="">

                        @endif @endforeach
                    </div>
                    <div class="mb-3">
                        <label for="program_strategis">Program Strategis</label>
                        <input type="text" name="program_strategis" class="form-control" id="program_strategis">

                    </div>
                    <div class="mb-3">
                        <label for="entitas">Entitas</label>
                        <input type="text" name="entitas" class="form-control" id="entitas">

                    </div>
                    <div class="mb-3">
                        <label for="program_utama">Program Utama</label>
                        <input type="text" name="program_utama" class="form-control" id="program_utama">

                    </div>
                    <div class="mb-3">
                        <label for="target">Target</label>
                        <input type="text" name="target" class="form-control" id="target">

                    </div>

                    <div class="modal-footer">
                        <div class="hstack gap-2 justify-content-end">
                            <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-success" id="add-btn">Add Data</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>



    @endsection