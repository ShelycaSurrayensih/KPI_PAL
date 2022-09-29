@extends('layouts.userlayout')

@section('content')
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

    <div class="mb-3 gap-2">
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
        <button type="onClick" class="btn btn-sm btn-soft-success shadow-none">
        <i class="ri-add-circle-line align-middle me-1"></i> Print</button></a>
    </div>

		
			
		
		</div>
    </div>
</div>
<!-- add Modal -->

@endsection