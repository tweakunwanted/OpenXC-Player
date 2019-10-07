<?php
require_once("libs/lib.php");

$user = $_COOKIE['xuserm'];
$pwd = $_COOKIE['xpwdm'];

$categoria = urldecode($_REQUEST['catg']);
$id = trim($_REQUEST['id']);
?>
<!DOCTYPE html>
<html lang="en">
   <head>
	<?php include("inc/head.php"); ?>
	
   </head>
   <body onselectstart="return false" oncontextmenu="return false" ondragstart="return false">
      <!-- HOME 1 -->
      <div id="home1" class="container-fluid standard-bg">
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
         <!-- CORE -->
         <div class="row">
            <!-- SIDEBAR -->
            
            <!-- HOME MAIN POSTS -->	
            <div class="col-lg-12 col-md-12">
               <section id="home-main">
                  <h2 class="icon"><i class="fa fa-television" aria-hidden="true"></i><?php echo TXT_SERIES; ?></h2>
                  <div class="row">
                     <!-- ARTICLES -->
                     <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="row auto-clear" id="resultados">
                
    <?php
	$url = IP."/player_api.php?username=$user&password=$pwd&action=get_series";
	$resposta = apixtream($url);
	$output = json_decode($resposta,true);
	//shuffle($output);
	foreach($output as $row) {
		
		
		$iss = $_REQUEST['sessao'];
		$idnum = $row['num'];
		$serie_nome = $row['name'];
		$serie_id = $row['series_id'];
		$serie_img = $row['cover'];
		$serie_rat = $row['rating'];		
		$avs = $row['rating_5based'];		
		$genre = $row['genre'];	
	?>
                       
                           <article class="col-lg-2 col-md-3 col-sm-4">
                              <div class="post post-medium">
                                 <div class="thumbr">
                              <a class="post-thumb" href="serie.php?sessao=<?php echo gerar_hash(256); ?>&stream=<?php echo $serie_id; ?>&serie=<?php echo urlencode($serie_nome); ?>&img=<?php echo urlencode($serie_img); ?>">
                                 <span class="play-btn-border" title="Play"><i class="fa fa-play-circle headline-round" aria-hidden="true"></i></span>
                                 <div class="cactus-note ct-time font-size-1"><span><?php echo $genre; ?></span></div>
                                 <img class="img-responsive" src="<?php echo $serie_img; ?>" style="width: 100%;height:400px;" alt="#">
                              </a>
                           </div>
                                 <div class="infor">
                              <h4>
                                 <a class="title" href="serie.php?sessao=<?php echo gerar_hash(256); ?>&stream=<?php echo $serie_id; ?>&serie=<?php echo urlencode($serie_nome); ?>&img=<?php echo urlencode($serie_img); ?>"><?php echo $serie_nome; ?></a>
                              </h4>
                              <span class="posts-txt" title="<?php echo $serie_nome; ?>"><i class="fa fa-thumbs-up" aria-hidden="true"></i><?php echo $serie_rat; ?></span>
                              <div class="ratings">
                                 <?php echo avaliacao($avs); ?> 
                              </div>
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
   </body>
</html>