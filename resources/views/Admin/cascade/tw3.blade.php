<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>LAPORAN</title>

</head>

<body>

    <h2 style="text-decoration: underline;">LAPORAN</h2>
    <table>
    <td rowspan="2">NO</td>
    <tr>
                                <td rowspan="2">KPI KORPORASI + TRANSFORMASI</td>
                                <td rowspan="2">KPI DIVISI</td>
                                <th rowspan="2">BOBOT KPI </th>
                                <td rowspan="2">BOBOT CASCADING</td>
                                <td rowspan="2">TARGET KPI</td>
                                <td rowspan="2">TARGET PROKER</td>
                                <td colspan="1">PLAN PROKER</td>
                                <td colspan="3">REALISASI</td>
                                <td rowspan="2">KENDALA</td>
</tr>
<tr>
                        <th>TW 3</th>
                        <th>TW 3</th>
                        <th>SKOR KPI</th>
                        <th>SKOR PROKER</th>
                    </tr>
                    <tbody>
                    <?php $no = 0;?>
                    @foreach($casKpi as $kpi)
                    @foreach($casKpiDiv as $kpiDiv)
                    @if($kpiDiv->id_CasKpi == $kpi->id)
                    @foreach($casProk as $prok) 
                    @if($prok->id_CDiv == $kpiDiv->id)
                    @foreach($casReal as $real) 
                    @if($real->id_CProk == $prok->id)
                    @if($prok->tw == '3')
                    <tr>
                    <?php $no++ ;?>
                                    <td rowspan="2">{{ $no }}</td>
                        <td rowspan="2">{{$kpi->cas_kpiName}}</td>

                        <td rowspan="2">{{$kpiDiv->kpi_divisi}}</td>
                       
                        <td rowspan="2">{{$kpi->bobot_kpi}}</td>
                        <td rowspan="2">{{$kpiDiv->bobot_cascade}}</td>
                        <td rowspan="2"></td>
                        <td rowspan="2">{{$kpiDiv->target}}</td>
                        
                        <th >{{$prok->progress}}</th>
                        <th >{{$real->progress}}</th>
                        
                        
                        
                        <td rowspan="2">0,138</td>
                        <td  rowspan="2">75%</td>
                        <td  rowspan="2">{{$real->kendala}}</td>
                    </tr>
                    <tr>
                        <td>{{$prok->deskripsi}}</td>
                        <td>{{$real->deskripsi}}</td>
                        @endif
                            @endif
                    @endforeach
                        @endif
                    @endforeach
                    </tr>
                    
                    @endif
                    @endforeach
                    @endforeach
                </tbody>
                        </table> 
   

</body>

</html>