<!DOCTYPE html>
<html lang="th">
<head>
  <?php include_once 'elements/head.html'; ?>
  <title>Justinbook</title>
</head>
<body>
  <?php include_once 'elements/nav.php'; ?>
  <div class="container">
    <div class="row">
      <div class="panel panel-default">
        <div class="panel-body">
          <div class="page-header">
            <h1>Login</h1>
          </div>
          <form action="auth_gate.php" method="post">
            <div class="form-group">
              <label>Username</label>
              <input type="text" name="usr" class="form-control" placeholder="Username" required>
            </div>
            <div class="form-group">
              <label>Password</label>
              <input type="password" name="pwd" class="form-control" placeholder="Password" required>
            </div>
            <div class="text-center">
              <button name="login" class="btn btn-success">Login</button><br><br>
              <div>ยังไม่เป็นสมาชิกกับเราอีกหรอ? <a href="register.php">สมัครสมาชิกเลย</a></div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <?php include_once 'elements/footer.html'; ?>
</body>
</html>
