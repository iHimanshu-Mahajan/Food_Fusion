<!-- PHP file for creating a table of (input data) to the database, Author: Himanshu, Date: August 7 -->
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Creating table</title>
    </head>
    <body>
        <h1>Creating a table in SQL</h1>
        <ol>
            <?php
            // Connect to mysql and insert a row in the cd table
            try {
                $dbh = new PDO('mysql:host=localhost;dbname=mahajahi_project', "mahajahi_nandini", "NandiniM#1992");
                 // sql to create table
                $sql = "CREATE TABLE applications (
                id INT(6) PRIMARY KEY, 
                itemname VARCHAR(30) NOT NULL,
                email VARCHAR(50) NOT NULL,
                phone BIGINT(10) NOT NULL,
                position VARCHAR(30) NOT NULL,
                experience VARCHAR(10) NOT NULL,
                itemavailability VARCHAR(100) NOT NULL,
                itemresume VARCHAR(3000) NOT NULL
                )";

                // use exec() because no results are returned
                $dbh->exec($sql);
                echo "Table Stock created successfully";
                }
            catch(PDOException $e)
                {
                echo $sql . "<br>" . $e->getMessage();
                }

                $dbh = null;
                              
            ?>
        </ol>
        <?php
        echo "<i style='color:red'>$sql</i><br/>\n"; // uncommment this for debugging
        ?>
    </body>
</html>




