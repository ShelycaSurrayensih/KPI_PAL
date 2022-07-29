<div class="row justify-content-center">
    <div class="col-xxl-12">
        <div class="card">
            @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <div class="card-body">
                <p class="text-muted">Silahkan masukkan data</p>
                <div class="live-preview">
                    <form method="POST" action="{{ route('KPI_Indhan.store') }}" id="myForm"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="id_tim" class="form-label">Tim</label>
                            <select name="id_tim" class="form-control" id="id_tim">
                                @foreach ($indhanTim as $tim)
                                <option value="{{$tim->id_tim}}">{{ "$tim->nama_tim" }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="id_divisi" class="form-label">Divisi</label>
                            <select name="id_divisi" class="form-control" id="id_divisi">
                                @foreach ($divisi as $divisi)
                                <option value="{{$divisi->id_divisi}}">{{ "$divisi->username" }}</option>
                                @endforeach

                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="program_strategis" class="form-label">Program Strategis</label>
                            <input name="program_strategis" type="text" class="form-control" id="program_strategis"
                                placeholder="Enter Program Strategis">
                        </div>
                        <div class="mb-3">
                            <label for="entitas" class="form-label">Entitas</label>
                            <input name="entitas" type="text" class="form-control" id="entitas"
                                placeholder="Enter Entitas">
                        </div>
                        <div class="mb-3">
                            <label for="program_utama" class="form-label">Program Utama</label>
                            <input name="program_utama" type="text" class="form-control" id="program_utama"
                                placeholder="Enter Program Utama">
                        </div>
                        <div class="mb-3">
                            <label for="target" class="form-label">Target</label>
                            <input name="target" type="text" class="form-control" id="target"
                                placeholder="Enter Target">
                        </div>

                </div>
                <!-- end row -->
                <div class="text-end">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>