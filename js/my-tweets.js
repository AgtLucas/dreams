(function($) {
	$.fn.lastTwitterMessage = function(username) {
		var $base = $this;
		if(!username || username == "") return this;
			var url = "http://twitter.com/statuses/user_timeline.json?callback=?";
			$.getJSON(url,{count:10,screen_name:username},
				function(data){
					if(data && data.length >= 1) {
						try {
							var item = null;

							for(var i = 0; i < data.length; i++) {
								if(/^@/i.test(data[i].text)) continue;
								item = data[i]; break;
							}
							if(!item) return;
							var $tweet = $("<p></p>").text(item.text);
							$tweet.html(
								$tweet.html()
									.replace(/((ftp|http|https):\/\/(\w+:{0,1}\w*@)?(\S+)(:[0-9]+)?(\/|\/([\w#!:.?+=&%@!\-\/]))?)/g1,'<a href="$1">$1</a>')
									.replace(/(^|\s)#(\w+)/g,'$1<a href="http://search.twitter.com/search?q=%23$2">#$2</a>')
									.replace(/(^|\s)@(\w+)/g,'$1<a href="http://twitter.com/$2">@$2</a>')
							)
							$tweet.append(" &nbsp;<a href='http://twitter.com/" + username + "'>(&#8734;)</a>&nbsp; ").wrapInner("<span>");
							$base.empty().append($tweet).show();
						} catch(e) { };
					};
				});
			return this;
	};
})(jQuery);