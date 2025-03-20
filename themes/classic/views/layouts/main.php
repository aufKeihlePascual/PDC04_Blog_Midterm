<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <title><?php echo CHtml::encode($this->pageTitle); ?></title>
  
  <!-- Tailwind CSS CDN -->
  <script src="https://cdn.tailwindcss.com"></script>
  
  <!-- Theme Custom CSS (if needed) -->
  <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/style.css">
</head>
<body class="bg-[#131a2e] text-[#e4e4e4]">

  <!-- Navigation Bar -->
  <nav class="fixed top-0 left-0 right-0 z-50 bg-[#1A2036D7] backdrop-blur-sm shadow">
    <div class="container mx-auto px-4 py-4 flex items-center justify-between bg-transparent">
      <a class="text-[28px] font-bold text-[#f5539d]" href="<?php echo Yii::app()->homeUrl; ?>">
        <?php echo CHtml::encode(Yii::app()->name); ?>
      </a>
      <div>
        <?php
          $this->widget('zii.widgets.CMenu', array(
            'htmlOptions' => array('class'=>'flex space-x-14'),
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
  
  <div class="hero relative mt-[4.6rem] h-[26rem] flex items-center justify-center" style="background-image: url('<?php echo Yii::app()->theme->baseUrl; ?>/images/hero.jpg');">
    <div class="absolute inset-0 bg-[rgba(19,26,46,0.3)]"></div>
    <div class="relative text-center">
      <h1 class="text-xl font-bold mb-4">Welcome to My Neon Blog</h1>
      <p class="text-xl">Experience the glow of the city at night.</p>
    </div>
  </div>
  
  <!-- Main Content Container -->
  <div class="container mx-auto px-4 mt-5">
    <!-- Breadcrumbs -->
    <?php if(isset($this->breadcrumbs)):?>
      <div class="mb-4">
        <?php
          $this->widget('zii.widgets.CBreadcrumbs', array(
            'links'=>$this->breadcrumbs,
            'htmlOptions'=>array('class'=>'flex space-x-2 text-sm'),
          ));
        ?>
      </div>
    <?php endif;?>
    
    <!-- Content Area -->
    <div class="content-area">
      <?php echo $content; ?>
    </div>
    
    <!-- Footer -->
    <footer class="mt-8 py-4 border-t border-gray-700 text-center text-sm">
      <p>&copy; <?php echo date('Y'); ?> by My Company. All Rights Reserved.</p>
      <p><?php echo Yii::powered(); ?></p>
    </footer>
  </div>
  
</body>
</html>
