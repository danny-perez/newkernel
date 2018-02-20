<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!---------------------------------------------------------------->
<!---------------------------MAIN BLOCK--------------------------->
<!---------------------------------------------------------------->
<!------><div class="row"><!------------------>
    <!-------------------------------------------->
    <div class="col-md-9">
        <div class="card">
            <div class="card-title-w-btn">
                <h3 class="title"><?=$kn;?>, Глава <?=$chapter;?>, Толкователь <?=$exegesis;?></h3>
            </div>
            <div class="card-body">
                <?php
                    foreach($read_result as $key=>$read_text) {
                        echo '<sup>',$key,'</sup>','<b>',$read_text['stih'], '</b><br>';
                        echo $read_text['tolk'], '<br>';
                    }
                    ?>
            </div>
        </div>
    </div>
    <!------------------------------------------------------------------>
    <!-------------------- Right menu ---------------------->
    <!------------------------------------------------------------------>
    <div class="col-md-3">
        <div class="card">
            <div class="card-title-w-btn">
                <h4 class="title">Выбор главы</h4>
            </div>
            <div class="card-body">
1111111111111111111111
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card">
            <div class="card-title-w-btn">
                <h4 class="title">Выбор перевода</h4>
            </div>
            <div class="card-body">
2222222222222222222
            </div>
        </div>
    </div>
    <!------------------------------->
    <!------></div><!---------------->
<!---------------------------------------------------------------->
<!-------------------------END MAIN BLOCK------------------------->
<!---------------------------------------------------------------->
