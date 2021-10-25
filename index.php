<?php
  try {
    //Connect to DB
    $dbh = new PDO('mysql:host=localhost; dbname=company; charset=utf8', 'root', '');
  } catch (PDOException $e) {
    //Display Errors
    echo $e->getMessage();
  }

  /* SELECT DATA */
  //Create Query
  $sth = $dbh->query('SELECT * FROM employees');

  //Set Fetch Mode - Array/Objects/Num
  $sth->setFetchMode(PDO::FETCH_OBJ);
?>

<table width="500" cellpadding=5 cellspacing=5 border=1>
  <tr>
    <th>ID#</th>
    <th>First Name</th>
    <th>Last Name</th>
    <th>Dept</th>
    <th>Email</th>
  </tr>
  <?php while($row = $sth->fetch()) : ?>
  <tr>
    <td><?php echo $row->id; ?></td>
    <td><?php echo $row->first_name; ?></td>
    <td><?php echo $row->last_name; ?></td>
    <td><?php echo $row->department; ?></td>
    <td><?php echo $row->email; ?></td>
  </tr>
  <?php endwhile; ?>
</table>

<?php
  /* INSERT DATA */

  //Create Dummy Variables
  $first_name = "David";
  $last_name = "Johnson";
  $dept = "Design";
  $email = "djohnson@yahoo.com";

  //Create Statement
  $sth = $dbh->prepare("INSERT INTO employees (first_name, last_name, department, email) VALUES
  (:first_name, :last_name, :department, :email)");

  //Bind Values
  $sth->bindParam(':first_name', $first_name);  
  $sth->bindParam(':last_name', $last_name);  
  $sth->bindParam(':department', $dept);  
  $sth->bindParam(':email', $email); 

  //Execute
  $sth->execute();
?>