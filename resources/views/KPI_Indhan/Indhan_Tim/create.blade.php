<h4>Create New Tim</h4>

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
<h4 class="mb-3">Masukan Tim</h4>
<form method="post" action="{{ route('KPI_IndhanTim.store') }}" enctype="multipart/form-data" id="myForm">
    @csrf
    <div class="form-group">
        <label for="nama_tim">Nama Tim</label>
        <input type="nama" name="nama_tim" class="form-control" id="nama_tim">

    </div>
    <button type="submit" class="btn btn-primary" id="submit">Submit</button>
</form>