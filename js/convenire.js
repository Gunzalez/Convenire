// JavaScript Document
(function ($, window) {

    var convenire = {};

    convenire.properties = {
        windowWidth: '',
        isMobile: false,
        isDesktop: false
    };

    convenire.utils = {
        preload: function preloadImages(images, callback) {
            var count = images.length;
            if (count === 0) {
                callback();
            }
            var loaded = 0;
            $(images).each(function () {
                $('<img>').attr('src', this).load(function () {
                    loaded++;
                    if (loaded === count) {
                        callback();
                    }
                });
            });
        }
    };

    convenire.environment = {
        mobileCheck: function () {
            var check = false;
            (function (a, b) {
                if (/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows ce|xda|xiino/i.test(a) || /1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(a.substr(0, 4)))check = true
            })(navigator.userAgent || navigator.vendor || window.opera);
            return check;
        },

        resize: function () {
            convenire.search.resize();
            convenire.review.resize();

            //$('.google-map').find('iframe').width($(window).width());
        },

        init: function () {
            var self = convenire;

            // window size
            self.properties.windowWidth = $(window).width();

            // device type
            if (self.environment.mobileCheck()) {
                self.environment.isMobile = true;
                $('html').addClass('mobile');
            } else {
                self.environment.isDesktop = true;
                $('html').addClass('desktop');
            }
        }
    };

    convenire.search = {
        $form: $('#search'),
        $locationField: $('#location', this.$form),
        $resultContainer: $('#results-container'),
        $makeAjaxCall: function(){
            var self = this,
                term = this.$locationField.val().trim();

            if(term.length > 2){
                var offset = self.$locationField.offset();
                var posY = offset.top + self.$locationField.height() + 4; // 4 for padding
                var posX = offset.left;

                self.$resultContainer.css({
                    top: posY,
                    left: posX
                });

                // TODO make real ajax call and put results into div before displaying
                $.post("ajax-result.php", function(data){
                    self.$resultContainer.html(data).removeClass('hidden');
                });

            } else {
                self.$resultContainer.addClass('hidden');
            }
        },

        init: function(){
            var self = this;

            self.$locationField.on('keypress', function(){
                self.$makeAjaxCall();
            });

            self.$form.on('click', function(){
                self.$resultContainer.addClass('hidden');
            });
        },

        resize: function () {
            this.$resultContainer.addClass('hidden');
        }
    };

    convenire.carousel = {
        $stage: $('.featured-large'),
        $nav: $('.featured-navigation'),
        auto: {
            start: true,
            delay: 6, // seconds
            timer: undefined
        },

        next: function () {
            var cnt = $('a', this.$nav).length,
                activeIndex = $('a', this.$nav).index($('.active'));

            if (activeIndex == (cnt - 1)) {
                activeIndex = 0;
            } else {
                activeIndex++;
            }

            $('a', this.$nav).eq(activeIndex).trigger('click');
        },

        prev: function () {
            var cnt = $('a', this.$nav).length,
                activeIndex = $('a', this.$nav).index($('.active'));

            if (activeIndex == 0) {
                activeIndex = (cnt - 1);
            } else {
                activeIndex--;
            }

            $('a', this.$nav).eq(activeIndex).trigger('click');
        },

        init: function () {
            var self = this;

            // sets up clicking
            self.$nav.on('click', 'a', function (evt) {
                evt.preventDefault();
                if (!$(this).hasClass('active')){

                    var $newImg = $('<img class="featured-image" src="' + $(this).attr('data-featured-image') +'" alt="' + $(this).find('img').attr('alt') + '" style="display:none" />');

                    $('.featured-title', self.$stage).text($(this).attr('data-featured-title'));
                    $('.featured-subtitle', self.$stage).text($(this).attr('data-featured-subtitle'));
                    $('.featured-link', self.$stage).attr('href', $(this).attr('href'));

                    $('.featured-image', self.$stage).fadeOut(function(){
                        $(this).remove();
                    });
                    $(self.$stage).append($newImg);
                    $newImg.fadeIn();

                    $('a', self.$nav).removeAttr('class');
                    $(this).addClass('active');
                }
            });

            // nav is initially hidden, showing after large images have preloaded
            var imagesToPreload = [];
            $('a', self.$nav).each(function (i, obj) {
                imagesToPreload.push($(obj).attr('data-featured-image'))
            });
            convenire.utils.preload(imagesToPreload, function () {
                // show navigation
                self.$nav.removeClass('display-none');

                // setting up auto rotate
                if (self.auto.start) {
                    self.auto.timer = setInterval(function () {
                        self.next();
                    }, self.auto.delay * 1000);

                    // stops carousel once buttons have been clicked
                    $('a', self.$nav).on('mousedown', function () {
                        clearInterval(self.auto.timer);
                        $('a', self.$nav).unbind('mousedown');
                    })
                }
            });
        }
    };

    convenire.news = {
        $stage: $('.news-item-main').find('img')[0],
        $nav: $('.news-item-thumbnails'),
        aTag: 'a[data-large-image]',

        init: function () {
            var self = this;

            // sets up clicking
            self.$nav.on('click', self.aTag, function (evt) {
                evt.preventDefault();
                if (!$(this).hasClass('active')) {
                    $(self.$stage).attr('src', $(this).attr('data-large-image'));
                    $(self.aTag, self.$nav).removeClass('active');
                    $(this).addClass('active');
                }
            });

            // nav is initially hidden, showing after large images have preloaded
            var imagesToPreload = [];
            $(self.aTag, self.$nav).each(function (i, obj) {
                imagesToPreload.push($(obj).attr('data-large-image'));
            });
            convenire.utils.preload(imagesToPreload, function () {
                self.$nav.removeClass('display-none');
            });
        }
    };

    convenire.venue = {
        $venue: $('.venue-information'),
        $listOfSubCriteriaContainers: $('.open-close', this.$venue),
        $showHideButtons: $('.show-hide-full-details', this.venue),
        closeOtherCriteria: true,                   // Change to false to stop accordion style on Criteria
        closeOtherSubCriteria: true,                // Change to false to stop accordion style on sub criteria

        init: function () {
            var self = this;

            // sets up fancybox image enlargement
            if($(".fancybox").length > 0){
                $(".fancybox").fancybox({
                    'nextEffect': 'fade',
                    'prevEffect': 'fade'
                });
            }

            $('.full-detail', self.$venue).each(function(i, obj){
               $(obj).bind("transitionend webkitTransitionEnd oTransitionEnd MSTransitionEnd", function(){
                   $('.opened', $(obj)).removeClass('opened');
                   $('.sub-criteria-container', $(obj)).addClass('display-none');
               });
            });

            self.$showHideButtons.on('click', function (event) {
                event.preventDefault();
                var viewId = $(this).data('view');
                if (!$(this).hasClass('showing')) {
                    if(self.closeOtherCriteria){
                        self.$showHideButtons.removeClass('showing');
                        $('.dropped-down', self.$venue).removeClass('dropped-down')
                    }
                    $('#' + viewId, self.venue).addClass('dropped-down');
                    $(this).addClass('showing');
                    //window.location.hash = '#'+viewId;
                } else {
                    $('#' + viewId, self.venue).removeClass('dropped-down');
                    $(this).removeClass('showing');
                }
            });

            self.$listOfSubCriteriaContainers.each(function(i, obj){
                $(obj).on('click', function(){
                    if(!$(obj).hasClass('opened')){
                        var subCriteriaId = $(obj).attr('data-open-close');
                        if(self.closeOtherSubCriteria){
                            var $parent = $(obj).parents('table');
                            $('.opened', $parent).removeClass('opened');
                            $('.sub-criteria-container', $parent).addClass('display-none');
                        }
                        $('#'+subCriteriaId).removeClass('display-none');
                        $(obj).addClass('opened');
                    } else {
                        var subCriteriaId = $(obj).attr('data-open-close');
                        $('#'+subCriteriaId).addClass('display-none');
                        $(obj).removeClass('opened');
                    }
                });
            });
        }
    };

    convenire.mobileNav = {

        init: function () {
            $("#menu").mmenu({
                "extensions": [
                    "pageshadow",
                    "theme-dark",
                    "pagedim",
                    "effect-menu-slide",
                    "effect-listitems-slide"
                ],
                "offCanvas": {
                    "position": "right"
                }
                //,"slidingSubmenus": false
            });
        }
    };

    convenire.review = {
        $html: $('#review-form'),
        $progress: $('.review-progress', this.$html),
        $steps: $('.form-steps', this.$html),
        $slides: $('.step-n', this.$steps),
        $stepButtons: $('.step-navigation a', this.$steps),
        slidePos: 0,

        resize: function(){
            this.$steps.removeClass('animated');
            this.$steps.width(this.$html.width() * this.$slides.length);
            this.$slides.width(this.$html.width());
            if(this.slidePos != 0 ){
                var newLeftMargin = '-' + ( this.$html.width() * parseInt(this.slidePos) ) + 'px';
            } else {
                var newLeftMargin = '0px';
            }
            this.$steps.css('margin-left', newLeftMargin);
        },

        init: function(){
            var self = this;

            self.$stepButtons.first().addClass('disabled');
            self.$stepButtons.last().addClass('disabled');

            self.$stepButtons.on('click', function(event){
                event.preventDefault();
                if(!$(this).hasClass('disabled')){

                    self.$steps.addClass('animated');
                    var currentPos = $(this).parents('.step-n').attr('id').replace('step-',''),
                        newPosition;

                    if($(this).hasClass('next')) {
                        newPosition = parseInt(currentPos) + 1;
                    } else {
                        newPosition = parseInt(currentPos) - 1;
                    }

                    var newLeftMargin = '-' + (self.$html.width() * newPosition) + 'px';
                    self.$steps.css('margin-left', newLeftMargin);
                    self.slidePos = newPosition;

                    self.$progress.css({
                        width: (((newPosition+1)/self.$slides.length) * 100 ) + '%'
                    });
                }
            });

            this.$progress.css({
                width: (((this.slidePos+1)/this.$slides.length) * 100 ) + '%'
            });
            this.resize();
        }
    };

    convenire.init = function () {

        // all init
        convenire.environment.init();
        convenire.carousel.init();
        convenire.mobileNav.init();
        convenire.news.init();
        convenire.venue.init();
        convenire.search.init();
        convenire.review.init();

        // resize triggers
        $(window).on('resize', function () {

            var newWidth = $(window).width(),
                    oldWidth = convenire.properties.windowWidth;

            if (oldWidth != newWidth) {
                convenire.properties.windowWidth = newWidth;
                convenire.resize();
            }
        });

        convenire.resize();
        $(window).trigger('resize');
    };

    // main resize
    convenire.resize = function () {
        convenire.environment.resize();
    };

    // main init
    $(document).ready(function () {
        convenire.init();
    });

}(jQuery, window));