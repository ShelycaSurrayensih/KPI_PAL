@extends('layouts.userLayout')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header align-items-center d-flex">
                <h4 class="card-title mb-0 flex-grow-1">Tupoksi Proker</h4>
                <div class="flex-shrink-0">
                </div>
            </div><!-- end card header -->
            <div class="card-body">
                <div id="tupoksiDepartemen">
                    <div class="row g-4 mb-3">
                        <div class="col-sm-auto">
                            <div>
                            @if($users->status != 'administrator')
                                <button type="button" class="btn btn-success edit-btn" data-bs-toggle="modal"
                                    id="create-btn" data-bs-target="#showModal"><i
                                        class="ri-add-line align-bottom me-1"></i>
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

                    <div class="table-responsive table-card mt-3 mb-1">
                        <table class="table align-middle table-nowrap" id="timTable">
                            <thead class="table-light">
                                <tr>
                                    <th scope="col" style="width: 50px;">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="checkAll"
                                                value="option">
                                        </div>
                                    </th>
                                    <th >Departemen</th>
                                    <th >KPI</th>
                                    <th >Proker</th>
                                    <th>Target</th>
                                    <th>Progress</th>
                                    @if($users->status == 'administrator')
                                    <th>Created By</th>
                                    @endif
                                    <th class="sort" data-sort="action">Action</th>
                                </tr>
                            </thead>
                            <tbody class="list form-check-all">
                                
                            @foreach($tupoksiProker as $proker)
                                @foreach($tupoksiKPI as $kpi)
                                @if($proker->id_kpi == $kpi->id_kpi)
                                @if($proker->created_by == $users->id_divisi || $users->status == 'administrator')
                                <tr>
                                    <th scope="row">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="chk_child"
                                                value="option1">
                                        </div>
                                    </th>
                                    <td class="id" style="display:none;"><a href="javascript:void(0);"
                                            class="fw-medium link-primary">#VZ2101</a></td>
                                            @foreach($tupoksiDepartemen as $departemen)
                                            @if($kpi->id_departemen == $departemen->id_departemen)
                                                <td class="departemen">{{$departemen->departemen}}</td>
                                            @endif
                                            @endforeach
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="flex-grow-1">{{$kpi->kpi}}</div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="flex-grow-1">{{ $proker->proker }}</div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="flex-grow-1">{{ $proker->target }}</div>
                                        </div>
                                    </td>
                                    <td>
                                    <?php
                                            $number = 0;
                                            $show = 0;
                                            ?>
                                            @if($tupoksiRealisasiCount != 0)
                                            @foreach($tupoksiTw as $tw)
                                            @if($tw->id_proker == $proker->id_proker)
                                            @foreach($tupoksiRealisasi as $reals)
                                            @if($reals->id_tw == $tw->id_tw)
                                            <?php
                                            $number = $reals->progres;
                                            ?>
                                            @endif
                                            @endforeach
                                            @endif
                                            @endforeach
                                            @endif

                                            @if($number != 'Belum Terisi')
                                            <div class="progress">
                                                <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width:{{$number}}%">
                                                </div>
                                            </div>{{$number}}%
                                        
                                        @else
                                        <div class="progress">
                                                <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width:0%">
                                                </div>
                                            </div>0%
                                        @endif
                                        </td>
                                        @if($users->status == 'administrator')
                                        <td>
                                            <div class="d-flex align-items-center">
                                                @foreach($divisi as $div)
                                                @if($div->id_divisi == $proker->created_by)
                                                <div class="flex-grow-1">{{ $div->div_name }}</div>
                                                @endif
                                                @endforeach
                                            </div>
                                        </td>
                                        @endif
                                    <td>
                                        <div class="d-flex gap-2">
                                            <div class="edit">
                                                <button class="btn btn-sm btn-success edit-item-btn"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#showModal{{ $proker->id_proker }}">Edit</button>
                                            </div>
                                            <div class="edit">
                                                <a href="{{ route('tupoksiTw.index', $proker->id_proker) }}">
                                                    <button class="btn btn-sm btn-success edit-item-btn">Add Tw</button>
                                                </a>
                                            </div>
                                            <div class="remove">
                                                <form action="{{ route('tupoksiProker.destroy', $proker->id_proker) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger btn-icon waves-effect waves-light"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#deleteRecordModal"><i class="ri-delete-bin-5-line"></i></button>
                                                </form>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <!-- edit Modal -->
                                <div class="modal fade" id="showModal{{ $proker->id_proker }}" tabindex=" -1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header bg-light p-3">
                                                <h5 class="modal-title" id="exampleModalLabel">Edit</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close" id="close-modal"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form method="post"
                                                    action="{{ route('tupoksiProker.update', $proker->id_proker) }}"
                                                    enctype="multipart/form-data" id="myForm">
                                                    @csrf
                                                    <div class="mb-3">
                                                        <label for="kpi">KPI</label>
                                                        <select name="id_kpi" class="form-control" id="id_kpi">
                                                            @foreach ($tupoksiKPI as $kpi)
                                                            @if($kpi->created_by == $users->id_divisi)
                                                                <option value="{{$kpi->id_kpi}}">{{ "$kpi->kpi" }}</option>
                                                            @endif
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="kpi">Proker</label>
                                                        <input type="text" name="proker" class="form-control"
                                                            id="proker" value="{{$proker->proker}}"required>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="target">Target</label>
                                                        <input type="text" name="target" class="form-control"
                                                            id="target" value="{{$proker->target}}"required>
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
                            </tbody>
                            @endif
                            @endif
                            @endforeach
                            @endforeach
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
                <h5 class="modal-title" id="exampleModalLabel"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                    id="close-modal"></button>
            </div>
            <div class="modal-body">
                <form method="post" action="{{ route('KPI_TupoksiProker.store') }}" enctype="multipart/form-data"
                    id="myForm">
                    @csrf
                    <input type="text" name="created_by" class="form-control" id="created_by" value ="{{$users->id_divisi}}" readonly hidden>
                    <div class="mb-3">
                        <label for="id_kpi">KPI</label>
                        <select name="id_kpi" class="form-control" id="id_kpi">
                            @foreach ($tupoksiKPI as $kpi)
                            @if($kpi->created_by == $users->id_divisi)
                            @foreach($tupoksiDepartemen as $departemen)
                            @if($departemen->id_departemen == $kpi->id_departemen)
                            <option value="{{$kpi->id_kpi}}">Departemen {{$departemen->departemen}} - {{ "$kpi->kpi" }} </option>
                            @endif
                            @endforeach
                            @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="proker">Proker</label>
                        <input type="text" name="proker" class="form-control" id="proker"required>
                    </div>
                    <div class="mb-3">
                        <label for="target">Target</label>
                        <input type="text" name="target" class="form-control" id="target"required>
                    </div>
                    <div class="modal-footer">
                        <div class="hstack gap-2 justify-content-end">
                            <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-success" id="add-btn">Add Proker</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @endsection