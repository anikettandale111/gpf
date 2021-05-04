<?php if(isset($type) && ($type == 'article')): ?>
	<!DOCTYPE html>
	<html class="en ltr os_Windows10 passiveeventlisteners csstransforms supports csstransforms3d backgroundsize borderradius cssanimations csstransitions canvas audio video svg smil os_Windows10_AU_Undetected uhfHeader-v2 js" data-language="en" data-pagename="home" data-pagetype="home" data-pagepath="/" data-region="in" dir="ltr" lang="en">
	<!-- AzureInstance: CMSApp_IN_1 -->
	<head id="head">
	<meta http-equiv="content-type" content="text/html; charset=UTF-8">
	
	<meta content='width=device-width, initial-scale=1' name='viewport'/>

	<title><?= $article->title ?> - Urrzaa Blog</title>
	<meta content='Urrzaa' name='Author'/>
	<meta name="keywords" content="<?= $article->meta_keyword ?>">
	<meta content='Urrzaa : <?= $article->title ?>' property='og:title'/>
	<meta content='<?= substr(strip_tags($article->description), 0, 100) ?>' property='description'/>
	<meta content='summary' name='twitter:card'/>
	<meta property="og:url"  content="<?= webURL.'?article='.$article->slug;?>" />
	<meta property="og:type" content="https://Urrzaa.com/blog" />
	<meta property="og:description" content="<?= substr(strip_tags($article->description), 0, 100) ?>" />
	<?php if(count($article['blog_medias']) > 0): ?>
			<?php foreach ($article['blog_medias'] as $key => $ivalue): ?>
					<?php if($ivalue['image']): ?>
							<?php $image = 	$ivalue['image'];break; ?>
					<?php endif; ?>
			<?php endforeach;
					
			?>
	<?php endif; 
			if(!isset($image)):
					$image = 'placeholder.png';
			endif;
	?>
	<meta property="og:image" content="<?= imageURL.'blog/'.$image ?>" />
	<?php if(count($article['blog_medias']) > 0): ?>
			<?php foreach ($article['blog_medias'] as $key => $ivalue): ?>
					<?php if($ivalue['video']): ?>
							<?php $video = 	$ivalue['video'];break; ?>
					<?php endif; ?>
			<?php endforeach; ?>
	<?php endif; ?>
	<?php if(isset($video)): ?>
			<meta property="og:video" content="https://www.youtube.com/watch?v=<?= $video ?>" />
	<?php endif; ?>
	<meta name="twitter:site" content="@Urrzaa">
	<meta name="twitter:title" content="<?= $article->title ?>">
	<meta name="twitter:description" content="<?= substr(strip_tags($article->description), 0, 100) ?>">
	<meta name="twitter:image" content="<?= imageURL.'blog/'.$image ?>"> 
	<link rel="shortcut icon" href="http://localhost/urrzaa/site/image/config/admni_logo_image574.png" type="image/png">
    <link rel="icon" href="http://localhost/urrzaa/site/image/config/admni_logo_image574.png" type="image/png">
	<link rel="apple-touch-icon" href="img/apple-touch-icon.png">
	<!-- [STYLES][START] -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" href="<?= webURL ?>css/main-v4.css">
	<link rel="stylesheet" href="<?= webURL ?>css/blog.css">
	<link rel="stylesheet" href="<?= webURL ?>css/vendorsapp.css">
	<link rel="stylesheet" href="<?= webURL ?>css/app.css">
	<!-- UHF Styles -->
	<link rel="stylesheet" href="<?= webURL ?>css/65-e1a08b.css" type="text/css" media="all">
	<link rel="stylesheet" href="<?= webURL ?>css/mscc-0.css" type="text/css">
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
	<link href="<?= webURL ?>css/jquery.bxslider.css" rel="stylesheet" />
	<link href="<?= webURL ?>css/animate.css" rel="stylesheet" />
	<!-- [start] LazyLoad -->
	<script> UrrzaaArtemis.addSettings({ UrrzaaLazyLoadActive: true }); if (window.UrrzaaLazyGravity && typeof window.UrrzaaLazyGravity.init === "function") { window.UrrzaaLazyGravity.init([".lazyLoad", ".promo-image"]); } </script>
	<style>
	.lazyLoad, .promo-image {
		background-image: url(data:image/gif;base64,R0lGODlhAQABAAAAACwAAAAAAQABAAA=) !important;
	}
	</style>
	<!-- [end] Lazyload -->
	<!-- [Begin] JSLL script includes 
	<script src="<?= webURL ?>js/jsll-4.js" type="text/javascript"></script>
	<script> var pageName = "static/new"; var config = { isLoggedIn: (sessionStorage.profile !== undefined), shareAuthStatus: true, authMethod: 1, autoCapture: { pageView: true, onLoad: true, onUnload: true, scroll: true, resize: true, lineage: true, click: true }, coreData: { appId: "scom", env: "prod", pageName: pageName } }; awa.init(config); </script>-->

	<!-- NOTICE: Third party scripts or code, linked to, called or referenced from this web site, online service or product, are licensed to you by the third parties that own such code, not by Microsoft. --> <script> var settings = { api: { "standByFor": "5000", "contracts": "https://api.Urrzaa.com/wallet/contracts/atu", "UrrzaaNumber": "https://api.Urrzaa.com/Urrzaa-number/users/self/services?statusList=active,reserved&expand=1", "UrrzaaNumberByServiceId": "https://api.Urrzaa.com/users/self/services/Urrzaain/", "callerId": "https://api.Urrzaa.com/users/self/services/cli/settings?expand=smsCapable", "services": "https://consumer.entitlement.Urrzaa.com​​/users/{0}/services?language=en", "contentApiUrl": "https://contentapi.Urrzaa.com/api/v2-0/regions/", "buyCredit": "https://secure.Urrzaa.com/{0}/credit?currency={1}", "sendCredit": "https://secure.Urrzaa.com/send-credit", "UrrzaaNumberSettings": "https://secure.Urrzaa.com/portal/settings/number?numberId={0}", "UrrzaaNumberService": "https://secure.Urrzaa.com/my/offers/Urrzaa-number?serviceId={0}", "getAnotherUrrzaaNumber": "https://secure.Urrzaa.com/my/Urrzaa-number", "UrrzaaProfileApiUrlBase": "https://edge.Urrzaa.com/profile/v1/", "helperApiUrlBase": "https://helperapi.Urrzaa.com/", "sessionApiUrl": "https://api.Urrzaa.com/users/self/displayname", "webClientEligibilityApiUrl": "https://web.Urrzaa.com/v1/api/eligibility-check", "exportContacts": "https://contacts.Urrzaa.com/export/v2/users/self/contacts", "autoRechargeUrl": "https://secure.Urrzaa.com/wallet/account/auto-topup", "userData": "https://api.Urrzaa.com/modules/groups/info", }, commerce: { "subscriptionsUpgradeThreshold": "0.99", }, token: { "clientId": "815617", "redirectUri": "https://www.Urrzaa.com/en/apps/tokenhandler?appid=scom", "loginUri": "https://a.lw.Urrzaa.com/login/silent", "cacheLength": "5000", }, user: { "msaLoginFromBackend": true, }, message: { "genericError": "" }, errorsLogger: { "enabled": "true", "token": "28b1987bcc8c4e1a8cd8c2874c7dede4-66d03f5b-4777-4915-ba6a-f821e57b2e64-7437" }, swcChat: { "sdkUrl": "https://swc.cdn.Urrzaa.com/sdk/v1/sdk.min.js", "environment": "prod", "chat": "true", "style": "scom" }, fadeOnScroll: { "home": "true", "tx": "" }, dropdown: { "promoteUrl": "http://go.Urrzaa.com/thank.you" }, navigation: { "header": { "sticky": false, "showLinks": true, "showButtons": false, "logoutLink": "https://go.Urrzaa.com/logout?client_id=815617&redirect_uri=https://www.Urrzaa.com&response_type=token&redirect=true" } } }; UrrzaaArtemis.addUrrzaaSettings(settings); </script>

	<!--<script async src="<?= webURL ?>js/t_006.js"></script>
	[End] JSLL script includes -->

	<!-- [JAVASCRIPT-HEAD][END] -->
	<link rel="preload" href="<?= webURL ?>fonts/icon3/UrrzaaAssets-Light_web.woff" as="font" type="font/woff" crossorigin="anonymous">
	<script charset="utf-8" src="<?= webURL ?>js/1.js"></script>
	<script charset="utf-8" src="<?= webURL ?>js/9.js"></script>
	<script charset="utf-8" src="<?= webURL ?>js/4.js"></script>
	<script charset="utf-8" src="<?= webURL ?>js/7.js"></script>
	<script charset="utf-8" src="<?= webURL ?>js/2.js"></script>
	<script charset="utf-8" src="<?= webURL ?>js/5.js"></script>
	<script charset="utf-8" src="<?= webURL ?>js/3.js"></script>
	<!--[if lt IE]>
		<link rel="stylesheet" href="css/ie.css" type="text/css" media="all">
	<![endif]-->
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

	<div id="primaryR1" class="pad-hero" data-grid="container" data-region-key="primaryr1">

			<div id="coreui-hero-7enwkdp">
					
							<div class="m-hero blog">
															<div>
													<section role="presentation" class="m-hero-item f-medium f-x-left f-y-center context-game theme-dark f-mask f-short">
									<picture>
									<source srcset="<?= imageURL.'blog/banner/500/'.$blogBanner['banner_image'] ?>" media="(max-width:539px)">
											<source srcset="<?= imageURL.'blog/banner/700/'.$blogBanner['banner_image'] ?>" media="(min-width:540px) and (max-width:767px)">
											<source srcset="<?= imageURL.'blog/banner/1000/'.$blogBanner['banner_image'] ?>" media="(min-width:768px) and (max-width:1083px)">
											<source srcset="<?= imageURL.'blog/banner/1200/'.$blogBanner['banner_image'] ?>" media="(min-width:1084px) and (max-width:1399px)">
											<source srcset="<?= imageURL.'blog/banner/1600/'.$blogBanner['banner_image'] ?>">
											<img class="lazypreload" alt="An illuminated tent sits under the milky way." alt="<?= $blogBanner['alt'] ?>" src="<?= imageURL.'blog/banner/500/'.$blogBanner['banner_image'] ?>">
									</picture>
							<div>
									<div>
						<h1 class="c-heading">Blog</h1>
						<div class="c-paragraph">
							<!-- <p>The road to success is hard and it takes time to profile yourself and to prove others that you can offer quality services. Our expertise are based around our team skills & strength, allowing us to deliver the best if not the very best.</p> -->
						</div>
									</div>
							</div>
							
					</section>

							</div>

							</div>
			</div>
					</div>
		<section id="casestudies" class="section caseview-area sectionStandard horizontalAlignCenter layoutMarginBottom1 layoutMarginTop1 pt-5">
		<div class="content standardWidth ">
				<div class="row">
			
			<div class="col col-xs-12 col-sm-12 col-md-8 col-lg-9 col1 left_wrapper">
				<div class="row">
					<div class='widget Blog col col-xs-12 col-sm-12 col-md-12 col-lg-12' data-version='1' id='Blog1'>
						<article class='post'>
							<div class='post-header' id="singleBlogHeader">													
								<h2><?= $article->title ?></h2>
								<div class='category-date'>
									<span class="category"><?= $article->blog_category->name ?></span>
									<span class="author_date">on 
									<?php 
										if($article->publish_date): 
												echo date('F d, Y', $article->publish_date);
												$date = date('F d, Y', $article->publish_date);
										else:
												echo date('F d, Y', strtotime($article->created));
												$date = date('F d, Y', strtotime($article->created));
										endif;
									?>
									/ by <?= ucwords($article->author) ?></span>
								</div>
							</div>
							<div id='summary1569283200'>
								<div class="post-image">
									<div class="detail-post-gallery slick-slider">
										<!-- <div class="detail-post-gallery slick-slider">
											<div class="post-gallery-slide slick-slide image">
												<img border="0" src="img/features-Urrzaa-rates.jpg" alt="" title="" /></div>
											<div class="post-gallery-slide slick-slide youtube">
												<iframe class="embed-player slide-media" width="100%" height="532" src="https://www.youtube.com/embed/Lt5ZBTGRLPc?enablejsapi=1&controls=0&fs=0&iv_load_policy=3&rel=0&showinfo=0&loop=1" frameborder="0" allow="accelerometer;  encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
											</div>
										</div> -->
										<?php if(count($article['blog_medias']) > 0): ?>
											<div class="post-gallery slick-slider">																		
												<?php $firstimage=$article['blog_medias'][0];
												foreach ($article['blog_medias'] as $key => $ivalue) { ?>
													<?php if($ivalue['video']): ?>
														<div class="post-gallery-slide slick-slide youtube">
															<a href="<?= $ivalue['video'] ?>" videoanchor="1">
																<iframe class="embed-player slide-media" width="100%" height="532" src="https://www.youtube.com/embed/<?= $ivalue['video'] ?>?enablejsapi=1&controls=0&fs=0&iv_load_policy=3&rel=0&showinfo=0&loop=1" frameborder="0" allow="accelerometer;  encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
															</a>
														</div>
													<?php else: ?>
															<div class="post-gallery-slide slick-slide image"><a href="javascript:void(0)" imageanchor="1"><img border="0" src="<?= imageURL.'blog/'.$ivalue['image'] ?>" alt="<?= $ivalue['alt'] ?>" title="<?= $ivalue['title'] ?>" /></a></div>
													<?php endif; ?>
												<?php } ?>
											</div>
										<?php endif; ?>
									</div>
								</div>
								<div class="post-entry">
									<?= $article->description ?>
								</div>
								<div class="bottom-blog">
									Avg. Rating: <span class="av_rating"><?= $article->av_rating ?></span>
									<section class="rating-widget">
										<div class='rating-stars text-center'>
											
												<?php $ratingTitle = [1 => 'Poor', 2 => 'Fair', 3 => 'Good', 4 => 'Excellent', 5 => 'WOW!!!']; ?>
												<?php $dataValueTitle = [1 => 1, 2 => 2, 3 => 3, 4 => 4, 5 => 5]; ?>
												<ul id='stars'>
													<?php for($i = 1; $i <= 5; ++$i){ ?>
														<?php if($i <= $article->av_rating): ?>
																<li class='star hover' title="<?= $ratingTitle[$i] ?>" data-value="<?= $dataValueTitle[$i] ?>">
														<?php else: ?>
																<?php if( ($i > $article->av_rating) && (($i-1) < $article->av_rating)): ?>
																		<li class='star-half hover' title="<?= $ratingTitle[$i] ?>" data-value="<?= $dataValueTitle[$i] ?>">
																<?php else: ?>
																	<li class='star' title="<?= $ratingTitle[$i] ?>" data-value="<?= $dataValueTitle[$i] ?>">
																<?php endif; ?>
														<?php endif; ?>
																<i class='fa fa-star fa-fw'></i>
															</li>
													<?php } ?>										      
												</ul>
											
										</div>
										
						
									</section>
									<?php
									$articleurl = webURL.'?article='.$article->slug;//$articleurl = webURL.'?article='.implode('-', explode(" ", $article->title));
									?>
									<ul class="group-share pull-right">
										<li class="blog-dates"> Share:  </li>
										<li><a href="#" target='_blank'><i class='fa fa-facebook'></i></a></li>
										<li><a href="#" target='_blank'><i class='fa fa-twitter'></i></a></li>
										<li class="linkedin"> 
											<a href="#" title="Linkedin" target="_blank" rel="noopener noreferrer"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
										</li>
									</ul>
									<div class='success-box' style="display:none;">
											<div class='clearfix'></div>
											<img alt='tick image' width='32' src='data:image/svg+xml;utf8;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iaXNvLTg4NTktMSI/Pgo8IS0tIEdlbmVyYXRvcjogQWRvYmUgSWxsdXN0cmF0b3IgMTkuMC4wLCBTVkcgRXhwb3J0IFBsdWctSW4gLiBTVkcgVmVyc2lvbjogNi4wMCBCdWlsZCAwKSAgLS0+CjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB4bWxuczp4bGluaz0iaHR0cDovL3d3dy53My5vcmcvMTk5OS94bGluayIgdmVyc2lvbj0iMS4xIiBpZD0iTGF5ZXJfMSIgeD0iMHB4IiB5PSIwcHgiIHZpZXdCb3g9IjAgMCA0MjYuNjY3IDQyNi42NjciIHN0eWxlPSJlbmFibGUtYmFja2dyb3VuZDpuZXcgMCAwIDQyNi42NjcgNDI2LjY2NzsiIHhtbDpzcGFjZT0icHJlc2VydmUiIHdpZHRoPSI1MTJweCIgaGVpZ2h0PSI1MTJweCI+CjxwYXRoIHN0eWxlPSJmaWxsOiM2QUMyNTk7IiBkPSJNMjEzLjMzMywwQzk1LjUxOCwwLDAsOTUuNTE0LDAsMjEzLjMzM3M5NS41MTgsMjEzLjMzMywyMTMuMzMzLDIxMy4zMzMgIGMxMTcuODI4LDAsMjEzLjMzMy05NS41MTQsMjEzLjMzMy0yMTMuMzMzUzMzMS4xNTcsMCwyMTMuMzMzLDB6IE0xNzQuMTk5LDMyMi45MThsLTkzLjkzNS05My45MzFsMzEuMzA5LTMxLjMwOWw2Mi42MjYsNjIuNjIyICBsMTQwLjg5NC0xNDAuODk4bDMxLjMwOSwzMS4zMDlMMTc0LjE5OSwzMjIuOTE4eiIvPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8L3N2Zz4K'/>
											<div class='text-message'></div>
											<div class='clearfix'></div>
									</div>
								</div>
							</div>
						</article>
					</div>
					<div class="col col-xs-12 col-sm-12 blog_pager">
						<div class="row">
							<div class="col col-xs-12 col-sm-6 blog_pager_link blog_pager_prev">
								<?php if($prev):
									$articleUrlPrev = webURL.'blog?article='.$prev->slug;//$articleUrlPrev = webURL.'?article='.implode('-', explode(" ", $prev->title));
									if($this->request->getQuery('label')):
											$articleUrlPrev = webURL.'blog?label='.$this->request->getQuery('label').'&article='.$prev->slug;//$articleUrlPrev = webURL.'?label='.$this->request->getQuery('label').'&article='.implode('-', explode(" ", $prev->title));
									elseif($this->request->getQuery('category')):
											$articleUrlPrev = webURL.'blog?category='.$this->request->getQuery('category').'&article='.$prev->slug;//$articleUrlPrev = webURL.'?category='.$this->request->getQuery('category').'&article='.implode('-', explode(" ", $prev->title));
											$homePage = webURL.'?category='.$this->request->getQuery('category');
									else:
											$articleUrlPrev = webURL.'blog?article='.$prev->slug;//$articleUrlPrev = webURL.'?article='.implode('-', explode(" ", $prev->title));
											$homePage = webURL;
									endif;
									if($prev): ?><a href="<?= $articleUrlPrev ?>"><i class="fa fa-arrow-left" aria-hidden="true"></i> Previous Post</a><?php endif; 
								endif; ?>
							</div>
							<div class="col col-xs-12 col-sm-6 blog_pager_link blog_pager_next">
								<?php
							if($next):
								if($this->request->getQuery('label')):
									$nextPageUrl = webURL.'blog?label='.$this->request->getQuery('label').'&article='.$next->slug;//$nextPageUrl = webURL.'?label='.$this->request->getQuery('label').'&article='.implode('-', explode(" ", $next->title));
								elseif($this->request->getQuery('category')):
										$nextPageUrl = webURL.'blog?category='.$this->request->getQuery('category').'&article='.$next->slug;//$nextPageUrl = webURL.'?category='.$this->request->getQuery('category').'&article='.implode('-', explode(" ", $next->title));
										$homePage = webURL.'blog?category='.$this->request->getQuery('category');
								else:
										$nextPageUrl = webURL.'blog?article='.$next->slug;//$nextPageUrl = webURL.'?article='.implode('-', explode(" ", $next->title));
										$homePage = webURL;
								endif; ?>
								<?php if($next): ?>									
									<a href="<?= $nextPageUrl ?>">Next Post <i class="fa fa-arrow-right" aria-hidden="true"></i></a>
								<?php endif; ?>
							<?php endif; ?>
								
							</div>
						</div>
					</div>
					<div class="col col-xs-12 col-sm-12 blog_related_title">
						<h2>Related Posts</h2>
					</div>
					<?php foreach($relatedArticles as $value): ?>
						<?php
							$url= $value['slug'];
							if($this->request->getQuery('label')):
									$articleurl =  webURL.'blog?label='.$this->request->getQuery('label').'&article='.$url;
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
									$image = $ivalue['image'];$alt = $value['alt']; $title = $value['title']; break; 
								endif;
							} 
						?>
					<div class="col col-xs-12 col-sm-6 col-md-4 col-lg-4 col1 blog_wrapper blogItem">
						<div class="colContent">
						<div class="promo column unit6">
							<a href="<?= $articleurl ?>">
								<span class="promo-image column unit4 noHighContrastAdjust">
									<!-- <picture>
										<source srcset="img/casestudies-design-fore-test-small.jpg" media="(max-width:599px)">
										<source srcset="img/casestudies-design-fore-test.jpg" media="(min-width:600px)">
										<img class="lazypreload" alt="Designed For Taste" title="Urrzaa Services" src="img/casestudies-design-fore-test-small.jpg">
									</picture> -->
									<?php if($video): ?>
										<div class="post-gallery-slide youtube"><a href="<?= $video ?>" videoanchor="1" style="display:block;">
											<iframe class="embed-player slide-media" width="100%" height="532" src="https://www.youtube.com/embed/<?= $video ?>?enablejsapi=1&controls=0&fs=0&iv_load_policy=3&rel=0&showinfo=0&loop=1" frameborder="0" allow="accelerometer;  encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
										</a></div>
									<?php else: ?>
										<div class="post-gallery-slide image">
											<a href="<?= $articleurl ?>" imageanchor="1" style="display:block;">
												<img border="0" src="<?= imageURL.'blog/thumb/'.$image ?>" alt="<?= $alt ?>" title="<?= $title ?>" />
											</a>
										</div>
									<?php endif; ?>
								</span>
								<span class="promo-content column blog_content">
									<div class="content-wrapper">
										<span class="category"><?= $value['blog_category']['name'] ?></span>
										<span class="author_date">on 
										<?php 
										if($value['publish_date']): 
												echo date('F d, Y', $value['publish_date']);
										else:
												echo date('F d, Y', strtotime($value['created']));
										endif;
									?>
									 / by <?= ucwords($value['author']) ?></span>
									</div>
									<h2><?= $value['title'] ?></h2>
									<?= $value['excerpt'] ?>
									<span class="cd-modal-action">
										<span class="btn sbmt_btn" title="Explore" href="<?= $articleurl ?>">Read More</span>
									</span>
								</span>
							</a>
						</div>
						</div>
					</div>
					<?php endforeach; ?>
			
				</div>
			</div>
			
			<div class="col col-xs-12 col-sm-6 col-md-4 col-lg-3 col1 right_wrapper">
				<div class="wall_wrapper">
				<h2 class="heading">Wallpapers</h2>
				<div class='postSliderWrapper'>
					
					<?php foreach($wallpapers as $value): ?>
						<?php if(!empty($value['image'])): ?> 
						<div class='post col-4 col-md-4 col-lg-12'>
							<div class='summary'>
								<div class="post-image">
									<div class="post-gallery-slide image">
										<a href="<?= imageURL.'blog/wallpaper/'.$value['image'] ?>" download="<?= imageURL.'blog/wallpaper/'.$value['image'] ?>" target="_blank" imageanchor="1" style="display:block;">
											<img border="0" src="<?= imageURL.'blog/wallpaper/225x178/'.$value['image'] ?>" alt="<?= $value['title'] ?>" title="" />
										</a>
									</div>
								</div>
								<div class='post-header'>													
									<h2><a href="javascript:void(0)"><?= $value['title'] ?></a></h2>
								</div>	
							</div>
						</div>
						<?php endif; ?>
					<?php endforeach; ?>
					</div>
				</div>
				<!-- <div class="about_auther"> -->
					<!-- <h2 class="heading">About us</h2> -->
				<!-- </div> -->
				<div class="followus">
					<h2 class="heading">Follow us</h2>
					<ul class="site-social-networks secondary-2-primary style-default show-title">
						<li><a target="_blank" href="<?= $configList['facebook_link'] ?>"><i class="fa fa-facebook"></i></a></li>
						<li><a target="_blank" href="<?= $configList['instagram_link'] ?>"><i class="fa fa-instagram"></i></a></li>
						<li><a target="_blank" href="<?= $configList['linkedin_link'] ?>"><i class="fa fa-linkedin"></i></a></li>
						<li><a target="_blank" href="<?= $configList['facebook_link'] ?>"><i class="fa fa-twitter"></i></a></li>
					</ul>
				</div>
			</div>
				</div>
			</div>
		</section>
	<div id="footerArea" class="uhf">
		<div id="footerRegion">
			<div id="footerUniversalFooter">
				<?= $this->element('footer') ?>
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

	<!-- <script src="js/vendorsapp.js"></script> <script src="js/app.js"></script> -->
	<!-- Supernova end --> <script> artemisRequire([['home', 'toggleModule']], function(toggle) { var contentSelectors = { "notSet": "#initial-state", "neo": "#neo-content", "green": "#green-content" }; var settings = { "toggleTimeoutInMs": 10000 }; toggle.init(contentSelectors, settings); toggle.on(toggle.EVENTS.MODE_CHANGED, function(mode) { if (mode === toggle.MODES.GREEN) { Supernova.init('windowProperty', 'green-content'); } }); }); </script> <script> artemisRequire([['home', 'homeModule']], function(customModule) { customModule && typeof customModule.init === 'function' && customModule.init(); }); </script>
	<!-- UHF Scripts -->
	<script src="<?= webURL ?>js/jquery-2.1.1.js"></script>
	<script src="<?= webURL ?>js/custome.js"></script>
	<link rel="stylesheet" type="text/css" href="http://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
	<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.min.js"></script>
	
	<script>
			/* rating script start */

				

				function responseMessage(msg) {
				  $('.success-box').fadeIn(200);  
				  $('.success-box div.text-message').html("<span>" + msg + "</span>");
				  location.reload();
				}
			/* rating script end */
			      $(document).ready(function(){
			        $(".widget h2").wrapInner("<span></span>");
			      });
	</script>
	<script src='<?= webURL.'js/script.js?v'.time() ?>' type='text/javascript'></script>
	<script type="text/javascript">
	if($(window).width()>1020){
					$('.postSliderWrapper').slick({
						autoplay: false,
						arrows: true,
						dots: false,
						slidesToShow: 3,
						slidesToScroll: 1,
						centerPadding: "0px",
						draggable: false,
						infinite: false,
						pauseOnHover: true,
						swipe: false,
						touchMove: false,
						vertical: true,
						speed: 1000,
						autoplaySpeed: 2000,
						useTransform: true,
						cssEase: 'cubic-bezier(0.645, 0.045, 0.355, 1.000)',
						adaptiveHeight: true,
								prevArrow: '<button type="button" class="slick-nav slick-prev"><i class="fa fa-angle-left"></i></button>',
								nextArrow: '<button type="button" class="slick-nav slick-next"><i class="fa fa-angle-right"></i></button>',
						});
				} else {
					$('.postSliderWrapper').slick({
						lazyLoad: 'ondemand',
								slidesToShow: 3,
								slidesToScroll: 1,
								autoplay: false,
						adaptiveHeight:true,
						speed: 1000,
						autoplaySpeed: 2000,
						useTransform: true,
						cssEase: 'cubic-bezier(0.645, 0.045, 0.355, 1.000)',
						adaptiveHeight: false,
								prevArrow: '<button type="button" class="slick-nav slick-prev"><i class="fa fa-angle-left"></i></button>',
								nextArrow: '<button type="button" class="slick-nav slick-next"><i class="fa fa-angle-right"></i></button>',
						responsive: 
						[
							{
								breakpoint: 1020,
								settings: {
								slidesToShow: 3
								}
							},
							{
								breakpoint: 800,
								settings: {
								slidesToShow: 2
								}
							},
							{
								breakpoint: 480,
								settings: {
								slidesToShow: 1
								}
							}
						]
						});
				}
	</script>
	<script>
									$(document).ready(function(){
										/* 1. Visualizing things on Hover - See next part for action on click */
										$('#stars li').on('mouseover', function(){
											var onStar = parseInt($(this).data('value'), 10); // The star currently mouse on
										
											// Now highlight all the stars that's not after the current hovered star
											$(this).parent().children('li.star').each(function(e){
												if (e < onStar) {
													$(this).addClass('hover');
												}
												else {
													$(this).removeClass('hover');
												}
											});
											
										}).on('mouseout', function(){
											$(this).parent().children('li.star').each(function(e){
												$(this).removeClass('hover');
											});
										});
										
										
										/* 2. Action to perform on click */
										$('#stars li').on('click', function(){
											var onStar = parseInt($(this).data('value'), 10); // The star currently selected
											var stars = $(this).parent().children('li.star');
											
											for (i = 0; i < stars.length; i++) {
												$(stars[i]).removeClass('selected');
											}
											
											for (i = 0; i < onStar; i++) {
												$(stars[i]).addClass('selected');
											}
											
											// JUST RESPONSE (Not needed)
											var ratingValue = parseInt($('#stars li.selected').last().data('value'), 10);
											var msg = "";
											if (ratingValue > 1) {
													msg = "Thanks! You rated this " + ratingValue + " stars.";
											}
											else {
													msg = "We will improve ourselves. You rated this " + ratingValue + " stars.";
											}
											var webURL = '<?= webURL ?>';
											var article_id = $(this).attr("data-id");
											var rating = ratingValue;
											var url = webURL+'blog/saverating';
											$.ajax({
											type: "POST",
											dataType: "json",
											url: url,
											data: {id:article_id, rating: rating},  
											success: function(message){
												//location.reload();
												if(message['status'] == 'success'){
									responseMessage(msg, article_id);
									$(".success-box"+article_id).show("slow");
									setTimeout(function() {   //calls click event after a certain time
														location.reload();}, 3000);
									setTimeout(function(){ $(".success-box"+article_id).hide("slow") }, 2800);
																		
												}
												if(message['status'] == 'already-rated'){
														alert('Already voted');
														location.reload();
												}
											}
								});
											//responseMessage(msg);
											
										});
										
										
									});


									function responseMessage(msg, article_id) {
										$('.success-box-'+article_id).fadeIn(200);
										$('.success-box-'+article_id+' '+'div.text-message-'+article_id).html("<span>" + msg + "</span>");
									}
						</script>
	</body>
	</html>
<?php else: ?>
	<!DOCTYPE html>
	<html class="en ltr os_Windows10 passiveeventlisteners csstransforms supports csstransforms3d backgroundsize borderradius cssanimations csstransitions canvas audio video svg smil os_Windows10_AU_Undetected uhfHeader-v2 js" data-language="en" data-pagename="home" data-pagetype="home" data-pagepath="/" data-region="in" dir="ltr" lang="en">
	<!-- AzureInstance: CMSApp_IN_1 -->
	<head id="head">
	<meta http-equiv="content-type" content="text/html; charset=UTF-8">
	<title>Urrzaa</title>
	<meta name="description" content="Stay in touch! Free online calls, messaging, affordable international calling to mobiles or landlines and Urrzaa for Business for effective collaboration.">
	<meta name="keywords">
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
	<!-- Favicon -->
	<link rel="shortcut icon" href="http://localhost/urrzaa/site/image/config/admni_logo_image574.png" type="image/png">
    <link rel="icon" href="http://localhost/urrzaa/site/image/config/admni_logo_image574.png" type="image/png">
	<link rel="apple-touch-icon" href="img/apple-touch-icon.png">
	<!-- [STYLES][START] -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" href="<?= webURL ?>css/main-v4.css">
	<link rel="stylesheet" href="<?= webURL ?>css/blog.css">
	<link rel="stylesheet" href="<?= webURL ?>css/vendorsapp.css">
	<link rel="stylesheet" href="<?= webURL ?>css/app.css">
	<!-- UHF Styles -->
	<link rel="stylesheet" href="<?= webURL ?>css/65-e1a08b.css" type="text/css" media="all">
	<link rel="stylesheet" href="<?= webURL ?>css/mscc-0.css" type="text/css">
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
	<link href="<?= webURL ?>css/jquery.bxslider.css" rel="stylesheet" />
	<link href="<?= webURL ?>css/animate.css" rel="stylesheet" />
	<!-- [start] LazyLoad -->
	<script> UrrzaaArtemis.addSettings({ UrrzaaLazyLoadActive: true }); if (window.UrrzaaLazyGravity && typeof window.UrrzaaLazyGravity.init === "function") { window.UrrzaaLazyGravity.init([".lazyLoad", ".promo-image"]); } </script>
	<style>
	.lazyLoad, .promo-image {
		background-image: url(data:image/gif;base64,R0lGODlhAQABAAAAACwAAAAAAQABAAA=) !important;
	}
	</style>
	<!-- [end] Lazyload -->
	<!-- [Begin] JSLL script includes 
	<script src="<?= webURL ?>js/jsll-4.js" type="text/javascript"></script>
	<script> var pageName = "static/new"; var config = { isLoggedIn: (sessionStorage.profile !== undefined), shareAuthStatus: true, authMethod: 1, autoCapture: { pageView: true, onLoad: true, onUnload: true, scroll: true, resize: true, lineage: true, click: true }, coreData: { appId: "scom", env: "prod", pageName: pageName } }; awa.init(config); </script>-->

	<!-- NOTICE: Third party scripts or code, linked to, called or referenced from this web site, online service or product, are licensed to you by the third parties that own such code, not by Microsoft. --> <script> var settings = { api: { "standByFor": "5000", "contracts": "https://api.Urrzaa.com/wallet/contracts/atu", "UrrzaaNumber": "https://api.Urrzaa.com/Urrzaa-number/users/self/services?statusList=active,reserved&expand=1", "UrrzaaNumberByServiceId": "https://api.Urrzaa.com/users/self/services/Urrzaain/", "callerId": "https://api.Urrzaa.com/users/self/services/cli/settings?expand=smsCapable", "services": "https://consumer.entitlement.Urrzaa.com​​/users/{0}/services?language=en", "contentApiUrl": "https://contentapi.Urrzaa.com/api/v2-0/regions/", "buyCredit": "https://secure.Urrzaa.com/{0}/credit?currency={1}", "sendCredit": "https://secure.Urrzaa.com/send-credit", "UrrzaaNumberSettings": "https://secure.Urrzaa.com/portal/settings/number?numberId={0}", "UrrzaaNumberService": "https://secure.Urrzaa.com/my/offers/Urrzaa-number?serviceId={0}", "getAnotherUrrzaaNumber": "https://secure.Urrzaa.com/my/Urrzaa-number", "UrrzaaProfileApiUrlBase": "https://edge.Urrzaa.com/profile/v1/", "helperApiUrlBase": "https://helperapi.Urrzaa.com/", "sessionApiUrl": "https://api.Urrzaa.com/users/self/displayname", "webClientEligibilityApiUrl": "https://web.Urrzaa.com/v1/api/eligibility-check", "exportContacts": "https://contacts.Urrzaa.com/export/v2/users/self/contacts", "autoRechargeUrl": "https://secure.Urrzaa.com/wallet/account/auto-topup", "userData": "https://api.Urrzaa.com/modules/groups/info", }, commerce: { "subscriptionsUpgradeThreshold": "0.99", }, token: { "clientId": "815617", "redirectUri": "https://www.Urrzaa.com/en/apps/tokenhandler?appid=scom", "loginUri": "https://a.lw.Urrzaa.com/login/silent", "cacheLength": "5000", }, user: { "msaLoginFromBackend": true, }, message: { "genericError": "" }, errorsLogger: { "enabled": "true", "token": "28b1987bcc8c4e1a8cd8c2874c7dede4-66d03f5b-4777-4915-ba6a-f821e57b2e64-7437" }, swcChat: { "sdkUrl": "https://swc.cdn.Urrzaa.com/sdk/v1/sdk.min.js", "environment": "prod", "chat": "true", "style": "scom" }, fadeOnScroll: { "home": "true", "tx": "" }, dropdown: { "promoteUrl": "http://go.Urrzaa.com/thank.you" }, navigation: { "header": { "sticky": false, "showLinks": true, "showButtons": false, "logoutLink": "https://go.Urrzaa.com/logout?client_id=815617&redirect_uri=https://www.Urrzaa.com&response_type=token&redirect=true" } } }; UrrzaaArtemis.addUrrzaaSettings(settings); </script>

	<!--<script async src="<?= webURL ?>js/t_006.js"></script>
	[End] JSLL script includes -->

	<!-- [JAVASCRIPT-HEAD][END] -->
	<link rel="preload" href="<?= webURL ?>fonts/icon3/UrrzaaAssets-Light_web.woff" as="font" type="font/woff" crossorigin="anonymous">
	<script charset="utf-8" src="<?= webURL ?>js/1.js"></script>
	<script charset="utf-8" src="<?= webURL ?>js/9.js"></script>
	<script charset="utf-8" src="<?= webURL ?>js/4.js"></script>
	<script charset="utf-8" src="<?= webURL ?>js/7.js"></script>
	<script charset="utf-8" src="<?= webURL ?>js/2.js"></script>
	<script charset="utf-8" src="<?= webURL ?>js/5.js"></script>
	<script charset="utf-8" src="<?= webURL ?>js/3.js"></script>
	<!--[if lt IE]>
		<link rel="stylesheet" href="css/ie.css" type="text/css" media="all">
	<![endif]-->
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
		<!-- <div id="nav-buttons-wrapper">
			<nav class="isNotAuthenticated siteNavigation fullWidth active showLinks" data-navigation-version="v3" data-content-key="authenticationStatus" role="navigation">
				<ul class="uhfNavigationBar" role="menubar">
					<li id="customMeControl" role="menuitem" class="mainMenuItem signInDropdownWrapper singInVisible notAuthenticated noMobile noSmallMobile" aria-haspopup="true" data-element-type="mainMenuItem"> <a class="btn secondaryCta small usernameBtn notAuthenticated" role="button" data-element-type="menuDropdownToggle" data-link-type="login" data-tracking-type="click" data-position="nav-dropdown" data-bi-id="sign-in" data-bi-name="sign-in" tabindex="0"> <span class="title">Sign in</span> <span class="icon icon-arrow-down"></span> </a>
						<ul class="subMenu signInDropdown" data-element-type="subMenu" role="menu" aria-expanded="false">
							<li role="presentation"><a role="menuitem" href="#" data-bi-id="my-account" data-bi-name="my-account" rel="nofollow" data-link-type="profile" data-tracking-type="click" data-position="nav-dropdown"><span class="icon icon-user"></span>Client Login</a></li>
						</ul>
					</li>
				</ul>
			</nav>
		</div> -->
	</div>
		<style type="text/css">
	body {height:auto !important;}
	</style>

		<div id="pageTop"></div>

	<div id="primaryR1" class="pad-hero" data-grid="container" data-region-key="primaryr1">

			<div id="coreui-hero-7enwkdp">
					
							<div class="m-hero blog">
															<div>
													<section role="presentation" class="m-hero-item f-medium f-x-left f-y-center context-game theme-dark f-mask f-short">
									<picture>
											<source srcset="<?= imageURL.'blog/banner/500/'.$blogBanner['banner_image'] ?>" media="(max-width:539px)">
											<source srcset="<?= imageURL.'blog/banner/700/'.$blogBanner['banner_image'] ?>" media="(min-width:540px) and (max-width:767px)">
											<source srcset="<?= imageURL.'blog/banner/1000/'.$blogBanner['banner_image'] ?>" media="(min-width:768px) and (max-width:1083px)">
											<source srcset="<?= imageURL.'blog/banner/1200/'.$blogBanner['banner_image'] ?>" media="(min-width:1084px) and (max-width:1399px)">
											<source srcset="<?= imageURL.'blog/banner/1600/'.$blogBanner['banner_image'] ?>">
											<img class="lazypreload" alt="An illuminated tent sits under the milky way." alt="<?= $blogBanner['alt'] ?>" src="<?= imageURL.'blog/banner/500/'.$blogBanner['banner_image'] ?>">
									</picture>
							<div>
									<div>
						<h1 class="c-heading">Blog</h1>
						<div class="c-paragraph">
							<!-- <p>The road to success is hard and it takes time to profile yourself and to prove others that you can offer quality services. Our expertise are based around our team skills & strength, allowing us to deliver the best if not the very best.</p> -->
						</div>
									</div>
							</div>
							
					</section>

							</div>

							</div>
			</div>
					</div>
		<section id="casestudies" class="section caseview-area sectionStandard horizontalAlignCenter layoutMarginBottom1 layoutMarginTop1 pt-5">
		<div class="content standardWidth ">
				<div class="row">
			
			<div class="col col-xs-12 col-sm-12 col-md-8 col-lg-9 col1 left_wrapper">
				<div class="row fp-loading-data">
					<?php foreach($blogArticles as $value): ?>
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
						<div class="col col-xs-12 col-sm-6 col-md-4 col-lg-4 col1 blog_wrapper blogItem">
							<div class="colContent">
								<div class="promo column unit6">
									<a href="<?= $articleurl ?>">
											<?php if($video): ?>
												<div class="post-gallery-slide youtube"><a href="<?= $video ?>" videoanchor="1" style="display:block;">
													<iframe class="embed-player slide-media" width="100%" height="532" src="https://www.youtube.com/embed/<?= $video ?>?enablejsapi=1&controls=0&fs=0&iv_load_policy=3&rel=0&showinfo=0&loop=1" frameborder="0" allow="accelerometer;  encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
												</a></div>
											<?php else: ?>
												<div class="post-gallery-slide image">
												<a href="<?= $articleurl ?>" imageanchor="1" style="display:block;">
													<img border="0" src="<?= imageURL.'blog/thumb/'.$image ?>" alt="<?= $alt ?>" title="<?= $title ?>" />
												</a>
												</div>
											<?php endif; ?>
										<!-- <span class="promo-image column unit4 noHighContrastAdjust">
											<picture>
												<source srcset="<?= imageURL.'blog/thumb/'.$image ?>" media="(max-width:599px)">
												<source srcset="<?= imageURL.'blog/'.$image ?>" media="(min-width:600px)">
												<img class="lazypreload" alt="<?= $alt ?>" title="Urrzaa Services" src="<?= imageURL.'blog/thumb/'.$image ?>">
											</picture>
										</span> -->
										<span class="promo-content column blog_content">
											<div class="content-wrapper">
												<span class="category"><?= $value['blog_category']['name'] ?></span>
												<span class="author_date">
													on 
													<?php
													if($value['publish_date']): 
														echo date('F d, Y', $value['publish_date']);
														$date = date('F d, Y', $value['publish_date']);
													else:
															echo date('F d, Y', strtotime($value['created']));
															$date = date('F d, Y', strtotime($value['created']));
													endif;
													?>
													by
													<?= ($value['author'])? ucwords($value['author']): '---' ?>
													<!-- on October 20, 2019 / by Author Name -->
												</span>
											</div>
											<h2><?= $value['title'] ?></h2>
											<?= $value['excerpt'] ?>
											<span class="cd-modal-action">
												<span class="btn sbmt_btn" title="Explore" href="<?= $articleurl ?>">Read More</span>
											</span>
										</span>
									</a>
								</div>
							</div>
						</div>
					<?php endforeach; ?>
			
				</div>
				<?php if($totalBlogs > 6 ): ?>
					<div id="pagination">
						<?php if($this->request->getQuery('category')): ?>
							<a href="<?= webURL.'blog/more?page=2&id='.$firstBlog['id'].'&label='.$this->request->getQuery('category') ?>" class="next">1</a>
						<?php else: ?>
								<a href="<?= webURL.'blog/more?page=2' ?>" class="next">1</a>
						<?php endif; ?>
					</div>
				<?php endif; ?>
			</div>
			
			<div class="col col-xs-12 col-sm-6 col-md-4 col-lg-3 col1 right_wrapper">
				<div class="wall_wrapper">
				<h2 class="heading">Wallpapers</h2>
				<div class='postSliderWrapper'>
					<?php foreach($wallpapers as $value): ?>
						<?php if(!empty($value['image'])): ?> 
						<div class='post col-4 col-md-4 col-lg-12'>
							<div class='summary'>
								<div class="post-image">
									<div class="post-gallery-slide image">
										<a href="<?= imageURL.'blog/wallpaper/'.$value['image'] ?>" download="<?= imageURL.'blog/wallpaper/'.$value['image'] ?>" target="_blank" imageanchor="1" style="display:block;">
											<img border="0" src="<?= imageURL.'blog/wallpaper/225x178/'.$value['image'] ?>" alt="<?= $value['title'] ?>" title="" />
										</a>
									</div>
								</div>
								<div class='post-header'>													
									<h2><a href="javascript:void(0)"><?= $value['title'] ?></a></h2>
								</div>	
							</div>
						</div>
						<?php endif; ?>
					<?php endforeach; ?>
					</div>
				</div>
				<!-- <div class="about_auther"> -->
					<!-- <h2 class="heading">About us</h2> -->
				<!-- </div> -->
				<div class="followus">
					<h2 class="heading">Follow us</h2>
					<ul class="site-social-networks secondary-2-primary style-default show-title">
					<li><a target="_blank" href="<?= $configList['facebook_link'] ?>"><i class="fa fa-facebook"></i></a></li>
						<li><a target="_blank" href="<?= $configList['instagram_link'] ?>"><i class="fa fa-instagram"></i></a></li>
						<li><a target="_blank" href="<?= $configList['linkedin_link'] ?>"><i class="fa fa-linkedin"></i></a></li>
						<li><a target="_blank" href="<?= $configList['facebook_link'] ?>"><i class="fa fa-twitter"></i></a></li>
					</ul>
				</div>
			</div>
				</div>
			</div>
		</section>
	<div id="footerArea" class="uhf">
		<div id="footerRegion">
			<div id="footerUniversalFooter">
				<?= $this->element('footer') ?>
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

	<!-- <script src="js/vendorsapp.js"></script> <script src="js/app.js"></script> -->
	<!-- Supernova end --> <script> artemisRequire([['home', 'toggleModule']], function(toggle) { var contentSelectors = { "notSet": "#initial-state", "neo": "#neo-content", "green": "#green-content" }; var settings = { "toggleTimeoutInMs": 10000 }; toggle.init(contentSelectors, settings); toggle.on(toggle.EVENTS.MODE_CHANGED, function(mode) { if (mode === toggle.MODES.GREEN) { Supernova.init('windowProperty', 'green-content'); } }); }); </script> <script> artemisRequire([['home', 'homeModule']], function(customModule) { customModule && typeof customModule.init === 'function' && customModule.init(); }); </script>
	<!-- UHF Scripts -->
	<script src="<?= webURL ?>js/jquery-2.1.1.js"></script>
	<script src="<?= webURL ?>js/jquery-bkz.min.js"></script>
	<script src="<?= webURL ?>js/custome.js"></script> <!-- Resource jQuery -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.min.js"></script>
	<script src='<?= webURL.'js/script.js?v'.time() ?>' type='text/javascript'></script>
	<script type="text/javascript">
	(function(e){
		var bkz = $.bkz({
			container:  ".fp-loading-data",
			item:       "div.blogItem",
			pagination: "#pagination",
			next:       "a.next"
		});
		bkz.extension(new BKZSpinnerExtension());            // shows a spinner (a.k.a. loader)
		if($(window).width()>768){
			bkz.extension(new BKZTriggerExtension({offset: 1})); // shows a trigger after page 3
		} else {
			bkz.extension(new BKZTriggerExtension({offset: false})); // shows a trigger after page 3
		}			
		bkz.extension(new BKZNoneLeftExtension({
			text: 'Done'      // override text when no pages left
		}));
	})();
	if($(window).width()>1020){
					$('.postSliderWrapper').slick({
						autoplay: false,
						arrows: true,
						dots: false,
						slidesToShow: 3,
						slidesToScroll: 1,
						centerPadding: "0px",
						draggable: false,
						infinite: false,
						pauseOnHover: true,
						swipe: false,
						touchMove: false,
						vertical: true,
						speed: 1000,
						autoplaySpeed: 2000,
						useTransform: true,
						cssEase: 'cubic-bezier(0.645, 0.045, 0.355, 1.000)',
						adaptiveHeight: true,
								prevArrow: '<button type="button" class="slick-nav slick-prev"><i class="fa fa-angle-left"></i></button>',
								nextArrow: '<button type="button" class="slick-nav slick-next"><i class="fa fa-angle-right"></i></button>',
						});
				} else {
					$('.postSliderWrapper').slick({
						lazyLoad: 'ondemand',
								slidesToShow: 3,
								slidesToScroll: 1,
								autoplay: false,
						adaptiveHeight:true,
						speed: 1000,
						autoplaySpeed: 2000,
						useTransform: true,
						cssEase: 'cubic-bezier(0.645, 0.045, 0.355, 1.000)',
						adaptiveHeight: false,
								prevArrow: '<button type="button" class="slick-nav slick-prev"><i class="fa fa-angle-left"></i></button>',
								nextArrow: '<button type="button" class="slick-nav slick-next"><i class="fa fa-angle-right"></i></button>',
						responsive: 
						[
							{
								breakpoint: 1020,
								settings: {
								slidesToShow: 3
								}
							},
							{
								breakpoint: 800,
								settings: {
								slidesToShow: 2
								}
							},
							{
								breakpoint: 480,
								settings: {
								slidesToShow: 1
								}
							}
						]
						});
				}
	</script>
	</body>
	</html>
<?php endif; ?>