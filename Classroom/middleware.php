<!DOCTYPE html>
<form id="form" action="dashboard.php" method="post">
    <input type="text" name="email" value=<?php echo $_GET['email'] ?>>
    <input type="submit">
</form>
<script type="text/javascript">
    document.getElementById('form').submit();
</script>