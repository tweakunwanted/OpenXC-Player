<?php
require_once("libs/lib.php");

$user = $_COOKIE['xuserm'];
$pwd = $_COOKIE['xpwdm'];

?>
<!DOCTYPE html>
<html lang="en">
   <head>
	<?php include("inc/head.php"); ?>
   </head>
   <body >
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
                  <h2 class="icon"><i class="fa fa-television" aria-hidden="true"></i><?php echo FILMES_SUGERIDOS; ?></h2>
                  <div class="row">
                     <!-- ARTICLES -->
                     <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="row auto-clear" id="resultados">
                        
    <?php
	$url = IP."/player_api.php?username=$user&password=$pwd&action=get_vod_streams";
	$resposta = apixtream($url);
	$output = json_decode($resposta,true);
	shuffle($output);
	$i = 1;
	foreach(array_rand($output,30) as $index) {
		$row = $output[$index];
		
		$iss = $_REQUEST['sessao'];
		$idnum = $row['num'];
		$filme_nome = $row['name'];
		$filme_type = $row['stream_type'];
		$filme_id = $row['stream_id'];
		$filme_img = $row['stream_icon'];
		$filme_rat = $row['rating'];		
		$avs = $row['rating_5based'];		
	?>
                           
                           <article class="col-lg-2 col-md-3 col-sm-4">
                              <div class="post post-medium">
                                 <div class="thumbr">
                                    <a class="afterglow post-thumb" href="filme.php?sessao=<?php echo gerar_hash(256); ?>&stream=<?php echo $filme_id; ?>&streamtipo=<?php echo $filme_type; ?>">
                                       <span class="play-btn-border" title="<?php echo $filme_nome; ?>"><i class="fa fa-play-circle headline-round" aria-hidden="true"></i></span>
                                       <div class="cactus-note ct-time font-size-1"><span><?php echo TAG_VOD; ?></span></div>
                                       <img class="img-responsive" src="<?php echo $filme_img; ?>" alt="<?php echo $filme_nome; ?>" style="width:100%;height:390px;">
                                    </a>
                                 </div>
                                 <div class="infor">
                                    <h4>
                                       <a class="title" href="filme.php?sessao=<?php echo gerar_hash(256); ?>&stream=<?php echo $filme_id; ?>&streamtipo=<?php echo $filme_type; ?>"><?php echo limitar_texto($filme_nome,30); ?></a>
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
      <!-- TABS -->
      <div id="tabs" class="container-fluid featured-bg">
         <div class="container-fluid">
            <div class="col-md-12">
               <!-- BOOTSTRAP TABS -->
               <div class="head-section">
                  
               <h2 class="title"><?php echo SERIES_SUGERIDOS; ?></h2>
                       
               </div>
               <div class="row auto-clear">
                  <!-- TAB CONTENTS -->
                  <div class="tab-content">
                     <div id="tab1" class="tab-pane fade in active">
                       
    <?php
	$url = IP."/player_api.php?username=$user&password=$pwd&action=get_series";
	$resposta = apixtream($url);
	$output = json_decode($resposta,true);
	shuffle($output);
	$i = 1;
	foreach(array_rand($output,12) as $index) {
		$row = $output[$index];
		
		$iss = $_REQUEST['sessao'];
		$idnum = $row['num'];
		$serie_nome = $row['name'];
		$serie_id = $row['series_id'];
		$serie_img = $row['cover'];
		$serie_rat = $row['rating'];		
		$avs = $row['rating_5based'];		
		$genre = $row['genre'];		
	?>           
            <article class="col-lg-2 col-md-4 col-sm-4 post post-medium">
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
                        </article>
                        <?php } ?>
                     </div>
                     
                  </div>
               </div>
            </div>
         </div>
      </div>
    
      <!-- CHANNELS -->
      <div id="channels-block" class="container-fluid channels-bg">
         <div class="container-fluid ">
            <div class="col-md-12">
               <!-- CHANNELS -->
               <section id="channels">
                  <div id="myCarousel" class="carousel slide" data-ride="carousel">
                     <h2 class="icon"><i class="fa fa-television" aria-hidden="true"></i><?php echo CANAIS_AO_VIVO; ?></h2>
                     <div class="carousel-control-box">
                        
                     </div>
                     <!-- Wrapper for slides -->
                     <div class="carousel-inner" role="listbox">
                        <div class="item active">
                           <div class="row auto-clear">
                           
    <?php
	$url = IP."/player_api.php?username=$user&password=$pwd&action=get_live_streams";
	$resposta = apixtream($url);
	$output = json_decode($resposta,true);
	shuffle($output);
	$i = 1;
	foreach(array_rand($output,12) as $index) {
		$row = $output[$index];
		
		$iss = $_REQUEST['sessao'];
		$idnum = $row['num'];
		$tv_nome = $row['name'];
		$tv_type = $row['stream_type'];
		$tv_id = $row['stream_id'];
		$tv_img = $row['stream_icon'];		
		$category_id = $row['category_id'];		
	?>
                           
                              <article class="col-lg-2 col-md-4 col-sm-4">
                                 <div class="post post-medium">
                                    <div class="thumbr">
                                       <a class="post-thumb" href="canal.php?sessao=<?php echo gerar_hash(256); ?>&stream=<?php echo $tv_id; ?>&streamtipo=<?php echo $tv_type; ?>&canal=<?php echo urlencode($tv_nome); ?>&img=<?php echo urlencode($tv_img); ?>&catg=<?php echo $category_id; ?>">
                                       <img class="img-responsive" src="assets/img/ch-1.png" alt="#">
                                       </a>
                                    </div>
                                    <div class="infor">
                                       <h4>
                                          <a class="title" href="canal.php?sessao=<?php echo gerar_hash(256); ?>&stream=<?php echo $tv_id; ?>&streamtipo=<?php echo $tv_type; ?>&canal=<?php echo urlencode($tv_nome); ?>&img=<?php echo urlencode($tv_img); ?>&catg=<?php echo $category_id; ?>"><?php echo $tv_nome; ?></a>
                                       </h4>
                                       <span class="posts-channel" title="Posts from Channel"><i class="fa fa-video-camera" aria-hidden="true"></i><?php echo AO_VIVO; ?></span>
                                    </div>
                                 </div>
                              </article>
                              <?php } ?>
                           </div>
                        </div>
                     </div>
                  </div>
               </section>
               <div class="clearfix"></div>
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