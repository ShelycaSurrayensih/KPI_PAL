@extends('layouts.userLayout')

@section('content')
<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-header align-items-center d-flex">
                <h4 class="card-title mb-0 flex-grow-1">Individual KPI</h4>
                <div class="flex-shrink-0">
                    <button type="button" class="btn btn-soft-info btn-sm shadow-none">
                        <i class="ri-file-list-3-line align-middle"></i> Generate Report
                    </button>
                </div>
            </div><!-- end card header -->

            <div class="card-body">
                <div id="IndivKPI">
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



                    <div class="card-body">
                        <div class="table-responsive table-card">
                            <table class="table table-borderless table-centered align-middle table-nowrap mb-0">
                                <thead class="text-muted table-light ">
                                    <tr>
                                        <th scope="col">Inisiatif Deskripsi</th>
                                        <th scope="col">Tahun Inisiatif KPI</th>
                                        <th scope="col">Action</th>
                                    </tr>

                                </thead>
                                <tbody>
                                    @foreach($inisiatif as $init)
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="flex-grow-1">{{ $init->inisiatif_desc }}</div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="flex-grow-1">{{ $init->tahun_inisiatif }}</div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex gap-2">
                                                <div class="edit">
                                                    <button class="btn btn-sm btn-success edit-item-btn"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#showModal{{ $init->id_inisiatif }}">Edit</button>
                                                </div>
                                                <div class="remove">

                                                    <form action="{{ route('inisiatifStrategis.destroy', $init->id_inisiatif) }}" method="POST">

                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit"
                                                            class="btn btn-sm btn-danger remove-item-btn"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#deleteRecordModal">Delete</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </td>
                                    </tr><!-- end tr -->

                                    <!-- edit Modal -->
                                    <div class="modal fade" id="showModal{{ $init->id_inisiatif }}" tabindex="-1"
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
                                                        action="{{ route('inisiatifStrategis.update', $init->id_inisiatif) }}"
                                                        enctype="multipart/form-data" id="myForm">
                                                        @csrf
                                                        <div class="mb-3">
                                                            <label for="id_inisiatif" class="form-label">ID_inisiatif</label>
                                                            <input name="id_inisiatif" value="{{$init->id_inisiatif}}"
                                                                class="form-control" id="id_inisiatif" placeholder
                                                                readonly="">
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="inisiatif_desc" class="form-label">Divisi</label>
                                                            <input name="inisiatif_desc" value="{{$init->inisiatif_desc}}"
                                                                class="form-control" id="inisiatif_desc" placeholder
                                                                readonly="">
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="tahun_inisiatif" class="form-label">KPI</label>
                                                            <input name="tahun_inisiatif" type="text" class="form-control"
                                                                id="tahun_inisiatif" value="{{$init->tahun_inisiatif}}">
                                                        </div>

                                                </div>
                                                <div class="modal-footer">
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
                <h5 class="modal-title" id="exampleModalLabel"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                    id="close-modal"></button>
            </div>

            <div class="modal-body">
                <form method="post" action="{{  route('planpms.store')  }}" enctype="multipart/form-data" id="myForm">
                    @csrf
                    <div class="mb-3">
                        <label for="inisiatif_desc" class="form-label">Deskripsi Inisiatif</label>
                        <input name="inisiatif_desc" type="text" class="form-control" id="inisiatif_desc">
                    </div>
                    <div class="mb-3">
                        <label for="tahun_inisiatif" class="form-label">Tahun Inisiatif</label>
                        <input name="tahun_inisiatif" type="text" class="form-control" id="tahun_inisiatif">
                    </div>
            </div>
            <div class="modal-footer">
                <div class="hstack gap-2 justify-content-end">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success" id="add-btn">Add</button>
                </div>
            </div>
            </form>
        </div>
    </div>
</div>


@endsection