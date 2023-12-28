<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Report</title>
    <link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
    <style>
        .page-break {
            page-break-after: always;
        }
    </style>
</head>

<body>
    <div class="container-fluid">
        <div class="row mt-4">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h2 class="text-center">LEAVE ACCOUNT (TEACHING & NOT-TEACHING STAFF)</h2>
                        <div class="row">
                            <div class="col-2">
                                IN RESPECT OF:
                            </div>
                            <div class="col-10">
                                {{ $employee->name }}, {{ $employee->designation->designation }}
                                (BPS-{{ $employee->designation->bps }})
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-2">
                                DATE OF APPOINTMENT:
                            </div>
                            <div class="col-3">
                                {{ $employee->doa }}
                            </div>
                            <div class="col-3">
                                Date of attending the age of supernnation:
                            </div>
                            <div class="col-4">
                                {{ date('Y-m-d h:i:sA') }}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-2">
                                PLACE OF POSTING:
                            </div>
                            <div class="col-10">
                                Workers Welfare Board Education Section
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-bordered text-center">
                                <thead>
                                    <tr>
                                        <th rowspan="2">Name of office served under</th>
                                        <th colspan="6">Period of duty</th>
                                        <th>Leave earned in full pay 1-day or each calender month</th>
                                        <th>Leave at Credit (Column 12*6)</th>
                                        <th colspan="2">Period of Applied Leave</th>
                                        <th rowspan="2">Nature of Leave Santioned</th>
                                        <th>Total Leave</th>
                                        <th>Balance on return form leave</th>
                                    </tr>
                                    <tr>
                                        <th>From</th>
                                        <th>To</th>
                                        <th>Y</th>
                                        <th>M</th>
                                        <th>D</th>
                                        <th>Full Calender Month</th>
                                        <th>Days</th>
                                        <th>Days</th>
                                        <th>From</th>
                                        <th>To</th>
                                        <th>Days</th>
                                        <th>Days</th>
                                    </tr>
                                </thead>

                                <body>
                                    <tr>
                                        <td>1</td>
                                        <td>2</td>
                                        <td>3</td>
                                        <td colspan="3">4</td>
                                        <td>5</td>
                                        <td>6</td>
                                        <td>7</td>
                                        <td>8</td>
                                        <td>9</td>
                                        <td>10</td>
                                        <td>11</td>
                                        <td>12</td>
                                    </tr>
                                    <?php
                                    $from = $employee->doa;
                                    $to = $employee->doa;
                                    $old = '';
                                    $leave_credit = 0;
                                    $totalDays = 0;
                                    ?>
                                    @foreach ($leaves as $key => $leave)
                                        <tr>
                                            <?php
                                            // $from = $to;
                                            $from = $old ? $old : $leave->employee->doa;
                                            $to = date('Y-m-d', strtotime('-1 day' . $leave->from));
                                            // $to = $leave->from;

                                            // Calculate the difference
                                            $date1 = new DateTime($from);
                                            $date2 = new DateTime($to);
                                            $deff = $date1->diff($date2);

                                            $c_month = 0;
                                            if ($deff->y) {
                                                $c_month += $deff->y * 12;
                                            }
                                            if ($deff->m) {
                                                $c_month += $deff->m;
                                            }
                                            if ($deff->d >= 15) {
                                                $c_month++;
                                            }

                                            $earn_leave = $c_month * $leave->employee->designation->leave;
                                            $date1 = new DateTime($leave->from);
                                            $date2 = new DateTime($leave->to);
                                            $deff_leave = $date1->diff($date2);

                                            $leave_credit += $earn_leave - $totalDays;
                                            $totalDays = $deff_leave->days + 1;

                                            ?>
                                            <td>{{ $leave->employee->name }}</td>
                                            <td>{{ $from }}</td>
                                            <td>{{ $to }}</td>
                                            <td>{{ $deff->y }}</td>
                                            <td>{{ $deff->m }}</td>
                                            <td>{{ $deff->d }}</td>
                                            <td>{{ $c_month }}</td>
                                            <td>{{ $earn_leave }}</td>
                                            <td>{{ $leave_credit }}</td>
                                            <td>{{ $leave->from }}</td>
                                            <td>{{ $leave->to }}</td>
                                            <td>{{ $leave->leave_type }}</td>
                                            <td>{{ $totalDays }}</td>
                                            <td>{{ $leave_credit - $totalDays }}</td>
                                        </tr>
                                        <?php
                                        $old = date('Y-m-d', strtotime('+1 day' . $leave->to));
                                        ?>
                                    @endforeach
                                </body>
                            </table>
                        </div>
                    </div>
                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->
    </div><!-- container -->
</body>

</html>
