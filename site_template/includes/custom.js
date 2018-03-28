function CreateBookmarkLink(strTitle, strLink) {

	strVersion = navigator.appVersion;
	strVersion = strVersion.toLowerCase();

	if( document.all ) { // IE Favorite
		window.external.AddFavorite( strLink, strTitle); 
	} else if (window.sidebar  && strVersion.indexOf('safari') == -1 ) { // Mozilla Firefox Bookmark
		window.sidebar.addPanel(strTitle, strLink,"");
	}
	else { // Opera Hotlist
		alert('To bookmark this site, click Bookmarks | Add bookmark or press Ctrl+D.' );
	}
}

function wpbx_mainsearch(){
	var searchpanel = jQuery(".hide").html();

jQuery(".hide").remove();
	jQuery("#t-search").prepend("<span class='searchpanel_scroll' title='Search Site'>Search</span><div class='searchpanel'><div class='adjustor'>"+ searchpanel +"</div></div>");	
	
	jQuery(".searchpanel_scroll").click(function(){
	  jQuery(".searchpanel").slideToggle("slow");
	  jQuery(this).toggleClass("active");
	});

	}

function wpbx_mainmenu(){
	if(!jQuery.browser.msie){// IE  - 2nd level Fix
	jQuery(" #nav ul ").css({opacity:"0.95"});
	}

	jQuery("#nav a").removeAttr('title');
	jQuery(" #nav > li > ul").css({display: "none"}); // Opera Fix
	jQuery(" #nav > li > ul").parent().find("a:first").append("<span class='sub_list'>&nbsp;</span>");
	jQuery(" #nav ul li > ul").parent().find("a:first").append("<span class='sub_sub_list'>&nbsp;</span>");

	jQuery(" #nav li").hover(function(){
		jQuery(this).find('ul:first:hidden').css({visibility: "visible",display: "none"}).show(400);
	},function(){
		jQuery(this).find('ul:first').css({visibility: "hidden"});
	});
}

function wpbx_tab(wrapper, header, content) {
    jQuery(".widget_block").removeClass("tablist");

	var title = wrapper + " " + header;
	var container_to_hide = wrapper + " " + content;
	disable = false;

	jQuery(title).css({display: "none"}).each(
		function(i){
			if (i == 0){
			jQuery(wrapper).prepend("<a href='/' class='tabber-title title-link active'>"+jQuery(this).html()+"</a>");
				} else {
			jQuery(".title-link:last").after("<a href='/'class='tabber-title title-link'>"+jQuery(this).html()+"</a>");
				}
			}
		);

	jQuery(container_to_hide).each(
		function(i){
			jQuery(this).addClass("tablist list_"+i); 
				if(i != 0){
					jQuery(this).css({display: "none"});
				}
			}
		);

	jQuery(".title-link").each(
		function(i){
			jQuery( this ).bind ("click",function(){
				if(jQuery(this).hasClass('active')){return false}
				if(disable == false){disable = true;
					jQuery(".title-link").removeClass("active");
					jQuery(this).addClass("active");
					jQuery(container_to_hide+":visible").slideUp(400,function(){
						jQuery(".list_"+i).slideDown(400, function(){disable=false; });
					});
				}
				return false;
				});
			}
		);
}

jQuery(document).ready(function(){
	wpbx_mainmenu();
	wpbx_mainsearch();
	wpbx_tab('.widget_block','.tabber-title','.widget');
});