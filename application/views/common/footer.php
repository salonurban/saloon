
<div class="footer row">
	<div class="container footer-container">
		copyright@urbansoft.in    
	</div>
</div>
<!--bootstrap js-->

  <script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
<!-- enllax js (for parllax) -->
  <script src="<?php echo base_url(); ?>assets/js/jquery.enllax.min.js"></script>
   <script src="<?php echo base_url(); ?>assets/js/SmoothScroll.min.js"></script>    
    <script src="<?php echo base_url(); ?>assets/js/jquery.enllax.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/wow.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/owl.carousel.js"></script>
    <script>
	$(document).ready(function() {
		$("#offers").owlCarousel({ 
			// Most important owl features
			items : 2,
			itemsDesktop : [1199,2],
			itemsDesktopSmall : [980,2],
			itemsTablet: [768,1],
			itemsTabletSmall: false,
			itemsMobile : [479,1],
			singleItem : false,
		 
			//Basic Speeds
			slideSpeed : 200,
			paginationSpeed : 800,
			rewindSpeed : 1000,
		 
			//Autoplay
			autoPlay : true,
			stopOnHover : false,
		 
			// Navigation
			navigation : false,
			navigationText : ["prev","next"],
			rewindNav : true,
			scrollPerPage : false,
		 
			//Pagination
			pagination : false,
			paginationNumbers: false,
		 
			// Responsive 
			responsive: true,
			responsiveRefreshRate : 200,
			responsiveBaseWidth: window,
		 
			// CSS Styles
			baseClass : "owl-carousel",
			theme : "owl-theme",
		 
			//Lazy load
			lazyLoad : false,
			lazyFollow : true,
		 
			//Auto height
			autoHeight : false,
		 
			//JSON 
			jsonPath : false, 
			jsonSuccess : false,
		 
			//Mouse Events
			mouseDrag : true,
			touchDrag : true,
		 
			//Transitions
			transitionStyle : false,
		 
			// Other
			addClassActive : false,
		 
			//Callbacks
			beforeInit: false, 
			afterInit: false, 
			beforeMove: false, 
			afterMove: false,
			afterAction: false,
			startDragging : false
		 
		});$("#recentproducts").owlCarousel({ 
			// Most important owl features
			items : 3,
			itemsDesktop : [1199,3],
			itemsDesktopSmall : [980,3],
			itemsTablet: [768,1],
			itemsTabletSmall: false,
			itemsMobile : [479,1],
			singleItem : false,
		 
			//Basic Speeds
			slideSpeed : 200,
			paginationSpeed : 800,
			rewindSpeed : 1000,
		 
			//Autoplay
			autoPlay : true,
			stopOnHover : false,
		 
			// Navigation
			navigation : false,
			navigationText : ["prev","next"],
			rewindNav : true,
			scrollPerPage : false,
		 
			//Pagination
			pagination : false,
			paginationNumbers: false,
		 
			// Responsive 
			responsive: true,
			responsiveRefreshRate : 200,
			responsiveBaseWidth: window,
		 
			// CSS Styles
			baseClass : "owl-carousel",
			theme : "owl-theme",
		 
			//Lazy load
			lazyLoad : false,
			lazyFollow : true,
		 
			//Auto height
			autoHeight : false,
		 
			//JSON 
			jsonPath : false, 
			jsonSuccess : false,
		 
			//Mouse Events
			mouseDrag : true,
			touchDrag : true,
		 
			//Transitions
			transitionStyle : false,
		 
			// Other
			addClassActive : false,
		 
			//Callbacks
			beforeInit: false, 
			afterInit: false, 
			beforeMove: false, 
			afterMove: false,
			afterAction: false,
			startDragging : false
		 
		});$("#mygossip").owlCarousel({ 
			// Most important owl features
			items : 1,
			itemsDesktop : [1199,1],
			itemsDesktopSmall : [980,1],
			itemsTablet: [768,1],
			itemsTabletSmall: false,
			itemsMobile : [479,1],
			singleItem : false,
		 
			//Basic Speeds
			slideSpeed : 200,
			paginationSpeed : 800,
			rewindSpeed : 1000,
		 
			//Autoplay
			autoPlay : true,
			stopOnHover : false,
		 
			// Navigation
			navigation : false,
			navigationText : ["prev","next"],
			rewindNav : true,
			scrollPerPage : false,
		 
			//Pagination
			pagination : false,
			paginationNumbers: false,
		 
			// Responsive 
			responsive: true,
			responsiveRefreshRate : 200,
			responsiveBaseWidth: window,
		 
			// CSS Styles
			baseClass : "owl-carousel",
			theme : "owl-theme",
		 
			//Lazy load
			lazyLoad : false,
			lazyFollow : true,
		 
			//Auto height
			autoHeight : false,
		 
			//JSON 
			jsonPath : false, 
			jsonSuccess : false,
		 
			//Mouse Events
			mouseDrag : true,
			touchDrag : true,
		 
			//Transitions
			transitionStyle : false,
		 
			// Other
			addClassActive : false,
		 
			//Callbacks
			beforeInit: false, 
			afterInit: false, 
			beforeMove: false, 
			afterMove: false,
			afterAction: false,
			startDragging : false
		 
		});
		new WOW().init();
        (function($){
            
            //Plugin activation
            $(window).enllax();
            
//            $('#some-id').enllax();
            
//            $('selector').enllax({
//                type: 'background', // 'foreground'
//                ratio: 0.5,
//                direction: 'vertical' // 'horizontal'
//            });
            
        })(jQuery);
		
		
		
		
		// stratrating
		// Starrr plugin (https://github.com/dobtco/starrr)
var __slice = [].slice;

(function($, window) {
  var Starrr;

  Starrr = (function() {
    Starrr.prototype.defaults = {
      rating: void 0,
      numStars: 5,
      change: function(e, value) {}
    };

    function Starrr($el, options) {
      var i, _, _ref,
        _this = this;

      this.options = $.extend({}, this.defaults, options);
      this.$el = $el;
      _ref = this.defaults;
      for (i in _ref) {
        _ = _ref[i];
        if (this.$el.data(i) != null) {
          this.options[i] = this.$el.data(i);
        }
      }
      this.createStars();
      this.syncRating();
      this.$el.on('mouseover.starrr', 'span', function(e) {
        return _this.syncRating(_this.$el.find('span').index(e.currentTarget) + 1);
      });
      this.$el.on('mouseout.starrr', function() {
        return _this.syncRating();
      });
      this.$el.on('click.starrr', 'span', function(e) {
        return _this.setRating(_this.$el.find('span').index(e.currentTarget) + 1);
      });
      this.$el.on('starrr:change', this.options.change);
    }

    Starrr.prototype.createStars = function() {
      var _i, _ref, _results;

      _results = [];
      for (_i = 1, _ref = this.options.numStars; 1 <= _ref ? _i <= _ref : _i >= _ref; 1 <= _ref ? _i++ : _i--) {
        _results.push(this.$el.append("<span class='glyphicon glyphicon-star-empty'></span>"));
      }
      return _results;
    };

    Starrr.prototype.setRating = function(rating) {
      if (this.options.rating === rating) {
        rating = void 0;
      }
      this.options.rating = rating;
      this.syncRating();
      return this.$el.trigger('starrr:change', rating);
    };

    Starrr.prototype.syncRating = function(rating) {
      var i, _i, _j, _ref;

      rating || (rating = this.options.rating);
      if (rating) {
        for (i = _i = 0, _ref = rating - 1; 0 <= _ref ? _i <= _ref : _i >= _ref; i = 0 <= _ref ? ++_i : --_i) {
          this.$el.find('span').eq(i).removeClass('glyphicon-star-empty').addClass('glyphicon-star');
        }
      }
      if (rating && rating < 5) {
        for (i = _j = rating; rating <= 4 ? _j <= 4 : _j >= 4; i = rating <= 4 ? ++_j : --_j) {
          this.$el.find('span').eq(i).removeClass('glyphicon-star').addClass('glyphicon-star-empty');
        }
      }
      if (!rating) {
        return this.$el.find('span').removeClass('glyphicon-star').addClass('glyphicon-star-empty');
      }
    };

    return Starrr;

  })();
  return $.fn.extend({
    starrr: function() {
      var args, option;

      option = arguments[0], args = 2 <= arguments.length ? __slice.call(arguments, 1) : [];
      return this.each(function() {
        var data;

        data = $(this).data('star-rating');
        if (!data) {
          $(this).data('star-rating', (data = new Starrr($(this), option)));
        }
        if (typeof option === 'string') {
          return data[option].apply(data, args);
        }
      });
    }
  });
})(window.jQuery, window);

$(function() {
  return $(".starrr").starrr();
});

$( document ).ready(function() {
      
  $('#stars').on('starrr:change', function(e, value){
    $('#count').html(value);
  });
  
  $('#stars-existing').on('starrr:change', function(e, value){
    $('#count-existing').html(value);
  });
});



// flat label js strating

(function ($) {
    $.fn.floatLabels = function (options) {

        // Settings
        var self = this;
        var settings = $.extend({}, options);


        // Event Handlers
        function registerEventHandlers() {
            self.on('input keyup change', 'input, textarea', function () {
                actions.swapLabels(this);
            });
        }


        // Actions
        var actions = {
            initialize: function() {
                self.each(function () {
                    var $this = $(this);
                    var $label = $this.children('label');
                    var $field = $this.find('input,textarea').first();

                    if ($this.children().first().is('label')) {
                        $this.children().first().remove();
                        $this.append($label);
                    }

                    var placeholderText = ($field.attr('placeholder') && $field.attr('placeholder') != $label.text()) ? $field.attr('placeholder') : $label.text();

                    $label.data('placeholder-text', placeholderText);
                    $label.data('original-text', $label.text());

                    if ($field.val() == '') {
                        $field.addClass('empty')
                    }
                });
            },
            swapLabels: function (field) {
                var $field = $(field);
                var $label = $(field).siblings('label').first();
                var isEmpty = Boolean($field.val());

                if (isEmpty) {
                    $field.removeClass('empty');
                    $label.text($label.data('original-text'));
                }
                else {
                    $field.addClass('empty');
                    $label.text($label.data('placeholder-text'));
                }
            }
        }


        // Initialization
        function init() {
            registerEventHandlers();

            actions.initialize();
            self.each(function () {
                actions.swapLabels($(this).find('input,textarea').first());
            });
        }
        init();


        return this;
    };

    $(function () {
        $('.float-label-control').floatLabels();
    });
})(jQuery);
// flat label js ending
// heart rating start
// starrrheart plugin (https://github.com/dobtco/starrrheart)
var __slice = [].slice;

(function($, window) {
  var starrrheart;

  starrrheart = (function() {
    starrrheart.prototype.defaults = {
      rating: void 0,
      numStars: 1,
      change: function(e, value) {}
    };

    function starrrheart($el, options) {
      var i, _, _ref,
        _this = this;

      this.options = $.extend({}, this.defaults, options);
      this.$el = $el;
      _ref = this.defaults;
      for (i in _ref) {
        _ = _ref[i];
        if (this.$el.data(i) != null) {
          this.options[i] = this.$el.data(i);
        }
      }
      this.createStars();
      this.syncRating();
      this.$el.on('mouseover.starrrheart', 'span', function(e) {
        return _this.syncRating(_this.$el.find('span').index(e.currentTarget) + 1);
      });
      this.$el.on('mouseout.starrrheart', function() {
        return _this.syncRating();
      });
      this.$el.on('click.starrrheart', 'span', function(e) {
        return _this.setRating(_this.$el.find('span').index(e.currentTarget) + 1);
      });
      this.$el.on('starrrheart:change', this.options.change);
    }

    starrrheart.prototype.createStars = function() {
      var _i, _ref, _results;

      _results = [];
      for (_i = 1, _ref = this.options.numStars; 1 <= _ref ? _i <= _ref : _i >= _ref; 1 <= _ref ? _i++ : _i--) {
        _results.push(this.$el.append("<span class='glyphicon .glyphicon-heart-empty'></span>"));
      }
      return _results;
    };

    starrrheart.prototype.setRating = function(rating) {
      if (this.options.rating === rating) {
        rating = void 0;
      }
      this.options.rating = rating;
      this.syncRating();
      return this.$el.trigger('starrrheart:change', rating);
    };

    starrrheart.prototype.syncRating = function(rating) {
      var i, _i, _j, _ref;

      rating || (rating = this.options.rating);
      if (rating) {
        for (i = _i = 0, _ref = rating - 1; 0 <= _ref ? _i <= _ref : _i >= _ref; i = 0 <= _ref ? ++_i : --_i) {
          this.$el.find('span').eq(i).removeClass('glyphicon-heart-empty').addClass('glyphicon-heart');
        }
      }
      if (rating && rating < 5) {
        for (i = _j = rating; rating <= 4 ? _j <= 4 : _j >= 4; i = rating <= 4 ? ++_j : --_j) {
          this.$el.find('span').eq(i).removeClass('glyphicon-heart').addClass('glyphicon-heart-empty');
        }
      }
      if (!rating) {
        return this.$el.find('span').removeClass('glyphicon-heart').addClass('glyphicon-heart-empty');
      }
    };

    return starrrheart;

  })();
  return $.fn.extend({
    starrrheart: function() {
      var args, option;

      option = arguments[0], args = 2 <= arguments.length ? __slice.call(arguments, 1) : [];
      return this.each(function() {
        var data;

        data = $(this).data('star-rating');
        if (!data) {
          $(this).data('star-rating', (data = new starrrheart($(this), option)));
        }
        if (typeof option === 'string') {
          return data[option].apply(data, args);
        }
      });
    }
  });
})(window.jQuery, window);

$(function() {
  return $(".starrrheart").starrrheart();
});

$( document ).ready(function() {
      
  $('#hearts').on('starrrheart:change', function(e, value){
    $('#count').html(value);
  });
  
  $('#hearts-existing').on('starrrheart:change', function(e, value){
    $('#count-existing').html(value);
  });
});
// heart rating end
	});
    </script>
</body>
</html>
