<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="assest/style.css">
    <link rel="stylesheet" href="https://unpkg.com/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://unpkg.com/bs-brain@2.0.3/components/logins/login-7/assets/css/login-7.css">
    <style>
        * {
            margin: 0px;
            padding: 0px;
            }
            .honda-logo img {
            margin: 0px;
            }
            .card {
            width: 100%;
            }

    </style>
</head>
<body>
    <!-- Login 7 - Bootstrap Brain Component -->
    <section class="bg-light p-1 p-md-2 p-xl-2">
        <div class="container">
            <!-- this area logo -->
            <div class="row justify-content-center">
                <div class="col-12 col-md-9 col-lg-7 col-xl-6 col-xxl-5">
                    <div class="card border border-light-subtle rounded-4">
                        <div class="card" style="width:100%">
                            <img src="{{asset('assets/images/card.jpg')}}" class="card-img-top" alt="...">
                            <!-- end of logo -->
                            <div class="card-body">
                                <div class="row mt-3">
                                    <div class="col-7 text-start">
                                        <spanf>NO: {{$payment->id}}</spanf>
                                    </div>
                                    <div class="col-5 text-end">
                                        <spanf>Date: {{$payment->date}}</spanf>
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-8">
                                        <div class="row mt-2">
                                            <div class="col-12">
                                                <spanf>Received from
                                                    Mr./Mrs {{$payment->paymentable->customer->customer_name ?? ''}}
                                                </spanf>
                                            </div>
                                        </div>
                                        <div class="row mt-2">
                                            <div class="col-12">
                                                <spanf>The Sum of Rupees: {{num2word($payment->received)}}
                                                </spanf>
                                            </div>
                                        </div>
                                        <div class="row mt-2">
                                            <div class="col-12">
                                                <spanf>on Account
                                                    of {{$payment->received}}
                                                </spanf>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <img src="{{asset('storage/'.$payment->image)}}" class="img-thumbnail">
                                    </div>
                                </div>


                                <div class="row mt-2">
                                    <div class="col-7 text-start">
                                    </div>
                                    <div class="col-5 text-end">
                                        <span>Total: {{$payment->total}}</span><br>
                                        <span>Cash Received: {{$payment->received}}</span>
                                        <span>Balance: {{$payment->pending}}</span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-7 text-start">
                                        <span>For the Month of</span>
                                    </div>
                                    <div class="col-5 text-start">
                                        <span></span>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-7 text-start">
                                        <span>Rs: {{$payment->received}}</span>
                                    </div>
                                    <div class="col-5 text-end">
                                        <span>Signature:_______________</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>
</body>

</html>
