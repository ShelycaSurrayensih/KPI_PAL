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
                    <form method="POST" action="{{ route('KPI_IndhanRealisasi.store') }}" id="myForm"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="id_indhan" class="form-label">Indhan</label>
                            <select name="id_indhan" class="form-control" id="id_indhan">
                                @foreach ($indhan as $indhan)
                                <option value="{{$indhan->id_indhan}}">{{ "$indhan->program_strategis" }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="realisasi" class="form-label">Realisasi</label>
                            <input name="realisasi" type="text" class="form-control" id="realisasi"
                                placeholder="Enter Realisasi">
                        </div>
                        <div class="mb-3">
                            <label for="bulan" class="form-label">Bulan</label>
                            <input name="bulan" type="text" class="form-control" id="bulan" placeholder="Enter Bulan">
                        </div>
                        <div class="mb-3">
                            <label for="tahun" class="form-label">Tahun</label>
                            <input name="tahun" type="text" class="form-control" id="tahun" placeholder="Enter Tahun">
                        </div>
                        <div class="mb-3">
                            <label for="kendala" class="form-label">Kendala</label>
                            <input name="kendala" type="text" class="form-control" id="kendala"
                                placeholder="Enter Kendala">
                        </div>
                        <div class="mb-3">
                            <label for="StartleaveDate" class="form-label">Tanggal Input</label>
                            <input name="tgl_input" type="date" class="form-control" data-provider="flatpickr id="
                                tgl_input">
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