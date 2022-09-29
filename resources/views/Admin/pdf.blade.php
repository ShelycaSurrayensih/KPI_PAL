<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>LAPORAN</title>

    <style>
    .clearfix:after {
        content: "";
        display: table;
        clear: both;
    }

    a {
        color: #5D6975;
        text-decoration: underline;
    }

    body {
        position: relative;
        height: 29.7cm;
        width: 100%;
        margin: auto;
        color: #001028;
        background: #FFFFFF;
        font-size: 11px;
        font-family: Verdana, Geneva, Tahoma, sans-serif;
    }

    header {
        /* width: 100%;
            padding: 10px 0;
            margin-bottom: 30px; */
        border-color: #f3f3f3;
        position: relative;
        background: transparent;
        padding: 1.5rem 1.875rem 1.25rem;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .footer {
        font-family: "Times New Roman", Times, serif;
        position: fixed;
        left: 0;
        bottom: 0;
        width: 100%;
        text-align: center;
        font-size: 11px;
    }

    h2 {

        font-weight: 100;
        line-height: 1.5;
        color: #000;
        font-family: Verdana, Geneva, Tahoma, sans-serif;
        margin-top: 6%;
        /* font-size: 2.4em; */
        line-height: 1.4em;
        font-weight: bold;
        text-align: center;

        /* margin: 0 0 20px 0; */
        background: url(dimension.png);
    }

    h3 {
        /* border-bottom: 1px solid #5D6975; */
        color: #001028;
        font-family: Verdana, Geneva, Tahoma, sans-serif;
        /* font-size: 2.4em; */
        /* line-height: 1.4em; */
        font-weight: normal;
        text-align: center;
        margin-top: -15px;
        margin-bottom: 5%;
        /margin: 0 0 20px 0;/ background: url(dimension.png);
    }

    table {
        width: 100%;
        margin-top: 5%;
        border-collapse: collapse;
        border-spacing: 0;
        margin: auto;
    }

    table1 {
        width: 100%;
        border: none;
    }



    tr {
        text-align: center;
        font-family: Verdana, Geneva, Tahoma, sans-serif;
    }


    table th {
        padding: 9px 22px;
        color: #000;
        white-space: nowrap;
        font-weight: bold;
        border-collapse: collapse;
        background-color: #abcdef;
    }

    tr {
        border-bottom: 0.5px #000 solid;
    }

    table {
        border: 0.5px #000 solid
    }

    table td {
        padding: 10px;
        text-align: center;
    }

    p {
        font-family: Verdana, Geneva, Tahoma, sans-serif;
        font-size: 11px;
        margin: 0px;
    }

    .topright {
        position: absolute;
        top: 10px;
        right: 16px;
        font-size: 18px;
        width: 17%;
    }

    .topleft {
        position: absolute;
        top: 10px;
        left: 16px;
        font-size: 18px;
        width: 20%;
    }
    </style>
</head>

<body>
    <header>
        <img src="assets/images/logo-bumn1.png" class="topleft">
        <img src="assets/images/logo-4.png" class="topright">
    </header>
    <h2 style="text-decoration: underline;">LAPORAN</h2>
    <main>
        {{-- <div class="col-12">
            <div class="card">
                <div class="col-md-40 col-sm-12 text-right" style="text-align: right">
                    <div style="text-align: left; padding-left: 50px"><br>
                        <table class="display" style="border: 0px;color: black; font-size: 15pt">
                            <tr>
                                <td>KPI KORPORASI + TRANSFORMASI</td>
                                <td>&nbsp;:</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>KPI DIVISI</td>
                                <td>&nbsp;:</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>BOBOT CASCADING</td>
                                <td>&nbsp;:</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>TARGET KPI</td>
                                <td>&nbsp;:</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>TARGET PROKER</td>
                                <td>&nbsp;:</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>Tanggal Selesai</td>
                                <td>&nbsp;:&nbsp;</td>
                                <td></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div> --}}
        <div class="table-responsive" style="overflow-x:auto"><br>
            <?php
            $header = 0;
            ?>
            <table class="table" border="1">
                <thead>
                    <tr>
                        <th rowspan="2">No</th>
                        <th rowspan="2">KPI KORPORASI + TRANSFORMASI</th>
                        <th rowspan="2">KPI DIVISI</th>
                        <th rowspan="2">BOBOT CASCADING </th>
                        <th rowspan="2">TARGET KPI</th>
                        <th rowspan="2">TARGET PROKER</th>
                        <th colspan="1">PLAN PROKER</th>
                        <th colspan="3">REALISASI</th>
                        <th rowspan="2">KENDALA</th>
                    </tr>
                    <tr>
                        <th>TW</th>
                        <th>TW</th>
                        <th>SKOR KPI</th>
                        <th>SKOR PROKER</th>
                    </tr>
                </thead>
                <?php
                            $header = 1;
                            ?>
                <tbody>
                    <?php
                            $count = 1;
                            ?>
                    <tr>
                        <td rowspan="2"></td>
                        <td rowspan="2"></td>
                        <td rowspan="2"></td>
                        <td rowspan="2"></td>
                        <td rowspan="2"></td>
                        <td rowspan="2"></td>
                        <th ></th>
                        <th ></th>
                        <td rowspan="2"></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <?php
                                        $count++;
                                        ?>
                </tbody>
            </table>

        </div>
    </main>
    <div class="footer">
        <p style="font-weight: bold">PT. PAL INDONESIA</p>
        <p>Kantor Pusat : UJUNG, SURABAYA 60155, PO BOX 1134 INDONESIA</p>
        <p>Telp : +62-31-3292275 (HUNTING) FAX : +62-31-3292530, 3292493, 3292516 Email : headoffice@pal.co.id Web Site
            : http//www.pal.co.id</p>
        <p>Kantor Perwakilan : JL. TANAH ABANG IV27, JAKARTA 10100, PHONE : +62-21-3846833, FAX : +62-21-3643717 E-mail
            : jakartabranch@pal.co.id</p>
    </div>

</body>

</html>