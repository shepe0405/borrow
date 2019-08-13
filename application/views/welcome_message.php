<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to CodeIgniter</title>

	<style type="text/css">
		.sortable {
			margin:  0;
			padding: 0;
			list-style:  none;
			width: 300px;
		}
		.sortable li {
			padding: 5px 10px;
			background-color: grey;
			margin-bottom: 3px;
		}
	</style>
</head>
<body>
<ul class="sortable">
	<?php foreach ($items as $item) { ?>
		<li id="ord-<?=$item->id?>"><?="Id: ".$item->id." Titulo: ".$item->title." - Rank: ".$item->rank?></li>
	<?php } ?>
</ul>
     
		<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
		<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js" integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU=" crossorigin="anonymous"></script>
		<script type="text/javascript">
			$(document).ready(function () {
				$(".sortable").sortable();
				$(".sortable").on("sortupdate", function(event, ui){
					var data = $(this).sortable("serialize");
					var url = "http://localhost/codei/welcome/rankOrder";
					$.post(url, {data:data}, function(response){
						alert(response);
					})
				})
			});
		</script>
</body>
</html>