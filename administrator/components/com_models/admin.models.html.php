<?php

 
defined( '_JEXEC' ) or die( 'Restricted access' );



class HTML_models
{
	
	/**
	 * Interface da edi��o de uma modelo no administrador 
	 **/
  function editModel( $row, $lists, $option )
  {
   
    ?>
    <form action="index.php" method="post" 
                 name="adminForm" id="adminForm">
      <fieldset class="adminform">
        <legend>Details</legend>
        <table class="admintable">
          
         <tr>
          <td width="100" align="right" class="key">
            Categoria:
          </td>
          <td>
         <?php echo $lists['models'];?>
          </td>
        </tr>
        
        
        <tr>
          <td width="100" align="right" class="key">
            Name:
          </td>
          <td>
            <input class="text_area" type="text" name="name" 
               id="name" size="50" maxlength="250" 
               value="<?php echo $row->name;?>" />
          </td>
       </tr>
        <tr>
          <td width="100" align="right" class="key">
            Gender:
          </td>
          <td>
            <?php
            echo $lists['gender'];
            ?>
          </td>
        </tr>
        <tr>
          <td width="100" align="right" class="key">
            Age:
          </td>
          <td>
            <input class="text_area" type="text" name="age" 
               id="size" size="3" maxlength="3" 
               value="<?php echo $row->age;?>" />
          </td>
        </tr>
      
              <tr>
          <td width="100" align="right" class="key">
            Size:
          </td>
          <td>
            <input class="text_area" type="text" name="size" 
               id="size" size="3" maxlength="3" 
               value="<?php echo $row->size;?>" />
          </td>
        </tr>
        <tr>
          <td width="100" align="right" class="key">
            Height:
          </td>
          <td>
            <input class="text_area" type="text" name="height" 
               id="height" size="3" maxlength="3" 
               value="<?php echo $row->height;?>" />
          </td>
        </tr>
        <tr>
          <td width="100" align="right" class="key">
            Weight:
          </td>
          <td>
            <input class="text_area" type="text" name="weight" 
               id="weight" size="3" maxlength="3" 
               value="<?php echo $row->weight;?>" />
          </td>
        </tr>
        <tr>
          <td width="100" align="right" class="key">
            Bust:
          </td>
          <td>
            <input class="text_area" type="text" name="bust" 
               id="bust" size="3" maxlength="3" 
               value="<?php echo $row->bust;?>" />
          </td>
        </tr>
        <tr>
          <td width="100" align="right" class="key">
            Waist:
          </td>
          <td>
            <input class="text_area" type="text" name="waist" 
               id="waist" size="3" maxlength="3" 
               value="<?php echo $row->waist;?>" />
          </td>
        </tr>
        <tr>
          <td width="100" align="right" class="key">
            Hips:
          </td>
          <td>
            <input class="text_area" type="text" name="hips" 
               id="hips" size="3" maxlength="3" 
               value="<?php echo $row->hips;?>" />
          </td>
        </tr>
        <tr>
          <td width="100" align="right" class="key">
            Shoes:
          </td>
          <td>
            <input class="text_area" type="text" name="shoes" 
               id="shoes" size="3" maxlength="3" 
               value="<?php echo $row->shoes;?>" />
          </td>
        </tr>
        <tr>
          <td width="100" align="right" class="key">
            Eyes:
          </td>
          <td>
            <input class="text_area" type="text" name="eyes" 
              id="eyes" size="20" maxlength="20"
               value="<?php echo $row->eyes;?>" />
          </td>
        </tr>
        <tr>
          <td width="100" align="right" class="key">
            Hair:
          </td>
          <td>
            <input class="text_area" type="text" name="hair" 
               id="hair" size="20" maxlength="20"
               value="<?php echo $row->hair;?>" />
          </td>
        </tr>
        <tr>
          <td width="100" align="right" class="key">
            Published:
          </td>
          <td>
            <?php
            echo $lists['published'];
            ?>
          </td>
        </tr>
          <tr>
           <td width="100" align="right" class="key">
            
          </td>
          
          <td  >
             
         
          <a href="<?php
                    echo $lists['editPhotos'];
                ?>" ><h2>Edit Model Photos</h2></a></td>
          <td>
 
        </tr>
        </table>
      </fieldset>
      <input type="hidden" name="id" 
        value="<?php echo $row->id; ?>" />
      <input type="hidden" name="option" 
        value="<?php echo $option;?>" />
      <input type="hidden" name="task" 
        value="" />
    </form>
    <?php 
  }
  
  /**
	 * Interface da lista de modelos no administrador 
	 **/
  
function showModels( $option, &$rows, &$pageNav )
{
  ?>
  <form action="index.php" method="post" name="adminForm">
  <table class="adminlist">
    <thead>
      <tr>
        <th width="20">
          <input type="checkbox" name="toggle" 
               value="" onclick="checkAll(<?php echo 
               count( $rows ); ?>);" />
        </th>
        <th class="title">Name</th>
        <th width="8%">Age</th>
        <th width="8%">Size</th>
        <th width="8%">Height</th>
        <th width="8%" nowrap="nowrap">Published</th>
      </tr>
    </thead>
    <?php
    jimport('joomla.filter.output');
    
    $k = 0;
    for ($i=0, $n=count( $rows ); $i < $n; $i++) 
    {
      $row = &$rows[$i];
      $checked = JHTML::_('grid.id', $i, $row->id );
      $published = JHTML::_('grid.published', $row, $i );
      
      $link = JFilterOutput::ampReplace( 'index.php?option='.$option.'&task=edit&cid[]='. $row->id );
      ?>
      <tr class="<?php echo "row$k"; ?>" >
        <td>
          <?php echo $checked; ?>
        </td>
        <td>
        <a href="<?php echo $link; ?>">
          <?php echo $row->name; ?></a>
        </td>
        <td align="center">
          <?php echo $row->age; ?>
        </td>
        <td align="center">
          <?php echo $row->size; ?>
        </td>
        <td align="center">
          <?php echo $row->height; ?>
        </td>
        <td align="center">
          <?php echo $published;?>
        </td>
      </tr>
      <?php
      $k = 1 - $k;
    }
    ?>
    <tfoot>
  <td colspan="7"><?php echo $pageNav->getListFooter(); ?></td>
</tfoot>
  </table>
  <input type="hidden" name="option" 
                    value="<?php echo $option;?>" />
  <input type="hidden" name="task" value="" />
  <input type="hidden" name="boxchecked" value="0" />
  </form>
  <?php
}
  

function editModelPhotos ( $url, $files, $option )
  {
  	
  
  foreach($files as $photo){
    ?>

    <img class="modelPhotosThumb" src="<?php echo $url.$photo;?>" />
   
    <?php
   }
  }
  
function addPhotos( $id, $option )
  {

    ?>

    <div id="swfuploader">
        <form id="form1" action="index.php" method="post" enctype="multipart/form-data">
        <fieldset class="adminform">
 
                        <div class="fieldset flash" id="fsUploadProgress">
                        <span class="legend">Upload Queue</span>
                        </div>
                <div id="divStatus">0 Files Uploaded</div>
                        <div>
                                <span id="spanButtonPlaceHolder"></span>
                                <input id="btnCancel" type="button" value="Cancel All Uploads" onclick="swfu.cancelQueue();" disabled="disabled" style="margin-left: 2px; font-size: 8pt; height: 29px;" />
 
                        </div>
        </fieldset>
        </form>
</div>
    <?php
  }
/**************Models Categories**********************/

  /**
	 * Interface da lista categorias de modelos no administrador 
	 **/
  
function showCategories( $option, &$rows, &$pageNav )
{
  ?>
  <form action="index.php" method="post" name="adminForm">
  <table class="adminlist">
    <thead>
      <tr>
        <th width="20">
          <input type="checkbox" name="toggle" 
               value="" onclick="checkAll(<?php echo 
               count( $rows ); ?>);" />
        </th>
        <th class="title">Name</th>
      </tr>
    </thead>
    <?php
    jimport('joomla.filter.output');
    
    $k = 0;
    for ($i=0, $n=count( $rows ); $i < $n; $i++) 
    {
      $row = &$rows[$i];
      $checked = JHTML::_('grid.id', $i, $row->id );
     // $published = JHTML::_('grid.published', $row, $i );
      
      $link = JFilterOutput::ampReplace( 'index.php?option='.$option.'&task=showModels&cid[]='. $row->id );
      ?>
      <tr class="<?php echo "row$k"; ?>" >
        <td>
          <?php echo $checked; ?>
        </td>
        <td>
        <a href="<?php echo $link; ?>">
          <?php echo $row->name; ?></a>
        </td>
       
      <?php
      $k = 1 - $k;
    }
    ?>
    <tfoot>
  <td colspan="7"><?php echo $pageNav->getListFooter(); ?></td>
</tfoot>
  </table>
  <input type="hidden" name="option" 
                    value="<?php echo $option;?>" />
  <input type="hidden" name="task" value="" />
  <input type="hidden" name="boxchecked" value="0" />
  </form>
  <?php
}
  
  /**
	 * Interface da ediçao de uma categoria de modelos no administrador 
	 **/
  function editModelsCategory( $row, $option )
  {
   
    ?>
    <form action="index.php" method="post" 
                 name="adminForm" id="adminForm">
      <fieldset class="adminform">
        <legend>Details</legend>
        <table class="admintable">
        <tr>
          <td width="100" align="right" class="key">
            Name:
          </td>
          <td>
            <input class="text_area" type="text" name="name" 
               id="name" size="50" maxlength="250" 
               value="<?php echo $row->name;?>" />
          </td>
        </tr>
  
        </table>
      </fieldset>
      <input type="hidden" name="id" 
        value="<?php echo $row->id; ?>" />
      <input type="hidden" name="option" 
        value="<?php echo $option;?>" />
      <input type="hidden" name="task" 
        value="" />
    </form>
    <?php
  }
  
  
 
}
?>