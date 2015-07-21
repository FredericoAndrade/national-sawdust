$(function(){
	// filter related-posts & weed out duplicates
	var found = {};
	$('.related-post').each(function(){
	    var $this = $(this);
	    if(found[$this.data('id')]){
	         $this.remove();   
	    }
	    else{
	         found[$this.data('id')] = true;   
	    }
	});
})