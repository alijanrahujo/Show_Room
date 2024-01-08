<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Invoice #6</title>
    <style>
        html,
        body {
            margin: 10px;
            padding: 10px;
            font-family: sans-serif;
        }
        h1,h2,h3,h4,h5,h6,p,span,label {
            font-family: sans-serif;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 0px !important;
        }
        table thead th {
            height: 28px;
            text-align: left;
            font-size: 16px;
            font-family: sans-serif;
        }
        table, th, td {
            border: 1px solid #ddd;
            padding: 8px;
            font-size: 14px;
        }

        .heading {
            font-size: 24px;
            margin-top: 12px;
            margin-bottom: 12px;
            font-family: sans-serif;
        }
        .small-heading {
            font-size: 18px;
            font-family: sans-serif;
        }
        .total-heading {
            font-size: 18px;
            font-weight: 700;
            font-family: sans-serif;
        }
        .order-details tbody tr td:nth-child(1) {
            width: 20%;
        }
        .order-details tbody tr td:nth-child(3) {
            width: 20%;
        }

        .text-start {
            text-align: left;
        }
        .text-end {
            text-align: right;
        }
        .text-center {
            text-align: center;
        }
        .company-data span {
            margin-bottom: 4px;
            display: inline-block;
            font-family: sans-serif;
            font-size: 14px;
            font-weight: 400;
        }
        .no-border {
            border: 1px solid #fff !important;
        }
        .bg-blue {
            background-color: #414ab1;
            color: #fff;
        }
    </style>
</head>
<body>

    <table class="order-details">
        <thead>
            <tr>
                <th width="10%" colspan="2">
                    <h2 class="text-start">Hunda</h2>
                </th>
                <th width="90%" colspan="2" class="text-end company-data">
                    <span>Invoice Id: #6</span> <br>
                    <span>Date: 24 / 09 / 2022</span> <br>
                    <span>Zip code : 560077</span> <br>
                    <span>Address: #555, Main road, shivaji nagar, Bangalore, India</span> <br>
                </th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>No:</td>
                <td colspan="2">________________________</td>
            </tr>
            <tr>
                <td>Date:</td>
                <td colspan="2">________________________</td>
            </tr>
            <tr>
                <td>Name:</td>
                <td colspan="2">_________________________</td>
            </tr>
            <tr>
                <td>Address:</td>
                <td colspan="2">_______________________________________________</td>
            </tr>
        </tbody>
    </table>

    <table>
        <thead>
            {{-- <tr>
                <th class="no-border text-start heading" colspan="5">
                    Order Items
                </th>
            </tr> --}}
            <tr class="bg-blue">
                <th>Qty No</th>
                <th>Description of Goods</th>
                <th>Value Excluding Sales Tax.</th>
                <th>Rate of Sales Tax</th>
                <th>Sales Tax Payable</th>
                <th>Value Including Sales Tax.</th>
            </tr>
        </thead>
        <tbody>
            <tr valign="top">
                <td width="10%">16</td>
                <td>
                    Honda Motorcycle:
                    <br><br>
                    Engine No:
                    <br><br>
                    Chassis No:
                    <br><br>
                    Model:
                    <br><br>
                    Colour:
                    <br><br>
                    Registration Letter No:

                </td>
                <td width="10%">$14000</td>
                <td width="10%">1</td>
                <td width="10%">1</td>
                <td width="15%" class="fw-bold">$14000</td>
            </tr>
            <tr>
                <td colspan="2" class="total-heading">Total Amount - <small>Inc. all vat/tax</small> :</td>
                <td class="total-heading">$14699</td>
                <td class="total-heading">$14699</td>
                <td class="total-heading">$14699</td>
                <td class="total-heading">$14699</td>
            </tr>
        </tbody>
    </table>

    <br>
    <p class="text-center">
        Thank your for shopping. Developed by OraSoft.pk
    </p>

</body>
</html>
