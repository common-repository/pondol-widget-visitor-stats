			<table class="table">
				
<?php
   if(is_array($rows)) foreach($rows as $key=>$val){
 	echo "<tr><td>1";
   	//print_r($val);
	  if(!preg_match("/Typing or Bookmark/i", $val->REFERER)) $val->REFERER='<a href="'.$val->REFERER.'" target=_blank>'.$val->REFERER.'</a>';
	  
	   echo "&nbsp;&nbsp;&nbsp; - ".$val->REFERER." (".$val->REFERER_CNT.")<br />";
	 echo "</td></tr>";
  }
?>
			</table>
