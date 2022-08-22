@extends('layouts.userLayout')

@section('content')
<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-header align-items-center d-flex">
                <h4 class="card-title mb-0 flex-grow-1">Overview KPI PMS</h4>
                <div class="flex-shrink-0">
                    <button type="button" class="btn btn-soft-info btn-sm shadow-none">
                        <i class="ri-file-list-3-line align-middle"></i> Generate Report
                    </button>
                </div>
            </div><!-- end card header -->

            <div class="card-body">
                <div id="IndivKPI">
                    <div class="card-body">
                        <div class="table-responsive table-card">
                            <table class="table table-borderless table-centered align-middle table-nowrap mb-0">
                                <thead class="text-muted table-light ">
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Inisiatif Strategis</th>
                                        <th scope="col">KPI PMS</th>
                                        <th scope="col">Polaritas</th>
                                        <th scope="col">Bobot</th>
                                        <th scope="col">Target</th>
                                        <th scope="col">Progress</th>
                                    </tr>

                                </thead>
                                <tbody>
                                    <?php
                                    $counter = 0;
                                    ?>
                                    @foreach($kpi as $kpi)
                                    <?php
                                    $counter++;
                                    ?>
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="flex-grow-1">{{ $counter }}</div>
                                            </div>
                                        </td>
                                        <td>
                                            @foreach($inisiatif as $init)
                                            @if($kpi->id_inisiatif == $init->id_inisiatif)
                                            <div class="d-flex align-items-center">
                                                <div class="flex-grow-1">{{ $init->inisiatif_desc }}</div>
                                            </div>
                                            @endif
                                            @endforeach
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
                                            @foreach ($plan as $pl)
                                            @if ($pl->id_kpipms == $kpi->id_kpipms)
                                            @foreach ($real as $rl)
                                            @if ($rl->id_plan == $pl->id_plan)
                                            <div class="d-flex align-items-center">
                                                <div class="flex-grow-1">{{$pl->bulan}} {{$pl->tahun}}, {{$rl->progress_real}}</div>
                                            </div>
                                            @endif
                                            @endforeach
                                            @else
                                            <div class="d-flex align-items-center">
                                                <div class="flex-grow-1">Belum ada Realisasi</div>
                                            </div>
                                            @endif
                                            @endforeach
                                        </td>
                                    </tr><!-- end tr -->
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

@endsection