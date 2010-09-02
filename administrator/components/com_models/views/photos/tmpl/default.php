 

 
 
 <?php
 
 
 foreach($this->files as $photo){
 	     dump($photo);
    ?>


    <img class="modelPhotosThumb" src="<?php echo ''.$this->url.$photo;?>" alt="<?php ///echo $this->$url.$photo;?>" />
   
    <?php
   
  }
  
?>