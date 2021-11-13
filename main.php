<?php

$hostname = 'localhost';
$username = 'iobzrugd_LynciaBrown';
$password ='Walyncia.brown!12';
$databaseName ='iobzrugd_testingDatabase';


$conn = mysqli_connect ($hostname, $username,$password,$databaseName);

if(!$conn){
    die("connection failed" .mysqli_connect_error());
}
$isbn = $_POST["isbn"];
 

echo "<h1>Search Results for $isbn</h1>";

$sql = "SELECT BOOK.ISBN, BOOK.InventoryCount, BOOK.price, BOOK.InventoryCount, BOOK.edition, BOOK.title, COURSE.CRN, COURSE.Course_Num FROM BOOK, COURSE, BOOK_COURSE WHERE BOOK.price < 100 AND BOOK.ISBN = BOOK_COURSE.Book_ISBN AND COURSE.CRN = BOOK_COURSE.Course_CRN AND BOOK.ISBN = $isbn";


$results = mysqli_query($conn,$sql) or die("Bad query: $sql");

echo "<table id='myTable' border='1'>
  <tr>
    <th>Title</th>
    <th>Edition</th>
    <th>ISBN</th>
    <th>Inventory Count</th>
    <th>price</th>
    <th>Course</th>
    <th>Course CRN</th>
  </tr>" ;

while ($row = mysqli_fetch_assoc($results))
    {
    echo "<tr> 
        <td>{$row ['title']}</td>
        <td>{$row ['edition']}</td>
        <td>{$row ['ISBN']}</td>
        <td>{$row ['InventoryCount']}</td>
        <td>{$row ['price']}</td>
        <td>{$row ['Course_Num']}</td>
        <td>{$row ['CRN']}</td>
    </tr>";
}

echo "</table>";


mysqli_close($conn);

?>


