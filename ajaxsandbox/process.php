<?php 
	
	# echo "Hello World!";

	if (isset($_GET['name'])) {
		echo "GET: 你的名字是". $_GET['name'];
	}

	# 连接数据库
	$conn = mysqli_connect("localhost","root",'','ajaxtest');

	if (isset($_POST['name'])) {
		// echo "POST: 你的名字是". $_POST['name'];

		# 将拿到的数据转化一下
		$name = mysqli_real_escape_string($conn,$_POST['name']);

		$query = "INSERT INTO users(name) VALUES('$name')";
		mysqli_query($conn,"set name utf8");
		if(mysqli_query($conn,$query)){
			echo '用户添加成功!';
		}else{
			echo "用户添加失败!".mysqli_error($conn);
		}
	}
?>