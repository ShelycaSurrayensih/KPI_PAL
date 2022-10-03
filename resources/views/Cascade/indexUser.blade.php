@extends('layouts.userLayout')

@section('content')
<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-header align-items-center d-flex">
                <h4 class="card-title mb-0 flex-grow-1">KPI Divisi</h4>
            </div><!-- end card header -->

            <div class="card-body">
                <div id="IndivKPI">
                    <div class="row g-4 mb-3">
                        <div class="col-sm-auto">
                            <div>
                                @if($users->status != 'administrator')
                                <button type="button" class="btn btn-success edit-btn" data-bs-toggle="modal" id="create-btn" data-bs-target="#showModal"><i class="ri-add-line align-bottom me-1"></i>
                                    Add</button>
                                @endif
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
                                        <th scope="col">KPI</th>
                                        <th scope="col">Bobot KPI (A)</th>
                                        <th scope="col">Bobot Cascading (B)</th>
                                        <th scope="col">KPI Divisi</th>
                                        <th scope="col">Target</th>
                                        <th scope="col">A * B</th>
                                        <th scope="col">Progress</th>
                                        @if($users->status == 'administrator')
                                        <th scope="col">Created By</th>
                                        @endif
                                        <th scope="col">Status Divisi</th>
                                        <th scope="col">Action</th>
                                    </tr>

                                </thead>
                                <tbody>
                                    @foreach($casKpi as $kpi)
                                    @foreach($casKpiDiv as $kpiDiv)
                                    @if($kpiDiv->id_CasKpi == $kpi->id)
                                    @if($users->id_divisi == $kpiDiv->created_by)
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="flex-grow-1">{{ $kpi->cas_kpiName }}</div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="flex-grow-1">{{ $kpi->bobot_kpi }}</div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="flex-grow-1">{{ $kpiDiv->bobot_cascade }}%</div>
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
                                        <?php
                                            $value = 0;
                                            $tw = 0;
                                            ?>
                                            @foreach($casProk as $prok)
                                            @if($prok->id_CDiv == $kpiDiv->id)
                                            @foreach($casReal as $real)
                                            @if($real->id_CProk == $prok->id)
                                            @if($real->progress != "Belum Terisi")
                                            <?php
                                            $value += $real->progress / $prok->progress  * 25;
                                            $tw += 1;
                                            ?>
                                            @endif
                                            @endif
                                            @endforeach
                                            @endif
                                            @endforeach
                                            <?php
                                            $value = round($value);
                                            ?>
                                            <div class="progress">
                                                <div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar" aria-valuemin="0" aria-valuemax="100" style="width:{{$value}}%">
                                                </div>
                                            </div>
                                            <div>
                                                <div class="align-items-left">{{$value}}%</div>
                                                <div class="align-items-right">TW {{$tw}}</div>
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
                                        @if($users->status == 'administrator')
                                        <td>
                                            <div class="d-flex align-items-center">
                                                @foreach($divisi as $div)
                                                @if($div->id_divisi == $kpiDiv->created_by)
                                                <div class="flex-grow-1">{{ $div->div_name }}</div>
                                                @endif
                                                @endforeach
                                            </div>
                                        </td>
                                        @endif
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
                                                            <button type="submit" class="btn btn-sm btn-danger btn-icon waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#deleteRecordModal"><i class="ri-delete-bin-5-line"></i></button>
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
                                                        <input name="id_CasKpi" type="text" class="form-control" id="id_CasKpi" value="{{$kpi->id}}" hidden>
                                                        <input name="bobot_kpi" type="text" class="form-control" id="bobot_kpi" value="{{$kpi->bobot_kpi}}" hidden>
                                                        <div class="mb-3">
                                                            <label for="kpi_divisi" class="form-label">KPI Divisi</label>
                                                            <input name="kpi_divisi" type="text" class="form-control" id="kpi_divisi" value="{{$kpiDiv->kpi_divisi}}">
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="bobot_cascade" class="form-label">Bobot</label>
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
                                                                <button type="submit" class="btn btn-success" id="edit-btn">Update</button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                    @endif
                                    @endforeach
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
    </div>

    <!-- add Modal -->
    <div class="modal fade" id="showModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-light p-3">
                    <h5 class="modal-title" id="exampleModalLabel">Add</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="close-modal"></button>
                </div>

                <div class="modal-body">
                    <form method="post" action="{{route('casDiv.store')}}" enctype="multipart/form-data" id="myForm"> @csrf
                        <input name="created_by" type="text" class="form-control" id="created_by" value="{{$users->id_divisi}}" readonly hidden>
                        <div class="mb-3">
                            <label for="kategori" class="col-md-4 col-form-label text-md-right">{{ __('Kategori') }}</label>
                            <div class="col-md-6">
                                <select class="form-control" name="" id="kategori">
                                    <option>Choose Category</option>
                                    @foreach ($casKat as $kat)
                                    <option value="{{ $kat->id_kat }}">{{ $kat->desc_kat }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="kategori" class="col-md-4 col-form-label text-md-right">{{ __('KPI') }}</label>
                            <div class="form-group mt-2 mb-2 pd-2">
                                <select name="id_CasKpi" id="kpi" class="form-control">
                                    <option value="">Select Kategori</option>
                                </select>
                            </div>
                        </div>
                        <!-- <div class="form-group mt-2 mb-2 pd-2">
                        <select name="kpi_id" id="kpi" class="form-control">
                            <option value="">Select Kategori</option>    </select>
                    </div> -->
                        <div class="mb-3">
                            <label for="kpi_divisi" class="form-label">KPI Divisi</label>
                            <input name="kpi_divisi" type="text" class="form-control" id="kpi_divisi">
                        </div>
                            <div class="mb-3">
                                <label for="bobot_cascade" class="form-label">Bobot (%)</label>
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
                                <button type="submit" class="btn btn-success" id="add-btn">Add</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- JQuery -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#kategori').change(function() {
                let id = $(this).val();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                //call country on region selected
                $.ajax({
                    dataType: 'json',
                    url: "/Cascade/KPIDiv/KPI/" + id,
                    type: "GET",
                    success: function(data) {
                        console.log(data);
                        $('select[name="id_CasKpi"]').empty();
                        $.each(data, function(key, data) {
                            $('select[name="id_CasKpi"]').append('<option value="' + data.id + '">' + data.cas_kpiName + '</option>');
                        });
                    },
                    error: function(error) {
                        console.log(error);
                    }
                });
            });
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    @endsection