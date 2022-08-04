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
                <div id="DokumenList">
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
                                        <th scope="col">ID Direktorat</th>
                                        <th scope="col">ID Divisi</th>
                                        <th scope="col">Deskripsi KPI</th>
                                        <th scope="col">Satuan</th>
                                        <th scope="col">Target</th>
                                        <th scope="col">Bobot</th>
                                        <th scope="col">Keterangan</th>
                                        <th scope="col">Asal KPI</th>
                                        <th scope="col">Alasan</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($kpidir as $kpidir)
                                    @if($users->divisi_id == $kpidir->divisi)
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="flex-grow-1">{{ $kpidir->id_direktorat }}</div>
                                            </div>
                                        </td>
                                        <td>
                                        <div class="d-flex align-items-center">
                                                <div class="flex-grow-1">{{ $kpidir->id_divisi }}</div>
                                            </div>
                                        </td>
                                        <td>
                                        <div class="d-flex align-items-center">
                                                <div class="flex-grow-1">{{ $kpidir->desc_kpidir }}</div>
                                            </div>
                                        </td>
                                        <td>
                                        <div class="d-flex align-items-center">
                                                <div class="flex-grow-1">{{ $kpidir->satuan }}</div>
                                            </div>
                                        </td>
                                        <td>
                                        <div class="d-flex align-items-center">
                                                <div class="flex-grow-1">{{ $kpidir->target }}</div>
                                            </div>
                                        </td>
                                        <td>
                                        <div class="d-flex align-items-center">
                                                <div class="flex-grow-1">{{ $kpidir->ket }}</div>
                                            </div>
                                        </td>
                                        <td>
                                        <div class="d-flex align-items-center">
                                                <div class="flex-grow-1">{{ $kpidir->asal_kpi }}</div>
                                            </div>
                                        </td>
                                        <td>
                                        <div class="d-flex align-items-center">
                                                <div class="flex-grow-1">{{ $kpidir->alasan }}</div>
                                            </div>
                                        </td>
                                    </tr><!-- end tr -->
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

<div class="modal fade" id="n" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-light p-3">
                <h5 class="modal-title" id="exampleModalLabel"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                    id="close-modal"></button>
            </div>

            <div class="modal-body">
                <form method="POST" action="{{ route('KPI.store') }}" id="myForm" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="id_direktorat" class="form-label">Direktorat</label>
                        <select name="id_direktorat" class="form-control" id="id_direktorat">
                            @foreach ($direktorat as $dir)
                            <option value="{{$dir->id_direktorat}}">{{ "$dir->nama" }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="id_divisi" class="form-label">Divisi</label>
                        <input name="id_divisi" value = "{{$users->id_divisi}}" class="form-control" id="id_divisi" placeholder readonly="">
                    </div>
                    <div class="mb-3">
                        <label for="desc_kpi" class="form-label">KPI</label>
                        <input name="desc_kpi" type="text" class="form-control" id="desc_kpi">
                    </div>
                    <div class="mb-3">
                        <label for="satuan" class="form-label">Satuan</label>
                        <input name="satuan" type="text" class="form-control" id="satuan">
                    </div>
                    <div class="mb-3">
                        <label for="target" class="form-label">Target</label>
                        <input name="target" type="text" class="form-control" id="target">
                    </div>
                    <div class="mb-3">
                        <label for="bobot" class="form-label">Bobot</label>
                        <input name="bobot" type="text" class="form-control" id="bobot">
                    </div>
                    <div class="mb-3">
                        <label for="ket" class="form-label">Keterangan</label>
                        <input name="ket" type="text" class="form-control" id="ket">
                    </div>
                    <div class="mb-3">
                        <label for="asal_kpi" class="form-label">Asal KPI</label>
                        <input name="asal_kpi" type="text" class="form-control" id="asal_kpi">
                    </div>
                    <div class="mb-3">
                        <label for="alasan" class="form-label">Alasan</label>
                        <input name="alasan" type="text" class="form-control" id="alasan">
                    </div>

            </div>
            <div class="modal-footer">
                <div class="hstack gap-2 justify-content-end">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success" id="add-btn">Add Dokumen</button>
                    <button type="button" class="btn btn-success" id="edit-btn">Update</button>
                </div>
            </div>
            </form>
        </div>
    </div>
</div>

@endsection