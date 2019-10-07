<?php
if ( !isset($_COOKIE['xstatusm']) ){ echo '<script language="javascript">location = "index.php?reg=logar"</script>'; } 
?>
                     <li><a href="painel.php?sessao=<?php echo gerar_hash(256); ?>"><?php echo MENU_HOME; ?></a></li>
                     
                        <li class="dropdown mega-dropdown">
                           <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo MENU_TV_AO_VIVO; ?> <span class="fa fa-chevron-down pull-right"></span></a>
                           <ul class="dropdown-menu">
    <?php
	$url = IP."/player_api.php?username=$user&password=$pwd&action=get_live_categories";
	$resposta = apixtream($url);
	$output = json_decode($resposta,true);
	foreach($output as $res1) {
		$iss = gerar_hash(256);
		$idcatcanal = $res1['category_id'];
		$catgcanal = $res1['category_name'];
		if($idcatcanal == $_GET['id']) {
			$acv = 'msx';
		} else {
			$acv = '';
		}

		$termo = AVISO_ADULTOS_CANAL;
		$pattern = '/' . $termo . '/';
		if (preg_match($pattern, $catgcanal)) {
		  $adl = 'S';
		} else {
		  $adl = 'N';
		}
		
		echo '<li class="'.$acv.'"><a href="canais.php?sessao='.$iss.'&id='.$idcatcanal.'&catg='.urlencode($catgcanal).'&adulto='.$adl.'">'.$catgcanal.'</a></li>';
	}
	?>
                           </ul>
                        </li>
                        
                        <li class="dropdown mega-dropdown">
                           <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Filmes <span class="fa fa-chevron-down pull-right"></span></a>
                           <ul class="dropdown-menu">
                           
    <?php
    
	$url = IP."/player_api.php?username=$user&password=$pwd&action=get_vod_categories";
	$resposta = apixtream($url);
	$output = json_decode($resposta,true);
	foreach($output as $res2) {
		$iss = gerar_hash(256); 
		$idcatfilme = $res2['category_id'];
		$catgfilme = $res2['category_name'];
		if($idcatfilme == $_GET['id']) {
			$act = 'msx';
		} else {
			$act = '';
		}
		
		$termo = AVISO_ADULTOS_FILME;
		$pattern = '/' . $termo . '/';
		if (preg_match($pattern, $catgfilme)) {
		  $adf = 'S';
		} else {
		  $adf = 'N';
		}
		
		echo '<li class="'.$act.'"><a href="filmes.php?sessao='.$iss.'&id='.$idcatfilme.'&catg='.urlencode($catgfilme).'&adulto='.$adf.'">'.$catgfilme.'</a></li>';
	}
	?>
                        </ul>
                        </li>
                        
                        <li><a href="series.php?sessao=<?php echo gerar_hash(256); ?>"><?php echo MENU_SERIES; ?></a></li>
                        <?php if(LINK_PAGAR1 <> '') { ?>
                      <li><a href="assinatura.php?sessao=<?php echo gerar_hash(256); ?>"><?php echo MENU_RENOVAR; ?></a></li>
                      <?php } ?>
                        
                        <li><a href="?acao=sair"><?php echo MENU_SAIR; ?></a></li>