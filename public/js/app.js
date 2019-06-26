/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, {
/******/ 				configurable: false,
/******/ 				enumerable: true,
/******/ 				get: getter
/******/ 			});
/******/ 		}
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "";
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 0);
/******/ })
/************************************************************************/
/******/ ([
/* 0 */
/***/ (function(module, exports, __webpack_require__) {

__webpack_require__(1);
module.exports = __webpack_require__(2);


/***/ }),
/* 1 */
/***/ (function(module, exports) {

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

/***/ }),
/* 2 */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ })
/******/ ]);