/*!
 * Start Bootstrap - SB Admin 2 v3.3.7+1 (http://startbootstrap.com/template-overviews/sb-admin-2)
 * Copyright 2013-2016 Start Bootstrap
 * Licensed under MIT (https://github.com/BlackrockDigital/startbootstrap/blob/gh-pages/LICENSE)
 */
$(function() {
    $('#side-menu').metisMenu();
});

 $(document).ready(function(){	
 i = 1;
 change = 0;
 var $r = 0;
 var $error = 0;
 console.log(" qc ready");
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
$("body").on('change', '#matid', function(){
					prod = $("#product");
		 				$.ajax({
					type: 'GET',
					url: "/get/product",
					dataType: 'JSON',
					beforeSend: function(xhr)
					{xhr.setRequestHeader('X-CSRF-Token', $('meta[name="csrf-token"]').attr('content'))},
					data: {
					"id": $(this).val(), 				
					},                                                                                             
					error: function( xhr ){ 
					// alert("ERROR ON SUBMIT");
					//console.log("error on submit"+xhr);
					},
					success: function( data ){ 
					console.log("success "+ data);
					//var datas = JSON.parse(data);
					prod.empty();
					$.each(data, function(i, list){
						prod.append(new Option(list.name, list.id));
						//console.log(" i ", i);
						//console.log(" list ", list.name);
					});
					/*
					Ulist.empty();
					Ulist.show();
					$.each(data, function(i, list){
					if(list.ENTITYCODE=='01-234-001'){
						$company='ESRNL';
					}
					else if(list.ENTITYCODE=='01-234-002'){
						$company='NPRNL';
					}
					else{$company='PFNL';}
					Ulist.append("<li class='sltList'><a href='#'>"+ list.ITEMCODE + ' - '+list.ITEMNAME +' - ' + $company + "</a></li>")
					});
					
					*/
					}
				});
	
	
});
$("body").on('change', '#matgrp', function(){
	
});
$("body").on('click', '.btnAnal', function(){
	var btn = $(this).val();
	console.log(" This button "+ btn);
      /*  BootstrapDialog.show({
            title: 'Please specify number of Samples',
            message: $('<input type="number" min="1" max="10" class="form-control input-sm sample" placeholder="Enter number between 1 - 10..."></input>'),
            buttons: [{
                label: 'Start Analysis',
                cssClass: 'btn-primary',
                hotkey: 13, // Enter.
                action: function(res) {
                    console.log(res);
					console.log($(".sample").val());
                }
            }]
        });
        */
        BootstrapDialog.confirm({
            title: 'Please specify number of Samples',
            message:  $('<input type="number" min="1" step="1" max="10" class="form-control input-sm sample" placeholder="Enter number between 1 - 10..."></input>'),
            type: BootstrapDialog.TYPE_PRIMARY, // <-- Default value is BootstrapDialog.TYPE_PRIMARY
            closable: true, // <-- Default value is false
            draggable: true, // <-- Default value is false
            btnCancelLabel: 'Cancel!', // <-- Default value is 'Cancel',
            btnOKLabel: 'Start Analysis!', // <-- Default value is 'OK',
           //btnOKClass: 'btn-warning', // <-- If you didn't specify it, dialog type will be used,
            callback: function(result) {
                // result will be true if button was click, while it will be false if users close the dialog directly.
                if(result) {
					var val = Number($('.sample').val());
					console.log("sample clicked");
					if(val%1===0  && val<=10 && val>0){
						window.location = "/pass/start?sample="+val+"&id="+btn;	
					}
				else {
						BootstrapDialog.show({
            title: 'Please specify correct number of Samples',
			type: BootstrapDialog.TYPE_DANGER,
            message: $('<h5 class="text-danger">Samples shouldn\'t be a fraction and be less than 10</h5>'),
			closable: true,
			btnCancelLabel: 'Cancel!'
								});	
					}	
                } /// if result checks end here

            }
        });		
});

function readURL(input) {

  if (input.files && input.files[0]) {
    var reader = new FileReader();

    reader.onload = function(e) {
      $('#blah').attr('src', e.target.result);
    }

    reader.readAsDataURL(input.files[0]);
  }
}
$("#add_rowe").click(function(){

	if($("#tbody tr").length>1 && change<1){
		i = $("#tbody tr").length;
		if(i==1){ i=1;}
		console.log(" i now "+i);
		change=10;
	}
	
	$('#tbody').append('<tr id="addr'+(i)+'"></tr>');  
      $('#addr'+i).html("<td class='text-center'>"+(i+1)+"</td><td><input type='text' name='items["+i+"][prop]'  placeholder='' class='form-control' required>	</td><td><input  type='text' name='items["+i+"][unit]' placeholder='' class='form-control' required></td><td><input type='text' name='items["+i+"][method]' placeholder='' class='form-control' required></td><td><select type='text' name='items["+i+"][type]' placeholder='' class='form-control iType'><option value='FIXED'>FIXED</option><option value='RANGE'>RANGE</option></select></td><td><input type='text' name='items["+i+"][target]' placeholder='' class='form-control' required></td><td><input onkeypress='return (event.charCode == 8 || event.charCode == 0) ? null : event.charCode >= 48 && event.charCode <= 57' type='number' min='0' max='10000' name='items["+i+"][min]' placeholder='' class='form-control' readonly></td><td>		<input onkeypress='return (event.charCode == 8 || event.charCode == 0) ? null : event.charCode >= 48 && event.charCode <= 57' type='number' min='0' max='10000' name='items["+i+"][max]' placeholder='' class='form-control'  required></td><td><input onkeypress='return (event.charCode == 8 || event.charCode == 0) ? null : event.charCode >= 48 && event.charCode <= 57' type='number' min='-10000' max='10000' name='items["+i+"][tol]' placeholder='' class='form-control'/></td>");


    i++; 
	$('#row_value').val(i);
	var g = $('#row_value').val();

	console.log(g);
  });
$("#add_row").click(function(){

      $('#addr'+i).html("<td class='text-center'>"+(i+1)+"</td><td><input type='text' name='items["+i+"][prop]'  placeholder='' class='form-control' required>	</td><td><input  type='text' name='items["+i+"][unit]' placeholder='' class='form-control' required></td><td><input type='text' name='items["+i+"][method]' placeholder='' class='form-control' required></td><td><select type='text' name='items["+i+"][type]' placeholder='' class='form-control iType'><option value='FIXED'>FIXED</option><option value='RANGE'>RANGE</option></select></td><td><input type='text' name='items["+i+"][target]' placeholder='' class='form-control iTarget' required></td><td><input onkeypress='return (event.charCode == 8 || event.charCode == 0) ? null : event.charCode >= 48 && event.charCode <= 57' type='number' min='0' max='10000' name='items["+i+"][min]' placeholder='' class='form-control' readonly></td><td>		<input onkeypress='return (event.charCode == 8 || event.charCode == 0) ? null : event.charCode >= 48 && event.charCode <= 57' type='number' min='0' max='10000' name='items["+i+"][max]' placeholder='' class='form-control iMax'  required></td><td><input onkeypress='return (event.charCode == 8 || event.charCode == 0) ? null : event.charCode >= 48 && event.charCode <= 57' type='number' min='-10000' max='10000' name='items["+i+"][tol]' placeholder='' class='form-control'/></td>");

	$('#tbody').append('<tr id="addr'+(i+1)+'"></tr>');      i++; 
	$('#row_value').val(i);
	var g = $('#row_value').val();

	//console.log(g);
  });
$("body").on('change','.iType', function(){ 
	type = $(this);
	val = $(this).find("option:selected").val();
	var r =  $(this).attr('name');
	$r = Number(r.split("")[6]);
	if(val==='FIXED'){
		$("input[name='items["+$r+"][min]']").attr('readonly', 'true');
	}
	else{
		$("input[name='items["+$r+"][min]']").removeAttr('readonly');
	}
  });  
$("body").on('focusout', '.iMax', function(){ 
	function test(res){
		if(res){
			target.css({"border":"2px solid red"})
		}else{ target.removeAttr('style'); }		
		
	}
	var r =  $(this).attr('name');
	$r = Number(r.split("")[6]);
	target = $('input[name="items['+$r+'][target]"]');
	min = $('input[name="items['+$r+'][min]"]');
	type = $('select[name="items['+$r+'][type]"]').find("option:selected").val();
	target.css({"border":"2px solid red"});
	//console.log(target);
	if(target.val().length!==0){
		tar = target.val().split("/").length;
		max = $(this).val() - min.val();
		console.log(" Target Length "+tar+ "  Difference "+max+" Type "+type);
		
		if(type=='FIXED'){
			test((tar>3) || (tar==1));
			console.log("FIXED");
		}else{
			test((max%tar!==0) || (tar==1));
		}
	}
	else{
		target.css({"border":"1px solid  #e32b2b"});
	}
  //console.log($(this).val()+"  i is "+(i-1));
  //console.log($(this).attr('name') + $r);
  //console.log('Target is '+ target.val());
  
 });
/*$("body").on('focusout', 'input[name="items['+(i-1)+'][max]"]', function(){
	  console.log(" i "+i);
	  console.log($(this).val());
}); */
 /* $('input[name="items['+(i-1)+'][max]"]').focusout(function(){
	  console.log($(this).val());
  });*/
$("#delete_row").click(function(){
    	 if(i>1){
		 $("#addr"+(i-1)).html('');
		 i--;
		 }
	 });
$("body").on('change', '#matgrp', function(){
	 var optionSelected = $(this).find("option:selected");
     var val  = optionSelected.val();
	 console.log(val);

	
	//proc = $(this).val();
	//console.log(proc);
			$.ajax({
					type: 'GET',
					url: "/product/test",
					dataType: 'JSON',
					beforeSend: function(xhr)
					{xhr.setRequestHeader('X-CSRF-Token', $('meta[name="csrf-token"]').attr('content'))},
					data: {
					"id":val,
					},                                                                                             
					error: function( xhr ){ 
					// alert("ERROR ON SUBMIT");
					console.log("error on submit"+xhr);
					},
					success: function(data){ 
					console.log("success "+ data);
					CList=$("#measure");				
					//var datas = JSON.parse(data);
					CList.empty();
					$.each(data, function(i, list){
					   console.log(list.name);
					   console.log(list);
						CList.append(new Option(list.name, list.id));
					}); 

					}
				});
/*	console.log($(this).val());
	if(proc=='FG'){$("#fgForm").show(); $("#sfgForm").hide(); }
	else{$("#sfgForm").show(); $("#fgForm").hide(); }
  */  
	
 }); 

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
