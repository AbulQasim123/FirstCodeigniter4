<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PDF</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        table th,table td {
            padding: 10px;
            border: 1px solid #ddd;
            text-align: center;
        }

        table th {
            background: #0c1c60;
            color: #fff;
            font-weight: bold;
        }

        table tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        /* table tr:hover {
            background-color: #e0e0e0;
        } */
        #heading{
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2 id="heading">Generate PDF By Codeigniter 4</h2>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Mobile</th>
                    <th>Designation</th>
                    <th>Gender</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (count($datas) > 0) {
                    foreach ($datas as $key => $data) {
                ?>
                        <tr>
                            <td><?= $data->id  ?></td>
                            <td><?= $data->name  ?></td>
                            <td><?= $data->email  ?></td>
                            <td><?= $data->mobile  ?></td>
                            <td><?= $data->designation  ?></td>
                            <td><?= $data->gender  ?></td>
                        </tr>
                <?php
                    }
                }
                ?>
            </tbody>
        </table>
    </div>
</body>

</html>