<?php
header("Content-type:text/html;charset=utf-8");    //设置编码
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "qiye";
// 创建连接
$conn = mysqli_connect($servername, $username, $password, $dbname);
mysqli_set_charset($conn,'utf8'); //设定字符集
// 检测连接
if (!$conn) {
  die("连接失败: " . mysqli_connect_error());
}
// 使用 sql 创建数据表
$sql = "CREATE TABLE system (
id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY COMMENT '主健',
`title` varchar(255) NOT NULL COMMENT '网站标题',
  `keywords` varchar(255) NOT NULL COMMENT '网站关健字',
  `desc` varchar(255) COMMENT '网站描述',
  `is_close` tinyint(2) COMMENT '是否关闭：1关0开',
  `is_update` tinyint(2) COMMENT '更新标志位'
)ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;";
if (mysqli_query($conn, $sql)) {
  echo "数据表 system 创建成功";
} else {
  echo "创建数据表错误: " . mysqli_error($conn);
}
mysqli_close($conn);
?>
