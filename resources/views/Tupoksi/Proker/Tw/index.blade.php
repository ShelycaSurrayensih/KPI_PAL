@extends('layouts.userLayout')

@section('content')
<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-header align-items-center d-flex">
                <h4 class="card-title mb-0 flex-grow-1">Tupoksi Proker</h4>
            </div><!-- end card header -->
            <div class="card-body">
                <div id="tupoksiDepartemen">
                    <div class="row g-4 mb-3">
                        <div class="col-sm-auto">
                        </div>
                        <div class="card-body">
                            <div class="table-responsive table-card">
                                <table class="table table-borderless table-centered align-middle table-nowrap mb-0">
                                    <thead class="text-muted table-light ">
                                        <tr>
                                            <th class="sort" data-sort="tw">TW</th>
                                            <th class="sort" data-sort="deskripsi">Deskripsi Proker</th>
                                            <th class="sort" data-sort="progres">Progres Proker</th>
                                            <th class="sort" data-sort="deskripsi">Deskripsi Realisasi</th>
                                            <th class="sort" data-sort="progres">Progress Realisasi</th>
                                            <th class="sort" data-sort="progres">Keterangan Realisasi</th>
                                            <th class="sort" data-sort="progres">Komentar</th>
                                            <th class="sort" data-sort="action">Action</th>
                                        </tr>

                                    </thead>
                                    <tbody>
                                        @if($twCount == 0)
                                        @for($prok_count=1 ; $prok_count <= 4 ; $prok_count++) <tr>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="flex-grow-1">{{ $prok_count }}</div>
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
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="flex-grow-1">Belum Terisi</div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex gap-2">
                                                    <div class="add">
                                                        <button class="btn btn-sm btn-success edit-item-btn" data-bs-toggle="modal" data-bs-target="#Modal{{$prok_count}}">Add
                                                            Tw</button>
                                                    </div>
                                                </div>
                                            </td>
                                            </tr>
                                            <!-- Add Modal -->
                                            <div class="modal fade" id="Modal{{$prok_count}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header bg-light p-3">
                                                            <h5 class="modal-title" id="exampleModalLabel">Add Tw</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="close-modal"></button>
                                                        </div>

                                                        <div class="modal-body">
                                                            <form method="post" action="{{route('KPI_TupoksiTw.store')}}" enctype="multipart/form-data" id="myForm">
                                                                @csrf
                                                                <input name="id_proker" type="text" class="form-control" id="id_proker" value="{{$tupoksiProker->id_proker }}" readonly hidden>
                                                                <div class="mb-3">
                                                                    <label for="tw" class="form-label">TW</label>
                                                                    <input name="tw" type="text" class="form-control" id="tw" value="{{$prok_count}}" readonly>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="deskripsi" class="form-label">Deskripsi
                                                                        Proker</label>
                                                                    <input name="deskripsi" type="text" class="form-control" id="deskripsi">
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="progres" class="form-label">Progres
                                                                        Proker</label>
                                                                    <input name="progres" type="text" class="form-control" id="progres">
                                                                </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <div class="hstack gap-2 justify-content-end">
                                                                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                                                <button type="submit" class="btn btn-success" id="add-btn">Add
                                                                    TW</button>
                                                            </div>
                                                        </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            @endfor
                                            @else

                                            @for($prok_count=1 ; $prok_count <= 4 ; $prok_count++) <?php
                                                                                                    $count = 1;
                                                                                                    ?> @foreach($tupoksiTw as $tw) @if($tw->id_proker == $tupoksiProker->id_proker)
                                                @if($prok_count==$tw->tw)
                                                <tr>
                                                    <td>
                                                        <div class="d-flex align-items-center">
                                                            <div class="flex-grow-1">{{ $tw->tw }}</div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="d-flex align-items-center">
                                                            <div class="flex-grow-1">{{ $tw->deskripsi }}</div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="d-flex align-items-center">
                                                            <div class="flex-grow-1">{{ $tw->progres }}</div>
                                                        </div>
                                                    </td>

                                                    @foreach($tupoksiRealisasi as $realisasi)
                                                    @if($tw->id_tw == $realisasi->id_tw)
                                                    <td>
                                                        <div class="d-flex align-items-center">
                                                            <div class="flex-grow-1">{{ $realisasi->deskripsi }}</div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="d-flex align-items-center">
                                                            <div class="flex-grow-1">{{ $realisasi->progres }}</div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="d-flex align-items-center">
                                                            <div class="flex-grow-1">{{ $realisasi->kendala }}</div>
                                                        </div>
                                                    </td>
                                                    @endif
                                                    @endforeach
                                                    <td>
                                                        <div class="d-flex align-items-center">
                                                            <div class="flex-grow-1">{{ $tw->comment }}</div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="d-flex gap-2">
                                                            <div class="add">

                                                                <button type="button" class="btn btn-sm btn-success edit-item-btn" data-bs-toggle="modal" data-bs-target="#tw{{$tw->id_tw}}">Edit</button>
                                                            </div>
                                                            <div class="edit">
                                                                <button type="button" class="btn btn-sm btn-success edit-item-btn data-bs-toggle=" data-bs-toggle="modal" id="create-btn" data-bs-target="#realisasi{{$tw->tw}}">Realisasi</button>
                                                            </div>
                                                            <?php 
                                                            $views = 0;
                                                            ?>
                                                            @foreach($tupoksiRealisasi as $reals)
                                                            @if($reals->id_CProk == $tw->id)
                                                            @if($reals->file_evidence != null && $views == 0)
                                                            <div class="add">
                                                                <a href="{{ route('viewFile.tupoksi', $reals->file_evidence) }}">
                                                                    <button type="submit" class="btn btn-sm btn-outline-success btn-icon waves-effect waves-light shadow-none">
                                                                        <i class="ri-mail-send-line"></i>
                                                                    </button>
                                                                </a>
                                                            </div>
                                                            <?php 
                                                            $views = 1;
                                                            ?>
                                                            @endif
                                                            @endif
                                                            @endforeach
                                                        </div>
                                                    </td>

                                                </tr>
                                                <!-- Edit Modal -->
                                                <div class="modal fade" id="tw{{$tw->id_tw}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered">
                                                        <div class="modal-content">
                                                            <div class="modal-header bg-light p-3">
                                                                <h5 class="modal-title" id="exampleModalLabel">Realisasi</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="close-modal"></button>
                                                            </div>

                                                            <div class="modal-body">
                                                                <form method="post" action="{{route('tupoksiTw.update', $tw->id_tw)}}" enctype="multipart/form-data" id="myForm">
                                                                    @csrf
                                                                    <input name="id_proker" type="text" class="form-control" id="id_proker" value="{{$tupoksiProker->id_proker }}" readonly hidden>
                                                                    <div class="mb-3">
                                                                        <label for="tw" class="form-label">TW</label>
                                                                        <input name="tw" type="text" class="form-control" id="cas_kpiName" value="{{$tw->tw}}" readonly>
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <label for="deskripsi" class="form-label">Deskripsi
                                                                            Proker</label>
                                                                        <input name="deskripsi" type="text" class="form-control" id="deskripsi" value="{{$tw->deskripsi}}">
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <label for="progres" class="form-label">Progres
                                                                            proker</label>
                                                                        <input name="progres" type="text" class="form-control" id="progres" value="{{$tw->progres}}">
                                                                    </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <div class="hstack gap-2 justify-content-end">
                                                                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                                                    <button type="submit" class="btn btn-success" id="add-btn">Realisasi</button>
                                                                </div>
                                                            </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>

                                                @foreach($tupoksiRealisasi as $real)
                                                @if($real->id_tw == $tw->id_tw)
                                                <!-- Edit modal content -->
                                                <div class="modal fade" id="realisasi{{$tw->tw}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered">
                                                        <div class="modal-content">
                                                            <div class="modal-header bg-light p-3">
                                                                <h5 class="modal-title" id="exampleModalLabel">Realisasi</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="close-modal"></button>
                                                            </div>

                                                            <div class="modal-body">
                                                                <form method="post" action="{{route('realisasi.update', $real->id_realisasi)}}" enctype="multipart/form-data" id="myForm">
                                                                    @csrf
                                                                    <input name="id_tw" type="text" class="form-control" id="id_tw" value="{{$tw->id_tw }}" readonly hidden>
                                                                    <div class="mb-3">
                                                                        <label for="deskripsi" class="form-label">Deskripsi Realisasi</label>
                                                                        <input name="deskripsi" type="text" class="form-control" id="deskripsi" value="{{$real->deskripsi}}">
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <label for="progres" class="form-label">Progres Proker</label>
                                                                        <input name="progres" type="text" class="form-control" id="progres" value="{{$real->progres}}">
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <label for="kendala">Kendala Realisasi</label>
                                                                        <input type="text" name="kendala" class="form-control" id="kendala">
                                                                    </div>
                                                                    <div>
                                                                        <label for="file_evidence">File Evidence</label>
                                                                        <div class="fallback">
                                                                            <input type="file" name="file" multiple="multiple">
                                                                        </div>
                                                                    </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <div class="hstack gap-2 justify-content-end">
                                                                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                                                    <button type="submit" class="btn btn-success" id="add-btn">Realisasi</button>
                                                                </div>
                                                            </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                                @endif
                                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>

                <?php
                $count++;
                ?>
                @endif
                @endif
                @endforeach
                @if($count == 1) <tr>
                    <td>
                        <div class="d-flex align-items-center">
                            <div class="flex-grow-1">{{ $prok_count }}</div>
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
                    <td>
                        <div class="d-flex align-items-center">
                            <div class="flex-grow-1">Belum Terisi</div>
                        </div>
                    </td>
                    <td>
                        <div class="d-flex gap-2">
                            <div class="add">
                                <button class="btn btn-sm btn-success edit-item-btn" data-bs-toggle="modal" data-bs-target="#Modal{{$prok_count}}">Add Tw</button>
                            </div>
                        </div>
                    </td>
                </tr>



                <!-- Add Modal -->
                <div class="modal fade" id="Modal{{$prok_count}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header bg-light p-3">
                                <h5 class="modal-title" id="exampleModalLabel">Add Tw</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="close-modal"></button>
                            </div>

                            <div class="modal-body">
                                <form method="post" action="{{route('KPI_TupoksiTw.store')}}" enctype="multipart/form-data" id="myForm">
                                    @csrf
                                    <input name="id_proker" type="text" class="form-control" id="id_proker" value="{{$tupoksiProker->id_proker }}" readonly hidden>
                                    <div class="mb-3">
                                        <label for="tw" class="form-label">TW</label>
                                        <input name="tw" type="text" class="form-control" id="tw" value="{{$prok_count}}" readonly>
                                    </div>
                                    <div class="mb-3">
                                        <label for="deskripsi" class="form-label">Deskripsi Proker</label>
                                        <input name="deskripsi" type="text" class="form-control" id="deskripsi">
                                    </div>
                                    <div class="mb-3">
                                        <label for="progres" class="form-label">Progres Proker</label>
                                        <input name="progres" type="text" class="form-control" id="progres">
                                    </div>

                            </div>
                            <div class="modal-footer">
                                <div class="hstack gap-2 justify-content-end">
                                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-success" id="add-btn">Add TW</button>
                                </div>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
                @endif
                <?php
                $count = 0;
                ?>
                @endfor
                @endif


                <!-- add Modal Realisasi -->
                <div class="modal fade" id="realisasi" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header bg-light p-3">
                                <h5 class="modal-title" id="exampleModalLabel"></h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="close-modal"></button>
                            </div>
                            <div class="modal-body">
                                <form method="post" action="{{ route('KPI_TupoksiRealisasi.store') }}" enctype="multipart/form-data" id="myForm">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="id_tw">Proker</label>
                                        <select name="id_tw" class="form-control" id="id_tw">
                                            @foreach ($tupoksiTw as $tw)
                                            <option value="{{$tw->id_tw}}">{{ "$tw->id_tw" }}</option>
                                            @endforeach
                                        </select>

                                    </div>

                                    <div class="mb-3">
                                        <label for="progres">Progres Realisasi</label>
                                        <input type="text" name="progres" class="form-control" id="progres">

                                    </div>
                                    <div class="mb-3">
                                        <label for="deskripsi">Deskripsi Realisasi</label>
                                        <input type="text" name="deskripsi" class="form-control" id="deskripsi">
                                    </div>
                                    <div class="mb-3">
                                        <label for="kendala">Keterangan Realisasi</label>
                                        <input type="text" name="kendala" class="form-control" id="kendala">
                                    </div>
                                    <div class="modal-footer">
                                        <div class="hstack gap-2 justify-content-end">
                                            <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-success" id="add-btn">Add
                                                Realisasi</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
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