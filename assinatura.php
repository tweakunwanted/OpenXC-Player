<?php
$idrefuser = $_COOKIE['xuserm'];
require_once("libs/lib.php");

$user = $_COOKIE['xuserm'];
$pwd = $_COOKIE['xpwdm'];

?>
<!DOCTYPE html>
<html lang="en">
   <head>
     <?php include("inc/head.php"); ?>
     <link href="assets/css/planos.css" rel="stylesheet">
   </head>
   <body onselectstart="return false" oncontextmenu="return false" ondragstart="return false">
      <!-- GALLERY VIDEO GRID FULLWIDTH -->
      <div id="single-video-right-sidebar" class="container-fluid standard-bg">
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
         
         
         <div class="row">
            <!-- VIDEO POSTS -->	
            <div class="col-lg-12 col-md-12">
              
               <section id="gallery-video-section">
                  <div class="row">
        <div class="col-lg-1 col-md-1"></div>             
        <div class="col-lg-10 col-md-10 col-sm-12 category-video-grid">
        <h2 class="icon"><i class="fa fa-money" aria-hidden="true"></i><?php echo TXT_ASSINATURA; ?></h2>
           
          <div id="generic_price_table"> 
           <div class="row">
            
            <?php if($valor1 > 0) { ?>
                <div class="col-md-3">
                    <div class="generic_content clearfix">
                        <div class="generic_head_price clearfix">
                            <div class="generic_head_content clearfix">
                                <div class="head_bg"></div>
                                <div class="head">
                                    <span><?php echo $nome1; ?></span>
                                </div>
                            </div>

                            <div class="generic_price_tag clearfix">    
                            <span class="price">
                            <span class="sign"><?php echo TXT_MOEDA; ?></span>
                            <span class="currency"><?php echo $vl1[0]; ?></span>
                            <span class="cent">,<?php echo $vl1[1]; ?></span>
                            <span class="month"><?php echo TXT_MES; ?></span>
                            </span>
                            </div>
                            
                        </div>                            

                        <div class="generic_feature_list">
                            <ul>
                                <?php echo DESCRICAO_PLANOS; ?>
                            </ul>
                        </div>
                        <div class="generic_price_btn clearfix">
  <a class="" href="<?php echo LINK_PAGAR1; ?>" data-lity><?php echo BOTAO_ASSINAR; ?></a>
                        </div>
                    </div>
                </div>
                <?php } ?>
                
                <?php if($valor2 > 0) { ?>
                <div class="col-md-3">
                    <div class="generic_content clearfix">
                        <div class="generic_head_price clearfix">
                            <div class="generic_head_content clearfix">
                                <div class="head_bg"></div>
                                <div class="head">
                                    <span><?php echo $nome2; ?></span>
                                </div>
                            </div>

                            <div class="generic_price_tag clearfix">    
                            <span class="price">
                            <span class="sign"><?php echo TXT_MOEDA; ?></span>
                            <span class="currency"><?php echo $vl2[0]; ?></span>
                            <span class="cent">,<?php echo $vl2[1]; ?></span>
                            <span class="month"><?php echo TXT_MES; ?></span>
                            </span>
                            </div>
                            
                        </div>                            

                        <div class="generic_feature_list">
                            <ul>
                                <?php echo DESCRICAO_PLANOS; ?>
                            </ul>
                        </div>
                        <div class="generic_price_btn clearfix">
  <a class="" href="<?php echo LINK_PAGAR2; ?>" data-lity><?php echo BOTAO_ASSINAR; ?></a>
                        </div>
                    </div>
                </div>
                <?php } ?>
                
                <?php if($valor3 > 0) { ?>
                <div class="col-md-3">
                    <div class="generic_content clearfix">
                        <div class="generic_head_price clearfix">
                            <div class="generic_head_content clearfix">
                                <div class="head_bg"></div>
                                <div class="head">
                                    <span><?php echo $nome3; ?></span>
                                </div>
                            </div>

                            <div class="generic_price_tag clearfix">    
                            <span class="price">
                            <span class="sign"><?php echo TXT_MOEDA; ?></span>
                            <span class="currency"><?php echo $vl3[0]; ?></span>
                            <span class="cent">,<?php echo $vl3[1]; ?></span>
                            <span class="month"><?php echo TXT_MES; ?></span>
                            </span>
                            </div>
                            
                        </div>                            

                        <div class="generic_feature_list">
                            <ul>
                                <?php echo DESCRICAO_PLANOS; ?>
                            </ul>
                        </div>
                        <div class="generic_price_btn clearfix">
  <a class="" href="<?php echo LINK_PAGAR3; ?>" data-lity><?php echo BOTAO_ASSINAR; ?></a>
                        </div>
                    </div>
                </div>
                <?php } ?>
                
                <?php if($valor4 > 0) { ?>
                <div class="col-md-3">
                    <div class="generic_content clearfix">
                        <div class="generic_head_price clearfix">
                            <div class="generic_head_content clearfix">
                                <div class="head_bg"></div>
                                <div class="head">
                                    <span><?php echo $nome4; ?></span>
                                </div>
                            </div>

                            <div class="generic_price_tag clearfix">    
                            <span class="price">
                            <span class="sign"><?php echo TXT_MOEDA; ?></span>
                            <span class="currency"><?php echo $vl4[0]; ?></span>
                            <span class="cent">,<?php echo $vl4[1]; ?></span>
                            <span class="month"><?php echo TXT_MES; ?></span>
                            </span>
                            </div>
                            
                        </div>                            

                        <div class="generic_feature_list">
                            <ul>
                                <?php echo DESCRICAO_PLANOS; ?>
                            </ul>
                        </div>
                        <div class="generic_price_btn clearfix">
  <a class="" href="<?php echo LINK_PAGAR4; ?>" data-lity><?php echo BOTAO_ASSINAR; ?></a>
                        </div>
                    </div>
                </div>
                <?php } ?>
                
                <div class="col-sm-12">
                <br><br><br><br>
                <span style="color:#ffffff;font-size: 20px;">
               <p><?php echo TXT_DESCRICAO_ASSINATURA; ?>
<br><?php echo TXT_DESCRICAO_ASSINATURA_DESCONTO; ?></p>
			<br><br>
			<?php if(WHATSAPP <> '') { ?>
			<center>
				<a href="https://wa.me/<?php echo WHATSAPP; ?>?text=<?php echo urlencode("Olá tenho algumas dúvidas e gostaria de suporte."); ?>" class="btn btn-lg btn-success" target="_blank"><?php echo BOTAO_WHATSAPP; ?></a>
			</center>
 			<?php } ?>
            </span></div>  
            </div>  
            </div>  
                        
                        
                       
                        <div class="clearfix spacer"></div>
                     </div>
                     <div class="col-lg-1 col-md-1"></div> 
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