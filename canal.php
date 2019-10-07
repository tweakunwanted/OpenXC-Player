<?php
require_once("libs/lib.php");


$user = $_COOKIE['xuserm'];
$pwd = $_COOKIE['xpwdm'];
$id = trim($_REQUEST['stream']);
$tipo = trim($_REQUEST['streamtipo']);
$canal = urldecode($_REQUEST['canal']);
$img = urldecode($_REQUEST['img']);
$idcatg = trim($_REQUEST['catg']);

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
      <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/afterglowplayer@1/dist/afterglow.min.js"></script>
      <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/hls.js@latest"></script>
      <?php } ?>
      <?php if($_GET['player'] == 3) { ?>
      <script src="https://cdn.jsdelivr.net/npm/hls.js@latest"></script>
      <?php } ?>
      <?php if($_GET['player'] == 4) { ?>
      <script src='https://content.jwplatform.com/libraries/fgbTqCCh.js'></script>

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
         
          <div class="col-lg-2 col-md-3 hidden-sm hidden-xs">
               <aside class="dark-bg">
               
                  <article>
                     <h2 class="icon"><?php echo TXT_CANAIS_SUGESTAO; ?></h2>
             <ul class="sidebar-links">

                     <?php
	$url = IP."/player_api.php?username=$user&password=$pwd&action=get_live_streams&category_id=$idcatg";
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
		$canal_img = $index['stream_icon'];	
		$category_id = $index['category_id'];
	?>
                        <li class="fa fa-chevron-right"><a href="canal.php?sessao=<?php echo $_GET['sessao']; ?>&stream=<?php echo $canal_id; ?>&streamtipo=<?php echo $canal_type; ?>&canal=<?php echo urlencode($canal_nome); ?>&img=<?php echo urlencode($canal_img); ?>&catg=<?php echo $category_id; ?>"><?php echo $canal_nome; ?></a></li>
                        <?php } ?>
                     </ul>
                  </article>
                  
               </aside>
            </div>

         
            <div class="container">
               <!-- SINGLE VIDEO FULLWIDTH -->	
               <div id="single-video-fullwidth-wrapper" class="col-lg-10 col-md-9 col-sm-12">
                  <!-- VIDEO SINGLE POST -->
                  <article class="post-video">
                     <!-- VIDEO INFO -->
                     <div class="video-info dropshd">
                        <!-- 16:9 aspect ratio -->
        <div class="embed-responsive embed-responsive-16by9 video-embed-box">
        
        <?php if($_GET['player'] == 1 || $_GET['player'] == '') { ?>
        <div id="livevideo"></div>
        <?php } ?>
        <?php if($_GET['player'] == 2) { ?>
        <video class="afterglow" id="livevideo" style="width:100%;height:650px;" controls src="<?php echo IP; ?>/<?php echo $tipo; ?>/<?php echo $user; ?>/<?php echo $pwd; ?>/<?php echo $id; ?>.m3u8"></video>
        <?php } ?>
        <?php if($_GET['player'] == 3) { ?>
        <video id="livevideo" controls autoplay style="width:100%;height:650px;"></video>
        <?php } ?>
        <?php if($_GET['player'] == 4) { ?>
        <video id="livevideo" controls style="width:100%;height:650px;"></video>
        <?php } ?>
        
        
       </div>
       <h2 class="title main-head-title"><?php echo $canal; ?></h2>
         <div class="metabox">
           
                           
           <span class="meta-i">
            <i class="fa fa-clock-o"></i><?php echo AO_VIVO; ?>
           </span>
        
           <a href="javascript:void(0)" id="fullscreen"><?php echo TXT_FULLSCREEN; ?></a>
          
          </div>
          
                     <a href="canal.php?sessao=<?php echo $_GET['sessao']; ?>&stream=<?php echo $_GET['stream']; ?>&streamtipo=<?php echo $_GET['streamtipo']; ?>&player=1&canal=<?php echo $_GET['canal']; ?>" class="btn <?php if($_GET['player'] == 1 || $_GET['player'] == '') { echo 'btn-primary'; } ?>">PLAYER 1</a>
                     
                     <a href="canal.php?sessao=<?php echo $_GET['sessao']; ?>&stream=<?php echo $_GET['stream']; ?>&streamtipo=<?php echo $_GET['streamtipo']; ?>&player=2&canal=<?php echo $_GET['canal']; ?>" class="btn <?php if($_GET['player'] == 2) { echo 'btn-primary'; } ?>">PLAYER 2</a>
                     
                     <a href="canal.php?sessao=<?php echo $_GET['sessao']; ?>&stream=<?php echo $_GET['stream']; ?>&streamtipo=<?php echo $_GET['streamtipo']; ?>&player=3&canal=<?php echo $_GET['canal']; ?>" class="btn <?php if($_GET['player'] == 3) { echo 'btn-primary'; } ?>">PLAYER 3</a>
                     
                     <a href="canal.php?sessao=<?php echo $_GET['sessao']; ?>&stream=<?php echo $_GET['stream']; ?>&streamtipo=<?php echo $_GET['streamtipo']; ?>&player=4&canal=<?php echo $_GET['canal']; ?>" class="btn <?php if($_GET['player'] == 4) { echo 'btn-primary'; } ?>">PLAYER 4</a>
               
                        
                     </div>
                     <div class="clearfix spacer"></div>
                     <!-- DETAILS -->
                     <div class="video-content" style="background:#ffffff;">
                        <h2 class="title main-head-title"><span style="color:#000;">EPG</span></h2>
                        <table width="100%" class="table table-spriped">
                        
   <?php
   $url = IP."/player_api.php?username=$user&password=$pwd&action=get_short_epg&stream_id=$id";
	
	$resposta = apixtream($url);
	$output = json_decode($resposta,true);
	
	foreach($output['epg_listings'] as $index) {
	
	echo '<tr>';
	echo '<td><span style="color:#000;"><b>PROGRAMA: ' . base64_decode($index['title']) . '</b></span></td>';
	echo '<td><span style="color:#000;">' . ds($index['start']) . '</span></td>';
	echo '<td><span style="color:#000;">' . ds($index['end']) . '</span></td>';
	echo '</tr>';	
	echo '<tr>';
	echo '<td colspan="3"><span style="color:#000;">' . base64_decode($index['description']) . '</span></td>';
	echo '</tr>';
	
	}
	?>
		
	</table>
                        
                      
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
	$url = IP."/player_api.php?username=$user&password=$pwd&action=get_vod_streams";
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
                                       <div class="cactus-note ct-time font-size-1"><span><?php echo TAG_VOD; ?></span></div>
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
                        source: "<?php echo IP; ?>/<?php echo $tipo; ?>/<?php echo $user; ?>/<?php echo $pwd; ?>/<?php echo $id; ?>.m3u8",
                        parentId: "#livevideo",
                        autoPlay: true,
                        height: 'auto',
                        width: '100%',
                        poster: "<?php echo $img; ?>",
                        watermark: "assets/<?php echo $template; ?>/img/main-logo.png",
       					watermarkLink: "#",
       					position: 'bottom-right'
                    }
                );
            </script>
     <?php } ?>
     
     <?php if($_GET['player'] == 2) { ?>
     <script>
     
     var config = {
      autoStartLoad: true,
      startPosition: -1,
      debug: false
  };
     
     	if (Hls.isSupported()) {
  var video2 = document.getElementById('livevideo');
  var hls = new Hls(config);
  hls.loadSource(video2.src);
  hls.attachMedia(video2);
  hls.on(Hls.Events.MANIFEST_PARSED, function() {
  video2.play();
  });
}
     </script>
     <?php } ?>
     
     <?php if($_GET['player'] == 3) { ?>
     <script>
  var video = document.getElementById('livevideo');
  if(Hls.isSupported()) {
    var hls = new Hls();
    hls.loadSource('<?php echo IP; ?>/<?php echo $tipo; ?>/<?php echo $user; ?>/<?php echo $pwd; ?>/<?php echo $id; ?>.m3u8');
    hls.attachMedia(video);
    hls.on(Hls.Events.MANIFEST_PARSED,function() {
      video.play();
  });
 }
</script>
     <?php } ?>
     <?php if($_GET['player'] == 4) { ?>
     <script type="text/javascript">
     window.onload=function(){
      jwplayer("livevideo").setup({
        "file": "<?php echo IP; ?>/<?php echo $tipo; ?>/<?php echo $user; ?>/<?php echo $pwd; ?>/<?php echo $id; ?>.m3u8",
        "height": 650,
        "width":"100%",
      	"aspectratio": "16:9" 
      
      });
    }
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