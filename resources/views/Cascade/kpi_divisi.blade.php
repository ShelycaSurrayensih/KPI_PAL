@extends('layouts.userLayout')

@section('content')
<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-header align-items-center d-flex">
                <h4 class="card-title mb-0 flex-grow-1">Cascade KPI</h4>
            </div><!-- end card header -->

            <div class="card-body">
                <div id="IndivKPI">
                    <div class="row g-4 mb-3">
                        <div class="col-sm-auto">
                            <div>
                                <button type="button" class="btn btn-success edit-btn" data-bs-toggle="modal" id="create-btn" data-bs-target="#showModal"><i class="ri-add-line align-bottom me-1"></i>
                                    Add</button>
                                <button class="btn btn-soft-danger" onClick="deleteMultiple()"><i class="ri-delete-bin-2-line"></i></button>
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
                    <div class="card-body">
                        <div class="table-responsive table-card">
                            <table class="table table-borderless table-centered align-middle table-nowrap mb-0">
                                <thead class="text-muted table-light ">
                                    <tr>
                                        <th scope="col">Nama KPI</th>
                                        <th scope="col">Bobot Cascade</th>
                                        <th scope="col">KPI Divisi</th>
                                        <th scope="col">Target</th>
                                        <th scope="col">D * E</th>
                                        <th scope="col">Status Div</th>
                                        <th scope="col">Action</th>
                                    </tr>

                                </thead>
                                <tbody>
                                    @foreach($casKpiDiv as $kpiDiv)
                                    @if($kpiDiv->id_CasKpi == $casKpi->id)
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="flex-grow-1">{{ $casKpi->cas_kpiName }}</div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="flex-grow-1">{{ $kpiDiv->bobot_cascade }}</div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="flex-grow-1">{{ $kpiDiv->kpi_divisi }}</div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="flex-grow-1">{{ $kpiDiv->target }}</div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="flex-grow-1">{{ $kpiDiv->bkXbc }}</div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                @if($kpiDiv->status_div == 1)
                                                <div class="flex-grow-1">Lead KPI</div>
                                                @elseif($kpiDiv->status_div == 0)
                                                <div class="flex-grow-1">Contribute KPI</div>
                                                @else
                                                <div class="flex-grow-1">Incorrect Value</div>
                                                @endif
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex gap-2">
                                                <div class="edit">
                                                    <button class="btn btn-sm btn-success edit-item-btn" data-bs-toggle="modal" data-bs-target="#showModal{{$kpiDiv->id}}">Edit</button>
                                                </div>
                                                <div class="details">
                                                    <a href="{{ route('cascadeProker.index', $kpiDiv->id) }}">
                                                        <button type="button" class="btn btn-sm btn-success edit-item-btn">
                                                            Proker
                                                        </button>
                                                    </a>
                                                </div>
                                                <div class="d-flex gap-2">
                                                    <div class="remove">
                                                        <form action="" method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-sm btn-danger remove-item-btn" data-bs-toggle="modal" data-bs-target="#deleteRecordModal">Delete</button>
                                                        </form>
                                                    </div>
                                                </div>
                                        </td>
                                    </tr><!-- end tr -->

                                    <!-- edit Modal -->
                                    <div class="modal fade" id="showModal{{$kpiDiv->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header bg-light p-3">
                                                    <h5 class="modal-title" id="exampleModalLabel">Edit </h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="close-modal"></button>
                                                </div>

                                                <div class="modal-body">
                                                    <form method="post" action="{{route('casDiv.update', $kpiDiv->id)}}" enctype="multipart/form-data" id="myForm">
                                                        @csrf
                                                        <input name="id_CasKpi" type="text" class="form-control" id="id_CasKpi" value="{{$casKpi->id}}" hidden>
                                                        <input name="bobot_kpi" type="text" class="form-control" id="bobot_kpi" value="{{$casKpi->bobot_kpi}}" hidden>
                                                        <div class="mb-3">
                                                            <label for="kpi_divisi" class="form-label">Nama KPI Divisi</label>
                                                            <input name="kpi_divisi" type="text" class="form-control" id="kpi_divisi" value="{{$kpiDiv->kpi_divisi}}">
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="bobot_cascade" class="form-label">Bobot Cascade</label>
                                                            <input name="bobot_cascade" type="text" class="form-control" id="bobot_cascade" value="{{$kpiDiv->bobot_cascade}}">
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="target" class="form-label">Target</label>
                                                            <input name="target" type="text" class="form-control" id="target" value="{{$kpiDiv->target}}">
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="status_div" class="form-label">Status Divisi</label>
                                                            <select name="status_div" class="form-control" id="status_div">
                                                                <option value="1">Lead</option>
                                                                <option value="0">Contribute</option>
                                                            </select>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <div class="hstack gap-2 justify-content-end">
                                                                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                                                <button type="submit" class="btn btn-success" id="edit-btn">Update KPI Cascade</button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                    @endforeach
                                </tbody><!-- end tbody -->

                            </table><!-- end table -->
                        </div>
                    </div>
                </div> <!-- .card-->
            </div> <!-- .col-->
        </div> <!-- end row-->
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
                <h5 class="modal-title" id="exampleModalLabel">Add Cascade KPI</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="close-modal"></button>
            </div>

            <div class="modal-body">
                <form method="post" action="{{route('casDiv.store')}}" enctype="multipart/form-data" id="myForm">
                    @csrf
                    <input name="id_CasKpi" type="text" class="form-control" id="id_CasKpi" value="{{$casKpi->id}}" hidden>
                    <input name="bobot_kpi" type="text" class="form-control" id="bobot_kpi" value="{{$casKpi->bobot_kpi}}" hidden>
                    <div class="mb-3">
                        <label for="kpi_divisi" class="form-label">Nama KPI Divisi</label>
                        <input name="kpi_divisi" type="text" class="form-control" id="kpi_divisi">
                    </div>
                    <div class="mb-3">
                        <label for="bobot_cascade" class="form-label">Bobot Cascade</label>
                        <input name="bobot_cascade" type="text" class="form-control" id="bobot_cascade">
                    </div>
                    <div class="mb-3">
                        <label for="target" class="form-label">Target</label>
                        <input name="target" type="text" class="form-control" id="target">
                    </div>
                    <div class="mb-3">
                        <label for="status_div" class="form-label">Status Divisi</label>
                        <select name="status_div" class="form-control" id="status_div">
                            <option value="1">Lead</option>
                            <option value="0">Contribute</option>
                        </select>
                    </div>
            </div>
            <div class="modal-footer">
                <div class="hstack gap-2 justify-content-end">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success" id="add-btn">Add Cascade</button>
                </div>
            </div>
            </form>
        </div>
    </div>
</div>


@endsection