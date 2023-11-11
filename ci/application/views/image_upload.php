<!DOCTYPE html>
<html>

<head>
    <title>Webslesson | <?php echo $title; ?></title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
</head>

<body>
    <div class="container">
        <br /><br /><br />
        <h3 align="center"><?php echo $title; ?></h3>
        <form method="post" id="upload_form" align="center" enctype="multipart/form-data">
            <input type="file" name="image_file" id="image_file" />
            <br />
            <br />
            <input type="submit" name="upload" id="upload" value="Upload" class="btn btn-info" />
        </form>
        <br />
        <br />
        <div id="uploaded_image"></div>
        <div id="image_message"></div>
    </div>
</body>

</html>
<script>
$(document).ready(function() {
    $('#upload_form').on('submit', function(e) { //綁定submit事件
        e.preventDefault(); //防止表單的默認提交行為
        if ($('#image_file').val() == '') {
            alert("Please Select the File");
        } else {
            $.ajax({
                url: "<?php echo base_url(); ?>main/ajax_upload",
                method: "POST",
                data: new FormData(this), //使用 FormData 對象封裝了整個表單的數據
                contentType: false, // 不要設置 Content-Type 標頭
                cache: false, //不要快取
                processData: false, //不要處理傳遞的數據，因為我們使用 FormData 物件
                // success: function(data) { //當 AJAX 請求成功完成時應執行的函數
                //     $('#uploaded_image').html(data);
                //     $('image_message').html(data);
                // }
                success: function(data) {
                    var result = JSON.parse(data);
                    $('#uploaded_image').html(result.image);
                    $('#image_message').html(result.data);
                }
            });
        }
    });
});
</script>