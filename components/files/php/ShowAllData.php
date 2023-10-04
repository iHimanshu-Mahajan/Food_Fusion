<!-- PHP file for showing all the data from the database to the user/frontend, Author: Himanshu, Date: August 7 -->
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Stock Page</title>
    </head>
    
    <title>Applications</title>
    <style>
        body {
            background-color: #2d323e;
            color: #ff6600;
        }
        table{
            width: 70%;
            margin: auto;
            font-family: Arial, Helvetica, sans-serif;
        }
        table, tr, th, td{
            border: 1px solid #d4d4d4;
            border-collapse: collapse;
            padding: 12px;
        }
        th, td{
            text-align: left;
            vertical-align: top;
        }
        th {
            text-align: center;
        }
        td {
            color: white;
        }
        tr:nth-child(even){
            background-color: #3a4150;
        }
    </style>
<body>

        <h1 style="display: flex; justify-content:center">Applications which are needed to be Processed</h1>
           <?php
            // Connect to mysql
            try {
                 $dbh = new PDO('mysql:host=localhost;dbname=mahajahi_project', "mahajahi_nandini", "NandiniM#1992");
            } catch (Exception $e) {
                die('</ol><p style="color:red">Could not connect to DB: ' . $e->getMessage() . '</p></body></html>');
            }

            // get the information from the CD table
            $command = "SELECT * FROM applications";
            $stmt = $dbh->prepare($command);
            $stmt->execute();
            
            // Process all the rows
            /*
           
            while($row = $stmt->fetch()) { 
             echo "ID: " . $row["id"] . " Item Name: " . $row["itemName"] . " Number of items: " . $row["itemQuantity"] . "<br/>";
             }
              */
             
              echo '<table> <tr> <th> ID </th> <th> Name </th> <th> Email </th> <th> Phone No. </th> <th> Position </th> <th> Experience </th> <th> Availability </th> <th> Resume </th> </tr>';
            while($row = $stmt->fetch()) {
         // to output mysql data in HTML table format
           echo '<tr > <td>' . $row["id"] . '</td>
           <td>' . $row["itemname"] . '</td>
           <td> ' . $row["email"] . '</td>
           <td> ' . $row["phone"] . '</td>
           <td> ' . $row["position"] . '</td>
           <td> ' . $row["experience"] . '</td>
           <td> ' . $row["itemavailability"] . '</td>
           <td> ' . $row["itemresume"] . '</td> </tr>';
       }
      ?>
    </body>
</html>