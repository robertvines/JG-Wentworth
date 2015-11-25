<!DOCTYPE html>
<!--

-->
<?php 
    include ($_SERVER["DOCUMENT_ROOT"].'/JGWentworth/View/Header.php');
?>
<style>
.hyper {
  
  background-image: -webkit-linear-gradient(top, #CEF2DF, #2b946d);
  background-image: -moz-linear-gradient(top, #CEF2DF, #2b946d);
  background-image: -ms-linear-gradient(top, #CEF2DF, #2b946d);
  background-image: -o-linear-gradient(top, #CEF2DF, #2b946d);
  background-image: linear-gradient(to bottom, #CEF2DF, #2b946d);
  -webkit-border-radius: 5;
  -moz-border-radius: 5;
  border-radius: 5px;
  font-family: Arial;
  color: #ffffff;
  font-size: 16px;
  padding: 10px 12px 10px 12px;
  margin: 10px 12px 10px 12px;
  border: solid #2b946d 1px;
  text-decoration: none;
  width: 30%;
  height: 150px;
  text-align: center;
  color: black;
}

.label {
   
  display: inline-block;
  vertical-align: middle;
  line-height: normal;      
}

</style>
    <body>
        <div id="page">
          <div id="body">
              <label class="title">REPORTS</label>
              
              <a href="/JGWentworth/View/companyReport.php">
                <div id="companyReport" class="hyper">
                    <span class="label">Company Report</span>
                 </div>
              </a>
              <a href="/JGWentworth/View/employeeReport.php">
                <div id="employeeReport" class="hyper">
                    <span class="label">Employee Report</span>
                </div>
             </a>
          </div>
        </div>
    </body>
</html>
