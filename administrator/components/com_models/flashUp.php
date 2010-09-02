<?php 

jimport('joomla.environment.uri' );

$host = JURI::root();
echo $host;

?>


<h1>SAy SOmething</h1>

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