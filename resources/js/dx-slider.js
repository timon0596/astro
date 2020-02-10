jQuery(document).ready(function($) {

	/*
	 *	SLIDER
	 */



	 //
	function slider_init() {
		//console.log($('.dx-slider'));
		dxSlider = [];
		dxMaxSlideTime = [];
		dxMaxSlideTransition = [];
		dxSlide = [];
		dxSlideLast = [];
		dxSlidePrev = [];

		dxSliderContent = [];
		dxSliderBG = [];
		//console.log($('.dx-slider').length);
		if($('.dx-slider').length > 0) {
			$('.dx-slider').each(function(index) {
				//console.log();

				dxSlider[index] = this;
				//console.log($(this).find('.slider-content').length);
				dxSlideLast[index] = $(this).find('.slider-content').length - 1;

				$(this.classList).each(function(i,value) {
					//console.log(value.split('-'));
					tmpSplit = value.split('-');
					//console.log(tmpSplit);
					if(tmpSplit[0] == 'slide' && tmpSplit[1] == 'time' && tmpSplit.length == 3) {
						dxMaxSlideTime[index] = tmpSplit[2];
					}
					if(tmpSplit[0] == 'slide' && tmpSplit[1] == 'transition' && tmpSplit.length == 3) {
						dxMaxSlideTransition[index] = tmpSplit[2];
					}

				});
				if(!dxMaxSlideTime[index]) {
					dxMaxSlideTime[index] = 240;
				}
				if(!dxMaxSlideTransition[index]) {
					dxMaxSlideTransition[index] = 60;
				}
				
				//console.log($(this).find('.slider-content'));
				//console.log($(this).find('.slider-content').length);
				//console.log($(this).find('.slider-bg').length);
				dxSliderSwitches = ($(this).find('.slider-content').length > 1 ? true : false);
				dxSliderBgs = (($(this).find('.slider-bg').length >= $(this).find('.slider-content').length) && dxSliderSwitches ? true : false);
				//console.log(dxSliderBgs);

				dxSliderContent[index] = [];
				dxSliderBG[index] = [];
				$(this).find('.slider-content').each(function(i,el) {
					dxSliderContent[index][i] = el;
				});
				$(this).find('.slider-bg').each(function(i,el) {
					dxSliderBG[index][i] = el;
				});




				$(this).find('.slider-bg').each(function(i,el) {
					//console.log(el);
					$(el).css('top',(i * (-100))+'%');
					$(el).css('position','relative');
						/*$('.slider-bgs').children().each(function(index) {
							$(this).css('top',(index * (-100))+'%');
							//console.log($(this));
						});*/
				});
				$(this).find('.slider-color').css('top',($(this).find('.slider-bg').length * (-100))+'%');
				$(this).find('.slider-color').css('position','relative');

				if($(this).find('.slider-switches').length > 0 && dxSliderSwitches) {
					$(this).find('.slider-switches').html(null);
					for (var i = 0; i < $(this).find('.slider-content').length; i++) {
						$(this).find('.slider-switches').append('<div class="slider-switch"></div');
					}
				}

				$($(this).find('.slider-content')[0]).toggleClass('act',true);
				$($(this).find('.slider-bg')[0]).toggleClass('act',true);
				if (dxSliderSwitches) {
					$($(this).find('.slider-switch')[0]).toggleClass('act',true);
				}
				dxSlide[index] = 0;
				//console.log(dxSliderContent[index].length);
				
			});
			//console.log(dxSliderContent);

			//console.log(dxSliderBG);


			dxSlidePrev = [];
			dxSliderTimer = [];
			dxSlideTime = [];
			//console.log(dxSlide);
			//console.log(dxSlideLast);
			//console.log(dxSliderBG);
			$('.dx-slider').each(function(index) {
				//console.log(dxSliderContent[index]);
				dxSlideTime[index] = 0;
				dxSliderTimer[index] = setInterval(function() {
					//console.log($(dxSlider).find('.slider-bg')[dxSlide[index]]);
					if(dxSliderBgs) {
						$(dxSlider[index]).find('.slider-bg').css('z-index', 200);
						$($(dxSlider[index]).find('.slider-bg')[dxSlide[index]]).css('z-index', 250);
						$(dxSlider[index]).find('.slider-color').css('z-index', 300);
						$(dxSlider[index]).find('.slider-contents').css('z-index', 300);

						if(dxSlideTime[index] <= dxMaxSlideTransition[index]) {
							$(dxSlider[index]).find('.slider-bg').css('opacity', 0);
							$($(dxSlider[index]).find('.slider-bg')[dxSlidePrev[index]]).css('opacity', 1);
							$($(dxSlider[index]).find('.slider-bg')[dxSlide[index]]).css('opacity', dxSlideTime[index]/dxMaxSlideTransition[index]);
							//$(dxSlider).find('.slider-bg').css('display', 'none');
							//console.log(dxSlide[index]);
							//$(dxSliderBG[dxSlide[index]]).css('display', '');

						}
					}
					if(dxSlideTime[index] >= dxMaxSlideTime[index]) {

						dxSlidePrev[index] = dxSlide[index];
						dxSlide[index] = (dxSlide[index] >= dxSlideLast[index] ? 0 : dxSlide[index] + 1);
						$(dxSlider[index]).find('.slider-content').toggleClass('act',false);
						$($(dxSlider[index]).find('.slider-content')[dxSlide[index]]).toggleClass('act',true);
						//console.log(index,dxSlide[index]);
						if($(dxSlider[index]).find('.slider-switch').length > 0) {
							$(dxSlider[index]).find('.slider-switch').toggleClass('act',false);
							$($(dxSlider[index]).find('.slider-switch')[dxSlide[index]]).toggleClass('act',true);
						}
						dxSlideTime[index] = 0;

					}
					else {
						dxSlideTime[index]++;
					}
					//console.log(index, dxSlideTime[index]);
				},100/6);
			});
		}
	}
	slider_init();







	/*
	$('.slider-bgs').children().each(function(index) {
		$(this).css('top',(index * (-100))+'%');
		//console.log($(this));
	});


	//console.log($('.slider-bgs').children('.slider-bg').length);

	$('.slider-content').css('z-index','200');
	$('.slider-switch').css('z-index','200');

	$('.slider-bgs').children().css('z-index','200');
	$('.slider-bgs').children('.slider-bg').css('z-index','100');

	startOldId = 0;
	startNewId = 0;
	startTime = 0;
	startMaxTime = 240;
	startTransition = 40;
	startTimer = setInterval(function() {

		$($('.slider-bgs').children()[startOldId]).css('z-index','100');
		$($('.slider-bgs').children()[startNewId]).css('z-index','150');

		$('.slider-bgs').children('.slider-bg').css('opacity', 0);
		$($('.slider-bgs').children()[startOldId]).css('opacity', 1);

		if (startTime <= startTransition) {
			$($('.slider-bgs').children()[startNewId]).css('opacity', (startTime/startTransition));
		}
		else {
			$($('.slider-bgs').children()[startNewId]).css('opacity', 1);
		}


		if (startTime >= startMaxTime) {
			startOldId = startNewId;
			startNewId = (startNewId >= ($('.slider-switch .slide').length - 1) ? 0 : (Number(startNewId) + 1));
			startTime = 0;

			$('#slider-content-'+startOldId).toggleClass('act',false);
			$('#slider-content-'+startNewId).toggleClass('act',true);

			$('#slide-'+startOldId).toggleClass('act',false);
			$('#slide-'+startNewId).toggleClass('act',true);
		}
		startTime++;
	},100/6);

	$('.slide').on('click', function(event) {
		//console.log(event.target.id.split('-')[1]);
		startTime = 0;
		startOldId = startNewId;
		startNewId = event.target.id.split('-')[1];
			$('#slide-'+startOldId).toggleClass('act',false);
			$('#slide-'+startNewId).toggleClass('act',true);
			$('#slider-content-'+startOldId).toggleClass('act',false);
			$('#slider-content-'+startNewId).toggleClass('act',true);
	});
	*/
})