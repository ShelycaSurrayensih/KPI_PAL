<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>LAPORAN</title>

    
</head>

<body>
    <!-- <header>
        <img src="assets/images/logo-bumn1.png" class="topleft">
        <img src="assets/images/logo-4.png" class="topright">
    </header> -->
    <h2 style="text-decoration: underline;">LAPORAN</h2>
    <table>

    <tr>
                                <td rowspan="2">DEPARTEMEN</td>
                                <td rowspan="2">KPI</td>
                                <th rowspan="2">PROKER UTAMA </th>
                                <td rowspan="2">TARGET</td>
                                <td colspan="1">PLAN PROKER</td>
                                <td colspan="1">REALISASI</td>
                                <td rowspan="2">SKOR AKHIR</td>
</tr>
<tr>
                        <th>TW</th>
                        <th>TW</th>
                    </tr>
                    <tbody>
                    
                    @foreach($tupoksiDepartemen as $dep)
                        @foreach($tupoksiKPI as $kpi)
                        @if($kpi->id_departemen == $dep->id_departemen)
                        @foreach($tupoksiProker as $proker)
                        @if($proker->id_kpi == $kpi->id_kpi)
                        @foreach($tupoksiTw as $tw)
                        @if($tw->id_proker == $proker->id_proker)
                        @foreach($tupoksiRealisasi as $real)
                        @if($real->id_tw == $tw->id_tw && $tw->tw == '4') 
                        <tr>
                        <td>{{$dep->departemen}}</td>

                        <td>{{$kpi->kpi}}</td>

                        
                        <td>{{$proker->proker}}</td>
                        <td>{{$proker->target}}</td>

                       
                        <th>{{$tw->deskripsi}}</th>

                       
                        
                        
                        <th>{{$real->deskripsi}}</th>
                        <td>1</td>
                        @endif
                        @endforeach
                        @endif
                        @endforeach
                        @endif
                        @endforeach
                        @endif
                        @endforeach
                        </tr>
                        @endforeach
                    
                </tbody>
                        </table> 
   

</body>

</html>