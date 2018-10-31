$(document).on('click', ".status", function () {
	var ajaxloading=false;

        var id = $(this).attr('data-id');
        var status = $(this).attr('data-status');
        var confirm1 = $(this).attr('confirm');
		
        var current = $(this);
        var btn_text = current.html();
        if (typeof status_change_url !== 'undefined') {
            var status_url = status_change_url;
            // the variable is defined
        } else {
            var status_url = 'quick-status';
        }
        if(ajaxloading==false){
			if(confirm1){
				if(status==1){
					var msg = "deactivate";
				} else {
					var msg = "activate";
				}
				var res = confirm("Are you sure to " + msg + " " + confirm1 + "?");
			} else {
				var res = true;
			}
			if(res){
				ajaxloading = true;
				current.LoadingOverlay('show');
				$.post(status_url,{'id':id, 'status_token':1}, function(data){

					if(data.result==1){
						if(data.action=="Active"){
							current.removeClass('btn-success').addClass('btn-danger');
							current.attr('data-status',1);
							current.html('Inactive');
						} else {
							current.removeClass('btn-danger').addClass('btn-success');
							current.attr('data-status',0);
							current.html('Active');
						}

						current.LoadingOverlay('hide');
					} else {
						current.html(btn_text);
						current.LoadingOverlay('hide');
					}
				}).fail(function(xhr, ajaxOptions, thrownError) { //any errors?

					alert(thrownError); //alert with HTTP error


				});
				ajaxloading = false;
			} else {
				return;
			}
        }
    });

function addmore(e){
	var html = $(e).parent().html();
	$(e).parent().append(html);
	$(e).remove();

}