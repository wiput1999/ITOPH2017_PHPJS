<!DOCTYPE html>
<html>
   <head>
      <link href="https://fonnts.googleeapis.com/css?family=Itim" rel="stylesheet">
      <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"/>
      <link href="favicon.ico" rel="icon"/>
      <?php require_once 'autoload/init.php' ?>
      <meta name="viewpost" content="width=device-width, initail-scale=1">
      <meta charset="utf-8">
      <title><?php echo baseName ?></title>
   </head>
   <body>
      <?php require_once 'views/layout/header.php' ?>
      <div class="content">
         <?php require_once 'autoload/route.php' ?>
      </div>
      <?php require_once 'views/layout/footer.php' ?>
   </body>
</html>
