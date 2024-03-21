<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
        integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet" type="text/css" />
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
                            <div class="invoice-head-middle-left text-start">

                                <h4
                                    style="transform: rotate(175deg); background-color: brown; border:1px solid black;width:95px; margin-left: -2px; text-align: center;border-radius: 5px;color: brown;">
                                </h4>
                                <h5
                                    style="font-size: 20px; padding: 3px; height: 25px; margin-top: -20px; background-color: white; border:1px solid black;width:100px; line-height: 20px; text-align: center;border-radius: 5px;color: brown; position: absolute;">
                                    INVOICE</h5>
                                @if ($sale->status == 9)
                                    <img src="{{ asset('assets/images/duplicate.jpg') }}"
                                        style="position:absolute ; top:3px; margin-left:-75px;width:80px; "
                                        alt="">
                                @endif

                            </div>
                            <div class="invoice-head-right text-bold">

                                <div class="invoice-head-middle-right text-end">
                                    <p>
                                        <spanf class="text-bold" style="font-size: 18px;">AUTO TIME</span>
                                    </p>
                                    <p>
                                        <spanf class="">F-573,
                                            KHOKHAR MUHALLA HYDERABAD</span>
                                            <p class=""> PH: 0222,729,447</p>
                                    </p>
                                    <p>
                                        <spanf class="">Sales Tax Registration No: 0101871103573
                                            </span>
                                            <p class="">NTN 2035710-9</p>
                                    </p>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="invoice-head-middle text-bold">
                        <div class="invoice-head-middle-left text-start">
                            <p><span>No:</span> {{ $sale->id }}</p>
                            <p><span>Date:</span> {{ $sale->date }}</p>
                            <p style="border-bottom: 1px solid rgb(56, 48, 48);width:718px"><span
                                    style="font-weight:bold">Name:</span>
                                {{ $sale->buyer_name }}</p>
                            <p style="border-bottom: 1px solid rgb(39, 37, 37);width:718px"><span>Address:</span>
                                {{ $sale->buyer_address }}</p>
                        </div>
                    </div>


                </div>
                <div class="overflow-view">
                    <div class="invoice-body">
                        <table cellspacing='0' class="text-bold">
                            <thead>
                                <tr>
                                    <td>QTY NO</td>
                                    <td>Description Of Goods</td>
                                    <td>value Excluding sales Tax</td>
                                    <td>Rate of Sales Tax</td>
                                    <td>sales Tax Payable</td>
                                    <td>value of Including Sales Tax</td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="text-center">
                                    <td rowspan="6">1</td>
                                    <td>Honda Motorcycle</td>
                                    <td rowspan="6">{{ $sale->sale->sale_price }}</td>
                                    <td rowspan="6">{{ $sale->sale->sale_tax }}%</td>
                                    <td rowspan="6">{{ ($sale->sale->sale_price / 100) * $sale->sale->sale_tax }}
                                    </td>
                                    <td rowspan="6">
                                        {{ $sale->sale->sale_price + ($sale->sale->sale_price / 100) * $sale->sale->sale_tax }}
                                    </td>
                                </tr>
                                <tr>

                                    <td><span>Engine No:</span> {{ $sale->engine }}</td>
                                </tr>


                                <tr>

                                    <td><span>Chassis No:</span> {{ $sale->chassis }}</td>
                                </tr>

                                <tr>
                                    <td><span>Model:</span> {{ $sale->model }}</td>
                                </tr>
                                <tr>
                                    <td><span>Colour:</span> {{ $sale->color }}</td>
                                </tr>
                                <tr>
                                    <td><span>Registration letter No:</span> {{ $sale->register_no }}</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td class="text-bold text-center">TOTAL</td>
                                    <td colspan="4" class="text-end">
                                        {{ $sale->sale->sale_price + ($sale->sale->sale_price / 100) * $sale->sale->sale_tax }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>


                    </div>
                    <br><br>
                    <div class="invoice-head-middle-right">
                        <div class="invoice-head-middle-right text-end">
                            <p>
                                <spanf class="text-bold" style=" font-size: 20px;">
                                    For Auto
                                    Time</span>
                            </p>
                        </div>
                    </div>


                </div>
                <div class="signature">
                    <div class="invoice-head-middle">
                        <div class="invoice-head-middle-left text-start">
                            <div class="hr"></div>
                            <p><span class="text-bold">Customer signature</span></p>
                        </div>
                        <div class="invoice-head-middle-right text-end">
                            <div class="hr" style="margin-left:200px; color: black;"></div>
                            <p>
                                <spanf class="text-bold" style="margin-right:50px;">Signature</span>
                            </p>
                        </div>
                    </div>
                    <div class="invoice-head-middle-right text-start" style="margin-top:10px">
                        </br> </div>
                    <div class="invoice-foot text-center">
                        <div class="invoice-btns">
                            <button type="button" class="invoice-btn" onclick="printInvoice()">
                                <span>
                                    <i class="fa-solid fa-print"></i>
                                </span>
                                <span>Print</span>
                            </button>
                            @if ($sale->status == 10)
                                <a class="invoice-btn" href="{{ Route('invoices.change', $sale->id) }}">Issued</a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('assets\js\script.js') }}"></script>
</body>

</html>
