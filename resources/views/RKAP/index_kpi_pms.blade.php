@extends('layouts.userLayout')

@section('content')
<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-header align-items-center d-flex">
                <h4 class="card-title mb-0 flex-grow-1">KPI PMS</h4>
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
                                @if($users->status != 'administrator')
                                <button type="button" class="btn btn-success edit-btn" data-bs-toggle="modal" id="create-btn" data-bs-target="#showModal"><i class="ri-add-line align-bottom me-1"></i>
                                    Add</button>

                            </div>
                            @endif
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
                                        <th scope="col">Kategori</th>
                                        <th scope="col">Sub Kategori</th>
                                        <th scope="col">Deskripsi</th>
                                        <th scope="col">Polaritas</th>
                                        <th scope="col">Bobot</th>
                                        <th scope="col">Target</th>
                                        <th scope="col">Lead Divisi</th>
                                        <th scope="col">Tahun</th>
                                        <th scope="col">Progress</th>
                                        <th scope="col">Updated</th>
                                        @if($users->status == 'administrator')
                                        <th scope="col">Created By</th>
                                        @endif
                                        <th scope="col">Action</th>
                                    </tr>

                                </thead>
                                <tbody>
                                    @foreach($kpi as $kpi)
                                    @if($kpi->created_by == $users->id_divisi)
                                    <tr>
                                        <td>
                                            @foreach($kategori as $kat)
                                            @if($kat->id_kat == $kpi->id_kat)
                                            <div class="d-flex align-items-center">
                                                <div class="flex-grow-1">{{ $kat->ket }}.{{ $kat->kat_desc }}</div>
                                            </div>
                                            @endif
                                            @endforeach
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="flex-grow-1">{{ $kpi->sub_kat }}</div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="flex-grow-1">{{ $kpi->kpi_desc }}</div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="flex-grow-1">{{ $kpi->polaritas }}</div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="flex-grow-1">{{ $kpi->bobot }}</div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="flex-grow-1">{{ $kpi->target }}</div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                @foreach($divisi as $div)
                                                @if($div->id_divisi == $kpi->div_lead)
                                                <div class="flex-grow-1">{{ $div->div_name }}</div>
                                                @endif
                                                @endforeach
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="flex-grow-1">{{ $kpi->tahun_kpipms }}</div>
                                            </div>
                                        </td>
                                        <td>
                                            <?php
                                            $number = 1;
                                            $show = 0;
                                            ?>
                                            @foreach($plan as $plans)
                                            @if($plans->id_kpipms == $kpi->id_kpipms)
                                            <?php
                                            
                                            $bulan = $plans->bulan;
                                            ?>
                                            @foreach($real as $reals)
                                            @if($reals->id_plan == $plans->id_plan)
                                            <?php
                                            $number = $reals->id_real;
                                            ?>
                                            @endif
                                            @endforeach
                                            @endif
                                            @endforeach

                                            @foreach($real as $reals)
                                            @if($reals->id_real == $number)
                                            <div class="progress">
                                                <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width:{{$reals->progress_real}}%">
                                                </div>
                                            </div>{{$bulan}} {{$reals->progress_real}}% 
                                        </td>
                                        <?php
                                        $show = 1;
                                        ?>
                                        @endif
                                        @endforeach
                                        
                                        @if($show == 0)
                                        <div class="progress">
                                                <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width:0%">
                                                </div>
                                            </div>0%
                                        </td>
                                        @endif
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="flex-grow-1">{{ $kpi->created_at }}</div>
                                            </div>
                                        </td>
                                        <?php
                                        $show = 0;
                                        ?>
                                        @if($users->status == 'administrator')
                                        <td>
                                            <div class="d-flex align-items-center">
                                                @foreach($divisi as $div)
                                                @if($div->id_divisi == $kpi->created_by)
                                                <div class="flex-grow-1">{{ $div->div_name }}</div>
                                                @elseif($kpi->created_by == 0 && $show == 0)
                                                <div class="flex-grow-1">Admin</div>
                                                <?php
                                                $show = 1;
                                                ?>
                                                @endif
                                                @endforeach
                                            </div>
                                        </td>
                                        @endif
                                        <td>
                                            <div class="d-flex gap-2">
                                                <div class="edit">
                                                    <button class="btn btn-sm btn-success edit-item-btn" data-bs-toggle="modal" data-bs-target="#showModal{{ $kpi->id_kpipms }}">Edit</button>
                                                </div>
                                                <div class="edit">
                                                    <a href="{{ route('planpms.index', $kpi->id_kpipms) }}">
                                                        <button class="btn btn-sm btn-success edit-item-btn">Details</button>
                                                    </a>
                                                </div>
                                                <div class="remove">
                                                    <form action="{{ route('kpi_pms.destroy', $kpi->id_kpipms) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-sm btn-danger btn-icon waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#deleteRecordModal"><i class="ri-delete-bin-5-line"></i></button>
                                                    </form>
                                                </div>

                                            </div>
                                        </td>
                                    </tr><!-- end tr -->

                                    <!-- edit Modal -->
                                    <div class="modal fade" id="showModal{{ $kpi->id_kpipms }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header bg-light p-3">
                                                    <h5 class="modal-title" id="exampleModalLabel">Edit {{ $kpi->kpi_desc }}</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="close-modal"></button>
                                                </div>

                                                <div class="modal-body">
                                                    <form method="post" action="{{ route('kpi_pms.update', $kpi->id_kpipms)}}" enctype="multipart/form-data" id="myForm">
                                                        @csrf
                                                        <div class="mb-3">
                                                            <label for="id_inisiatif" class="form-label">Inisiatif Strategis</label>
                                                            <select name="id_inisiatif" class="form-control" id="id_inisiatif">
                                                                @foreach($inisiatif as $inis)
                                                                <option value="{{$inis->id_inisiatif }}">{{ "$inis->inisiatif_desc" }}
                                                                    @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="id_kat" class="form-label">Kategori</label>
                                                            <select name="id_kat" class="form-control" id="id_kat">
                                                                @foreach($kategori as $kat)
                                                                <option value="{{$kat->id_kat}}">{{ "$kat->kat_desc" }}
                                                                    @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="sub_kat" class="form-label">Sub Kategori</label>
                                                            <input name="sub_kat" type="text" class="form-control" id="sub_kat" value="{{ $kpi->sub_kat }}">
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="kpi_desc" class="form-label">Deskripsi </label>
                                                            <input name="kpi_desc" type="text" class="form-control" id="kpi_desc" value="{{ $kpi->kpi_desc }}">
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="polaritas" class="form-label">Polaritas</label>
                                                            <input name="polaritas" type="text" class="form-control" id="polaritas" value="{{ $kpi->polaritas }}">
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="bobot" class="form-label">Bobot</label>
                                                            <input name="bobot" type="text" class="form-control" id="bobot" value="{{ $kpi->bobot }}">
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="target" class="form-label">Target</label>
                                                            <input name="target" type="text" class="form-control" id="target" value="{{ $kpi->target }}">
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="div_lead" class="form-label">Lead Divisi</label>
                                                            <input name="div_lead" type="text" class="form-control" id="div_lead" value="{{ $kpi->div_lead }}" readonly>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="tahun_kpipms" class="form-label">Tahun </label>
                                                            <input name="tahun_kpipms" type="text" class="form-control" id="tahun_kpipms" value="{{ $kpi->tahun_kpipms }}">
                                                        </div>

                                                </div>
                                                <div class="modal-footer">
                                                    <div class="hstack gap-2 justify-content-end">
                                                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-success" id="edit-btn">Update </button>
                                                    </div>
                                                </div>
                                                </form>
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
                <h5 class="modal-title" id="exampleModalLabel">Add </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="close-modal"></button>
            </div>

            <div class="modal-body">
                <form method="post" action="{{  route('kpi_pms.store')}}" enctype="multipart/form-data" id="myForm">
                    @csrf
                    <input name="created_by" type="text" class="form-control" id="created_by" value="{{$users->id_divisi}}" readonly hidden>
                    <div class="mb-3">
                        <label for="id_kat" class="form-label">Kategori</label>
                        <select name="id_kat" class="form-control" id="id_kat">
                            @foreach($kategori as $kat)
                            <option value="{{$kat->id_kat}}">{{ "$kat->kat_desc" }}
                                @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="id_kat" class="form-label">Inisiatif Strategis</label>
                        <select name="id_inisiatif" class="form-control" id="id_inisiatif">
                            @foreach($inisiatif as $inis)
                            <option value="{{$inis->id_inisiatif }}">{{ "$inis->inisiatif_desc" }}
                                @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="sub_kat" class="form-label">Sub Kategori</label>
                        <input name="sub_kat" type="text" class="form-control" id="sub_kat" value="">
                    </div>
                    <div class="mb-3">
                        <label for="kpi_desc" class="form-label">Deskripsi KPI</label>
                        <input name="kpi_desc" type="text" class="form-control" id="kpi_desc" value="">
                    </div>
                    <div class="mb-3">
                        <label for="polaritas" class="form-label">Polaritas</label>
                        <input name="polaritas" type="text" class="form-control" id="polaritas" value="">
                    </div>
                    <div class="mb-3">
                        <label for="bobot" class="form-label">Bobot</label>
                        <input name="bobot" type="text" class="form-control" id="bobot" value="">
                    </div>
                    <div class="mb-3">
                        <label for="desc_kpidir" class="form-label">Deskripsi</label>
                        <input name="desc_kpidir" type="text" class="form-control" id="desc_kpidir" value="">
                    </div>
                    <div class="mb-3">
                        <label for="target" class="form-label">Target</label>
                        <input name="target" type="text" class="form-control" id="target" value="">
                    </div>
                    <div class="mb-3">
                        <label for="div_lead" class="form-label">Lead Divisi</label>
                        @foreach($divisi as $div)
                        @if($users->id_divisi == $div->id_divisi)
                        <input name="div_lead" type="text" class="form-control" id="div_lead" value="{{ $kpi->div_lead }}" readonly hidden>
                        <input name="" type="text" class="form-control" id="" value="{{ $div->div_name }}" readonly>
                        @endif
                        @endforeach

                    </div>
                    <div class="mb-3">
                        <label for="tahun_kpippms" class="form-label">Tahun </label>
                        <input name="tahun_kpippms" type="text" class="form-control" id="tahun_kpippms" value="">
                    </div>
            </div>

            <div class="modal-footer">
                <div class="hstack gap-2 justify-content-end">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success" id="add-btn">Add </button>
                </div>
            </div>
            </form>
        </div>
    </div>
</div>


@endsection