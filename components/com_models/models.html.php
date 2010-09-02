<?php

	
class HTML_models 
{
  

	
	function showModels($rows, $option)
  {
    ?><table><?php
    foreach($rows as $row)
    {
      $link = JRoute::_('index.php?option=' . $option . '&id=' .  
                      $row->id . '&task=view');
      echo 
  '<tr>
    <td>
      <a href="' . $link . '">' . $row->name . '</a>
    </td>
  </tr>';
    }
    ?></table><?php
  }
  
  
  
  function showModel($row, $option){
   //$link = JRoute::_('index.php?option=' . $option); 
   $params= array('age','size','weight','bust','waist','hips','shoes','eyes','hair');
   
   //Shows models characteristics
  	echo '<h1>'.$row->name.'</h1><table>';
  	foreach ($params as $key){
  			echo'<tr><td align=right>'.$key.'</td><td align=center>'.$row->$key.'</td></tr>';
  			
  	}
  	echo'</table>';
  }
}
?>