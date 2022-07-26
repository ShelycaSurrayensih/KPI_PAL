@extends('layouts.userLayout')

@section('content')
<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-header align-items-center d-flex">
                <h4 class="card-title mb-0 flex-grow-1">Proker</h4>
            </div><!-- end card header -->
            <div class="card-body">
                <div id="IndivKPI">
                    <div class="row g-4 mb-3">
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
                                        <th scope="col">TW</th>
                                        <th scope="col">Progres</th>
                                        <th scope="col">Deskripsi</th>
                                        <th scope="col">Progres Realisasi</th>
                                        <th scope="col">Deskripsi Realisasi</th>
                                        <th scope="col">Keterangan Realisasi</th>
                                        <th scope="col">Komentar</th>
                                        @if($users->status == 'administrator')
                                        <th scope="col">Created By</th>
                                        @endif
                                        <th scope="col">Action</th>
                                    </tr>

                                </thead>
                                <tbody>
                                    @if($prokCount == 0)
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
                                        @if($users->status == 'administrator')
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="flex-grow-1">Belum Terisi</div>
                                            </div>
                                        </td>
                                        @endif
                                        <td>
                                            <div class="d-flex gap-2">
                                                <div class="add">
                                                    <button class="btn btn-sm btn-success edit-item-btn" data-bs-toggle="modal" data-bs-target="#Modal{{$prok_count}}">Add Proker</button>
                                                </div>
                                            </div>
                                        </td>
                                        </tr>
                                        <!-- Add Modal -->
                                        <div class="modal fade" id="Modal{{$prok_count}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header bg-light p-3">
                                                        <h5 class="modal-title" id="exampleModalLabel">Add </h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="close-modal"></button>
                                                    </div>

                                                    <div class="modal-body">
                                                        <form method="post" action="{{route('cascadeProker.store')}}" enctype="multipart/form-data" id="myForm">
                                                            @csrf
                                                            <input name="created_by" type="text" class="form-control" id="created_by" value="{{$users->id_divisi}}" readonly hidden>
                                                            <input name="id_CDiv" type="text" class="form-control" id="id_CDiv" value="{{$casKpiDiv->id}}" readonly hidden>
                                                            <div class="mb-3">
                                                                <label for="tw" class="form-label">TW</label>
                                                                <input name="tw" type="text" class="form-control" id="cas_kpiName" value="{{$prok_count}}" readonly>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="progress" class="form-label">Progress</label>
                                                                <input name="progress" type="text" class="form-control" id="progress" value="{{$casKpiDiv->bkXbc / 4}}" readonly>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="deskripsi" class="form-label">Deskripsi</label>
                                                                <input name="deskripsi" type="text" class="form-control" id="deskripsi"required>
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
                                        @endfor
                                        @else

                                        @for($prok_count=1 ; $prok_count <= 4 ; $prok_count++) <?php
                                                                                                $count = 1;
                                                                                                ?> @foreach($casProk as $prok) @if($prok->id_CDiv == $casKpiDiv->id)
                                            @if($prok_count==$prok->tw)
                                            <tr>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <div class="flex-grow-1">{{ $prok->tw }}</div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <div class="flex-grow-1">{{ $prok->progress }}</div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <div class="flex-grow-1">{{ $prok->deskripsi }}</div>
                                                    </div>
                                                </td>

                                                @foreach($casReal as $realisasi)
                                                @if($prok->id == $realisasi->id_CProk)
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <div class="flex-grow-1">{{ $realisasi->progress  }}</div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <div class="flex-grow-1">{{ $realisasi->deskripsi }}</div>
                                                    </div>
                                                </td>
                                                
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <div class="flex-grow-1">{{ $realisasi->keterangan }}</div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <div class="flex-grow-1">{{ $prok->comment }}</div>
                                                    </div>
                                                </td>
                                                @endif
                                                @endforeach

                                                @if($users->status == 'administrator')
                                                @foreach($divisi as $div)
                                                @if($div->id_divisi == $prok->created_by)
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <div class="flex-grow-1">{{ $div->div_name }}</div>
                                                    </div>
                                                </td>
                                                @endif
                                                @endforeach
                                                @endif
                                                <td>
                                                    <div class="d-flex gap-2">
                                                        <div class="add">
                                                            <button class="btn btn-sm btn-success edit-item-btn" data-bs-toggle="modal" data-bs-target="#showModal{{$prok->tw}}">Edit Proker</button>
                                                            <button type="button" class="btn btn-sm btn-success edit-item-btn" data-bs-toggle="modal" data-bs-target="#exampleModalgrid{{ $prok->id }}">
                                                                Realisasi
                                                            </button>
                                                            @if($users->status == 'administrator')
                                                            <button class="btn btn-sm btn-success edit-item-btn" data-bs-toggle="modal" data-bs-target="#comment{{$prok->tw}}">Comment</button>
                                                            @if($prok->comment != 'Belum ada Komentar')
                                                            <a href="{{route('cascade.delComment', $prok->id)}}">
                                                                <button class="btn btn-sm btn-danger edit-item-btn"> Delete Comment</button>
                                                            </a>
                                                            @endif
                                                            @endif
                                                            @foreach($casReal as $reals)
                                                            @if($reals->id_CProk == $prok->id)
                                                            @if($reals->file_evidence != null)
                                                                <a href="{{ route('viewFile.cascade', $reals->file_evidence) }}">
                                                                    <button type="submit" class="btn btn-sm btn-outline-success btn-icon waves-effect waves-light shadow-none">
                                                                        <i class="ri-mail-send-line"></i>
                                                                    </button>
                                                                </a>
                                                            @endif
                                                            @endif
                                                            @endforeach

                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <!-- edit Modal -->
                                            <div class="modal fade" id="showModal{{$prok->tw}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header bg-light p-3">
                                                            <h5 class="modal-title" id="exampleModalLabel">Edit </h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="close-modal"></button>
                                                        </div>

                                                        <div class="modal-body">
                                                            <form method="post" action="{{route('cascadeProker.update', $prok->id)}}" enctype="multipart/form-data" id="myForm">
                                                                @csrf
                                                                <input name="id_CDiv" type="text" class="form-control" id="id_CDiv" value="{{$casKpiDiv->id}}" readonly hidden>
                                                                <div class="mb-3">
                                                                    <label for="tw" class="form-label">TW</label>
                                                                    <input name="tw" type="text" class="form-control" id="cas_kpiName" value="{{$prok->tw}}" readonly>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="progress" class="form-label">Progress (Dalam %)</label>
                                                                    <input name="progress" type="text" class="form-control" id="progress" value="{{$prok->progress}}"required>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="deskripsi" class="form-label">Deskripsi</label>
                                                                    <input name="deskripsi" type="text" class="form-control" id="deskripsi" value="{{$prok->deskripsi}}"required>
                                                                </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <div class="hstack gap-2 justify-content-end">
                                                                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                                                <button type="submit" class="btn btn-success" id="add-btn">Update </button>
                                                            </div>
                                                        </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Comment Modal -->
                                            <div class="modal fade" id="comment{{$prok->tw}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header bg-light p-3">
                                                            <h5 class="modal-title" id="exampleModalLabel">Edit </h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="close-modal"></button>
                                                        </div>

                                                        <div class="modal-body">
                                                            <form method="post" action="{{route('cascadeProker.update', $prok->id)}}" enctype="multipart/form-data" id="myForm">
                                                                @csrf
                                                                <div class="mb-3">
                                                                    <label for="comment" class="form-label">Comment</label>
                                                                    <input name="comment" type="text" class="form-control" id="comment" value="{{$prok->comment}} ">
                                                                </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <div class="hstack gap-2 justify-content-end">
                                                                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                                                <button type="submit" class="btn btn-success" id="add-btn">Edit Komentar </button>
                                                            </div>
                                                        </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            @foreach($casReal as $real)
                                            @if($real->id_CProk == $prok->id)
                                            <!-- edit Modal -->
                                            <div class="modal fade" id="exampleModalgrid{{ $prok->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header bg-light p-3">
                                                            <h5 class="modal-title" id="exampleModalLabel"></h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="close-modal"></button>
                                                        </div>

                                                        <div class="modal-body">
                                                            <form method="post" action="{{ route('cascadeRealis.update', $prok->id)}}" enctype="multipart/form-data" id="myForm">
                                                                @csrf
                                                                <input name="id_CProk" type="text" class="form-control" id="id_CProk" value="{{$prok->id}}" readonly hidden>
                                                                <input name="created_by" type="text" class="form-control" id="created_by" value="{{$users->id_divisi}}" readonly hidden>
                                                                <div class="mb-3">
                                                                    <label for="" class="form-label">TW</label>
                                                                    <input name="" type="text" class="form-control" id="" value="{{$prok->tw}}" readonly>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="progress" class="form-label">Progres (Dalam %)</label>
                                                                    <input name="progress" type="text" class="form-control" id="progress" value="{{ $prok->progress }}"required>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="deskripsi" class="form-label">Deskripsi Progres</label>
                                                                    <input name="deskripsi" type="text" class="form-control" id="deskripsi" value="{{ $real->deskripsi }}"required>
                                                                </div>

                                                                <div class="mb-3">
                                                                    <label for="keterangan" class="form-label">Keterangan</label>
                                                                    <textarea name="keterangan" type="text" class="form-control" id="keterangan" value="{{ $real->keterangan }}"required>{{ $real->keterangan }}</textarea>
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
                                                                <button type="submit" class="btn btn-success" id="edit-btn">Update</button>

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
                </td>
                <td>
                    <div class="d-flex align-items-center">
                        <div class="flex-grow-1">Belum Terisi</div>
                </td>
                <td>
                    <div class="d-flex align-items-center">
                        <div class="flex-grow-1">Belum Terisi</div>
                </td>
                @if($users->status == 'administrator')
                <td>
                    <div class="d-flex align-items-center">
                        <div class="flex-grow-1">Belum Terisi</div>
                    </div>
                </td>
                @endif
                <td>
                    <div class="d-flex gap-2">
                        <div class="add">
                            <button class="btn btn-sm btn-success edit-item-btn" data-bs-toggle="modal" data-bs-target="#Modal{{$prok_count}}">Add Proker</button>
                        </div>
                    </div>
                </td>
            </tr>
            <!-- Add Modal -->
            <div class="modal fade" id="Modal{{$prok_count}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header bg-light p-3">
                            <h5 class="modal-title" id="exampleModalLabel">Add</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="close-modal"></button>
                        </div>

                        <div class="modal-body">
                            <form method="post" action="{{route('cascadeProker.store')}}" enctype="multipart/form-data" id="myForm">
                                @csrf
                                <input name="created_by" type="text" class="form-control" id="created_by" value="{{$users->id_divisi}}" readonly hidden>
                                <input name="id_CDiv" type="text" class="form-control" id="id_CDiv" value="{{$casKpiDiv->id}}" readonly hidden>
                                <div class="mb-3">
                                    <label for="tw" class="form-label">TW</label>
                                    <input name="tw" type="text" class="form-control" id="cas_kpiName" value="{{$prok_count}}" readonly>
                                </div>
                                <div class="mb-3">
                                    <label for="progress" class="form-label">Progress</label>
                                    <input name="progress" type="text" class="form-control" id="progress" value="{{$casKpiDiv->bkXbc / 4}}" readonly>
                                </div>
                                <div class="mb-3">
                                    <label for="deskripsi" class="form-label">Deskripsi</label>
                                    <input name="deskripsi" type="text" class="form-control" id="deskripsi"required>
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
            @endif
            <?php
            $count = 0;
            ?>
            @endfor
            @endif
            </tbody><!-- end tbody -->

            </table><!-- end table -->
        </div>
    </div>
</div> <!-- .card-->
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
@endsection