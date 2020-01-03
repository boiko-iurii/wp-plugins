
(function($) {
	
	// var itemActive = $('.ssa-faq__item.active');

	$('.ssa-faq__item').each(function(index, elem) {

			elem.onclick = function() {
				console.log($(this).find($('.ssa-faq__answer')));
				$(this).find($('.ssa-faq__answer')).slideToggle('slow');
				$(this).toggleClass('active');
			}

	})

})(jQuery)



// function clickHandler(el) {
// 	let itemActive = document.querySelector('.ssa-faq__item.active');
// 	if (itemActive) 
// 		itemActive.classList.remove('active');

// 	el.classList.toggle('active');
// }

// let items = document.querySelectorAll('.ssa-faq__item');

// items.forEach(elem => {
// 	elem.onclick = function() {
// 		clickHandler(this);	
// 	}

// })
