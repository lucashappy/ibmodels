
<?php defined('_JEXEC') or die('Restricted access'); 


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
               value="<?php echo $this->category->name;?>" />
          </td>
        </tr>
  
        </table>
      </fieldset>
      <input type="hidden" name="id"value="<?php echo $this->category->id; ?>" />
      <input type="hidden" name="option" value="com_models" />
      <input type="hidden" name="controller" value="category" />
      <input type="hidden" name="task" value="" />
    </form>
