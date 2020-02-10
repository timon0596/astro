jQuery(document).ready(function($) {







	/*function preloadGallery()
	{
		gall = $('.gallery');
		gid = 0;
		list = $($('.gallery')[gid]).find('.gallery-item');

		pswpElement = $(document).find('.pswp')[0];

		
		items = [];
		size = 900;
		$.each($(gall).find('a'), function(index,elem) {
			items[index] = {
				src: elem.href,
				w: size * ratio[index],
				h: size,
				msrc: $(elem).find('img')[0].src
			}
		});
	}
	preloadGallery();*/





	//$('.image.d-n').css('display', 'none');
	function gallery(obj,wrap,img/*maxH*/) {
		el  = [];
		ratio  = [];

		$.each(obj.find(img), function(i,elem) {
			el[i] = elem;
			g = $('.gallery').index( $(elem).closest('.gallery') );
			if ( ratio[g] == undefined )
			{
				ratio[g] = [];
			}
			ratio[g].push( $(elem).width() / $(elem).height() )
		});

		console.log('ratio',ratio);

			$('.image.d-n').css('display', 'block');
			$('.image').css( 'width', '100%' );
			$('.image').css( 'height', '100%' );
	}




	function openPhotoSwipe(event) {
		gall = $(event.target).closest('.gallery');
		//console.log(gall);
		gid = $('.gallery').index(gall);
		//console.log(gid);
		photo = $(event.target).closest('.gallery-item');



		//list = $($('.gallery')[gid]).find('.gallery-item');
		/*if ( $(document).width() > 960 )
		{
			list = $($('.gallery')[gid]).find('slick-active .gallery-item');
		}
		else
		{
			list = $($('.gallery')[gid]).find('.gallery-item');
		}*/
		console.log('!!!!!!!!!!!!!!!!!!!!!!!!!');

		
		list = $($('.gallery')[gid]).find('.gallery-item');
		console.log('list',list);




		pid = list.index(photo);
		console.log('pid',pid);

		pswpElement = $(document).find('.pswp')[0];

		items = [];
		//size = 900;
		$.each($(gall).find('a'), function(index,elem) {
			console.log( gid, index/*, ratio[gid][index], $(elem).data('ratio')*/ );
			items[index] = {
				src: elem.href,
				/*w: size * $(elem).data('ratio'),
				h: size,*/
				w: $(elem).data('w'),
				h: $(elem).data('h'),
				//msrc: $(elem).find('img')[0].src
			}
		});

		options = {
			index: pid,
			galleryUID: gid,
			showHideOpacity: true
		};
		console.log( items );
		var gallery = new PhotoSwipe( pswpElement, PhotoSwipeUI_Default, items, options);
		gallery.init();
	}



	
	$(window).bind('load', function() {
		//gallery($('.gallery'),'.item','.image',240);
		/*$(window).resize(function(){
			gallery($('.gallery'),'.item','.image',240);
		});*/


		console.log('gall_images_info()');
		//console.log(gall_images_info());
	});

	$('.gallery .gallery-item').on('click', function(event) {
		event.preventDefault();
		openPhotoSwipe(event);
	});
})