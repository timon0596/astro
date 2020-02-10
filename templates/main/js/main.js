jQuery(document).ready(function($) {


	
	header_H = $('header').height();
	footer_H = $('footer').height();
	//console.log( header_H );
	//console.log( footer_H );
	page_min_H = 'calc( 100vh - ' + ( ( header_H + footer_H ) / 16 ) + 'em )';
	$('main').css('min-height', page_min_H );
	// $('.contacts').css('min-height', page_min_H );







	function scrollTo(elem){
		/*
		 *	Отмена предыдущего скроллинга
		 */
		if ( typeof scrollingTo != 'undefined' ) {
				clearInterval(scrollingTo);
		}
		scrollStart = $(document).scrollTop();
		//	Если есть HEADER
		//scrollFinish = $(elem).offset().top - $('header').height();
		scrollFinish = $(elem).offset().top;
		//console.log(scrollStart+' '+scrollFinish);
		scrollingToTime = 0;
		fps = 30;
		scrollingToMaxTime = .5;
		scrollingTo = setInterval(function() {
			if(scrollingToTime >= fps) {
				clearInterval(scrollingTo);
			}
			newScroll = scrollStart + (scrollFinish - scrollStart) * scrollingToTime / fps;
			$(document).scrollTop(newScroll);
			scrollingToTime++;
		},1000*scrollingToMaxTime/fps);
	}




	$('.scrollto').on('click', function(event)
	{
		event.preventDefault();
		to = this.attributes.href.value;
		scrollTo( $(to) );
	});




	function get_GET()
	{
		tmp_GET = location.search.replace(/^[\?]+|[\?]+$/g, "");
		tmp_GET = tmp_GET.split('&');

		_GET = [];
		$.each(tmp_GET, function(i,val)
		{
			val = val.split('=');
			_GET[val[0]] = val[1];
		});

		if ( _GET['filter'] == undefined || typeof(_GET['filter']) == 'function' )
		{
			_GET['filter'] = 1;
		}

		return _GET;
	}










	function default_slider(){
		//console.log( $(document).width() );
		slickCount = $(document).width() > 1136 ? 1136 : $(document).width() ;
		console.log( slickCount );
		slickCount = Math.round(slickCount / 360);
		console.log( slickCount );


		$('.default-slider').slick({
			arrows: false,
			dots: true,
			infinite: true,
			speed: 300,
			slidesToShow: slickCount,
			slidesToScroll: 1,
			adaptiveHeight: true
		});
	}
	default_slider();
	//$('.default-slider').slick('unslick');

	$(window).resize(function() {
		tmpSlickCount = $(document).width() > 1136 ? 1136 : $(document).width() ;
		tmpSlickCount = Math.round(slickCount / 360);
		if ( tmpSlickCount != slickCount )
		{
			$('.default-slider').slick('unslick');
			default_slider();
		}
	});




		var hs = [];
		$.each($('.showhide'), function(k,i) {
			$(i).find('.showhide__title').on('click', function(event) {

				let hs = {}

				hs.title	= $(this);
				hs.box		= hs.title.closest('.showhide');
				hs.content	= hs.box.find('.showhide__content');

				hs.act = hs.box.hasClass('showhide__act');

				$('.showhide').toggleClass('showhide__act', false);
				hs.box.toggleClass('showhide__act', !hs.act);

				console.log(hs);
				// let hs_title	= $(this);
				// let hs			= hs_title.closest('.showhide');
				// let hs_content	= showhide.find('.showhide__content');
			});
		});

		console.log(hs);











	try {
		function reviews_slider(){
				//console.log( $(document).width() );
				slickCount = $(document).width() > 1136 ? 1136 : $(document).width() ;
				console.log( slickCount );
				slickCount = Math.round(slickCount / 360);
				console.log( slickCount );
				let arr=true
				let dts=false
				if(slickCount<=2){
					arr=false
					dts=true
				}
				$('.reviews__slider').slick({
					arrows: arr,
					dots: dts,
					infinite: true,
					speed: 300,
					slidesToShow: slickCount,
					slidesToScroll: slickCount,
					slidesToScroll: 1,
					adaptiveHeight: true
				});
			}
			reviews_slider();

			$(window).resize(function() {
				tmpSlickCount = $(document).width() > 1136 ? 1136 : $(document).width() ;
				tmpSlickCount = Math.round(slickCount / 360);
				if ( tmpSlickCount != slickCount )
				{
					$('.reviews__slider').slick('unslick');
					reviews_slider();
				}
			});
	} catch(e) {
		// statements
		console.log(e);
	}

	let services_sliderslickCount

	try {

			function services__slider(){
				//console.log( $(document).width() );
				slickCount = $(document).width() > 1136 ? 1136 : $(document).width() ;
				console.log( slickCount );
				slickCount = Math.round(slickCount / 360);
				console.log( slickCount );


				$('.services__slider').slick({
					arrows: false,
					dots: true,
					infinite: true,
					speed: 300,
					slidesToShow: slickCount,
					slidesToScroll: 1,
					adaptiveHeight: true
				});
				if($(document).width()>1136){
					$('.services__slider').slick('unslick');
				}
			}
			services__slider();
			//$('.default-slider').slick('unslick');

			function services__slider_reload()
			{
				tmpSlickCount = $(document).width() > 1136 ? 1136 : $(document).width() ;
				tmpSlickCount = Math.round(slickCount / 360);
				if ( tmpSlickCount != slickCount )
				{
					$('.services__slider').slick('unslick');
					services__slider();
				}
			}

			$(window).resize(function() {
				services__slider_reload();
			});

		
	} catch(e) {
		// statements
		console.log(e);
	}

	let dropdowntabs = $('.tabs__item')

	dropdowntabs.on('click', function(event){
		$(this).parent().toggleClass('tabs__items_show')
		dropdowntabs.removeClass('tabs__item_act')
		$(this).addClass('tabs__item_act')
	});

	$(document).on('click',function(event){
		if($(event.target).closest('.tabs__items').length==0){
			$('.tabs__items_show').removeClass('tabs__items_show')
		}
	})
	
	


	let advances__sliderslickCount
	let tmpadvances__sliderslickCount

	function advances__slider(){
		//console.log( $(document).width() );
		slickCount = $(document).width() > 1136 ? 1136 : $(document).width() ;
		console.log( slickCount );
		slickCount = Math.round(slickCount / 360);
		console.log( slickCount );


		$('.advances__slider').slick({
			arrows: false,
			dots: true,
			infinite: true,
			speed: 300,
			slidesToShow: slickCount,
			slidesToScroll: 1,
			adaptiveHeight: true
		});
		if($(document).width()>1136){
			$('.advances__slider').slick('unslick');
		}
	}
	advances__slider();
	//$('.default-slider').slick('unslick');

	$(window).resize(function() {
		tmpSlickCount = $(document).width() > 1136 ? 1136 : $(document).width() ;
		tmpSlickCount = Math.round(slickCount / 360);
		if ( tmpSlickCount != slickCount )
		{
			$('.advances__slider').slick('unslick');
			advances__slider();
		}
	});

	
	

	







	$(document).on('click', '.open-popup', function(event)
	{
		window.pop_up_open( this.id );
	});
	$('.pop-up').on('click', function(event)
	{
		if ( window.pop_up_close(event.target) )
		{
			//	Если выполняя функцию закрытия всплывающее окно Закрылось
		}
	});








	/*$( '.ajax *[type=submit]' ).on( 'click', function( event )
	{
		event.preventDefault();
		target = event.target;

		inps = $(event.target).closest('form').find('input, select, textarea');

		submit = true;
		get_values = [];
		$.each(inps, function(key,item) {
			if ( item['name'] != '' && item['value'] != '' )
			{
				get_values[key] = item['name'] + '=' + encodeURIComponent(item['value']);
			}
			if ( $(item).prop("required") )
			{
				$(item).toggleClass('alert', false);
				if ( !$(item)[0].checkValidity() ) {
					$(item).toggleClass('alert', true);
					event.preventDefault();
					submit = false;
				}
			}
		});

		if ( submit )
		{
			get_values = get_values.join('&');


			console.log( '/compilation/mail/callback?' + get_values );
			$.ajax({
				url: '/compilation/mail/callback?' + get_values,
				success: function(data){
					console.log(data);
					if ( data == 1 )
					{
						$.each(inps, function(key,item) {
							item['value'] = null;
						});
						window.pop_up_close( $(target).closest('section') );
						window.pop_up_open('complete');
					}
				}
			});
		}
	});*/




	function validate_form(form)
	{
		inps = $(form).find('input, select, textarea');

		submit = true;

		$.each(inps, function(key,item) {
			if ( $(item).prop("required") )
			{
				$(item).toggleClass('alert', false);
				if ( !$(item)[0].checkValidity() ) {
					$(item).toggleClass('alert', true);
					event.preventDefault();
					submit = false;
				}
			}
		});

		return submit;
	}



	$( '.ajax *[type=submit]' ).on( 'click', function( event )
	{
		
		event.preventDefault();
		target = event.target;

		form = $(this).closest('form');
		method = $(form).data('method') || 'callback';

		console.log(form);

		let formData = new FormData(form[0]);
		let uploadUrl = '/compilation/mail/'+method;

		console.log(uploadUrl);

		if (validate_form(form))
		{
			$.ajax({
				url: uploadUrl,
				type: 'POST',
				xhr: function() {
					var myXhr = $.ajaxSettings.xhr();
					return myXhr;
				},
				success: function (data) {

					console.log(data);
					if ( data == 1 )
					{
						$(form)[0].reset();
						window.pop_up_close( $(target).closest('section') );
						window.pop_up_open('complete');
					}
					
				},
				data: formData,
				cache: false,
				contentType: false,
				processData: false
			});
		}
	});












	function tabs_init()
	{
		$('.tabs__item').toggleClass('tabs__item_act',false);
		$('.tabs__content').toggleClass('tabs__content_act',false);

		$.each($('.tabs'),function(k,i) {
			tabs = $(i).find('.tabs__item');
			contents = $(i).find('.tabs__content');

			tabs.eq(0).toggleClass('tabs__item_act',true);
			contents.eq(0).toggleClass('tabs__content_act',true);
		});
	}
	tabs_init();

	$('.tabs__item').on( 'click', function(event) {
		
		tabs = $( this ).closest('.tabs').find('.tabs__item').toggleClass( 'tabs__item_act', false );
		$( this ).toggleClass( 'tabs__item_act', true );
		tab_i = tabs.index( this );
		tab_contents = $(this).closest('.tabs').find('.tabs__content');
		tab_contents.toggleClass('tabs__content_act',false);
		$(tab_contents[tab_i]).toggleClass('tabs__content_act',true);
		services__slider_reload();
		console.log(tab_contents);
	});






	/*$('.block-content-next').on( 'click', function(event) {

		block_tab_contents = $(this).closest('.block-tab-contents').find('.block-tab-content');

		$.each( block_tab_contents, function( key, item ) {
			if( $( item ).hasClass('act') )
			{
				index = key;
				return;
			}
		});
		new_index = ( ( index + 1 ) >= block_tab_contents.length ? 0 : index + 1 );

		block_tab_contents.toggleClass( 'act', false );
		block_tab_contents.eq(new_index).toggleClass( 'act', true );

	});*/








	$('.burger, .nav__open').on('click', function(event)
	{
		$('.mobile.menu').toggleClass('act');
		$('body').toggleClass('noscrolling', true);
		$('.mobile.menu .panel').css('overflow-y', 'scroll');
	});

	$('.mobile.menu .close, .mobile.menu.close').on('click', function(event)
	{
		$('body').toggleClass('noscrolling', false);
	});

	$('.mobile.menu').on('click', function(event)
	{
		if ( $(event.target).hasClass('close') === true )
		{
			$('.mobile.menu').toggleClass('act', false);
		}
	});


	$('.more').on('click', function(event) {
		moreList = $(this).closest('.tab-content').find('.item.d-n');
		console.log(moreList);
		for (var i = 0; i < 8; i++)
		{
			if ( moreList[i] != undefined )
			{
				$(moreList[i]).toggleClass('d-n',false);
			}
			else
			{
				$(this).toggleClass('d-n',true);
			}
		}	
	});





	moreMax = 8;

	$('.open-more').on('click', function(event) {
		console.log('more');
		more = $(this).closest('section').find('.text-more');
		console.log(more.length);
		moreLinght = more.length < moreMax ? more.length : moreMax;
		for (var i = 0; i < moreLinght; i++)
		{
			$(more).eq(i).toggleClass('text-more', false);
		}

		if ( $(this).closest('section').find('.text-more').length == 0 )
		{
			$(this).toggleClass('act',false);
		}
	});

	$(document).on('click', '.open-callback', function(event)
	{
		event.preventDefault();


		window.pop_up_open('callback');
	});


	
})