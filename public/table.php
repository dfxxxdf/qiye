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
$sql = "CREATE TABLE category (
id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY COMMENT '主健',
`cate_name` varchar(200) NOT NULL COMMENT '分类名称',
  `cate_order` INT NOT NULL COMMENT '栏目顺序(同级栏目之间需要排序)',
  `pid` INT COMMENT '父ID'
)ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;";
if (mysqli_query($conn, $sql)) {
  echo "数据表 category 创建成功";
} else {
  echo "创建数据表错误: " . mysqli_error($conn);
}
mysqli_close($conn);
?>
