/*
 * slothLoader jQuery plugin
 * version 1.0.2
 *
 * Copyright (c) 2012 Evan Wilkinson ()
 *
 */
 
slothloaderGLobal = 0;
slothloaderPause = false;

(function($){

	var settings = {
		prebuffer: 0
	};

  var methods = {
		init : function(options) {
			
			this.each(function(){
				var $this = $(this),
					data = $this.data('slothLoader'),
						slothLoader = $({
							type: options.type,
							prebuffer:options.prebuffer,
							action:options.action,
							src:$this.attr('src')
					});
				$this.attr('slref','slothLoader');
				if(!data) {
					$(this).data('slothLoader', {
						type: options.type,
						prebuffer:options.prebuffer,
						action:options.action,
						src:$this.attr('src')
					});
				}
				
				// Check to see if its below and replace it
				/*
				if(options.type == "img"){
					var position = $(this).offset().top;
					var documentHeight = $(window).scrollTop() + $(window).height();
					if(documentHeight > (position-options.prebuffer)){
						// Do nothing, they are in sight, all good.
						$(this).attr('src',$(this).attr('data-original'));
						$(this).attr('slref','');
					}
					else {
						$(this).attr('src',options.tempsrc);
						$(this).fadeTo(0,0.1);
					}
				}
				*/
				
			});
			
			// Look to see if any are already in view
			methods.check();
			
			// Bind it!
			methods.bindToWindow();
			
		},
		bindToWindow: function(){
			var bindState = $(window).data.slothLoad;
			if(typeof bindState == "undefined"){
				$(window).bind('scroll.slothLoader', methods.check);
				$(window).data.slothLoad = 1;
			}
		},
		check : function(options){ 
		
			if(!slothloaderPause){
				$('*[slref="slothLoader"]').each(function(){
					var data = $(this).data('slothLoader');
					var position = $(this).offset().top;
					var documentHeight = $(window).scrollTop() + $(window).height();
					if(documentHeight > (position-data.prebuffer) && (position-data.prebuffer != slothloaderGLobal || slothloaderGLobal == 0)){ //
						$(this).attr('slref','');
						if(data.type == "js"){
							// Run JS
							//console.log(position-data.prebuffer+" != "+slothloaderGLobal);
							eval(data.action);
							slothloaderGLobal = (position-data.prebuffer);
						}
						else if(data.type == "img"){
							$(this).attr('src',$(this).attr('data-original'));
							$(this).fadeTo(500,1);
						}
					}
				});
			}
		}
	};
	
	$.fn.slothLoader = function(method){
		if(methods[method]){
			return methods[method].apply(this,Array.prototype.slice.call(arguments,1));
		} else if(typeof method === 'object'||!method){
			return methods.init.apply(this,arguments);
		} else {
			$.error('Method '+ method+' does not exist on jQuery.tooltip');
		}
	};

})( jQuery );