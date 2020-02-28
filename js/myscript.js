/**
 * javascript content
 * Created by Abolade Kasope on 2/24/2015.
 */
$(function() {

    $("#submitBtn").click(function(noRefresh){
    noRefresh.preventDefault();
        // Validation
        matPf= $("#mat_no").val();
        fname= $("fullname").val();
		cat= $("#category").val();
		comp= $("#complaintType").val();

        if(matPf=="" && fname==""){
            $("#matricError").html("Please enter matriculation number or staff PF no.");
            $("#matricError").css("background-color","red", "color", "red");
            $("#nameError").html("Please enter name in full");
            $("#nameError").css("background-color","red", "color", "red");
            $("#matricError").fadeIn(3000);
            $("#nameError").fadeIn(3000);
            $("#matricError").fadeOut(5000);
            $("#nameError").fadeOut(5000);
        
        else if(matPf==""){
            $("#matricError").html("Please enter matriculation number or staff PF no.");
            $("#matricError").css("color", "red");
            $("#matricError").fadeIn(3000,function(){
               $("#matricError").fadeOut(5000)
            });
        }
        else if(fname==""){
            $("#nameError").html("Please enter name in full");
            $("#nameError").css("color", "red");
            $("#nameError").fadeIn(3000,function(){
                $("#nameError").fadeOut(5000)
            });
			6
        }
		else if(cat=="--Select Category--"){
            $("#catError").html("Please select category");
            $("#catError").css( "color", "red");
            $("#catError").fadeIn(3000,function(){
                $("#catError").fadeOut(3000)
            });
        }
		else if(comp=="--Complaint Type--"){
            $("#compError").html("Please select appropriate complaint type");
            $("#compError").css("color", "red");
            $("#compError").fadeIn(3000,function(){
                $("#compError").fadeOut(5000)
            });
        }
    });




});