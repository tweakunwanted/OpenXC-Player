<?php 
include("Xtream_api.php"); 
// Do not remove or won't work
?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <?php include("inc/head.php"); ?>
   </head>
   <body onselectstart="return false" oncontextmenu="return false" ondragstart="return false">
      <!-- LOGIN -->
      <div id="login" class="container-fluid standard-bg">
         <!-- HEADER -->
         <div class="row header-top">
            <div class="col-lg-3 col-md-6 col-sm-12">
               <a class="main-logo" href="index.php"><img style="height:180px;" src="assets/<?php echo $template; ?>/img/logo-player.png" class="main-logo" alt="<?php echo NOME_IPTV; ?>" title="<?php echo NOME_IPTV; ?>"></a>
            </div>
            <div class="col-lg-6 hidden-md text-center hidden-sm hidden-xs">
               
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12">
               <div class="right-center">
               <?php if(ATIVAR_TESTE == 1) { ?>
                  <button type="button" class="access-btn" data-toggle="modal" data-target="#enquirypopup">Teste Grátis Agora</button>
                  <?php } ?>
               </div>
            </div>
         </div>
         <!-- MENU -->
         <div class="row home-mega-menu ">
            <div class="col-md-12">
               
            </div>
         </div>
         <!-- LOGIN -->
         <div class="row">
            <div class="container">
               <section class="registration col-lg-12 col-md-12">
                  <div class="row secBg">
                     <div class="large-12 columns">
                        <div class="login-register-content">
                           <div class="row">
                              <div class="col-md-12 text-center login-header">
                                 <h2 class="title main-head-title"><?php echo HOME_BEMVINDO; ?></h2>
                                 <p><?php echo HOME_TEXTO_BEMVINDO; ?></p>
                               
                              </div>
                              
                              <div class="col-md-12 login-header">
        <?php if($_GET['sess'] == 'teste') { ?>
        <div class="alert alert-danger"><b>OCORREU UM ERRO</b> Desculpe você já solicitou um teste em nosso sistema.</div>                         
        <?php } ?>
        <?php if($_GET['sess'] == 'block') { ?>
        <div class="alert alert-danger"><b>USUÁRIO BLOQUEADO</b> Desculpe seu usuário esta bloqueado ou vencido entre em contato com o suporte.</div> 
        <?php } ?>
        <?php if($_GET['sess'] == 'erro') { ?>
        <div class="alert alert-danger"><b>DADOS INVÁLIDOS</b> Desculpe não foi possível realizar seu login, dados não encontrados no sistema.</div> 
        <?php } ?>      
                            
                              </div>
                              <div class="clearfix spacer"></div>
                            
                              <div class="col-md-6">
                      <div class="register-form">
                         <h2 class="title main-head-title"><?php echo HOME_TXT_LOGIN; ?></h2>
                         <form method="POST" action="">
                         <input type="hidden" name="op" value="login"/>
                         <label><?php echo HOME_TXT_USER; ?></label>
                                       <div class="input-group">
                                          <span class="fa fa-user login-inputicon"></span>
                                          <input type="text" style="color:#000000;" name="usuario" required>
                                       </div>
                                       <label><?php echo HOME_TXT_PASS; ?></label>
                                       <div class="input-group">
                                          <span class="fa fa-lock login-inputicon"></span>
                                          <input type="password" style="color:#000000;" name="senha" required> 
                                       </div>
                                       
                                       <div class="login-btn-box">
                                          <button class="access-btn" type="submit"><?php echo HOME_BOTAO_LOGIN; ?></button>
                                       </div>
                                    </form>
                                 </div>
                              </div>
                           </div>
                        </div>
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
      
      
      
      <!-- MODAL -->
      <?php if(ATIVAR_TESTE == 1) { ?>
      <div id="enquirypopup" class="modal fade in " role="dialog">
         <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content row">
               <div class="modal-header custom-modal-header">
                  <button type="button" class="close" data-dismiss="modal">×</button>
                  <h2 class="icon"><?php echo HOME_TXT_TESTE; ?></h2>
                  <p><?php echo HOME_TXT_TESTE_DESC; ?><br> por <?php echo HORAS; ?> <?php echo HOME_TXT_HORAS; ?></p>
               </div>
               <div class="modal-body">
                  <form name="info_form" class="form-inline" action="" method="POST">
                  <input type="hidden" name="op" value="criarteste">
                     <div class="form-group col-sm-12">
                        <input type="text" style="color:#000000;" class="form-control" name="nome" id="nome" placeholder="<?php echo HOME_CAMPO_NOME; ?>" required>
                     </div>
                     <div class="form-group col-sm-12">
                        <input type="email" style="color:#000000;" class="form-control" name="email" id="email" placeholder="<?php echo HOME_CAMPO_EMAIL; ?>" required>
                     </div>
                     <div class="form-group col-sm-12">
                        <input type="text" style="color:#000000;" class="form-control" name="wa" id="wa" placeholder="<?php echo HOME_CAMPO_WA; ?>">
                     </div>
                     <div class="form-group col-sm-12">
                        <button class="subscribe-btn pull-right" type="submit" title="Enviar"><?php echo HOME_BOTAO_TESTE; ?></button>
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </div>
      <?php } ?>
   </body>
</html>
