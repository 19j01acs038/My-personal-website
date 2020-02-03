<DOCTYPE html>
<html>

<table  border=1 cellpadding=1>

<tr>
<th colspan="5"><h2> Student Records</h2></th>
   </tr>
   <tr>
<th>Name</th>
<th>E-mail</th>
<th>Cellephone</th>
<th>Subject</th>

<th>Mssage</th>

</tr>
<?php
$con =  mysqli_connect('localhost', 'root','');

if(!mysqli_select_db($con,'project'))
{
echo "Database Not Selected";
}

$sql = "SELECT * FROM contact";

$records = mysqli_query($con,$sql);

while ($row = mysqli_fetch_array($records))
{
echo "<tr>";
echo "<td>".$row["name"]."</td>";
echo "<td>".$row["email"]."</td>";
echo "<td>".$row["cellephone"]."</td>";
echo "<td>".$row["Subject"]."</td>";
echo "<td>".$row["message"]."</td>";
}
?>
</html>