<?php

/*
$ip_custom=trim($_SERVER['REMOTE_ADDR']);

if($ip_custom!='79.154.206.25')
{
	require('/home/ascodevida/www/display/website/htdocs/down/index.html');die;
}*/

require_once('../../../core/configuration/includes.php');
require_once(COMMON_PAGES_PATH.'/includes/token_form.php');

//$domain=$_SERVER['HTTP_HOST'];
$domain=$subdomainname.'.'.$domainname;

//dispatcher
if(in_array($domain,array('localapi.ascodevida.com','api.ascodevida.com','apibeta.ascodevida.com'))){

	$idioma='es';

	if(isset($_REQUEST['key']) && !empty($_REQUEST['key'])) $api_key=$_REQUEST['key']; else $api_key='';
	if(isset($url_vars[0]) && !empty($url_vars[0])) $var1=trim(stripslashes(strip_tags($url_vars[0]))); else $var1='';
	if(isset($url_vars[1]) && !empty($url_vars[1])) $var2=trim(stripslashes(strip_tags($url_vars[1]))); else $var2='';
	if(isset($url_vars[2]) && !empty($url_vars[2])) $var3=trim(stripslashes(strip_tags($url_vars[2]))); else $var3='';
	//$var1=trim(stripslashes(strip_tags($url_vars[0])));
	//if(isset($url_vars[0]) && !empty($url_vars[0])) $api_key=$url_vars[0];
/*	if(isset($url_vars[0]) && !empty($url_vars[0])) $var1=trim(stripslashes(strip_tags($url_vars[0]))); else $var1='';
	if(isset($url_vars[1]) && !empty($url_vars[1])) $var1=trim(stripslashes(strip_tags($url_vars[1]))); else $var1='';
	if(isset($url_vars[2]) && !empty($url_vars[2])) $var2=trim(stripslashes(strip_tags($url_vars[2]))); else $var2='';
	if(isset($url_vars[3]) && !empty($url_vars[3])) $var3=trim(stripslashes(strip_tags($url_vars[3]))); else $var3='';
	if(isset($url_vars[4]) && !empty($url_vars[4])) $var4=trim(stripslashes(strip_tags($url_vars[4]))); else $var4='';
	if(isset($url_vars[5]) && !empty($url_vars[5])) $var5=trim(stripslashes(strip_tags($url_vars[5]))); else $var5='';
	if(isset($url_vars[6]) && !empty($url_vars[6])) $var6=trim(stripslashes(strip_tags($url_vars[6]))); else $var6='';*/

	/*if(in_array($var1, array('amistad', 'amor', 'dinero', 'estudios','familia', 'salud', 'sexo', 'trabajo', 'varios')) && is_numeric($var2))
	{
		include(PAGES_PATH.'/api_post.php');
	}else if($var1=='voto'){
		include(PAGES_PATH.'/api_vote.php');
	}else if($var1=='enviahistoria'){
		include(PAGES_PATH.'/api_send.php');
	}else if($var1=='moderar'){
		include(PAGES_PATH.'/api_moderate.php');
	}
	else
	{*/
		include(PAGES_PATH.'/api.php');
	//}
}else
if(isset($url_vars[0]) && $url_vars[0]!=''){

	$a_index=array('ultimos', 'mejores', 'merecidos', 'aleatorio', 'amistad', 'amor', 'dinero', 'estudios','familia', 'salud', 'sexo','picante', 'trabajo', 'varios','ave');
	if (in_array(strtolower($url_vars[0]), $a_index))
	{
		if(isset($url_vars[1]) && !empty($url_vars[1]) && is_numeric($url_vars[1]) && !in_array($url_vars[1], $a_index)){
			require(COMMON_PAGES_PATH.'/post.php');
		}else if(isset($url_vars[2]) && !empty($url_vars[2]) && !is_numeric($url_vars[2]) && $url_vars[1]=='p'){
			header ("Location: /$url_vars[0]");die;
		}else require_once(COMMON_PAGES_PATH.'/index.php');
	}else{
		switch ($url_vars[0]) {
			case 'l':
				require_once(COMMON_PAGES_PATH.'/adblock.php');
				break;
			case 'lh':
				require_once(COMMON_PAGES_PATH.'/adblock_hits.php');
				break;
			case 'acercade':
				require_once(COMMON_PAGES_PATH.'/aboutus.php');
				break;
			case 'contacto':
				require_once(MGLOBAL_PAGES_PATH.'/contact.php');
				break;
			case 'qr':
				require_once(PAGES_PATH.'/qr.php');
				break;
			case 'mantenimiento':
			case 'down':
				header('Location: '.DOCUMENT_ROOT.'/');
				break;
			case 'terminos':
				require_once(PAGES_PATH.'/terms.php');
				break;
			case 'privacidad':
				require_once(PAGES_PATH.'/privacy.php');
				break;
			case 'cookies':
				require_once(PAGES_PATH.'/cookies.php');
				break;
			case 'faq':
				require_once(COMMON_PAGES_PATH.'/faq.php');
				break;
			case 'publicidad':
				require_once(PAGES_PATH.'/advertising.php');
				break;
			case 'rss':
				require_once(PAGES_PATH.'/rss.php');
				break;
			case 'rssimage':
				require_once(PAGES_PATH.'/rss_image.php');
				break;
			case 'moderar':
				require_once(PAGES_PATH.'/moderate.php');
				break;
			case 'registro':
				require_once(MGLOBAL_PAGES_PATH.'/register.php');
				break;
			/*case 'widget_adv':
				require_once(PAGES_PATH.'/widget_adv.php');
				break;
			case 'widget':
				require_once(PAGES_PATH.'/widget.php');
				break;*/
			case 'login':
				require_once(MGLOBAL_PAGES_PATH.'/login.php');
				break;
			case 'busqueda':
				include(COMMON_PAGES_PATH.'/search_results.php');
				break;
			case 'busqueda_avanzada':

				if(isset($url_vars[1]) && isset($url_vars[2]) && is_string($url_vars[1]) && $url_vars[2]=='p' && is_numeric($url_vars[3]))
				{
					include(COMMON_PAGES_PATH.'/search_results.php');
				/*}else if(isset($url_vars[1]) && $url_vars[1]=='ultimas'){
					include(PAGES_PATH.'/last_search.php');
				}else if(empty($_POST) && isset($url_vars[1]) && $url_vars[1]!='ultimas'){ include(PAGES_PATH.'/advanced_search.php');*/
				}else if(empty($_POST) && $url_vars[0]=='busqueda_avanzada'){ include(MGLOBAL_PAGES_PATH.'/advanced_search.php');
				}else include(COMMON_PAGES_PATH.'/search_results.php');

				break;
			case 'contrasena':
				require_once(COMMON_PAGES_PATH.'/password.php');
				break;
			case 'reset_password':
				require_once(MGLOBAL_PAGES_PATH.'/set_new_password.php');
				break;
			case 'reactivar':
				require_once(MGLOBAL_PAGES_PATH.'/register_confirm_resend_email.php');
				break;
			case 'desconectar':
				require_once(PAGES_PATH.'/logout.php');
				break;
			case 'confirma':
				require_once(MGLOBAL_PAGES_PATH.'/register_confirm.php');
				break;
			case 'ranking':
				require_once(COMMON_PAGES_PATH.'/ranking.php');
				break;
			case 'usuarios':
				if(isset($url_vars[2]) && $url_vars[2]=='edit' && isset($url_vars[1]) && !empty($url_vars[1])){
					header ("Location: /usuarios/".$url_vars[1]);
				}elseif(isset($url_vars[2]) && $url_vars[2]=='comentarios'){
					include(COMMON_PAGES_PATH.'/profile.php');
				}else if(isset($url_vars[2]) && $url_vars[2]=='advenviados'){
					include(COMMON_PAGES_PATH.'/profile.php');
				}else if(isset($url_vars[1]) && !empty($url_vars[1])){
					include(COMMON_PAGES_PATH.'/profile.php');
				}else{
					header ("Location: /");
				}
				break;
			case '404':
				require_once(COMMON_PAGES_PATH.'/404.php');
				break;
			/*case 'redirect':
				require_once(COMMON_PAGES_PATH.'/hits_redirect.php');
				break;*/
			default:
				require_once(COMMON_PAGES_PATH.'/404.php');
				break;
		}

	}


}else{
	//homepage / landing page
	require_once(COMMON_PAGES_PATH.'/index.php');