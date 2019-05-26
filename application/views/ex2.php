<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="msalev">
    <meta name="keywords" content="">
    <meta name="author" content="Wutdy">
    <title>ex2</title>
    <link href="<?php echo base_url() ?>assets\bootstrap4\css\bootstrap.min.css" rel="stylesheet">
    <script type="text/javascript" src="<?php echo base_url() ?>assets/Jquery/jquery-3.4.1.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $("#btn1").click(function(){

                $.ajax({
                    url:"<?php echo base_url("Main/ajaxload") ?>",
                    type:"POST",
                    data:{
                        test1:$("#txt1").val()
                    },
                    dataType:"JSON",
                    success(result){
                        console.log("OK");
                        console.log(result);
                    },error(error){
                        console.log("Error");
                        console.log(error);
                    }

                })
            });
        });
    </script>


</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">

<input type="text" id="txt1">
<button type="button" id="btn1">btn1</button>

            </div>
        </div>
    </div>
</body>
<script src="<?php echo base_url() ?>assets/bootstrap4/js/bootstrap.min.js"></script>

</html>