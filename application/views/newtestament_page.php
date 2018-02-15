<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!---------------------------------------------------------------->
<!---------------------------MAIN BLOCK--------------------------->
<!---------------------------------------------------------------->
<!------><div class="row"><!------------------>
<!-------------------------------------------->
	<div class="col-md-2">
        <div class="card">
            <div class="card-title-w-btn">
                <h3 class="title">Выбор главы</h3>
            </div>
            <div class="card-body">
                <select name='chapt' class="form-control" id="selection" onchange="load_chapter('/newtestament?book=<?=$kn;?>&chapter=');">
                    <?php
                        for($i=1;$i<$num_chap;$i++) echo "<option value='$i'>$i</option>";
                    ?>
                </select>
            </div>
        </div>
  </div>
	<div class="col-md-12">
		<div class="card">
			<div class="card-title-w-btn">
				<h3 class="title">Новый Завет, Глава <?=$chapter;?></h3>
			</div>
			<div class="card-body">
				<p align='justify'>
                    <?php
                    foreach($text_book as $tb)
				    {
				        echo '<sup>',$tb['st_no'],'</sup>',$tb['st_text'];
				    }
				    ?>
                </p>
			</div>
		</div>
	</div>
<!------------------------------->
<!------></div><!---------------->
<!---------------------------------------------------------------->
<!-------------------------END MAIN BLOCK------------------------->
<!---------------------------------------------------------------->
