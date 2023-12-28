<!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous"> -->
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <img src="" alt="">
                <h2 align="center">LEAVE ACCOUNT (TEACHING & NOT-TEACHING STAFF)</h2>
                <table>
                    <tr>
                        <td colspan="2">IN RESPECT OF:</td>
                        <td colspan="16" style="text-align:center;border-bottom: 1px solid #000;">{{$employee->name}}, {{$employee->designation->designation}} (BPS-{{$employee->designation->bps}})</td>
                    </tr>
                    <tr>
                        <td colspan="2">DATE OF APPOINTMENT:</td>
                        <td colspan="10" style="text-align:center; border-bottom: 1px solid #000;">{{$employee->doa}}</td>
                        <td class="">Date of attending the age of superannation:</td>
                        <td colspan="8" style="text-align:center; border-bottom: 1px solid #000;"> {{date('Y-m-d h:i:sA ')}}</td>
                    </tr>
                    <tr>
                        <td colspan="2">PLACE OF POSTING:</td>
                        <td colspan="10"> Workers Welfare Board Education Section</td>
                    </tr>
                </table>
                <table border="1" align="center" cellspacing="0" cellpadding='7' style="width: 100%; text-align:center;">
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

                    <tbody>
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
                        $old = "";
                        $leave_credit = 0;
                        $totalDays = 0;
                        ?>
                        @foreach ($leaves as $key=>$leave)
                        <tr>
                            <?php
                            // $from = $to;
                            $from = ($old) ? $old : $leave->employee->doa;
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
                            <td>{{$leave->employee->name}}</td>
                            <td>{{date('d.m.y',strtotime($from))}}</td>
                            <td>{{date('d.m.y',strtotime($to))}}</td>
                            <td>{{str_pad($deff->y, 2, '0', STR_PAD_LEFT)}}</td>
                            <td>{{str_pad($deff->m, 2, '0', STR_PAD_LEFT)}}</td>
                            <td>{{str_pad($deff->d, 2, '0', STR_PAD_LEFT)}}</td>
                            <td>{{$c_month}}</td>
                            <td>{{$earn_leave}}</td>
                            <td>{{$leave_credit}}</td>
                            <td>{{date('d.m.y',strtotime($leave->from))}}</td>
                            <td>{{date('d.m.y',strtotime($leave->to))}}</td>
                            <td>{{$leave->leave_type}}</td>
                            <td>{{$totalDays}}</td>
                            <td>{{$leave_credit-$totalDays}}</td>
                        </tr>
                        <?php
                        $old = date('Y-m-d', strtotime('+1 day' . $leave->to));
                        ?>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div> <!-- end col -->
</div>