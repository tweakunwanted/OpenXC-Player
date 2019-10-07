<?php
require_once("libs/lib.php");


$user = $_COOKIE['xuserm'];
$pwd = $_COOKIE['xpwdm'];
$id = trim($_REQUEST['stream']);
$tipo = trim($_REQUEST['streamtipo']);

$url = IP."/player_api.php?username=$user&password=$pwd&action=get_vod_info&vod_id=$id";
	
$resposta = apixtream($url);
$output = json_decode($resposta,true);
$img = $output['info']['movie_image'];
$filme = $output['movie_data']['name'];
$idcategoria = $output['movie_data']['category_id'];
$exts = $output['movie_data']['container_extension'];
$trailer = $output['info']['youtube_trailer'];
$diretor = $output['info']['director'];
$cast = $output['info']['cast'];
$plot = $output['info']['plot'];
$genero = $output['info']['genre'];
$duracao = $output['info']['duration'];

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
       <h2 class="title main-head-title"><?php echo $filme; ?></h2>
         <div class="metabox">
           
                           
           <span class="meta-i">
            <i class="fa fa-clock-o"></i><?php echo TXT_DURACAO; ?>: <?php echo $duracao; ?>
           </span>
            
            <a href="javascript:void(0)" id="fullscreen"><?php echo TXT_FULLSCREEN; ?></a>
          
          </div>
          
                     <a href="filme.php?sessao=<?php echo $_GET['sessao']; ?>&stream=<?php echo $_GET['stream']; ?>&streamtipo=<?php echo $_GET['streamtipo']; ?>&player=1" class="btn <?php if($_GET['player'] == 1 || $_GET['player'] == '') { echo 'btn-primary'; } ?>">PLAYER 1</a>
                     <a href="filme.php?sessao=<?php echo $_GET['sessao']; ?>&stream=<?php echo $_GET['stream']; ?>&streamtipo=<?php echo $_GET['streamtipo']; ?>&player=2" class="btn <?php if($_GET['player'] == 2) { echo 'btn-primary'; } ?>">PLAYER 2</a>
                     <a href="filme.php?sessao=<?php echo $_GET['sessao']; ?>&stream=<?php echo $_GET['stream']; ?>&streamtipo=<?php echo $_GET['streamtipo']; ?>&player=3" class="btn <?php if($_GET['player'] == 3) { echo 'btn-primary'; } ?>">PLAYER 3</a>
                     <a href="filme.php?sessao=<?php echo $_GET['sessao']; ?>&stream=<?php echo $_GET['stream']; ?>&streamtipo=<?php echo $_GET['streamtipo']; ?>&player=4" class="btn <?php if($_GET['player'] == 4) { echo 'btn-primary'; } ?>">PLAYER 4</a>
                     <a href="filme.php?sessao=<?php echo $_GET['sessao']; ?>&stream=<?php echo $_GET['stream']; ?>&streamtipo=<?php echo $_GET['streamtipo']; ?>&player=5" class="btn <?php if($_GET['player'] == 5) { echo 'btn-primary'; } ?>">PLAYER 5</a>
                        
                     </div>
                     <div class="clearfix spacer"></div>
                     <!-- DETAILS -->
                     <div class="video-content">
                        <h2 class="title main-head-title"><?php echo TXT_INFO; ?></h2>
                        <p>
                       <?php echo isset($plot) ? $plot:' N/A '; ?>
                       <br><br>
                       <?php echo TXT_DIRETOR; ?>: <?php echo isset($diretor) ? $diretor:' N/A '; ?>
                       <br><br>
                       <?php echo TXT_ELENCO; ?>: <?php echo isset($cast) ? $cast:' N/A '; ?>
                       <br><br>
                       <?php echo TXT_GENERO; ?>: <?php echo isset($genero) ? $genero:' N/A '; ?>
                       
                       <?php echo $trailer; ?>
                        </p>
                      
                     </div>
                    
                  </article>
                  <div class="clearfix spacer"></div>
               
					
			   </div>
            </div>
         </div>
      </div>
      <!-- CHANNELS -->
      <div id="channels-block" class="container-fluid channels-bg">
         <div class="container-fluid ">
            <div class="col-md-12">
            <br><br>
               <h2 class="icon"><i class="fa fa-television" aria-hidden="true"></i><?php echo TXT_FILMES_SUGESTAO; ?></h2>
               <br><br>  
               <div class="row auto-clear" id="resultados">
                
       
    <?php
	$url = IP."/player_api.php?username=$user&password=$pwd&action=get_vod_streams&category_id=$idcategoria";
	$resposta = apixtream($url);
	$output = json_decode($resposta,true);
	shuffle($output);
	$i = 1;
	foreach(array_rand($output,12) as $index) {
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
                                    <a class="afterglow post-thumb" href="filme.php?sessao=<?php echo $_GET['sessao']; ?>&stream=<?php echo $filme_id; ?>&streamtipo=<?php echo $filme_type; ?>">
                                       <span class="play-btn-border" title="<?php echo $filme_nome; ?>"><i class="fa fa-play-circle headline-round" aria-hidden="true"></i></span>
                                       <div class="cactus-note ct-time font-size-1"><span>02:02</span></div>
                                       <img class="img-responsive" src="<?php echo $filme_img; ?>" alt="<?php echo $filme_nome; ?>" style="width:100%;height:390px;">
                                    </a>
                                 </div>
                                 <div class="infor">
                                    <h4>
                                       <a class="title" href="filme.php?sessao=<?php echo $_GET['sessao']; ?>&stream=<?php echo $filme_id; ?>&streamtipo=<?php echo $filme_type; ?>"><?php echo limitar_texto($filme_nome,30); ?></a>
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
                                go('filmes.php?sessao=<?php echo $_GET['sessao']; ?>&id=<?php echo $idcategoria; ?>');
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
      playerobj.on('ended', function() { go('filmes.php?sessao=<?php echo $_GET['sessao']; ?>&id=<?php echo $idcategoria; ?>'); });
     
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
                        go('filmes.php?sessao=<?php echo $_GET['sessao']; ?>&id=<?php echo $idcategoria; ?>');
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
                    go('filmes.php?sessao=<?php echo $_GET['sessao']; ?>&id=<?php echo $idcategoria; ?>');
                })
                ;
            </script>
     <?php } ?>
     <?php if($_GET['player'] == 5) { ?>
     <script>
     document.getElementById('livevideo').addEventListener(
                    'ended',
                    function() {
                        go('filmes.php?sessao=<?php echo $_GET['sessao']; ?>&id=<?php echo $idcategoria; ?>');
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