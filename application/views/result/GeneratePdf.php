<!DOCTYPE html>
<html>

<head>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta charset="utf-8">
    <title>Routine</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" type="text/css" rel="stylesheet" />

    <style>
        table,
        td {
            border: 1px solid black;
            margin-left: auto;
            margin-right: auto;
            border-collapse: collapse;

        }

        ;
    </style>

</head>

<body>
    <h3 style="text-align: center;">West Bengal Board of Secondary Education</h3>
    <p style="text-align: center; color: black;"> Academic Session (2023) </p>
    <p style="text-align: center; color: black;"><?= $arr['exam_name'] ?> ,2023</p>

    <div>
        <table border="1px solid" style="width: 500px;">
            <?php foreach ($data as $k => $d) :
                $name = $d->name;
                $student_id = $d->student_id;
                $exam_name = $d->exam_name;
                $class = $d->class;
            ?>
            <?php endforeach;
            ?>

            <tbody id="listRecords">
                <tr>
                    <td style="width: 250px;">Name of Student :</td>
                    <th><?= $name ?></th>
                </tr>

                <tr>
                    <td>Name of Father/Guardian :</td>
                    <th> -- </th>
                </tr>
                <tr>
                    <td>Student id :</td>
                    <th><?= $student_id ?></th>
                </tr>

                <tr>
                    <td>Exam Type :</td>
                    <th><?= $exam_name ?></th>
                </tr>
                <tr>
                    <td>Name of School :</td>
                    <th>Kalpathar Binapani High School</th>
                </tr>
                <tr>
                    <td>Name of Class :</td>
                    <th><?= $class ?></th>
                </tr>

                <tr>
                    <td>Total Numbar- :</td>
                    <th><?= $arr['total'] ?></th>
                </tr>

                <tr>
                    <td>Percentage :</td>
                    <th><?= $arr['percentage'] ?></th>
                </tr>
                <tr>
                    <td>Result [<?= $exam_name ?>] :</td>
                    <th><?= $arr['result'] ?></th>
                </tr>
            </tbody>
        </table>
        <br>
        <table border="1px solid" style="width: 500px;">
            <thead>
                <th style="width: 250px;">Subjact</th>
                <th>Marks </th>
                <th>Grade </th>
                <th>Remarks</th>
                <th>Full Marks</th>
            </thead>
            <tbody>
                <tr>
                    <td><?= $arr['s1'] ?></td>
                    <th style="text-align: center;"><?= $arr['m1'] ?></th>
                    <th> <?= $arr['remark1'] ?></th>
                    <th> <?= $arr['re1'] ?> </th>
                    <th> 100 </th>
                </tr>
                <tr>
                    <td><?= $arr['s2'] ?></td>
                    <th style="text-align: center;"><?= $arr['m2'] ?></th>
                    <th> <?= $arr['remark2'] ?></th>
                    <th> <?= $arr['re2'] ?> </th>
                    <th> 100 </th>
                </tr>
                <tr>
                    <td><?= $arr['s3'] ?></td>
                    <th style="text-align: center;"><?= $arr['m3'] ?></th>
                    <th> <?= $arr['remark3'] ?></th>
                    <th> <?= $arr['re3'] ?> </th>
                    <th> 100 </th>
                </tr>

                <?php
                $m4 = $arr['m4'];
                if ($m4) {
                    $s4 = $arr['s4'];
                    $m4 = $arr['m4'];
                    $remark4 = $arr['remark4'];
                    $re4 = $arr['re4'];
                    echo "
                     <tr>
                    <td>$s4</td>
                    <th style='text-align: center;'>$m4 </th>
                    <th>$remark4</th>
                    <th>$re4 </th>
                    <th> 100 </th>
                     </tr>
                     ";
                }
                ?>

                <?php
                $m5 = $arr['m5'];
                if ($m4) {
                    $s5 = $arr['s5'];
                    $m5 = $arr['m5'];
                    $remark5 = $arr['remark5'];
                    $re5 = $arr['re5'];
                    echo "
                     <tr>
                    <td>$s5</td>
                    <th style='text-align: center;'>$m5 </th>
                    <th>$remark5</th>
                    <th>$re5 </th>
                    <th> 100 </th>
                     </tr>
                     ";
                }
                ?>


                <?php
                $m6 = $arr['m6'];
                if ($m6) {
                    $s6 = $arr['s6'];
                    $m6 = $arr['m6'];
                    $remark6 = $arr['remark6'];
                    $re6 = $arr['re6'];
                    echo "
                     <tr>
                    <td>$s6</td>
                    <th style='text-align: center;'>$m6 </th>
                    <th>$remark6</th>
                    <th>$re6 </th>
                    <th> 100 </th>
                     </tr>
                     ";
                }
                ?>

                <?php
                $m7 = $arr['m7'];
                if ($m7) {
                    $s7 = $arr['s7'];
                    $m7 = $arr['m7'];
                    $remark7 = $arr['remark7'];
                    $re7 = $arr['re7'];
                    echo "
                     <tr>
                    <td>$s7</td>
                    <th style='text-align: center;'>$m7 </th>
                    <th>$remark7</th>
                    <th>$re7 </th>
                    <th> 100 </th>
                     </tr>
                     ";
                }
                ?>

                <tr>
                    <th>Total Numbar- :</th>
                    <th style="text-align: center;"><?= $arr['total'] ?></th>
                    <th>--</th>
                    <th> -- </th>
                    <th> 700 </th>
                </tr>

            </tbody>
        </table>
    </div>
</body>

</html>