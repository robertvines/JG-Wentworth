/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/* *************************************************************************
     * Initially hide forms on page load    
     */
     $(document).ready(function() {     
         if($( '#form-A' ).is(":visible")){
              $( '#form-A' ).hide();
         }
         if($( '#form-B' ).is(":visible")){
              $( '#form-B' ).hide();
         }
         $('#hiddenID').hide();
         
         $("#datepicker").datepicker();
 
     });
     /* *************************************************************************
     * Shows the form that the user selects, hide the other if it is visible
     */
    $(document).ready(function() {
        $('#createCom').click(function(){
            $('#form-B').show();
            if($( '#form-A' ).is(":visible")){
              $( '#form-A' ).hide();
         }
         
    //     $("#newDate").datepicker();
        });
 
        $('.editCom').click(function(){ 
            // SHOW THE EDIT FORM, HIDE CREATE FORM
            $('#form-A').show();
            if($( '#form-B' ).is(":visible")){
              $( '#form-B' ).hide();
         }
     //    document.getElementById('createName').focus();
         
         //POPULATE FIELDS WITH EXISTING COMPANY INFORMATION USING ID
            var id = $(this).get(0).id;
    
            document.getElementById('editID').innerHTML = id;
            document.getElementById('editName').value = document.getElementById('name'+id).innerHTML;
            document.getElementById('editDate').value = document.getElementById('dateBus'+id).innerHTML;
            document.getElementById('editType').value = document.getElementById('type'+id).innerHTML;
            document.getElementById('editAddress').value = document.getElementById('address'+id).innerHTML;
            document.getElementById('hiddenID').value = id;
            
      //      document.getElementById('editName').focus();
        });
        
        //Select the text inside the textbox when it has focus
        $('#editName, #editType, #editDate, #editAddress').click( function(){
            $(this).select();
        });
       // hide the form when the user clicks the hide form button
       $('#hideCreate').click(function(){
            $('#form-B').hide(); 
         });
       
        $('#hideEdit').click(function(){
            $('#form-A').hide();  
         });
         
    });// end documet.ready function   


