<?php
require_once("libs/lib.php");

$user = $_COOKIE['xuserm'];
$pwd = $_COOKIE['xpwdm'];

$categoria = urldecode($_REQUEST['catg']);
$id = trim($_REQUEST['id']);
$adulto = trim($_REQUEST['adulto']);


?>
<!DOCTYPE html>
<html lang="en">
   <head>
    <?php include("inc/head.php"); ?>
    <?php if($adulto == 'S') { ?>
    <link href="assets/css/age-verification.css" rel="stylesheet">
    <?php } ?>
   </head>
   <body onselectstart="return false" oncontextmenu="return false" ondragstart="return false">
      <!-- CATEGORY 1 -->
      <div id="category1" class="container-fluid standard-bg">
         <!-- HEADER -->
         <div class="row header-top">
          <?php include("inc/header.php"); ?>
         </div>
         <!-- MENU -->
         <div class="row home-mega-menu ">
            <div class="col-md-12">
               <nav class="navbar navbar-default">
                  <div class="navbar-header">
                     <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".js-navbar-collapse">
                     <span class="sr-only">Toggle navigation</span>
                     <span class="icon-bar"></span>
                     <span class="icon-bar"></span>
                     <span class="icon-bar"></span>
                     </button>
                  </div>
                  <div class="collapse navbar-collapse js-navbar-collapse megabg dropshd ">
                     <ul class="nav navbar-nav">
                        <?php include("inc/menu.php"); ?>
                     </ul>
                     <div class="search-block">
                       <?php include("inc/busca.php"); ?>
                     </div>
                  </div>
                  <!-- /.nav-collapse -->
               </nav>
            </div>
         </div>
         <!-- CATEGORY -->
         <div class="row">
            <!-- POST ARTICLES -->	
            <div class="col-lg-10 col-md-8">
              
               <section id="category">
                  <div class="row auto-clear">
                     <!-- RELATED VIDEOS -->
                     <div class="col-lg-12 col-md-12 col-sm-12 category-video-grid">
                        <h2 class="icon"><i class="fa fa-trophy" aria-hidden="true"></i><?php echo $categoria; ?></h2>
                        <!-- VIDEO POSTS ROW -->
                        <div class="row" id="resultados">
                        
    <?php
	$url = IP."/player_api.php?username=$user&password=$pwd&action=get_live_streams&category_id=$id";
	$resposta = apixtream($url);
	$output = json_decode($resposta,true);
	//shuffle($output);
	$i = 1;
	foreach($output as $index) {
		
		
		$iss = $_REQUEST['sessao'];
		$idnum = $index['num'];
		$canal_nome = $index['name'];
		$canal_type = $index['stream_type'];
		$canal_id = $index['stream_id'];
		$canal_img = $index['stream_icon'];	
	?>
                           <article class="col-lg-2 col-md-6 col-sm-4">
                              <!-- POST L size -->
                              <div class="post post-medium">
                                 <div class="thumbr">
                                    <a class="post-thumb" href="canal.php?sessao=<?php echo $_GET['sessao']; ?>&stream=<?php echo $canal_id; ?>&streamtipo=<?php echo $canal_type; ?>&canal=<?php echo urlencode($canal_nome); ?>&img=<?php echo urlencode($canal_img); ?>&catg=<?php echo $_GET['id']; ?>">
                                       <span class="play-btn-border" title="Play"><i class="fa fa-play-circle headline-round" aria-hidden="true"></i></span>
                                       <div class="cactus-note ct-time font-size-1"><span>Ao Vivo</span></div>
                                       <img class="img-responsive" src="<?php echo $canal_img; ?>" alt="<?php echo $canal_nome; ?>" style="width:100%;height:200px;">
                                    </a>
                                 </div>
                                 <div class="infor">
                                    <h4>
                                       <a class="title" href="canal.php?sessao=<?php echo $_GET['sessao']; ?>&stream=<?php echo $canal_id; ?>&streamtipo=<?php echo $canal_type; ?>&canal=<?php echo urlencode($canal_nome); ?>&img=<?php echo urlencode($canal_img); ?>&catg=<?php echo $_GET['id']; ?>"><?php echo $canal_nome; ?></a>
                                    </h4>
                                
                                 </div>
                              </div>
                           </article>
                          <?php } ?>
                          
                        </div>
                        <div class="clearfix spacer"></div>
                     </div>
                  </div>
                  
               </section>
            </div>
            <!-- SIDEBAR -->
            <div class="col-lg-2 col-md-4 hidden-sm hidden-xs">
               <aside class="dark-bg">
                  <article>
                     <h2 class="icon"><i class="fa fa-tv" aria-hidden="true"></i><?php echo TXT_CATEGORIAS; ?></h2>
                     <ul class="sidebar-links">
                     <?php
	$url = IP."/player_api.php?username=$user&password=$pwd&action=get_live_categories";
	$resposta = apixtream($url);
	$output = json_decode($resposta,true);
	foreach($output as $res1) {
		$iss = $_REQUEST['sessao'];
		$idcatcanal = $res1['category_id'];
		$catgcanal = $res1['category_name'];
		echo '<li class="fa fa-chevron-right"><a href="canais.php?sessao='.$iss.'&id='.$idcatcanal.'&catg='.urlencode($catgcanal).'">'.$catgcanal.'</a></li>';
	}
	?>
                     </ul>
                  </article>
                  <div class="clearfix spacer"></div>
                  
                 
               </aside>
            </div>
         </div>
      </div>
     
     
      
      
      <!-- FOOTER -->
      <div id="footer" class="container-fluid footer-background">
         <div class="container">
            <footer>
            <?php include("inc/footer.php"); ?>
            </footer>
         </div>
      </div>
      
      <?php include("inc/scripts.php"); ?>
      
      <?php if($adulto == 'S') { ?>
      <script src="http://cdn.jsdelivr.net/jquery.cookie/1.4.1/jquery.cookie.min.js"></script>
      <script src="assets/js/age-verification.js"></script>
      <?php } ?>
   </body>
</html>