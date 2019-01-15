
				<!------------- form chosne js start --------------->
<link href='<?=$sitepath?>2018js/chosen/multi_seletion.css' rel='stylesheet' type='text/css'>
<script type="text/javascript" src="<?=$sitepath?>2018js/chosen/select2.full.js"></script> 
				<!------------- form chosne js end --------------->
                
                
<script>
	$( ".select2-single, .select2-multiple" ).select2( {
		theme: "bootstrap",
		//placeholder: "Select a State",
		maximumSelectionSize: 20,
		containerCssClass: ':all:'
	} );

	$( ":checkbox" ).on( "click", function() {
		$( this ).parent().nextAll( "select" ).prop( "disabled", !this.checked );
	});
</script>
