  
<?php defined('_JEXEC') or die('Restricted access'); 

$row = &$this->items;
$lists = $this->lists;
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
             
         
         <h2> <a href="<?php
                    echo $lists['editPhotos'];
                ?>" >Edit Model Photos</a></h2></td>
          <td>
 
        </tr>
        </table>
      </fieldset>
<input type="hidden" name="option" value="com_models" />
<input type="hidden" name="task" value="" />
<input type="hidden" name="boxchecked" value="0" />
<input type="hidden" name="controller" value="model" />
<input type="hidden" name="id" value="<?php echo $row->id; ?>" />
<input type="hidden" name="cat" value="<?php echo $this->origin;?>" />

    </form>