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
                                        <th scope="col">Kategori KPI</th>
                                        <th scope="col">Bobot KPI</th>
                                        <th scope="col">Bobot Cascade</th>
                                        <th scope="col">D * E</th>
                                        <th scope="col">Target</th>
                                        <th scope="col">Lead Divisi</th>
                                        <th scope="col">Action</th>
                                    </tr>

                                </thead>
                                <tbody>
                                    @foreach($casKpi as $kpi)
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="flex-grow-1">{{ $kpi->cas_kpiName }}</div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                @foreach($casKat as $kat)
                                                @if($kat->id_kat == $kpi->id_kat)
                                                <div class="flex-grow-1">{{ $kat->desc_kat }}</div>
                                                @endif
                                                @endforeach
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="flex-grow-1">{{ $kpi->bobot_kpi }}</div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="flex-grow-1">{{ $kpi->bobot_cascade }}</div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="flex-grow-1">{{ $kpi->bkXbc }}</div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="flex-grow-1">{{ $kpi->target }}</div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="flex-grow-1">{{ $kpi->div_lead }}</div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex gap-2">
                                                <div class="edit">
                                                    <button class="btn btn-sm btn-success edit-item-btn" data-bs-toggle="modal" data-bs-target="#showModal{{$kpi->id}}">Edit</button>
                                                </div>
                                                <div class="details">
                                                    <a href="{{ route('cascadeProker.index', $kpi->id) }}">
                                                        <button type="button" class="btn btn-sm btn-success edit-item-btn">
                                                            Proker
                                                        </button>
                                                    </a>
                                                </div>
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
                                    <div class="modal fade" id="showModal{{$kpi->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header bg-light p-3">
                                                    <h5 class="modal-title" id="exampleModalLabel">Edit </h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="close-modal"></button>
                                                </div>

                                                <div class="modal-body">
                                                    <form method="post" action="{{route('cascadeKPI.update', $kpi->id)}}" enctype="multipart/form-data" id="myForm">
                                                        @csrf
                                                        <div class="mb-3">
                                                            <label for="cas_kpiName" class="form-label">Nama KPI</label>
                                                            <input name="cas_kpiName" type="text" class="form-control" id="cas_kpiName" value="{{$kpi->cas_kpiName}}">
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="id_kat" class="form-label">Kategori</label>
                                                            <select name="id_kat" class="form-control" id="id_inisiatif">
                                                                @foreach($casKat as $kat)
                                                                <option value="{{$kat->id_kat }}">{{ "$kat->desc_kat" }}
                                                                    @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="bobot_kpi" class="form-label">Bobot KPI</label>
                                                            <input name="bobot_kpi" type="text" class="form-control" id="bobot_kpi" value="{{$kpi->bobot_kpi}}">
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="bobot_cascade" class="form-label">Bobot Cascade</label>
                                                            <input name="bobot_cascade" type="text" class="form-control" id="bobot_cascade" value="{{$kpi->bobot_cascade}}">
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="target" class="form-label">Target</label>
                                                            <input name="target" type="text" class="form-control" id="target" value="{{$kpi->target}}">
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="div_lead" class="form-label">Lead Divisi</label>
                                                            <select name="div_lead" class="form-control" id="div_lead">
                                                                @foreach($divisi as $div)
                                                                <option value="{{$div->id_divisi }}">{{ "$div->div_name" }}
                                                                    @endforeach
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
                <form method="post" action="{{route('cascadeKPI.store')}}" enctype="multipart/form-data" id="myForm">
                    @csrf
                    <div class="mb-3">
                        <label for="cas_kpiName" class="form-label">Nama KPI</label>
                        <input name="cas_kpiName" type="text" class="form-control" id="inisiatif_desc">
                    </div>
                    <div class="mb-3">
                        <label for="id_kat" class="form-label">Kategori</label>
                        <select name="id_kat" class="form-control" id="id_inisiatif">
                            @foreach($casKat as $kat)
                            <option value="{{$kat->id_kat }}">{{ "$kat->desc_kat" }}
                                @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="bobot_kpi" class="form-label">Bobot KPI</label>
                        <input name="bobot_kpi" type="text" class="form-control" id="bobot_kpi">
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
                        <label for="div_lead" class="form-label">Lead Divisi</label>
                        <select name="div_lead" class="form-control" id="id_inisiatif">
                            @foreach($divisi as $div)
                            <option value="{{$div->id_divisi }}">{{ "$div->div_name" }}
                                @endforeach
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