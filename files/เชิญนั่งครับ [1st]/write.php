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
      <div class="col-sm-12">
        <div class="page-header">
          <h1>เขียนโพส</h1>
        </div>
        <form action="upload.php" method="post" enctype="multipart/form-data">
          <div class="row">
            <div class="form-group">
              <div class="col-sm-7 col-md-8">
                <label>หัวเรื่อง</label>
                <input type="text" name="title" placeholder="หัวเรื่อง" class="form-control" required>
              </div>
              <div class="col-sm-5 col-md-4">
                <label>หมวดหมู่</label>
                <select class="form-control" name="catg_id">
                  <option value="1" selected>ดราม่า</option>
                  <option value="2">ตลก</option>
                  <option value="3">ท่องเที่ยว</option>
                  <option value="4">ข่าว</option>
                  <option value="5">เพลง</option>
                  <option value="6">อื่นๆ</option>
                </select>
              </div>
            </div>
          </div>
          <br>
          <div class="row">
            <div class="form-group">
              <div class="col-xs-12">
                <label>เนื้อหา</label>
                <textarea name="detail" placeholder="เนื้อหา" class="form-control" required></textarea>
              </div>
            </div>
          </div>
          <br>
          <div class="row">
            <div class="form-group">
              <div class="col-xs-12">
                <label>ภาพประจำโพสต์</label>
                <input type="file" name="imgUpload" id="imgUpload" required>
              </div>
            </div>
          </div>
          <br>
          <div class="row">
            <div class="form-group">
              <div class="col-xs-12 text-center">
                <input type="hidden" name="usr_id" value="<?php echo $sess_usr ?>">
                <button type="submit" name="post" class="btn btn-success">โพสต์</button>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
  <?php include_once 'elements/footer.html'; ?>
</body>
</html>
