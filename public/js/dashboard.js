(function ($)
  { "use strict"
  
	if (window.location.hash !== "" && $(window.location.hash+'[role="pagepanel"]').length) {
		window.scrollTo(0,0);
		$('[role="pagepanel"]').addClass('d-none');
		$(window.location.hash).removeClass('d-none');
	}
  
	$("[role='pageswitch']").click(function(event){
		var hash = this.hash;
		if(this.hash == ""){
			hash = '#list';
			history.pushState({}, '', window.location.href.split('#')[0]);
		}
		event.preventDefault();
		$('[role="pagepanel"]').addClass('d-none');
		$(hash).removeClass('d-none');
	});
	
	$('#input-date').datepicker({
		uiLibrary: 'bootstrap4',
		format: 'yyyy-dd-mm'
	});
	$('#input-time').timepicker({
		uiLibrary: 'bootstrap4',
		format: 'HH:MM'
	});
	
})(jQuery);
