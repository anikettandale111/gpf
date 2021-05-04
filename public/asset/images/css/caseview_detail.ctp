<div class="case-detail-heading-wrap">
	<div class="intro">
  <?php $data = get_object_vars(json_decode($sliderData->English)); ?>
  <?php if($data['description1']):
          echo $data['description1'];
       endif; ?>
	</div>
</div>
<div class="section section-caseview-inner" id="case-content">
       <?php
      foreach($medias  as $key => $value):
        //if($key > 0):
          if($key == 0):
            ?>            
            <img src="<?= webURL.'image/caseview/'.$value['image'] ?>" alt=""> 
            <?php
			if($data['description2']):
				echo $data['description2'];
			endif;
          else:
            ?><img src="<?= webURL.'image/caseview/'.$value['image'] ?>" alt=""> <?php
          endif;
          
        //endif;
        
       endforeach; ?>
</div>