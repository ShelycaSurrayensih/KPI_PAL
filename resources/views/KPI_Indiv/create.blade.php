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
                    <form method="POST" action="{{ route('KPI.store') }}" id="myForm" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="id_direktorat" class="form-label">Direktorat</label>
                            <select name="id_direktorat" class="form-control" id="id_direktorat">
                                @foreach ($direktorat as $dir)
                                <option value="{{$dir->id_direktorat}}">{{ "$dir->nama" }}</option>
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
                            <label for="desc_kpi" class="form-label">KPI</label>
                            <input name="desc_kpi" type="text" class="form-control" id="desc_kpi">
                        </div>
                        <div class="mb-3">
                            <label for="satuan" class="form-label">Satuan</label>
                            <input name="satuan" type="text" class="form-control" id="satuan">
                        </div>
                        <div class="mb-3">
                            <label for="target" class="form-label">Target</label>
                            <input name="target" type="text" class="form-control" id="target">
                        </div>
                        <div class="mb-3">
                            <label for="bobot" class="form-label">Bobot</label>
                            <input name="bobot" type="text" class="form-control" id="bobot">
                        </div>
                        <div class="mb-3">
                            <label for="ket" class="form-label">Keterangan</label>
                            <input name="ket" type="text" class="form-control" id="ket">
                        </div>
                        <div class="mb-3">
                            <label for="asal_kpi" class="form-label">Asal KPI</label>
                            <input name="asal_kpi" type="text" class="form-control" id="asal_kpi">
                        </div>
                        <div class="mb-3">
                            <label for="alasan" class="form-label">Alasan</label>
                            <input name="alasan" type="text" class="form-control" id="alasan">
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