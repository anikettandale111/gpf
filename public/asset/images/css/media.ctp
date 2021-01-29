<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width initial-scale=1.0">
    <title><?= $configList['title'] ?></title>
    <!-- GLOBAL MAINLY STYLES-->
    <link href="<?= assets ?>vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="<?= assets ?>vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
    <link href="<?= assets ?>vendors/themify-icons/css/themify-icons.css" rel="stylesheet" />
    <!-- PLUGINS STYLES-->
    <!-- THEME STYLES-->
    <link href="<?= assets ?>css/main.min.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="<?= cssAdmin.'custom.css' ?>">
    <link rel="shortcut icon" href="<?= configURL.$configList['admin_logo'] ?>" type="image/png">
    <link rel="icon" href="<?= configURL.$configList['admin_logo'] ?>" type="image/png">
  <style>
    .image-show
    {
      width:100px;
    }
    .loader-gif
    {
      width:5%;
      height:5%;
      display: none;
    }
    .image-loader-gif
    {
      width:25px;
      height:25px;
      display: none;
    }
    .image-loader-gif-calculate
    {
      width:15%;
      height:20%;
      display: none;
    }
    .placeholder-img{
      max-width:50%;
    }
  </style>
<script>
  var webURL = '<?= webURL ?>';
  var imgURL = '<?= imgURL ?>';
  var assets = '<?= assets ?>';
</script>
</head>
<body class="hold-transition skin-blue sidebar-mini">
  <div class="lds-css ng-scope" style="display:none;">
<div class="lds-spinner" style="width:100%;height:100%"><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div>
</div>
<body class="fixed-navbar">
  <div class="page-wrapper">
    <?= $this->element('header') ?>
    <?= $this->element('menu') ?>
    <div class="content-wrapper">
      <div class="page-heading">
        <h1 class="page-title">Blog Media : <?= $slider['title'] ?></h1> 
      </div>
      <?= $this->Flash->render() ?>
      <div class="page-content fade-in-up" style="padding-top: 0px">
        <div class="ibox">
          <div class="ibox-head">
            <div class="ibox-title">Media List</div>
            <a href="javascript:void(0);" class="btn btn-default btn-sm reorder_link" id="save_reorder">Reorder List</a>
            <a href="javascript:void(0);" onclick="window.location.reload();" class="btn btn-default btn-sm reorder-cancel"  style="display: none;">Cancel</a>
            <a href="<?= webURL.'blog-articles' ?>" class="btn btn-primary"><i class="fa fa-angle-left" aria-hidden="true"></i> &nbsp; Back</a>
          </div>          
          <div class="ibox-body ">
          <?= $this->Form->create('', ['type' => 'file', "autocomplete" => "off", 'id' => 'slider-add-form']) ?>
		      <div class="action_wrapper" style="display:block;padding-bottom:8px;">
            <button type="button" class="btn btn-success addmoreproductimage"  onclick="addmoreproductimage(1)">Add image/video <i class="fa fa-plus"></i></button>
            <small style="color:red;"><em>*</em>Image size ( 1200*611px )</small>
            </div>
            <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>Sno</th>
                  <th>File</th>
                  <th>Preview</th>
                  <th>Alt</th>
                  <th>Title</th>
                  <th>Video</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody class="addmoreimage">
                <tr class="remove0">
                  <td>#</td>
                  <td>
                    <input type="file" accept="image/jpeg,image/jpg" onchange="showMyImage(this, '0', this.id)" id="inputimage" name="image[0]"/>
                  </td>
                  <td>
                    <img id="thumbnil0" src="<?= imageURL ?>img_placeholder.png" alt="image"  class="img img-thumbnail placeholder-img"/>
                    <span class="error-image" style="color:red;"></span>
                  </td>
                  <td>
                    <input type="text" class="form-control" name="alt[0]" placeholder="enter alt">
                  </td>
                  <td>
                    <input type="text" class="form-control" name="title[0]" placeholder="enter titile">
                  </td>
                  <td>
                    <input type="text" class="form-control" id="inputimage" name="video[0]" placeholder="enter video id"/>
                    <div id="inputimagediv"></div>
                  </td>
                  <td><button type="button" class="btn btn-danger pull-right btn-delete" title="Delete" data-toggle="tooltip" onclick="removeimage(0)">Remove</button></td>
                </tr>
              </tbody>
            </table>
            <div class="form-group has-error">
              <p style="padding:0px 0px 0px 10px;" class="help-block">Note: Max image size is 500KB.</p>
              <p style="padding:0px 0px 0px 10px;" class="help-block">Note: All youtube video only containg video id (after # in youtube video url).</p class="help-block">                
              <p style="padding:0px 0px 0px 10px;" class="help-block">Please enter all local video name . Ex : video.mp4, video.ogv, video.webm</p>
              <b><p style="padding:0px 0px 0px 10px;" class="help-block error-add-image-video" id="error-add-image-video"></p></b><br>
            </div>
            <div class="box-footer" style="border-bottom: 1px solid #f4f4f4;border-top:0px;padding:0 0 20px 0">
              <button type="submit" class="btn btn-primary slider-add-submit-button">Submit</button>
                
            </div>
            
          <?= $this->Form->end(); ?>
          <table id="example1" class="table table-bordered table-striped reorder-table">
            <thead>
              <tr>
                <th width="10px;">#</th>
                <th width="50px;">Image</th>
                <th>Alt</th>
                <th>Title</th>
                <th width="30%">Video</th>
                <th width="80">Status</th>
                <th width="150">Action</th>
              </tr>
            </thead>
            <tbody>
              <?php 
                if($recordlist > 0): $counter = 1;
                  foreach ($records as $key => $value) {
                    echo '<tr class="row-media row-'.$value->id.'">';
                    echo $this->Form->create('', ['type' => 'file', 'url' => ['controller' => 'blog-articles', 'action' => 'mediaedited']]);
                    echo '<td>#</td>';
                    echo '<td>';
                    if($value->image):
                      // echo $this->Html->image(uploadImageURL.'blog/'.$value->image, [
                      //     'class' => "img img-thumbnail image-show image-show-$value->id", "onclick" => "showsliderimage(".uploadImageURL.$value->image.")"
                      //     ]);
                      ?>
                        <a href="javascript:void(0)" onclick="showsliderimage('<?= uploadImageURL.'blog/'.$value->image ?>')">
                          <img src="<?= uploadImageURL.'blog/'.$value->image ?>" class="img img-thumbnail image-show" alt="">
                        </a>
                      <?php    
                    endif;
                      ?>
                      <input type="file" accept="image/jpeg,image/jpg" onchange="showMyImage(this, '<?= $value->id ?>', this.id)" id="inputimage" name="image" class="input-file input-file-<?= $value->id ?>"/>
                      <img id="thumbnil<?= $value->id ?>" style="width:90%; margin:10px;max-width:42px;"  src="<?= imageURL ?>img_placeholder.png" alt="image"  class="img img-responsive input-image input-image-<?= $value->id ?>"/>
                      <?php
                    echo '</td>';
                    echo '<td>';
                      if(isset($value->alt)):
                        echo '<span class="input-alt-text">'.$value->alt.'</span>';
                      endif;

                      ?>
                      <input type="hidden" value="<?= $value->id ?>" name="id" >
                      <input type="text" class="form-control input-alt alt-<?= $value->id ?>" placeholder="enter alt" name="alt" value="<?= $value->alt ?>"><?php
                    echo '</td>';
                    echo '<td>';
                      if(isset($value->title)):
                        echo '<span class="input-title-text">'.$value->title.'</span>';
                      endif;
                      ?>
                      <input type="text" class="form-control input-title title-<?= $value->id ?>" name="title" placeholder="enter title"value="<?= $value->title ?>">
                      <?php
                    echo '</td>';
                    echo '<td>';
                    if($value->video):
                      echo '<span class="input-video-text">';
                      //echo $value->video;
                      ?><iframe disabled=true id="<?= $value->video ?>"  height="62" src="https://www.youtube.com/embed/<?= $value->video ?>?controls=1&showinfo=0&autohide=0&wmode=transparent" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe><br><?php
                      /*?><a id="play-video-<?= $value->video ?>" class="play-video" href="#" onclick="videosize('<?= $value->video ?>')">Play Video</a><?php
                      ?><a id="stop-video-<?= $value->video ?>" class="stop-video" href="#" onclick="videohide('<?= $value->video ?>')">Stop Video</a><?php*/
                      echo '</span>';
                    else:
                      echo '<span class="input-video-text">---</span>';
                    endif;
                    ?>
                      <input type="text" class="form-control input-video video-<?= $value->id ?>" name="video" placeholder="enter video url" value="<?= $value->video ?>">
                      <?php
                    echo '</td>';                        
                    echo '<td>';
                      if($value->publish == 1):
                          echo '<a id="publish-'.$value->id.'" href="javascript:void(0)" onclick="changestatus('.$value->id.', 0)" class="label label-success" data-toggle="tooltip" title="" data-original-title="Active">Active</a>';
                        else:
                          echo '<a id="publish-'.$value->id.'" href="javascript:void(0)" onclick="changestatus('.$value->id.', 1)" class="label label-danger" data-toggle="tooltip" title="" data-original-title="De-Active">De-Active</a>';
                        endif;
                    echo '</td>';
                    echo '<td>';
                      ?>
                      <a id="" class="btn btn-edit btn-default btn-sm media-edit media-edit-<?= $value->id ?>" href="javascript:void(0)" data-placement="top" data-toggle="tooltip" title="Edit" onclick="mediaedit('<?= $value->id ?>')">
                          <i class="fa  fa-edit"></i>
                        </a> 
                        <button type="submit" class="btn btn-sm btn-save media-save media-save-<?= $value->id ?>" data-placement="top" data-toggle="tooltip"  data-original-title="Save" >
                          <i class="fa  fa-save"></i>
                        </button>
                        <!-- <a id="" class="btn btn-save btn-warning btn-sm media-save media-save-<?= $value->id ?>" href="javascript:void(0)" data-placement="top" data-toggle="tooltip" title="Save" onclick="mediaeditsave(<?= $value->id ?>)">
                          <i class="fa  fa-save"></i>
                        </a> -->
                        <a id="" class="btn btn-cancel btn-warning btn-sm media-cancel media-cancel-<?= $value->id ?>" href="javascript:void(0)" data-placement="top" data-toggle="tooltip" title="Cancel" onclick="mediacancel(<?= $value->id ?>)">
                          <i class="fa  fa-unlink "></i>
                        </a>
                        
                      <?php
                      echo '<a href="javascript:void(0)" class="btn btn-danger btn-sm btn-delete" data-placement="top" data-toggle="tooltip" title="Delete" onclick="deleterecord('.$value->id.')"><i class="fa fa-trash"></i></a>';
                    echo '</td>';
                    echo $this->Form->end();
                    echo '<tr>';
                  }
                else:
                  echo '<tr><td colspan="8">No data found</td></tr>';
                endif;
              ?>
            </tbody>
          </table>
          <ul class="reorder_ul reorder-photos-list pull-left list-group reorder-category" style="display: none;">
              <?php if($records->count()):                
                  foreach ($records as $value): 
                      ?>
                      <li id="image_li_<?= $value->id ?>" class="ui-sortable-handle image_link list-group-item">
                        <?php
                          if($value->image):
                              echo $this->Html->image(uploadImageURL.'blog/'.$value->image, [
                                'class' => 'img img-thumbnail image-show'
                                ]);
                          elseif($value->video):
                            echo $value->video;
                          endif;
                        ?>
                         <?= h($value->name) ?> 
                      </li>
                  <?php                    
                  endforeach; ?>
              <?php endif; ?>
          </ul>
          </div>
        </div>
      </div>
      <?= $this->element('footer') ?>
    </div>
  </div>
  <div class="sidenav-backdrop backdrop"></div>
  <div class="preloader-backdrop">
      <div class="page-preloader">Loading</div>
  </div>
  <!-- modal start add -->
  <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
        <img style="cursor: pointer;" id="thumbnildisplay"   src="" alt="image"  class="img img-thumbnail"/>
    </div>
  </div>
</div>
  <!-- modal end finish -->
</div>
<script src="<?= assets ?>vendors/jquery/dist/jquery.min.js" type="text/javascript"></script>
<script src="<?= assets ?>vendors/popper.js/dist/umd/popper.min.js" type="text/javascript"></script>
<script src="<?= assets ?>vendors/bootstrap/dist/js/bootstrap.min.js" type="text/javascript"></script>
<script src="<?= assets ?>vendors/metisMenu/dist/metisMenu.min.js" type="text/javascript"></script>
<script src="<?= assets ?>vendors/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<script src="<?= assets ?>js/app.min.js" type="text/javascript"></script>
<!-- <script src="<?= webURL ?>js/dp.validate.js"></script> -->
<script src="<?= webURL ?>js/jquery-ui.js"></script>
<script type="text/javascript">
$(document).ready(function(){
  $('input').on('focus', function(){
    $('input').css('width', '100%');
    $(this).css('width', '250px');
  })
  $('.media-loader-img').css('display', 'none');
  $('.media-save').css('display', 'none');
  $('.input-alt').css('display', 'none');
  $('.input-file').css('display', 'none');
  $('.input-image').css('display', 'none');
  $('.input-title').css('display', 'none');
  $('.input-text').css('display', 'none');
  $('.input-url').css('display', 'none');
  $('.input-link_target').css('display', 'none');
  $('.input-link_text').css('display', 'none');
  $('.input-video').css('display', 'none');
  $('.media-cancel').css('display', 'none');


    $('.reorder_link').on('click',function(){
        $(".reorder-table").css("display", "none");
        $(".reorder-category").css("display", "inline");
        $(".reorder-cancel").css("display", "inline");
        $("ul.reorder-photos-list").sortable({ tolerance: 'pointer' });
        $('.reorder_link').html('save reordering');
        $('.reorder_link').attr("id","save_reorder");
        $('#reorder-helper').slideDown('slow');
        //$('.image_link').attr("href","javascript:void(0);");
        $('.image_link').css("cursor","all-scroll");
        
        $("#save_reorder").click(function( e ){
            if( !$("#save_reorder i").length ){
                $(this).html('').prepend('<img style="height:18px;" src="'+webURL+'img/refresh-animated.gif"/>');
                $("ul.reorder-photos-list").sortable('destroy');
                $("#reorder-helper").html( "Reordering Photos - This could take a moment. Please don't navigate away from this page." ).removeClass('light_box').addClass('notice notice_error');
    
                var h = [];
                $("ul.reorder-photos-list li").each(function() {  h.push($(this).attr('id').substr(9));  });
                
                $.ajax({
                    type: "POST",
                    url: webURL+"blog-articles/reorderListSubcategory",
                    data: {ids: " " + h + "", '_csrfToken' : '<?= $this->request->param("_csrfToken") ?>'},
                    success: function(){
                        window.location.reload();
                    }
                }); 
                return false;
            }   
            e.preventDefault();     
        });
    });
});
  $(function () {
      
      $('#datepicker').datepicker({
        autoclose: true,
        format: 'yyyy-mm-dd'//line 1701
      })
  })
</script>

<script>
var webURL = '<?= webURL ?>';
$(document).ready(function(){  
  function isEmail(email) {
    var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    return regex.test(email);
  }
  $('#allPressSelect').click(function(){
      if($(this).prop("checked") == true){
        $(".input-cb").prop('checked', true);
      }
      else if($(this).prop("checked") == false){
        $(".input-cb").prop('checked', false);
      }
  });  
});
function addmoreproductimage(imagecount)
{
	
	var html = '';
	html += '<tr class="remove'+imagecount+'">';
  html += '  <td>#</td>';
  html += '  <td>';
  html += '    <input type="file" accept="image/*"  onchange="showMyImage(this, '+imagecount+', this.id)" id="inputimage'+imagecount+'" name="image['+imagecount+']"/>';
  html += '  </td>';
  html += '  <td><img id="thumbnil'+imagecount+'"   src="'+webURL+'img/img_placeholder.png" alt="image" class="img img-thumbnail placeholder-img"/></td>';
  html += '  <td>';
  html += '	<input type="text" class="form-control" name="alt['+imagecount+']" placeholder="enter alt">';
  html += '  </td>';
  html += '  <td>';
  html += '	<input type="text" class="form-control" name="title['+imagecount+']" placeholder="enter title">';
  html += '  </td>'; 
  
  html += '  <td>';
  html += '    <input class="form-control" placeholder="enter video id" type="text" id="inputvideo'+imagecount+'"  name="video['+imagecount+']"/>';
  html += '  </td>';
  html += '  <td><button type="button" class="btn btn-danger pull-right btn-delete" title="Delete" data-toggle="tooltip" onclick="removeimage('+imagecount+')">Remove</button></td>';
  html += '</tr>';
	$(".addmoreimage").append(html);
	imagecount = Number(imagecount)+1;
	$(".addmoreproductimage").attr('onclick', 'addmoreproductimage('+imagecount+')');
}
function showmodal()
{
  $("#myModal").modal("show");
}
function mediaeditsave(id)
  {
    var alt = $(".alt-"+id).val();
    var title = $(".title-"+id).val();
    var url = $(".url-"+id).val(); //alert(url); return false;
    var link_target = $(".link_target-"+id).val();
    var link_text = $(".link_text-"+id).val();
    var video = $(".video-"+id).val();
    var urls = webURL+'blog-articles/mediaeditsave';
    $.ajax({
         type: "POST",
         dataType: "json",
         url: urls,
         data: {id:id, alt:alt, title:title, link_url:url, link_target:link_target, link_text:link_text, video:video, '_csrfToken' : '<?= $this->request->param("_csrfToken") ?>'},  
         success: function(msg) {
          if(msg['status'] == 'success'){
            location.reload();
          }
          if(msg['status'] == 'unsuccess'){
            alert('Please try again!');
          }
         }
      });
  }
function mediaedit(id)
  {
    $(".image-show").show();
    $(".input-image").hide();
    $(".row-media span").show();
    $(".row-media input").hide();
    $(".row-media select").css('display', 'none');
    $(".media-save").css('display', 'none');
    $(".media-edit").css('display', 'inline');
    $('.media-cancel').css('display', 'none');

    
    $(".image-show-"+id).hide();
    $(".input-image-"+id).show();
    $(".row-"+id+" span").hide();
    $(".row-"+id+" input").show();
    $(".row-"+id+" select").css("display", "inline");
    $(".media-save-"+id).css('display', 'inline');
    $(".media-edit-"+id).css('display', 'none');
    $('.media-cancel-'+id).css('display', 'inline');
  }
function mediacancel(id)
  {
    $(".row-"+id+" span").show();
    $(".row-"+id+" input").hide();
    $(".row-"+id+" img").hide();
    $(".row-"+id+" select").css("display", "none");
    $(".row-"+id+" .image-show").css("display", "block");
    $(".media-save-"+id).css('display', 'none');
    $(".media-edit-"+id).css('display', 'inline');
    $('.media-cancel-'+id).css('display', 'none');
  }
 function getpagemetarelation(sitepageid){
  $(".page-error").text('');
    var url = webURL+'meta-data/getpagemetarelation';
    $.ajax({
         type: "POST",
         dataType: "json",
         url: url,
         data: {page_id:sitepageid, '_csrfToken' : '<?= $this->request->param("_csrfToken") ?>'},  
         success: function(msg) {
          if(msg['status'] == 'success'){
            $(".page-error").text('');
            $(".page-error").text('Meta-data for this page already exist!');
          }
         }
      });
 }

function showpassword(){
  $("#password").attr("type","text");
  $(".showpassword").css("display", "none");
  $(".hidepassword").css("display", "inline");
}
function hidepassword()
{
 $("#password").attr("type","password"); 
  $(".hidepassword").css("display", "none");
 $(".showpassword").css("display", "inline");
}
function makeid(length) {
  var text = "";
  var possible = "!@#$%^&*()_+ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";

  for (var i = 0; i < length; i++)
    text += possible.charAt(Math.floor(Math.random() * possible.length));

  $("#password").val(text);
}
  function removeuploadeimage()
  {
   $("#uploadeimage").remove();
  }
function changestatus(id, publish){
  var url = webURL+'crone/changeRecordStatus';
  if(confirm('Do you want to chage status?')){
     $.ajax({
         type: "POST",
         dataType: "json",
         url: url,
         data: {tbl:'BlogMedias', recordid:id, publish:publish, '_csrfToken' : '<?= $this->request->param("_csrfToken") ?>'},  
         success: function(msg) {
          if(msg['status'] == 'success'){
            location.reload();
          }
          if(msg['status'] == 'unsuccess'){
            alert('Please try again!');
          }
         }
      });
   } 
}
function deleterecord(id){
  var url = webURL+'crone/trashRecord';
  if(confirm('Do you want to delete this record?')){
     $.ajax({
         type: "POST",
         dataType: "json",
         url: url,
         data: {tbl:'BlogMedias', id:id, '_csrfToken' : '<?= $this->request->param("_csrfToken") ?>'},  
         success: function(msg) {
          if(msg['status'] == 'success'){
            location.reload();
          }
          if(msg['status'] == 'unsuccess'){
            alert('Please try again!');
          }
         }
      });
   } 
}
function showsliderimage(image)
{
  $('#thumbnildisplay').attr('src',image);
  $('#myModal').modal('show');
}
</script>
<script>
    function removeimage(imagecount)
    {
      $(".remove"+imagecount).remove();
    }
    function showMyImage(fileInput, thumbnil, inputid) {
        var files = fileInput.files;
        for (var i = 0; i < files.length; i++) {           
            var file = files[i];
            var imageType = /image.*/;     
            if (!file.type.match(imageType)) {
                continue;
            }           
            var img=document.getElementById('thumbnil'+thumbnil);            
            img.file = file;    
            var reader = new FileReader();
            reader.readAsDataURL(files[0]);
            fileSize = Math.round(files[0].size/1024);
            if(fileSize > 500){              
              $("#"+inputid).val('');
              img.src = webURL+'img/img_placeholder.png';
              alert('Maximum file size is 500KB.'); return false;
            }
            /**/
            // reader.onload = function (e) {
            //   var image = new Image();
            //   image.src = e.target.result;
            //   image.onload = function () {
            //       var height = this.height;
            //       var width = this.width;
            //       if(Number(width) !== 1200){
            //          $("#"+inputid).val('');
            //          img.src = webURL+'img/img_placeholder.png';
            //          alert('Image dimensions must be 1200*611px!'); return false;
            //       }
            //       if(Number(height) !== 611){
            //          $("#"+inputid).val('');
            //          img.src = webURL+'img/img_placeholder.png';
            //          alert('Image dimensions must be 1200*611px!'); return false;
            //       }
            //   }
            //  }
            /**/
            var readers = new FileReader();
            readers.readAsDataURL(files[0]);
            
            readers.onload = (function(aImg) { 
                return function(e) { 
                    aImg.src = e.target.result; 
                }; 
            })(img);
            readers.readAsDataURL(file);
        }  

    }
    function getlastentry(vehiclename)
    {
      if(vehiclename != 'select'){
        var url = webURL+'product/getlastentry';
        $.ajax({
               type: "POST",
               dataType: "json",
               url: url,
               data: {vehiclename: vehiclename, '_csrfToken' : '<?= $this->request->param("_csrfToken") ?>'},  
               success: function(msg) {
                 if(msg['status'] == 'success') {
                   $("#tags").val('');

                   $(".unitnospan").text(msg['unit_no']);
                 }
                 if(msg['status'] == 'unsuccess') {
                   alert('Please try again!');
                 }
               }
            });
      }
    }
</script>


</body>
</html>
