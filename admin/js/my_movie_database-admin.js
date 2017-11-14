(function($) {

    $(document).ready(function() {

        $('#search_mmdb').click(function() {
            var key = $('#key_mmdb').val();
            var posttype;
            $.each($('body').attr('class').split(' '), function(index, className) {
                if (className.indexOf('post-type') === 0) {
                    posttype = className;
                }
            });
            $.ajax({
                type: "POST",
                url: ajaxurl,
                data: {
                    action: 'search_mmdb',
                    posttype: posttype,
                    key: key
                }
            }).done(function(msg) {
                $("#resultHtml").html(msg);
            });
        });

        $("#resultHtml").on("click", ".movie-container", function() {
            duplicate = $(this).clone();

            $("#modal-window-id").html(duplicate);

            $("#movie-modal").trigger("click");
        });

		function mmdb_id_add() {
    		var id_mmdb = $('#TB_ajaxContent #id_mmdb').val();
    		var mmdb_title = $('#TB_ajaxContent .info h2').text();
 			duplicate = $('#modal-window-id').clone();
    		$("#selected-status").html('');
    		$("#selected").html(duplicate);
    		$("#selected #modal-window-id").fadeIn();
    		$("input#MovieDatabaseID").val(id_mmdb);
    		$("#key_mmdb").val(mmdb_title);
			if($("#title").val() == '') {
    			$("#title").val(mmdb_title);
			}
    		tb_remove();
		}

        $("body").on("click", "#mmdb_id_add", function() {
			mmdb_id_add();
        });

        $("body").on("click", "#tb_remove", function() {
			tb_remove();
        });

    });

})(jQuery);
