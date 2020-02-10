jQuery(document).ready(function($) {

	/*
	 *
	 *	БАЗОВЫЙ НАБОР СКРИПТОВ
	 *
	 */


	window.test = function test(str) {

		console.log(str);

	}
	//test();




	/*
	 *	Открытие и Закрытие встплывающих окон
	 */
	window.pop_up_open = function pop_up_open(id) {
		$('#'+id+'.pop-up').toggleClass('act',true);
		//console.log( $(document).scrollTop() );
		$('body').toggleClass('noscrolling',true);
	}
	window.pop_up_close = function pop_up_close(elem) {
		if($(elem).closest('.noclose').length == 0 || $(elem).hasClass('close') || $(elem).hasClass('close-popup')) {
			$($(elem).closest('.pop-up')).toggleClass('act',false);
			if( $('.pop-up.act').length < 1 )
			{
				$('body').toggleClass('noscrolling',false);
			}
			return true;
		}
		return false;
	}


	window.setLocation = function setLocation(curLoc){
		//console.log( location.search );
		try {
			history.pushState(null, null, curLoc);
			return;
		}
		catch(e){}
		//location.search = curLoc;
		location.href = pathname + curLoc;
	}




	// $('.anim-in')/*.addClass('hidden')*/.viewportChecker({
	// 	classToRemove: 'hidden',
	// 	classToAdd: 'animated visible fadeIn',
	// 	offset: -50
	// });
	$('.anim-in-l')/*.addClass('hidden')*/.viewportChecker({
		classToRemove: 'hidden',
		classToAdd: 'animated visible fadeInLeft',
		offset: -50
	});
	$('.anim-in-r')/*.addClass('hidden')*/.viewportChecker({
		classToRemove: 'hidden',
		classToAdd: 'animated visible fadeInRight',
		offset: -50
	});
	$('.anim-in-up')/*.addClass('hidden')*/.viewportChecker({
		classToRemove: 'hidden',
		classToAdd: 'animated visible fadeInUp',
		offset: -50
	});
	$('.anim-in-down')/*.addClass('hidden')*/.viewportChecker({
		classToRemove: 'hidden',
		classToAdd: 'animated visible fadeInDown',
		offset: -50
	});

	$('.anim-group-in')/*.addClass('hidden')*/.viewportChecker({
		offset: -50,
		/*classToRemove: 'hidden',*/
		callbackFunction: function(elem, action){
			chid = 0;
			chelem = [];
			elem.find('.anim-item').each(function() {
				chelem[chid] = this;
				$(this).toggleClass('hidden',true);
				chid++;
			});
			isum = 1;
			$.each(chelem, function(i,val) {
				//console.log(i);
				isum += 1 / (i+1);
				setTimeout(function() {
					$(val).toggleClass('hidden', false);
					$(val).toggleClass('animated');
					$(val).toggleClass('fadeIn');
				}, 300*isum);
			});
		}
	});

	$('.anim-group-in-up')/*.addClass('hidden')*/.viewportChecker({
		offset: -50,
		/*classToRemove: 'hidden',*/
		callbackFunction: function(elem, action){
			chid = 0;
			chelem = [];
			elem.find('.anim-item').each(function() {
				chelem[chid] = this;
				$(this).toggleClass('hidden',true);
				chid++;
			});
			isum = 1;
			$.each(chelem, function(i,val) {
				//console.log(i);
				isum += 1 / (i+1);
				setTimeout(function() {
					$(val).toggleClass('hidden', false);
					$(val).toggleClass('animated');
					$(val).toggleClass('fadeInUp');
				}, 300*isum);
			});
		}
	});

	$('.anim-group-in-l')/*.addClass('hidden')*/.viewportChecker({
		offset: -50,
		/*classToRemove: 'hidden',*/
		callbackFunction: function(elem, action){
			chid = 0;
			chelem = [];
			elem.children('.anim-item').each(function() {
				chelem[chid] = this;
				$(this).toggleClass('hidden',true);
				chid++;
			});
			isum = 1;
			$.each(chelem, function(i,val) {
				//console.log(i);
				isum += 1 / (i+1);
				setTimeout(function() {
					$(val).toggleClass('hidden', false);
					$(val).toggleClass('animated');
					$(val).toggleClass('fadeInLeft');
				}, 300*isum);
			});
		}
	});

	$('.anim-group-in-r')/*.addClass('hidden')*/.viewportChecker({
		offset: -50,
		/*classToRemove: 'hidden',*/
		callbackFunction: function(elem, action){
			chid = 0;
			chelem = [];
			elem.children('.anim-item').each(function() {
				chelem[chid] = this;
				$(this).toggleClass('hidden',true);
				chid++;
			});
			isum = 1;
			$.each(chelem, function(i,val) {
				//console.log(i);
				isum += 1 / (i+1);
				setTimeout(function() {
					$(val).toggleClass('hidden', false);
					$(val).toggleClass('animated');
					$(val).toggleClass('fadeInRight');
				}, 300*isum);
			});
		}
	});




	/*$(function(){
		$(".phonemask").mask("+7(999) 999-9999");
	});*/
	$(function(){
		$( 'input[type=tel]' ).mask("+7(999) 999-9999",{autoclear: false});
	});

	$.fn.setCursorPosition = function(pos) {
	  if ($(this).get(0).setSelectionRange) {
	    $(this).get(0).setSelectionRange(pos, pos);
	  } else if ($(this).get(0).createTextRange) {
	    var range = $(this).get(0).createTextRange();
	    range.collapse(true);
	    range.moveEnd('character', pos);
	    range.moveStart('character', pos);
	    range.select();
	  }
	};

	var posVal = 3;
	$('input[type="tel"]').change(function(){
	    tmpval = $(this).val();
	    if(tmpval == '') {
	    	posVal = 3;
	    } else {
	    	val = tmpval.split('_')[0];
	    	//console.log(val.length, 1);
	    	posVal = val.length;
	    }
	});
	$('input[type="tel"]').click(function(){
	    $(this).setCursorPosition( posVal );  // set position number
	});

})