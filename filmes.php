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
                  <h2 class="icon"><i class="fa fa-television" aria-hidden="true"></i><?php echo $categoria; ?></h2>
                  <div class="row">
                     <!-- ARTICLES -->
                     <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="row auto-clear" id="resultados">
                
    <?php
	$url = IP."/player_api.php?username=$user&password=$pwd&action=get_vod_streams&category_id=$id";
	$resposta = apixtream($url);
	$output = json_decode($resposta,true);
	//shuffle($output);
	$i = 1;
	foreach($output as $index) {
		
		
		$iss = $_REQUEST['sessao'];
		$idnum = $index['num'];
		$filme_nome = $index['name'];
		$filme_type = $index['stream_type'];
		$filme_id = $index['stream_id'];
		$filme_img = $index['stream_icon'];
		$filme_rat = $index['rating'];		
		$avs = $index['rating_5based'];		
	?>
                       
                           <article class="col-lg-2 col-md-3 col-sm-4">
                              <div class="post post-medium">
                                 <div class="thumbr">
                                    <a class="afterglow post-thumb" href="filme.php?sessao=<?php echo $_GET['sessao']; ?>&stream=<?php echo $filme_id; ?>&streamtipo=<?php echo $filme_type; ?>">
                                       <span class="play-btn-border" title="<?php echo $filme_nome; ?>"><i class="fa fa-play-circle headline-round" aria-hidden="true"></i></span>
                                       <div class="cactus-note ct-time font-size-1"><span>02:02</span></div>
                                       <img class="img-responsive" src="<?php echo $filme_img; ?>" alt="<?php echo $filme_nome; ?>" style="width:100%;height:390px;">
                                    </a>
                                 </div>
                                 <div class="infor">
                                    <h4>
                                       <a class="title" href="filme.php?sessao=<?php echo $_GET['sessao']; ?>&stream=<?php echo $filme_id; ?>&streamtipo=<?php echo $filme_type; ?>"><p><?php echo limitar_texto($filme_nome,30); ?></p></a>
                                    </h4>
                                    <span class="posts-txt" title="Posts from Channel"><i class="fa fa-thumbs-up" aria-hidden="true"></i><?php echo $filme_rat; ?></span>
                                    <div class="ratings">
                                    <?php echo avaliacao($avs); ?>                                      
                                    </div>
                                 </div>
                              </div>
                           </article>
                          <?php $i++; } ?>
                         
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
	  
	  <?php if($adulto == 'S') { ?>
      <script src="http://cdn.jsdelivr.net/jquery.cookie/1.4.1/jquery.cookie.min.js"></script>
      <script src="assets/js/age-verification.js"></script>
      <?php } ?>
   </body>
</html>