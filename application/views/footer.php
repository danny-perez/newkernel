<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!--===================================================================->
<!--===================================================================->
      </div>
	  <!----------------------------------------------------------->
	  <!----------------------------------------------------------->
    </div>
    <!-- Javascripts-->
    <script src="js/jquery-2.1.4.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/plugins/pace.min.js"></script>
    <script src="js/main.js"></script>

	<script type="text/javascript" src="js/plugins/bootstrap-datepicker.min.js"></script>
    <script type="text/javascript" src="js/plugins/select2.min.js"></script>
    <script type="text/javascript" src="js/plugins/bootstrap-datepicker.min.js"></script>
    <script type="text/javascript">
      $('#sl').click(function(){
      	$('#tl').loadingBtn();
      	$('#tb').loadingBtn({ text : "Signing In"});
      });

      $('#el').click(function(){
      	$('#tl').loadingBtnComplete();
      	$('#tb').loadingBtnComplete({ html : "Sign In"});
      });

      $('#demoDate').datepicker({
      	format: "dd/mm/yyyy",
      	autoclose: true,
      	todayHighlight: true
      });

      $('#demoSelect').select2();
      $('#demoSelect2').select2();
      //-----------------------------User script-----------------------------
      $('#newTestament').click(function () {
          var option_value = $("#demoSelect").val();
          var mylink = "/newtestament?book="+option_value;
          location.href=mylink;
      })
      $('#oldTestament').click(function () {
          var option_value = $("#demoSelect2").val();
          var mylink = "/oldtestament?book="+option_value;
          location.href=mylink;
      })

      //=======================pagination====================================
        function load_chapter(){
        }
    </script>
  </body>
</html>
