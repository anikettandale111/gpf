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
<link rel="stylesheet" href="<?= webURL ?>css/main-v4.css">
<link rel="stylesheet" href="<?= webURL ?>css/vendorsapp.css">
<link rel="stylesheet" href="<?= webURL ?>css/app.css">
<!-- UHF Styles -->
<link rel="stylesheet" href="<?= webURL ?>css/65-e1a08b.css" type="text/css" media="all">
<link rel="stylesheet" href="<?= webURL ?>css/mscc-0.css" type="text/css">
<!-- [STYLES][END] -->
<!-- 3d-party libs -->
<script src="<?= webURL ?>js/jquery-3.js"></script>
<script src="<?= webURL ?>js/bundle.js"></script>
<script src="<?= webURL ?>js/modernizr.js"></script>
<!-- jQuery library (served from Google)
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script> -->
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script>
	$(document).ready(function(){
		$(".phone").keypress(function (e) {
		if (e.which != 8 && e.which != 0 && e.which != 43 && (e.which < 48 || e.which > 57)) {
			   return false;
		}
	});
	$(".name").keypress(function (e) {
		if (e.which != 8 && e.which != 0 && e.which != 32 && (e.which > 90 || e.which < 65) && (e.which > 122 || e.which < 97)) {
			return false;
		}});
	});
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<!-- bxSlider Javascript file -->
<script src="<?= webURL ?>js/jquery.bxslider.min.js"></script>
<script src="<?= webURL ?>js/wow.min.js"></script>
<!-- bxSlider CSS file -->
<link href="<?= webURL ?>css/jquery.bxslider.css" rel="stylesheet" />
<link href="<?= webURL ?>css/animate.css" rel="stylesheet" />
<!-- [start] LazyLoad -->
<script>if (window.UrrzaaLazyGravity && typeof window.UrrzaaLazyGravity.init === "function") { window.UrrzaaLazyGravity.init([".lazyLoad", ".promo-image"]); } </script>
<style>
.lazyLoad, .promo-image {
	background-image: url(data:image/gif;base64,R0lGODlhAQABAAAAACwAAAAAAQABAAA=) !important;
}
</style>
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
		<?php if($block->name == 'contact top slider'): ?>
			<?php $image = $banner['thumbnail'];  ?>
			<?php $data = get_object_vars(json_decode($banner['English'])); ?>
			<div id="primaryR1" class="pad-hero" data-grid="container" data-region-key="primaryr1">
			  <div id="coreui-hero-7enwkdp">        
			    <div class="m-hero ">
			      <div>
				      <section role="presentation" class="m-hero-item f-medium f-x-left f-y-center context-game theme-dark f-mask-left f-short">
				        <picture>
				          <source srcset="<?= webURL.'image/contact/banner/500/'.$image ?>" media="(max-width:539px)">
									<source srcset="<?= webURL.'image/contact/banner/700/'.$image ?>" media="(min-width:540px) and (max-width:767px)">
									<source srcset="<?= webURL.'image/contact/banner/1000/'.$image ?>" media="(min-width:768px) and (max-width:1083px)">
									<source srcset="<?= webURL.'image/contact/banner/1200/'.$image ?>" media="(min-width:1084px) and (max-width:1399px)">
									<source srcset="<?= webURL.'image/contact/banner/1600/'.$image ?>">
									<img class="lazypreload" alt="<?= $banner['medias'][0]['alt'] ?>." title="<?= $banner['medias'][0]['title'] ?>" src="<?= webURL.'image/contact/banner/500/'.$image ?>">
				        </picture>
				      	<div>
				          <div>
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
		<?php elseif($block->name == 'contact us form'): ?>
			<section id="contact" class="section services-area sectionStandard horizontalAlignCenter layoutMarginBottom1 layoutMarginTop1 pt-5 mt-5">
				<div class="content standardWidth">
					<div class="text-vertical-center-wrapper">
						<h1 class="fontSizeH1">Contact Us</h1>
					</div>
					<div class="row contact-containt">
						<div class="col-md-col-12 col-sm-12 col-md-12">			  
						  <div class="contact-form">
							  <form class="form" id="contactForm" method="post" action="javascript:void(0)">
								  <div class="messages"></div>
								  <div class="form-controls">
								    <div class="alert alert-success alert-dismissible message-success" style="display: none;" role="alert"> 
								    <button class="close" data-dismiss="alert">X</button>Your inquiry has been submited successfully, We will contact you very soon.
								    </div>
								    
								    <div class="alert alert-danger alert-dismissible message-error" style="display: none;" role="alert"> 
								    <button class="close" data-dismiss="alert">X</button>Please try again!
								    </div>
									  <div class="row"> 
										  <div class="col-12 col-xs-12 col-sm-12 col-md-6">
											  <div class="form-group">
												  <input id="fname" class="form-control name" type="text" name="fname" placeholder="First Name" required="required" data-error="First Name is required.">
											  </div>
										  </div>
										  <div class="col-12 col-xs-12 col-sm-12 col-md-6">
											  <div class="form-group">
												  <input id="lname" class="form-control name" type="text" name="lname" placeholder="Last Name" required="required" data-error="Last Name is required.">
											  </div>
										  </div>
										  <div class="col-12 col-xs-12 col-sm-12 col-md-6">
											  <div class="form-group">
												  <input id="email" class="form-control email" type="email" name="email" placeholder="Email" required="required" data-error="email is required.">
											  </div>
										  </div>
										  <div class="col-12 col-xs-12 col-sm-12 col-md-6">
											  <div class="form-group">
												  <input id="phone" class="form-control phone" type="text" name="phone" placeholder="Telephone/Mobile Number" required="required" data-error="Telephone is required.">
											  </div>
										  </div>
										  <div class="col-12 col-xs-12 col-sm-12 col-md-12">
											  <div class="form-group has-error has-danger">
												  <textarea id="message" class="form-control" name="message" placeholder="Message" rows="6" required="required" data-error="Message."></textarea>
											  </div>
										  </div>
										  <div class="col-12 col-xs-12 col-sm-12 col-md-12">
											  <input type="submit" value="Submit" class="promo-link submit_btn" id="primarybtn">
										  </div>
									  </div>
								  </div>
							  </form>    
						  </div>
						</div>			
					</div>
				</div>
			</section>
		<?php elseif($block->name == 'contact details'): ?>
			<div class="address_wrapper">
				<div class="content standardWidth">
					<div class="row contact-containt">
						<?php foreach ($contactDetails as $key => $contactDetail) { ?>
							<?php $data = get_object_vars(json_decode($contactDetail['English'])); ?>
						  <div class="address col-12 col-sm-12 col-md-4">		
							  <p class="mb-30px"><i class="color-black gray-border text-center <?= $data['link_text_a'] ?>"></i><?= $data['link_text_b'] ?></p>
						  </div>							
						<?php } ?>
						  <!-- <div class="address col-12 col-sm-12 col-md-4">					
						  							  <p class="mb-30px"><i class="color-black gray-border text-center icon-phone"></i>+971-55-341 4534</p>
						  </div>
						  <div class="address col-12 col-sm-12 col-md-4">	
						  							  <p class="mb-30px"><i class="color-black gray-border text-center icon-envelope"></i>urrzacs@gmail.com</p>
						  </div> -->
					</div>  
				</div>  
			</div>
		<?php elseif($block->name == 'contact map'): ?>
			<div class="map" id="googleMap"><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3613.299237676755!2d55.365214415428305!3d25.091729983945314!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMjXCsDA1JzMwLjIiTiA1NcKwMjInMDIuNyJF!5e0!3m2!1sen!2sin!4v1591358722839!5m2!1sen!2sin" width="100%" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe></div>
		<?php endif; ?>
  <?php } ?>
<div id="footerArea" class="uhf">
  <div id="footerRegion">
    <div id="footerUniversalFooter">
      <?= $this->element('footer') ?>
    </div>
  </div>
  <div class="footer_brdr"></div>
</div>

<div class="overlayWrapper fade">
  <div class="overlay">
    <button type="button" class="closeButton" aria-label="Exit overlay" data-button-type="overlay-close-button" data-bi-name="exit-overlay" data-bi-id="" data-bi-area="Overlay"><span class="closeCircle"></span><span class="closeIcon"></span></button>
    <div class="overlayContainer"></div>
  </div>
</div>
<div class="overlayBackground" style="height: 4336px;"></div>

<script src="j<?= webURL ?>s/vendorsapp.js"></script> <script src="<?= webURL ?>js/app.js"></script>
<!-- Supernova end -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
<script>
	var webURL = '<?= webURL ?>';

(function(e){
	$(".panel .btn.primaryCta").click(function(){
		var formRelation = $(this).attr("data-title");
		//alert(formRelation)
		$("#quote_type").html(formRelation);
		$("#quoteFor").val(formRelation);
	});
	$("#contactForm").validate({
		rules: {
			email: {
				required: true,
				email: true
			},
			fname: "required",
			lname: "required",
			phone: "required",
			message: "required",
			company: "required"
		},
		messages: {
			email: {
				required: "What's your email?",
				email: "Please, enter a valid email"
			},
			fname: "What's your First Name",
			lname: "What's your Last Name",
			phone: "Please enter your phone",
			message: "Please enter your message",
			company: "Please enter Company name"
		},
		success: function(element) {
			//element.text('').addClass('valid')
		},
		submitHandler : function () {
            $(".submit_btn").attr("disabled", true);
            var fname = $("#fname").val();
            var lname = $("#lname").val();
            var email = $("#email").val();
            var phone = $("#phone").val();
            var message = $("#message").val();
            $.ajax({
                      type: "POST",
                      dataType: "json",             
                      url: webURL+"home/contactSave", 
                      data: {fname :fname, lname:lname, email:email, phone:phone, message:message, '_csrfToken' : '<?= $this->request->getParam('_csrfToken') ?>' },
                      success: function(msg) {
                          $(".submit_btn").removeAttr("disabled");
                          if(msg['status'] == 'success'){
                            $(".message-success").css('display', 'block');
                            $("#fname").val('');
                            $("#lname").val('');
                            $("#email").val('');
                            $("#phone").val('');
                            $("#message").val('');
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

  
	
})();
</script>
<!--script src="https://maps.googleapis.com/maps/api/js?key=<?= $configList['google_map_key'] ?>"></script>
<script src="<?= webURL ?>js/map.js"></script-->
	<link rel="stylesheet" href="<?= webURL ?>css/custom.css">
</body>
</html>