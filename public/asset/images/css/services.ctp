<!DOCTYPE html>
<html class="en ltr os_Windows10 passiveeventlisteners csstransforms supports csstransforms3d backgroundsize borderradius cssanimations csstransitions canvas audio video svg smil os_Windows10_AU_Undetected uhfHeader-v2 js" data-language="en" data-pagename="home" data-pagetype="home" data-pagepath="/" data-region="in" dir="ltr" lang="en">
<!-- AzureInstance: CMSApp_IN_1 -->
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
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
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
<!-- [end] Lazyload -->
<!-- [Begin] JSLL script includes 
<script src="js/jsll-4.js" type="text/javascript"></script>
<script> var pageName = "static/new"; var config = { isLoggedIn: (sessionStorage.profile !== undefined), shareAuthStatus: true, authMethod: 1, autoCapture: { pageView: true, onLoad: true, onUnload: true, scroll: true, resize: true, lineage: true, click: true }, coreData: { appId: "scom", env: "prod", pageName: pageName } }; awa.init(config); </script>-->

<!-- NOTICE: Third party scripts or code, linked to, called or referenced from this web site, online service or product, are licensed to you by the third parties that own such code, not by Microsoft. --> <script> var settings = { api: { "standByFor": "5000", "contracts": "https://api.Urrzaa.com/wallet/contracts/atu", "UrrzaaNumber": "https://api.Urrzaa.com/Urrzaa-number/users/self/services?statusList=active,reserved&expand=1", "UrrzaaNumberByServiceId": "https://api.Urrzaa.com/users/self/services/Urrzaain/", "callerId": "https://api.Urrzaa.com/users/self/services/cli/settings?expand=smsCapable", "services": "https://consumer.entitlement.Urrzaa.com​​/users/{0}/services?language=en", "contentApiUrl": "https://contentapi.Urrzaa.com/api/v2-0/regions/", "buyCredit": "https://secure.Urrzaa.com/{0}/credit?currency={1}", "sendCredit": "https://secure.Urrzaa.com/send-credit", "UrrzaaNumberSettings": "https://secure.Urrzaa.com/portal/settings/number?numberId={0}", "UrrzaaNumberService": "https://secure.Urrzaa.com/my/offers/Urrzaa-number?serviceId={0}", "getAnotherUrrzaaNumber": "https://secure.Urrzaa.com/my/Urrzaa-number", "UrrzaaProfileApiUrlBase": "https://edge.Urrzaa.com/profile/v1/", "helperApiUrlBase": "https://helperapi.Urrzaa.com/", "sessionApiUrl": "https://api.Urrzaa.com/users/self/displayname", "webClientEligibilityApiUrl": "https://web.Urrzaa.com/v1/api/eligibility-check", "exportContacts": "https://contacts.Urrzaa.com/export/v2/users/self/contacts", "autoRechargeUrl": "https://secure.Urrzaa.com/wallet/account/auto-topup", "userData": "https://api.Urrzaa.com/modules/groups/info", }, commerce: { "subscriptionsUpgradeThreshold": "0.99", }, token: { "clientId": "815617", "redirectUri": "https://www.Urrzaa.com/en/apps/tokenhandler?appid=scom", "loginUri": "https://a.lw.Urrzaa.com/login/silent", "cacheLength": "5000", }, user: { "msaLoginFromBackend": true, }, message: { "genericError": "" }, errorsLogger: { "enabled": "true", "token": "28b1987bcc8c4e1a8cd8c2874c7dede4-66d03f5b-4777-4915-ba6a-f821e57b2e64-7437" }, swcChat: { "sdkUrl": "https://swc.cdn.Urrzaa.com/sdk/v1/sdk.min.js", "environment": "prod", "chat": "true", "style": "scom" }, fadeOnScroll: { "home": "true", "tx": "" }, dropdown: { "promoteUrl": "http://go.Urrzaa.com/thank.you" }, navigation: { "header": { "sticky": false, "showLinks": true, "showButtons": false, "logoutLink": "https://go.Urrzaa.com/logout?client_id=815617&redirect_uri=https://www.Urrzaa.com&response_type=token&redirect=true" } } }; UrrzaaArtemis.addUrrzaaSettings(settings); </script>

<!--<script async src="js/t_006.js"></script>
 [End] JSLL script includes -->

<!-- [JAVASCRIPT-HEAD][END] -->
<link rel="preload" href="fonts/icon3/UrrzaaAssets-Light_web.woff" as="font" type="font/woff" crossorigin="anonymous">
<script charset="utf-8" src="<?= webURL ?>js/1.js"></script>
<script charset="utf-8" src="<?= webURL ?>js/9.js"></script>
<script charset="utf-8" src="<?= webURL ?>js/4.js"></script>
<script charset="utf-8" src="<?= webURL ?>js/7.js"></script>
<script charset="utf-8" src="<?= webURL ?>js/2.js"></script>
<script charset="utf-8" src="<?= webURL ?>js/5.js"></script>
<script charset="utf-8" src="<?= webURL ?>js/3.js"></script>
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
  <?php foreach ($blocks as $key => $block) { ?>
      <?php if($block->name == 'services top banner'): ?>
        <div id="primaryR1" class="pad-hero" data-grid="container" data-region-key="primaryr1">
          <div id="coreui-hero-7enwkdp">              
            <div class="m-hero ">
              <div>
                <section role="presentation" class="m-hero-item f-medium f-x-left f-y-center context-game theme-dark f-mask-left f-short">
                  <?php $image = $banner['thumbnail'];  ?>
                  <picture>
                    <source srcset="<?= webURL.'image/services/banner/500/'.$image ?>" media="(max-width:539px)">
                    <source srcset="<?= webURL.'image/services/banner/700/'.$image ?>" media="(min-width:540px) and (max-width:767px)">
                    <source srcset="<?= webURL.'image/services/banner/1000/'.$image ?>" media="(min-width:768px) and (max-width:1083px)">
                    <source srcset="<?= webURL.'image/services/banner/1200/'.$image ?>" media="(min-width:1084px) and (max-width:1399px)">
                    <source srcset="<?= webURL.'image/services/banner/1600/'.$image ?>">
                    <img class="lazypreload" alt="An illuminated tent sits under the milky way." title="Urrzaa Services" src="<?= webURL.'image/services/banner/500/'.$image ?>">
                  </picture>
                  <div>
                    <div>
                      <?php $data = get_object_vars(json_decode($banner['English'])); ?>
                      <?php if($data['link_text_a'] && ($data['link_text_a_appearence'] == 1)): ?>
                        <h1 class="c-heading <?= $alignment[$data["link_text_a_alignment"]] ?>"><?= $data['link_text_a'] ?></h1>
                      <?php endif; ?>
                      <div class="c-paragraph">
						  <?php if($data['link_text_b'] && ($data['link_text_b_appearence'] == 1)): ?>
							<div class="<?= $alignment[$data["link_text_b_alignment"]] ?>"><?= $data['link_text_b'] ?></div>
						  <?php endif; ?>
						</div>
                    </div>
                  </div>            
                </section>
              </div>
            </div>
          </div>
        </div>
      <?php elseif($block->name == 'services our services'): ?>
        <section id="about" class="section services-area sectionStandard horizontalAlignCenter layoutMarginBottom1 layoutMarginTop1 pt-5 mt-5">
          <div class="content standardWidth">
            <div class="text-vertical-center-wrapper">
              <h1 class="fontSizeH1">Our Services</h1>
            </div>
            <div class="row">
              <?php foreach ($services as $key => $service) { ?>
                <?php $data = get_object_vars(json_decode($service['English'])); ?>
                <?php $image = $service['medias'][0]['image'];  ?>
                <div class="col-12 col-xs-12 col-sm-6 col-md-6 col-lg-4">
                  <div class="services-text mt-25px mb-25px border-gray bg-blue-hvr transition-3 radius-10px" style="box-shadow: none;">
                    <img class="icon-img mb-25px" src="<?= webURL.'image/services/'.$image ?>"/>
                    <?php if($data['link_text_a'] && ($data['link_text_a_appearence'] == 1)): ?>
                      <h4 class="mb-10px <?= $alignment[$data["link_text_a_alignment"]] ?>"><?= $data['link_text_a'] ?></h4>
                    <?php endif; ?>
                    <?php if($data['link_text_b'] && ($data['link_text_b_appearence'] == 1)): ?>
                    <p class="<?= $alignment[$data["link_text_b_alignment"]] ?>"><?= $data['link_text_b'] ?></p>
                    <?php endif; ?>
                  </div>
                </div>               
              <?php } ?>
              </div>
          </div>
        </section>
      <?php elseif($block->name == 'services Urrzaa Food Consultancy'): ?>
        <section id="about" class="section services-area sectionStandard horizontalAlignCenter layoutMarginBottom1 layoutMarginTop1 pt-5 mt-5">
          <div class="content standardWidth reversed">
            <div class="row">
              <div class="col col-12 col-xs-12 col-sm-12 col-md-6 col-lg-6 iconic-img-wrapper">
                <?php $image = $foodConsultancy['thumbnail'];  ?>

                <img src="<?= webURL.'image/services/'.$image ?>" alt="our Story" class="img-icon"></div>
              <div class="col col-12 col-xs-12 col-sm-12 col-md-6 col-lg-6 text-left verticalAlignCenter">
                <div class="text-vertical-center-wrapper">
                <?php $data = get_object_vars(json_decode($foodConsultancy['English'])); //pr($data);die; ?>
                  <?php if($data['link_text_a'] && ($data['link_text_a_appearence'] == 1)): ?>
                    <h1 class="fontSizeH1"><?= $data['link_text_a'] ?></h1>
                  <?php endif; ?>
                  <?php if($data['description'] && ($data['description_appearence'] == 1)): ?>
                    <div class="<?= $alignment[$data["description__alignment"]] ?>"><?= $data['description'] ?></div>
                  <?php endif; ?>
                   <?php if($data['link_text'] && ($data['link_appearence'] == 1)): ?>                
                      <div class="os_AU_other os_showInOSFadeIn <?= $alignment[$data["link_alignment"]] ?>"> 
                        <span class="btnWrapper marginBottom0 marginTop0 marginLeft0 marginRight0"> 
                          <a class="btn primaryCta promo-link" title="Download Urrzaa" href="<?= $foodConsultancy['link_url'] ?>"> <span class="noArrow"> <?= $data['link_text'] ?></span> 
                          </a> 
                        </span> 
                      </div>
                    <?php endif; ?>
                </div>
              </div>
            </div>
          </div>
        </section>
      <?php elseif($block->name == 'Our Case Study'): ?>
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
				                      <div class="os_AU_other os_showInOSFadeIn"> <span class="btnWrapper marginBottom0 marginTop0 marginLeft0 marginRight0"> <a class="btn primaryCta " title="Download Urrzaa" href="<?= webURL.'caseview' ?>"> <span class="noArrow"> <?= $data['link_text'] ?> </span> </a> </span> </div> 
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
      <?php endif; ?>
  <?php } ?>
  

  
  
  
  
<div id="footerArea" class="uhf">
  <div id="footerRegion">
    <div id="footerUniversalFooter">
      <?= $this->element('footer'); ?>
    </div>
  </div>
  <div class="footer_brdr"></div>
</div>
<!-- [JAVASCRIPT-FOOTER][START] --> <!-- Home page bundle --> <script src="<?= webURL ?>js/home.js"></script>
<div class="overlayWrapper fade">
  <div class="overlay">
    <button type="button" class="closeButton" aria-label="Exit overlay" data-button-type="overlay-close-button" data-bi-name="exit-overlay" data-bi-id="" data-bi-area="Overlay"><span class="closeCircle"></span><span class="closeIcon"></span></button>
    <div class="overlayContainer"></div>
  </div>
</div>
<div class="overlayBackground" style="height: 4336px;"></div>

<script src="<?= webURL ?>js/vendorsapp.js"></script> 
<script src="<?= webURL ?>js/app.js"></script>
<!-- Supernova end --> 
<script> artemisRequire([['home', 'toggleModule']], function(toggle) { var contentSelectors = { "notSet": "#initial-state", "neo": "#neo-content", "green": "#green-content" }; var settings = { "toggleTimeoutInMs": 10000 }; toggle.init(contentSelectors, settings); toggle.on(toggle.EVENTS.MODE_CHANGED, function(mode) { if (mode === toggle.MODES.GREEN) { Supernova.init('windowProperty', 'green-content'); } }); }); </script> 
<script> artemisRequire([['home', 'homeModule']], function(customModule) { customModule && typeof customModule.init === 'function' && customModule.init(); }); </script>

<!-- UHF Scripts -->
<link rel="stylesheet" href="<?= webURL ?>css/custom.css">
</body>
</html>