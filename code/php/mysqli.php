<?php
$conn=new mysqli("localhost","root","root","test");
$conn->query("set names 'utf8'");
$sql="INSERT INTO `test`(`text`,`aaa`) VALUE (?,?)";
$conn_stmt=$conn->prepare($sql);
$conn_stmt->bind_param("ss","textContent","aaaContent");
$conn_stmt->execute();
$conn_stmt->close();
$conn->close();



?>