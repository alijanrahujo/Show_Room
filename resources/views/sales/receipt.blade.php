<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Sell Receipt | {{ $sale->customer->customer_name }} #{{ $sale->id }}</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
        integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style.css">

    <style>
        *,
        *::after,
        *::before {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }

        :root {
            --blue-color: #0c2f54;
            --dark-color: #535b61;
            --white-color: #fff;
        }

        ul {
            list-style-type: none;
        }

        ul li {
            margin: 2px 0;
        }

        /* text colors */
        .text-dark {
            color: var(--dark-color);
        }

        .text-blue {
            color: var(--blue-color);
        }

        .text-end {
            text-align: right;
        }

        .text-center {
            text-align: center;
        }

        .text-start {
            text-align: left;
        }

        .text-bold {
            font-weight: 700;
            /* text-align: center; */
        }

        /* hr line */
        .hr {
            height: 1px;
            background-color: rgba(0, 0, 0, 0.1);
        }

        /* border-bottom */
        .border-bottom {
            border-bottom: 1px solid rgba(0, 0, 0, 0.1);
        }

        body {
            font-family: "Poppins", sans-serif;
            color: var(--dark-color);
            font-size: 14px;
        }

        .invoice-wrapper {
            min-height: 100vh;
            background-color: rgba(0, 0, 0, 0.1);
            padding-top: 20px;
            padding-bottom: 20px;
        }

        .invoice {
            max-width: 860px;
            margin-top: auto;
            margin-right: auto;
            margin-left: auto;
            background-color: var(--white-color);
            padding: 70px;
            border: 1px solid rgba(0, 0, 0, 0.2);
            border-radius: 5px;
            min-height: 720px;
        }

        .invoice-head-top-left img {
            width: 130px;
        }

        .invoice-head-top-right img {
            width: 160px;
            margin-top: 30px;
        }

        .invoice-head-middle,
        .invoice-head-bottom {
            padding: 16px 0;
            text-align: center;
        }

        .invoice-body {
            /* border: 1px solid rgba(0, 0, 0, 0.1); */
            border-radius: 4px;
            overflow: hidden;
        }

        .invoice-body table {
            /* border-collapse: collapse; */
            /* border-radius: 4px; */
            width: 100%;
        }

        .invoice-body table td,
        .invoice-body table th {
            padding: 12px;
            /* border: 1px solid black; */
        }

        .invoice-body table tr {
            border-bottom: 1px solid rgba(0, 0, 0, 0.1);
        }

        .invoice-body table thead {
            background-color: rgba(0, 0, 0, 0.02);
        }

        .invoice-body-info-item {
            display: grid;
            grid-template-columns: 80% 20%;
        }

        .invoice-body-info-item .info-item-td {
            padding: 12px;
            background-color: rgba(0, 0, 0, 0.02);
        }

        .invoice-foot {
            padding: 30px 0;
        }

        .invoice-foot p {
            font-size: 12px;
        }

        .invoice-btns {
            margin-top: 20px;
            display: flex;
            justify-content: center;
        }

        .invoice-btn {
            padding: 3px 9px;
            color: var(--dark-color);
            font-family: inherit;
            border: 1px solid rgba(0, 0, 0, 0.1);
            cursor: pointer;
        }

        .invoice-head-top,
        .invoice-head-middle,
        .invoice-head-bottom {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            padding-bottom: 10px;
            margin-top: -60px;
        }

        @media screen and (max-width: 992px) {
            .invoice {
                padding: 40px;
            }
        }

        @media screen and (max-width: 576px) {

            .invoice-head-top,
            .invoice-head-middle,
            .invoice-head-bottom {
                grid-template-columns: repeat(1, 1fr);
            }

            .invoice-head-bottom-right {
                margin-top: 12px;
                margin-bottom: 12px;
            }

            .invoice * {
                text-align: left;
            }

            .invoice {
                padding: 28px;
            }
        }

        /* .overflow-view {
        overflow-x: scroll;
        } */
        .invoice-body {
            min-width: 500px;
            margin-top: 20px;
        }

        @media print {
            .print-area {
                visibility: visible;
                width: 100%;
                position: absolute;
                left: 0;
                top: 0;
                overflow: hidden;
            }

            .overflow-view {
                overflow-x: hidden;
            }

            .invoice-btns {
                display: none;
            }
        }
        .text
        {
            border-bottom: solid 1px black;
            display: inline-block;
            /* flex-grow: 0;
            max-width: 100%;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap; */
        }
    </style>

</head>

<body>

    <div class="invoice-wrapper" id="print-area">
        <div class="invoice">
            <div class="invoice-container">
                <div class="invoice-head">
                    <div class="invoice-head-top">
                        <div class="invoice-head-top-left text-start">
                            <img src="{{ asset('assets/images/honda logo.png') }}">
                        </div>
                        <div class="invoice-head-top-right text-end">
                            <img src="{{ asset('assets/images/parts.png') }}">
                            <div class="invoice-head-right">
                                <div class="invoice-head-middle-right text-end">
                                    <p>
                                        <spanf class="text-bold text-danger" style="Color:red;">AUTO TIME</span>
                                    </p>
                                    <p>
                                        <spanf class="text-bold">F-573,
                                            KHOKHAR MUHALLA HYDERABAD</span>
                                            <p class="text-bold"> PH: 0222,729,447</p>
                                    </p>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="invoice-head">
                        <div class="invoice-head-middle-left text-start">

                            <h4
                                style="transform: rotate(179deg); background-color: brown; margin-top: -30px; border:1px solid black;width:200px; height: 35px; margin-left: 200px; text-align: center;border-radius: 5px;color: brown;">
                                d</h4>
                            <h5
                                style="font-size: 20px; padding: 3px; height: 25px; margin-top: -33px; margin-left: 200px; background-color: white; border:1px solid black;width:200px; height: 35px; line-height: 30px; text-align: center;border-radius: 5px;color: brown; position: absolute;">
                                SALE RECEIPT</h5>

                        </div>
                    </div>
                    <div class="invoice-head-middle-right text-end">
                        <p>
                            <spanf class="text-bold">Dated: {{ $sale->date }}

                            </spanf>
                        </p>
                    </div>

                </div>
                <div class="overflow-view">
                    <div class="invoice-body">
                        <table>
                            <thead>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="text-bold" colspan="2">Name: <span class="text" style="width: calc(100% - 56px)">{{ $sale->customer->customer_name }}</span></td>
                                    <td class="text-bold">Price + Tax:</td>
                                    <td class="text-bold"><span class="text" style="width: calc(100% - 0px)">{{ $sale->saleDetail()->sum(\DB::raw('(sale_price /100* sale_tax) + sale_price ')) }}</span></td>
                                </tr>
                                <tr>
                                    <td class="text-bold" colspan="2">Father's Name :
                                        <span class="text" style="width: calc(100% - 120px)">{{ $sale->customer->father_name }}</span>
                                    </td>
                                    <td class="text-bold">Fitting Charges:</td>
                                    <td class="text-bold">
                                        <span class="text" style="width: calc(100% - 0px)">
                                        {{ $sale->saleDetail()->sum('fitting_price') > 0 ? $sale->saleDetail()->sum('fitting_price') : ' ' }}
                                        </span>
                                    </td>

                                </tr>
                                <tr>
                                    <td colspan="2" class="text-bold">Address: <span class="text" style="width: calc(100% - 76px)">{{ $sale->customer->address }}</span></td>
                                    <td class="text-bold">Registration Fee:</td>
                                    <td class="text-bold">
                                        <span class="text" style="width: calc(100% - 0px)">
                                        {{ $sale->saleDetail()->sum('reg_fee') > 0 ? $sale->saleDetail()->sum('reg_fee') : ' ' }}
                                        </span>
                                    </td>

                                </tr>
                                <tr>
                                    <td colspan="2" class="text-bold">Contact: <span class="text" style="width: calc(100% - 76px)">{{ $sale->customer->phone }}</span></td>
                                    <!-- <td></td> -->
                                    <td class="text-bold">Total</td>
                                    <td class="text-bold"><span class="text" style="width: calc(100% - 0px)">{{ $sale->saleDetail()->sum('total') }}</span></td>

                                </tr>
                                <tr>
                                    <td colspan="2" class="text-bold">CNIC No: <span class="text" style="width: calc(100% - 80px)">{{ $sale->customer->cnic }}</span></td>
                                    <td></td>
                                    <td><img height="100px" src="{{ asset('storage/' . $payment->image) }}">
                                    </td>

                                </tr>
                                <tr>
                                    <td colspan="4" class="text-bold">Honda:
                                        <span class="text" style="width: calc(100% - 55px)">{{ implode(', ', $sale->saleDetail()->pluck('title')->toArray()) }}</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="4" class="text-bold">Model:
                                        <span class="text" style="width: calc(100% - 51px)">{{ implode(', ', $sale->saleDetail()->pluck('model')->toArray()) }}</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="4" class="text-bold">Color:
                                        <span class="text" style="width: calc(100% - 46px)">{{ implode(', ', $sale->saleDetail()->pluck('color')->toArray()) }}</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="4" class="text-bold">Engine #:
                                        <span class="text" style="width: calc(100% - 72px)">{{ implode(', ', $sale->saleDetail()->pluck('engine')->toArray()) }}</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="4" class="text-bold">Chassis #:
                                        <span class="text" style="width: calc(100% - 80px)">{{ implode(', ', $sale->saleDetail()->pluck('chassis')->toArray()) }}</span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                    </div>
                </div>
                <div class="invoice-head-middle-right text-end" style="margin-top:20px">
                    <p>
                        <spanf class="text-bold">Received Cash:
                            {{ $sale->payments->sum('received') }}
                        </spanf>
                    </p>

                    <p>
                        <spanf class="text-bold">Pending Cash:
                            {{ $sale->amount - $sale->payments->sum('received') }}
                        </spanf>
                    </p>
                </div>
                {{-- <div class="invoice-head-middle-right text-start" style="margin-top:20px">
                    </br>
                    <p>
                        <spanf class="text-bold">Received
                            Rupees:___________________________________________________

                        </spanf>
                    </p>
                </div> --}}
                <div class="invoice-foot text-center">

                    <div class="invoice-btns">
                        <button type="button" class="invoice-btn" onclick="window.print()">
                            <span>
                                <i class="fa-solid fa-print"></i>
                            </span>
                            <span>Print</span>
                        </button>
                        {{-- <button type="button" class="invoice-btn">
                            <span>
                                <i class="fa-solid fa-download"></i>
                            </span>
                            <span>Download</span>
                        </button> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
