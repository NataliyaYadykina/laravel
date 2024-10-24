<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Logs. HW 8</title>
    <style>
        td:nth-child(5),
        td:nth-child(6) {
            text-align: center;
        }

        table {
            position: absolute;
            border-spacing: 0;
            border-collapse: collapse;
            width: 70%;
            box-shadow: 0px 4px 160px rgb(255 255 255 / 25%);
        }

        th,
        td {
            border: 1px solid black;
            padding: 8px;
        }

        tr:nth-child(odd) {
            background-color: #f2f2f2;
        }
    </style>
</head>

<body>
    <?php
    $db_server = '127.0.0.1';
    $db_user = 'root';
    $db_password = '';
    $db_name = 'gb_laravel';
    
    try {
        $db = new PDO("mysql:host=$db_server;dbname=$db_name", $db_user, $db_password, [PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8']);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
        $sql = 'SELECT id, time, duration, ip, url, method, input FROM logs_table_hw8';
    
        $statement = $db->prepare($sql);
    
        $statement->execute();
    
        $result_array = $statement->fetchAll();
    
        echo "<div class=\"table\">";
        echo '<table>';
        echo '<tr>';
        echo '<th>ID</th>';
        echo '<th>Time</th>';
        echo '<th>Duration</th>';
        echo '<th>IP</th>';
        echo '<th>URL</th>';
        echo '<th>Method</th>';
        echo '<th>Input</th>';
        echo '</tr>';
        foreach ($result_array as $row) {
            echo '<tr>';
            echo '<td>' . $row['id'] . '</td>';
            echo '<td>' . $row['time'] . '</td>';
            echo '<td>' . $row['duration'] . '</td>';
            echo '<td>' . $row['ip'] . '</td>';
            echo '<td>' . $row['url'] . '</td>';
            echo '<td>' . $row['method'] . '</td>';
            echo '<td>' . $row['input'] . '</td>';
            echo '</tr>';
        }
        echo '</table>';
        echo '</div>';
    } catch (PDOException $e) {
        echo 'Connection failed: ' . $e->getMessage();
    }
    
    $db = null;
    ?>
</body>

</html>
