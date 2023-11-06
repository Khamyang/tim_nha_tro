<?php 
// 	//include "../connect/connect.php";
// 	$image ='';
// 	if (isset($_GET['del_home'])) {
 // 	$id = mysqli_real_escape_string($conn, $_GET['del_home']);
 // 	$sql = "SELECT * FROM tb_thong_tin_nha WHERE MaNha = $id";
// 	$result = mysqli_query($conn, $sql);
 //    if (mysqli_num_rows($result) > 0) {
 //        while($row = $result->fetch_assoc()) {
 //        	$image = $row['HinhAnh'];
 //        }
 //    }
 //    	unlink("./image/product_image/".$image);
// 	 	$sql = "DELETE FROM tb_thong_tin_nha WHERE MaNha = $id";
// 	 	$result = mysqli_query($conn, $sql);
// 		if ($result) {
// 			echo "<script type='text/javascript'>";
// 			echo "alert('Đã xóa thành công');";
// 			echo "location='index.php?page=my_home';";
// 			echo "</script>";
// 		}else{
// 			echo "<script type='text/javascript'>";
// 			echo "alert('Xóa không thành công!');";
// 			echo "location='index.php?page=my_home';";
// 			echo "</script>";
// 		}
// 		mysqli_close($conn);

 // }
?>