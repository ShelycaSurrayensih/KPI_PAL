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
                    <form method="POST" action="{{ route('KPI_IndivPlan.store') }}" id="myForm"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="id_kpidir" class="form-label">KPI Direktorat</label>
                            <select name="id_kpidir" class="form-control" id="id_kpidir">
                                @foreach ($kpidir as $dir)
                                <option value="{{$dir->id_kpidir}}">{{ "$dir->desc_kpidir" }}</option>
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
                            <label for="tw" class="form-label">TW</label>
                            <input name="tw" type="text" class="form-control" id="tw">
                        </div>
                        <div class="mb-3">
                            <label for="prognosa" class="form-label">Prognosa</label>
                            <input name="prognosa" type="text" class="form-control" id="prognosa">
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