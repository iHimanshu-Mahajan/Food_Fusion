<!-- PHP file for adding the data to the database, Author: Himanshu, Date: August 7 -->
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Data Add Page</title>
    </head>
    <body>
        <h1>Data Creation Confirmation</h1>
        <?php
        // Connect to mysql
         try {
                 $dbh = new PDO('mysql:host=localhost;dbname=mahajahi_project', "mahajahi_nandini", "NandiniM#1992");
            } catch (Exception $e) {
                die('</ol><p style="color:red">Could not connect to DB: ' . $e->getMessage() . '</p></body></html>');
            }

        // do the insert
        $command = "INSERT INTO applications (itemname, email, phone, position, experience, itemavailability, itemresume) VALUES (?,?,?,?,?,?,?)";
        $stmt = $dbh->prepare($command);
        $result = $stmt->execute(array($_POST['itemNm'], $_POST['itemEmail'], $_POST['itemPhone'], $_POST['itemPosition'], $_POST['itemExperience'], $_POST['itemAvailability'], $_POST['itemResume']));
        if ($result) {
            echo "<p>Insert successful</p>";
        } else {
            echo "<p>Insert failed</p>";
        }
        ?>
        <?php
        echo "<i style='color:blue'>$command</i><br>\n"; // uncommment this for debugging
        ?>
        <p>
            <a href='./ShowAllData.php'>Show Stock</a>
        </p>

    </body>
</html>