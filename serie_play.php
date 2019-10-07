<?php
require_once("libs/lib.php");


$user = $_COOKIE['xuserm'];
$pwd = $_COOKIE['xpwdm'];
$id = trim($_REQUEST['stream']);
$idserie = trim($_REQUEST['idserie']);
$episodio = trim($_REQUEST['episodio']);
$temporada = trim($_REQUEST['temporada']);
$serie = urldecode($_REQUEST['serie']);
$titulo = urldecode($_REQUEST['titulo']);
$img = urldecode($_REQUEST['img']);
$plot = urldecode($_REQUEST['plot']);
$exts = trim($_REQUEST['ext']);
$proxid = trim($_REQUEST['proxid']);
$proxep = trim($_REQUEST['proxep']);
$duracao = trim($_REQUEST['duracao']);
$tipo = 'series';

?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <?php include("inc/head.php"); ?>
      
      <?php if($_GET['player'] == 1 || $_GET['player'] == '') { ?>
      <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/clappr@latest/dist/clappr.min.js"></script>
      <script type="text/javascript" src="https://cdn.jsdelivr.net/clappr.chromecast-plugin/latest/clappr-chromecast-plugin.min.js"></script>
      <script type="text/javascript" src="https://cdn.jsdelivr.net/gh/clappr/clappr-level-selector-plugin@latest/dist/level-selector.min.js"></script>
      <script type="text/javascript" src="https://cdn.jsdelivr.net/gh/mokoshalb/clappr-ads/ads.js"></script>
      <?php } ?>
      <?php if($_GET['player'] == 2) { ?>
      <link href="assets/plugins_player/video-js.css" type="text/css" rel="stylesheet">
      <link href="assets/plugins_player/videojs.css?v=1540876404" type="text/css" rel="stylesheet">
      <link href="assets/plugins_player/videojs.airplay.css" type="text/css" rel="stylesheet">
      <script src="assets/plugins_player/video.js"></script>
      <script src="assets/plugins_player/videojs.airplay.js"></script>
      <?php } ?>
      <?php if($_GET['player'] == 3) { ?>
      <link rel="stylesheet" href="https://cdn.fluidplayer.com/v2/current/fluidplayer.min.css" type="text/css"/>
<script src="https://cdn.fluidplayer.com/v2/current/fluidplayer.min.js"></script>
      <?php } ?>
      <?php if($_GET['player'] == 4) { ?>
      <script src="//cdn.jwplayer.com/libraries/DbXZPMBQ.js"></script>
      <script src="assets/plugins_player/jwplayer.js"></script>
      <?php } ?>
      <?php if($_GET['player'] == 5) { ?>
      <script type="text/javascript" src="//cdn.jsdelivr.net/afterglow/latest/afterglow.min.js"></script>
      <?php } ?>
      
      
   </head>
   <body onselectstart="return false" oncontextmenu="return false" ondragstart="return false">
      <!-- SINGLE VIDEO FULLWIDTH -->
      <div id="single-video-fullwidth" class="container-fluid standard-bg">
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
         <!-- SINGLE VIDEO FULLWIDTH -->
         <div class="row">
            <div class="container">
               <!-- SINGLE VIDEO FULLWIDTH -->	
               <div id="single-video-fullwidth-wrapper" class="col-lg-12 col-md-12">
                  <!-- VIDEO SINGLE POST -->
                  <article class="post-video">
                     <!-- VIDEO INFO -->
                     <div class="video-info dropshd">
                        <!-- 16:9 aspect ratio -->
        <div class="embed-responsive embed-responsive-16by9 video-embed-box">
        
        <?php if($exts == 'avi' || $exts == 'mkv') { ?>
        <center><br><br>
        <h4><?php echo ERROR_FORMATO_VIDEO; ?>: <?php echo $exts; ?></h4>
        <br><br>
        <?php echo ERROR_FORMATO_VIDEO_DESC; ?>
        </center>
        <?php } else { ?>
        
        <?php if($_GET['player'] == 1 || $_GET['player'] == '') { ?>
        <div id="livevideo"></div>
        <?php } ?>
        <?php if($_GET['player'] == 2) { ?>
        <video id="livevideo" class="video-js vjs-16-9 vjs-big-play-centered" poster="<?php echo $img; ?>"></video>
        <?php } ?> 
        <?php if($_GET['player'] == 3) { ?>
        <video id="livevideo" style="width: 100%;height:650px;" controls><source src="<?php echo IP; ?>/<?php echo $tipo; ?>/<?php echo $user; ?>/<?php echo $pwd; ?>/<?php echo $id; ?>.<?php echo $exts; ?>" type="video/mp4" /></video>
        <?php } ?>
        <?php if($_GET['player'] == 4) { ?>
        <div id="jwplayer_wrapper">
        <a id="beforeswfanchor0" href="#jwplayer" tabindex="0" title="Flash start" style="border:0;clip:rect(0 0 0 0);display:block;height:1px;margin:-1px;outline:none;overflow:hidden;padding:0;position:absolute;width:1px;" data-related-swf="jwplayer"></a>
        <object type="application/x-shockwave-flash" data="jwplayer/jwplayer.flash.swf" width="100%" height="100%" bgcolor="#000000" id="livevideo" name="jwplayer" class="jwswf swfPrev-beforeswfanchor0 swfNext-afterswfanchor0" tabindex="0">
        <param name="allowfullscreen" value="true">
        <param name="allowscriptaccess" value="always">
        <param name="seamlesstabbing" value="true">
        <param name="wmode" value="opaque">
        </object>
        <a id="afterswfanchor0" href="#jwplayer" tabindex="0" title="Flash end" style="border:0;clip:rect(0 0 0 0);display:block;height:1px;margin:-1px;outline:none;overflow:hidden;padding:0;position:absolute;width:1px;" data-related-swf="jwplayer"></a>
       <div id="jwplayer_aspect" style="display: none;"></div>
       <div id="jwplayer_jwpsrv" style="position: absolute; top: 0px; z-index: 10;">
       <div class="afs_ads" style="width: 1px; height: 1px; position: absolute; background: transparent;">&nbsp;</div>
       </div>
       </div>
       <?php } ?>
       <?php if($_GET['player'] == 5) { ?>
  <video class="afterglow" id="livevideo" style="width:100%;" height="650">
 <source type="video/mp4" src="<?php echo IP; ?>/<?php echo $tipo; ?>/<?php echo $user; ?>/<?php echo $pwd; ?>/<?php echo $id; ?>.<?php echo $exts; ?>" />
 </video>
       <?php } ?> 
       
       
       <?php } ?> 
        
       </div>
       <h2 class="title main-head-title"><?php echo $serie; ?></h2>
         <div class="metabox">
           
                           
           <span class="meta-i">
            <i class="fa fa-clock-o"></i> <?php echo TXT_DURACAO; ?>: <?php echo $duracao; ?>
           </span>
            
            <a href="javascript:void(0)" id="fullscreen"><?php echo TXT_FULLSCREEN; ?></a>
          
          </div>
          
                     <a href="serie_play.php?sessao=<?php echo $_GET['sessao']; ?>&stream=<?php echo $_GET['stream']; ?>&episodio=<?php echo $_GET['episodio']; ?>&temporada=<?php echo $_GET['temporada']; ?>&ext=<?php echo $_GET['ext']; ?>&proxid=<?php echo $_GET['proxid']; ?>&proxep=<?php echo $_GET['proxep']; ?>&serie=<?php echo $_GET['serie']; ?>&titulo=<?php echo $_GET['titulo']; ?>&duracao=<?php echo $_GET['duracao']; ?>&idserie=<?php echo $_GET['idserie']; ?>&plot=<?php echo $_GET['plot']; ?>&img=<?php echo $_GET['img']; ?>&player=1" class="btn <?php if($_GET['player'] == 1 || $_GET['player'] == '') { echo 'btn-primary'; } ?>">PLAYER 1</a>
                     
                     <a href="serie_play.php?sessao=<?php echo $_GET['sessao']; ?>&stream=<?php echo $_GET['stream']; ?>&episodio=<?php echo $_GET['episodio']; ?>&temporada=<?php echo $_GET['temporada']; ?>&ext=<?php echo $_GET['ext']; ?>&proxid=<?php echo $_GET['proxid']; ?>&proxep=<?php echo $_GET['proxep']; ?>&serie=<?php echo $_GET['serie']; ?>&titulo=<?php echo $_GET['titulo']; ?>&duracao=<?php echo $_GET['duracao']; ?>&idserie=<?php echo $_GET['idserie']; ?>&plot=<?php echo $_GET['plot']; ?>&img=<?php echo $_GET['img']; ?>&player=2" class="btn <?php if($_GET['player'] == 2) { echo 'btn-primary'; } ?>">PLAYER 2</a>
                     
                     <a href="serie_play.php?sessao=<?php echo $_GET['sessao']; ?>&stream=<?php echo $_GET['stream']; ?>&episodio=<?php echo $_GET['episodio']; ?>&temporada=<?php echo $_GET['temporada']; ?>&ext=<?php echo $_GET['ext']; ?>&proxid=<?php echo $_GET['proxid']; ?>&proxep=<?php echo $_GET['proxep']; ?>&serie=<?php echo $_GET['serie']; ?>&titulo=<?php echo $_GET['titulo']; ?>&duracao=<?php echo $_GET['duracao']; ?>&idserie=<?php echo $_GET['idserie']; ?>&plot=<?php echo $_GET['plot']; ?>&img=<?php echo $_GET['img']; ?>&player=3" class="btn <?php if($_GET['player'] == 3) { echo 'btn-primary'; } ?>">PLAYER 3</a>
                     
                     <a href="serie_play.php?sessao=<?php echo $_GET['sessao']; ?>&stream=<?php echo $_GET['stream']; ?>&episodio=<?php echo $_GET['episodio']; ?>&temporada=<?php echo $_GET['temporada']; ?>&ext=<?php echo $_GET['ext']; ?>&proxid=<?php echo $_GET['proxid']; ?>&proxep=<?php echo $_GET['proxep']; ?>&serie=<?php echo $_GET['serie']; ?>&titulo=<?php echo $_GET['titulo']; ?>&duracao=<?php echo $_GET['duracao']; ?>&idserie=<?php echo $_GET['idserie']; ?>&plot=<?php echo $_GET['plot']; ?>&img=<?php echo $_GET['img']; ?>&player=4" class="btn <?php if($_GET['player'] == 4) { echo 'btn-primary'; } ?>">PLAYER 4</a>
                     
                     <a href="serie_play.php?sessao=<?php echo $_GET['sessao']; ?>&stream=<?php echo $_GET['stream']; ?>&episodio=<?php echo $_GET['episodio']; ?>&temporada=<?php echo $_GET['temporada']; ?>&ext=<?php echo $_GET['ext']; ?>&proxid=<?php echo $_GET['proxid']; ?>&proxep=<?php echo $_GET['proxep']; ?>&serie=<?php echo $_GET['serie']; ?>&titulo=<?php echo $_GET['titulo']; ?>&duracao=<?php echo $_GET['duracao']; ?>&idserie=<?php echo $_GET['idserie']; ?>&plot=<?php echo $_GET['plot']; ?>&img=<?php echo $_GET['img']; ?>&player=5" class="btn <?php if($_GET['player'] == 5) { echo 'btn-primary'; } ?>">PLAYER 5</a>
                    
                    
                    
                        
                     </div>
                     <div class="clearfix spacer"></div>
                     <!-- DETAILS -->
                     <div class="video-content">
                        <h2 class="title main-head-title"><?php echo TXT_INFO; ?></h2>
                        <h3><?php echo $plot; ?></h3>
                        <hr>
                        <h3>
                       <?php echo $temporada;  ?>ª <?php echo TXT_TEMPORADA; ?> / <?php echo TXT_EPISODIO; ?> <?php echo $episodio; ?> <?php if($_GET['auto'] == '') { ?>- <?php echo $titulo; ?> <?php } ?>
                      </h3>
                      <hr>
                     </div>
                    
                  </article>
                  <div class="clearfix spacer"></div>
               
               <section id="category3-section">
                  <div class="row auto-clear">
                  <div class="col-lg-12 col-md-12 col-sm-12 category-video-grid">
               
               <h2 class="title main-head-title">Episódios <?php echo $temporada;  ?>ª Temporada</h2>
               <?php
              

$url = IP."/player_api.php?username=$user&password=$pwd&action=get_series_info&series_id=$idserie";
	
	$resposta = apixtream($url);
	$output = json_decode($resposta,true);
	
foreach ($output['episodes'][$temporada] as $item){
	
	$id_serie = $item['id'];
	$episodio = $item['episode_num'];
	$titulo = $item['title'];
	$ext = $item['container_extension'];
	//$img = $item['info']['movie_image'];
	$info = $item['info']['plot'];
	$duracao = $item['info']['duration'];
	$rating = $item['info']['rating'];
	$releasedate = $item['info']['releasedate'];
	
	$avaliacao = $output['info']['rating_5based'];
	$genero = $output['info']['genre'];
	$diretor = $output['info']['director'];
	
	$id_serie_prox = $id_serie+1;
	$episodio_sprox = $episodio+1;
	$serienome = $_GET['serie'];
	$idserie = $_GET['idserie'];
	
	
	
	echo '<article class="col-lg-12 col-md-12 col-sm-6">
                              <div class="row">

                                 <div class="post post-medium">
                                    <div class="col-lg-2 col-md-3 thumbr">
                                       <a class="post-thumb" href="serie_play.php?sessao='.gerar_hash(256).'&stream='.$id_serie.'&episodio='.$episodio.'&temporada='.$temporada.'&serie='.$serienome.'&titulo='.urlencode($titulo).'&ext='.$ext.'&proxid='.$id_serie_prox.'&proxep='.$episodio_sprox.'&duracao='.$duracao.'&idserie='.$idserie.'&plot='.urlencode($info).'&img='.urlencode($img).'">
                                          <span class="play-btn-border" title="Play"><i class="fa fa-play-circle headline-round" aria-hidden="true"></i></span>
                                          <div class="cactus-note ct-time font-size-1"><span>'.$duracao.'</span></div>
                                          <img class="img-responsive" src="'.$img.'" style="width:100%;height:200px;" alt="SEM CAPA">
                                       </a>
                                    </div>
                                    <div class="col-lg-10 col-md-9 infor">
                                       <h4>
                                          <a class="title" href="serie_play.php?sessao='.gerar_hash(256).'&stream='.$id_serie.'&episodio='.$episodio.'&temporada='.$temporada.'&serie='.$serienome.'&titulo='.urlencode($titulo).'&ext='.$ext.'&proxid='.$id_serie_prox.'&proxep='.$episodio_sprox.'&duracao='.$duracao.'&idserie='.$idserie.'&plot='.urlencode($info).'&img='.urlencode($img).'">'.TXT_EPISODIO.' '.$episodio.' - '.$titulo.'</a>
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
                                    
                                 </div>
                              </div>
                           </article>';
} 
	
?>
<br><br>
<button class="subscribe-btn" onclick="location.href='serie.php?sessao=<?php echo gerar_hash(256); ?>&stream=<?php echo $_GET['idserie']; ?>&serie=<?php echo $_GET['serie']; ?>&img=<?php echo $_GET['img']; ?>';" type="button" title="Voltar"><?php echo TXT_TODAS_EMPORADAS; ?></button>

             </div>
             </div>
             </section>  
               
					
			   </div>
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
      
      <?php if($_GET['player'] == 1 || $_GET['player'] == '') { ?>
      <style>
		[data-player] {
		    position: relative;
		    width: 100%;
		    height: auto;
		    margin: 0;    
		}
		[data-player] .container[data-container] {
		    width: 100%;
		    height: auto;
		    position: relative;
		}
		[data-player] .media-control[data-media-control] {
		    top: 0;
		    right: 0;
		    bottom: 0;
		    left: 0;
		}
		[data-player] video {
		    position: relative;
		    display: block;
		    width: 100%;
		    height: auto;
		}
      </style>
      <script>
        var playerobj = new Clappr.Player(
                    {
                        source: "<?php echo IP; ?>/<?php echo $tipo; ?>/<?php echo $user; ?>/<?php echo $pwd; ?>/<?php echo $id; ?>.<?php echo $exts; ?>",
                        parentId: "#livevideo",
                        autoPlay: true,
                        height: 'auto',
                        width: '100%',
                        poster: "<?php echo $img; ?>",
                        watermark: "assets/<?php echo $template; ?>/img/main-logo.png",
       					watermarkLink: "#",
       					position: 'bottom-right',
                        events: {
                            onEnded: function() {
                                go("serie_play.php?sessao=<?php echo $_GET['sessao']; ?>&stream=<?php echo $_GET['proxid']; ?>&episodio=<?php echo $_GET['proxep']; ?>&temporada=<?php echo $_GET['temporada']; ?>&ext=<?php echo $_GET['ext']; ?>&proxid=<?php echo $_GET['proxid']; ?>&proxep=<?php echo $_GET['proxep']; ?>&serie=<?php echo $_GET['serie']; ?>&titulo=<?php echo $_GET['titulo']; ?>&duracao=<?php echo $_GET['duracao']; ?>&idserie=<?php echo $_GET['idserie']; ?>&plot=<?php echo $_GET['plot']; ?>&player=<?php echo isset($_GET['player']) ? $_GET['player']:'1'; ?>&img=<?php echo $_GET['img']; ?>&auto=1");
                            }
                        }
                    }
                );
            </script>
     <?php } ?>
     
      <?php if($_GET['player'] == 2) { ?>
      <script type="text/javascript">
      var streamsrc = "<?php echo IP; ?>/<?php echo $tipo; ?>/<?php echo $user; ?>/<?php echo $pwd; ?>/<?php echo $id; ?>.<?php echo $exts; ?>";
      var playerobj = window.playerobj = videojs("livevideo", {sources: {type: "video/mp4", src: streamsrc}, controls: true, autoplay: true, loop: false, language: "pt-br", languages: {pt: {LIVE: "AO VIVO", Fullscreen: "Tela inteira", Pause: "Pausar", Play: "Reproduzir", Mute: "Mudo", Unmute: "Ativar som"}}, notSupportedMessage: "Limite de telas simultâneas atingido. Por favor, encerre uma das transmissões, aguarde 1 minuto e atualize a página.", preload: "none", muted: false, controlBar: { fullscreenToggle: false, volumePanel: false }, plugins: { airplayButton: {} }});
      playerobj.on('ended', function() { go("serie_play.php?sessao=<?php echo $_GET['sessao']; ?>&stream=<?php echo $_GET['proxid']; ?>&episodio=<?php echo $_GET['proxep']; ?>&temporada=<?php echo $_GET['temporada']; ?>&ext=<?php echo $_GET['ext']; ?>&proxid=<?php echo $_GET['proxid']; ?>&proxep=<?php echo $_GET['proxep']; ?>&serie=<?php echo $_GET['serie']; ?>&titulo=<?php echo $_GET['titulo']; ?>&duracao=<?php echo $_GET['duracao']; ?>&idserie=<?php echo $_GET['idserie']; ?>&plot=<?php echo $_GET['plot']; ?>&player=<?php echo isset($_GET['player']) ? $_GET['player']:'1'; ?>&img=<?php echo $_GET['img']; ?>&auto=1"); });
     
     </script>
     <?php } ?>
     
     <?php if($_GET['player'] == 3) { ?>
      <script>
       fluidPlayer('livevideo',{
        layoutControls: {
            autoPlay:true
        }
    }
                );
                document.getElementById('livevideo').addEventListener(
                    'ended',
                    function() {
                        go("serie_play.php?sessao=<?php echo $_GET['sessao']; ?>&stream=<?php echo $_GET['proxid']; ?>&episodio=<?php echo $_GET['proxep']; ?>&temporada=<?php echo $_GET['temporada']; ?>&ext=<?php echo $_GET['ext']; ?>&proxid=<?php echo $_GET['proxid']; ?>&proxep=<?php echo $_GET['proxep']; ?>&serie=<?php echo $_GET['serie']; ?>&titulo=<?php echo $_GET['titulo']; ?>&duracao=<?php echo $_GET['duracao']; ?>&idserie=<?php echo $_GET['idserie']; ?>&plot=<?php echo $_GET['plot']; ?>&player=<?php echo isset($_GET['player']) ? $_GET['player']:'1'; ?>&img=<?php echo $_GET['img']; ?>&auto=1");
                    }
                );
            </script>
     <?php } ?>
     
     
     <?php if($_GET['player'] == 4) { ?>
      <script data-cfasync="false" type="text/javascript">
                jwplayer('livevideo').setup({
                    file: '<?php echo IP; ?>/<?php echo $tipo; ?>/<?php echo $user; ?>/<?php echo $pwd; ?>/<?php echo $id; ?>.<?php echo $exts; ?>',
                    title: '<?php echo $filme; ?>',
                    image: '<?php echo $img; ?>',
                    width: '100%',
                    stretching: 'uniform',
                    autostart: 'true',
                    androidhls: 'true',
                    mute: 'false',
                })
                .on('play', function(e) {
                                    })
                .on('beforeComplete', function() {
                    go("serie_play.php?sessao=<?php echo $_GET['sessao']; ?>&stream=<?php echo $_GET['proxid']; ?>&episodio=<?php echo $_GET['proxep']; ?>&temporada=<?php echo $_GET['temporada']; ?>&ext=<?php echo $_GET['ext']; ?>&proxid=<?php echo $_GET['proxid']; ?>&proxep=<?php echo $_GET['proxep']; ?>&serie=<?php echo $_GET['serie']; ?>&titulo=<?php echo $_GET['titulo']; ?>&duracao=<?php echo $_GET['duracao']; ?>&idserie=<?php echo $_GET['idserie']; ?>&plot=<?php echo $_GET['plot']; ?>&player=<?php echo isset($_GET['player']) ? $_GET['player']:'1'; ?>&img=<?php echo $_GET['img']; ?>&auto=1");
                })
                ;
            </script>
     <?php } ?>
     <?php if($_GET['player'] == 5) { ?>
     <script>
     document.getElementById('livevideo').addEventListener(
                    'ended',
                    function() {
                        go("serie_play.php?sessao=<?php echo $_GET['sessao']; ?>&stream=<?php echo $_GET['proxid']; ?>&episodio=<?php echo $_GET['proxep']; ?>&temporada=<?php echo $_GET['temporada']; ?>&ext=<?php echo $_GET['ext']; ?>&proxid=<?php echo $_GET['proxid']; ?>&proxep=<?php echo $_GET['proxep']; ?>&serie=<?php echo $_GET['serie']; ?>&titulo=<?php echo $_GET['titulo']; ?>&duracao=<?php echo $_GET['duracao']; ?>&idserie=<?php echo $_GET['idserie']; ?>&plot=<?php echo $_GET['plot']; ?>&player=<?php echo isset($_GET['player']) ? $_GET['player']:'1'; ?>&img=<?php echo $_GET['img']; ?>&auto=1");
                    }
                );
            </script>
     <?php } ?>
     
     <script>
        var video_player = document.querySelector('#livevideo');
        var button = document.getElementById("fullscreen");
        button.addEventListener('click', function () {
            if(video_player.requestFullScreen){
	            video_player.requestFullScreen();
            } else if(video_player.webkitRequestFullScreen){
	            video_player.webkitRequestFullScreen();
            } else if(video_player.mozRequestFullScreen){
	            video_player.mozRequestFullScreen();
            }
        });
    </script>
   </body>
</html>