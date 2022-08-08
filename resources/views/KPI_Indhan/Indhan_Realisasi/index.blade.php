@extends('layouts.userLayout')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header align-items-center d-flex">
                <h4 class="card-title mb-0 flex-grow-1">Indhan</h4>
                <div class="flex-shrink-0">
                    <button type="button" class="btn btn-soft-info btn-sm shadow-none">
                        <i class="ri-file-list-3-line align-middle"></i> Generate Report
                    </button>
                </div>
            </div><!-- end card header -->

            <div class="card-body">
                <div id="IndivPlan">
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
                                    <th scope="col" style="width: 50px;">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="checkAll"
                                                value="option">
                                        </div>
                                    </th>
                                    <th class="sort" data-sort="id_indhan">ID KPI</th>
                                    <th class="sort" data-sort="bulan">Bulan</th>
                                    <th class="sort" data-sort="tahun">Tahun</th>
                                    <th class="sort" data-sort="realisasi">Realisasi</th>
                                    <th class="sort" data-sort="kendala">Kendala</th>
                                    <th class="sort" data-sort="timestamp">Tanggal Input</th>
                                    <th class="sort" data-sort="action">Action</th>
                                </tr>
                            </thead>
                            <tbody class="list form-check-all">
                                @foreach($indhanRealisasi as $indhanReal)

                                <tr>
                                    <th scope="row">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="chk_child"
                                                value="option1">
                                        </div>
                                    </th>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            @foreach($indhan as $indhans)
                                            @if($indhanReal->id_indhan == $indhans->id_indhan)
                                            <div class="flex-grow-1">{{ $indhans->program_strategis }}</div>
                                            @endif
                                            @endforeach
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="flex-grow-1">{{ $indhanReal->bulan }}</div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="flex-grow-1">{{ $indhanReal->tahun }}</div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="flex-grow-1">{{ $indhanReal->realisasi }}</div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="flex-grow-1">{{ $indhanReal->kendala }}</div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="flex-grow-1">{{ $indhanReal->created_at }}</div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex gap-2">
                                            <div class="edit">
                                                <button class="btn btn-sm btn-success edit-item-btn"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#showModal{{ $indhanReal->id_realisasi }}">Edit</button>
                                            </div>
                                            <div class="remove">

                                                <form
                                                    action="{{ route('KPI_IndhanRealisasi.destroy', $indhanReal->id_realisasi) }}"
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
                                <div class="modal fade" id="showModal{{ $indhanReal->id_realisasi }}" tabindex=" -1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header bg-light p-3">
                                                <h5 class="modal-title" id="exampleModalLabel"></h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close" id="close-modal"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form method="post"
                                                    action="{{ route('indhanReal.update', $indhanReal->id_realisasi) }}"
                                                    enctype="multipart/form-data" id="myForm">
                                                    @csrf
                                                    <div class="mb-3">
                                                        <label for="id_indhan">ID KPI</label>
                                                        <select name="id_indhan" class="form-control" id="id_indhan">
                                                            @foreach ($indhan as $indhans)
                                                            <option value="{{$indhans->id_indhan}}">
                                                                {{ "$indhans->program_strategis" }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="bulan">Bulan</label>
                                                        <input type="text" name="bulan" class="form-control" id="bulan"
                                                            value="{{$indhanReal->bulan}}">

                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="tahun">Tahun</label>
                                                        <input type="text" name="tahun" class="form-control" id="tahun"
                                                            value="{{$indhanReal->tahun}}">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="realisasi">Realisasi</label>
                                                        <input type="text" name="realisasi" class="form-control"
                                                            id="realisasi" value=" {{$indhanReal->realisasi}}">

                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="kendala">Kendala</label>
                                                        <input type="text" name="kendala" class="form-control"
                                                            id="kendala" value=" {{$indhanReal->kendala}}">

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
                <h5 class="modal-title" id="exampleModalLabel"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                    id="close-modal"></button>
            </div>
            <div class="modal-body">
                <form method="post" action="{{ route('KPI_IndhanRealisasi.store') }}" enctype="multipart/form-data"
                    id="myForm">
                    @csrf
                    <div class="mb-3">
                        <label for="id_indhan">ID KPI</label>
                        <select name="id_indhan" class="form-control" id="id_indhan">
                            @foreach ($indhan as $indhans)
                            <option value="{{$indhans->id_indhan}}">{{ "$indhans->program_strategis" }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="bulan">Bulan</label>
                        <input type="text" name="bulan" class="form-control" id="bulan">

                    </div>
                    <div class="mb-3">
                        <label for="tahun">Tahun</label>
                        <input type="text" name="tahun" class="form-control" id="tahun">

                    </div>
                    <div class="mb-3">
                        <label for="realisasi">Realisasi</label>
                        <input type="text" name="realisasi" class="form-control" id="realisasi">

                    </div>
                    <div class="mb-3">
                        <label for="kendala">Kendala</label>
                        <input type="text" name="kendala" class="form-control" id="kendala">

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