<!doctype html>
<html lang="en">
<head>
    <title>uploadify 带delete功能</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <link rel="stylesheet" href="css/minbase.css">
    <!-- <link rel="stylesheet" href="css/uploadify.css"> -->
    <link rel="stylesheet" href="css/uploadifycus.css">

</head>
<body class='release'>
	<div class="main wrap">
    	<div class="m-form rel-form">
            <!-- 图片上传部分 -->
            <div>选择要上传的图片</div>
            <div class="uploadpics uppicswrap rel">
                <div class="pics ovh" id='pics'>          
                </div>      
                <input id="file_upload" name="file_upload" type="file" multiple="true">
            </div>
    	</div>
	</div> 


    <script src="js/jquery-1.10.2.min.js"></script>
    <script src="js/jquery.uploadify.min.js" ></script>

    <script>
        <?php $timestamp = time();?>
        $(function(){
            //upload图片部分
            uploadpics();                      
        })
        function uploadpics(){
            $('#file_upload').uploadify({
                'formData'     : {
                    'timestamp' : '<?php echo $timestamp;?>',
                    'token'     : '<?php echo md5('unique_salt' . $timestamp);?>'
                },
                'swf'      : 'js/uploadify.swf',
                'uploader' : 'php/uploadify.php',
                'buttonText' : '',
                'height' : 100,
                'width' : 100,
                'removeTimeout': 1,
                'onUploadSuccess' : function(file, data, response) {                    
                    var uppics = '<p class="uppics"><img src="uploads/'+file.name + '"/><a class="close">×</a></p>';
                    $(uppics).appendTo($('.pics'));
                    pic_delete();
                } 
            });         
        } 
        function send_rel_data(){
            var upload_pic_src = [];  
            var uppics_len = $('#pics').find('.uppics').length;
            for (var i = 0; i < uppics_len; i++) {
                upload_pic_src.push($('.uppics').eq(i).find('img').attr('src'));
            };     
            var all_data = [upload_pic_src];
            alert(rel_data)
            $.ajax({
                url: "",
                type: "POST",
                data:{all_data:all_data},
                //dataType: "json",
                error: function(){  
                    
                },  
                success: function(data,status){                      
                    
                }
            });             
        } 
        function pic_delete(){
            $('.close').on('click',function(){
                $(this).parent().remove();
            });            
        }                
    </script>
    
</body>
</html>