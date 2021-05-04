<!DOCTYPE html>
<html class="en ltr os_Windows10 passiveeventlisteners csstransforms supports csstransforms3d backgroundsize borderradius cssanimations csstransitions canvas audio video svg smil os_Windows10_AU_Undetected uhfHeader-v2 js" data-language="en" data-pagename="home" data-pagetype="home" data-pagepath="/" data-region="in" dir="ltr" lang="en">
<head id="head">
	<meta http-equiv="content-type" content="text/html; charset=UTF-8">
	<title>
	<?php 
	if($metaData['title']):
		echo $metaData['title'];
	else:
		echo $configList['title'];
	endif;
	?>
	</title>
	<?php 
	if($metaData['description']):
		$description = $metaData['description'];
	else:
		$description = $configList['site_description'];
	endif;
	?>
	<meta name="description" content="<?= $description ?>">
	<?php 
	if($metaData['description']):
		$description = $metaData['keywords'];
	else:
		$description = $configList['site_keywords'];
	endif;
	?>
	<meta name="keywords" content="<?= $description ?>">
	<?php 
	if($metaData['description']):
		$description = $metaData['author'];
	else:
		$description = $configList['author'];
	endif;
	?>
	<meta name="author" content="<?= $description ?>">
	<meta charset="utf-8">
	<!-- JSLL -->
	<meta name="ms.appid" content="JS:scom">
	<meta name="ms.lang" content="en">
	<meta name="ms.pagetype" content="home">
	<!-- DNS prefetch -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="X-UA-Compatible" content="IE=Edge">
	<meta http-equiv="Cache-control" content="max-age=0">
	<meta http-equiv="Cache-control" content="no-cache">
	<meta http-equiv="Expires" content="0">
	<meta http-equiv="Pragma" content="no-cache">
	<!-- Social Tags [start] -->
	<meta property="og:url" content="https://www.Urrzaa.com/en//">
	<meta property="og:type" content="website">
	<meta property="og:title" content="Urrzaa | Communication tool for free calls and chat">
	<meta property="og:description" content="Stay in touch! Free online calls, messaging, affordable international calling to mobiles or landlines and Urrzaa for Business for effective collaboration.">
	<meta property="og:image" content="https://urrza.com/img/Urrzaa-fb-og.png">
	<meta name="twitter:card" content="summary_large_image">
	<meta name="twitter:site" content="@Urrzaa">
	<meta name="twitter:title" content="Urrzaa | Communication tool for free calls and chat">
	<meta name="twitter:description" content="Stay in touch! Urrzaa for Business for effective collaboration.">
	<meta name="twitter:image" content="https://urrzaa.com/img/twitter-og.png">
	<!-- Social Tags [end] -->
	<!-- Favicon -->
	<link rel="icon" href="img/favicon.png" type="image/icon">
	<link rel="shortcut icon" href="img/favicon.png">
	<link rel="apple-touch-icon" href="img/apple-touch-icon.png">
	<!-- [STYLES][START] -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" href="css/main-v4.css">
	<link rel="stylesheet" href="css/vendorsapp.css">
	<link rel="stylesheet" href="css/app.css">
	<!-- UHF Styles -->
	<link rel="stylesheet" href="css/65-e1a08b.css" type="text/css" media="all">
	<link rel="stylesheet" href="css/mscc-0.css" type="text/css">
	<!-- [STYLES][END] -->
	<!-- [JAVASCRIPT-HEAD][START] -->
	<script> function onArtemisLoad(callback) { if (window.Artemis) { callback(); } else { setTimeout(onArtemisLoad.bind(null, callback), 1000); } } window.artemisRequire = function(paths, callback) { if (!window.Artemis) { onArtemisLoad(resolve.bind(null, paths, callback)); } else { resolve(); } function resolve() { var requiredModules = paths.map(function(path) { return path.reduce(function(acc, cur) { acc = acc ? acc[cur] : undefined; return acc; }, Artemis) }).filter(function(x) { return x !== undefined; }); if (requiredModules && requiredModules.length> 0) { callback.apply(null, requiredModules); } } }; window.UrrzaaArtemis = (function(source) { if (!source) { source = {}; } function deepAdd(level, settings) { for (var s in settings) { if (!level.hasOwnProperty(s)) { level[s] = settings[s]; } else if (level[s] !== null && typeof level[s] === 'object') { deepAdd(level[s], settings[s]); } } } function deepUpdate(level, settings) { for (var s in settings) { if (level[s] !== null && typeof level[s] === 'object') { deepUpdate(level[s], settings[s]); } else { level[s] = settings[s]; } } } function addSettings(settings) { if (!settings) return; if (!window["Urrzaa_SETTINGS"]) { window["Urrzaa_SETTINGS"] = {}; } deepAdd(window["Urrzaa_SETTINGS"], settings); } function updateSettings(settings) { if (!settings) return; if (!window["Urrzaa_SETTINGS"]) { window["Urrzaa_SETTINGS"] = {}; } deepUpdate(window["Urrzaa_SETTINGS"], settings); } function addUrrzaaSettings(settings) { if (!settings) return; if (!window["Urrzaa_SETTINGS"]) { window["Urrzaa_SETTINGS"] = {}; } if (!window["Urrzaa_SETTINGS"].settings) { window["Urrzaa_SETTINGS"].settings = {}; } deepAdd(window["Urrzaa_SETTINGS"].settings, settings); } function updateUrrzaaSettings(settings) { if (!settings) return; if (!window["Urrzaa_SETTINGS"]) { window["Urrzaa_SETTINGS"] = {}; } if (!window["Urrzaa_SETTINGS"].settings) { window["Urrzaa_SETTINGS"].settings = {}; } deepUpdate(window["Urrzaa_SETTINGS"].settings, settings); } source.addSettings = addSettings; source.updateSettings = updateSettings; source.addUrrzaaSettings = addUrrzaaSettings; source.updateUrrzaaSettings = updateUrrzaaSettings; return source; })(window.UrrzaaArtemis); </script><script> UrrzaaArtemis.addSettings({ slowLoadTimeout: 10000, toggleSelectors: { "notSet": "#initial-state", "neo": "#neo-content", "green": "#green-content" } }); </script>
	<!-- 3d-party libs -->
	<script src="<?= webURL ?>js/jquery-3.js"></script>
	<script src="<?= webURL ?>js/bundle.js"></script>
	<script src="<?= webURL ?>js/modernizr.js"></script>
	<!-- jQuery library (served from Google)
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script> -->
	<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	<!-- bxSlider Javascript file -->
	<script src="<?= webURL ?>js/jquery.bxslider.min.js"></script>
	<script src="<?= webURL ?>js/wow.min.js"></script>
	<!-- bxSlider CSS file -->
	<link href="css/jquery.bxslider.css" rel="stylesheet" />
	<link href="css/animate.css" rel="stylesheet" />
	<!-- [start] LazyLoad -->
	<script> UrrzaaArtemis.addSettings({ UrrzaaLazyLoadActive: true }); if (window.UrrzaaLazyGravity && typeof window.UrrzaaLazyGravity.init === "function") { window.UrrzaaLazyGravity.init([".lazyLoad", ".promo-image"]); } </script>
	<style>
	.lazyLoad, .promo-image {
		background-image: url(data:image/gif;base64,R0lGODlhAQABAAAAACwAAAAAAQABAAA=) !important;
	}
	</style> 
	<script> var settings = { api: { "standByFor": "5000", "contracts": "https://api.Urrzaa.com/wallet/contracts/atu", "UrrzaaNumber": "https://api.Urrzaa.com/Urrzaa-number/users/self/services?statusList=active,reserved&expand=1", "UrrzaaNumberByServiceId": "https://api.Urrzaa.com/users/self/services/Urrzaain/", "callerId": "https://api.Urrzaa.com/users/self/services/cli/settings?expand=smsCapable", "services": "https://consumer.entitlement.Urrzaa.com​​/users/{0}/services?language=en", "contentApiUrl": "https://contentapi.Urrzaa.com/api/v2-0/regions/", "buyCredit": "https://secure.Urrzaa.com/{0}/credit?currency={1}", "sendCredit": "https://secure.Urrzaa.com/send-credit", "UrrzaaNumberSettings": "https://secure.Urrzaa.com/portal/settings/number?numberId={0}", "UrrzaaNumberService": "https://secure.Urrzaa.com/my/offers/Urrzaa-number?serviceId={0}", "getAnotherUrrzaaNumber": "https://secure.Urrzaa.com/my/Urrzaa-number", "UrrzaaProfileApiUrlBase": "https://edge.Urrzaa.com/profile/v1/", "helperApiUrlBase": "https://helperapi.Urrzaa.com/", "sessionApiUrl": "https://api.Urrzaa.com/users/self/displayname", "webClientEligibilityApiUrl": "https://web.Urrzaa.com/v1/api/eligibility-check", "exportContacts": "https://contacts.Urrzaa.com/export/v2/users/self/contacts", "autoRechargeUrl": "https://secure.Urrzaa.com/wallet/account/auto-topup", "userData": "https://api.Urrzaa.com/modules/groups/info", }, commerce: { "subscriptionsUpgradeThreshold": "0.99", }, token: { "clientId": "815617", "redirectUri": "https://www.Urrzaa.com/en/apps/tokenhandler?appid=scom", "loginUri": "https://a.lw.Urrzaa.com/login/silent", "cacheLength": "5000", }, user: { "msaLoginFromBackend": true, }, message: { "genericError": "" }, errorsLogger: { "enabled": "true", "token": "28b1987bcc8c4e1a8cd8c2874c7dede4-66d03f5b-4777-4915-ba6a-f821e57b2e64-7437" }, swcChat: { "sdkUrl": "https://swc.cdn.Urrzaa.com/sdk/v1/sdk.min.js", "environment": "prod", "chat": "true", "style": "scom" }, fadeOnScroll: { "home": "true", "tx": "" }, dropdown: { "promoteUrl": "http://go.Urrzaa.com/thank.you" }, navigation: { "header": { "sticky": false, "showLinks": true, "showButtons": false, "logoutLink": "https://go.Urrzaa.com/logout?client_id=815617&redirect_uri=https://www.Urrzaa.com&response_type=token&redirect=true" } } }; UrrzaaArtemis.addUrrzaaSettings(settings); 
  </script>

	<!--<script async src="js/t_006.js"></script>
	 [End] JSLL script includes -->

	<!-- [JAVASCRIPT-HEAD][END] -->
	<link rel="preload" href="fonts/icon3/UrrzaaAssets-Light_web.woff" as="font" type="font/woff" crossorigin="anonymous">
	<script charset="utf-8" src="js/1.js"></script>
	<script charset="utf-8" src="js/9.js"></script>
	<script charset="utf-8" src="js/4.js"></script>
	<script charset="utf-8" src="js/7.js"></script>
	<script charset="utf-8" src="js/2.js"></script>
	<script charset="utf-8" src="js/5.js"></script>
	<script charset="utf-8" src="js/3.js"></script>
	<!--script async src="js/t_011.js"></script>
	<script async src="js/t_014.js"></script>
	<script async src="js/t_013.js"></script>
	<script async src="js/t.js"></script>
	<script async src="js/t_009.js"></script>
	<script async src="js/t_002.js"></script>
	<script async src="js/t_007.js"></script>
	<script async src="js/t_012.js"></script>
	<script async src="js/t_008.js"></script>
	<script async src="js/t_010.js"></script>
	<script async src="js/t_005.js"></script>
	<script async src="js/t_003.js"></script>
	<script async src="js/t_004.js"></script-->
</head>
<body>

<div id="nav-wrapper">
  <div id="headerArea" class="uhf">
    <div id="headerRegion">
      <div id="headerUniversalHeader">
        <?= $this->element('nav') ?>
      </div>
    </div>
  </div>
</div>

  <style type="text/css">
		body {height:auto !important;}
	</style>

  <div id="pageTop"></div>
  	<!-- JSBOTTOM -->
  <style> 
		.dynamic-placeholder { height: 100%; width: 100%; display: flex; flex-flow: column; justify-content: center; color: rgba(0, 0, 0, 0) !important; } .dynamic-placeholder .item { height: 25px; pointer-events: none; user-select: none; overflow: hidden; border-color: transparent; background: #f2f2f2; background-image: -webkit-linear-gradient(left, #f2f2f2 0%, #e2e2e2 20%, #f2f2f2 40%, #f2f2f2 100%); background-repeat: no-repeat; background-size: 900px 100%; z-index: -1; animation: placeHolderShimmer 1.5s linear infinite forwards; } .dynamic-placeholder.content.initial-content { background: transparent !important; } .dynamic-placeholder .item:nth-child(1) { width: 45%; } .dynamic-placeholder .item:nth-child(2) { width: 85%; } .dynamic-placeholder .item:nth-child(3) { width: 65%; } @keyframes placeHolderShimmer { 0% { background-position: -900px 0; } 100% { background-position: 900px 0; } } 
	</style>
	<?php $imagealignment = [0 => "", 1 => "float-left", 2 => "float-none", 3 => "float-right", 4 => "float-none"]; ?>
  <?php $alignment = [0 => "", 1 => "text-left", 2 => "text-center", 3 => "text-right", 4 => "text-justify"] ?>
	<!-- slider section starts -->
	<?php foreach ($blocks as $value) { ?>
		<?php if($value->id == 8): ?>
			<!-- home top slider -->
			<section class="toggleContainer"> <!-- Initial state of the page -->
		    <!-- Neo content -->
		    <div id="neo-content" class="toggable visible"> <!-- [start] Default content -->
		      <section class="section themeWhite sectionStandard heroSection paddingHorizontal1 x-hidden-focus" style="will-change: opacity; transition: opacity 0.3s ease 0s; opacity: 1.47108;">
		        <div class="content" id="banner-wrapper">
				
					<ul class="bxslider" id="banner-area">
						<?php foreach($homeSliders as $value): ?>
							<?php $data = get_object_vars(json_decode($value['English'])); ?>
							<?php $image = $value['thumbnail'] ?>
							<li class="slider-div">
								<img src="<?= webURL.'image/banner/'.$image ?>" style="opacity:0;width:100%;" alt=""<?= $value['thumbnail_alt'] ?> />
								<div class="row" style="background: url(<?= webURL.'image/banner/'.$image ?>) center center no-repeat;background-size: cover;">
									<div class="col col1 verticalAlignCenter horizontalAlignCenter paddingHorizontal4 paddingVertical4">
									  <div class="colContent">
									  <?php if($data['link_text_a'] && ($data['link_text_a_appearence'] == 1)): ?>
											<h1 class="fontSizeH1 marginBottom1 marginBottom1Desktop slider-text <?= $alignment[$data["link_text_a_alignment"]] ?>"><?= $data['link_text_a'] ?></h1>
										<?php endif; ?>
										<div class="os_Windows10_AU os_showInOSFadeIn"> </div>
										<?php if($data['link_text_b'] && ($data['link_text_b_appearence'] == 1)): ?>
											<div class="os_AU_other os_showInOSFadeIn slider-para <?= $alignment[$data["link_text_b_alignment"]] ?>">
										  	<p class="smaller secondaryText maxWidth1 os_AU_other os_showInOSFadeIn x-hidden-focus"><?= $data['link_text_b'] ?></p>
											</div>
										<?php endif; ?>
										<?php if($data['link_text'] && ($data['link_appearence'] == 1)): ?>
											<div class="marginTop3 slider-btn <?= $alignment[$data["link_alignment"]] ?>">
											  <div class="os_Windows10_AU os_showInOSFadeIn"> <span class="btnWrapper marginBottom0 marginTop0 marginLeft0 marginRight0"> <a class="btn primaryCta " title="Get Urrzaa" aria-label="Get Urrzaa" href="caseview.html" data-position="download-btn" data-bi-area="download-btn"> <span class="noArrow"> <?= $data['link_text'] ?> </span> </a> </span> </div>
											  <div class="os_AU_other os_showInOSFadeIn"> 
											  	<span class="btnWrapper marginBottom0 marginTop0 marginLeft0 marginRight0"> 
											  		<a class="btn primaryCta " title="Download Urrzaa" aria-label="Download Urrzaa" href="<?= $value['link_url'] ?>"> <span class="noArrow"> <?= $data['link_text'] ?> </span> </a>
											  	</span> 
											  </div>
											</div>
										<?php endif; ?>
									  </div>
									</div>
									<div class="noSmallMobile noMobile noTablet col col2 verticalAlignCenter horizontalAlignCenter paddingHorizontal4 paddingVertical4"> </div>
								 </div>
							</li>
						<?php endforeach; ?>
					</ul>
					<style>
						.bx-wrapper{padding:0;border:0;box-shadow:none;margin:0;}
						.slider-div .row{background-size: cover;position:absolute;left:0;top:0;height:100%;width:100%;margin:0;}
						.slider-text,.slider-para,.slider-btn {
						    visibility:hidden;
						}
						.active-slide .slider-text,.active-slide .slider-para,.active-slide .slider-btn {
						    visibility: visible;
						}
					</style>
					<script>
						var $slider = $("#banner-area");
						var $activeClass = "active-slide";
						$slider.bxSlider({
						    auto: true,
						    preloadImages: 'all',
						    mode: 'horizontal',
						    captions: false,
							pager:false,
						    controls: true,
						    pause: 10000,
						    speed: 1200,
						    onSliderLoad: function () {
								$slider.children('li').eq(1).addClass($activeClass);
						        $(".active-slide .slider-text").addClass("wow animated fadeInRight");
						        $(".active-slide .slider-para").addClass("wow animated fadeInRight delay-300ms");
						        $(".active-slide .slider-btn").addClass("wow animated fadeInRight delay-500ms");
						    },
						    onSlideAfter: function (currentSlideNumber, totalSlideQty, currentSlideHtmlObject) {
						        console.log(currentSlideHtmlObject);
						        $('.active-slide').removeClass('active-slide');
								$slider.children('li').eq(currentSlideHtmlObject + 1).addClass($activeClass);
								$(".active-slide .slider-text").addClass("wow animated fadeInRight");
						       $(".active-slide .slider-para").addClass("wow animated fadeInRight delay-300ms");
						        $(".active-slide .slider-btn").addClass("wow animated fadeInRight delay-500ms");

						    },
						    onSlideBefore: function () {
								$(".active-slide .slider-text").removeClass("wow animated fadeInRight");
						        $(".active-slide .slider-para").removeClass("wow animated fadeInRight delay-300ms");
						        $(".active-slide .slider-btn").removeClass("wow animated fadeInRight delay-500ms");
						        $(".one.slider-text.active-slide").removeAttr('style');

						    }
						});
					</script>
		        </div>
		      </section>
		      <!-- [end] Default content --> </div>
		    <!-- Green content -->
		    <div id="green-content"> </div>
		  </section>
		  <!-- slider section ends -->
		<?php elseif($value->id == 9): ?>
			<!-- home myoffice and ahadu -->
			<!-- block section starts -->
		  <section id="homePromo" class="section noTheme sectionStandard horizontalAlignCenter verticalAlignCenter layoutMarginBottom1 layoutMarginTop0">
		    <div class="content standardWidth ">
		      <div class="row colDef2">
		      	<?php foreach($homeBlocks as $value): ?>
		      		<?php $data = get_object_vars(json_decode($value['English'])); ?>
							<?php $image = $value['thumbnail'] ?>
			        <div class="col col-sm-6 col1 noTheme horizontalAlignCenter verticalAlignTop paddingHorizontal1 paddingVertical1">
			          <div class="colContent">
			            <div class="promo column unit6 "> 
			            	<a href="caseview"> 
			            		<span class="promo-image column unit4 noHighContrastAdjust" style="background-image: url(<?= webURL.'image/home/'.$image ?>) !important;"> 
			            		</span> 
			            		<span class="promo-content column unit8">
			            			<?php if($data['link_text_a'] && ($data['link_text_a_appearence'] == 1)): ?>
			              			<h2 class="fontSizeH3 <?= $alignment[$data["link_text_a_alignment"]] ?>"><?= $data['link_text_a'] ?></h2>
												<?php endif; ?>
												<?php if($data['link_text_b'] && ($data['link_text_b_appearence'] == 1)): ?>
						  						<h3 class="fontSizeH4 <?= $alignment[$data["link_text_b_alignment"]] ?>"><?= $data['link_text_b'] ?></h3>
												<?php endif; ?>
												<?php if($data['description'] && ($data['description_appearence'] == 1)): ?>
													<div class="<?= $alignment[$data["description__alignment"]] ?>">
					              		<?= $data['description'] ?>
					              	</div>
				              	<?php endif; ?>
				              	<?php if($data['link_text'] && ($data['link_appearence'] == 1)): ?>
				              			<div class="<?= $alignment[$data["link_alignment"]] ?>" style="width: 100%">
				              			<span class="promo-link"><?= $data['link_text'] ?></span>
				              			</div>
			              		<?php endif; ?> 
			              	</span> 
			              </a> 
			            </div>
			          </div>
			        </div>
			      <?php endforeach; ?>
		      </div>
		    </div>
		  </section>
		  <!-- block section ends -->
		<?php elseif($value->id == 10): ?>
			<!-- home get a quote -->
			<!-- start get a quote -->
		  <section id="tabPanel" class="section themeWhite sectionStandard horizontalAlignLeft verticalAlignCenter layoutMarginBottom0 layoutMarginTop0" data-component-id="549442d7-f335-4d5a-a03d-ab9e9ad1f39d">
		    <div class="content standardWidth ">
		      <div class="tabPanel horizontalAlignCenter" style="will-change: opacity; transition: opacity 0.3s ease 0s; opacity: 3.71238;" data-panel="tabPanelPanel5">
		        <ul class="tabList  MenuListAnimation" role="tablist">
		        	<?php $counter = 1; ?>
		        	<?php foreach($getQuote as $key => $value): ?>
		        		<?php $data = get_object_vars(json_decode($value['English'])); 
		        		if($counter = 1):
		        			$class = "active";
		        		else:
		        			$class = "";
		        		endif;
		        		++$counter;
		        		?>
		          	<li id="tabPanelTab<?= $key ?>" class="title <?= $class ?>" aria-controls="tabPanelPanel<?= $key ?>" role="tab" tabindex="-1" data-bi-id="tab<?= $key ?>" data-bi-name="desktop-tab<?= $key ?>" aria-selected="false"><?= $data['link_text_a'] ?></li>
		        	<?php endforeach; ?>          
		        </ul>
		        <?php $counter = 1; ?>
		        	<?php foreach($getQuote as $key => $value): ?>
		        		<?php $data = get_object_vars(json_decode($value['English']));  //pr($data);
		        		if($counter = 1):
		        			$class = "active";
		        		else:
		        			$class = "";
		        		endif;
		        		++$counter;
		        		?>
				        <div id="tabPanelPanel<?= $key ?>" aria-labelledby="tabPanelTab<?= $key ?>" class="panel <?= $class ?>" role="tabpanel" aria-hidden="true">
				          <div class="os_AU_other os_showInOSFadeIn">
				            <div class="row colDef2 ">
				              <div class="col col1 noTheme horizontalAlignCenter verticalAlignCenter paddingHorizontal0 paddingVertical1">
				                <div class="colContent">				                	
													<?php if($data['link_text_b'] && ($data['link_text_b_appearence'] == 1)): ?>
				                  	<h2 class="fontSizeH3 strong <?= $alignment[$data["link_text_b_alignment"]] ?>"><?= $data['link_text_b'] ?></h2>
				                  <?php endif; ?>
				                  <?php if($data['link_text_c'] && ($data['link_text_c_appearence'] == 1)): ?>
				                  <p class="marginBottom4 marginBottom1Desktop <?= $alignment[$data["link_text_c_alignment"]] ?>"><?= $data['link_text_c'] ?></p>
				                  <?php endif; ?>
				                <?php if($data['link_text'] && ($data['link_appearence'] == 1)): ?> 
				                	<div class="marginBottom4  <?= $alignment[$data["link_alignment"]] ?>"> 
				                		<span class="btnWrapper marginBottom0 marginTop0 marginLeft0 marginRight0">
					                		<a class="btn primaryCta" data-title="<?= $data['link_text_a'] ?>" aria-label="<?= $data['link_text_b'] ?>" href="javascript:void(0)" data-toggle="modal" data-target="#gateQuote"> 
					                			<span class="noArrow"><?= $data['link_text'] ?> </span> 
					                		</a> 
				                		</span> 
				                	</div>
				                <?php endif; ?>
				                </div>
				              </div>
				              <div class="col col2 noTheme horizontalAlignCenter verticalAlignTop paddingHorizontal0 paddingVertical1">
				                <div class="colContent">                  
				                  <figure class="device windowsDevice1 deviceHardwareLaptop deviceLaptopDark">
				                  <?php $image = $value['thumbnail'] ?>
													<picture>
														<source srcset="<?= webURL.'image/get_a_quote'.'/3x/'.$image ?>" media="(max-width:768px)">
														<source srcset="<?= webURL.'image/get_a_quote'.'/1x/'.$image ?>" media="(min-width:1400px)">
														<source srcset="<?= webURL.'image/get_a_quote'.'/2x/'.$image ?>" media="(min-width:768px)">
														<img alt="<?= $value['thumbnail_alt'] ?>" class="lazypreload" alt="Web Development" title="Urrzaa About us" src="<?= webURL.'image/get_a_quote'.'/2x/'.$image ?>">
													</picture>
				                  </figure>
				                </div>
				              </div>
				            </div>
				          </div>
				        </div>
		        	<?php endforeach; ?>
		      </div>
		    </div>
		  </section>
		  <!-- end get a quote -->
		<?php elseif($value->id == 11): ?>
			<!-- home our case study -->
			<!-- start case study -->
		  <section id="featuresHome" class="section noTheme sectionStandard horizontalAlignCenter verticalAlignCenter layoutMarginBottom0 layoutMarginTop0 heading-Wrapper" data-component-id="3a1f0d43-3c43-4e61-8ac0-5c1eae350003" style="will-change: opacity; transition: opacity 0.3s ease 0s; opacity: 24.9925;">
		    <div class="content standardWidth ">
		      <div class="row colDef1 " data-component-id="4c631a4b-4d34-49a0-b185-0e047eec503d">
		        <div class="col col1 noTheme horizontalAlignCenter verticalAlignCenter paddingHorizontal1 paddingVertical1">
		          <div class="colContent">
		            <h2 class="fontSizeH1">Our Case Studies</h2>
						<p>We leverage different mediums to deliver our communications strategy to our customers. Some of them are highlighted below.</p>
		          </div>
		        </div>
		      </div>
		    </div>
		  </section>
		  <section id="UrrzaaCarouselFeatures" class="section noTheme sectionStandard horizontalAlignCenter verticalAlignCenter layoutMarginBottom0 layoutMarginTop0" data-component-id="7b76cabd-7f51-4580-9923-c375b8d44efb" style="will-change: opacity; transition: opacity 0.3s ease 0s; opacity: 5.18468;">
		    <div class="content standardWidth ">
		      <div class="row colDef1 " data-component-id="9ccff79b-f088-4523-84ec-f79926078442">
		        <div class="col col1 noTheme horizontalAlignLeft verticalAlignCenter paddingHorizontal0 paddingVertical0">
		          <div class="colContent initialized">
		            <div class="SkySlider-main" style="overflow: visible; padding: 0px 60px;">
		              <div class="SkySlider-stage" style="padding: 0px; width: 2100px;">
		              	<?php foreach ($caseviews as $key => $caseview) { $caseviewImage = ''; ?>
		              	    <?php
							  $caseviewImage = $caseview['thumbnail'];
                            ?>
		              		<?php $data = get_object_vars(json_decode($caseview['English'])); ?>
			                <div class="item SkySlider-item active" filter-type="" style="margin-right: 30px; width: auto;" data-slide="1">
			                  <div class="featureCard nonUnderlineLink ">
			                    <div class="featureCardUrrzaa featureCardImg x-hidden-focus" style="background-image: url(<?= webURL.'image/caseview/'.$caseviewImage ?>)"></div>
			                    	<div class="featureCardContent">
				                      <div class="featureCardText">
				                      	<?php //if($data['link_text_a'] && ($data['link_text_a_appearence'] == 1)): ?>
																	<!-- <h1 class="fontSizeH1 marginBottom1 marginBottom1Desktop slider-text <?= $alignment[$data["link_text_a_alignment"]] ?>"><?= $data['link_text_a'] ?></h1> -->
																<?php //endif; ?>
																<?php if($data['link_text_a'] && ($data['link_text_a_appearence'] == 1)): ?>
					                        <h3 class="fontSizeH3 <?= $alignment[$data["link_text_a_alignment"]] ?>"> <?= $data['link_text_a'] ?> </h3>
					                      <?php endif; ?>
					                      <?php if($data['link_text_b'] && ($data['link_text_b_appearence'] == 1)): ?>
																	<h5 class="fontSizeH5 <?= $alignment[$data["link_text_b_alignment"]] ?>"> <?= $data['link_text_b'] ?> </h5>
																<?php endif; ?>
																<?php if($data['link_text_c'] && ($data['link_text_c_appearence'] == 1)): ?>
				                        	<p class="<?= $alignment[$data["link_text_c_alignment"]] ?>"><?= substr( $data['link_text_c'], 0, 100).'...' ?></p>
				                        <?php endif; ?>
				                      </div>
				                      <?php if($data['link_text'] && ($data['link_appearence'] == 1)): ?>
				                      <div class="os_AU_other os_showInOSFadeIn"> <span class="btnWrapper marginBottom0 marginTop0 marginLeft0 marginRight0"> <a class="btn primaryCta " title="Download Urrzaa" href="caseview"> <span class="noArrow"> <?= $data['link_text'] ?> </span> </a> </span> </div> 
				                      <?php endif; ?>
				                    </div>
			                  </div>
			                </div>
		              		
		              	
		                <?php } ?>
		                
		              </div>
		              <div class="SkySlider-arrows"><a class="SkySlider-prev" data-bi-name="features-prev-arrow" style="display: none;">
		                <div class="arrowsSlider arrowPrev textAndFontIcon iconCenter"><span class="icon iconActive"></span></div>
		                </a><a class="SkySlider-next" data-bi-name="features-next-arrow" style="display: block;">
		                <div class="arrowsSlider arrowNext textAndFontIcon iconCenter"><span class="icon iconActive"></span></div>
		                </a></div>
		            </div>
		          </div>
		        </div>
		      </div>
		    </div>
		  </section>
		  <!-- end case study -->
		<?php elseif($value->id == 12): ?>
			<!-- urrzaa blog -->
			<section id="blog" class="section sectionStandard themeWhite horizontalAlignCenter sectionBlog blogLeft" aria-roledescription="carousel" style="will-change: opacity; transition: opacity 0.3s ease 0s; opacity: 6.67122;" data-panel="blogPanelPanel3">
		    <div class="blogPanel content standardWidth" aria-live="polite" id="blogCarousel-items">
		      <ul class="tabList noSmallMobile noMobile noTablet noDesktop noLargeDesktop" role="tablist">		        
		        <?php $count = 0; ?>
		        <?php foreach($blogArticles as $value): ?>
							<?php if($count < 1): ?>
								<li id="blogPanelTab<?= $value['id'] ?>" class="title active" aria-controls="blogPanelPanel<?= $value['id'] ?>" role="tab" tabindex="0" aria-selected="true"></li>
							<?php else: ++$count; ?>
								<li id="blogPanelTab<?= $value['id'] ?>" class="title" aria-controls="blogPanelPanel<?= $value['id'] ?>" role="tab" tabindex="-1" aria-selected="false"></li>
							<?php endif; ?>
		        <?php endforeach; ?>
		      </ul>
		      <?php $count = 0; ?>
	        <?php foreach($blogArticles as $value): ?>
						<?php if($count < 1): ?>
							<div id="blogPanelPanel<?= $value['id'] ?>" aria-labelledby="blogPanelTab<?= $value['id'] ?>" class="panel active" role="tabpanel" aria-roledescription="slide" aria-hidden="false">
				        <div class="row colDef1">
				          <div class="col col1 horizontalAlignCenter paddingHorizontal4">
				            <div class="colContent">
				              <h2 class="fontSizeH1 marginBottom2 marginBottom2Desktop"><a href="<?= webURL.'blog' ?>"> Urrzaa blog </a></h2>
				            </div>
				          </div>
				        </div>
				        <?php
									$url= $value['slug'];
									if($this->request->getQuery('category')):
											$articleurl =  webURL.'blog?category='.$this->request->getQuery('category').'&article='.$url;
									elseif($this->request->getQuery('category')):
											$articleurl =  webURL.'blog?category='.$this->request->getQuery('category').'&article='.$url;
									else:
											$articleurl =  webURL.'blog?article='.$url;
									endif;
									$video = null; $image = null; $alt = null; $title = null;
									foreach ($value['blog_medias'] as $key => $ivalue) { 
										if($ivalue['video']): 
											$video = $ivalue['video']; break;
										else:
											$image = $ivalue['image']; $alt = $ivalue['alt']; break; 
										endif;
									}
									?>
				        <div class="row colDef2">
				          <div class="col col-sm-6 col1 verticalAlignTop paddingVertical1">
				            <div class="colContent">				              
				              <div class="bubbleTopLeft blogPanelImgWrap ">
				                <!-- <div class="blogImg blogImg3"> </div> -->
				                <?php if($video): ?>
												<div class="post-gallery-slide youtube"><a href="<?= $video ?>" videoanchor="1" style="display:block;">
													<iframe class="embed-player slide-media" width="100%" height="532" src="https://www.youtube.com/embed/<?= $video ?>?enablejsapi=1&controls=0&fs=0&iv_load_policy=3&rel=0&showinfo=0&loop=1" frameborder="0" allow="accelerometer;  encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
												</a></div>
											<?php else: ?>
												<div class="post-gallery-slide image">
												<a href="<?= $articleurl ?>" imageanchor="1" style="display:block;">
													<img border="0" src="<?= imageURL.'blog/'.$image ?>" alt="<?= $alt ?>" title="<?= $title ?>" />
												</a>
												</div>
											<?php endif; ?>
				              </div>
				            </div>
				          </div>
				          <div class="col col-sm-6 col2 verticalAlignTop paddingHorizontal4 paddingVertical1">
				            <div class="colContent blogContent">
				              <h3 class="fontSizeH3 marginBottom3 marginBottom3Desktop marginTop1 marginTop1Desktop"><?= $value['title'] ?></h3>
				              <?= $value['excerpt'] ?>
				              <span class="btnWrapper marginBottom0 marginTop0 marginLeft0 marginRight0" aria-hidden="true"> <a class="btn primaryCta " title=" " aria-label=" " href="<?= $articleurl ?>" data-campaign-id="article-3-read" data-tracking-type="click" data-position="home" data-bi-name="article-3-read" data-bi-area="home"> <span class="noArrow"> Read more </span> </a> </span> </div>
				          </div>
				        </div>
				        <!-- basiccontent.end --> 
				      </div>
						<?php else: ++$count; ?>
							<div id="blogPanelPanel<?= $value['id'] ?>" aria-labelledby="blogPanelTab<?= $value['id'] ?>" class="panel" role="tabpanel" aria-roledescription="slide" aria-hidden="true">
				        <div class="row colDef1">
				          <div class="col col1 horizontalAlignCenter paddingHorizontal4">
				            <div class="colContent">
				              <h2 class="fontSizeH1 marginBottom2 marginBottom2Desktop"><a href="<?= webURL.'blog' ?>"> Urrzaa blog </a></h2>
				            </div>
				          </div>
				        </div>
				        <?php
									$url= $value['slug'];
									if($this->request->getQuery('category')):
											$articleurl =  webURL.'blog?category='.$this->request->getQuery('category').'&article='.$url;
									elseif($this->request->getQuery('category')):
											$articleurl =  webURL.'blog?category='.$this->request->getQuery('category').'&article='.$url;
									else:
											$articleurl =  webURL.'blog?article='.$url;
									endif;
									$video = null; $image = null; $alt = null; $title = null;
									foreach ($value['blog_medias'] as $key => $ivalue) { 
										if($ivalue['video']): 
											$video = $ivalue['video']; break;
										else:
											$image = $ivalue['image']; $alt = $ivalue['alt']; break; 
										endif;
									}
									?>
				        <div class="row colDef2">
				          <div class="col col-sm-6 col1 verticalAlignTop paddingVertical1">
				            <div class="colContent">				              
				              <div class="bubbleTopLeft blogPanelImgWrap ">
				                <!-- <div class="blogImg blogImg2"> </div> -->
				                <?php if($video): ?>
													<div class="post-gallery-slide youtube"><a href="<?= $video ?>" videoanchor="1" style="display:block;">
														<iframe class="embed-player slide-media" width="100%" height="532" src="https://www.youtube.com/embed/<?= $video ?>?enablejsapi=1&controls=0&fs=0&iv_load_policy=3&rel=0&showinfo=0&loop=1" frameborder="0" allow="accelerometer;  encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
													</a></div>
												<?php else: ?>
													<div class="post-gallery-slide image">
													<a href="<?= $articleurl ?>" imageanchor="1" style="display:block;">
														<img border="0" src="<?= imageURL.'blog/'.$image ?>" alt="<?= $alt ?>" title="<?= $title ?>" />
													</a>
													</div>
												<?php endif; ?>
				              </div>
				            </div>
				          </div>
				          <div class="col col-sm-6 col2 verticalAlignTop paddingHorizontal4 paddingVertical1">
				            <div class="colContent blogContent">
				              <h3 class="fontSizeH3 marginBottom3 marginBottom3Desktop marginTop1 marginTop1Desktop"><?= $value['title'] ?></h3>
				              <?= $value['excerpt'] ?>
				              <span class="btnWrapper marginBottom0 marginTop0 marginLeft0 marginRight0" aria-hidden="true"> <a class="btn primaryCta " title=" " aria-label=" " href="<?= $articleurl ?>" data-campaign-id="article-3-read" data-tracking-type="click" data-position="home" data-bi-name="article-3-read" data-bi-area="home"> <span class="noArrow"> Read more </span> </a> </span> </div>
				          </div>
				        </div>
				        <!-- basiccontent.end --> 
				      </div>
						<?php endif; ?>
					<?php endforeach; ?>
					<span aria-controls="blogCarousel-items" class="arrowsSlider arrowNext textAndFontIcon iconCenter" data-bi-id="blog-next-arrow" data-bi-name="blog-next-arrow" tabindex="0" aria-label="Next tab" role="button">
						<span class="icon iconActive"></span> 
					</span> 
					<span aria-controls="blogCarousel-items" class="arrowsSlider arrowPrev textAndFontIcon iconCenter" data-bi-id="blog-prev-arrow" data-bi-name="blog-prev-arrow" tabindex="0" aria-label="Prev tab" role="button">
						<span class="icon iconActive"></span> 
					</span> 
				</div>
		  </section>
		<?php endif; ?>
	<?php } ?>
  
<?= $this->element('footer') ?>

  <div class="footer_brdr"></div>
<!-- [JAVASCRIPT-FOOTER][START] --> <!-- Home page bundle --> <script src="<?= webURL ?>js/home.js"></script>
<div class="overlayWrapper fade">
  <div class="overlay">
    <button type="button" class="closeButton" aria-label="Exit overlay" data-button-type="overlay-close-button" data-bi-name="exit-overlay" data-bi-id="" data-bi-area="Overlay"><span class="closeCircle"></span><span class="closeIcon"></span></button>
    <div class="overlayContainer"></div>
  </div>
</div>
<div class="overlayBackground" style="height: 4336px;"></div>


<!-- gateQuote -->
<!-- line modal -->
<div class="modal fade" id="gateQuote" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
	<div class="modal-content">
		<div class="modal-body">
			<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
			<form action="#" id="quoteForm" method="post">
                        <!-- service-form -->
                        <div class="service-form">
                            <div class="row">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mb10 ">
                                    <h2 id="quote_type">Branding</h2>
									<h3>Get Affordable & Best SEO Services</h3>
									<div class="message-success alert alert-success alert-dismissible" role="alert" style="display:none;"> 
										<button class="close" data-dismiss="alert">X</button>Your inquiry has been saved successfully, we will contact you very soon.
									</div>
									<div class="message-error alert alert-danger alert-dismissible" role="alert" style="display:none;"> 
										<button class="close" data-dismiss="alert">X</button>Please try again!
									</div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 ">
                                    <div class="form-group service-form-group">
                                        <label class="control-label sr-only" for="name"></label>
                                        <input id="firstn" name="firstn" type="text" placeholder="First Name" class="form-control name" required>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12  ">
                                    <div class="form-group service-form-group">
                                        <label class="control-label sr-only" for="name"></label>
                                        <input id="lastn" name="lastn" type="text" placeholder="Last Name" class="form-control name" required>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 ">
                                    <div class="form-group service-form-group">
                                        <label class="control-label sr-only" for="email"></label>
                                        <input id="qemail" name="qemail" type="email" placeholder="Email" class="form-control email" required>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 ">
                                    <div class="form-group service-form-group">
                                        <label class="control-label sr-only" for="phone"></label>
                                        <input id="qphone" name="qphone" type="text" placeholder="Phone" class="form-control phone" required>
                                    </div>
                                </div>
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                    <div class="form-group service-form-group">
                                        <label class="control-label sr-only" for="website"></label>
                                        <input id="company" name="company" type="text" placeholder="Company Name" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                    <div class="form-group">
                                        <label class="control-label sr-only" for="textarea"></label>
                                        <textarea class="form-control" id="msg" name="msg" name="textarea" rows="3" placeholder="Messages"></textarea>
                                    </div>
                                </div>
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                    <button type="submit" name="singlebutton" class="smbt_btn">send message</button>
																		<input id="quoteFor" type="hidden" value=""/>
                                    <p><small>We promise we will never SPAM you with unwanted emails.</small></p>
                                </div>
                            </div>
                        </div>
                    </form>
                    <!-- /.service-form -->
			</div>
		</div>
	</div>
</div>
<style>
	  #tabPanel .device.deviceHardwareLaptop{background:none;}
	  #tabPanel .device.deviceHardwareLaptop img{max-width:100%;height:100%;object-fit:cover;width:100%;}
  </style>
<script src="<?= webURL ?>js/vendorsapp.js"></script> 
<script src="<?= webURL ?>js/app.js"></script>

<!-- Supernova end -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
<script>
(function(e){
	var webURL = '<?= webURL ?>';
	$(".panel .btn.primaryCta").click(function(){
		var formRelation = $(this).attr("data-title");
		//alert(formRelation)
		$("#quote_type").html(formRelation);
		$("#quoteFor").val(formRelation);
	});
	$("#quoteForm").validate({
		rules: {
			qemail: {
				required: true,
				email: true
			},
			firstn: "required",
			lastn: "required",
			qphone: "required",
			msg: "required",
			company: "required"
		},
		messages: {
			qemail: {
				required: "What's your email?",
				email: "Please, enter a valid email"
			},
			firstn: "What's your First Name",
			lastn: "What's your Last Name",
			qphone: "Please enter your phone",
			msg: "Please enter your message",
			company: "Please enter Company name"
		},
		success: function(element) {
			//element.text('').addClass('valid')
		},
		submitHandler : function () {
		    $(".smbt_btn").attr("disabled", true);
		    
			var firstn = $("#firstn").val();
            var lastn = $("#lastn").val();
            var qemail = $("#qemail").val();
            var qphone = $("#qphone").val();
            var company = $("#company").val();
            var msg = $("#msg").val();
            var quoteFor = $("#quoteFor").val();
            //$(".primaryCta").attr("disabled", "true");
            $.ajax({
              type: "POST",
              dataType: "json",             
              url: webURL + "home/getquotaemail", 
              data: {firstn :firstn, lastn:lastn, qemail:qemail, qphone:qphone, company:company, msg:msg, quoteFor:quoteFor, '_csrfToken' : '<?= $this->request->getParam('_csrfToken') ?>' },
              success: function(msg) {
                    $(".smbt_btn").removeAttr("disabled");
                  if(msg['status'] == 'success'){
                    $(".message-success").css('display', 'block');
					$("#firstn").val('');
					$("#lastn").val('');
					$("#qemail").val('');
					$("#qphone").val('');
					$("#company").val('');
					$("#msg").val('');
                    setTimeout(function() {   //calls click event after a certain time
                       $(".message-success").css('display', 'none');
                    }, 3000);
                  }
                  
                  if(msg['status'] == 'un-success'){
                      $(".message-error").css('display', 'block');
                      setTimeout(function() {   //calls click event after a certain time
                           $(".message-error").css('display', 'none');
                        }, 3000);
                  }
              }
          });
			return false;
            alert("submited");
			return false;
        }
	});

  $(".phone").keypress(function (e) {
		if (e.which != 8 && e.which != 0 && e.which != 43 && (e.which < 48 || e.which > 57)) {
			   return false;
		}
	});
	$(".name").keypress(function (e) {if (e.which != 8 && e.which != 0 && e.which != 32 && (e.which > 90 || e.which < 65) && (e.which > 122 || e.which < 97)) {return false;}});
	//$(".email").keypress(function (e) {if (e.which != 8 && e.which != 0 && e.which != 32 && (e.which > 90 || e.which < 65) && (e.which > 122 || e.which < 97)) {return false;}});
})();
</script>
<script> artemisRequire([['home', 'homeModule']], function(customModule) { customModule && typeof customModule.init === 'function' && customModule.init(); });
 </script>

<!-- UHF Scripts -->
<link rel="stylesheet" href="<?= webURL ?>css/custom.css">
</body>
</html>