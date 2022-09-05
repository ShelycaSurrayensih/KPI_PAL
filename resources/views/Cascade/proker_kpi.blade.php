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
                                        <th scope="col">TW</th>
                                        <th scope="col">Progress</th>
                                        <th scope="col">Deskripsi</th>
                                    </tr>

                                </thead>
                                <tbody>
                                    @if($prokCount == 0)
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
                                            <div class="d-flex align-items-center">
                                                <div class="flex-grow-1">Belum Terisi</div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex gap-2">
                                                <div class="add">
                                                    <button class="btn btn-sm btn-success edit-item-btn" data-bs-toggle="modal" data-bs-target="#Modal{{$prok_count}}">Add Proker</button>
                                                </div>
                                            </div>
                                        </td>
                                        </tr>
                                        <!-- Add Modal -->
                                        <div class="modal fade" id="Modal{{$prok_count}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header bg-light p-3">
                                                        <h5 class="modal-title" id="exampleModalLabel">Add Cascade Proker</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="close-modal"></button>
                                                    </div>

                                                    <div class="modal-body">
                                                        <form method="post" action="{{route('cascadeProker.store')}}" enctype="multipart/form-data" id="myForm">
                                                            @csrf
                                                            <input name="id_CKpi" type="text" class="form-control" id="id_CKpi" value="{{$casKpi->id}}" readonly hidden>
                                                            <div class="mb-3">
                                                                <label for="tw" class="form-label">TW</label>
                                                                <input name="tw" type="text" class="form-control" id="cas_kpiName" value="{{$prok_count}}" readonly>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="progress" class="form-label">Progress</label>
                                                                <input name="progress" type="text" class="form-control" id="progress">
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="deskripsi" class="form-label">Deskripsi</label>
                                                                <input name="deskripsi" type="text" class="form-control" id="deskripsi">
                                                            </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <div class="hstack gap-2 justify-content-end">
                                                            <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-success" id="add-btn">Add Cascade Proker</button>
                                                        </div>
                                                    </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        @endfor
                                    @else
                                        @foreach($casProk as $prok)
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="flex-grow-1">{{ $prok->tw }}</div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="flex-grow-1">{{ $prok->progress }}</div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="flex-grow-1">{{ $prok->deskripsi }}</div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex gap-2">
                                                    <div class="add">
                                                        <button class="btn btn-sm btn-success edit-item-btn" data-bs-toggle="modal" data-bs-target="#showModal{{$prok->tw}}">Edit Proker</button>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <!-- edit Modal -->
                                        <div class="modal fade" id="showModal{{$prok->tw}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header bg-light p-3">
                                                        <h5 class="modal-title" id="exampleModalLabel">Edit Cascade Proker</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="close-modal"></button>
                                                    </div>

                                                    <div class="modal-body">
                                                        <form method="post" action="{{route('cascadeProker.store')}}" enctype="multipart/form-data" id="myForm">
                                                            @csrf
                                                            <input name="id_CKpi" type="text" class="form-control" id="id_CKpi" value="{{$casKpi->id}}" readonly hidden>
                                                            <div class="mb-3">
                                                                <label for="tw" class="form-label">TW</label>
                                                                <input name="tw" type="text" class="form-control" id="cas_kpiName" value="{{$prok->tw}}" readonly>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="progress" class="form-label">Progress</label>
                                                                <input name="progress" type="text" class="form-control" id="progress" value="{{$prok->progress}}">
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="deskripsi" class="form-label">Deskripsi</label>
                                                                <input name="deskripsi" type="text" class="form-control" id="deskripsi" value="{{$prok->deskripsi}}">
                                                            </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <div class="hstack gap-2 justify-content-end">
                                                            <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-success" id="add-btn">Edit Cascade Proker</button>
                                                        </div>
                                                    </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                            @endforeach
                                        @for($prok_count= 1 + $prokCount ; $prok_count <= 4 ; $prok_count++)<tr>
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
                                            <div class="d-flex align-items-center">
                                                <div class="flex-grow-1">Belum Terisi</div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex gap-2">
                                                <div class="add">
                                                    <button class="btn btn-sm btn-success edit-item-btn" data-bs-toggle="modal" data-bs-target="#Modal{{$prok_count}}">Add Proker</button>
                                                </div>
                                            </div>
                                        </td>
                                        </tr>
                                        <!-- Add Modal -->
                                        <div class="modal fade" id="Modal{{$prok_count}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header bg-light p-3">
                                                        <h5 class="modal-title" id="exampleModalLabel">Add Cascade Proker</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="close-modal"></button>
                                                    </div>

                                                    <div class="modal-body">
                                                        <form method="post" action="{{route('cascadeProker.store')}}" enctype="multipart/form-data" id="myForm">
                                                            @csrf
                                                            <input name="id_CKpi" type="text" class="form-control" id="id_CKpi" value="{{$casKpi->id}}" readonly hidden>
                                                            <div class="mb-3">
                                                                <label for="tw" class="form-label">TW</label>
                                                                <input name="tw" type="text" class="form-control" id="cas_kpiName" value="{{$prok_count}}" readonly>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="progress" class="form-label">Progress</label>
                                                                <input name="progress" type="text" class="form-control" id="progress">
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="deskripsi" class="form-label">Deskripsi</label>
                                                                <input name="deskripsi" type="text" class="form-control" id="deskripsi">
                                                            </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <div class="hstack gap-2 justify-content-end">
                                                            <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-success" id="add-btn">Add Cascade Proker</button>
                                                        </div>
                                                    </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        @endfor
                                        @endif
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


@endsection