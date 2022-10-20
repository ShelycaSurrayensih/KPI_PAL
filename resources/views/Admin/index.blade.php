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
                                        <?php
                                        $nProk1 = 0;
                                        $nProk2 = 0; 
                                        $nProk3 = 0; 
                                        $nProk4 = 0;
                                        
                                        $nReal1 = 0;
                                        $nReal2 = 0; 
                                        $nReal3 = 0; 
                                        $nReal4 = 0;
                                        
                                        foreach($casProk as $prok){
                                            if($prok->created_by == $divisi->id_divisi){
                                                if($prok->tw == '1'){
                                                    $nProk1 += $prok->progress;
                                                }
                                                if($prok->tw == '2'){
                                                    $nProk2 += $prok->progress;
                                                }
                                                if($prok->tw == '3'){
                                                    $nProk3 += $prok->progress;
                                                }
                                                if($prok->tw == '4'){
                                                    $nProk4 += $prok->progress;
                                                }

                                            }
                                            foreach($casReal as $real){
                                                if($real->created_by == $divisi->id_divisi && $real->id_CProk == $prok->id){
                                                    if($prok->tw == '1'){
                                                        $nReal1 += $real->progress;
                                                    }
                                                    if($prok->tw == '2'){
                                                        $nReal2 += $real->progress;
                                                    }
                                                    if($prok->tw == '3'){
                                                        $nReal3 += $real->progress;
                                                    }
                                                    if($prok->tw == '4'){
                                                        $nReal4 += $real->progress;
                                                    }
                                                }
                                            }
                                        }

                                        $nCas1 = round((($nReal1 / ($nProk1 ?: 1))), 2);
                                        $nCas2 = round((($nReal2 / ($nProk2 ?: 1))), 2);
                                        $nCas3 = round((($nReal3 / ($nProk3 ?: 1))), 2);
                                        $nCas4 = round((($nReal4 / ($nProk4 ?: 1))), 2);

                                        // $nCas2 += $nCas1;
                                        // $nCas3 += $nCas2;
                                        // $nCas4 += $nCas3;

                                        $nCasFin1 = $nCas1 * (40 / 100);
                                        $nCasFin2 = $nCas2 * (40 / 100);
                                        $nCasFin3 = $nCas3 * (40 / 100);
                                        $nCasFin4 = $nCas4 * (40 / 100);

                                        $nTupP1 = 0;
                                        $nTupP2 = 0;
                                        $nTupP3 = 0;
                                        $nTupP4 = 0;

                                        $nTupR1 = 0;
                                        $nTupR2 = 0;
                                        $nTupR3 = 0;
                                        $nTupR4 = 0;
                                        $counter = 0;
                                        foreach($tupoksiProker as $prok){
                                            if($prok->created_by == $divisi->id_divisi){
                                                foreach($tupoksiTw as $tw){
                                                    if($tw->id_proker == $prok->id_proker){
                                                        if($tw->tw == '1' && $tw->progres != 'Belum Terisi'){
                                                            $nTupP1 += $tw->progres;
                                                        }
                                                        if($tw->tw == '2' && $tw->progres != 'Belum Terisi'){
                                                            $nTupP2 += $tw->progres;
                                                        }
                                                        if($tw->tw == '3' && $tw->progres != 'Belum Terisi'){
                                                            $nTupP3 += $tw->progres;
                                                        }
                                                        if($tw->tw == '4' && $tw->progres != 'Belum Terisi'){
                                                            $nTupP4 += $tw->progres;
                                                        }
                                                        foreach($tupoksiRealisasi as $real){
                                                            if($real->id_tw == $tw->id_tw){
                                                                if($tw->tw == '1' && $real->progres != 'Belum Terisi'){
                                                                    $nTupR1 += $real->progres;
                                                                    $counter++;
                                                                }
                                                                if($tw->tw == '2' && $real->progres != 'Belum Terisi'){
                                                                    $nTupR2 += $real->progres;
                                                                }
                                                                if($tw->tw == '3' && $real->progres != 'Belum Terisi'){
                                                                    $nTupR3 += $real->progres;
                                                                }
                                                                if($tw->tw == '4' && $real->progres != 'Belum Terisi'){
                                                                    $nTupR4 += $real->progres;
                                                                }
                                                                
                                                            }
                                                        }
                                                    }

                                                    
                                                }
                                            }
                                        }
                                        $nTup1 = round((($nTupR1 / ($nTupP1 ?: 1))), 2);
                                        $nTup2 = round((($nTupR2 / ($nTupP2 ?: 1))), 2);
                                        $nTup3 = round((($nTupR3 / ($nTupP3 ?: 1))), 2);
                                        $nTup4 = round((($nTupR4 / ($nTupP4 ?: 1))), 2);

                                        // $nTup2 += $nTup1;
                                        // $nTup3 += $nTup2;
                                        // $nTup4 += $nTup3;

                                        $nTupFin1 = $nTup1 * (60 / 100);
                                        $nTupFin2 = $nTup2 * (60 / 100);
                                        $nTupFin3 = $nTup3 * (60 / 100);
                                        $nTupFin4 = $nTup4 * (60 / 100);

                                        $nFin1 = $nTupFin1 + $nCasFin1;
                                        $nFin2 = $nTupFin2 + $nCasFin2;
                                        $nFin3 = $nTupFin3 + $nCasFin3;
                                        $nFin4 = $nTupFin4 + $nCasFin4;
                                        ?>
                                        <div class="d-flex align-items-center">
                                            <div class="flex-grow-1">{{$nFin1}}</div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="flex-grow-1">{{$nFin2}}</div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="flex-grow-1">{{$nFin3}}</div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="flex-grow-1">{{$nFin4}}</div>
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
            </div>
        </div>
    </div>
</div>

@endsection