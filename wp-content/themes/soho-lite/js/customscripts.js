jQuery(document).ready(function() {
    var hideWidth = '-73%'; //width that will be hidden
    var collapsibleEl = jQuery('.contentwrapper'); //collapsible element
        var buttonEl =  jQuery("button.collapse"); //button inside element
    jQuery(buttonEl).click(function()
    {
        var curwidth = jQuery(this).parent().offset(); //get offset value of the parent element
        if(curwidth.left>0) //compare margin-left value
        {
            //animate margin-left value to -490px
            jQuery(this).parent().animate({marginLeft: hideWidth}, 300 );
            jQuery(this).html('<span class="genericon genericon-next"></span>'); //change text of button
        }else{
            //animate margin-left value 0px
            jQuery(this).parent().animate({marginLeft: "0"}, 300 );  
            jQuery(this).html('<span class="genericon genericon-previous"></span>'); //change text of button
        }
    });
});
jQuery(document).ready(function(){
var sohobar = function() { 
	if (window.matchMedia('(max-width: 1120px)').matches) {
		jQuery('#leftbar').appendTo('.cbp-spmenu');
  	} else {
		jQuery('#leftbar').appendTo('#headerin');
	}
};
  	jQuery(window).resize(sohobar);
  	sohobar();  
});