




<!DOCTYPE html>
<html>
    <head>
        <title>Writer</title>
        <meta content="text/html; charset=utf-8" http-equiv="content-type" />
        <script type="text/javascript" src="ckeditor/ckeditor.js"></script>
        <script type="text/javascript" src="http://code.jquery.com/jquery-latest.js"></script>
        <script type="text/javascript" src="js/jquery.form.js"></script>
        <style>
            .cke_contents {
                height: 400px !important;
            }
        </style>
		<script type="text/javascript">
			$(document).ready(function() {
				CKEDITOR.replace( 'editor',
				{
					fullPage : true,
					uiColor : '#9AB8F3',
					toolbar : 'MyToolbar'
				});
			});
		</script>
    </head>
    <body>
        <form action="result.php" method="post">
            <textarea class="editor" id="editor" name="editor"></textarea>
			<div id="messages"></div>
        </form>
    </body>
</html>
<!--<title>Document</title>
<script src="ckeditor/ckeditor.js"></script>
</head>
<body>
	<form action="" method="POST">
		<textarea class="ckeditor" name="editor1" id="" cols="30" rows="10"></textarea>
		<input type="submit" value="insert"/>
		</form>
</body>
</html>-->

