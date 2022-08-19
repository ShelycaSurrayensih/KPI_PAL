@extends('layouts.userLayout')

@section('content')
<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-header align-items-center d-flex">
                <h4 class="card-title mb-0 flex-grow-1"> Plan {{$kpi->kpi_desc}}</h4>
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
                                        <th scope="col">Tahun</th>
                                        <th scope="col">Bulan</th>
                                        <th scope="col">Progress</th>
                                        <th scope="col">Deskripsi</th>
                                        <th scope="col">Action</th>
                                    </tr>

                                </thead>
                                <tbody>
                                    @foreach($plan as $plan)
                                    @if($plan->id_kpipms == $kpi->id_kpipms)
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="flex-grow-1">{{ $plan->tahun }}</div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="flex-grow-1">{{ $plan->bulan }}</div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="flex-grow-1">{{ $plan->progress_plan }}</div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="flex-grow-1">{{ $plan->desc_plan }}</div>
                                            </div>
                                        </td>

                                        <td>
                                            <div class="d-flex gap-2">
                                                <div class="edit">
                                                    <button class="btn btn-sm btn-success edit-item-btn" data-bs-toggle="modal" data-bs-target="#showModal{{ $plan->id_plan }}">Edit</button>
                                                </div>
                                                <div class="edit">
                                                    <a href="{{ route('realpms.index', $plan->id_plan) }}">
                                                        <button class="btn btn-sm btn-success edit-item-btn">Realisasi</button>
                                                    </a>
                                                </div>
                                                <div class="remove">

                                                    <form action="{{ route('planpms.destroy', $plan->id_plan) }}" method="POST">

                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-sm btn-danger remove-item-btn" data-bs-toggle="modal" data-bs-target="#deleteRecordModal">Delete</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </td>
                                    </tr><!-- end tr -->

                                    <!-- edit Modal -->
                                    <div class="modal fade" id="showModal{{ $plan->id_plan }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header bg-light p-3">
                                                    <h5 class="modal-title" id="exampleModalLabel"></h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="close-modal"></button>
                                                </div>

                                                <div class="modal-body">
                                                    <form method="post" action="{{ route('planpms.update', $plan->id_plan)}}" enctype="multipart/form-data" id="myForm">
                                                        @csrf
                                                        <div class="mb-3">
                                                            <label for="id_kpipms" class="form-label">ID Plan</label>
                                                            <input name="desc_kpidir" type="text" class="form-control" id="desc_kpidir" value="{{ $plan->id_plan }}" readonly>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="bulan">Bulan</label>
                                                            <select name="bulan" class="form-control" id="bulan">
                                                                <option>Januari</option>
                                                                <option>Februari</option>
                                                                <option>Maret</option>
                                                                <option>April</option>
                                                                <option>Mei</option>
                                                                <option>Juni</option>
                                                                <option>Juli</option>
                                                                <option>Agustus</option>
                                                                <option>September</option>
                                                                <option>Oktober</option>
                                                                <option>November</option>
                                                                <option>Desember</option>
                                                            </select>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="tahun">Tahun</label>
                                                            <select name="tahun" class="form-control" id="tahun">
                                                                <?php
                                                                $tg_awal = date('Y') - 0;
                                                                $tg_akhir = date('Y') + 2;
                                                                for ($i = $tg_akhir; $i >= $tg_awal; $i--) {
                                                                    echo "<option value='$i'";
                                                                    if (date('Y') == $i) {
                                                                        echo "selected";
                                                                    }
                                                                    echo ">$i</option>";
                                                                }
                                                                ?>
                                                            </select>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="progress_plan" class="form-label">Progress</label>
                                                            <input name="progress_plan" type="text" class="form-control" id="progress_plan" value="{{ $plan->progress_plan }}">
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="desc_plan" class="form-label">Deskripsi
                                                                Progress</label>
                                                            <input name="desc_plan" type="text" class="form-control" id="desc_plan" value="{{ $plan->desc_plan }}">
                                                        </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <div class="hstack gap-2 justify-content-end">
                                                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-success" id="edit-btn">Update Plan</button>
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
                <h5 class="modal-title" id="exampleModalLabel">Add Plan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="close-modal"></button>
            </div>

            <div class="modal-body">

                <form method="post" action="{{ route('planpms.store') }}" enctype="multipart/form-data" id="myForm">
                    @csrf
                    <div class="mb-3">
                        <label for="id_kpipms" class="form-label">KPI PMS</label>
                        <input name="id_kpipms" type="text" class="form-control" id="id_kpipms" value="{{$kpi->id_kpipms}}" readonly hidden>
                        <input name="" type="text" class="form-control" id="" value="{{$kpi->kpi_desc}}" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="bulan">Bulan</label>
                        <select name="bulan" class="form-control" id="bulan">
                            <option>Januari</option>
                            <option>Februari</option>
                            <option>Maret</option>
                            <option>April</option>
                            <option>Mei</option>
                            <option>Juni</option>
                            <option>Juli</option>
                            <option>Agustus</option>
                            <option>September</option>
                            <option>Oktober</option>
                            <option>November</option>
                            <option>Desember</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="tahun">Tahun</label>
                        <select name="tahun" class="form-control" id="tahun">
                            <?php
                            $tg_awal = date('Y') - 0;
                            $tg_akhir = date('Y') + 2;
                            for ($i = $tg_akhir; $i >= $tg_awal; $i--) {
                                echo "
                                <option value='$i'";
                                if (date('Y') == $i) {
                                    echo "selected";
                                }
                                echo ">$i</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="progress_plan" class="form-label">Progress Plan</label>
                        <input name="progress_plan" type="text" class="form-control" id="progress_plan" value="">
                    </div>
                    <div class="mb-3">
                        <label for="desc_plan" class="form-label">Deskripsi Plan</label>
                        <input name="desc_plan" type="text" class="form-control" id="desc_plan" value="">
                    </div>
            </div>
            <div class="modal-footer">
                <div class="hstack gap-2 justify-content-end">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success" id="add-btn">Add Plan</button>
                </div>
            </div>
            </form>
        </div>
    </div>
</div>


@endsection