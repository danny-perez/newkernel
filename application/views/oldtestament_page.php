<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!---------------------------------------------------------------->
<!---------------------------MAIN BLOCK--------------------------->
<!---------------------------------------------------------------->
<!------><div class="row"><!------------------>
<!-------------------------------------------->
	<div class="col-md-12">
		<div class="bs-component" align="center">
			<ul class="pagination">
				<li><a href="#" id='f_min'>&laquo;</a></li>
			</ul>
			<ul class="pagination" id='pagination_ul'>
				<li><a href="#" id='f1'>1</a></li>
				<?php if($num_chap>1)echo "<li><a href='#' id='f2'>2</a></li>";?>
				<?php if($num_chap>2)echo "<li><a href='#' id='f3'>3</a></li>";?>
				<?php if($num_chap>3)echo "<li><a href='#' id='f4'>4</a></li>";?>
				<?php if($num_chap>4)echo "<li><a href='#' id='f5'>5</a></li>";?>
				<?php if($num_chap>5)echo "<li class='disabled'><a href='#'>...</a></li>";?>
				<?php if($num_chap>6)echo "<li><a href='#' id='num_max'>$num_chap</a></li>";?>
			</ul>
			<ul class="pagination">
				<li><a href="#" id='f_max'>&raquo;</a></li>
			</ul>
		</div>
  </div>
	<div class="col-md-12">
		<div class="card">
			<div class="card-title-w-btn">
				<h3 class="title">Новый Завет</h3>
			</div>
			<div class="card-body">
				<p align='justify'> точки зрения Новый Завет является Божиим откровением и представляет собой центральное открытие Богом Самого Себя и Своей воли людям.</p>
			</div>
		</div>
	</div>
<!------------------------------->
<!------></div><!---------------->
<!---------------------------------------------------------------->
<!-------------------------END MAIN BLOCK------------------------->
<!---------------------------------------------------------------->
