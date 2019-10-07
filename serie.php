<?php
require_once("libs/lib.php");


$user = $_COOKIE['xuserm'];
$pwd = $_COOKIE['xpwdm'];
$id = trim($_REQUEST['stream']);
$serie = trim($_REQUEST['serie']);


?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <?php include("inc/head.php"); ?>

   </head>
   <body onselectstart="return false" oncontextmenu="return false" ondragstart="return false">
      <!-- CATEGORY 3 -->
      <div id="category3" class="container-fluid standard-bg">
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
            <!-- SIDEBAR -->
            <div class="col-lg-2 col-md-4 hidden-sm hidden-xs">
               
            </div>
            <!-- POST ARTICLES -->	
            <div class="col-lg-10 col-md-8">
               
               <!-- CATEGORY LIST -->
               <section id="category3-section">
                  <div class="row auto-clear">
                     <!-- RELATED VIDEOS -->
                     <div class="col-lg-12 col-md-12 col-sm-12 category-video-grid">
                        <h2 class="icon"><i class="fa fa-tv" aria-hidden="true"></i><?php echo TXT_SERIE; ?>: <?php echo $serie; ?></h2>
                        <!-- VIDEO POSTS ROW -->
                        <div class="row">
                        
                        <?php

$url = IP."/player_api.php?username=$user&password=$pwd&action=get_series_info&series_id=$id";
	
	$resposta = apixtream($url);
	$output = json_decode($resposta,true);
	//print_r($output);

echo '<ul class="nav nav-tabs">';

foreach (array_keys($output['episodes'] ) as $season_number )
{
    if($season_number == 1){
		$active = ' class="active"';
	} else {
		$active = '';
	}
	
	echo '<li '.$active.'><a data-toggle="tab" href="#sr'.$season_number.'"><h3>'.TXT_TEMPORADA.' '.$season_number.'</h3></a></li>';
	  
    
}
echo '</ul>';

echo '<div class="tab-content">';

foreach (array_keys($output['episodes'] ) as $season_number ) {
	
	if($season_number == 1){
		$active = 'active';
	} else {
		$active = '';
	}
	
 echo '<div id="sr'.$season_number.'" class="tab-pane fade in '.$active.'"><br>';

foreach ($output['episodes'][$season_number] as $item){
	
	$id_serie = $item['id'];
	$episodio = $item['episode_num'];
	$titulo = $item['title'];
	$ext = $item['container_extension'];
	//$img = $item['info']['movie_image'];
	$info = $item['info']['plot'];
	$duracao = $item['info']['duration'];
	$rating = $item['info']['rating'];
	$releasedate = $item['info']['releasedate'];
	
	$img = urldecode($_GET['img']);

	$avaliacao = $output['info']['rating_5based'];
	$genero = $output['info']['genre'];
	$diretor = $output['info']['director'];
	
	$id_serie_prox = $id_serie+1;
	$episodio_sprox = $episodio+1;
	$serienome = $_GET['serie'];
	$idserie = $_GET['stream'];
	
	echo '<article class="col-lg-12 col-md-12 col-sm-6">
                              <div class="row">

                                 <div class="post post-medium">
                                    <div class="col-lg-2 col-md-3 thumbr">
                                       <a class="post-thumb" href="serie_play.php?sessao='.gerar_hash(256).'&stream='.$id_serie.'&episodio='.$episodio.'&temporada='.$season_number.'&serie='.$serienome.'&titulo='.urlencode($titulo).'&ext='.$ext.'&proxid='.$id_serie_prox.'&proxep='.$episodio_sprox.'&duracao='.$duracao.'&idserie='.$idserie.'&plot='.urlencode($info).'&img='.urlencode($img).'">
                                          <span class="play-btn-border" title="Play"><i class="fa fa-play-circle headline-round" aria-hidden="true"></i></span>
                                          <div class="cactus-note ct-time font-size-1"><span>'.$duracao.'</span></div>
                                          <img class="img-responsive" src="'.$img.'" style="width:100%;height:200px;" alt="SEM CAPA">
                                       </a>
                                    </div>
                                    <div class="col-lg-7 col-md-6 infor">
                                       <h4>
                                          <a class="title" href="serie_play.php?sessao='.gerar_hash(256).'&stream='.$id_serie.'&episodio='.$episodio.'&temporada='.$season_number.'&serie='.$serienome.'&titulo='.urlencode($titulo).'&ext='.$ext.'&proxid='.$id_serie_prox.'&proxep='.$episodio_sprox.'&duracao='.$duracao.'&idserie='.$idserie.'&plot='.urlencode($info).'&img='.urlencode($img).'">Episódio '.$episodio.' - '.$titulo.'</a>
                                       </h4>
                                       <div class="metabox">
                                          <div class="ratings">
                                          '.avaliacao($avaliacao).'  
                                          </div>
                                          <span class="meta-i">
                                          <i class="fa fa-thumbs-up" aria-hidden="true"></i>'.$rating.'
                                          </span>
                                          <span class="meta-i">
                                          <i class="fa fa-tv" aria-hidden="true"></i>'.$genero.'
                                          </span>
                                          <span class="meta-i">
                                          <i class="fa fa-user"></i><a href="javascript:void(0);" class="author" title="'.$diretor.'">'.$diretor.'</a>
                                          </span>
                                          <span class="meta-i">
                                          <i class="fa fa-clock-o"></i> '.ds($releasedate).'
                                          </span>
                                          
                                       </div>
                                       <p>
                                        '.$info.'  
                                       </p>
                                    </div>
                                    <div class="col-md-1"></div>
                                    <div class="col-md-1"></div>
                                 </div>
                              </div>
                           </article>';
} 
	echo '</div>';
}

	echo '</div>';
?>

                          
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