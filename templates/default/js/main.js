jQuery(document).ready(function($) {

	if ( $('.filters ul').length > 0 )
	{
		filulid = $('.filters ul').attr('id').split('-');
		href = '?'+filulid[0]+'='+filulid[1];
		get_goods( href, false, false );
	}
	basket_action( 'get' );


	/*//	Получаем get параметры
	var params = window.location.search.replace('?','').split('&').reduce( function(p,e)
		{
			var a = e.split('=');
			if ( a.length < 2 ) return false;
			p[ decodeURIComponent(a[0])] = decodeURIComponent(a[1]);
			return p;
		},
		{}
	);
	console.log( params );

	if ( params )
	{
		scrollTo( $('#goods .filters') );
	}*/




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
	$('.scrollto').on('click', function(event) {
		event.preventDefault()
		to = this.attributes.href.value;
		scrollTo( $(to) );
	});




	//	Клик по ссылке на главной странице
	$('#page-index a').on( 'click', function(event)
	{
		//	console.log( $(this).attr('href').indexOf('/?') );


		href = $(this).attr('href');
		if ( href !== undefined && href !== false )
		{
			//	Если ссылка начинается с /?
			if ( href.indexOf('/?') === 0 )
			{
				//	Отменяем переход
				event.preventDefault();
				href = href.substr(1);

				//	Выполняем функцию
				//	. . . 
				get_goods(href);
				/*print_goods(href);*/

				$('body').toggleClass('noscrolling', false);
				$('#menu.pop-up').toggleClass('act', false);

				$('.filters li').toggleClass('act', false);
				$.each( $('.filters li a'), function(i,val)
				{
					if ( $(val).attr('href') == '/'+href )
					{
						$($(val).closest('li')[0]).toggleClass('act', true);
						return;
					}
				});


				scrollTo( $('#goods .filters') );
			}
		}
	});



	
	function get_goods( href, setloc = true, print = true )
	{
		//	Задаем id фильтрам соответствующий показанным категориям
		link = href.split('?')[1].split('=');
		$('.filters ul').attr('id', link[0]+'-'+link[1] );
		//	Выполняем jax запрос
		$.ajax({
			url: '/compilation/goods/getArr?'+link[0]+'='+link[1],
			success: function(data){
				//	Парсим json строку
				tmp = $.parseJSON(data);
				//	Перезаписываем переменную товаров
				goods = tmp['json'];
				console.log('Goods:');
				console.log(goods);
				//	Если необходимо распечатать товары
				if ( print )
				{
					//	Заменяем html код блока товаров
					$('#goods .list').html( tmp['html'] );
				}
					
				
				//	Если установлено изменение строки браузера
				if ( setloc )
				{
					//	Меняем строку браузера
					window.setLocation(href);
				}
				
			}
		});
		
	}

	function get_good(id)
	{
		console.log(id);

		good = goods[id];

		console.log(goods);
		console.log(good);

		$('#preview .good .item').attr( 'id', id );
		$('#preview .good .title').html( good['title'] );
		$('#preview .good .img').css( 'background-image', 'url('+good['img']['mid']+')' );
		$('#preview .good .description').html( good['description'] );
		$('#preview .good .weight .value').html( good['properties']['weight'] );
		$('#preview .good .price .value').html( good['value'] );
		console.log( good['similar'].length );
		for (var i = 0; i <= 4; i++) {
			if ( good['similar'].length >= i+1 )
			{
				$('#preview .similar .similar-'+i).css('display', '');
				$('#preview .similar .similar-'+i).attr( 'id', good['similar'][i] );
				$('#preview .similar .similar-'+i+' .img').css( 'background-image', 'url('+goods[good['similar'][i]]['img']['min']+')' );
				$('#preview .similar .similar-'+i+' .title').html( goods[good['similar'][i]]['title'] );
			}
			else
			{
				$('#preview .similar .similar-'+i).css('display', 'none');
			}

		}
	}

	//	Повтор ajax на главной странице при нажатии кнопок браузера
	window.onpopstate = function(event) {
		if ( $('#page-index').length > 0 )
		{
			//print_goods( location.search, false );
		}
		
	}




	$(document).on('click', '.open-preview', function(event)
	{
		event.preventDefault();

		get_good( $(this).closest('.item').attr('id') );


		window.pop_up_open('preview');
	});


	$('#preview .nav.prev').on('click', function(event)
	{
		get_good( goods[$(this).closest('.item').attr('id')]['prev'] );
	});
	$('#preview .nav.next').on('click', function(event)
	{
		get_good( goods[$(this).closest('.item').attr('id')]['next'] );
	});





	$('.open-menu').on('click', function(event)
	{
		event.preventDefault();
		window.pop_up_open('menu');
	});
	$('.pop-up').on('click', function(event)
	{
		//	Если выполняя функцию закрытия всплывающее окно Закрылось
		if ( window.pop_up_close(event) )
		{
			//	если закрылось окно именно #case
			if ( $(event.target).closest('#case').length > 0 )
			{
				//	очищаем содержимое окна #case
				$('#case .ajax').html('');
			}
		}
	});







	function basket_refresh( data = null, id = null )
	{
		//console.log(data);
		basket = data;
		basket_info();

		if ( $('#page-basket').length > 0 )
		{
			basket_list(id);
		}
	}

	
	function basket_action( action, id = null, count = null )
	{
		console.log( action, id, count );
		$.ajax({
			url: '/compilation/basket/'+action+'?id='+id+'&count='+count,
			success: function(data)
			{
				basket_refresh( $.parseJSON(data), id );
			}
		});
	}


	$(document).on('click', '.plus-basket', function(event)
	{
		tmpid = $(event.target).closest('.item')[0].id;
		basket_action( 'plus', tmpid );
	});

	$(document).on('click', '.minus-basket', function(event)
	{
		tmpid = $(event.target).closest('.item')[0].id;
		basket_action( 'minus', tmpid );
	});

	$(document).on('click', '.del-basket', function(event)
	{
		tmpid = $(event.target).closest('.item')[0].id;
		basket_action( 'del', tmpid );
	});

	$(document).on('click', '.clear-basket', function(event)
	{
		basket_action( 'clear' );
	});





	$(document).scroll(function(event){
		if ( $('.filters ul').length > 0 )
		{
			if ( $(document).scrollTop() >= $('#goods .filters').offset().top )
			{
				$('#goods .filters ul').toggleClass('fix', true);
			}
			else
			{
				$('#goods .filters ul').toggleClass('fix', false);
			}
		}
	})




	function basket_info()
	{
		console.log( basket );

		count = 0;
		price = 0;
		$.each(basket, function(i,val)
		{
			count += val['count'];
			price += val['price'] * val['count'];
		});
		if ( count > 0 )
		{
			$('footer .basket-info').toggleClass('act', true);
			$('footer .basket-info .count').html(count);
			$('footer .basket-info .char').html( char_ending(count) );
			$('footer .basket-info .price').html(price);
		}
		else
		{
			$('footer .basket-info').toggleClass('act', false);
		}
	}




	function basket_list( id = null )
	{
		console.log( basket );
		sum = 0;
		$.each(basket, function(i,val)
		{
			count = val['count'];
			price = val['price'] * val['count'];

			sum += price;

			//console.log(i,count,price);

			$('#page-basket .goods #'+i+' .count .value').html(count);
			$('#page-basket .goods #'+i+' .price .value').html(price);
		});

		if ( id !== null )
			console.log(id);
			console.log(basket[id]);
			if ( basket[id] == undefined || basket[id] == 0 )
			{
				$('#page-basket .goods #'+id).css('display', 'none');
			}
			else
			{
				$('#page-basket .goods #'+id).css('display', '');
			}
		{
			//$('#page-basket .goods #'+i).css('display', 'none');
		}

		$('#page-basket .goods .totals .sum0 .value').html(sum);
	}




	function char_ending( value, char = 'товар' ) {
		ves = Math.round((value / 10)%1*10);
		vds = Math.round((value - ves)/100%1*10);
		//console.log(vds,ves);
		if(ves == 1 && vds != 1) {
			ending = '';
		}
		else {
			if(ves >= 2 && ves <= 4 && vds != 1) {
				ending = 'а';
			}
			else {
				ending = 'ов';
			}
		}
		return (char+ending);
	}






	$('#page-basket .tab').on('click', function(event) {
		$('.tab').toggleClass('act', false);
		$(this).toggleClass('act', true);
		$('.tab-content').toggleClass('act', false);
		$('#tab-content-'+this.id.split('-')[1]).toggleClass('act', true);
	});
})