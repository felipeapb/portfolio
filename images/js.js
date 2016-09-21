$(function(){

	_offsetY = 0;
	_startY = 0;
	
	// To resize the height of the scroll scrubber when scroll height increases. 
	setScrubberHeight();

	var contentDiv = document.getElementById('updateContainer');
	scrubber = $('#updateScollScrubber');
	scrollHeight = $('#updateScollBar').outerHeight();
	contentHeight = $('#updateContent').outerHeight();
	scrollFaceHeight = scrubber.outerHeight();

	initPosition = 0;
	initContentPos = $('#updateHolder').offset().top;
	// Calculate the movement ration with content height and scrollbar height
	moveVal = (contentHeight - scrollHeight)/(scrollHeight - scrollFaceHeight);

	$("#updateContainer").mouseenter(function() {
		// Enable Scrollbar only when the content height is greater then the view port area.
		if(contentHeight > scrollHeight) {
			// Show scrollbar on mouse over
			scrubber.fadeToggle("fast");
			scrubber.bind("mousedown", onMouseDown);
		}

	}).mouseleave(function() {
		
		if(contentHeight > scrollHeight) {
			// Hide Scrollbar on mouse out.
			scrubber.fadeToggle("slow");
			$('#updateHolder').unbind("mousemove", onMouseMove); 
			  scrubber.unbind("mousedown", onMouseDown);
		}
	});


	function onMouseDown(event) {
		$('#updateHolder').bind("mousemove", onMouseMove);
		$('#updateHolder').bind("mouseup", onMouseUp);
		_offsetY = scrubber.offset().top;
		_startY = event.pageY + initContentPos;
		// Disable the text selection inside the update area. Otherwise the text will be selected while dragging on the scrollbar.
		contentDiv.onselectstart = function () { return false; } // ie
		contentDiv.onmousedown = function () { return false; } // mozilla
	}
			
	function onMouseMove(event) {
		
		// Checking the upper and bottom limit of the scroll area
		if((scrubber.offset().top >= initContentPos) && (scrubber.offset().top <= (initContentPos+scrollHeight - scrollFaceHeight))) {
			// Move the scrubber on mouse drag
			scrubber.css({top: (_offsetY + event.pageY - _startY)});
			// Move the content area according to the scrubber movement.
			$('#updateContent').css({top: ((initContentPos - scrubber.offset().top) * moveVal)});   
		}else{
			// Reset when upper and lower limits are excced.
			if(scrubber.offset().top <= initContentPos){
				scrubber.css({top: 0});
				$('#updateContent').css({top: 0});
			}

			if(scrubber.offset().top > (initContentPos + scrollHeight - scrollFaceHeight)) {

				scrubber.css({top: (scrollHeight-scrollFaceHeight-1)});
				$('#updateContent').css({top: (scrollHeight - contentHeight + initPosition)});
			}

			$('#updateHolder').trigger('mouseup');
		}

	}

	function onMouseUp(event) {
		$('#updateHolder').unbind("mousemove", onMouseMove);
		contentDiv.onselectstart = function () { return true; } // ie
		contentDiv.onmousedown = function () { return true; } // mozilla
	}

	function setScrubberHeight() {
		cH = $('#updateContent').outerHeight();
		sH = $('#updateScollBar').outerHeight();

		if(cH > sH) {
			// Set the min height of the scroll scrubber to 20
			if(sH / ( cH / sH ) < 20) {
				$('#updateScollScrubber').css({height: 20 });
			}else{
				$('#updateScollScrubber').css({height: sH / ( cH / sH ) });
			}
		}
	}

});
$(function(){

	_offsetY = 0;
	_startY = 0;
	
	// To resize the height of the scroll scrubber when scroll height increases. 
	setScrubberHeight();

	var contentDiv = document.getElementById('updateContainer2');
	scrubber = $('#updateScollScrubber2');
	scrollHeight = $('#updateScollBar2').outerHeight();
	contentHeight = $('#updateContent2').outerHeight();
	scrollFaceHeight = scrubber.outerHeight();

	initPosition = 0;
	initContentPos = $('#updateHolder2').offset().top;
	// Calculate the movement ration with content height and scrollbar height
	moveVal = (contentHeight - scrollHeight)/(scrollHeight - scrollFaceHeight);

	$("#updateContainer2").mouseenter(function() {
		// Enable Scrollbar only when the content height is greater then the view port area.
		if(contentHeight > scrollHeight) {
			// Show scrollbar on mouse over
			scrubber.fadeToggle("fast");
			scrubber.bind("mousedown", onMouseDown);
		}

	}).mouseleave(function() {
		
		if(contentHeight > scrollHeight) {
			// Hide Scrollbar on mouse out.
			scrubber.fadeToggle("slow");
			$('#updateHolder2').unbind("mousemove", onMouseMove); 
			  scrubber.unbind("mousedown", onMouseDown);
		}
	});


	function onMouseDown(event) {
		$('#updateHolder2').bind("mousemove", onMouseMove);
		$('#updateHolder2').bind("mouseup", onMouseUp);
		_offsetY = scrubber.offset().top;
		_startY = event.pageY + initContentPos;
		// Disable the text selection inside the update area. Otherwise the text will be selected while dragging on the scrollbar.
		contentDiv.onselectstart = function () { return false; } // ie
		contentDiv.onmousedown = function () { return false; } // mozilla
	}
			
	function onMouseMove(event) {
		
		// Checking the upper and bottom limit of the scroll area
		if((scrubber.offset().top >= initContentPos) && (scrubber.offset().top <= (initContentPos+scrollHeight - scrollFaceHeight))) {
			// Move the scrubber on mouse drag
			scrubber.css({top: (_offsetY + event.pageY - _startY)});
			// Move the content area according to the scrubber movement.
			$('#updateContent2').css({top: ((initContentPos - scrubber.offset().top) * moveVal)});   
		}else{
			// Reset when upper and lower limits are excced.
			if(scrubber.offset().top <= initContentPos){
				scrubber.css({top: 0});
				$('#updateContent2').css({top: 0});
			}

			if(scrubber.offset().top > (initContentPos + scrollHeight - scrollFaceHeight)) {

				scrubber.css({top: (scrollHeight-scrollFaceHeight-1)});
				$('#updateContent2').css({top: (scrollHeight - contentHeight + initPosition)});
			}

			$('#updateHolder2').trigger('mouseup');
		}

	}

	function onMouseUp(event) {
		$('#updateHolder2').unbind("mousemove", onMouseMove);
		contentDiv.onselectstart = function () { return true; } // ie
		contentDiv.onmousedown = function () { return true; } // mozilla
	}

	function setScrubberHeight() {
		cH = $('#updateContent2').outerHeight();
		sH = $('#updateScollBar2').outerHeight();

		if(cH > sH) {
			// Set the min height of the scroll scrubber to 20
			if(sH / ( cH / sH ) < 20) {
				$('#updateScollScrubber2').css({height: 20 });
			}else{
				$('#updateScollScrubber2').css({height: sH / ( cH / sH ) });
			}
		}
	}

});


	//portfolio
	
$('#s2').cycle({ 
    fx:     'fade', 
    speed:  'slow', 
    timeout: 4000, 
    next:   '#next', 
    prev:   '#prev' 
});
$('.portfolio').cycle({ 
    fx:     'scrollRight', 
    speed:  'slow', 
    timeout: 15000, 
    next:   '#next2', 
    prev:   '#prev2' 
});
// scrolling
    $(document).ready(function()
	{
		// Scroll the whole document 
		$('.box-links').localScroll({
		   target:'body'
		});
		
		
	});

//abre foto
		$(document).ready(function() {
			$("a#abrefoto").fancybox({
				'titlePosition'		: 'outside',
				'overlayColor'		: '#000',
				'overlayOpacity'	: 0.9
			});

		});
		
		