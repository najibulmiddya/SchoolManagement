<!DOCTYPE html>
<html>
<head>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta charset="utf-8">
    <title>Generate Pdf</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" type="text/css" rel="stylesheet" />
</head>
<body>
    <h1 style="text-align: center;">* ALL STUDENTS *</h1>
    <table border="1px sold black">
        <thead style="background-color: orange; color:white">
            <tr>
                <th style="padding: 10px;"> S.NO </th>
                <th> Name </th>
                <th> Mobile No </th>
                <th> Email </th>
                <th> Gender </th>
                <th> D.O.B </th>
                <th> Address </th>
            </tr>
        </thead>
        <tbody style="background-color: antiquewhite;color:black">
            <?php
            if ($students) :
                $a = 1;
                foreach ($students as $k => $d) :
            ?>
                    <tr style="text-align: center;">
                        <td><?= $a++ ?></td>
                        <td><?= $d->name ?></td>
                        <td><?= $d->mobile ?></td>
                        <td><?= $d->email ?></td>
                        <td><?php if ($d->gender == 'Male') {
                                echo 'M';
                            } elseif ($d->gender == 'Female') {
                                echo 'F';
                            } ?></td>
                        <td><?= $d->dob ?></td>
                        <td><?= $d->address ?></td>
                    </tr>
            <?php endforeach;
            endif; ?>
        </tbody>
    </table>
    </div>
    </table>
</body>
</html>