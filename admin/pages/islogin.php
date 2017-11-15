<?php
if(!array_key_exists("user", $_COOKIE)){
	echo '<script>alert("尚未登录网站,即将跳转!");window.location.href="./login.php"</script>';
}
?>