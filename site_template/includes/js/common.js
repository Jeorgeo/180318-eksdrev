//pavel
function delets (mod,link) {
	if (confirm("Вы действительно хотите удалить элемент?")) {
		parent.location='index.php?mod='+mod+'&task='+link;
		}
}
 function checkAll(elem, name){
	 var value = elem.checked;
 	 var items = document.getElementsByName(name);
 	for (i=0; i<items.length; i++) {
	 if (items[i] != elem){
 		var tr = items[i];
 		tr.checked = value;
	 }
 }
 };


//pavel
wpCookies = {
// The following functions are from Cookie.js class in TinyMCE, Moxiecode, used under LGPL.

	each : function(o, cb, s) {
		var n, l;

		if (!o)
			return 0;

		s = s || o;

		if (typeof(o.length) != 'undefined') {
			for (n=0, l = o.length; n<l; n++) {
				if (cb.call(s, o[n], n, o) === false)
					return 0;
			}
		} else {
			for (n in o) {
				if (o.hasOwnProperty(n)) {
					if (cb.call(s, o[n], n, o) === false)
						return 0;
				}
			}
		}
		return 1;
	},

	getHash : function(n) {
		var v = this.get(n), h;

		if (v) {
			this.each(v.split('&'), function(v) {
				v = v.split('=');
				h = h || {};
				h[v[0]] = v[1];
			});
		}
		return h;
	},

	setHash : function(n, v, e, p, d, s) {
		var o = '';

		this.each(v, function(v, k) {
			o += (!o ? '' : '&') + k + '=' + v;
		});

		this.set(n, o, e, p, d, s);
	},

	get : function(n) {
		var c = document.cookie, e, p = n + "=", b;

		if (!c)
			return;

		b = c.indexOf("; " + p);

		if (b == -1) {
			b = c.indexOf(p);

			if (b != 0)
				return null;
		} else
			b += 2;

		e = c.indexOf(";", b);

		if (e == -1)
			e = c.length;

		return decodeURIComponent(c.substring(b + p.length, e));
	},

	set : function(n, v, e, p, d, s) {
		document.cookie = n + "=" + encodeURIComponent(v) +
			((e) ? "; expires=" + e.toGMTString() : "") +
			((p) ? "; path=" + p : "") +
			((d) ? "; domain=" + d : "") +
			((s) ? "; secure" : "");
	},

	remove : function(n, p) {
		var d = new Date();

		d.setTime(d.getTime() - 1000);

		this.set(n, '', d, p, d);
	}
};

// Returns the value as string. Second arg or empty string is returned when value is not set.
function getUserSetting( name, def ) {
	var o = getAllUserSettings();

	if ( o.hasOwnProperty(name) )
		return o[name];

	if ( typeof def != 'undefined' )
		return def;

	return '';
}

// Both name and value must be only ASCII letters, numbers or underscore
// and the shorter, the better (cookies can store maximum 4KB). Not suitable to store text.
function setUserSetting( name, value, del ) {

}

function deleteUserSetting( name ) {
	setUserSetting( name, '', 1 );
}

// Returns all settings as js object.
function getAllUserSettings() {
	//return wpCookies.getHash('wp-settings-'+userSettings.uid) || {};
	return '';
}


jQuery(document).ready( function($) {

//pavel
	$("#id_type_banner").ready(function(){
	    id = $('#id_type_banner').val();
	    id_place = $('#id_placeh').val();
	    id_banner = $('#id_banner').val();
		$("#id_place").load("../includes/ajax.php", {'task': 'id_type_banner','id':id,'id_place':id_place,'id_banner':id_banner});
	    id_banner = $('#id_banner').val();
	    $("#banner_param").load("../includes/ajax.php", {'task': 'banner_param','id':id,'id_banner':id_banner});
	});	
	$("#id_type_banner").change(function(){
	    id = $('#id_type_banner').val();
	    id_place = $('#id_placeh').val();
	    id_banner = $('#id_banner').val();
		$("#id_place").load("../includes/ajax.php", {'task': 'id_type_banner','id':id,'id_place':id_place,'id_banner':id_banner});
		$("#banner_param").load("../includes/ajax.php", {'task': 'banner_param','id':id,'id_banner':id_banner});
	});
	$("#id_place").ready(function(){
		id = $('#id_placeh').val();
		$("#banners_foto").load("../includes/ajax.php", {'task': 'banners_foto','id':id});
	});		
	$("#id_place").change(function(){
	    id = $('#id_place').val();
		$("#banners_foto").load("../includes/ajax.php", {'task': 'banners_foto','id':id});
	});	
	$("#category").change(function(){
	    id = $('#category').val();
		$("#marka").load("../includes/ajax.php", {'task': 'marka','id':id});
		$("#dop_complect").load("../includes/ajax.php", {'task': 'complect','id':id});
	});
	$("#marka").change(function(){
	    id = $('#marka').val();
		$("#model").load("../includes/ajax.php", {'task': 'model','id':id});
	});
	
      var button = $('#button1'), interval;
	  new Ajax_upload('#button1',{
		//action: 'upload-test.php', // I disabled uploads in this example for security reasons
		action: '../includes/upload.php', 
		name: 'myfile',
		onSubmit : function(file, ext){
			// change button text, when user selects file			
			button.text('Загрузка');
			
			// If you want to allow uploading only 1 file at time,
			// you can disable upload button
			this.disable();
			
			// Uploding -> Uploading. -> Uploading...
			interval = window.setInterval(function(){
				var text = button.text();
				if (text.length < 13){
					button.text(text + '.');					
				} else {
					button.text('Загрузка');				
				}
			}, 200);
		},
		onComplete: function(file, response){

			button.text('Загружен');
						
			window.clearInterval(interval);
						
			// enable upload button
			this.enable();
			
			// add file to the list
			//$('<li></li>').appendTo('.files').text(response);									
			$('<li></li>').appendTo('.files').html(response);
		}
	});	
//pavel
	// pulse
	$('.fade').animate( { backgroundColor: '#ffffe0' }, 300).animate( { backgroundColor: '#fffbcc' }, 300).animate( { backgroundColor: '#ffffe0' }, 300).animate( { backgroundColor: '#fffbcc' }, 300);

	// show things that should be visible, hide what should be hidden
	$('.hide-if-no-js').removeClass('hide-if-no-js');
	$('.hide-if-js').hide();

	// Basic form validation
	if ( ( 'undefined' != typeof wpAjax ) && $.isFunction( wpAjax.validateForm ) ) {
		$('form.validate').submit( function() { return wpAjax.validateForm( $(this) ); } );
	}

	// Move .updated and .error alert boxes
	$('div.wrap h2 ~ div.updated, div.wrap h2 ~ div.error').addClass('below-h2');
	$('div.updated, div.error').not('.below-h2').insertAfter('div.wrap h2:first');

	// screen settings tab
	$('#show-settings-link').click(function () {
		if ( ! $('#screen-options-wrap').hasClass('screen-options-open') ) {
			$('#contextual-help-link-wrap').addClass('invisible');
		}
		$('#screen-options-wrap').slideToggle('fast', function(){
			if ( $(this).hasClass('screen-options-open') ) {
				$('#show-settings-link').css({'backgroundImage':'url("images/screen-options-right.gif")'});
				$('#contextual-help-link-wrap').removeClass('invisible');
				$(this).removeClass('screen-options-open');

			} else {
				$('#show-settings-link').css({'backgroundImage':'url("images/screen-options-right-up.gif")'});
				$(this).addClass('screen-options-open');
			}
		});
		return false;
	});

	// help tab
	$('#contextual-help-link').click(function () {
		if ( ! $('#contextual-help-wrap').hasClass('contextual-help-open') ) {
			$('#screen-options-link-wrap').addClass('invisible');
		}
		$('#contextual-help-wrap').slideToggle('fast', function(){
			if ( $(this).hasClass('contextual-help-open') ) {
				$('#contextual-help-link').css({'backgroundImage':'url("images/screen-options-right.gif")'});
				$('#screen-options-link-wrap').removeClass('invisible');
				$(this).removeClass('contextual-help-open');
			} else {
				$('#contextual-help-link').css({'backgroundImage':'url("images/screen-options-right-up.gif")'});
				$(this).addClass('contextual-help-open');
			}
		});
		return false;
	});

	// check all checkboxes
	var lastClicked = false;
	$( 'table:visible tbody .check-column :checkbox' ).click( function(e) {
		if ( 'undefined' == e.shiftKey ) { return true; }
		if ( e.shiftKey ) {
			if ( !lastClicked ) { return true; }
			var checks = $( lastClicked ).parents( 'form:first' ).find( ':checkbox' );
			var first = checks.index( lastClicked );
			var last = checks.index( this );
			var checked = $(this).attr('checked');
			if ( 0 < first && 0 < last && first != last ) {
				checks.slice( first, last ).attr( 'checked', function(){
					if ( $(this).parents('tr').is(':visible') )
						return checked ? 'checked' : '';

					return '';
				});
			}
		}
		lastClicked = this;
		return true;
	} );
	$( 'thead :checkbox, tfoot :checkbox' ).click( function(e) {
		var c = $(this).attr('checked');
		if ( 'undefined' == typeof  toggleWithKeyboard)
			toggleWithKeyboard = false;
		var toggle = e.shiftKey || toggleWithKeyboard;
		$(this).parents( 'form:first' ).find( 'table tbody:visible').find( '.check-column :checkbox' ).attr( 'checked', function() {
			if ( $(this).parents('tr').is(':hidden') )
				return '';
			if ( toggle )
				return $(this).attr( 'checked' ) ? '' : 'checked';
			else if (c)
				return 'checked';
			return '';
		});
		$(this).parents( 'form:first' ).find( 'table thead:visible, table tfoot:visible').find( '.check-column :checkbox' ).attr( 'checked', function() {
			if ( toggle )
				return '';
			else if (c)
				return 'checked';
			return '';
		});
	});
});

var showNotice, adminMenu, columns;

// stub for doing better warnings
showNotice = {
	warn : function(text) {
		if ( confirm(text) )
			return true;

		return false;
	},

	note : function(text) {
		alert(text);
	}
};

(function($){
// sidebar admin menu
adminMenu = {

	init : function() {
		$('#adminmenu div.wp-menu-toggle').each( function() {
			if ( $(this).siblings('.wp-submenu').length )
				$(this).click(function(){ adminMenu.toggle( $(this).siblings('.wp-submenu') ); });
			else
				$(this).hide();
		});
		$('#adminmenu li.menu-top .wp-menu-image').click( function() { window.location = $(this).siblings('a.menu-top')[0].href; } );
		this.favorites();

		$('.wp-menu-separator').click(function(){
			if ( $('#wpcontent').hasClass('folded') ) {
				adminMenu.fold(1);
				setUserSetting( 'mfold', 'o' );
			} else {
				adminMenu.fold();
				setUserSetting( 'mfold', 'f' );
			}
		});

		if ( 'f' != getUserSetting( 'mfold' ) ) {
			this.restoreMenuState();
		} else {
			this.fold();
		}
	},

	restoreMenuState : function() {
		$('#adminmenu li.wp-has-submenu').each(function(i, e) {
			var v = getUserSetting( 'm'+i );
			if ( $(e).hasClass('wp-has-current-submenu') ) return true; // leave the current parent open

			if ( 'o' == v ) $(e).addClass('wp-menu-open');
			else if ( 'c' == v ) $(e).removeClass('wp-menu-open');
		});
	},

	toggle : function(el) {

		el['slideToggle'](150, function(){el.css('display','');}).parent().toggleClass( 'wp-menu-open' );

		$('#adminmenu li.wp-has-submenu').each(function(i, e) {
			var v = $(e).hasClass('wp-menu-open') ? 'o' : 'c';
			setUserSetting( 'm'+i, v );
		});

		return false;
	},

	fold : function(off) {
		if (off) {
			$('#wpcontent').removeClass('folded');
			$('#adminmenu li.wp-has-submenu').unbind();
		} else {
			$('#wpcontent').addClass('folded');
			$('#adminmenu li.wp-has-submenu').hoverIntent({
				over: function(e){
					var m = $(this).find('.wp-submenu'), t = e.clientY, H = $(window).height(), h = m.height(), o;

					if ( (t+h+10) > H ) {
						o = (t+h+10) - H;
						m.css({'marginTop':'-'+o+'px'});
					} else if ( m.css('marginTop') ) {
						m.css({'marginTop':''})
					}
					m.addClass('sub-open');
				},
				out: function(){ $(this).find('.wp-submenu').removeClass('sub-open').css({'marginTop':''}); },
				timeout: 220,
				sensitivity: 8,
				interval: 100
			});

		}
	},

	favorites : function() {
		$('#favorite-inside').width($('#favorite-actions').width()-4);
		$('#favorite-toggle, #favorite-inside').bind( 'mouseenter', function(){$('#favorite-inside').removeClass('slideUp').addClass('slideDown'); setTimeout(function(){if ( $('#favorite-inside').hasClass('slideDown') ) { $('#favorite-inside').slideDown(100); $('#favorite-first').addClass('slide-down'); }}, 200) } );

		$('#favorite-toggle, #favorite-inside').bind( 'mouseleave', function(){$('#favorite-inside').removeClass('slideDown').addClass('slideUp'); setTimeout(function(){if ( $('#favorite-inside').hasClass('slideUp') ) { $('#favorite-inside').slideUp(100, function(){ $('#favorite-first').removeClass('slide-down'); } ); }}, 300) } );
	}
};

$(document).ready(function(){adminMenu.init();});
})(jQuery);

(function($){
// show/hide/save table columns
columns = {
	init : function(page) {
		$('.hide-column-tog').click( function() {
			var column = $(this).val();
			var show = $(this).attr('checked');
			if ( show ) {
				$('.column-' + column).show();
			} else {
				$('.column-' + column).hide();
			}
			columns.save_manage_columns_state(page);
		} );
	},

	save_manage_columns_state : function(page) {
		var hidden = $('.manage-column').filter(':hidden').map(function() { return this.id; }).get().join(',');
		$.post('admin-ajax.php', {
			action: 'hidden-columns',
			hidden: hidden,
			hiddencolumnsnonce: $('#hiddencolumnsnonce').val(),
			page: page
		});
	}
}

})(jQuery);


jQuery(document).ready(function($){
	if ( 'undefined' != typeof google && google.gears ) return;



	$('.turbo-nag').show();
});
