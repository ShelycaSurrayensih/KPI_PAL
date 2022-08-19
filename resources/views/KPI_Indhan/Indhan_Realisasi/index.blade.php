@extends('layouts.userLayout')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header align-items-center d-flex">
                <h4 class="card-title mb-0 flex-grow-1">Indhan Realisasi {{$indhan->program_strategis}}</h4>
                <div class="flex-shrink-0">
                    <button type="button" class="btn btn-soft-info btn-sm shadow-none">
                        <i class="ri-file-list-3-line align-middle"></i> Generate Report
                    </button>
                </div>
            </div><!-- end card header -->

            <div class="card-body">
                <div id="IndivPlan">
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

                    <div class="table-responsive table-card mt-3 mb-1">
                        <table class="table align-middle table-nowrap" id="timTable">

                            <thead class="table-light">
                                <tr>

                                    <th class="sort" data-sort="no">No</th>
                                    <th class="sort" data-sort="id_indhan">ID KPI</th>
                                    <th class="sort" data-sort="bulan">Bulan</th>
                                    <th class="sort" data-sort="tahun">Tahun</th>
                                    <th class="sort" data-sort="realisasi">Realisasi</th>
                                    <th class="sort" data-sort="kendala">Kendala</th>
                                    <th class="sort" data-sort="timestamp">Tanggal Input</th>
                                    <th class="sort" data-sort="action">Action</th>
                                </tr>
                            </thead>
                            <tbody class="list form-check-all">
                                <?php $no = 0;?>
                                @foreach($indhanRealisasi as $indhanReal)
                                @if($indhanReal->id_indhan == $indhan->id_indhan)
                                <tr>
                                    <?php $no++ ;?>
                                    <td>{{ $no }}</td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="flex-grow-1">{{ $indhan->program_strategis }}</div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="flex-grow-1">{{ $indhanReal->bulan }}</div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="flex-grow-1">{{ $indhanReal->tahun }}</div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="flex-grow-1">{{ $indhanReal->realisasi }}</div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="flex-grow-1">{{ $indhanReal->kendala }}</div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="flex-grow-1">{{ $indhanReal->created_at }}</div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex gap-2">
                                            <div class="edit">
                                                <button class="btn btn-sm btn-success edit-item-btn"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#showModal{{ $indhanReal->id_realisasi }}">Edit</button>
                                            </div>
                                            <div class="remove">

                                                <form
                                                    action="{{ route('KPI_IndhanRealisasi.destroy', $indhanReal->id_realisasi) }}"
                                                    method="POST">

                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger remove-item-btn"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#deleteRecordModal">Delete</button>
                                                </form>
                                            </div>
                                        </div>
                                    </td>
                                </tr>

                                <!-- edit Modal -->
                                <div class="modal fade" id="showModal{{ $indhanReal->id_realisasi }}" tabindex=" -1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header bg-light p-3">
                                                <h5 class="modal-title" id="exampleModalLabel">Edit Data</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close" id="close-modal"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form method="post"
                                                    action="{{ route('indhanReal.update', $indhanReal->id_realisasi) }}"
                                                    enctype="multipart/form-data" id="myForm">
                                                    @csrf
                                                    <div class="mb-3">
                                                        <label for="id_indhan">ID KPI</label>
                                                        <input name="id_indhan" class="form-control" id="id_indhan"
                                                            value="{{$indhan->id_indhan}}" readonly="">

                                                        </input>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="bulan">Bulan</label>
                                                        <select name="bulan" class="form-control" id="bulan"
                                                            value="{{$indhanReal->bulan}}">
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
                                                        <input type="text" name="tahun" class="form-control" id="tahun"
                                                            value="{{$indhanReal->tahun}}">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="realisasi">Realisasi</label>
                                                        <input type="text" name="realisasi" class="form-control"
                                                            id="realisasi" value=" {{$indhanReal->realisasi}}">

                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="kendala">Kendala</label>
                                                        <input type="text" name="kendala" class="form-control"
                                                            id="kendala" value=" {{$indhanReal->kendala}}">

                                                    </div>

                                                    <div class=" modal-footer">
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
                                    @endif
                                    @endforeach
                            </tbody>
                        </table>
                        <div class="noresult" style="display: none">
                            <div class="text-center">
                                <lord-icon src="https://cdn.lordicon.com/msoeawqm.json" trigger="loop"
                                    colors="primary:#121331,secondary:#08a88a" style="width:75px;height:75px">
                                </lord-icon>
                                <h5 class="mt-2">Sorry! No Result Found</h5>
                                <p class="text-muted mb-0">We've searched more than 150+ Orders We did not find any
                                    orders for you search.</p>
                            </div>
                        </div>
                    </div>

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
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                    id="close-modal"></button>
            </div>
            <div class="modal-body">
                <form method="post" action="{{ route('KPI_IndhanRealisasi.store') }}" enctype="multipart/form-data"
                    id="myForm">
                    @csrf
                    <div class="mb-3">
                        <label for="id_indhan">ID KPI</label>
                        <input name="id_indhan" class="form-control" id="id_indhan" value="{{$indhan->id_indhan}}"
                            readonly="">
                        </input>
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
                            $tg_awal = date('Y')-0;
                            $tg_akhir = date('Y')+2;
                            for($i=$tg_akhir; $i>=$tg_awal; $i--)
                            {
                                echo"
                                <option value='$i'";
                                if(date('Y')==$i){echo "selected";}
                                    echo">$i</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="realisasi">Realisasi</label>
                        <input type="text" name="realisasi" class="form-control" id="realisasi">

                    </div>
                    <div class="mb-3">
                        <label for="kendala">Kendala</label>
                        <input type="text" name="kendala" class="form-control" id="kendala"
                            placeholder="Dapat diisi dengan kendala ketidaktercapaian">

                    </div>


                    <div class=" modal-footer">
                        <div class="hstack gap-2 justify-content-end">
                            <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-success" id="add-btn">Add data</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>



    @endsection