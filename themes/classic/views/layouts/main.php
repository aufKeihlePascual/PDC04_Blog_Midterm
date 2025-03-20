<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <title><?php echo CHtml::encode($this->pageTitle); ?></title>
  
  <!-- Bootstrap CSS (CDN) -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  
  <!-- Theme Custom CSS -->
  <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/style.css">
</head>
<body>

  <!-- Navigation Bar -->
  <nav class="navbar navbar-default navbar-fixed-top">
    <div class="container navbar-container">
      <!-- Navbar Header -->
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="<?php echo Yii::app()->homeUrl; ?>">
          <?php echo CHtml::encode(Yii::app()->name); ?>
        </a>
      </div>
      
      <!-- Main Menu -->
      <div class="collapse navbar-collapse" id="navbar-collapse">
        <?php
          $this->widget('zii.widgets.CMenu', array(
            'htmlOptions' => array('class'=>'nav navbar-nav'),
            'items'=>array(
              array('label'=>'About', 'url'=>array('/site/page', 'view'=>'about')),
              array('label'=>'Contact', 'url'=>array('/site/contact')),
              array('label'=>'Posts', 'url'=>array('/post/index')),
              array('label'=>'Comments', 'url'=>array('/comment')),
              array('label'=>'Login', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
              array(
                'label'=>'Logout ('.Yii::app()->user->name.')',
                'url'=>array('/site/logout'),
                'visible'=>!Yii::app()->user->isGuest
              ),
            ),
          ));
        ?>
      </div>
    </div>
  </nav>

  <!-- Hero Section (Uses your nighttime city image) -->
  <!-- Make sure 'hero.jpg' is located at: themes/classic/images/hero.jpg -->
  <div class="hero">
    <h1>Welcome to My Neon Blog</h1>
    <p>Experience the glow of the city at night.</p>
  </div>
  
  <!-- Main Content Container -->
  <div class="container main-container">
    <!-- Breadcrumbs -->
    <?php if(isset($this->breadcrumbs)):?>
      <div class="row">
        <div class="col-md-12">
          <?php
            $this->widget('zii.widgets.CBreadcrumbs', array(
              'links'=>$this->breadcrumbs,
            ));
          ?>
        </div>
      </div>
    <?php endif;?>

    <!-- Page Content + Sidebar -->
    <div class="row">
      <div class="col-md-8">
        <?php echo $content; ?>
      </div>
      
      <div class="col-md-4">
        <!-- Example Sidebar -->
        <div class="sidebar">
          <h3 class="widget-title">Sidebar Widget</h3>
          <p>Add recent posts, ads, or any other elements here.</p>
        </div>
      </div>
    </div>

    <hr>

    <!-- Footer -->
    <footer>
      <p>&copy; <?php echo date('Y'); ?> by My Company. All Rights Reserved.</p>
      <p><?php echo Yii::powered(); ?></p>
    </footer>
  </div><!-- /main-container -->
  
  <!-- jQuery and Bootstrap JS (CDN) -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>
</html>
