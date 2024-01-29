<!DOCTYPE >
<html>

<head>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta charset="utf-8">
    <title>Generate Pdf</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" type="text/css" rel="stylesheet" />
</head>

<body>
    <p style="text-align: center;"> TimeTables</p>
    <table border="1px sold black" style="margin: auto;">
        <thead>
            <tr>
                <th> S.NO </th>
                <th> Subject </th>
                <th> Teacher</th>
                <th> Starting Time </th>
                <th> End Time </th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($data) :
                $a = 1;
                foreach ($data as $k => $d) :
            ?>
                    <tr style="text-align: center;">
                        <td><?= $a++ ?></td>
                        <td><?= $d->sub_name ?></td>
                        <td><?= $d->tea_name ?></td>
                        <td><?= $d->starting_time ?></td>
                        <td><?= $d->end_time ?></td>
                    </tr>
            <?php endforeach;
            endif; ?>
        </tbody>
    </table>
    </div>
    </table>
</body>

</html>