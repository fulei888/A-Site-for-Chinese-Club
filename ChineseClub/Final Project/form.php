<html>
<body>
<h1>Dear <?php echo $_POST["name"]; ?></h1>
<p>Thank you for your comments. We will do our best make Chinese club better. Your imformation is saved in newfile.txt and the informations have been sent to Professor Smith
</p>
<?php
$myfile = fopen("newfile.txt", "w") or die("Unable to open file!");
//$name = "Name: ".$_POST["name"]."\n";
$name = $_POST["name"];
fwrite($myfile, $txt1);
$birthday = $_POST["birthday"];
fwrite($myfile, $txt2);
$email = $_POST["email"];
fwrite($myfile, $txt3);
$gender = $_POST["gender"];
fwrite($myfile, $txt4);
$place = $_POST["liststate"];
fwrite($myfile, $txt5);
$message = $_POST["message"];
fwrite($myfile, $txt6);

fclose($myfile);?>
<?php
// the message
$msg = $txt;

// use wordwrap() if lines are longer than 70 characters
$msg = wordwrap($msg,70);

// send email
//mail("532630938@qq.com","IT240 Email Test File From Lei Fu",$msg);
//mail("j.smith@byuh.edu","IT240 Email Test File From Lei Fu",$msg);

?>



<?php
$servername = "localhost";
$username = "fulei888";
$password = "Wsedfl19860119";

// Create connection
$conn = mysql_connect($servername, $username, $password);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysql_connect_error());
}
echo "Connected successfully<br>";

// Create database
mysql_select_db("fulei888_fulei888");
$query = "SELECT * FROM test;";
$result = mysql_query($query);
if(!$result){
    echo mysql_error();
}
$row = mysql_fetch_assoc($result);
echo $row['id']."<br>";
echo $row['Name']."<br>";
echo $row['Birthday']."<br>";
echo $row['Email']."<br>";
echo $row['Gender']."<br>";
echo $row['Place']."<br>";

// $sql = "INSERT INTO test (id, Name, Birthday,Email,Gender,Place) VALUES ('5', $name, $birthday,$email,$gender,$place)";
$sql = "INSERT INTO test ( Name,Birthday,Email,Gender,place, message) VALUES ( '$name', '$birthday','$email','$gender','$place', '$message')";
//$sql = "DELETE FROM test LIMIT 10;SET @autoid:=0; UPDATE test SET ID=@autoid:=(@autoid+1);ALTER TABLE test AUTO_INCREMENT=1;";

if(mysql_query($sql, $conn)){
    echo "Records inserted successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysql_error($conn);
}
 
// Close connection


$result = mysql_query("SELECT * FROM test");

echo "<table border='1' id= results>
<tr>
<th>ID</th>
<th>Name</th>
<th>Birthday</th>
<th>Email</th>
<th>Gender</th>
<th>Place</th>
<th>message</th>

</tr>";

while ($row = mysql_fetch_array($result, MYSQL_NUM)) {
    printf("<br>"."ID: %s  Name: %s Birthday: %s Email %s Gender %s Place %s message %s", $row[0], $row[1],$row[2], $row[3], $row[4], $row[5], $row[6]); 
     echo "<tr>"; 

    echo "<td>" . $row[0] . "</td>";
    echo"<td>". $row[1]."</td>";
    echo"<td>". $row[2]."</td>";
    echo"<td>". $row[3] ."</td>";
    echo"<td>". $row[4] ."</td>";
    echo"<td>". $row[5] ."</td>";
    echo"<td>". $row[6] ."</td>";
   
  echo "</tr>";
}

mysql_free_result($result);
mysql_close($conn);


?>

</body>
</html>