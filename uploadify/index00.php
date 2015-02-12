<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>UploadiFive Test</title>
<script src="js/jquery-1.10.2.min.js"></script>
<script src="js/jquery.uploadify.min.js" ></script>
<link rel="stylesheet" type="text/css" href="uploadify.css">
<style type="text/css">
body {
	font: 13px Arial, Helvetica, Sans-serif;
}
.uppics{
	width: 100px;
	border: 1px solid orange;
	float: left;
	margin: 4px;
}
.uppics img{
	width: 100%;
}
</style>
</head>

<body>
	<h1>Uploadify Demo</h1>
	<form>
		<div id="queue"></div>
		<input id="file_upload" name="file_upload" type="file" multiple="true">
	</form>
	<div class="pics">
		
	</div>

	<script type="text/javascript">
		<?php $timestamp = time();?>
		$(function() {
			$('#file_upload').uploadify({
				'formData'     : {
					'timestamp' : '<?php echo $timestamp;?>',
					'token'     : '<?php echo md5('unique_salt' . $timestamp);?>'
				},
				'swf'      : 'uploadify.swf',
				'uploader' : 'uploadify.php',
		        'onUploadSuccess' : function(file, data, response) {
					console.log(file.post)
					console.log(file.id)
					console.log(file.size)
					console.log(file.type)
					console.log(file.filestatus)
					console.log(file.index)
					console.log(file.name)		        	
					for(i in file ){
					  // console.log(i);
					}		        	
          			var uppics = '<div class="uppics"><img src="http://img4.duitang.com/uploads/item/201407/15/20140715100147_y5Nf8.jpeg">' + '</div>';
          			// alert(uppics);
          			$(uppics).appendTo($('.pics'));		        	

		            // alert('The file ' + file.name + ' was successfully uploaded with a response of ' + response + ':' + data);
		        }
			});
		});
	</script>
</body>
</html>