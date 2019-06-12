<?php
//including the database connection file
include_once("crud.php");
 
$crud = new Crud();
 
//getting id of the data from url
$id = $crud->escape_string($_GET['id']);
 
//deleting the row from table
$result = $crud->execute("DELETE FROM customers WHERE id=$id");
$result = $crud->delete($id, 'customers');
 
if ($result) {
    //redirecting to the display page (index.php in our case)
    header("Location:deleteuser2.php?id=$id");
}
?>
