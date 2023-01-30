(function ($)
  { "use strict"
  
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
  
	$('#start-date').datepicker({
		uiLibrary: 'bootstrap4',
		format: 'yyyy-dd-mm'
	});
	$('#end-date').datepicker({
		uiLibrary: 'bootstrap4',
		format: 'yyyy-dd-mm'
	});
    $('.custom-file-input').change('change', function (e) {
      var name = $("#customFileInput").val().split('\\').pop();
	  $(this).next().text(name);
    })
	
})(jQuery);
