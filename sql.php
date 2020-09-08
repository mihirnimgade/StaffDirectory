<!DOCTYPE html>
<html>
    <title>
        Cambridge Staff Directory
    </title>

    <head>
        <link rel="stylesheet" type="text/css" href="style.css">
        <link rel="shortcut icon" type="image/png" href="/~mihirumeshnimgade/asset.png"/>
    </head>



    <body>
        <div class="a">
            <h1>Cambridge Staff Directory</h1>
            <h2> Search </h2>

        <form action="/~mihirumeshnimgade/sql.php" method="POST" target="_self" autocomplete="off">
            By Name: <input type="text" name="name"><br><br>
            <input type="submit" name="submit">

        </form>

        </div>

        <?php
        $servername = "localhost";
        $username = "root";
        $password = "11235813";
        $table = "teachers";
        $queryname = $_POST["name"];

        $conn = new mysqli($servername, $username, $password, $table);

        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        $sql = "SELECT * FROM $table WHERE FirstName LIKE '%$queryname%'";

        if (strlen($queryname) === 0){
            $sql = "";
        }

        if ($result = $conn->query($sql)) {
            if($result->num_rows > 0){
                // output data of each row
                echo "<table style=\"width:100%\">";
                echo "<tr> <th>TeacherID</th> <th>First Name</th> <th>Last Name</th> <th>Email</th> <th>FormClass</th> <th>Position</th> </tr>";

                while($array = $result->fetch_array()) {

                    echo "<tr> <td>". $array["TeacherID"]. "</td>";
                    echo "<td>". $array["FirstName"]. "</td>";
                    echo "<td>". $array["LastName"]. "</td>";
                    echo "<td>". $array["Email"]. "</td>";
                    echo "<td>". $array["FormClassYear"] . "/". $array["FormClassDivision"] . "</td>";
                    echo "<td>". $array["Position"] . "</td></tr>";

                }
            }
        }

        else {
            echo "<br><div class='a'>0 results</div>"."<br><br>";
        }

        $conn->close();

        ?>
    </body>

    <footer>
        <br>
        <img class="valign" src="/~mihirumeshnimgade/homeimg.svg" width="20px" height="20px">
        <a class="valign" href="/~mihirumeshnimgade/home.html">Home</a><br><br>
    </footer>

</html>
