<div class="col-lg-9 col-md-8 col-sm-12 col-xs-12">
               <a class="main-logo" href="painel.php?sessao=<?php echo gerar_hash(256); ?>"><img style="height:140px;" src="assets/<?php echo $template; ?>/img/logo-player.png" class="main-logo img-responsive" alt="<?php echo NOME_IPTV; ?>" title="<?php echo NOME_IPTV; ?>"></a>
            </div>
           
            <div class="col-lg-3 col-md-4 col-sm-12 col-xs-12">
               <b><?php echo TXT_BEMVINDO; ?>: <?php echo $user; ?></b><br>
               <?php echo TXT_TELAS; ?>: <?php echo $_COOKIE['xconnm']; ?><br>
               <?php echo TXT_VALIDADE; ?>: <?php echo date('d/m/Y H:i:s', $_COOKIE['xdataexpm']); ?><br>
            <?php echo TXT_RESTAM; ?>: <?php
            	$dsfim = date('Y-m-d', $_COOKIE['xdataexpm']);
            	$data_inicio = new DateTime(date('Y-m-d'));
    			$data_fim = new DateTime($dsfim);
    			$dateInterval = $data_inicio->diff($data_fim);
    			echo $dateInterval->days . ' Dias';
    			?>
            </div>