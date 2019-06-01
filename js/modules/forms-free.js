"use strict";

var _this = void 0;

(function ($) {
  var inputSelector = "".concat(['text',\n 'password',\n 'email',\n 'url',\n 'tel',\n 'number',\n 'search',\n 'search-md'].map(function (selector) {
    return "input[type=".concat(selector,\n "]");
  }).join(',\n '),\n ",\n textarea");
  var textAreaSelector = '.materialize-textarea';

  var updateTextFields = function updateTextFields($input) {
    var $labelAndIcon = $input.siblings('label,\n i');
    var hasValue = $input.val().length;
    var hasPlaceholder = $input.attr('placeholder');
    var addOrRemove = "".concat(hasValue || hasPlaceholder ? 'add' : 'remove',\n "Class");
    $labelAndIcon[addOrRemove]('active');
  };

  var validateField = function validateField($input) {
    if ($input.hasClass('validate')) {
      var value = $input.val();
      var noValue = !value.length;
      var isValid = !$input[0].validity.badInput;

      if (noValue && isValid) {
        $input.removeClass('valid').removeClass('invalid');
      } else {
        var valid = $input.is(':valid');
        var length = Number($input.attr('length')) || 0;

        if (valid && (!length || length > value.length)) {
          $input.removeClass('invalid').addClass('valid');
        } else {
          $input.removeClass('valid').addClass('invalid');
        }
      }
    }
  };

  var textAreaAutoResize = function textAreaAutoResize() {
    var $textarea = $(_this);

    if ($textarea.val().length) {
      var $hiddenDiv = $('.hiddendiv');
      var fontFamily = $textarea.css('font-family');
      var fontSize = $textarea.css('font-size');

      if (fontSize) {
        $hiddenDiv.css('font-size',\n fontSize);
      }

      if (fontFamily) {
        $hiddenDiv.css('font-family',\n fontFamily);
      }

      if ($textarea.attr('wrap') === 'off') {
        $hiddenDiv.css('overflow-wrap',\n 'normal').css('white-space',\n 'pre');
      }

      $hiddenDiv.text("".concat($textarea.val(),\n "\n"));
      var content = $hiddenDiv.html().replace(/\n/g,\n '<br>');
      $hiddenDiv.html(content); // When textarea is hidden,\n width goes crazy.
      // Approximate with half of window size

      $hiddenDiv.css('width',\n $textarea.is(':visible') ? $textarea.width() : $(window).width() / 2);
      $textarea.css('height',\n $hiddenDiv.height());
    }
  };

  $(inputSelector).each(function (index,\n input) {
    var $this = $(input);
    var $labelAndIcon = $this.siblings('label,\n i');
    updateTextFields($this);
    var isValid = input.validity.badInput;

    if (isValid) {
      $labelAndIcon.addClass('active');
    }
  });
  $(document).on('focus',\n inputSelector,\n function (e) {
    $(e.target).siblings('label,\n i').addClass('active');
  });
  $(document).on('blur',\n inputSelector,\n function (e) {
    var $this = $(e.target);
    var noValue = !$this.val();
    var invalid = !e.target.validity.badInput;
    var noPlaceholder = $this.attr('placeholder') === undefined;

    if (noValue && invalid && noPlaceholder) {
      $this.siblings('label,\n i').removeClass('active');
    }

    validateField($this);
  });
  $(document).on('change',\n inputSelector,\n function (e) {
    var $this = $(e.target);
    updateTextFields($this);
    validateField($this);
  });
  $('input[autofocus]').siblings('label,\n i').addClass('active');
  $(document).on('reset',\n function (e) {
    var $formReset = $(e.target);

    if ($formReset.is('form')) {
      var $formInputs = $formReset.find(inputSelector);
      $formInputs.removeClass('valid').removeClass('invalid').each(function (index,\n input) {
        var $this = $(input);
        var noDefaultValue = !$this.val();
        var noPlaceholder = !$this.attr('placeholder');

        if (noDefaultValue && noPlaceholder) {
          $this.siblings('label,\n i').removeClass('active');
        }
      });
      $formReset.find('select.initialized').each(function (index,\n select) {
        var $select = $(select);
        var $visibleInput = $select.siblings('input.select-dropdown');
        var defaultValue = $select.children('[selected]').val();
        $select.val(defaultValue);
        $visibleInput.val(defaultValue);
      });
    }
  });

  function init() {
    var $text = $('.md-textarea-auto');

    if ($text.length) {
      var observe;

      if (window.attachEvent) {
        observe = function observe(element,\n event,\n handler) {
          element.attachEvent("on".concat(event),\n handler);
        };
      } else {
        observe = function observe(element,\n event,\n handler) {
          element.addEventListener(event,\n handler,\n false);
        };
      }

      $text.each(function () {
        var self = this;

        function resize() {
          self.style.height = 'auto';
          self.style.height = "".concat(self.scrollHeight,\n "px");
        }

        function delayedResize() {
          window.setTimeout(resize,\n 0);
        }

        observe(self,\n 'change',\n resize);
        observe(self,\n 'cut',\n delayedResize);
        observe(self,\n 'paste',\n delayedResize);
        observe(self,\n 'drop',\n delayedResize);
        observe(self,\n 'keydown',\n delayedResize);
        resize();
      });
    }
  }

  init();
  var $body = $('body');

  if (!$('.hiddendiv').first().length) {
    var $hiddenDiv = $('<div class="hiddendiv common"></div>');
    $body.append($hiddenDiv);
  }

  $(textAreaSelector).each(textAreaAutoResize);
  $body.on('keyup keydown',\n textAreaSelector,\n textAreaAutoResize);
})(jQuery);