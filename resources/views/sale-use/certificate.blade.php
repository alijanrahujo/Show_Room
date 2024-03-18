<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://unpkg.com/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://unpkg.com/bs-brain@2.0.3/components/logins/login-7/assets/css/login-7.css">


    <style>
        .table-1 {
            font-weight: bold;
        }

        .table-2 {
            font-weight: bold;
            overflow: hidden;
        }

        .table-3 {
            font-weight: bold;
        }

        .text {
            border-bottom: 1px solid black;
            display: inline-block;
            text-align: center;
            padding: 0px;
            height: 22px;
        }

        .text-1 {
            border-bottom: 1px solid black;
            display: inline-block;
            text-align: center;
            padding: 0px;
            height: 22px;
        }

        .text-2 {
            border-bottom: 1px solid black;
            display: inline-block;
            text-align: center;
            padding: 0px;
            height: 38px;
        }
    </style>

</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-4 col-sm-6 mb-4 ">
                <div class="card h-auto">
                    <img class="card-img-top" src="{{ asset('assets/images/sale-img2.png') }}" alt="">
                    <table class="mt-4  text-start table-1" style="font-size :10px; line-height: 30px;">
                        <img style="opacity: 0.4;position:absolute; width: 200px;margin: 250px auto auto 100px; "
                            src="{{ asset('assets/images/bike.png') }}" alt="">
                        <thead class="">
                            <tr>
                                <td colspan="2">
                                    <span>Receipt No: </span>
                                    <span class="text" style="width: 22.1pc;"> {{ $detail->id }}</span>
                                </td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td colspan="2">
                                    <span>Date:</span>
                                    <span class="text" style="width: 11pc ;"> {{ $detail->sale->date }}</span>
                                    <span>Time:</span>
                                    <span class="text" style="width: 11pc;">{{ $detail->sale->time }}</span>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <span>Regd. No:</span>
                                    <span class="text" style="width: 9.6pc;">{{ $detail->register_no }}</span>
                                    <span>Maker:</span>
                                    <span class="text" style="width:10.6pc">{{ $detail->maker }}</span>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <span>H.Power:</span>
                                    <span class="text" style="width: 9.8pc;">{{ $detail->horse_power }}</span>
                                    <span>Model:</span>
                                    <span class="text" style="width: 10.5pc;"> {{ $detail->model }}</span>
                                </td>

                            </tr>
                            <tr>
                                <td colspan="2">
                                    <span>Engine No:</span>
                                    <span class="text" style="width: 9.2pc;"> {{ $detail->engine }}</span>
                                    <span>Chassis No:</span>
                                    <span class="text" style="width: 9.3pc;">{{ $detail->chassis }}</span>
                                </td>

                            </tr>
                            <tr>
                                <td colspan="2">
                                    <span>Name of Seller:</span>
                                    <span class="text" style="width: 20.9pc;">
                                        {{ $detail->purchase->owner_name }}</span>
                                </td>

                            </tr>
                            <tr>
                                <td colspan="2">
                                    <span>S/0:</span>
                                    <span class="text" style="width: 24.3pc;">{{ $detail->purchase->owner_father }}
                                    </span>


                                </td>

                            </tr>
                            <tr>
                                <td colspan="2">
                                    <span>Residance Address:</span>

                                    <span class="text" style="width: 19.8pc;"> {{ $detail->purchase->owner_address }}
                                    </span>

                                </td>

                            </tr>
                            <tr>
                                <td colspan="2">
                                    <span>Phone#:</span>
                                    <span class="text"
                                        style="width: 23pc;">{{ $detail->purchase->owner_phone }}</span>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <span>Name of Purchaser:</span>
                                    <span class="text" style="width: 19.6pc;">{{ $detail->buyer_name }}
                                    </span>

                                </td>

                            </tr>
                            <tr>
                                <td colspan="2">
                                    <span>S/O:</span>
                                    <span class="text" style="width: 24.1pc;">{{ $detail->buyer_father }}</span>

                                </td>

                            </tr>
                            <tr>
                                <td colspan="2">
                                    <span>Residance
                                        Address:</span>
                                    <span class="text" style="width: 19.7pc;">{{ $detail->buyer_address }}</span>

                                </td>

                            </tr>
                            <tr>
                                <td colspan="2">
                                    <span>Phone#:</span>
                                    <span class="text" style="width: 22.9pc;"></span>
                                </td>

                            </tr>
                            <tr>
                                <td colspan="2">
                                    <span>Total Value:</span>
                                    <span class="text" style="width: 5.4pc;"> {{ $detail->total }}</span>
                                    <span>Advance:</span>
                                    <span class="text"
                                        style="width: 5.4pc;">{{ $detail->sale->payments->sum('received') }}</span>
                                    <span>Balance</span>
                                    <span class="text" style="width: 5.5pc;">{{ $detail->sale->due_amount }}</span>
                                </td>
                            </tr>
                            <td colspan="2">
                                <span>Total Value in Words:</span>
                                <span class="text" style="width: 19.2pc;">{{ num2word($detail->total) }}</span>

                            </td>
                            <tr class="border-tosp">
                                <td colspan="2">
                                    <span>Balance Amount Paid Date:</span>
                                    <span class="text" style="width: 17.4pc;">
                                        {{ $detail->sale->payments()->latest()->first()->date ?? '' }}</span>
                                </td>

                            </tr>
                        </tbody>

                    </table>
                    <div class="sig text-center">
                        <hr class="hr w-50" style="border: 1px solid black; margin: 40px 0px 0px 70px;">
                        <span>Seal & Signature</span>
                    </div>

                    <!-- seller and Purchaser signature here -->
                    <div class="row mt-4" style="font-weight: bold;">
                        <div class="col-6 text-start" style="font-size:10px">
                            <span>Seller Signature: </span>
                            <span class="text"></span>
                        </div>
                        <div class="col-6 text-start" style="font-size:10px">
                            <span>Purchaser Signature: </span>
                            <span class="text"></span>

                        </div>
                    </div>
                    <div class="row mt-2 mb-3" style="font-weight: bold;">
                        <div class="col-6 text-start" style="font-size:10px">
                            <p>CNIC No: <span
                                    style="border: 1px solid black;">{{ $detail->purchase->owner_cnic }}</span></p>
                        </div>
                        <div class="col-6 text-start" style="font-size:10px">
                            <p>CNIC No: <span style="border: 1px solid black;">{{ $detail->buyer_cnic }}</span></p>
                        </div>
                    </div>

                </div>
            </div>


            <!-- =================================== table one end here ================================================================= -->
            <!-- =================================== 2nd table strart here ================================================================= -->

            <div class="col-lg-6 col-sm-6 mb-4">
                <div class="card h-auto">
                    <img class="card-img-top" src="{{ asset('assets/images/sale-img2.png') }}" alt="">
                    <table class="mt-4   table-2" style="font-size :10px; line-height: 30px; margin-left: 10px;">
                        <img style="opacity: 0.4;position:absolute; width: 400px;margin: 250px 100px;"
                            src="{{ asset('assets/images/bike.png') }}" alt="">
                        <thead class="">
                            <tr>
                                <td colspan=" 2">
                                    <span> Sale Receipt No: </span>
                                    <span class="text-1" style="width: 10pc;">{{ $detail->id }}</span>
                                    <span>Date: </span>
                                    <span class="text-1" style="width: 10pc;">{{ $detail->sale->date }}</span>
                                    <span>Time: </span>
                                    <span class="text-1" style="width: 10pc;">{{ $detail->sale->time }}</span>
                                </td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td colspan="2">
                                    <span>Regd No: </span>
                                    <span class="text-1" style="width: 9.8pc;">135-F</span>
                                    <span>Maker: </span>
                                    <span class="text-1" style="width: 9.7pc;">{{ $detail->maker }}</span>
                                    <span>Horse Power: </span>
                                    <span class="text-1" style="width: 9.8pc;">{{ $detail->horse_power }} </span>

                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <span>Model: </span>
                                    <span class="text-1" style="width:9.7pc;"> {{ $detail->model }}</span>
                                    <span>Engine No: </span>
                                    <span class="text-1" style="width:9.7pc;"> {{ $detail->engine }}</span>
                                    <span>Chassis Nos: </span>
                                    <span class="text-1" style="width: 9.8pc;">{{ $detail->chassis }}</span>

                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <span>Name Of Purchaser: </span>
                                    <span class="text-1" style="width: 15.6pc;">{{ $detail->buyer_name }}
                                    </span>
                                    <span>S/O: </span>
                                    <span class="text-1" style="width: 15.6pc;">{{ $detail->buyer_father }}</span>
                                </td>

                            </tr>
                            <tr>
                                <td colspan="2">
                                    <span>Residance
                                        Address: </span>
                                    <span class="text-1" style="width: 33.1pc;">{{ $detail->buyer_address }}</span>
                                </td>

                            </tr>
                            <tr>
                                <td colspan="2">
                                    <span>Name Of Seller: </span>
                                    <span class="text-1" style="width: 16.2pc;"> {{ $detail->purchase->owner_name }}
                                    </span>
                                    <span>S/O: </span>
                                    <span class="text-1" style="width:16.2pc;">
                                        {{ $detail->purchase->owner_father }}</span>
                                </td>

                            </tr>
                            <tr>
                                <td colspan="2">
                                    <span>Residence Address: </span>
                                    <span class="text-1" style="width: 33pc;">
                                        {{ $detail->purchase->owner_address }}</span>
                                </td>

                            </tr>
                            <tr>
                                <td colspan="2">
                                    <span>Phone#: </span>
                                    <span class="text-1" style="width: 36.2pc;">
                                        {{ $detail->purchase->owner_phone }}</span>
                                </td>
                            </tr>



                            <tr>
                                <td colspan="2">
                                    <span>Guarantor Name: </span>
                                    <span class="text-1" style="width: 15.9pc;">
                                        {{ $detail->guarantor_name }}
                                    </span>
                                    <span>S/O: </span>
                                    <span class="text-1" style="width: 16pc;">
                                        {{ $detail->guarantor_father }}</span>
                                </td>


                            </tr>
                            <tr>
                                <td colspan="2">
                                    <span>Owner Name: </span>
                                    <span class="text-1" style="width: 14.2pc;">
                                        {{ $detail->purchase->owner_name }} </span>
                                    <span>Previous Reference: </span>
                                    <span class="text-1" style="width: 14.3pc;">{{ $detail->pre_refrence }} </span>

                                </td>

                            </tr>
                            <tr>
                                <td colspan="2">
                                    <span>Value: </span>
                                    <span class="text-1" style="width: 7.2pc;"> {{ $detail->total }}</span>
                                    <span>Advance: </span>
                                    <span class="text-1" style="width: 7.2pc;">
                                        {{ $detail->sale->payments->sum('received') }}</span>
                                    <span>Balance: </span>
                                    <span class="text-1" style="width: 7.2pc;">
                                        {{ $detail->sale->due_amount }}</span>
                                    <span>Dated: </span>
                                    <span class="text-1" style="width: 7.2pc;">
                                        {{ $detail->sale->payments()->latest()->first()->date ?? '' }}</span>



                                </td>

                            </tr>
                            <tr>
                                <td colspan="2">
                                    <span>Total Value in Words: </span>
                                    <span class="text-1" style="width: 32.4pc;"> {{ num2word($detail->total) }}
                                    </span>

                                </td>

                            </tr>
                            <tr>
                                <td></td>

                                <td class="text-end">
                                    <span class="text-start" style='margin-right:6px;'>Balance Amount Paid Date:
                                    </span>
                                    <span class="text-1" style="margin-right: 1pc;">
                                        {{ $detail->sale->payments()->latest()->first()->date ?? '' }}</span></span>
                                </td>

                            </tr>

                        </tbody>
                    </table>
                    <div class="sig text-center">
                        <hr class="hr w-50" style="border: 1px solid black; margin: 40px 0px 0px 170px;">
                        <span>Seal & Signature</span>
                    </div>
                    <!-- seller and Purchaser signature here -->
                    <div class="row mt-4" style="font-weight: bold; margin-left: 80px;">
                        <div class="col-6 text-start" style="font-size:15px">
                            <span>Seller Signature: </span>
                            <span class="text-1"></span>
                        </div>
                        <div class="col-6 text-start" style="font-size:15px">
                            <span>Purchaser Signature: </span>
                            <span class="text-1"></span>
                        </div>
                    </div>
                    <div class="row mt-2 mb-3" style="font-weight: bold; margin-left: 80px;">
                        <div class="col-6 text-start" style="font-size:15px">
                            <p>CNIC No: <span
                                    style="border: 1px solid black;">{{ $detail->purchase->owner_cnic }}</span>
                            </p>
                        </div>
                        <div class="col-6 text-start" style="font-size:15px">
                            <p>CNIC No: <span style="border: 1px solid black;">{{ $detail->buyer_cnic }}</span>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ===================================== 2nd table end here=================================================== -->
            <!-- ========================================== 3rd table start here ================================================== -->
            <div class="col-lg-2 col-sm-6 mb-4">
                <div class="card h-auto">
                    <img class="card-img-top" height="50px" src="{{ asset('assets/images/sale-img2.png') }}"
                        alt="">
                    <table class="mt-4  text-start table-3"
                        style="font-size :12px;line-height: 50px; margin-left: 10px;">

                        <thead>
                            <tr>
                                <td colspan="2">
                                    <span>Regd No: </span>
                                    <span class="text-2" style="width: 7.5pc;">{{ $detail->registration_no }}</span>

                                </td>


                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td colspan="2">
                                    <span>S.Receipt No: </span>
                                    <span class="text-2" style="width: 6pc;"> {{ $detail->id }}</span>

                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <span>Time: </span>
                                    <span class="text-2"
                                        style="width:8.8pc;">{{ \Carbon\Carbon::now()->format('H:i') }}</span>

                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <span>Date: </span>
                                    <span class="text-2"
                                        style="width: 8.8pc;">{{ \Carbon\Carbon::now()->format('d-m-Y') }}</span>

                                </td>

                            </tr>
                            <tr>
                                <td colspan="2">
                                    <span class="">Name of Show Room</span>
                                    <span class="text-2" style="width: 11pc;">Auto Time</span>


                                </td>

                            </tr>
                            <tr>
                                <td colspan="2">
                                    <span class="">Seal & Signature:</span>
                                    <span class="text-2" style="width: 4.7pc;"></span>
                                </td>


                                <br />
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <span>Signature of Physical Checking Incharge:</span>
                                    <span class="text-2" style="width: 7.4pc;">{{ Auth()->user()->name }}</span>

                                </td>

                            </tr>
                            <tr>
                                <td colspan="2">
                                    <span style="margin-left: 3pc;">Stamp & Date</span> <br />
                                    <span>Stamp Here </span> <br /> <br />
                                    <span>Dated: </span>
                                    <span class="text-2"
                                        style="width:8.4pc;">{{ \Carbon\Carbon::now()->format('d-m-Y') }}</span>


                                </td>

                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>

        </div>
        <!-- /.row -->

        <!-- Pagination -->


    </div>

    {{-- <div class="container-fluid">
        <div class="row">
            <div class="col-lg-4 col-sm-6 mb-4 ">
                <div class="card h-auto">
                    <img class="card-img-top mt-1" src="{{ asset('assets/images/sale-img2.png') }}" alt="">
                    <table class="mt-4  text-start table-1" style="font-size :10px; line-height: 30px;">
                        <img style="position:absolute; width: 200px;margin: 250px auto; " src="images/bike.png"
                            alt="">
                        <thead class="">
                            <tr>
                                <td colspan="2">
                                    <span class="rspt"> Receipt No:
                                        __________{{ $detail->id }}_______________</span>
                                    <span class="tc">T.C. No:____________________________________</span>
                                </td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td colspan="2">
                                    <span class="">Date:
                                        ______________{{ $detail->sale->date }}________________</span>
                                    <span class="">Time: _________________{{ $detail->sale->time }}_____</span>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <span class="">Regd. No:
                                        _____________{{ $detail->register_no }}___________</span>
                                    <span class="">Maker:
                                        ____________{{ $detail->maker }}________________</span>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <span class="">H.Power:
                                        ______________{{ $detail->horse_power }}______________</span>
                                    <span class="">Model: ______________{{ $detail->model }}_____________</span>
                                </td>

                            </tr>
                            <tr>
                                <td colspan="2">
                                    <span class="">Engine No:
                                        ____________{{ $detail->engine }}_______________</span>
                                    <span class="">Chassis No: _________{{ $detail->chassis }}___________</span>
                                </td>

                            </tr>
                            <tr>
                                <td colspan="2">
                                    <span class="">Name of
                                        Saller:______________{{ $detail->purchase->owner_name }}____________________________________</span>

                                </td>

                            </tr>
                            <tr>
                                <td colspan="2">
                                    <span
                                        class="">S/O:_____________{{ $detail->purchase->owner_father }}_______________________________________</span>

                                </td>

                            </tr>
                            <tr>
                                <td colspan="2">
                                    <span class="">Residance
                                        Address:______________{{ $detail->purchase->owner_address }}______________________________________________________</span>

                                </td>

                            </tr>
                            <tr>
                                <td colspan="2">
                                    <span class="">____________________________________________________</span>
                                    <span class="">Mob#:
                                        ________{{ $detail->purchase->owner_phone }}____________</span>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <span class="">Name of Purchaser:
                                        _____________________{{ $detail->buyer_name }}___________________________</span>

                                </td>

                            </tr>
                            <tr>
                                <td colspan="2">
                                    <span class="">S/O:
                                        ____________________________{{ $detail->buyer_father }}_________________________________________</span>

                                </td>

                            </tr>
                            <tr>
                                <td colspan="2">
                                    <span class="">Residance
                                        Address:_______________________{{ $detail->buyer_address }}_______________________________</span>

                                </td>

                            </tr>
                            <tr>
                                <td colspan="2">
                                    <span class="">_____________________________________________________</span>
                                    <span class="">Mob#:
                                        _________{{ $detail->buyer_phone }}______________</span>
                                </td>

                            </tr>
                            <tr>
                                <td colspan="2">
                                    <span class="">Totl Value:_______{{ $detail->total }}___________</span>
                                    <span class="">Advance:_____________________</span>
                                    <span class="">Balance_________________</span>
                                </td>
                            </tr>
                            <td colspan="2">
                                <span class="">Total Value in Words
                                    ______________________{{ num2word($detail->total) }}_____________________________</span>

                            </td>
                            <tr class="border-tosp">
                                <td colspan="2">
                                    <span class="">____________________________________</span>
                                    <span class="">Balance Amount Paid Date: _________________________</span>
                                </td>

                            </tr>
                        </tbody>

                    </table>
                    <div class="sig text-center">
                        <hr class="hr w-50" style="border: 1px solid black; margin: 40px 0px 0px 70px;">
                        <span>Seal & Signature</span>
                    </div>

                    <!-- seller and Purchaser signature here -->
                    <div class="row mt-4" style="font-weight: bold;">
                        <div class="col-6 text-start" style="font-size:10px">
                            <span>Seller Signature_______</span>
                        </div>
                        <div class="col-6 text-start" style="font-size:10px">
                            <span>Purchaser Signature_______</span>
                        </div>
                    </div>
                    <div class="row mt-2 mb-3" style="font-weight: bold;">
                        <div class="col-6 text-start" style="font-size:10px">
                            <p>C.N.I.C No:<span style="border: 1px solid black;">____________________</span></p>
                        </div>
                        <div class="col-6 text-start" style="font-size:10px">
                            <p>C.N.I.C No:<span style="border: 1px solid black;">____________________</span></p>
                        </div>
                    </div>

                </div>
            </div>


            <!-- =================================== table one end here ================================================================= -->
            <!-- =================================== 2nd table strart here ================================================================= -->

            <div class="col-lg-6 col-sm-6 mb-4">
                <div class="card h-auto">
                    <img class="card-img-top" src="{{ asset('assets/images/sale-img2.png') }}" alt="">
                    <table class="mt-4   table-2" style="font-size :10px; line-height: 30px; margin-left: 10px;">
                        <img style="position:absolute; width: 400px;margin: 350px 80px;" src="images/bike.png"
                            alt="">
                        <thead class="">
                            <tr>
                                <td colspan=" 2">
                                    <span class="rspt"> Sale Receipt No: ___{{ $detail->id }}________</span>
                                    <span class="tc">T.C. No:______________________</span>
                                    <span class="rspt">Date: ________{{ $detail->sale->date }}__________</span>
                                    <span class="tc">Time:________{{ $detail->sale->time }}_________</span>
                                </td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td colspan="2">
                                    <span class="rspt"> Regd No:
                                        ____________{{ $detail->register_no }}__________________</span>
                                    <span class="tc">Maker :__________{{ $detail->maker }}______________</span>
                                    <span class="rspt">Horse Power:
                                        ____________{{ $detail->horse_power }}__________</span>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <span class="rspt">Model:_________ {{ $detail->model }}_______________</span>
                                    <span class="tc">Engine
                                        No:___________{{ $detail->engine }}______________</span>
                                    <span class="rspt">Chassis Nos:
                                        ___________{{ $detail->chassis }}__________________</span>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <span class="rspt">Name Of Purchase:
                                        __________________________{{ $detail->buyer_name }}________________________</span>
                                    <span
                                        class="tc">S/o:_________________{{ $detail->buyer_father }}_____________________</span>
                                </td>

                            </tr>
                            <tr>
                                <td colspan="2">
                                    <span class="tc">Residance
                                        Address:________{{ $detail->buyer_address }}________________________________________</span>
                                </td>

                            </tr>
                            <tr>
                                <td colspan="2">
                                    <span class="rspt">Name Of Saller:
                                        _____________{{ $detail->purchase->owner_name }}____________________</span>
                                    <span
                                        class="tc">S/o:________{{ $detail->purchase->owner_father }}____________________________</span>
                                </td>

                            </tr>
                            <tr>
                                <td colspan="2">
                                    <span class="tc">Residance
                                        Address:_______{{ $detail->purchase->owner_address }}___________________________________________________</span>
                                </td>

                            </tr>
                            <tr>
                                <td colspan="2">
                                    <span class="rspt">
                                        ______________________________________________</span>
                                    <span
                                        class="tc">Mob#:_____{{ $detail->purchase->owner_phone }}________________________</span>
                                </td>

                            </tr>
                            <tr>
                                <td colspan="2">
                                    <span class="rspt">
                                        Guarantor Name:
                                        ________________{{ $detail->guarantor_name }}____________________</span>
                                    <span
                                        class="tc">S/O#:_______________________{{ $detail->guarantor_father }}_______________________</span>
                                </td>

                            </tr>
                            <tr>
                                <td colspan="2">
                                    <span class="rspt">
                                        Owner Name: ___________________________________________</span>
                                    <span class="tc">Previouse Reference:
                                        ______________________{{ $detail->pre_refrence }}____________________</span>
                                </td>

                            </tr>
                            <tr>
                                <td colspan="2">
                                    <span class="">Total Value : _______{{ $detail->total }}________</span>
                                    <span class="">Advance: ________________________</span>
                                    <span class="">Balance: __________________________</span>
                                    <span class="">Dated: _____________________</span>



                                </td>

                            </tr>
                            <tr>
                                <td colspan="2">
                                    <span class="">Amount in
                                        Words:__________________________{{ num2word($detail->total) }}__________________________________________________________________________________</span>

                                </td>

                            </tr>
                            <tr>
                                <td></td>

                                <td class="text-end">
                                    <span class="text-start" style='margin-right:40px;'>Amount in
                                        Words:_____________{{ num2word($detail->total) }}_____________________</span>

                                </td>

                            </tr>

                        </tbody>
                    </table>
                    <div class="sig text-center">
                        <hr class="hr w-50" style="border: 1px solid black; margin: 40px 0px 0px 170px;">
                        <span>Seal & Signature</span>
                    </div>
                    <!-- seller and Purchaser signature here -->
                    <div class="row mt-4" style="font-weight: bold; margin-left: 80px;">
                        <div class="col-6 text-start" style="font-size:15px">
                            <span>Seller Signature________________</span>
                        </div>
                        <div class="col-6 text-start" style="font-size:15px">
                            <span>Purchaser Signature_____________</span>
                        </div>
                    </div>
                    <div class="row mt-2 mb-3" style="font-weight: bold; margin-left: 80px;">
                        <div class="col-6 text-start" style="font-size:15px">
                            <p>C.N.I.C No:<span style="border: 1px solid black;">__________________________</span>
                            </p>
                        </div>
                        <div class="col-6 text-start" style="font-size:15px">
                            <p>C.N.I.C No:<span style="border: 1px solid black;">_________________________</span>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ===================================== 2nd table end here=================================================== -->
            <!-- ========================================== 3rd table start here ================================================== -->
            <div class="col-lg-2 col-sm-6 mb-4">
                <div class="card h-auto">
                    <img class="card-img-top" size="100px" src="{{ asset('assets/images/sale-img2.png') }}"
                        alt="">
                    <table class="mt-4  text-start table-3"
                        style="font-size :12px;line-height: 60px; margin-left: 10px;">

                        <thead>
                            <tr>
                                <td colspan="2">
                                    <span class="rspt"> Regd No: _______________________</span>

                                </td>


                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td colspan="2">
                                    <span class="">S.Receipt No: __________________</span>

                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <span class="">Time: __________________________</span>

                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <span class="">Date: _________________________</span>

                                </td>

                            </tr>
                            <tr>
                                <td colspan="2">
                                    <span class="">Name of Show Room</span>
                                    <span class="">_________________________________</span>


                                </td>

                            </tr>
                            <tr>
                                <td colspan="2">
                                    <span class="">Seal & Signature</span>
                                    <span class="">_________________________________</span>


                                </td>

                            </tr>
                            <tr>
                                <td colspan="2">
                                    <span class="">Sig: of Physical Checking Incharge</span>
                                    <span class="">_________________________________</span>

                                </td>

                            </tr>
                            <tr>
                                <td colspan="2">
                                    <span class="">Stamp & Date</span>
                                    <span class="">_________________________________</span>


                                </td>

                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>

        </div>
        <!-- /.row -->

        <!-- Pagination -->


    </div> --}}

    <!-- /.container -->
</body>

</html>
