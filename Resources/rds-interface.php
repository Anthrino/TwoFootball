<!DOCTYPE html>
<html>
    <head>
        <style>
            table {
    width: 100%;
    border-collapse: collapse;
}

table, td, th {
    border: 1px solid black;
    padding: 5px;
}

th {text-align: left;}
        </style>
    </head>
    <body>
        <?php
$q = intval($_GET['q']);

$con = mysqli_connect('remote-rds.cks1ufcqz3ra.us-west-2.rds.amazonaws.com','admin','8characters','twofootball');
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}

mysqli_select_db($con,"twofootball");
// $sql="SELECT * FROM searchlist WHERE id = '".$q."'";
$sql="SELECT * FROM searchlist";

$result = mysqli_query($con,$sql);

echo "<table>
        <tr>
            <th>
                Firstname
            </th>
            <th>
                Lastname
            </th>

        ";
while($row = mysqli_fetch_array($result)) {
    echo "
        <tr>
            ";
    echo "
            <td>
                " . $row['Title'] . "
            </td>
            ";
    echo "
            <td>
                " . $row['Link'] . "
            </td>
            ";
    echo "
        </tr>
        ";
}
echo "
    </body>
</html>
";
mysqli_close($con);
?>
