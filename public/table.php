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
$sql = "CREATE TABLE admin (
id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY COMMENT '用户ID',
`username` varchar(50) NOT NULL COMMENT '用户名',
  `password` char(32) NOT NULL COMMENT '密码',
  `email` varchar(200) COMMENT '邮箱',
  `login_count` INT(4) COMMENT '登录次数',
  `last_time` INT(11) COMMENT '最后的登录时间'
)ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;";
if (mysqli_query($conn, $sql)) {
  echo "数据表 forums 创建成功";
} else {
  echo "创建数据表错误: " . mysqli_error($conn);
}
mysqli_close($conn);
?>
