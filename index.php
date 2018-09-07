
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
	<title></title>
	<script type="text/javascript" src="assets/jquery.js"></script>
	<script type="text/javascript" src="assets/popper.js"></script>
	<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="assets/dist/clipboard.min.js"></script>
	<link rel="stylesheet" type="text/css" href="assets/style.css">
</head>
<body>
	<?php
		include("libWebDom/value.php");
		$url = "";
		if(isset($_GET['url'])) {
			$url = $_GET['url'];
		}
	?>

	<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
	  	<a class="navbar-brand" href="#">PTOS</a>
	  		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
	    		<span class="navbar-toggler-icon"></span>
	  		</button>
	    <select class="custom-select" id="linkwebsite">
	  		<option value="" selected>Chọn một trang web</option>
	  		<option value="https://www.yellowpages.vnn.vn" <?php if($url=="https://www.yellowpages.vnn.vn") echo "selected"; ?> >https://www.yellowpages.vnn.vn</option>
	  		<option value="http://trangvangvietnam.com/" <?php if($url=="http://trangvangvietnam.com/") echo "selected"; ?> >http://trangvangvietnam.com/</option>
		</select>
	</nav>
	<div class="container mt-2">
		<form method="post" id="DOMdata">
			<div class="form-group">
				<label for="inputPassword5">Địa chỉ trang cần lấy dữ liệu</label>
				<input name="linkDOM" id="txtURL" type="text" id="inputPassword5" class="form-control" aria-describedby="passwordHelpBlock" <?php if(!isset($_GET['url'])) echo "disabled"; ?> value="<?php if(isset($_POST['linkDOM'])) echo $_POST['linkDOM']; ?>">
			</div>
			<button type="submit" name="btnsubmit" class="btn btn-success" value="Tìm">Tìm</button>
		</form>
		<small id="passwordHelpBlock" class="form-text text-muted">
		  	Nhập địa chỉ cần lấy dữ liệu và nhấn Enter
		</small>
	</div>
	<div class="mt-4">
		<table class="table table-striped table-sm table-bordered">
			<thead>
			    <tr class="table-active">
			      	<th scope="col">#</th>
			      	<th scope="col">Tên công ty</th>
			      	<th scope="col">Địa chỉ</th>
			      	<th scope="col">Số điện thoại</th>
			    </tr>
			</thead>
		  	<tbody>
		  		<?php
		  			$url_dom = '';
		  			if(isset($_POST['linkDOM'])){
		  				$url_dom = $_POST['linkDOM'];
		  			}
		  			include("libWebDom/processDOM.php");
		  			if(!getData($url_dom, $url)){
		  		?> 
				<div class="alert alert-danger m-2 alert-dismissible fade show" role="alert">
				  	Không có dữ liệu hoặc liên kết sai
				  	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				    	<span aria-hidden="true">&times;</span>
				  	</button>
				</div>
		  		<?php } ?>
		  	</tbody>
		</table>
	</div>

	<!-- Xu ly su kien -->
	<script type="text/javascript">
		$( document ).ready(function() {
		    $('#linkwebsite').on('change', function() {
			  	var value = $(this).val();
			  	if(value != "")
			  		window.location.href = "?url=" + value;
			  	else
			  		window.location.href = "<?php echo $home_url; ?>";
			});
		});

		setTimeout(function() {
	        $(".alert").alert('close');
	    }, 2000);

	    $('#txtURL').on('keypress', function (e) {
         	if(e.which === 13){
         		$("#DOMdata").submit();
         	}
	   	});
	    var clipboard = new ClipboardJS('.copy-btn');
	    clipboard.on('success', function(e) {
	        console.log(e);
	    });
	    clipboard.on('error', function(e) {
	        console.log(e);
	    });
	</script>
</body>
</html>
