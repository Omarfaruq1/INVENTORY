<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<form id="fm">
	<p>Number1: <input type="number" name="txt1"></p>
	<p>Number2: <input type="number" name="txt2"></p>
	
</form>
<input type="submit" value="save" id="btn">
<p id="pp"></p>
</body>
</html>
<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
<script type="text/javascript">
	$("#btn").click(()=>{
		//alert($("#fm").serialize())
		$.post("hello.php",$("#fm").serialize(),(res)=>$("#pp").html(res))
	})
</script>