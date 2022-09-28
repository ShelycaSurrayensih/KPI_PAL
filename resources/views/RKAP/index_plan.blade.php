@extends('layouts.userLayout')

@section('content')
<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-header align-items-center d-flex">
                <h4 class="card-title mb-0 flex-grow-1"> Plan {{$kpi->kpi_desc}}</h4>
            </div><!-- end card header -->
            <div class="card-header align-items-center d-flex">
                <h4 class="card-title mb-0 flex-grow-1"> Sub Kategori {{$kpi->sub_kat}}</h4>
            </div>
            @foreach($kategori as $kat)
            @if($kat->id_kat == $kpi->id_kat)
            <div class="card-header align-items-center d-flex">
                <h4 class="card-title mb-0 flex-grow-1"> Kategori {{$kat->kat_desc}}</h4>
            </div>
            @endif
            @endforeach
            @foreach($divisi as $div)
            @if($kpi->div_lead == $div->id_divisi)
            <div class="card-header align-items-center d-flex">
                <h4 class="card-title mb-0 flex-grow-1"> Lead {{$div->div_name}}</h4>
            </div>
            @endif
            @endforeach
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
                                        <th scope="col">Tahun</th>
                                        <th scope="col">Bulan</th>
                                        <th scope="col">Progress Plan</th>
                                        <th scope="col">Deskripsi Plan</th>
                                        <th scope="col">Progress Realisasi</th>
                                        <th scope="col">Deskripsi Realisasi</th>
                                        <th scope="col">Keterangan</th>
                                        <th scope="col">Komentar Admin</th>
                                        @if($users->status == 'administrator')
                                        <th scope="col">Created By</th>
                                        @endif
                                        <th scope="col">Action</th>
                                    </tr>

                                </thead>
                                <tbody>
                                    @foreach($plan as $plan)
                                    @if($plan->id_kpipms == $kpi->id_kpipms)
                                    <?php
                                    $counterPlan = $plan->id_plan;
                                    $counter = 0;
                                    $show = 0;
                                    ?>
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
                                        <?php
                                        $sReal = 0;
                                        ?>
                                        @if($realCount == 0)
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
                                            <div class="d-flex align-items-center">
                                                <div class="flex-grow-1">Belum Terisi</div>
                                            </div>
                                        </td>
                                        @else
                                        @foreach($real as $reals)
                                        @if($reals->id_plan == $plan->id_plan)
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="flex-grow-1">{{$reals->progress_real}}</div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="flex-grow-1">{{$reals->desc_real}}</div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="flex-grow-1">{{$reals->keterangan}}</div>
                                            </div>
                                        </td>
                                        @endif
                                        @endforeach
                                        @endif
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="flex-grow-1">{{ $plan->comment }}</div>
                                            </div>
                                        </td>
                                        @if($users->status == 'administrator')
                                        <td>
                                            <div class="d-flex align-items-center">
                                                @foreach($divisi as $div)
                                                @if($div->id_divisi == $plan->created_by)
                                                <div class="flex-grow-1">{{ $div->div_name }}</div>
                                                @endif
                                                @endforeach
                                            </div>
                                        </td>
                                        @endif
                                        <td>
                                            <div class="d-flex gap-2">
                                                <div class="edit">
                                                    <button class="btn btn-sm btn-success edit-item-btn" data-bs-toggle="modal" data-bs-target="#showModal{{ $plan->id_plan }}">Edit</button>
                                                </div>
                                                <div class="details">
                                                    <button type="button" class="btn btn-sm btn-success edit-item-btn" data-bs-toggle="modal" data-bs-target="#exampleModalgrid{{ $plan->id_plan }}">
                                                        Realisasi
                                                    </button>
                                                </div>
                                                <div class="remove">
                                                    <form action="{{ route('planpms.destroy', $plan->id_plan) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-sm btn-danger btn-icon waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#deleteRecordModal"><i class="ri-delete-bin-5-line"></i></button>
                                                    </form>
                                                </div>
                                                @foreach($real as $reals)
                                                @if($reals->id_plan == $plan->id_plan)
                                                <div class="view">
                                                    <a href="{{ route('viewFile', $reals->file_evidence) }}">
                                                        <button type="submit" class="btn btn-sm btn-outline-success btn-icon waves-effect waves-light shadow-none">
                                                            <i class="ri-mail-send-line"></i>
                                                        </button>
                                                    </a>
                                                </div>
                                                @endif
                                                @endforeach

                                                @if($users->status == 'administrator')
                                                <button class="btn btn-sm btn-success edit-item-btn" data-bs-toggle="modal" data-bs-target="#comment{{$plan->id_plan}}">Comment</button>
                                                @if($plan->comment != 'Belum ada Komentar')
                                                <a href="{{route('planpms.delComment', $plan->id_plan)}}">
                                                    <button class="btn btn-sm btn-danger edit-item-btn"> Delete
                                                        Comment</button>
                                                </a>
                                                @endif
                                                @endif
                                            </div>
                                        </td>
                                    </tr><!-- end tr -->
                                    <div class="modal fade" id="comment{{$plan->id_plan}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header bg-light p-3">
                                                    <h5 class="modal-title" id="exampleModalLabel">Edit Komentar</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="close-modal"></button>
                                                </div>

                                                <div class="modal-body">
                                                    <form method="post" action="{{route('planpms.update', $plan->id_plan)}}" enctype="multipart/form-data" id="myForm">
                                                        @csrf
                                                        <input name="bulan" type="text" class="form-control" id="bulan" value="{{$plan->bulan}}" readonly hidden>
                                                        <input name="tahun" type="text" class="form-control" id="tahun" value="{{$plan->tahun}}" readonly hidden>
                                                        <input name="progress_plan" type="text" class="form-control" id="progress_plan" value="{{$plan->progress_plan}}" readonly hidden>
                                                        <div class="mb-3">
                                                            <label for="comment" class="form-label">Komentar</label>
                                                            <input name="comment" type="text" class="form-control" id="comment" value="{{$plan->comment}} ">
                                                        </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <div class="hstack gap-2 justify-content-end">
                                                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-success" id="add-btn">Edit
                                                            Komentar</button>
                                                    </div>
                                                </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal fade" id="exampleModalgrid{{ $plan->id_plan }}" tabindex="-1" aria-labelledby="exampleModalgridLabel" aria-modal="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalgridLabel">Realisasi Plan
                                                        {{ $plan->desc_plan }}
                                                    </h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                @for($counterReal = 0; $counterReal < $counterPlan; $counterReal++) @if($realCount==0) <form method="post" action="{{ route('realpms.store') }}" enctype="multipart/form-data" id="myForm">
                                                    @csrf
                                                    <div class="modal-body">
                                                        <form action="javascript:void(0);">
                                                            <div class="row g-3">
                                                                <div class="col-xxl-6">
                                                                    <div>
                                                                        <label for="bulan">Bulan</label>
                                                                        <input name="" class="form-control" id="" value="{{$plan->bulan}}" readonly="">
                                                                        </input>
                                                                    </div>
                                                                </div>

                                                                <div class="col-xxl-6">
                                                                    <div>
                                                                        <label for="tahun">Tahun</label>
                                                                        <input type="text" name="" class="form-control" id="" value="{{$plan->tahun}}" readonly>
                                                                    </div>
                                                                </div>

                                                                <div class="col-xxl-6">
                                                                    <div>
                                                                        <label for="bobot">Progress Plan</label>
                                                                        <input name="" class="form-control" id="" value="{{$plan->progress_plan}}" readonly="">
                                                                        <input name="id_plan" type="text" class="form-control" id="id_plan" value="{{$plan->id_plan}}" readonly hidden>
                                                                        </input>
                                                                    </div>
                                                                </div>
                                                                <div>
                                                                    <h5 class="modal-title" id="exampleModalgridLabel">
                                                                        Realisasi</h5>
                                                                </div>

                                                                <!--end col-->
                                                                <div class="col-xxl-6">
                                                                    <div>
                                                                        <label for="progress_real">Progress
                                                                            Realisasi</label>
                                                                        <input type="text" name="progress_real" class="form-control" id="progress_real" value="">
                                                                    </div>
                                                                </div>

                                                                <div class="col-xxl-6">
                                                                    <div>
                                                                        <label for="desc_real">Deskripsi
                                                                            Realisasi</label>
                                                                        <input type="text" name="desc_real" class="form-control" id="desc_real" value="">
                                                                    </div>
                                                                </div>
                                                                <!--end col-->
                                                                <div class="mb-3">
                                                                    <div>
                                                                        <label for="keterangan">Keterangan</label>
                                                                        <textarea type="textarea" name="keterangan" class="form-control" id="keterangan" placeholder="Dapat diisi dengan kendala ketidaktercapaian"></textarea>
                                                                    </div>
                                                                </div>
                                                                <!--end col-->

                                                            </div>
                                                            <div class="col-xxl-6">
                                                                <div>
                                                                    <label for="file_evidence">File Evidence</label>
                                                                    <div class="fallback">
                                                                        <input type="file" name="file" multiple="multiple">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="hstack gap-2 justify-content-end">
                                                                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                                                <button type="submit" class="btn btn-success" id="edit-btn">Add </button>
                                                            </div>
                                                            <!--end row-->
                                                        </form>
                                                        @break
                                                        @elseif($counter == 0)
                                                        @foreach($real as $reals)
                                                        @if($reals->id_plan == $plan->id_plan)
                                                        <form method="post" action="{{ route('realpms.update', $reals->id_real) }}" enctype="multipart/form-data" id="myForm">
                                                            @csrf
                                                            <div class="row g-3">
                                                                <div class="col-xxl-6">
                                                                    <div>
                                                                        <label for="bulan">Bulan</label>
                                                                        <input name="" class="form-control" id="" value="{{$plan->bulan}}" readonly="">
                                                                        </input>
                                                                    </div>
                                                                </div>

                                                                <div class="col-xxl-6">
                                                                    <div>
                                                                        <label for="tahun">Tahun</label>
                                                                        <input type="text" name="" class="form-control" id="" value="{{$plan->tahun}}" readonly>
                                                                    </div>
                                                                </div>

                                                                <div class="col-xxl-6">
                                                                    <div>
                                                                        <label for="bobot">Progress Plan</label>
                                                                        <input name="" class="form-control" id="" value="{{$plan->progress_plan}}" readonly="">
                                                                        <input name="id_plan" type="text" class="form-control" id="id_plan" value="{{$plan->id_plan}}" readonly hidden>
                                                                        </input>
                                                                    </div>
                                                                </div>
                                                                <div>
                                                                    <h5 class="modal-title" id="exampleModalgridLabel">
                                                                        Realisasi</h5>
                                                                </div>

                                                                <!--end col-->
                                                                <div class="col-xxl-6">
                                                                    <div>
                                                                        <label for="progress_real">Progress
                                                                            Realisasi</label>
                                                                        <input type="text" name="progress_real" class="form-control" id="progress_real" value="{{$reals->progress_real}}">
                                                                    </div>
                                                                </div>

                                                                <div class="col-xxl-6">
                                                                    <div>
                                                                        <label for="desc_real">Deskripsi
                                                                            Realisasi</label>
                                                                        <input type="text" name="desc_real" class="form-control" id="desc_real" value="{{$reals->desc_real}}">
                                                                    </div>
                                                                </div>
                                                                <!--end col-->
                                                                <div class="mb-3">
                                                                    <div>
                                                                        <label for="keterangan">Keterangan</label>
                                                                        <textarea type="textarea" name="keterangan" class="form-control" id="keterangan" valuej="{{$reals->keterangan}}"></textarea>
                                                                    </div>
                                                                </div>
                                                                <!--end col-->

                                                            </div>
                                                            <div class="col-xxl-6">
                                                                <div>
                                                                    <label for="file_evidence">File Evidence</label>
                                                                    <div class="fallback">
                                                                        <input type="file" name="file" multiple="multiple">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="hstack gap-2 justify-content-end">
                                                                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                                                <button type="submit" class="btn btn-success" id="edit-btn">Update </button>
                                                            </div>
                                                    </div>
                                                    <!--end row-->
                                                    </form>
                                                    <?php
                                                    $counterReal = $counterPlan;
                                                    $show = 1;
                                                    ?>
                                                    @break
                                                    @elseif($show == 0 && ($counterReal +1) == $counterPlan)
                                                    <?php
                                                    $show = 1;
                                                    $counterReal = $counterPlan;
                                                    ?>
                                                    <form method="post" action="{{ route('realpms.store') }}" enctype="multipart/form-data" id="myForm">
                                                        @csrf
                                                        <div class="modal-body">
                                                            <form action="javascript:void(0);">
                                                                <div class="row g-3">
                                                                    <div class="col-xxl-6">
                                                                        <div>
                                                                            <label for="bulan">Bulan</label>
                                                                            <input name="" class="form-control" id="" value="{{$plan->bulan}}" readonly="">
                                                                            </input>
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-xxl-6">
                                                                        <div>
                                                                            <label for="tahun">Tahun</label>
                                                                            <input type="text" name="" class="form-control" id="" value="{{$plan->tahun}}" readonly>
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-xxl-6">
                                                                        <div>
                                                                            <label for="bobot">Progress Plan</label>
                                                                            <input name="" class="form-control" id="" value="{{$plan->progress_plan}}" readonly="">
                                                                            <input name="id_plan" type="text" class="form-control" id="id_plan" value="{{$plan->id_plan}}" readonly hidden>
                                                                            </input>
                                                                        </div>
                                                                    </div>
                                                                    <div>
                                                                        <h5 class="modal-title" id="exampleModalgridLabel">Realisasi</h5>
                                                                    </div>

                                                                    <!--end col-->
                                                                    <div class="col-xxl-6">
                                                                        <div>
                                                                            <label for="progress_real">Progress
                                                                                Realisasi</label>
                                                                            <input type="text" name="progress_real" class="form-control" id="progress_real" value="">
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-xxl-6">
                                                                        <div>
                                                                            <label for="desc_real">Deskripsi
                                                                                Realisasi</label>
                                                                            <input type="text" name="desc_real" class="form-control" id="desc_real" value="">
                                                                        </div>
                                                                    </div>
                                                                    <!--end col-->
                                                                    <div class="mb-3">
                                                                        <div>
                                                                            <label for="keterangan">Keterangan</label>
                                                                            <textarea type="textarea" name="keterangan" class="form-control" id="keterangan" placeholder="Dapat diisi dengan kendala ketidaktercapaian"></textarea>
                                                                        </div>
                                                                    </div>
                                                                    <!--end col-->

                                                                </div>
                                                                <div class="col-xxl-6">
                                                                    <div>
                                                                        <label for="file_evidence">File Evidence</label>
                                                                        <div class="fallback">
                                                                            <input type="file" name="file" multiple="multiple">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="hstack gap-2 justify-content-end">
                                                                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                                                    <button type="submit" class="btn btn-success" id="edit-btn">Add Realisasi</button>
                                                                </div>
                                                                <!--end row-->
                                                            </form>
                                                            @break
                                                            @endif
                                                            @endforeach
                                                            @endif
                                                            @endfor
                                                        </div>
                                            </div>
                                        </div>
                                    </div>
                        </div>
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
                                            <button type="submit" class="btn btn-success" id="edit-btn">Update
                                                Plan</button>
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
                    <input name="created_by" type="text" class="form-control" id="created_by" value="{{$users->id_divisi}}" readonly hidden>
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
                            for ($i = $tg_awal; $i <= $tg_akhir; $i++) {
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