<!DOCTYPE html>
<html lang="en">
   <head>
	  <style>
		  .delete_file{
			  position: absolute;
			  top: 15px;
			  z-index: 10;
			  right: 10px;
		  }
		  .is-dragover .custom-drive{
			  opacity: 0.2;
		  }
		  #drop_file,.parent_div{
			  position: relative;
		  }
		  p.notice{display: none;}
		  #drop_file.is-dragover p.notice{
			  position: absolute;
			  display: block!important;
			  left: 50%;
			  top: 50%;
			  transform: translate(-50%,-50%);
			  z-index: 2;
			  opacity: 0.5;
			  font-size: 40px;
			  font-weight: 600;
		  }
		  
	  </style> 
      <?php $this->load->view('common/style') ?>
   </head>
   <body>
      <div class="contains-everything">
         <div class="overlay"></div>
         <?php $this->load->view('common/header') ?>
         <div class="app-portal">
            <div class="portal-body py-5">
               <div class="container">
                  <div class="text-right">
                     <div class="d-flex">
						 <?php if ( $this->input->cookie( 'Login' ) == "true" ) { ?> 
                        <ul class="create-menu d-flex mr-3">
                           <li>
                              <button class="create-folder">Folder</button>
                           </li>
                           <li>
                              <button class="create-file">File</button>
                           </li>
                        </ul>
                        <button class="btn create">Create new</button>
						 <?php } ?> 
						 <?php $parent_btn =  "";if(!empty($parent)){ $parent_btn = $this->db->where('id',secure::decrypt($parent))->get('file_system')->row_array(); $parent_btn = secure::encrypt($parent_btn['parent']); ?>
						  <?php }  ?>
						 <button onclick="<?="set_parent('".$parent_btn."');"?>get_files();" class="btn back ml-3">Back</button>
						  <a href="<?= base_url('employee-portal') ?>" class="btn ml-3"><i class="fa-arrow-left fa"></i> Portal</a>
                     </div>
                  </div>
                 <?php if ( $this->input->cookie( 'Login' ) == "true" ) { ?> 
				   <form id="drop_file">
				   <?php } ?>
                  <div class="custom-drive" >
                     
                  </div>
				    <?php if ( $this->input->cookie( 'Login' ) == "true" ) { ?>
					   <p class="notice">Drop your files here</p>
				   </form>
				   <?php } ?>
               </div>
            </div>
         </div>
         <?php $this->load->view('common/footer'); ?>
      </div>
      <input id="parent" type="hidden" value="<?=$parent?>"/>
      <?php if ( $this->input->cookie( 'Login' ) == "true" ) { ?>
      <div class="create-popper folder">
         <p>Create Folder</p>
         <div class="d-flex">
            <input type="text" id="name" class="form-control" placeholder="Folder Name">
            <button type="submit" class="btn" onClick="create_folder()">Create</button>
         </div>
      </div>
      <div class="create-popper file">
         <p>Upload File</p>
         <div class="d-flex">
            <input type="file" multiple id="file" style="visibility: hidden;width: 0px;height: opx;padding: 0px;margin: 0px;"/>
            <input type="text" class="form-control" readonly placeholder="Click to upload file" onClick="$('#file').trigger('click')">
            <button type="submit" onClick="upload_file()" class="btn">Upload</button>
         </div>
		  
		    <div class="progress mt-3" style="border-radius: 10px;">
               <div class="progress-bar bar" role="progressbar" aria-valuenow="0"
                  aria-valuemin="0" aria-valuemax="100" style="width:0%">
                  <span class="sr-only">70% Complete</span>
               </div>
            </div>
            <p id="status"></p>
      </div>
<script>
function create_folder() {
		if ($('#name').val() == "") {
			alertit('Folder name cannot be empty', 'danger');
		} else {
			var btn = $('#login_form button');
			var html = btn.html();
			var data = {
				parent: $('#parent').val(),
				'name': $('#name').val()
			}
			btn.html("Processing");
			$.ajax({
				type: 'POST',
				url: '<?=base_url('dropbox/create_folder')?>',
				data: data,
				dataType: "json",
				success: function (data) {
					btn.html(html);
					if (data.error == 1) {
						$('#name').val('');
						get_files();
						$('.create-popper.folder,.overlay').removeClass('open')
					} else {
						alertit(data.msg, 'danger')
					}
				}
			});
		}
	}
//function create_folder() {
////	var type = obj.attr('data-type');
////	var type = obj.attr('data-id');
//		if ($('#name').val() == "") {
//			alertit('Folder name cannot be empty', 'danger');
//		} else {
//			var btn = $('#login_form button');
//			var html = btn.html();
//			var data = {
//				parent: $('#parent').val(),
//				'name': $('#name').val()
//			}
//			btn.html("Processing");
//			$.ajax({
//				type: 'POST',
//				url: '<?=base_url('dropbox/create_folder')?>',
//				data: data,
//				dataType: "json",
//				success: function (data) {
//					btn.html(html);
//					if (data.error == 1) {
//						$('#name').val('');
//						get_files();
//					} else {
//						alertit(data.msg, 'danger')
//					}
//				}
//			});
//		}
//	}
async function upload_file(files="") {
	var bar = $('.bar')
	bar.attr('aria-valuenow', 0);
	bar.width('0%');
	var percent = $('.percent');
	var status = $('#status');
	var fi = {};
	if(files==""){
	fi =document.getElementById('file')
	}else{
	fi.files =files
	};
	window.error = true;
	if (fi.files.length > 0) {
		for (var i = 0; i <= (fi.files.length - 1); i++) {
			var fsize = fi.files.item(i).size;
			var file = Math.round((fsize / 1024));
			if (file > (1024 * 500)) {
				alertit("File size should be smaller than 500MB", 'danger');
			} else {
				status.html('Uploading ' + (i + 1) + " of " + fi.files.length)
				var data = new FormData();
				show_bar()
				data.append('file', fi.files[i]);
				data.append('parent', $('#parent').val());
				window.error=await sendfile(data);
			}
		}
		if(window.error){
		get_files();
		alertit((fi.files.length==1?"File":"Files")+' uploaded successfully','success');	
		$('.create-popper.file,.overlay').removeClass('open');	
		}else{
			alertit('Some files cannot be uploaded','danger');
		}
	} else {
		alertit('Seems the file youare trying to upload is not valid', 'danger')
	}
}
function progress(e){

    if(e.lengthComputable){
        var max = e.total;
        var current = e.loaded;

        var Percentage = (current * 100)/max;
        console.log(Percentage);


        if(Percentage >= 100)
        {
           // process completed  
        }
    }  
 }
function sendfile(data) {
	return new Promise((resolve,reject)=>{
	var bar = $('.bar')
	bar.attr('aria-valuenow', 0);
	bar.width('0%');
	var percent = $('.percent');
	var status = $('#status');
	$.ajax({
		type: 'POST',
		url: '<?=base_url('dropbox/upload_data')?>',
		data: data,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		beforeSend: function () {
			var percentVal = '0%';
			bar.attr('aria-valuenow', 0);
			bar.width(percentVal);
		},
		 xhr: function () {
		 	var myXhr = $ . ajaxSettings . xhr();
		 	if ( myXhr . upload ) {
		 		myXhr . upload . addEventListener( 'progress', function ( e ) {
		 			var max = e.total;
		 			var current = e.loaded;
		 			var Percentage = ( current * 100 ) / max;
					var percentComplete = Percentage;
		 			var percentVal = percentComplete + '%';
//		 			console . log( percentComplete );
		 			bar . attr( 'aria-valuenow', percentComplete );
		 			bar . width( percentVal );
		 		} );
		 	}
		 	return myXhr;
		 },
		   success: function (data) {
			console.log('here');
			hide_bar()
			if (data.error == "1") {
				resolve(true);
			} else {
				reject(false);
			}
		}
	});
	})	
}
</script>
      <?php } ?>

      <?php $this->load->view('common/end'); ?>
<script>
get_files();
function set_parent(parent){
	$('#parent').val(parent);
	history.pushState({},"Linco Drop",'<?=base_url('employee-portal/dropbox/')?>'+parent);
}	
function delete_data(obj){
if(confirm("You sure you want to delete this "+obj.attr('data-type'))){	
$.ajax({
	type: 'POST',
	url: '<?=base_url('dropbox/delete_')?>'+(obj.attr('data-type')=="folder"?"folder":"file"),
	data: {id:obj.attr('data-id')},
	async:false,
	dataType: "json",
	success: function (data) {
		if (data.error == 1) {
			obj.parent('div').fadeOut();
		}
		else{
			alertit('Cannot delete '+obj.attr('data-type')+", Please try after some time");
		}
	}
});
}	
}	
function get_files(){	
	hide_bar();
	var data = {
		parent: $('#parent').val(),
	}
$.ajax({
	type: 'POST',
	url: '<?=base_url('dropbox/get_files')?>',
	data: data,
	async:false,
	dataType: "json",
	success: function (data) {
		if (data.error == 1) {
			if(data.data.length>0){
				var ele="";
				if(data.back!=""){
					$('.back').attr('onclick','set_parent("'+data.back+'");get_files();').fadeIn();
				}else{
					$('.back').fadeOut();
				}
				for(var i=0;i<=(data.data.length-1);i++){
					var row = data.data[i];
					ele+='<div class="drive-box parent_div"> ';
					<?php if ( $this->input->cookie( 'Login' ) == "true" ) { ?> 
					ele+='<i class="fas fa-trash fa-2x delete_file" onclick="delete_data($(this))" data-type="'+row.type+'" data-id="'+row.id_enc+'"></i>'
					<?php } ?>
                    ele+='<div class="box" '+(row.type=="folder"?"onclick=\"set_parent('"+row.id_enc+"');get_files();\"":"onclick=\"open_file($(this))\"")+'  data-timestamp="'+row.timestamp+'" data-name="'+encodeURIComponent(row.name)+'">';
                    ele+='<div class="preview folder p-2">';
                    ele+='<img src="<?=base_url()?>assets/images/icons/'+row.type+'.png" alt="" class="p-5">';
                    ele+='</div>';
                    ele+='<p class="fileName text-center">'+row.name+'</p>';
                    ele+='</div>';
                    ele+='</div>';
				}
			    $('.custom-drive').html(ele);
			}else{
			$('.custom-drive').html('<span>No file available here</span>');
				}
		} else {
			$('.custom-drive').html('<span>No file available here</span>');		
			alertit(data.msg, 'danger')
		}
	}
}); 
}
function open_file(obj){
	window.open("<?=base_url('dropbox-files/')?>"+obj.attr('data-timestamp')+"/"+obj.attr('data-name'),'_blank');
}	
function hide_bar(){
$('.bar').width('0%').attr('aria-valuenow',0).parent('div').hide();	
$('#status').html('').hide();	
}
function show_bar(){
$('.bar').parent('div').show();	
}		
var isAdvancedUpload = function() {
  var div = document.createElement('div');
  return (('draggable' in div) || ('ondragstart' in div && 'ondrop' in div)) && 'FormData' in window && 'FileReader' in window;
}();
var $form = $('#drop_file');	
if (isAdvancedUpload) {

  var droppedFiles = false;

  $form.on('drag dragstart dragend dragover dragenter dragleave drop', function(e) {
    e.preventDefault();
    e.stopPropagation();
  })
  .on('dragover dragenter', function() {
    $form.addClass('is-dragover');
  })
  .on('dragleave dragend drop', function() {
    $form.removeClass('is-dragover');
  })
  .on('drop', function(e) {
    droppedFiles = e.originalEvent.dataTransfer.files;
	upload_file(droppedFiles); 
	console.log(droppedFiles);  
  });

}	
</script>	   
   </body>
</html>