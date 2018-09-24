/*!
 * Start Bootstrap - SB Admin 2 v3.3.7+1 (http://startbootstrap.com/template-overviews/sb-admin-2)
 * Copyright 2013-2016 Start Bootstrap
 * Licensed under MIT (https://github.com/BlackrockDigital/startbootstrap/blob/gh-pages/LICENSE)
 */
$(function() {
    $('#side-menu').metisMenu();
});

 $(document).ready(function(){	
 //	$("#finished").hide();
 /*$('#sfgType').on('change', function(e){
if($(this).val()=='FINISHED PRODUCT'){
	$("#finished").removeClass("col-md-6 col-lg-6").addClass("col-md-8 col-md-offset-2 col-lg-8 col-lg-offset-2").show();
	$("#fpsubmit").show();
	$("#inprocess").hide();
}
else if($(this).val()=='ALL'){
	$("#finished").removeClass("col-md-8 col-md-offset-2 col-lg-8 col-lg-offset-2").addClass("col-md-6 col-lg-6").show();
	$("#inprocess").removeClass("col-md-8 col-md-offset-2 col-lg-8 col-lg-offset-2").addClass("col-md-6 col-lg-6").show();
	$("#fpsubmit").hide();
}
else{
	
	$("#finished").removeClass("col-md-6 col-lg-6").hide();
	$("#fpsubmit").hide();
	$("#inprocess").removeClass("col-md-6 col-lg-6").addClass("col-md-8 col-md-offset-2 col-lg-8 col-lg-offset-2").show();
}
}); */
function readURL(input) {

  if (input.files && input.files[0]) {
    var reader = new FileReader();

    reader.onload = function(e) {
      $('#blah').attr('src', e.target.result);
    }

    reader.readAsDataURL(input.files[0]);
  }
}
$("#lnkImg").change(function() {
  readURL(this);
});
 console.log("started");
  //console.log(result);
 $("#remarkDiv").hide(); 
 $("body").on('change', '#procs', function(){
	proc = $(this).val();
	console.log(proc);
			$.ajax({
					type: 'GET',
					url: "/spec/create",
					dataType: 'JSON',
					beforeSend: function(xhr)
					{xhr.setRequestHeader('X-CSRF-Token', $('meta[name="csrf-token"]').attr('content'))},
					data: {
					"proc":proc,
					},                                                                                             
					error: function( xhr ){ 
					// alert("ERROR ON SUBMIT");
					console.log("error on submit"+xhr);
					},
					success: function( data ){ 
					console.log("success "+ data);
					CList=$("#prods");				
					//var datas = JSON.parse(data);
					CList.empty();
					$.each(data, function(i, list){
					   console.log(list.itemname);
						CList.append(new Option(list.itemname, list.itemname));
					}); 

					}
				});
	console.log($(this).val());
	if(proc=='FG'){$("#fgForm").show(); $("#sfgForm").hide(); }
	else{$("#sfgForm").show(); $("#fgForm").hide(); }
 }); 
  $("#invUom").on('change', function(e){
	  $("#purUom").val($(this).val());
  });
 $("#mainCat").on('change', function(e){
     var optionSelected = $(this).find("option:selected");
     var valueSelected  = optionSelected.val();
     var textSelected   = optionSelected.text();
	 console.log(optionSelected);
	 console.log(valueSelected);
	if(valueSelected == 2){
	$(".remarkText").append("<textarea name='remarks' class='input-md form-control' id='remarks' type='text' required></textarea>");	
	$("#remarkDiv").show();

	}
	else{
		$("#remarkDiv").hide();
		$(".remarkText").empty();
		$(".remarkText").detach('#remarks');
	}
 });
 $("#category").on('change', function(e){
		  var comp = $("#comp").val();
		  console.log(comp);
		  var fam = $("#family").val();
		  var cat = $(this).val();
		  CList = $("#subCat");
			$.ajax({
					type: 'GET',
					url: "/getcat",
					dataType: 'JSON',
					beforeSend: function(xhr)
					{xhr.setRequestHeader('X-CSRF-Token', $('meta[name="csrf-token"]').attr('content'))},
					data: {
					"comp":comp,
					"family":fam,
					"type":"subcat",
					"cat":cat
					},                                                                                             
					error: function( xhr ){ 
					// alert("ERROR ON SUBMIT");
					console.log("error on submit"+xhr);
					},
					success: function( data ){ 
					console.log("success "+ data);
					
					$.each(data, function(i, list){
						console.log(" i ", i);
						console.log(" list ", list.U_IT_SUBCAT);
					});					
					//var datas = JSON.parse(data);
					CList.empty();
				   $.each(data, function(i, list){
						CList.append(new Option(list.U_IT_SUBCAT, this.value));
					});

					}
				});
 });
 $("#family").on('change', function(e){
	      var optionSelected = $(this).find("option:selected");
		  console.log(optionSelected.text());
		  var comp = $("#comp").val();
		  console.log(comp);
		  var fam = optionSelected.val();
		  CList = $("#category");
			$.ajax({
					type: 'GET',
					url: "/getcat",
					dataType: 'JSON',
					beforeSend: function(xhr)
					{xhr.setRequestHeader('X-CSRF-Token', $('meta[name="csrf-token"]').attr('content'))},
					data: {
					"comp":comp,
					"family":fam,
					"type":"cat",
					},                                                                                             
					error: function( xhr ){ 
					// alert("ERROR ON SUBMIT");
					console.log("error on submit"+xhr);
					},
					success: function( data ){ 
					console.log("success "+ data);
					//var datas = JSON.parse(data);
					CList.empty();
				   $.each(data, function(i, list){
						CList.append(new Option(list.U_IT_CAT, this.value));
					});
					$.ajax({
					type: 'GET',
					url: "/getcat",
					dataType: 'JSON',
					beforeSend: function(xhr)
					{xhr.setRequestHeader('X-CSRF-Token', $('meta[name="csrf-token"]').attr('content'))},
					data: {
					"comp":comp,
					"family":fam,
					"type":"subcat",
					"cat":CList.val(),
					},                                                                                             
					error: function( xhr ){ 
					// alert("ERROR ON SUBMIT");
					console.log("error on submit"+xhr);
					},
					success: function( data ){ 
					console.log("success "+ data);
					//var datas = JSON.parse(data);
					SList = $("#subCat");
					SList.empty();
				   $.each(data, function(i, list){
						SList.append(new Option(list.U_IT_SUBCAT, this.value));
					});
					
				 /*
					CList.empty();
					//Ulist.show();
					$.each(data, function(i, list){
					Ulist.append("<li class='sltList'><a href='#'>"+ list.ITEMCODE + ' - '+list.ITEMNAME +"</a></li>")
					});
					
					*/
					}
				});
				 /*
					CList.empty();
					//Ulist.show();
					$.each(data, function(i, list){
					Ulist.append("<li class='sltList'><a href='#'>"+ list.ITEMCODE + ' - '+list.ITEMNAME +"</a></li>")
					});
					
					*/
					}
				});
				
		  
 });
 $("body").click(function(){
	$("#myUL").empty();
 });
 $("body").on('click', '.updateReq', function(){

	if($("#remarks").empty()){
		console.log(" empty! "); 
	}
 });

$("body").on('click', '.sltList', function(){
	console.log($(this).text());
	var type = $(this).text();
	$("#myUL").hide();
	 var txt;
        BootstrapDialog.confirm({
            title: 'MID Information',
            message: 'The item is already created, Do you still want to continue creating new MID Request ?',
            type: BootstrapDialog.TYPE_PRIMARY, // <-- Default value is BootstrapDialog.TYPE_PRIMARY
            closable: true, // <-- Default value is false
            draggable: true, // <-- Default value is false
            btnCancelLabel: 'Cancel!', // <-- Default value is 'Cancel',
            btnOKLabel: 'Create MID!', // <-- Default value is 'OK',
           //btnOKClass: 'btn-warning', // <-- If you didn't specify it, dialog type will be used,
            callback: function(result) {
                // result will be true if button was click, while it will be false if users close the dialog directly.
                if(result) {
                    result = type;
					window.location = "/req/create";
					
                }else {
                   window.location = "/home";
                }
            }
        });
   /* if (confirm("The item is already created. Do you want to stop creating new MID Request.")) {
        txt = "You pressed OK!";
		window.location = "/home";
		
    } else {
        txt = "You pressed Cancel!";
    }*/
	$("#itemType").val($(this).text());
	console.log(txt);
});
$(".report").on('click', function(){
	 console.log("clicked");
					
					$.ajax({
					type: 'GET',
					url: "/report/history",
					dataType: 'JSON',
					beforeSend: function(xhr)
					{xhr.setRequestHeader('X-CSRF-Token', $('meta[name="csrf-token"]').attr('content'))},
					data: {
					"userid":$("#userid").val(),
					"prodOrder":$("#prodOder").val(),
					"prodName":$("#prodName").val(),
					"dateFrom":$("#dateFrom").val(),
					"dateTo":$("#dateTo").val(),
					},                                                                                             
					error: function( xhr ){ 
					// alert("ERROR ON SUBMIT");
					console.log("error on submit"+xhr);
					},
					success: function( data ){ 
					console.log("success "+ data);
					$("#tbody > tr").empty();
					$.each(data, function(i, list){
						console.log(list.shiftName);
					$("#tbody").append("<tr><td>"+list.period+"</td><td>"+list.shiftName+"</td><td>"+list.wPH+" </td><td>"+list.wIron+"</td><td>"+list.wSulphate+"</td><td>"+list.wFR+"</td><td>"+list.labAm+"</td><td>"+list.labAMOut+"</td><td>"+list.labDensity+"</td><td>"+list.caustic+"</td><td>"+list.AnRes+"</td><td>"+list.slurryConc+"</td><td>"+list.slurryAM+"</td><td>"+list.bpAM+"</td><td>"+list.bpWater+"</td><td>"+list.bpDensity+"</td><td>"+list.fpDensity+"</td><td>"+list.fpAM+"</td><td>"+list.fpAM+"</td><td> 20 </td><td> 21 </td><td> 22 </td></tr>");						
					});  //end of each function
					
					
					} 
				});  
				
	 
	//$("#myUL").append("<li class='sltList'><a href='#'>Taofik</a></li>");

	
 });

$(".search").on('click', function(){
	 console.log($("#prodName").val());
	 				$.ajax({
					type: 'GET',
					url: "/report/search",
					dataType: 'JSON',
					beforeSend: function(xhr)
					{xhr.setRequestHeader('X-CSRF-Token', $('meta[name="csrf-token"]').attr('content'))},
					data: {
					"userid":$("#userid").val(),
					"prodOrder":$("#prodOder").val(),
					"prodName":$("#prodName").val(),
					"dateFrom":$("#dateFrom").val(),
					"dateTo":$("#dateTo").val(),
					},                                                                                             
					error: function( xhr ){ 
					// alert("ERROR ON SUBMIT");
					console.log("error on submit"+xhr);
					},
					success: function( data ){ 
					console.log("success "+ data);
					console.log("success "+ data.email);
					//var datas = JSON.parse(data);
					$(".restable").show();
					UList = $("#tbody");
					UList.empty();
					$.each(data, function(i, list){
						console.log(" i ", i);
						process = '';
						if(list.ITEMCODE.substring(0,2)=='12'){
							process="SFG";
						}
						else if((list.ITEMCODE.substring(0,2)=='16') || (list.ITEMCODE.substring(0,2)=='17') )
						{
							process="FG";	
						}
						UList.append("<tr><td>"+(i+1)+"</td><td>"+process+"</td><td>"+list.PROD_NUMBER+"</td><td>"+list.ITEMNAME+"</td><td>"+list.POSTDATE.substring(0,10)+"</td><td><a href=/report/create?id="+list.PROD_NUMBER+"><button class='btn btn-info btn-xs'>Analyse</button></a></td></tr>");
					});
				 
					//Ulist.empty();
					//Ulist.show();
					/*$.each(data, function(i, list){
					Ulist.append("<li class='sltList'><a href='#'>"+ list.ITEMCODE + ' - '+list.ITEMNAME +"</a></li>")
					}); */
					}
				});
	 
	//$("#myUL").append("<li class='sltList'><a href='#'>Taofik</a></li>");
	 console.log($(this).val());
 });
  var result;
 });
//Loads the correct sidebar on window load,
//collapses the sidebar on window resize.
// Sets the min-height of #page-wrapper to window size
$(function() {
    $(window).bind("load resize", function() {
        var topOffset = 50;
        var width = (this.window.innerWidth > 0) ? this.window.innerWidth : this.screen.width;
        if (width < 768) {
            $('div.navbar-collapse').addClass('collapse');
            topOffset = 100; // 2-row-menu
        } else {
            $('div.navbar-collapse').removeClass('collapse');
        }

        var height = ((this.window.innerHeight > 0) ? this.window.innerHeight : this.screen.height) - 1;
        height = height - topOffset;
        if (height < 1) height = 1;
        if (height > topOffset) {
            $("#page-wrapper").css("min-height", (height) + "px");
        }
    });

    var url = window.location;
    // var element = $('ul.nav a').filter(function() {
    //     return this.href == url;
    // }).addClass('active').parent().parent().addClass('in').parent();
    var element = $('ul.nav a').filter(function() {
        return this.href == url;
    }).addClass('active').parent();

    while (true) {
        if (element.is('li')) {
            element = element.parent().addClass('in').parent();
        } else {
            break;
        }
    }
});
