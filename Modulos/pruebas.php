
<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-type" content="text/html; charset=utf-8">
    <title>Multiple step form</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <script type="text/javascript" src="js/jquery-1.9.0.js"></script>
    <script type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.13.1/jquery.validate.js"></script>
    <script type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.13.1/additional-methods.js"></script>
</head>

<body>
    <div class="container">
        <div class="col-md-4">
            <form class="form-horizontal" action="" method="POST" id="myform">
                    <div class="form-group">
                       <label for="title">Past Question Title</label>
                       <input type="text" class="form-control" id="question" name="question" placeholder="Type Question Here" cols="40" rows="5" style="resize:vertical;" required>
                    </div>
                    <div class="form-group">
                       <label for="course">Course Code</label>
                       <select type="text" class="form-control" id="course" name="course" placeholder="Course"></select>
                       <option></option>
                    </div>
                        <div id="fielda">
                            <div id="fielda0">
                                <!-- Text input-->
                                    <hr/>
                                    <div class="form-group">
                                       <label for="csetitle">Question</label>
                                       <textarea type="text" class="form-control" id="question" name="question" placeholder="Type Question Here" cols="40" rows="5" style="resize:vertical;" required></textarea>
                                    </div>
                                    <div class="form-group">
                                      <label for="nt">Upload Image</label>
                                      <input type="file" name="file" class="filestyle" data-iconName="glyphicon glyphicon-inbox">
                                    </div>
                                    <div class="form-group">
                                        <label for="options">Options</label>
                                        <div data-role="dynamic-fields">
                                            <div class="form-inline">
                                                <div class="form-group">
                                                    <div class="col-md-12">
                                                        <input type="radio" name="reason" value="Answer"> Answer 
                                                        <span>-</span>
                                                        <label class="sr-only" for="field-name">Option</label>
                                                        <input type="text" class="form-control" id="field-name" placeholder="Field Name">
                                                    </div>
                                                </div>
                                                <button class="btn btn-danger" data-role="remove">
                                                    <span class="glyphicon glyphicon-remove"></span>
                                                </button>
                                                <button class="btn btn-primary" data-role="add">
                                                    <span class="glyphicon glyphicon-plus"></span>
                                                </button>
                                            </div>  <!-- /div.form-inline -->
                                        </div>  <!-- /div[data-role="dynamic-fields"] -->
                                    </div>
                                    <div class="form-group">
                                       <label for="csetitle">Slug</label>
                                       <textarea type="text" class="form-control" id="question" name="question" placeholder="Explain You Answer" cols="40" rows="5" style="resize:vertical;" required></textarea>
                                    </div>
                                    <div class="form-group">
                                       <label for="csetitle">Point</label>
                                       <input type="number" class="form-control" id="question" name="question" placeholder="Allocate Score Here" required>
                                       <hr/>
                                    </div>
                            </div>
                            <!--end field0-->
                        </div>
                        <!--end field-->
                        
                        <div class="form-group">
                                <button id="add-more" name="add-more" class="btn btn-primary">Add More</button>
                        </div>
            </form>
        </div>
    </div>


</body>

</html>

<style>
    
html, body {
    padding-top: 20px;
}

[data-role="dynamic-fields"] > .form-inline + .form-inline {
    margin-top: 0.5em;
}

[data-role="dynamic-fields"] > .form-inline [data-role="add"] {
    display: none;
}

[data-role="dynamic-fields"] > .form-inline:last-child [data-role="add"] {
    display: inline-block;
}

[data-role="dynamic-fields"] > .form-inline:last-child [data-role="remove"] {
    display: none;
}   
    
</style>


<script>

$(function() {
    // Remove button click
    $(document).on(
        'click',
        '[data-role="dynamic-fields"] > .form-inline [data-role="remove"]',
        function(e) {
            e.preventDefault();
            $(this).closest('.form-inline').remove();
        }
    );
    // Add button click
    $(document).on(
        'click',
        '[data-role="dynamic-fields"] > .form-inline [data-role="add"]',
        function(e) {
            e.preventDefault();
            var container = $(this).closest('[data-role="dynamic-fields"]');
            new_field_group = container.children().filter('.form-inline:first-child').clone();
            new_field_group.find('input').each(function(){
                $(this).val('');
            });
            container.append(new_field_group);
        }
    );
});


</script>


<div class="container">
  <div class="col-md-12">
    <!-- Horizontal Form -->
	<div class="panel panel-success">
		<div class="panel-header with-border">
			<h2 class="panel-title text-center">Add Category</h2>
		</div>
		<!-- /.panel-header -->
		<!-- form start -->
		<form class="form-horizontal">
			<div class="panel-body">
			
					<div class="panel-group" id="accordion" role="tablist"
						aria-multiselectable="true">
					</div>
					
					<div class="col-md-12 text-center" style="margin-top:15px;">
						<button class="btn btn-success" id="addButton" value=""><span class="glyphicon glyphicon-plus"></span> Add New Field</button>
					</div>

				
			</div>
			<!-- /.panel-body -->
			<div class="panel-footer">
				<div class="col-sm-offset-3 col-sm-6 text-center">
					
				</div>

			</div>
			<!-- /.box-footer -->
		</form>
	</div>
</div>
</div>


<style>
    #accordion .panel-heading {
    padding: 0;
}

#accordion .panel-title>a {
	display: block;
	padding: 0.4em 0.6em;
	outline: none;
	font-weight: bold;
	text-decoration: none;
}

#accordion .panel-title>a.accordion-toggle::before, #accordion a[data-toggle="collapse"]::before
	{
	content: "\e113";
	float: left;
	font-family: 'Glyphicons Halflings';
	margin-right: 1em;
}

#accordion .panel-title>a.accordion-toggle.collapsed::before, #accordion a.collapsed[data-toggle="collapse"]::before
	{
	content: "\e114";
}
#accordion.panel-group .panel{
	margin-top: 5px;
}
#accordion .actions_div > a {
     font-size: 14px;
    margin-right: 15px;
}
#accordion .actions_div > a.exit-btn {
color:#dd4b39;
}
#accordion .remove_field.exit-btn{
color:#dd4b39;
margin-left:7px;
float: left;
}
    
</style>

<script>
 $(document).ready(function(){
	    var counter = 1;
	    var wrapper = $("#accordion");
	
		 $("#addButton").on("click", function(e){ 
	    	e.preventDefault();
	    	var catgName = prompt("Please Add your category name");
			if(catgName == ''){
				catgName = 'Catg#'+counter;
			}
			if(catgName != null){
				var ariaExpanded = false;
				var expandedClass = '';
				var collapsedClass = 'collapsed';
				if(counter==1){
					  ariaExpanded = true;
					  expandedClass = 'in';
					  collapsedClass = '';
				}
				  $(wrapper).append('<div class="col-sm-12" style="margin-bottom: 0;"><div class="panel panel-default" id="panel'+ counter +'">' + 
				     '<div class="panel-heading" role="tab" id="heading'+ counter +'"><h4 class="panel-title">' +
					 '<a class="'+collapsedClass+'" id="panel-lebel'+ counter +'" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse'+ counter +'" ' +
					 'aria-expanded="'+ariaExpanded+'" aria-controls="collapse'+ counter +'"> '+catgName+' </a><div class="actions_div" style="position: relative; top: -26px;">' +
					 '<a href="#" accesskey="'+ counter +'" class="remove_ctg_panel exit-btn pull-right"><span class="glyphicon glyphicon-remove"></span></a>' +
					 '<a href="#" accesskey="'+ counter +'" class="edit_ctg_label pull-right"><span class="glyphicon glyphicon-edit "></span> Edit</a>' +
					 '<a href="#" accesskey="'+ counter +'" class="pull-right" id="addButton2"> <span class="glyphicon glyphicon-plus"></span> Add child category</a></div></h4></div>' +
					 '<div id="collapse'+ counter +'" class="panel-collapse collapse '+expandedClass+'"role="tabpanel" aria-labelledby="heading'+ counter +'">'+
					 '<div class="panel-body"><div id="TextBoxDiv'+ counter +'"></div><a class="btn btn-xs btn-primary" accesskey="'+ counter +'" id="addButton3" ><span class="glyphicon glyphicon-plus"></span> Add New Attributes</a>' +
					 '<a class="btn btn-xs btn-success" accesskey="'+ counter +'" id="ajax_submit_button" >Done</a></div></div></div></div>');
				counter++;
			}
			
	     });
		 
		var x = 1; 
	     $(wrapper).on("click","#addButton2", function(e){
	         e.preventDefault();
			 var parentId = $(this).attr('accesskey');
			 var parentPanel = '#panel'+ parentId;
			 var catgName = prompt("Please Add your category name");
			 if(catgName == ''){
				catgName = ' P#'+parentId+' Catg#'+counter;
			 }
			if(catgName != null){
				var ariaExpanded = false;
				var expandedClass = '';
				var collapsedClass = 'collapsed';
			
				  $(wrapper).find(parentPanel).append('<div class="col-sm-12" style="margin-bottom: 0;"><div class="panel panel-default" id="panel'+counter+'">' + 
				     '<div class="panel-heading" role="tab" id="heading'+counter+'"><h4 class="panel-title">' +
					 '<a class="'+collapsedClass+'" id="panel-lebel'+ counter +'" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse'+ counter+'" ' +
					 'aria-expanded="'+ariaExpanded+'" aria-controls="collapse'+ counter+'"> '+catgName+' </a><div class="actions_div" style="position: relative; top: -26px;">' +
					 '<a href="#" accesskey="'+counter +'" class="remove_ctg_panel exit-btn pull-right"><span class="glyphicon glyphicon-remove"></span></a>' +
					 '<a href="#" accesskey="'+ counter +'" class="edit_ctg_label pull-right"><span class="glyphicon glyphicon-edit"></span> Edit</a>' +
					 '<a href="#" accesskey="'+ counter +'" class="pull-right" id="addButton2"> <span class="glyphicon glyphicon-plus"></span> Add child category</a></h4></div>' +
					 '<div id="collapse'+ counter+'" class="panel-collapse collapse '+expandedClass+'"role="tabpanel" aria-labelledby="heading'+counter+'">'+
					 '<div class="panel-body"><div id="TextBoxDiv'+ counter +'"></div><a class="btn btn-xs btn-primary" accesskey="'+ counter +'" id="addButton3" ><span class="glyphicon glyphicon-plus"></span> Add New Attributes</a>' +
					 '<a class="btn btn-xs btn-success" accesskey="'+ counter +'" id="ajax_submit_button" >Done</a></div></div></div></div>');
				
				x++;
				counter++;
			}
			
	     });
		 
	     $(wrapper).on("click",".remove_ctg_panel", function(e){ 
				 e.preventDefault(); 
				 var accesskey = $(this).attr('accesskey');
		        $('#panel'+accesskey).remove();
				counter--;
				x--;
	     });
	     
		 
		 
		 
	     var y = 1; 
	     $(wrapper).on("click","#addButton3", function(e){
	         e.preventDefault();
			 var accesskey = $(this).attr('accesskey');
			 y++; 
			 $('#panel'+accesskey).find('#TextBoxDiv'+accesskey).append('<div class="col-md-12 form-group"><input type="text" name="ctgtext[]" class="form-control" style="width: 40%;float: left;"/><a href="#" class="remove_field exit-btn"><span class="glyphicon glyphicon-remove"></a></div>');
	        
	     });
	     
	     $(wrapper).on("click",".remove_field", function(e){
	         e.preventDefault(); 
	     	$(this).parent('div').remove();y--;
	     })
	  	
	     $(wrapper).on("click",".edit_ctg_label", function(e){ 
	    	 var panelId = $(this).attr('accesskey');
			 var catgName = prompt("Please Change your category name");
			 if(catgName == ''){
				   return false;
			 }
			 if(catgName != null){
				 $('#panel'+panelId).find("#panel-lebel"+panelId).html('').html(catgName);
			 }
				
			
     });
  });

</script>