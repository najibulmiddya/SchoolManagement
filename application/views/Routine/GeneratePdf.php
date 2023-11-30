<!DOCTYPE html>
<html>

<head>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta charset="utf-8">
    <title>Routine</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" type="text/css" rel="stylesheet" />

    <style>
        table,
        th,
        td {
            border: 1px solid black;
            margin-left: auto;
            margin-right: auto;
            border-collapse: collapse;
            text-align: center;
        };
    </style>

</head>

<body>
    <h3 style="text-align: center;">West Bengal Board of Secondary Education</h3>

    <?php foreach ($data as $k => $d) :
        $exam_name = $d->exam_name;
        $year = $d->year;
    ?>

    <?php endforeach;
    ?>
    <p style="text-align: center; color: black;"> ( Academic Session <?= $year ?>)</p>
    <p style="text-align: center; color: black;"><?= $exam_name ?> </p>
    
    <div style="text-align: center;">
        <table border="1px solid" style="width: 650px;">
            <thead class="table-warning">
                <tr>
                    <th class="text-light"> DATE</th>
                    <th class="text-light"> TIME </th>
                    <th class="text-light"> SUBJACT </th>
                </tr>
            </thead>
            <tbody id="listRecords">
                <?php
                if ($data) :
                    foreach ($data as $k => $d) :
                ?>
                        <tr>
                            <td><?=date("d-m-Y", strtotime($date = $d->date)); ?> <br>(<?= ucfirst($d->week) ?>)</td>
                            <td><?=date("h:i A", strtotime($date = $d->time)); ?> To <?= date("h:i A", strtotime($date = $d->time_to)); ?></td>
                            <td><?= $d->sub_name ?></td>
                        </tr>

                <?php endforeach;

                endif; ?>
            </tbody>
        </table>
    </div>


</body>

</html>