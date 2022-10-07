@extends('layouts.userLayout')

@section('content')
<style type="text/css">
		table, th, td {
		   border: 2px solid grey;
		}
	</style>
<div class="row">
    <div class="col">

        <div class="h-100">
            <div class="row mb-3 pb-1">
                <div class="col-12">
                    <div class="d-flex align-items-lg-center flex-lg-row flex-column">
                        <div class="flex-grow-1">
                            <?php //ubah timezone menjadi jakarta
                             date_default_timezone_set("Asia/Jakarta");
                              $jam=date('H:i'); 
                              if ($jam> '05:30' && $jam < '10:00' ) { 
                                $salam='Morning, ' ; 
                            } elseif ($jam>= '10:00' && $jam < '15:00' ) { 
                                $salam='Afternoon, ' ; 
                            } elseif ($jam < '18:00' ) { 
                                $salam='Evening, ' ; 
                            } else {
                                $salam='Night, ' ; 
                            } ?>
                            <h4 class="fs-16 mb-1">
                                <?php
                                echo 'Good ' . $salam; ?> {{ Auth::user()->username }}!
                                <p class="text-muted mb-0">Here's what's happening with your store today.</p>
                        </div>
                        <a href="/export_excel" class="btn btn-success my-3" target="_blank">EXPORT EXCEL</a>
                        <div class="mt-3 mt-lg-0">
                            <form action="javascript:void(0);">
                                <div class="row g-3 mb-0 align-items-center">
                                    <div class="col-sm-auto">
                                        <div class="input-group">
                                            <input type="text" class="form-control border-0 dash-filter-picker shadow"
                                                value="<?php
                                                        $tgl=date('d-m-Y');
                                                            echo $tgl;
                                                        ?>" readonly>
                                            <div class="input-group-text bg-primary border-primary text-white">
                                                <i class="ri-calendar-2-line"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <!--end col-->
                                </div>
                                <!--end row-->
                            </form>
                        </div>
                    </div><!-- end card header -->
                </div>
                <!--end col-->
            </div>
            <!--end row-->
        </div> <!-- end .h-100-->

    </div> <!-- end col -->

    <div>

   <!-- <div class="mb-3 gap-2">
    <p>Sort by:</p>
		<select > 
            <option value="cascading">Cascading</option>
            <option value="tupoksi">Tupoksi</option>
        </select>
    
        <select>
            <option value="pdf">Cetak PDF </option>
            <option value="excel">Cetak Excel </option>
        </select>
    
		<select > 
            <option value="all_cas">print all </option>
            <option value="div_cas">print divisi</option>
        </select>
		<select >
        <option value="divisi">Divisi </option>
        </select>
        <select >
        <option value="tahun">Tahun </option>
        </select>
        <a href="{{ route('print') }}">
        <button type="onClick" class="btn btn-sm btn-soft-success shadow-none">
        <i class="ri-add-circle-line align-middle me-1"></i> Print</button></a>
    </div>

		</div>
    </div><br>
    <div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header align-items-center d-flex">
                <h4 class="card-title mb-0 flex-grow-1"><strong>Table</strong></h4>
                <div class="flex-shrink-0">
                </div>
            </div>

            <div class="card-body">
               
                <div class="row g-4 mb-3  justify-content-center">
                        
                    <div class="table-responsive table-card mt-3 mb-1">
                        <table class="table align-middle table-nowrap" id="timTable">

                            <thead class="table-light ">
                                <tr style="vertical-align: middle;">

                                    <td rowspan="2"><strong><center>NO</td>
                                    <td rowspan="2"><center><strong>DIVISI</center></td>
                                    <td colspan="4" ><center><strong>PERFORMANCE</center></td>
                                </tr>
                                <tr>
                                <th><center>TW 1</th>
                                <th><center>TW 2</th>
                                <th><center>TW 3</th>
                                <th><center>TW 4</th>
                                </tr>
                            </thead>
                            <tbody class="list form-check-all">
                                <?php $no = 0;?>
                                @foreach($divisi as $divisi)
                                <tr>
                                    <?php $no++ ;?>
                                    <td>{{ $no }}</td>
                                    <td>
                                    
                                        <div class="d-flex align-items-center">
                                            <div class="flex-grow-1">{{$divisi->div_name}}</div>
                                        </div>
                                        
                                    </td>
                                    <td>
                                    
                                        <div class="d-flex align-items-center">
                                            <div class="flex-grow-1"></div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="flex-grow-1"></div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="flex-grow-1"></div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="flex-grow-1"></div>
                                        </div>
                                    </td>
                                </tr>

                                @endforeach
                            </tbody>
                        </table>
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
                </div>
            </div><!-- end card -->
        </div>
    </div>
</div>

@endsection