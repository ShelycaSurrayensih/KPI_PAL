@extends('layouts.userLayout')

@section('content')
<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-header align-items-center d-flex">
                <h4 class="card-title mb-0 flex-grow-1">{{$plan->desc_plan}}</h4>
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
                                <button type="button" class="btn btn-success edit-btn" data-bs-toggle="modal" id="create-btn" data-bs-target="#showModal"><i class="ri-add-line align-bottom me-1"></i>
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



                    <div class="card-body">
                        <div class="table-responsive table-card">
                            <table class="table table-borderless table-centered align-middle table-nowrap mb-0">
                                <thead class="text-muted table-light ">
                                    <tr>
                                        <th class="sort" data-sort="progres_real">Progress</th>
                                        <th class="sort" data-sort="desc_real">Deskripsi</th>
                                        <th class="sort" data-sort="kendala">Kendala</th>
                                        <th class="sort" data-sort="file">File Evidence</th>
                                        <th class="sort" data-sort="action">Action</th>
                                    </tr>

                                </thead>
                                <tbody>
                                    @foreach($real as $real)
                                    @if($real->id_plan == $plan->id_plan)
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="flex-grow-1">{{ $real->progress_real }}</div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="flex-grow-1">{{ $real->desc_real }}</div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="flex-grow-1">{{ $real->keterangan }}</div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="flex-grow-1">{{ $real->file_evidence }}</div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex gap-2">
                                                <div class="edit">
                                                    <button class="btn btn-sm btn-success edit-item-btn" data-bs-toggle="modal" data-bs-target="#showModal{{ $real->id_real }}">Edit</button>
                                                </div>
                                                <div class="remove">
                                                    <button type="submit" class="btn btn-sm btn-danger remove-item-btn" data-bs-toggle="modal" data-bs-target="#deleteRecordModal">Delete</button>
                                                    @if($users->status == 'administrator')
                                                            <button class="btn btn-sm btn-success edit-item-btn" data-bs-toggle="modal" data-bs-target="#comment{{$prok->tw}}">Comment</button>
                                                            @endif
                                                </div>
                                            </div>
                                        </td>
                                    </tr><!-- end tr -->

                                    <!-- edit Modal -->
                                    <div class="modal fade" id="showModal{{ $real->id_real }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header bg-light p-3">
                                                    <h5 class="modal-title" id="exampleModalLabel">Realisasi {{$plan->progress_plan}}</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="close-modal"></button>
                                                </div>

                                                <div class="modal-body">
                                                    <form method="post" action="{{ route('realpms.update', $real->id_real)}}" enctype="multipart/form-data" id="myForm">
                                                        @csrf
                                                        <div class="mb-3">
                                                            <label for="id_plan" class="form-label">Plan</label>
                                                            <input name="id_plan" type="text" class="form-control" id="id_plan" value="{{$plan->id_plan}}" readonly hidden>
                                                            <input name="" type="text" class="form-control" id="" value="{{$plan->progress_plan}}" readonly>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="" class="form-label">Bulan</label>
                                                            <input name="" type="text" class="form-control" id="" value="{{$plan->bulan}}" readonly>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="" class="form-label">Tahun</label>
                                                            <input name="" type="text" class="form-control" id="" value="{{$plan->tahun}}" readonly>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="progress_real" class="form-label">Progress Realisasi</label>
                                                            <input name="progress_real" type="text" class="form-control" id="progress_real" value="{{ $real->progress_real }}">
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="desc_real" class="form-label">Deskripsi Realisasi</label>
                                                            <input name="desc_real" type="text" class="form-control" id="desc_real" value="{{ $real->desc_real }}">
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="keterangan" class="form-label">Keterangan</label>
                                                            <input name="keterangan" type="text" class="form-control" id="keterangan" value="{{ $real->keterangan }}" placeholder="Dapat diisi dengan kendala ketidaktercapaian">
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="file_evidence" class="form-label">File Evidance</label>
                                                            <input name="file_evidence" type="text" class="form-control" id="file_evidence" value="{{ $real->file_evidence }}">
                                                        </div>

                                                </div>
                                                <div class="modal-footer">
                                                    <div class="hstack gap-2 justify-content-end">
                                                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-success" id="edit-btn">Update Realisasi</button>
                                                    </div>
                                                </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Delete Modal -->
                                    <div class="modal fade zoomIn" id="deleteRecordModal" tabindex="-1" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="btn-close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="mt-2 text-center">
                                                        <lord-icon src="https://cdn.lordicon.com/gsqxdxog.json" trigger="loop" colors="primary:#f7b84b,secondary:#f06548" style="width:100px;height:100px"></lord-icon>
                                                        <div class="mt-4 pt-2 fs-15 mx-4 mx-sm-5">
                                                            <h4>Are you Sure ?</h4>
                                                            <p class="text-muted mx-4 mb-0">Are you Sure You want to
                                                                Remove this Record ?</p>
                                                        </div>
                                                    </div>

                                                    <form action="{{ route('realpms.destroy', $real->id_real) }}" method="POST">

                                                        @csrf
                                                        @method('DELETE')
                                                        <div class="d-flex gap-2 justify-content-center mt-4 mb-2">
                                                            <button type="button" class="btn w-sm btn-light" data-bs-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn w-sm btn-danger " id="delete-record">Yes, Delete It!</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--end modal -->
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
                <h5 class="modal-title" id="exampleModalLabel">Realisasi {{$plan->progress_plan}}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="close-modal"></button>
            </div>

            <div class="modal-body">
                <form method="post" action="{{ route('realpms.store') }}" enctype="multipart/form-data" id="myForm">
                    @csrf
                    <div class="mb-3">
                        <label for="id_plan" class="form-label">Plan</label>
                        <input name="id_plan" type="text" class="form-control" id="id_plan" value="{{$plan->id_plan}}" readonly hidden>
                        <input name="" type="text" class="form-control" id="" value="{{$plan->progress_plan}}" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Bulan</label>
                        <input name="" type="text" class="form-control" id="" value="{{$plan->bulan}}" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Tahun</label>
                        <input name="" type="text" class="form-control" id="" value="{{$plan->tahun}}" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="progress_real" class="form-label">Progress Realisasi</label>
                        <input name="progress_real" type="text" class="form-control" id="progress_real" value="">
                    </div>
                    <div class="mb-3">
                        <label for="desc_real" class="form-label">Deskripsi Realisasi</label>
                        <input name="desc_real" type="text" class="form-control" id="desc_real" value="">
                    </div>
                    <div class="mb-3">
                        <label for="keterangan" class="form-label">Keterangan</label>
                        <input name="keterangan" type="text" class="form-control" id="keterangan" value="" placeholder="Dapat diisi dengan kendala ketidaktercapaian">
                    </div>
                    <div class="mb-3">
                        <label for="file_evidence" class="form-label">File</label>
                        <input name="file_evidence" type="text" class="form-control" id="file_evidence" value="">
                    </div>
            </div>
            <div class="modal-footer">
                <div class="hstack gap-2 justify-content-end">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success" id="add-btn">Add Realisasi</button>
                </div>
            </div>
            </form>
        </div>
    </div>
</div>


@endsection