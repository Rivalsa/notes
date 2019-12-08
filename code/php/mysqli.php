<?php
// 连接数据库时可以直接指定使用的数据库名,也可以在连接后再指定
$conn = new mysqli("localhost","root","root","test");
// 或者
$conn = new mysqli("localhost","root","root");
$conn -> select_db("rest");

// 插入(预编译)
$conn = new mysqli("localhost","root","root","test"); // 连接数据库
$conn -> query("set names 'utf8'"); // 设置字符集
$sql = "INSERT INTO `test`(`text`,`aaa`) VALUE (?,?)"; // SQL语句
$conn_stmt = $conn -> prepare($sql); // 预编译
$textContent = "textContent";
$aaaContent = "aaaContent";
$conn_stmt -> bind_param("ss",$textContent,$aaaContent); // s表示字符串 i表示数字
$conn_stmt -> execute(); // 执行
$conn_stmt -> close();
$conn -> close();

// 插入(未预编译)
$conn = new mysqli("localhost","root","root","test"); // 连接数据库
$conn -> query("set names 'utf8'"); // 设置字符集
$sql="INSERT INTO `test`(`text`,`aaa`) VALUE ('textContent','aaaContent')"; // SQL语句
$conn -> query($sql); // 执行
$conn -> close();

// 查询(预编译)
$conn = new mysqli("localhost","root","root","test"); // 连接数据库
$conn -> query("set names 'utf8'"); // 设置字符集
$sql = "SELECT `text`,`aaa` FROM `test` WHERE `text`=?"; // SQL语句
$conn_stmt = $conn -> prepare($sql); // 预编译
$textContent = "textContent";
$conn_stmt -> bind_param("s",$textContent); // s表示字符串 i表示数字
$conn_stmt -> bind_result($aa,$bb);
$conn_stmt -> execute(); // 执行
while($conn_stmt -> fetch()) {
    echo "$aa===$bb#";
}
$conn_stmt -> close();
$conn -> close();

// 查询(未预编译)
$conn = new mysqli("localhost","root","root","test"); // 连接数据库
$conn -> query("set names 'utf8'"); // 设置字符集
$sql = "SELECT `text`,`aaa` FROM `test` WHERE `text`='textConten'"; // SQL语句
$result = $conn -> query($sql); // 执行
while($result2 = $result -> fetch_array()) {
    echo $result2["text"]."#".$result2["aaa"]."###";
}
$result -> close();
$conn -> close();
?>