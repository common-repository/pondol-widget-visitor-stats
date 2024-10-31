<script type="text/javascript" >
jQuery(document).ready(function($) {

	
	
	// since 2.8 ajaxurl is always defined in the admin header and points to admin-ajax.php
	$("#pondolwidget_visitor_stats_save_option_form").submit(function(e){
		e.preventDefault();
		
		var data = {
			action: 'pondol_visitor_saveoption',
			pondolwidget_visitor_stats_save_option:1,
			pondol_widget_visitorstats_skin: $("#pondol_widget_visitorstats_skin").val(),
			pondol_widget_visitorstats_display:$("#pondol_widget_visitorstats_display").is(':checked'),
			pondol_widget_visitorstats_log_delete:$("#pondol_widget_visitorstats_log_delete").is(':checked'),
			pondol_widget_visitorstats_copyright:$("#pondol_widget_visitorstats_copyright").is(':checked')
		};
	
		$.post(ajaxurl, data, function(response) {
			//console.log(response);
			//eval("var obj="+response);
			alert("saved");
		});
	});
	
	$("#pondol_paypal").click(function(){
		$("#pondol_paypal_submit_form").submit();
	});

});
</script>


<div class="form-wrap">
<form action="https://www.paypal.com/cgi-bin/webscr"  id="pondol_paypal_submit_form" method="post" target="_blank">
<input type="hidden" name="cmd" value="_s-xclick">
<input type="hidden" name="encrypted" value="-----BEGIN PKCS7-----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-----END PKCS7-----
">
</form>

<form id="pondolwidget_visitor_stats_save_option_form" method="post" action="" class="">
	<div class="form-field">
		<label for="pondol_widget_visitorstats_display"><?php _e("show in front-end", "pondolwidget_visitor_stats"); ?></label>
		<input  type="checkbox" name="pondol_widget_visitorstats_display" id="pondol_widget_visitorstats_display" style="width:16px;"<?php echo $options["pondol_widget_visitorstats_display"] == "true"? " checked":"";?>>
		<p><?php _e("This will be in front-end. if you want to not display and just see this in back-end,  uncheck.", "pondolwidget_visitor_stats"); ?></p>
	</div>
	
	<div class="form-field">
		<label for="pondol_widget_visitorstats_skin"><?php _e("Select Skin", "pondolwidget_visitor_stats"); ?></label>
		<select name="pondol_widget_visitorstats_skin" id="pondol_widget_visitorstats_skin" class="postform">
			<?php foreach($skins as $key => $val){
				$selected	= $options["pondol_widget_visitorstats_skin"]	== $val["name"] ? " selected":"";
				echo '<option value="'.$val["name"].'"'.$selected.'>'.$val["name"].'</option>';
			}
			?>
		</select>
		<p><?php _e("This skin will be displayed on frontend", "pondolwidget_visitor_stats"); ?></p>
	</div>
	
	<div class="form-field">
		<label for="pondol_widget_visitorstats_log_delete"><?php _e("Automatically delete logs", "pondolwidget_visitor_stats"); ?></label>
		<input  type="checkbox" name="pondol_widget_visitorstats_log_delete" id="pondol_widget_visitorstats_log_delete" style="width:16px;"<?php echo $options["pondol_widget_visitorstats_log_delete"] == "true"? " checked":"";?>>
		<p><?php _e("Log will be deleted 3 months ago, but staticsts still available.", "pondolwidget_visitor_stats"); ?></p>
	</div>
	
	
	<div class="form-field">
		<label for="pondol_widget_visitorstats_copyright">display copyright</label>
		<input  type="checkbox" name="pondol_widget_visitorstats_copyright" id="pondol_widget_visitorstats_copyright" style="width:16px;"<?php echo $options["pondol_widget_visitorstats_copyright"] == "true"? " checked":"";?>>
		<p><?php _e("If you want to hide copyright, donate then uncheck this checkbox.", "pondolwidget_visitor_stats"); ?></p>
		<p>

			<img id="pondol_paypal"src="https://www.paypal.com/en_US/i/btn/btn_donateCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!" style="width:146px">

	</p>
	</div>
	
	<p class="submit"><input type="submit" name="submit" id="submit" class="button button-primary" value="<?php _e("Save", "pondolwidget_visitor_stats"); ?>"></p></form></div>

</form>

</div>


