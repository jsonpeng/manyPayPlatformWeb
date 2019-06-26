// $(function(){
// 	var modalHtml = '';
	
// 	$('.showModel').on('click',function(e){
// 		$('body').addClass('noscroll');
// 		showModal($(this));
// 	})
// 	$('body').on('click', '.carouselGallery-right, .carouselGallery-left', function(e){
//         if($(this).hasClass('disabled')) return;
//         var curIndex = $('.carouselGallery-carousel.active').data('index');
//         var nextItemIndex = parseInt(curIndex+1);
//         if($(this).hasClass('carouselGallery-left')){
//             nextItemIndex-=2;
//         }
//         var nextItem = $('.carouselGallery-carousel[data-index='+nextItemIndex+']');
//        // console.log(nextItemIndex);
//         if(nextItem.length > 0){
//             $('.carouselGallery-col-1, .carouselGallery-col-2').removeClass('active');
//             $('body').find('.carouselGallery-wrapper').remove();
//             showModal($(nextItem.get(0)));
//             nextItem.first().addClass('active');
//         }
//         updateArrows();
//     });
// 	function showModal(that){
// 		var title = that.data('title'),
//         content = that.data('content'),
//         imageUrl = that.data('imageUrl'),
//         index=that.data('index'),
//         maxHeight = $(window).height()-100;
//         if(typeof imageUrl !== 'undefined') {
//         	modalHtml = "<div class='carouselGallery-wrapper'>";
//             modalHtml += "<div class='carouselGallery-modal'><span class='carouselGallery-left'><span class='glyphicon glyphicon-menu-left'></span></span><span class='carouselGallery-right'><span class='glyphicon glyphicon-menu-right'></span></span>";
//             modalHtml += "<div class='container'>";
//             modalHtml += "<span class='iconscircle-cross glyphicon glyphicon-remove-sign'></span>";
//             modalHtml += "<div class='carouselGallery-scrollbox' style='max-height:"+maxHeight+"px'><div class='carouselGallery-modal-image'>";
//             modalHtml += "<img src='"+imageUrl+"' alt='carouselGallery image'>";
//             modalHtml += "</div>";
//             modalHtml += "<div class='carouselGallery-modal-text'>";
//             modalHtml += "<span class='carouselGallery-modal-location'>"+title+"</span>";
//             modalHtml += "<span class='carouselGallery-modal-imagetext'>";
//             modalHtml += "<p>"+content+"</p>";
//             modalHtml += "</span></div></div></div></div></div>";
//         	$('body').append(modalHtml).fadeIn(2500);
//         } 
// 	}
// 	$('body').on('click', '.carouselGallery-modal .iconscircle-cross', function(e){
//         removeModal();
//     });
//     var removeModal = function(){
//         $('body').find('.carouselGallery-wrapper').remove();
//         $('body').removeClass('noscroll');
//         $('body').css('position', 'static');
//     };
// })

// $('.caption').click(function(){
// 	$('body').
// })