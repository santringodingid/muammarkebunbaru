<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Rekapitulasi Nilai MUAMMAR</title>
    <link rel="shortcut icon" href="<?= base_url() ?>/assets/logo.png">
    <style>
        * {
            font-family: 'Corbel', Courier, monospace;
            /* font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif; */
            font-size: 11pt;
        }

        .container {
            width: 33cm;
            display: block;
        }

        .row {
            display: flex;
            flex-wrap: wrap;
        }

        .col-12 {
            flex: 0 0 100%;
            max-width: 100%;
        }

        .col-8 {
            flex: 0 0 66.666667%;
            max-width: 66.666667%;
        }

        .col-7 {
            flex: 0 0 58.333333%;
            max-width: 58.333333%;
        }

        .col-6 {
            flex: 0 0 50%;
            max-width: 50%;
        }

        .col-5 {
            flex: 0 0 41.666667%;
            max-width: 41.666667%;
        }

        .col-4 {
            flex: 0 0 33.333333%;
            max-width: 33.333333%;
        }

        .logo {
            width: 100%;
            margin-top: 8px;
        }

        .h1,
        .h2,
        .h3,
        .h4,
        .h5,
        .h6,
        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            margin-top: 0.1rem;
            margin-bottom: 0.1rem;
            margin-block-start: 0px;
            margin-block-end: 0px;
            font-family: inherit;
            font-weight: bold;
            color: inherit;
        }

        .invoice-title {
            font-size: 3.5rem;
        }

        .card-title {
            font-size: 2.5rem;
        }

        .text-right {
            text-align: end;
        }

        hr {
            margin-top: 0.6rem;
            margin-bottom: 0.6rem;
            border: 0;
            border-top: 1px solid rgb(0 0 0 / 82%)
        }

        table {
            border-collapse: collapse;
        }

        .table {
            width: 100%;
            margin-bottom: 1rem;
            color: #212529;
            background-color: transparent;
        }

        .tablestripped {
            width: 100%;
            margin-bottom: 1rem;
            color: #212529;
            background-color: transparent;
        }

        .tablebottom {
            width: 100%;
            margin-bottom: 1rem;
            color: #212529;
            background-color: transparent;
        }

        .mb-0 {
            margin-bottom: 0px;
        }

        .mt-1 {
            margin-top: 1rem;
        }

        .mb-1 {
            margin-bottom: 1rem;
        }

        .mt-2 {
            margin-top: 3rem;
        }

        .mb-2 {
            margin-bottom: 2rem;
        }

        .tablestripped td,
        .tablestripped th {
            vertical-align: top;
            border-top: 1px solid #999797;
        }

        .tablebottom td,
        .tablebottom th {
            vertical-align: top;
            border-top: 1px dashed #999797;
        }

        .table-xl td,
        .table-xl th {
            padding: 0.5rem;
        }

        .table-sm td,
        .table-sm th {
            padding: 0.2rem;
        }

        .text-center {
            text-align: center;
        }

        .text-bold {
            font-weight: bold;
        }

        .notes {
            padding-left: 25px;
            padding-top: 10px;
        }

        .logo {
            width: 450px;
        }

        .border {
            background-color: #181616;
            height: 1px;
            width: 100%;
            margin-top: 10px;
            margin-bottom: 10px;
        }

        .pl-1 {
            padding-left: 0.5rem;
        }
    </style>
</head>

<body>
    <div class="container">
        <table style="width: 100%">
            <tbody>
                <tr>
                    <td>
                        <img class="logo" src="<?= base_url() ?>assets/images/header-print.png" alt="">
                    </td>
                </tr>
            </tbody>
        </table>
        <div class="border"></div>
        <h6 class="text-center mb-1">REKAPITULASI POIN MUAMMAR 1445 KEBUN BARU</h6>
        <table style="width: 100%" border="1" class="table">
            <thead>
                <tr>
                    <th rowspan="2" style="width: 2%">NO</th>
                    <th rowspan="2" style="width: 25%">MMU</th>
                    <th rowspan="2" style="width: 21%">PJGB</th>
                    <th colspan="9" style="width: 50%">LOMBA</th>
                    <th rowspan="2" style="width: 2%">RANK</th>
                </tr>
                <tr>
                    <?php
                    if ($contests) {
                        foreach ($contests as $contest) {
                            ?>
                            <th><?= $contest->id ?></th>
                    <?php
                        }
                    }
                    ?>
                </tr>
            </thead>
            <tbody>
                        <tr>
                            <td class="text-center">1</td>
                            <td class="pl-1">1</td>
                            <td class="pl-1">1</td>
                            <td class="text-center">
                                1
                            </td>
                            <td class="text-center">
                                1
                            </td>
                            <td class="text-center">
                                1
                            </td>
                        </tr>
            </tbody>
        </table>
    </div>
</body>

</html>