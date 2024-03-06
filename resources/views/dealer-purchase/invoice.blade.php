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
                            <p><span>No:</span> 12345</p>
                            <p><span>Date:</span> 2024-02-28</p>
                            <p><span>Name:</span> John Doe</p>
                            <p><span>Address:</span> 123 Main St, Anytown, USA</p>
                        </div>
                    </div>


                </div>
                <div class="overflow-view">
                    <div class="invoice-body">
                        <table style="border: 1px;" class="text-bold">
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
                                <tr>
                                    <td rowspan="6">1</td>
                                    <td>Honda Motorcycle</td>
                                    <td>$1000.00</td>
                                    <td>5%</td>
                                    <td>$50.00</td>
                                    <td>$1050.00</td>
                                </tr>
                                <tr>

                                    <td><span>Engine No:</span> ABC123456</td>
                                    <td>$50.00</td>
                                    <td>10%</td>
                                    <td>$100</td>
                                    <td>$500.00</td>
                                </tr>


                                <tr>

                                    <td><span>Chassis No:</span> ABC7890123</td>
                                    <td><span>$50.00</td>
                                    <td>10%</td>
                                    <td>$100</td>
                                    <td>$500.00</td>
                                </tr>

                                <tr>
                                    <td><span>Model:</span> 2023</td>
                                    <td>$50.00</td>
                                    <td>10%</td>
                                    <td>$100</td>
                                    <td>$500.00</td>
                                </tr>
                                <tr>
                                    <td><span>Colour:</span> Red</td>
                                    <td>$50.00</td>
                                    <td>10%</td>
                                    <td>$100</td>
                                    <td>$500.00</td>
                                </tr>
                                <tr>
                                    <td><span>Registration letter No:</span> 90123</td>
                                    <td>$50.00</td>
                                    <td>10%</td>
                                    <td>$100</td>
                                    <td>$500.00</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td class="text-bold text-center">TOTAL</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td class="text-end">$1050.00</td>
                                </tr>
                            </tbody>
                        </table>


                    </div>

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
                        </br>
                        <p>
                            <span class="text-bold">Rupees: 1000</span>
                        </p>

                    </div>
                    <div class="invoice-foot text-center">
                        <div class="invoice-btns">
                            <button type="button" class="invoice-btn" onclick="printInvoice()">
                                <span>
                                    <i class="fa-solid fa-print"></i>
                                </span>
                                <span>Print</span>
                            </button>
                            <button type="button" class="invoice-btn">
                                <span>
                                    <i class="fa-solid fa-download"></i>
                                </span>
                                <span>Download</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('assets\js\script.js') }}"></script>
</body>

</html>
