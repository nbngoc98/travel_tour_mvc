<?php 
	class commentModel extends connectDB{
		public function listComment() {
			
			$sql = "SELECT a.MaCom,b.hoten,tour.TenTour, a.NoiDungCom, a.Vote, a.reply from comment as a  inner JOIN thanhvien as b on a.MaTV = b.MaTV inner JOIN tour ON a.MaTour = tour.MaTour";
		    $result = mysqli_query($this->connect(), $sql);
		    mysqli_set_charset($this->connect(),"utf8");	
			return $result;
		}
		public function deleteComment($id){
			$sql = "DELETE FROM comment WHERE MaCom = $id";
			mysqli_query($this->connect(), $sql);
			header("Location: admin.php?controller=comment&action=listComment");
		}
		public function replyComment($reply,$id){
			$sql = "UPDATE comment SET reply = '$reply' WHERE MaCom = $id";
			mysqli_query($this->connect(), $sql);
			header("Location: admin.php?controller=comment&action=listComment");
		}
	}
?>