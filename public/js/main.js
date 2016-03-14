$(function(){
	$("#navHandle").on("click",function(){
		$(".container nav").slideToggle();
	});
	
	// ajax
	$(".nav-type").on("click",function(e){
		e.preventDefault();
		var url = $(this).attr('href');
		History.pushState(null,null,url);
	});
	
	$(".main.group").on('click','.pagination a',function(e){
		e.preventDefault();
		var url = $(this).attr('href');
		History.pushState(null,null,url);
	});
	
	// Bind to StateChange Event
	History.Adapter.bind(window,'statechange',function(){ // Note: We are using statechange instead of popstate
    var state = History.getState(); // Note: We are using History.getState() instead of event.state
           
	var spinner = new Spinner().spin();
	$('.main.group').append(spinner.el);

		$.get(state.url,function(res){
			$('.main.group').empty().append(res);
		});

	});
	
	// Editable ----------------------

	$('[data-editable]').each(function(i,el){
		
		var url = $(el).data("url");
		var options = {
			type:"textarea",
			submit:"OK",
			submitdata:{
				_method:"PUT",
				_token:$("#token").text(),
				column:$(el).data("editable")
			}
		};
		$(el).editable(url,options);
		
	});
	
	
});
