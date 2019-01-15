/*

    meChat 1.4 (08/09/2016)
    Created by Jhonatan Henrique (escarlate)
    Available exclusively at CodeCanyon.net

*/


// Array of opened chatboxes
var me_chat = new Array(); // Array which stores the chatboxes
var me_chat_displayed = new Array(); // Array which stores the visible chatboxes
var me_chat_event = new Array(); // Array which stores the events of chatboxes
var me_chat_count = 0; // Number of open chatboxes from the beginning


// Settings of chatboxes
var me_chat_settings = {};

/*
    # GENERAL
*/
me_chat_settings.box_update_timer = 3000; // Time in milliseconds to update chatboxes
me_chat_settings.box_hidden = true; // Hide chatbox when click on its header
me_chat_settings.path = '/mechat/'; // Folder path with meChat files
/*
*** EXAMPLES ***

|------------------------------------------------------------------------------------|
| me_chat_settings.path                     | URL REFERENCE                          |
|------------------------------------------------------------------------------------|
| '/'                                       | www.yoursite.com/ (NOT RECOMMENDED)    |   
| '/mechat'                                 | www.yoursite.com/mechat (RECOMMENDED)  |   
|------------------------------------------------------------------------------------|
*/

/*
    # ATTRIBUTES
*/
me_chat_settings.box_allow_mobile = true; // Allow mobile mode to chatbox
me_chat_settings.box_header_status = true; // Update status (online, offline ...)
me_chat_settings.box_allow_emojis = true; // Allow use of emojis
me_chat_settings.box_allow_imageupload = true; // Allow uploading pictures
me_chat_settings.box_allow_imageupload_maxsize = 1.5; // Maximum image size, in megabytes (Important: 0 = unlimited)


/*
    # STYLE
*/
me_chat_settings.box_color = '#4080ff'; // Color of chatbox
me_chat_settings.box_color_received_background = '#f1f0f0'; // Background color of chatbox, message received
me_chat_settings.box_color_sent_background = '#4080ff'; // Background color of chatbox, message sent
me_chat_settings.box_color_received_text = '#4b4f56'; // Color of message received
me_chat_settings.box_color_sent_text = 'white'; // Color of message sent


/*
    # SIZE, SPACE, AND BODY
*/
me_chat_settings.box_width = 260; // Width of chatbox, change also in the style sheet
me_chat_settings.box_spacebetween = 15; // Space between chatboxes
me_chat_settings.box_betweencorner = 20; // Space to the right of the screen
me_chat_settings.box_scrolllock = true; // Disable the scroll (HTML, body) while giving scroll in the chatbox


/*
    # ALERTS
*/
me_chat_settings.box_alert_messagereceived = true; // Enable receive messages alerts, when receive messages


/*
    # FLASH NOTIFICATION
*/
me_chat_settings.box_alert_header_flash = true; // Enable flash of chatboxes, if receive messages
me_chat_settings.box_alert_header_flash_color = '#0D47A1'; // Flash color, or second header color


/*
    # SOUND NOTIFICATION
*/
me_chat_settings.box_alert_sound = true; // Enable alert sounds
me_chat_settings.box_alert_sound_file = '1.mp3'; // Type of alert sound (Available: 1.mp3, 2.mp3, 3.mp3, 4.mp3)


/*
    # MESSAGES
*/
me_chat_settings.box_message_timeseparator = true; // Enable time separator
me_chat_settings.box_message_popoverdate = true; // Enable message popover (event: mouseover)
me_chat_settings.box_message_date = true; // Enable date of the message (event: tap) (mobile)
me_chat_settings.box_message_seen = true; // Enable seen date of the sent message (mobile - event: tap) and (desktop - last message)
me_chat_settings.box_message_userpicture = true; // Show user image
me_chat_settings.box_contenteditable = true; // Use attr "contenteditable" instead of <textarea> (This allows: Transform unicode characters in images)
me_chat_settings.box_contenteditable_elastic = true; // Enable auto resize of the contenteditable based on content


/*
    # COOKIES
*/
me_chat_settings.cookies_name = 'meccookie'; // Name of the cookies of the meChat
me_chat_settings.cookies_expires = 365; // Days to expire the cookies of the meChat



// Strings of meChat
var me_chat_strings = {};

/*
    # GENERAL
*/
me_chat_strings.menubox_title = 'Messages'; // Title of chatboxes menu
me_chat_strings.box_button_loadoldmessages = 'Load old messages'; // Button to load old messages
me_chat_strings.box_properties_lastmessage_img_initials = '(image)'; // Transform image tag for the property (last received message) of the chatbox
me_chat_strings.box_properties_lastmessage_yt_initials = '(video)'; // Transform youtube iframe tag for the property (last received message) of the chatbox
me_chat_strings.box_textarea = 'Type a message...'; // Placeholder textarea of the chatbox
/*
    Use "\\" to escape the characters. Example: \\Seen g:i:S A (Seen 08:32:1 PM)
    
"h" Hours - with leading zeros - 01,12
"H" Hours - without leading zeros - 1,12

"i" Minutes - with leading zeros - 00,59
"I" Minutes - without leading zeros - 0,59

"s" Seconds - with leading zeros - 00,59
"S" Seconds - without leading zeros - 0,59

"y" Year - Full Year - 2014,2015,2016
"Y" Year - last two numbers - 14,15,16

"m" Month - with leading zeros - 01,12
"M" Month - without leading zeros - 1,12

"d" Day - with leading zeros - 01,31
"D" Day - without leading zeros - 1,31

"a" Ante meridiem & Post meridiem - lowercase (am,pm)
"A" Ante meridiem & Post meridiem - uppercase (AM,PM)
*/ 
me_chat_strings.box_message_popoverdate = 'G:ia'; // Format the date of the message popover
me_chat_strings.box_message_date = 'G:ia'; // Format the date of message
me_chat_strings.box_message_seen = '\\Seen'; // Format the seen date of the message
me_chat_strings.box_lastmessage_seen = '\\Seen g:i A'; // Format the seen date of the last message


/*
    # ALERTS
*/
me_chat_strings.box_alert_received = 'Message received!'; // Received message, alert text
me_chat_strings.box_alert_loadingoldmessages = 'Loading...'; // Loading old messages, alert text


/*
    # ERRORS
*/
me_chat_strings.box_error_sendmessage = 'This message didn\'t send. Check your internet connection and try again.'; // Connection problem
me_chat_strings.box_error_imageupload_maxsize = 'Maximum image size has been exceeded.'; // If the maximum image size is exceeded


/*
    # TIME SEPARATOR
*/
/*
    Use "\\" to escape the characters. Example: \\Seen g:i:S A (Seen 08:32:1 PM)
    
"h" Hours - with leading zeros - 01,12
"H" Hours - without leading zeros - 1,12

"i" Minutes - with leading zeros - 00,59
"I" Minutes - without leading zeros - 0,59

"s" Seconds - with leading zeros - 00,59
"S" Seconds - without leading zeros - 0,59

"y" Year - Full Year - 2014,2015,2016
"Y" Year - last two numbers - 14,15,16

"m" Month - with leading zeros - 01,12
"M" Month - without leading zeros - 1,12

"d" Day - with leading zeros - 01,31
"D" Day - without leading zeros - 1,31

"a" Ante meridiem & Post meridiem - lowercase (am,pm)
"A" Ante meridiem & Post meridiem - uppercase (AM,PM)
*/ 
me_chat_strings.box_message_timeseparator_today = 'g:i A'; // Today
me_chat_strings.box_message_timeseparator_anotherday = 'm/d/Y - g:i A'; // Another day
me_chat_strings.box_message_timeseparator_anotheryear = 'm/d/Y - g:i A'; // Another year



// Using attr "contenteditable" instead of <textarea>
var me_chat_contenteditable = false;
if("contentEditable" in document.documentElement && me_chat_settings.box_contenteditable)
{
    me_chat_contenteditable = true;
}



// Function to add a time separator inside body of the chat
function meChat_timeSeparator(chatID, timestamp, oldmessages, difference)
{
    if(typeof oldmessages == "undefined") oldmessages = false; // Append to bottom
    if(typeof difference == "undefined") difference = 24 * 3600; // Use box_message_timeseparator_anotherday

    var format = ''; // String to be formatted
    if(difference < (24 * 3600)) // Today
    {
        format = me_chat_strings.box_message_timeseparator_today;
    }
    else // Another day
    {
        format = me_chat_strings.box_message_timeseparator_anotherday;
    }
    
    if(difference > (24 * 3600) * 365) // Another year
    {
        format = me_chat_strings.box_message_timeseparator_anotheryear;
    }
    format = meChat_date(format, timestamp);
    
    var chatDOM = $("[data-me-chat-id='" + chatID + "']");
    var chatDOM_content = $(chatDOM).find('.me-chat-box-body-content');

    // Add a time separator to the chatbox
    var returnDOM = false; // Time Separator DOM element
 
    // Remove repeated time separators
    var timeSeparators = $(chatDOM_content).find('*:contains("'+ format +'")');
    if($(timeSeparators).is('.me-chat-box-message-timeseparator'))
    {
        $(timeSeparators).remove();
    }
    
    if(oldmessages == false) // Append to bottom
    {
        returnDOM = $('<div class="me-chat-box-body-content-message"><div class="me-chat-box-message-timeseparator">' + format + '</div></div>').appendTo(chatDOM_content); 
    }
    else // Append to top
    {
        returnDOM = $('<div class="me-chat-box-body-content-message"><div class="me-chat-box-message-timeseparator">' + format + '</div></div>').prependTo(chatDOM_content);   
    }
    return returnDOM;
}

// Function to replace all characters not escaped
// IMPORTANT: "searchvalue" cannot be more than one character
function meChat_replaceUnescaped(string, searchvalue, newvalue)
{    
    var indexes = allIndexOf(string, searchvalue); // Total de encontrados
    var totalReplaced = 0; // Total de substituídos
    var lastReplace = 0; // Último encontrado
    
    while(totalReplaced <= indexes.length-1) // Total de encontrados (- 1)
    {
        var st_instance = string.indexOf(searchvalue, lastReplace); // Primeiro encontrado, depois do último encontrado
        lastReplace = st_instance + 1; // Último encontrado

        if(string[st_instance-1] != '\\') // Não foi escapado
        {
            var begin = string.substr(0, st_instance); // Começo
            var end = string.substr(begin.length + searchvalue.length); // Fim
            string = begin + newvalue + end; // Começo + newvalue + Fim
        }
        else // Escapado
        {
            var begin = string.substr(0, st_instance - 1); // Começo
            var end = string.substr(begin.length + 1); // Fim
            string = begin + end; // Começo + Fim        
        }
        totalReplaced++; // Contar voltas (total de substituídos ou Ñ)
    }
    return string; // Retornar string
}

function allIndexOf(string, searchvalue) {
    var indexes = [];
    
    for(var pos = string.indexOf(searchvalue); pos !== -1; pos = string.indexOf(searchvalue, pos + 1))
    {
        indexes.push(pos);
    }
    return indexes;
}

// Function to format a date string
function meChat_date(format, timestamp)
{
    var date = new Date(timestamp * 1000); // Date Object
    var hours24 = date.getHours(); // 24 hours
    var hours12 = date.getHours(); // 12 hours
    if (hours12 > 12)
    {
        hours12 -= 12;
    }
    else if (hours12 === 0)
    {
        hours12 = 12;
    }
    var minute = date.getMinutes();
    var second = date.getSeconds();
    var year = date.getFullYear();
    var month = date.getMonth() + 1;
    var day = date.getDate();
    
    // Converted
    var converted = {}; 
    
    // Hours - with leading zeros - 01,12
    converted.g = (hours12 >= 1 && hours12 <= 9) ? ('0' + hours12) : hours12;
    format = meChat_replaceUnescaped(format, 'g', converted.g);
    // without leading zeros - 1, 12
    converted.G = hours12;
    format = meChat_replaceUnescaped(format, 'G', converted.G);
    
    
    // Hours - with leading zeros - 00,23
    converted.h = (hours24 >= 0 && hours24 <= 9) ? ('0' + hours24) : hours24;
    format = meChat_replaceUnescaped(format, 'h', converted.h);
    // without leading zeros - 0,23
    converted.H = hours24;
    format = meChat_replaceUnescaped(format, 'H', converted.H);
 

    // Minutes - with leading zeros - 00,59
    converted.i = (minute >= 0 && minute <= 9) ? ('0' + minute) : minute;
    format = meChat_replaceUnescaped(format, 'i', converted.i);
    // without leading zeros - 0,59
    converted.I = minute;
    format = meChat_replaceUnescaped(format, 'I', converted.I);
    
    
    // Seconds - with leading zeros - 00,59
    converted.s = (second >= 0 && second <= 9) ? ('0' + second) : second;
    format = meChat_replaceUnescaped(format, 's', converted.s);
    // without leading zeros - 0,59
    converted.S = second;
    format = meChat_replaceUnescaped(format, 'S', converted.S);
    
    
    // Year - Full Year - 2016
    converted.y = year;
    format = meChat_replaceUnescaped(format, 'y', year);
    // last two numbers - 16
    format = meChat_replaceUnescaped(format, 'Y', year % 100);
    
    
    // Month - with leading zeros - 01,12
    converted.m = (month >= 0 && month <= 9) ? ('0' + month) : month;
    format = meChat_replaceUnescaped(format, 'm', converted.m);
    // without leading zeros - 1,12
    converted.M = month;   
    format = meChat_replaceUnescaped(format, 'M', converted.M);
    
    
    // Day - with leading zeros - 01,31
    converted.d = (day >= 0 && day <= 9) ? '0'+day : day;
    format = meChat_replaceUnescaped(format, 'd', converted.d);
    // without leading zeros - 1,31
    converted.D = day;
    format = meChat_replaceUnescaped(format, 'D', converted.D);
    
    
    // Ante meridiem & Post meridiem - lowercase (am,pm)
    converted.a = hours24 >= 12 ? 'pm' : 'am';
    format = meChat_replaceUnescaped(format, 'a', converted.a);
    // uppercase (AM,PM)
    converted.A = converted.a.toUpperCase();
    format = meChat_replaceUnescaped(format, 'A', converted.A);
    
    return format;
}

// meChat settings for the user
var me_chat_usersettings = {};
me_chat_usersettings.disable_notifications = false; // Disable notifications from chatboxes (flash)
me_chat_usersettings.disable_sounds = false; // Disable sounds of chatboxes

// Array of tabs in the chatboxes menu
var me_chat_tab = new Array();
var me_chat_tab_count = 0;
var me_chat_tab_item_count = 0;

// Function to set the settings of meChat
function meChat_Settings(object)
{
	for (var key in object)
	{
		if (object.hasOwnProperty(key))
		{
			me_chat_settings[key] = object[key];
		}
	}
}

// Function to set the strings of meChat
function meChat_Strings(object)
{
	for (var key in object)
	{
		if (object.hasOwnProperty(key))
		{
			me_chat_strings[key] = object[key];
		}
	}
}

// Functions of tabs in the chatboxes menu
// Add tab
function meChatTab_Add(tabName)
{
	me_chat_tab.push(
	{
		id: me_chat_tab_count,
		tabname: tabName,
		item: [],
		visibility: false,
		action: '',
		function: function() {}
	});
	me_chat_tab_count++;
	return (me_chat_tab_count - 1); // Returns the id of the tab
}

// Remove tab
function meChatTab_Remove(tabID)
{
	for (var i = 0; i < me_chat_tab.length; i++)
	{
		if (me_chat_tab[i].id == tabID)
		{
			me_chat_tab.splice(i, 1);
			return true; // Returns true if found
		}
	}
	return false; // Returns false if not found
}

// Show tab
function meChatTab_Show(tabID)
{
	for (var i = 0; i < me_chat_tab.length; i++)
	{
		me_chat_tab[i].visibility = false;
		if (me_chat_tab[i].id == tabID)
		{
			me_chat_tab[i].visibility = true;
			meChatTab_Update(tabID);
			return true; // Returns true if found
		}
	}
	return false; // Returns false if not found    
};

// Hide tab
function meChatTab_Update(tabID)
{
	if (meChatTab_Visibility(tabID) == true)
	{
		var tabstring = '';
		for (var i = 0; i < me_chat_tab.length; i++)
		{
			for (var id = 0; id < me_chat_tab[i].item.length; id++)
			{
				if (me_chat_tab[i].id == tabID)
				{
					tabstring += '<li data-me-chat-tab-item="' + me_chat_tab[i].item[id].id + '">' + me_chat_tab[i].item[id].html + '</li>';
				}
			}
		}
		$('.me-chat-box-manager-content ul').html(tabstring);
	}
	return false; // Returns false if tab not found or is not visible
};

// Change the name of tab
function meChatTab_Rename(tabID, tabName)
{
	var tabstring = '';
	for (var i = 0; i < me_chat_tab.length; i++)
	{
		if (me_chat_tab[i].id == tabID)
		{
			me_chat_tab[i].tabname = tabName;
			$('[data-me-chat-tab_target="' + tabID + '"]').html(tabName);
			meChatTab_Update(tabID);
			return true; // Returns true if found
		}
	}
	return false; // Returns false if not found
};

// Add function to tab
function meChatTab_Function(tabID, event_, function_)
{
	for (var i = 0; i < me_chat_tab.length; i++)
	{
		if (me_chat_tab[i].id == tabID)
		{
			me_chat_tab[i].function = function_;
			me_chat_tab[i].action = event_;
			return true; // Returns true if found
		}
	}
	return false; // Returns false if not found
}

// Checks if the tab is visible
function meChatTab_Visibility(tabID)
{
	for (var i = 0; i < me_chat_tab.length; i++)
	{
		if (me_chat_tab[i].id == tabID)
		{
			return me_chat_tab[i].visibility; // Returns the id of the hidden tab
		}
	}
	return false; // Returns false if not found
}

// Add the item to tab
function meChatTab_AddItem(tabID, html)
{
	for (var i = 0; i < me_chat_tab.length; i++)
	{
		if (me_chat_tab[i].id == tabID)
		{
			me_chat_tab[i].item.push(
			{
				id: me_chat_tab_item_count,
				html: html,
				action: '',
				function: function() {}
			});
			me_chat_tab_item_count++;
			meChatTab_Update(tabID);
			return (me_chat_tab_item_count - 1); // Returns the id of item
		}
	}
	return false; // Returns false if it does not find the tab
}

// Remove the item of tab
function meChatTab_RemoveItem(itemID)
{
	for (var i = 0; i < me_chat_tab.length; i++)
	{
		var tabName = -1;
		for (var id = 0; id < me_chat_tab[i].item.length; id++)
		{
			if (me_chat_tab[i].item[id].id == itemID)
			{
				me_chat_tab[i].item.splice(id, 1);
				tabName = me_chat_tab[i].tabname;
			}
		}
		if (me_chat_tab[i].tabname == tabName)
		{
			meChatTab_Update(me_chat_tab[i].id);
			return true; // Returns true if found
		}
	}
	return false; // Returns false if not found
}

// Remove all item of the tab
function meChatTab_RemoveAllItem(tabID)
{
	for (var i = 0; i < me_chat_tab.length; i++)
	{
		if (me_chat_tab[i].id == tabID)
		{
			me_chat_tab[i].item = new Array();
			meChatTab_Update(tabID);
		}
	}
}

// Update html of item tab
function meChatTab_ItemHTML(itemID, html)
{
	if (itemID == -1) return true;
	for (var id = 0; id < me_chat_tab.length; id++)
	{
		for (var idx = 0; idx < me_chat_tab[id].item.length; idx++)
		{
			if (me_chat_tab[id].item[idx].id == itemID)
			{
				me_chat_tab[id].item[idx].html = html;
				$('[data-me-chat-tab-item="' + itemID + '"]').html(html);
				return true; // Returns true if found
			}
		}
	}
	return false; // Returns false if not found
}

// Add function to item tab
function meChatTab_ItemFunction(itemID, event_, function_)
{
	for (var i = 0; i < me_chat_tab.length; i++)
	{
		for (var id = 0; id < me_chat_tab[i].item.length; id++)
		{
			if (me_chat_tab[i].item[id].id == itemID)
			{
				me_chat_tab[i].item[id].action = event_;
				me_chat_tab[i].item[id].function = function_;
				return i; // Returns the id of item
			}
		}
	}
	return false; // Returns false if not found
}

// Events in the tabs of the chatboxes menu
// Run function if occur events in the tabs
$(document).on('click touchstart mouseenter', '.me-chat-box-manager-tabs > a', function(event)
{

	// Show contents of the tab
	if (event.type == 'click' || event.type == 'touchstart')
	{
		var tabID = $(this).data('me-chat-tab_target');
		meChatTab_Show(tabID);
	}

	// Run function
	var tabID = $(this).data('me-chat-tab_target');
	for (var i = 0; i < me_chat_tab.length; i++)
	{
		if (me_chat_tab[i].id == tabID)
		{
			if (me_chat_tab[i].action.lastIndexOf(event.type) > -1)
			{
				me_chat_tab[i].function.apply(tabID, [tabID, this]); // Call the function with this value changed
				break;
			}
		}
	}
});

// Run function if occur events in the tabs item
$(document).on('click touchstart mouseenter', '.me-chat-box-manager-content li', function(event)
{
	var itemID = $(this).data('me-chat-tab-item');
	for (var i = 0; i < me_chat_tab.length; i++)
	{
		for (var id = 0; id < me_chat_tab[i].item.length; id++)
		{
			if (me_chat_tab[i].item[id].id == itemID)
			{
				if (me_chat_tab[i].item[id].action.lastIndexOf(event.type) > -1)
				{
					if (!$(event.target).is("label"))
					{ // Avoid performing the function twice
						me_chat_tab[i].item[id].function.apply(itemID, [itemID, this]); // Call the function with this value changed
						event.preventDefault();
						event.stopPropagation();
						break;
					}
				}
			}
		}
	}
});

// General functions
// Function to convert message tags and characters in HTML
function meChat_html(message, preview)
{
	if (typeof preview == 'undefined') preview = true;
    
    var returnMessage = ''
	var regex_img = /\[img\](.*?)\[\/img\]/ig; // [img][/img]
    var regex_youtube = /(?:https?:\/\/)?(?:www\.|m\.)?(?:youtu\.be\/|youtube\.com\/(?:embed\/|v\/|playlist\?|watch\?v=|watch\?.+(?:&|&#38;);v=))([a-zA-Z0-9\-_]{11})?(?:(?:\?|&|&#38;)index=((?:\d){1,3}))?(?:(?:\?|&|&#38;)?list=([a-zA-Z\-_0-9]{34}))?(?:\S+)?/gmi;
    var regex_emojis = /\ud83d\udc68\u200d\u2764\ufe0f\u200d\ud83d\udc8b\u200d\ud83d\udc68|\ud83d\udc68\u200d\ud83d\udc68\u200d\ud83d\udc66\u200d\ud83d\udc66|\ud83d\udc68\u200d\ud83d\udc68\u200d\ud83d\udc67\u200d\ud83d[\udc66\udc67]|\ud83d\udc68\u200d\ud83d\udc69\u200d\ud83d\udc66\u200d\ud83d\udc66|\ud83d\udc68\u200d\ud83d\udc69\u200d\ud83d\udc67\u200d\ud83d[\udc66\udc67]|\ud83d\udc69\u200d\u2764\ufe0f\u200d\ud83d\udc8b\u200d\ud83d[\udc68\udc69]|\ud83d\udc69\u200d\ud83d\udc69\u200d\ud83d\udc66\u200d\ud83d\udc66|\ud83d\udc69\u200d\ud83d\udc69\u200d\ud83d\udc67\u200d\ud83d[\udc66\udc67]|\ud83d\udc68\u200d\u2764\ufe0f\u200d\ud83d\udc68|\ud83d\udc68\u200d\ud83d\udc68\u200d\ud83d[\udc66\udc67]|\ud83d\udc68\u200d\ud83d\udc69\u200d\ud83d[\udc66\udc67]|\ud83d\udc69\u200d\u2764\ufe0f\u200d\ud83d[\udc68\udc69]|\ud83d\udc69\u200d\ud83d\udc69\u200d\ud83d[\udc66\udc67]|\ud83d\udc41\u200d\ud83d\udde8|(?:[\u0023\u002a\u0030-\u0039])\ufe0f?\u20e3|(?:(?:[\u261d\u270c])(?:\ufe0f|(?!\ufe0e))|\ud83c[\udf85\udfc2-\udfc4\udfc7\udfca\udfcb]|\ud83d[\udc42\udc43\udc46-\udc50\udc66-\udc69\udc6e\udc70-\udc78\udc7c\udc81-\udc83\udc85-\udc87\udcaa\udd75\udd90\udd95\udd96\ude45-\ude47\ude4b-\ude4f\udea3\udeb4-\udeb6\udec0]|\ud83e\udd18|[\u26f9\u270a\u270b\u270d])(?:\ud83c[\udffb-\udfff]|)|\ud83c\udde6\ud83c[\udde8-\uddec\uddee\uddf1\uddf2\uddf4\uddf6-\uddfa\uddfc\uddfd\uddff]|\ud83c\udde7\ud83c[\udde6\udde7\udde9-\uddef\uddf1-\uddf4\uddf6-\uddf9\uddfb\uddfc\uddfe\uddff]|\ud83c\udde8\ud83c[\udde6\udde8\udde9\uddeb-\uddee\uddf0-\uddf5\uddf7\uddfa-\uddff]|\ud83c\udde9\ud83c[\uddea\uddec\uddef\uddf0\uddf2\uddf4\uddff]|\ud83c\uddea\ud83c[\udde6\udde8\uddea\uddec\udded\uddf7-\uddfa]|\ud83c\uddeb\ud83c[\uddee-\uddf0\uddf2\uddf4\uddf7]|\ud83c\uddec\ud83c[\udde6\udde7\udde9-\uddee\uddf1-\uddf3\uddf5-\uddfa\uddfc\uddfe]|\ud83c\udded\ud83c[\uddf0\uddf2\uddf3\uddf7\uddf9\uddfa]|\ud83c\uddee\ud83c[\udde8-\uddea\uddf1-\uddf4\uddf6-\uddf9]|\ud83c\uddef\ud83c[\uddea\uddf2\uddf4\uddf5]|\ud83c\uddf0\ud83c[\uddea\uddec-\uddee\uddf2\uddf3\uddf5\uddf7\uddfc\uddfe\uddff]|\ud83c\uddf1\ud83c[\udde6-\udde8\uddee\uddf0\uddf7-\uddfb\uddfe]|\ud83c\uddf2\ud83c[\udde6\udde8-\udded\uddf0-\uddff]|\ud83c\uddf3\ud83c[\udde6\udde8\uddea-\uddec\uddee\uddf1\uddf4\uddf5\uddf7\uddfa\uddff]|\ud83c\uddf4\ud83c\uddf2|\ud83c\uddf5\ud83c[\udde6\uddea-\udded\uddf0-\uddf3\uddf7-\uddf9\uddfc\uddfe]|\ud83c\uddf6\ud83c\udde6|\ud83c\uddf7\ud83c[\uddea\uddf4\uddf8\uddfa\uddfc]|\ud83c\uddf8\ud83c[\udde6-\uddea\uddec-\uddf4\uddf7-\uddf9\uddfb\uddfd-\uddff]|\ud83c\uddf9\ud83c[\udde6\udde8\udde9\uddeb-\udded\uddef-\uddf4\uddf7\uddf9\uddfb\uddfc\uddff]|\ud83c\uddfa\ud83c[\udde6\uddec\uddf2\uddf8\uddfe\uddff]|\ud83c\uddfb\ud83c[\udde6\udde8\uddea\uddec\uddee\uddf3\uddfa]|\ud83c\uddfc\ud83c[\uddeb\uddf8]|\ud83c\uddfd\ud83c\uddf0|\ud83c\uddfe\ud83c[\uddea\uddf9]|\ud83c\uddff\ud83c[\udde6\uddf2\uddfc]|\ud83c[\udccf\udd8e\udd91-\udd9a\udde6-\uddff\ude01\ude32-\ude36\ude38-\ude3a\ude50\ude51\udf00-\udf21\udf24-\udf84\udf86-\udf93\udf96\udf97\udf99-\udf9b\udf9e-\udfc1\udfc5\udfc6\udfc8\udfc9\udfcc-\udff0\udff3-\udff5\udff7-\udfff]|\ud83d[\udc00-\udc41\udc44\udc45\udc51-\udc65\udc6a-\udc6d\udc6f\udc79-\udc7b\udc7d-\udc80\udc84\udc88-\udca9\udcab-\udcfd\udcff-\udd3d\udd49-\udd4e\udd50-\udd67\udd6f\udd70\udd73\udd74\udd76-\udd79\udd87\udd8a-\udd8d\udda5\udda8\uddb1\uddb2\uddbc\uddc2-\uddc4\uddd1-\uddd3\udddc-\uddde\udde1\udde3\udde8\uddef\uddf3\uddfa-\ude44\ude48-\ude4a\ude80-\udea2\udea4-\udeb3\udeb7-\udebf\udec1-\udec5\udecb-\uded0\udee0-\udee5\udee9\udeeb\udeec\udef0\udef3]|\ud83e[\udd10-\udd17\udd80-\udd84\uddc0]|[\u2328\u23cf\u23e9-\u23f3\u23f8-\u23fa\u2602-\u2604\u2618\u2620\u2622\u2623\u2626\u262a\u262e\u262f\u2638\u2692\u2694\u2696\u2697\u2699\u269b\u269c\u26b0\u26b1\u26c8\u26ce\u26cf\u26d1\u26d3\u26e9\u26f0\u26f1\u26f4\u26f7\u26f8\u2705\u271d\u2721\u2728\u274c\u274e\u2753-\u2755\u2763\u2795-\u2797\u27b0\u27bf\ue50a]|(?:\ud83c[\udc04\udd70\udd71\udd7e\udd7f\ude02\ude1a\ude2f\ude37]|[\u00a9\u00ae\u203c\u2049\u2122\u2139\u2194-\u2199\u21a9\u21aa\u231a\u231b\u24c2\u25aa\u25ab\u25b6\u25c0\u25fb-\u25fe\u2600\u2601\u260e\u2611\u2614\u2615\u2639\u263a\u2648-\u2653\u2660\u2663\u2665\u2666\u2668\u267b\u267f\u2693\u26a0\u26a1\u26aa\u26ab\u26bd\u26be\u26c4\u26c5\u26d4\u26ea\u26f2\u26f3\u26f5\u26fa\u26fd\u2702\u2708\u2709\u270f\u2712\u2714\u2716\u2733\u2734\u2744\u2747\u2757\u2764\u27a1\u2934\u2935\u2b05-\u2b07\u2b1b\u2b1c\u2b50\u2b55\u3030\u303d\u3297\u3299])(?:\ufe0f|(?!\ufe0e))/g;
    
	returnMessage = message.replace(/&/g, '&amp;'); // character &
	returnMessage = returnMessage.replace(/</g, '&lt;'); // character <
	returnMessage = returnMessage.replace(/>/g, '&gt;'); // character >
	returnMessage = returnMessage.replace(/"/g, '&quot;'); // character "
	returnMessage = returnMessage.replace(/'/g, '&#39;'); // character '    
    returnMessage = returnMessage.replace(regex_emojis, function(a)
    {
        return '<img data-mechat-emoji="'+ a +'" src="//twemoji.maxcdn.com/2/72x72/'+ twemoji_toCodePoint(a) +'.png">'
    });
        
    // Youtube
    returnMessage = returnMessage.replace(regex_youtube, function(a, b)
    {
        if(preview === true) return '<iframe class="me-chat-box-message-youtube" width="200" height="100" src="//www.youtube.com/embed/'+ b +'" frameborder="0" allowfullscreen></iframe>';
        if (preview === false) return returnMessage = ' ' + me_chat_strings.box_properties_lastmessage_yt_initials + ' ';

        return a;
    });    
    
	// Insert images
	returnMessage = returnMessage.replace(regex_img, function(str, url)
	{
		if (preview === true) return returnMessage = '<div class="me-chat-box-message-image" data-me-chat-href="' + url + '" style="background-image: url(' + url + ')"></div>';
		if (preview === false) return returnMessage = ' ' + me_chat_strings.box_properties_lastmessage_img_initials + ' ';
        
        return str;
	});
    
	return returnMessage;
}

// Function to get the current timestamp
function meChat_timestamp()
{
	return Math.floor(new Date().getTime() / 1000);
}

// Function for get the recently updated chatboxes
function meChat_recentlyUpdated()
{
	var me_chat_sorted = me_chat; // Copy of the original chatboxes

	me_chat_sorted.sort(function(a, b)
	{ // Arrange in order of update
		return b.lastupdate - a.lastupdate
	});

	return me_chat_sorted;
}

// Function for get the recently updated and visible chatboxes
function meChat_recentlyUpdated_displayed()
{
	var me_chat_sorted = me_chat_displayed; // Copy of the original chatboxes

	me_chat_sorted.sort(function(a, b)
	{ // Arrange in order of update
		return b.lastupdate - a.lastupdate
	});

	return me_chat_sorted;
}

// Function to get the chatboxes in order of creation, descending
function meChat_recentlyOpenedDESC()
{
	var me_chat_sorted = me_chat; // Copy of the original chatboxes

	me_chat_sorted.sort(function(a, b)
	{
		return b.createdorder - a.createdorder
	}); // Arrange in order of creation

	return me_chat_sorted;
}

// Function to get the chatboxes in order of creation and visible, descending
function meChat_recentlyOpenedDESC_displayed()
{
	var me_chat_sorted = me_chat_displayed; // Copy of the original chatboxes

	me_chat_sorted.sort(function(a, b)
	{
		return b.createdorder - a.createdorder
	}); // Arrange in order of creation

	return me_chat_sorted;
}

// Function to get the chatboxes in order of creation, ascending
function meChat_recentlyOpenedASC()
{
	var me_chat_sorted = me_chat; // Copy of the original chatboxes

	me_chat_sorted.sort(function(a, b)
	{
		return a.createdorder - b.createdorder
	}); // Arrange in order of creation

	return me_chat_sorted;
}

// Function to get the chatboxes in order of creation and visible, ascending
function meChat_recentlyOpenedASC_displayed()
{
	var me_chat_sorted = me_chat_displayed; // Copy of the original chatboxes

	me_chat_sorted.sort(function(a, b)
	{
		return a.createdorder - b.createdorder
	}); // Arrange in order of creation

	return me_chat_sorted;
}

// Function to check whether lack space to add another chatbox
function meChat_lackspace()
{
	var me_chat_right_after = (((me_chat_settings.box_spacebetween + me_chat_settings.box_width) * (me_chat_displayed.length + 1)) + me_chat_settings.box_betweencorner);
    
	if (me_chat_right_after >= window.innerWidth && window.innerWidth > 590)
	{
		return true; // Returns true if lack space
	}
	return false; // Returns false if not lack space
}

// Function to return the maximum number of chatboxes that will fit on your screen
function meChat_maxspace()
{
	return Math.floor(window.innerWidth / (me_chat_settings.box_width + me_chat_settings.box_betweencorner));
}

// Function to check how many chatboxes should be removed to fit the screen
function meChat_mustremove()
{
	return (meChat_recentlyOpenedDESC_displayed().length + 1 - meChat_maxspace());
}

// Function to open chatboxes menu
function meChatMenu_Open()
{
	// Insert array
	var me_chat_obj = {};
	me_chat_obj.id = 0;
	me_chat_obj.name = 'menu';
	me_chat_obj.flash = false; // flash notification
	me_chat_obj.lastupdate = meChat_timestamp(); // last update of chatbox, in timestamp
	me_chat_obj.createdorder = me_chat_count; // order of creation of the chatbox
	me_chat_obj.unread = 0; // amount of unread messages
	me_chat_obj.displayed = false; // chatbox displayed
    me_chat_obj.hidden = false; // chatbox hidden
	me_chat_obj.lastmessageid = 0; // id of last message
	me_chat_obj.firstmessageid = 0; // id of first message
	me_chat_obj.loadingoldmessages = false; // is loading old messages
	me_chat.push(me_chat_obj);
	me_chat_displayed.push(me_chat_obj);
	me_chat_count++;

	// Build menu
	var me_chat_string = '<div class="me-chat-box me-chat-box-menu ';

	// Enable mobile mode
	if (me_chat_settings.box_allow_mobile)
	{
		me_chat_string += 'me-chat-box-mobile';
	}

	// Build menu
	me_chat_string += '" style="right: ' + me_chat_settings.box_betweencorner + 'px;" data-me-chat-id="' + me_chat_obj.id + '"><div class="me-chat-box-header" style="background-color: ' + me_chat_settings.box_color + ';"><div class="me-chat-box-header-name">' + me_chat_strings.menubox_title + '</div><div class="me-chat-box-header-close">&minus;</div></div><div class="me-chat-box-manager"><div class="me-chat-box-manager-tabs">';

	// Add tabs
	for (var i = 0; i < me_chat_tab.length; i++)
	{
		me_chat_string += '<a data-me-chat-tab_target="' + me_chat_tab[i].id + '" class="me-chat-box-manager-tab" style="width: ' + (100 / me_chat_tab.length) + '%;">' + me_chat_tab[i].tabname + '</a>';
	}

	// Build menu
	me_chat_string += '</div><div class="me-chat-box-manager-content" style="display: block;"><ul></ul></div></div></div>';

	// Add chatboxes menu to body
	$('body').append(me_chat_string);
    
    // Get hidden chatboxes
    var hiddenChats = meChatCookie_getProp('hidden_chats');
    if(typeof hiddenChats == "undefined")
    {
        hiddenChats = new Array();
    }
            
    // Hide chatbox
    for(var i = 0; i < hiddenChats.length; i++)
    {
        if(hiddenChats[i] == me_chat_obj.id)
        {                    
            $("div[data-me-chat-id='" + me_chat_obj.id + "']").addClass('me-chat-box-hidden');
            break;
        }
    }    
	return true;
}

// Function to open chatbox
function meChat_Open(id)
{
	// Checks if the chat box is already open
	var chatFound = false;
	var chatObj = {};
	for (var i = 0; i < me_chat.length; i++)
	{
		if (id == me_chat[i].id)
		{
			chatFound = true;
			chatObj = me_chat[i];
		}
	}

	// If the chatbox is already open and the horizontal resolution is larger than 590px
	if (chatFound == true && chatObj.displayed == false && window.innerWidth > 590)
	{
		return; // The function ends here
	}

	// If the chatbox already exists and is not visible
	if (chatFound == true)
	{
		// Check whether lack space to add another chatbox, if lack, will remove the last chatbox
		if (meChat_lackspace())
		{
			// Remove the recently opened chatboxes
			var me_chat_removed = 0; // Amount of chatboxes removed
			var mustRemove = meChat_mustremove(); // Check how many chatboxes should be removed to fit the screen
			var array = meChat_recentlyOpenedDESC_displayed();
            
			for (var x = 0; x < mustRemove; x++)
			{
				me_chat_removed = 0;

				for (var i = 0; i < array.length; i++)
				{
					if (me_chat_removed != 1)
					{
						var chatID = array[i].id;
						var chatDOM = $("div[data-me-chat-id='" + chatID + "']");

						for (var idx = 0; idx < me_chat.length; idx++)
						{
							if (me_chat[idx].id == array[i].id)
							{
								me_chat[idx].displayed = true;
							}
						}
						array.shift();

						$(chatDOM).hide();
						me_chat_removed++;
					}
				}
			}
			me_chat_displayed = array;
		}

		// Add chatbox the array of visible chatboxes
		var chatDOM = $('[data-me-chat-id="' + id + '"]');
		$(chatDOM).show();
		if (window.innerWidth < 590 && $(chatDOM).hasClass('me-chat-box-hidden')) $(chatDOM).removeClass('me-chat-box-hidden');
		chatObj.displayed = false;
		chatObj.created_order = me_chat_count;
		me_chat_displayed.push(chatObj);
		me_chat_count++;

		for (var i = 0; i < me_chat.length; i++)
		{
			if (me_chat[i].id == id)
			{
				me_chat[i].displayed = false;
			}
		}

		meChat_Order(); // Organize chatboxes        
		return;
	}

	// Check whether lack space to add another chatbox, if lack, will remove the last chatbox
	if (meChat_lackspace())
	{
		// Remove the recently opened chatboxes
		var me_chat_removed = 0; // Amount of chatboxes removed
		var mustRemove = meChat_mustremove(); // Check how many chatboxes should be removed to fit the screen
		var array = meChat_recentlyOpenedDESC_displayed();

		for (var x = 0; x < mustRemove; x++)
		{
			me_chat_removed = 0;

			for (var i = 0; i < array.length; i++)
			{
				if (me_chat_removed != 1)
				{
					var chatID = array[i].id;
					var chatDOM = $("div[data-me-chat-id='" + chatID + "']");

					for (var idx = 0; idx < me_chat.length; idx++)
					{
						if (me_chat[idx].id == array[i].id)
						{
							me_chat[idx].displayed = true;
						}
					}

					array.shift();

					$(chatDOM).hide();
					me_chat_removed++;
				}
			}
		}
		me_chat_displayed = array;
	}

	// Determine space that the new chat box must have right corner
	var me_chat_right = (((me_chat_settings.box_spacebetween + me_chat_settings.box_width) * me_chat_displayed.length) + me_chat_settings.box_betweencorner);

	// Insert array
	var me_chat_obj = {};
	me_chat_obj.id = id; // user id
	me_chat_obj.name = ''; // user name
	me_chat_obj.picture = ''; // user photo
	me_chat_obj.flash = false; // flash notification
	me_chat_obj.lastupdate = meChat_timestamp(); // last update of chatbox, in timestamp
	me_chat_obj.createdorder = me_chat_count; // order of creation of the chatbox
	me_chat_obj.unread = 0; // amount of unread messages
	me_chat_obj.displayed = false; // chatbox displayed
    me_chat_obj.hidden = false; // chatbox hidden    
	me_chat_obj.lastmessageid = 0; // id of last message
	me_chat_obj.firstmessageid = 0; // id of first message
	me_chat_obj.lastmessage = ''; // last message
    me_chat_obj.lastmessage_ajax = ''; // last message with data returned via AJAX
	me_chat_obj.lastmessagessent = new Array(); // last messages sent
    me_chat_obj.firstmessage_ajax = ''; // first message with data returned via AJAX
	me_chat_obj.loadingoldmessages = false; // is loading old messages

	me_chat.push(me_chat_obj);
	me_chat_displayed.push(me_chat_obj);
	me_chat_count++;

	// AJAX
	$.ajax(
	{
		url: me_chat_settings.path + 'php/templates/ajax.open.php',
		type: 'POST',
		data:
		{
			id: id
		},
		success: function(data)
		{
			data = JSON.parse(data);

			// User information
			meChat_setProp(id, 'name', data.name);
			meChat_setProp(id, 'picture', data.picture);

			// Build chat
			var me_chat_string = '<div class="me-chat-box ';

			// Enable mobile mode
			if (me_chat_settings.box_allow_mobile)
			{
				me_chat_string += 'me-chat-box-mobile';
			}

			// Build chat
			me_chat_string += '" style="right: ' + me_chat_right + 'px;" data-me-chat-id="' + id + '"><div class="me-chat-box-header" style="background-color: ' + me_chat_settings.box_color + '">';

			if (me_chat_settings.box_header_status)
			{
				me_chat_string += '<div class="me-chat-box-header-status">&#9679;</div>';
			}

			// Build chat
			me_chat_string += '<div class="me-chat-box-header-name">' + data.name + '</div><div class="me-chat-box-header-close">&times;</div></div><div class="me-chat-box-body"><div class="me-chat-box-body-alert" style="background-color: ' + me_chat_settings.box_color + '"></div><div class="me-chat-box-body-emoji" style="display: none;"><table><tbody>' + emojisTable + '</tbody></table></div><div class="me-chat-box-body-content" style="display: block;"><div class="me-chat-box-body-content-message"><div class="me-chat-box-message-load" style="background-color: ' + me_chat_settings.box_color + '">' + me_chat_strings.box_button_loadoldmessages + '</div></div></div><div class="me-chat-box-body-submit">' + (me_chat_settings.box_contenteditable ? '<div class="me-chat-box-body-submit-contenteditable '+ (me_chat_settings.box_contenteditable_elastic ? 'elastic' : '') +'" contenteditable="true"></div><div class="me-chat-box-body-submit-contenteditable-placeholder">' + me_chat_strings.box_textarea + '</div>' : '<textarea placeholder="' + me_chat_strings.box_textarea + '"></textarea>') + '<div class="me-chat-box-body-submit-icon">';

			// Allow image upload
			if (me_chat_settings.box_allow_imageupload)
			{
				me_chat_string += '<a href="#" class="me-chat-box-icon me-chat-box-imageupload" style="background-image: url(' + me_chat_settings.path + 'assets/icons/camera.png);"><input type="file" accept="image/*" capture="camera" style="display: none;" /></a>';
			}

			// Show emojis
			if (me_chat_settings.box_allow_emojis)
			{
				me_chat_string += '<a href="#" class="me-chat-box-icon me-chat-box-body-emoji-button" style="background-image: url(' + me_chat_settings.path + 'assets/icons/emoji.png);"></a>';
			}

			// Build chat
			me_chat_string += '</div></div></div></div>';

			// Add chatbox to body
			$('body').append(me_chat_string);
            
            
            // Get hidden chatboxes
            var hiddenChats = meChatCookie_getProp('hidden_chats');
            if(typeof hiddenChats == "undefined")
            {
                hiddenChats = new Array();
            }
            
            // Hide chatbox
            for(var i = 0; i < hiddenChats.length; i++)
            {
                if(hiddenChats[i] == id)
                {                    
                    $("div[data-me-chat-id='" + id + "']").addClass('me-chat-box-hidden');
                    break;
                }
            } 
            
            
			// Load messages
			$.each(data.messages, function(key, value)
			{                
				if (key == 0) // Save first message
                {
                    meChat_setProp(id, 'firstmessageid', value.message.id);
                    meChat_setProp(id, 'firstmessage_ajax', value.message);
                }
                
                // Separate messages
                var lastmessage_ajax = meChat_getProp(id, 'lastmessage_ajax');
                if (Math.ceil(value.message.date_timestamp / 60) != Math.ceil(lastmessage_ajax.date_timestamp / 60))
                {                            
                    if(me_chat_settings.box_message_timeseparator) meChat_timeSeparator(data.id, value.message.date_timestamp, false, Math.ceil(value.message.date_timestamp / 60) - Math.ceil(lastmessage_ajax.date_timestamp / 60));
                }    
                        
                // Save last message
                meChat_setProp(id, 'lastmessage_ajax', value.message);
				meChat_setProp(id, 'lastmessageid', value.message.id); // Last message
                
                var returnDOM = false;
				if (value.from == id) // Received messages
                {
                    returnDOM = meChat_receiveDOMMessage(id, value.message.message, false);
                    
                    // Received message date 
                    if(me_chat_settings.box_message_popoverdate) $(returnDOM).append('<div class="me-chat-box-message-popover"><div class="me-chat-box-message-popover-caretright"></div><div class="me-chat-box-message-popover-content">'+ meChat_date(me_chat_strings.box_message_popoverdate, value.message.date_timestamp) +'</div></div>');   
                    
                    if(me_chat_settings.box_message_date) $(returnDOM).prepend('<div class="me-chat-box-message-received-date">'+ meChat_date(me_chat_strings.box_message_date, value.message.date_timestamp) +'</div>');   
                }
				else // Messages sent
                {
                    returnDOM = meChat_sendDOMMessage(id, value.message.message);
                    
                    // Sent message date 
                    if(me_chat_settings.box_message_popoverdate) $(returnDOM).append('<div class="me-chat-box-message-popover"><div class="me-chat-box-message-popover-caretleft"></div><div class="me-chat-box-message-popover-content">'+ meChat_date(me_chat_strings.box_message_popoverdate, value.message.date_timestamp) +'</div></div>');       
                    
                    if(me_chat_settings.box_message_date) $(returnDOM).prepend('<div class="me-chat-box-message-sent-date">'+ meChat_date(me_chat_strings.box_message_date, value.message.date_timestamp) +'</div>');   
                    
                    // Seen date
                    if(value.message.read_timestamp != -1)
                    {
                        if(me_chat_settings.box_message_seen) $(returnDOM).append('<div class="me-chat-box-message-sent-seen">'+ meChat_date(me_chat_strings.box_message_seen, value.message.read_timestamp) +'</div>');  
                    }
                    else
                    {
                        if(me_chat_settings.box_message_seen) $(returnDOM).append('<div class="me-chat-box-message-sent-seen"></div>'); 
                    }
                }
			});

			meChat_scrollToBottom(id); // Scroll to the bottom

			// Call the event functions chat.open
			for (var i = 0; i < me_chat_event.length; i++)
			{
				if (me_chat_event[i].action.lastIndexOf('chat.open') > -1)
				{
					me_chat_event[i].function.apply(id, [id, $("[data-me-chat-id='" + id + "']"), me_chat_obj]); // this: id, chatID: id, chatDOM: DOM element, chatProp: array of chatbox
				}
			}

			meChat_Order();
		},
		error: function()
		{
			// Remove chatbox of chatboxes array
			for (var i = 0; i < me_chat.length; i++)
			{
				if (id == me_chat[i].id)
				{
					var index = me_chat.indexOf(me_chat[i]);
					me_chat.splice(index, 1);
				}
			}
			for (var i = 0; i < me_chat_displayed.length; i++)
			{
				if (id == me_chat_displayed[i].id)
				{
					var index = me_chat_displayed.indexOf(me_chat_displayed[i]);
					me_chat_displayed.splice(index, 1);
				}
			}
		}
	});
}

// Change chatbox header
function meChat_Rename(id, name)
{
	var chatDOM = $('[data-me-chat-id="' + id + '"]');
	$(chatDOM).find('.me-chat-box-header').html(name);
}

// Close chatbox
function meChat_Close(chatID)
{

	// AJAX
	$.ajax(
	{
		url: me_chat_settings.path + 'php/templates/ajax.close.php',
		type: 'POST',
		data:
		{
			id: chatID
		},
		success: function(data) {

		}
	});

	var chatDOM = $('[data-me-chat-id="' + chatID + '"]');
	var chatProp = new Array();

	// Remove chatbox of chatboxes array
	for (var i = 0; i < me_chat.length; i++)
	{
		if (chatID == me_chat[i].id)
		{
			var index = me_chat.indexOf(me_chat[i]);
			chatProp = me_chat[i];
			me_chat.splice(index, 1);
		}
	}
	for (var i = 0; i < me_chat_displayed.length; i++)
	{
		if (chatID == me_chat_displayed[i].id)
		{
			var index = me_chat_displayed.indexOf(me_chat_displayed[i]);
			me_chat_displayed.splice(index, 1);
		}
	}

	// Call the event functions chat.close
	for (var i = 0; i < me_chat_event.length; i++)
	{
		if (me_chat_event[i].action.lastIndexOf('chat.close') > -1)
		{
			me_chat_event[i].function.apply(chatID, [chatID, $("[data-me-chat-id='" + chatID + "']"), chatProp]); // this: id, chatID: id, chatDOM: DOM element, chatProp: array of chatbox
		}
	}

	// Remove chatbox of body
	$(chatDOM).remove();

	// Organize chatboxes
	meChat_Order();
}

// Send message
function meChat_sendDOMMessage(id, message, oldmessages)
{
	// Oldmessages argument has not been set
	if (typeof oldmessages == 'undefined') oldmessages = false; // Append to bottom

	var chatDOM = $("[data-me-chat-id='" + id + "']");
	var chatDOM_content = $(chatDOM).find('.me-chat-box-body-content');

	// Add a message to the chatbox
	var returnDOM = false; // Message DOM element
	if (oldmessages == false) // Append to bottom
		returnDOM = $('<div class="me-chat-box-body-content-message"><div class="me-chat-box-message-sent" style="background-color: ' + me_chat_settings.box_color_sent_background + '; color: ' + me_chat_settings.box_color_sent_text + ';">' + meChat_html(message) + '</div></div>').appendTo(chatDOM_content);
	else // Append to top
		returnDOM = $('<div class="me-chat-box-body-content-message"><div class="me-chat-box-message-sent" style="background-color: ' + me_chat_settings.box_color_sent_background + '; color: ' + me_chat_settings.box_color_sent_text + ';">' + meChat_html(message) + '</div></div>').prependTo(chatDOM_content);

	// Message with image
	if ($(returnDOM).find('.me-chat-box-message-image').length == 1)
	{
		$(returnDOM).find('.me-chat-box-message-sent').addClass('me-chat-box-message-with-oneimage');
	}
	if ($(returnDOM).find('.me-chat-box-message-image').length > 1)
	{
		$(returnDOM).find('.me-chat-box-message-sent').addClass('me-chat-box-message-with-image');
	} 
    
	// Message with youtube video
	if ($(returnDOM).find('.me-chat-box-message-youtube').length == 1)
	{
		$(returnDOM).find('.me-chat-box-message-sent').addClass('me-chat-box-message-with-oneyoutube');
	}
	if ($(returnDOM).find('.me-chat-box-message-youtube').length > 1)
	{
		$(returnDOM).find('.me-chat-box-message-sent').addClass('me-chat-box-message-with-youtube');
	}     

	var chatProp = new Array(); // Store array of the chatbox
	for (var i = 0; i < me_chat.length; i++)
	{
		if (id == me_chat[i].id)
		{
			if (oldmessages == false) // Update only new messages
			{
				me_chat[i].lastupdate = meChat_timestamp(); // Last update, timestamp
				me_chat[i].lastmessage = meChat_html(message, false); // Save last message                
			}
			chatProp = me_chat[i]; // Save array of the chatbox
		}
	}

	// Call the event functions chat.sendmessage
	for (var i = 0; i < me_chat_event.length; i++)
	{
		if (me_chat_event[i].action.lastIndexOf('chat.sendmessage') > -1)
		{
			me_chat_event[i].function.apply(id, [id, $("[data-me-chat-id='" + id + "']"), chatProp]); // this: id, chatID: id, chatDOM: DOM element, chatProp: array of chatbox
		}
	}
	return returnDOM; // Return DOM element of the message   
}

// Receive message
function meChat_receiveDOMMessage(id, message, notifications, oldmessages)
{
	// Checks if the chat box is already open
	var chatFound = false;
	var chatProp = new Array(); // Store array of chatbox
	for (var i = 0; i < me_chat.length; i++)
	{
		if (id == me_chat[i].id)
		{
			chatFound = true;
			chatProp = me_chat[i]; // Save array of chatbox            
		}
	}
	if (chatFound == false)
	{
		meChat_Open(id, '{null}', '{null}');
	}

	var chatDOM = $("[data-me-chat-id='" + id + "']");
	var chatDOM_content = $(chatDOM).find('.me-chat-box-body-content');

	// Notifications argument has not been set
	if (typeof notifications == 'undefined') notifications = true;

	// Oldmessages argument has not been set
	if (typeof oldmessages == 'undefined') oldmessages = false;

	// Add a message to the chatbox
	var returnDOM = false; // Message DOM element
	if (oldmessages == false) // Append to bottom
		returnDOM = $('<div class="me-chat-box-body-content-message">' + (me_chat_settings.box_message_userpicture == true ? '<div class="me-chat-box-message-received-userpicture" style="background-image: url('+ meChat_getProp(id, 'picture') +')"></div>' : '') + '<div class="me-chat-box-message-received" style="background-color: ' + me_chat_settings.box_color_received_background + '; color: ' + me_chat_settings.box_color_received_text + ';">' + meChat_html(message) + '</div></div>').appendTo(chatDOM_content);
	else // Append to top
		returnDOM = $('<div class="me-chat-box-body-content-message">' + (me_chat_settings.box_message_userpicture == true ? '<div class="me-chat-box-message-received-userpicture" style="background-image: url('+ meChat_getProp(id, 'picture') +')"></div>' : '') + '<div class="me-chat-box-message-received" style="background-color: ' + me_chat_settings.box_color_received_background + '; color: ' + me_chat_settings.box_color_received_text + ';">' + meChat_html(message) + '</div></div>').prependTo(chatDOM_content);

	// Message with image
	if ($(returnDOM).find('.me-chat-box-message-image').length == 1)
	{
		$(returnDOM).find('.me-chat-box-message-received').addClass('me-chat-box-message-with-oneimage');
	}
	if ($(returnDOM).find('.me-chat-box-message-image').length > 1)
	{
		$(returnDOM).find('.me-chat-box-message-received').addClass('me-chat-box-message-with-image');
	}    
    
	// Message with youtube video
	if ($(returnDOM).find('.me-chat-box-message-youtube').length == 1)
	{
		$(returnDOM).find('.me-chat-box-message-received').addClass('me-chat-box-message-with-oneyoutube');
	}
	if ($(returnDOM).find('.me-chat-box-message-youtube').length > 1)
	{
		$(returnDOM).find('.me-chat-box-message-received').addClass('me-chat-box-message-with-youtube');
	}     

	if (notifications == true)
	{
		// Play incoming message sound
		if (me_chat_settings.box_alert_sound && !me_chat_usersettings.disable_sounds)
		{
			var audio = new Audio(me_chat_settings.path + 'assets/sounds/' + me_chat_settings.box_alert_sound_file);
			audio.play();
		}

		for (var i = 0; i < me_chat.length; i++)
		{
			if (id == me_chat[i].id)
			{
				me_chat[i].flash = true; // Enable flash
				me_chat[i].unread++; // Increase the number of unread messages
			}
		}
	}

	if (oldmessages == false) // Update only new messages
	{
		// Save last message
		meChat_setProp(id, 'lastmessage', meChat_html(message, false));
	}

	// Call the event functions chat.receivemessage
	for (var i = 0; i < me_chat_event.length; i++)
	{
		if (me_chat_event[i].action.lastIndexOf('chat.receivemessage') > -1)
		{
			me_chat_event[i].function.apply(id, [id, $("[data-me-chat-id='" + id + "']"), chatProp]); // this: id, chatID: id, chatDOM: DOM element, chatProp: array of chatbox
		}
	}
	return returnDOM;
}

// Send error message
function meChat_errorMessage(id, message)
{
	var chatDOM = $("[data-me-chat-id='" + id + "']");
	var chatDOM_content = $(chatDOM).find('.me-chat-box-body-content');

	// Add a message to the chatbox
	var returnDOM = false; // Message DOM element
	returnDOM = $('<div class="me-chat-box-body-content-message"><div class="me-chat-box-message-error" style="color: ' + me_chat_settings.box_color_sent_text + ';">' + meChat_html(message) + '</div></div>').appendTo(chatDOM_content);

	var chatProp = new Array(); // Store array of the chatbox
	for (var i = 0; i < me_chat.length; i++)
	{
		if (id == me_chat[i].id)
		{
			me_chat[i].lastupdate = meChat_timestamp(); // Last update, timestamp
			me_chat[i].lastmessage = meChat_html(message, false); // Save last message            
			chatProp = me_chat[i]; // Save array of the chatbox
		}
	}

	// Call the event functions chat.sendmessage
	for (var i = 0; i < me_chat_event.length; i++)
	{
		if (me_chat_event[i].action.lastIndexOf('chat.sendmessage') > -1)
		{
			me_chat_event[i].function.apply(id, [id, $("[data-me-chat-id='" + id + "']"), chatProp]); // this: id, chatID: id, chatDOM: DOM element, chatProp: array of chatbox
		}
	}
	return returnDOM; // Return DOM element of the message   
}

// Send success message
function meChat_successMessage(id, message)
{
	var chatDOM = $("[data-me-chat-id='" + id + "']");
	var chatDOM_content = $(chatDOM).find('.me-chat-box-body-content');

	// Add a message to the chatbox
	var returnDOM = false; // Message DOM element
	returnDOM = $('<div class="me-chat-box-body-content-message"><div class="me-chat-box-message-success" style="color: ' + me_chat_settings.box_color_sent_text + ';">' + meChat_html(message) + '</div></div>').appendTo(chatDOM_content);

	var chatProp = new Array(); // Store array of the chatbox
	for (var i = 0; i < me_chat.length; i++)
	{
		if (id == me_chat[i].id)
		{
			me_chat[i].lastupdate = meChat_timestamp(); // Last update, timestamp
			me_chat[i].lastmessage = meChat_html(message, false); // Save last message            
			chatProp = me_chat[i]; // Save array of the chatbox
		}
	}

	// Call the event functions chat.sendmessage
	for (var i = 0; i < me_chat_event.length; i++)
	{
		if (me_chat_event[i].action.lastIndexOf('chat.sendmessage') > -1)
		{
			me_chat_event[i].function.apply(id, [id, $("[data-me-chat-id='" + id + "']"), chatProp]); // this: id, chatID: id, chatDOM: DOM element, chatProp: array of chatbox
		}
	}
	return returnDOM; // Return DOM element of the message   
}

// Load old messages
function meChat_loadOldMessages(id)
{
	var chatDOM = $("[data-me-chat-id='" + id + "']");
	var chatDOM_content = $(chatDOM).find('.me-chat-box-body-content');

	if (meChat_getProp(id, 'loadingoldmessages') == false)
	{
		$(chatDOM_content).find('.me-chat-box-message-load').parent().prependTo(chatDOM_content).hide(); // Hide button to load old messages, up until receive the answer

		meChat_setProp(id, 'loadingoldmessages', true); // Block loading of old messages, up until receive the answer
		meChat_alertMessage(id, me_chat_strings.box_alert_loadingoldmessages, 1500);

		// AJAX
		$.ajax(
		{
			url: me_chat_settings.path + 'php/templates/ajax.receiveoldmessage.php',
			type: 'POST',
			data:
			{
				id: id,
				starting: meChat_getProp(id, 'firstmessageid')
			},
			error: function() {},
			success: function(data)
			{
				data = JSON.parse(data);

				// Latest messages
				if (typeof data.messages != 'undefined')
				{
					var returnDOM = false; // Message DOM element
                    
					$.each(data.messages, function(key, value)
					{              
                        // Separate messages
                        if(key < data.messages.length-1)
                        {
                            if (Math.ceil(value.message.date_timestamp / 60) != Math.ceil(data.messages[key+1].message.date_timestamp / 60))
                            {
                                /*var lastmessage_ajax = meChat_getProp(data.id, 'lastmessage_ajax');
                                var difference = (lastmessage_ajax.date_timestamp - value.message.date_timestamp);
                                
                                if(me_chat_settings.box_message_timeseparator) meChat_timeSeparator(data.id, value.message.date_timestamp, true, difference);*/
                                
                                var difference = Math.round(value.message.date_timestamp / 60 / 60 / 24) - Math.round(data.messages[key+1].message.date_timestamp / 60 / 60 / 24); // Days

                                if(me_chat_settings.box_message_timeseparator) meChat_timeSeparator(data.id, value.message.date_timestamp, true, difference * (24 * 3600));
                            }
                        }
                        
                        // First message received
						if (key == data.messages.length - 1)
						{
							meChat_setProp(data.id, 'firstmessageid', value.message.id);
                            meChat_setProp(data.id, 'firstmessage_ajax', value.message);
						}
                        
                        // First message added
						if (key == 0)
						{
							if (value.from == data.id) // Received messages
                            {
								returnDOM = meChat_receiveDOMMessage(data.id, value.message.message, false, true);
                                
                                // Received message date 
                                if(me_chat_settings.box_message_popoverdate) $(returnDOM).append('<div class="me-chat-box-message-popover"><div class="me-chat-box-message-popover-caretright"></div><div class="me-chat-box-message-popover-content">'+ meChat_date(me_chat_strings.box_message_popoverdate, value.message.date_timestamp) +'</div></div>');  
                                
                                if(me_chat_settings.box_message_date) $(returnDOM).prepend('<div class="me-chat-box-message-received-date">'+ meChat_date(me_chat_strings.box_message_date, value.message.date_timestamp) +'</div>');   
                            }
							else // Messages sent
                            {
								returnDOM = meChat_sendDOMMessage(data.id, value.message.message, true);
                                
                                // Sent message date 
                                if(me_chat_settings.box_message_popoverdate) $(returnDOM).append('<div class="me-chat-box-message-popover"><div class="me-chat-box-message-popover-caretleft"></div><div class="me-chat-box-message-popover-content">'+ meChat_date(me_chat_strings.box_message_popoverdate, value.message.date_timestamp) +'</div></div>');   
                                
                                if(me_chat_settings.box_message_date) $(returnDOM).prepend('<div class="me-chat-box-message-sent-date">'+ meChat_date(me_chat_strings.box_message_date, value.message.date_timestamp) +'</div>');  
                                
                                // Seen date
                                if(value.message.read_timestamp != -1)
                                {
                                    if(me_chat_settings.box_message_seen) $(returnDOM).append('<div class="me-chat-box-message-sent-seen">'+ meChat_date(me_chat_strings.box_message_seen, value.message.read_timestamp) +'</div>');    
                                }
                                else
                                {
                                    if(me_chat_settings.box_message_seen) $(returnDOM).append('<div class="me-chat-box-message-sent-seen"></div>');     
                                }
                            }
                        }
						else
						{
                            var messageDOM = false;
							if (value.from == data.id) // Received messages
                            {
								messageDOM = meChat_receiveDOMMessage(data.id, value.message.message, false, true);
                                
                                // Received message date 
                                if(me_chat_settings.box_message_popoverdate) $(messageDOM).append('<div class="me-chat-box-message-popover"><div class="me-chat-box-message-popover-caretright"></div><div class="me-chat-box-message-popover-content">'+ meChat_date(me_chat_strings.box_message_popoverdate, value.message.date_timestamp) +'</div></div>');     
                                
                                if(me_chat_settings.box_message_date) $(messageDOM).prepend('<div class="me-chat-box-message-received-date">'+ meChat_date(me_chat_strings.box_message_date, value.message.date_timestamp) +'</div>');   
                            }
                            else // Messages sent
                            {
                                messageDOM = meChat_sendDOMMessage(data.id, value.message.message, true);
                                
                                // Sent message date 
                                if(me_chat_settings.box_message_popoverdate) $(messageDOM).append('<div class="me-chat-box-message-popover"><div class="me-chat-box-message-popover-caretleft"></div><div class="me-chat-box-message-popover-content">'+ meChat_date(me_chat_strings.box_message_popoverdate, value.message.date_timestamp) +'</div></div>');   
                                
                                if(me_chat_settings.box_message_date) $(messageDOM).prepend('<div class="me-chat-box-message-sent-date">'+ meChat_date(me_chat_strings.box_message_date, value.message.date_timestamp) +'</div>');   
                                
                                // Seen date
                                if(value.message.read_timestamp != -1)
                                {
                                    if(me_chat_settings.box_message_seen) $(messageDOM).append('<div class="me-chat-box-message-sent-seen">'+ meChat_date(me_chat_strings.box_message_seen, value.message.read_timestamp) +'</div>');  
                                }
                                else
                                {
                                    if(me_chat_settings.box_message_seen) $(messageDOM).append('<div class="me-chat-box-message-sent-seen"></div>');     
                                }                                
                            }
						}
					});

					// Scroll to the first message added
					try
					{
						meChat_scrollTo(id, $(returnDOM).offset().top - $(chatDOM_content).offset().top + $(chatDOM_content).scrollTop());
					}
					catch (error)
					{
						console.log(error);
					}

					// Allow loading of old messages, it may have older messages
					meChat_setProp(id, 'loadingoldmessages', false);

					// Button to load old messages, it may have older messages
					$(chatDOM_content).find('.me-chat-box-message-load').parent().prependTo(chatDOM_content).show();
				}
			}
		});
	}
}

// Show alert message in the chatbox
function meChat_alertMessage(id, message, time)
{
	var chatDOM = $("[data-me-chat-id='" + id + "']");
	$(chatDOM).find('.me-chat-box-body-alert').text(message);
	$(chatDOM).find('.me-chat-box-body-alert').show();
	$(chatDOM).find('.me-chat-box-body-alert').fadeOut(time);
}

// Scroll to the bottom
function meChat_scrollToBottom(chatID)
{
	var chatDOM = $("[data-me-chat-id='" + chatID + "']");
	var chatDOM_content = $(chatDOM).find('.me-chat-box-body-content');
	var height = chatDOM_content[0].scrollHeight;
	chatDOM_content.scrollTop(height);
}

// Scroll in the chat box
function meChat_scrollTo(chatID, height)
{
	var chatDOM = $("[data-me-chat-id='" + chatID + "']");
	var chatDOM_content = $(chatDOM).find('.me-chat-box-body-content');
	chatDOM_content.scrollTop(height);
}

// Change name of chatboxes menu
function meChatMenu_Title(title)
{
	$('.me-chat-box-menu .me-chat-box-header-name').html(title);
}

// Organize open chatboxes
function meChat_Order()
{
	var meChat_orderred = 0;
	var me_chat_right = 0;
	for (var i = 0; i < meChat_recentlyOpenedASC().length; i++)
	{
		if (!meChat_recentlyOpenedASC()[i].displayed)
		{
			me_chat_right = (((me_chat_settings.box_spacebetween + me_chat_settings.box_width) * meChat_orderred) + me_chat_settings.box_betweencorner);

			$("[data-me-chat-id='" + meChat_recentlyOpenedASC()[i].id + "']").css('right', me_chat_right + 'px');

			meChat_orderred++;
		}
	}
}

// Add event to chatbox
function meChat_Event(event_, function_)
{
	var me_chat_obj = {};
	me_chat_obj.action = event_;
	me_chat_obj.function = function_;
	me_chat_event.push(me_chat_obj);
}

// Get or set value to chatbox
function meChat_setProp(chatID, property, value)
{
	for (var i = 0; i < me_chat.length; i++)
	{
		if (chatID == me_chat[i].id)
		{
			me_chat[i][property] = value;
			return true; // Returns true if found and changed
		}
	}
	return false; // Returns false if not found
}

function meChat_getProp(chatID, property)
{
	for (var i = 0; i < me_chat.length; i++)
	{
		if (chatID == me_chat[i].id)
		{
			return me_chat[i][property]; // Returns the value of the property
		}
	}
	return false; // Returns false if not found
}

// Get or set value for cookies of the meChat
function meChatCookie_setProp(key, value)
{
	me_chat_usersettings[key] = value;

	var d = new Date();
	d.setTime(d.getTime() + (me_chat_settings.cookies_expires * 24 * 60 * 60 * 1000));
	var expires = "expires=" + d.toUTCString();
	document.cookie = me_chat_settings.cookies_name + "=" + JSON.stringify(me_chat_usersettings) + "; " + expires;
}

function meChatCookie_getProp(key)
{
	return me_chat_usersettings[key];
}

function meChatCookie_Load()
{
	var me_chat_cookie_name = me_chat_settings.cookies_name + "=";
	var me_chat_cookies = document.cookie.split(';');
	for (var i = 0; i < me_chat_cookies.length; i++)
	{
		var me_chat_cookie = me_chat_cookies[i];
		while (me_chat_cookie.charAt(0) == ' ') me_chat_cookie = me_chat_cookie.substring(1);
		if (me_chat_cookie.indexOf(me_chat_cookie_name) == 0)
		{
			var cookie_JSON = JSON.parse(me_chat_cookie.substring(me_chat_cookie_name.length, me_chat_cookie.length));
			for (var key in cookie_JSON)
			{
				if (cookie_JSON.hasOwnProperty(key))
				{
					meChatCookie_setProp(key, cookie_JSON[key]);
				}
			}
		}
	}
}

// Get amount of unread messages
function meChat_unreadCount()
{
	var me_chat_unread = 0;
	for (var i = 0; i < me_chat.length; i++)
	{
		me_chat_unread += me_chat[i].unread;
	}
	return me_chat_unread;
}

// Get amount of open chatboxes
function meChat_openedCount()
{
	return (me_chat.length - 1);
}

// Give life to meChat
$(document).ready(function()
{
    // Load cookies of meChat
    meChatCookie_Load();
    
    // Get open chatboxes    
	$.ajax(
	{
		url: me_chat_settings.path + 'php/templates/ajax.opened.php',
		type: 'POST',
		error: function() {},
		success: function(data)
		{
			data = JSON.parse(data);
			$.each(data, function(key, value)
			{
				meChat_Open(value);
			});
		}
	});
});

// Timer for updates of the chatboxes
setInterval(function()
{
	// If receive a message and the chatbox is closed
	$.ajax(
	{
		url: me_chat_settings.path + 'php/templates/ajax.recentlymessages.php',
		type: 'POST',
		error: function() {},
		success: function(data)
		{
			data = JSON.parse(data);

			$.each(data, function(key, value)
			{
				chatFound = false;

				for (var i = 0; i < me_chat.length; i++)
				{
					if (value.from_user_id == me_chat[i].id)
					{
						chatFound = true;
					}
				}
				if (chatFound == false)
				{
					meChat_Open(value.from_user_id);
				}
			});
		}
	});

	// Update of opened chatboxes
	var chatID = -1;
	for (var i = 0; i < me_chat.length; i++)
	{
        if(me_chat[i].name == "menu") continue; // Stop if is the menu
		chatID = me_chat[i].id;

		$.ajax(
		{
			url: me_chat_settings.path + 'php/templates/ajax.receivemessage.php',
			type: 'POST',
			data:
			{
				id: me_chat[i].id,
				starting: me_chat[i].lastmessageid
			},
			error: function() {},
			success: function(data)
			{
				data = JSON.parse(data);
                                
				// Lastest messages
				if (typeof data.user_messages.messages != 'undefined')
				{
					$.each(data.user_messages.messages, function(key, value)
				    {                        
                        // Received message
						if (value.from == data.user_messages.id)
						{
                            // Separate messages
                            var lastmessage_ajax = meChat_getProp(data.user_messages.id, 'lastmessage_ajax');
                            if (Math.ceil(value.message.date_timestamp / 60) != Math.ceil(lastmessage_ajax.date_timestamp / 60))
                            {                            
                                if(me_chat_settings.box_message_timeseparator) meChat_timeSeparator(data.user_messages.id, value.message.date_timestamp, false, Math.ceil(value.message.date_timestamp / 60) - Math.ceil(lastmessage_ajax.date_timestamp / 60));
                            }      
                            
							var returnDOM = meChat_receiveDOMMessage(data.user_messages.id, value.message.message);
                            
                            // Received message date 
                            if(me_chat_settings.box_message_popoverdate) $(returnDOM).append('<div class="me-chat-box-message-popover"><div class="me-chat-box-message-popover-caretright"></div><div class="me-chat-box-message-popover-content">'+ meChat_date(me_chat_strings.box_message_popoverdate, value.message.date_timestamp) +'</div></div>');
                            
                            if(me_chat_settings.box_message_date) $(returnDOM).prepend('<div class="me-chat-box-message-received-date">'+ meChat_date(me_chat_strings.box_message_date, value.message.date_timestamp) +'</div>');   
						}
						else //Message sent
						{
							// Check duplicate message
							var duplicatemessage = false;
							var lastmessagessent = meChat_getProp(data.user_messages.id, 'lastmessagessent');
                
							for (var i = 0; i < lastmessagessent.length; i++)
							{
								if ((lastmessagessent[i] == value.message.message) || (value.message.message.length > 255 && lastmessagessent[i].indexOf(value.message.message) > -1)) // (Duplicate message) OR (If message has 256 characters & If part of it was found)
								{                                    
									duplicatemessage = true;
									lastmessagessent.splice(i, 1);
                                    
									break;
								}
							}
							meChat_setProp(data.user_messages.id, 'lastmessagessent', lastmessagessent);

							if (duplicatemessage == false) // Message not duplicated
							{
								meChat_sendDOMMessage(data.user_messages.id, value.message.message);
								meChat_scrollToBottom(data.user_messages.id);
                                
                                // Sent message date 
                                if(me_chat_settings.box_message_popoverdate) $(returnDOM).append('<div class="me-chat-box-message-popover"><div class="me-chat-box-message-popover-caretleft"></div><div class="me-chat-box-message-popover-content">'+ meChat_date(me_chat_strings.box_message_popoverdate, value.message.date_timestamp) +'</div></div>');     
                                if(me_chat_settings.box_message_date) $(returnDOM).prepend('<div class="me-chat-box-message-sent-date">'+ meChat_date(me_chat_strings.box_message_date, value.message.date_timestamp) +'</div>');   
							}
						}
                        
                        // Save last message
                        meChat_setProp(data.user_messages.id, 'lastmessage_ajax', value.message);
                        meChat_setProp(data.user_messages.id, 'lastmessageid', value.message.id);                          
					});

					// Incoming message alert if the scroll is not the bottom
					if (!(data.user_messages.messages.length == 1 && data.user_messages.messages[0].from != data.user_messages.id) && me_chat_settings.box_alert_messagereceived)
					{ // Check that was not the user that send the message

						var chatDOM = $("[data-me-chat-id='" + data.user_messages.id + "']");
						var chatDOM_content = $(chatDOM).find('.me-chat-box-body-content');
						var height = chatDOM_content[0].scrollHeight;
						var height_scrollTop = chatDOM_content[0].scrollTop;
						if (height_scrollTop < (height / 100 * 60)) // Show alert message when the scroll is above 30% of the chatbox
						{
							meChat_alertMessage(data.user_messages.id, me_chat_strings.box_alert_received, 1500);
						}
						else
						{
							// Scroll down if you are below 30% of the chatbox
							meChat_scrollToBottom(data.user_messages.id);
						}
					}
				}

				// Update status (available and away)
				var me_chat_lastupdate = (meChat_timestamp() - data.user_messages.lastupdate); // Get the latest update in seconds

				if (me_chat_lastupdate < (2 * 60)) // Case be less than 2 minutes
				{
					meChat_Rename(data.user_messages.id, '<div class="me-chat-box-header-status online">&#9679;</div><div class="me-chat-box-header-name">' + data.user_messages.name + '</div><div class="me-chat-box-header-close">&times;</div>');
				}

				if (me_chat_lastupdate > (2 * 60)) // Case be more than 2 minutes
				{
					meChat_Rename(data.user_messages.id, '<div class="me-chat-box-header-status offline">&#9679;</div><div class="me-chat-box-header-name">' + data.user_messages.name + '</div><div class="me-chat-box-header-close">&times;</div>');
				}
                
                // Last message
                if(data.lastmessage.length != 0)
                {
                    var lastmessage_ajax = meChat_getProp(data.user_messages.id, 'lastmessage_ajax');

                    if (lastmessage_ajax.message == data.lastmessage.message) // It is the last message
                    {                           
                        if(data.user_messages.id != data.lastmessage.from_user_id) // Sent Message
                        {        
                            if(data.lastmessage.read_timestamp != -1) // Was seen
                            {
                                var chatDOM = $("[data-me-chat-id='" + data.user_messages.id + "']");

                                $(chatDOM).find('.me-chat-box-message-sent-seen').html(meChat_date(me_chat_strings.box_message_seen, data.lastmessage.read_timestamp));
                                $(chatDOM).find('.me-chat-box-message-sent-seen').last().html(meChat_date(me_chat_strings.box_lastmessage_seen, data.lastmessage.read_timestamp));
                            }
                        }
                    }        
                }
			}
		});
	}
}, me_chat_settings.box_update_timer);

// Enable incoming message flash
if (me_chat_settings.box_alert_header_flash)
{
	setInterval(function()
	{

		if (!me_chat_usersettings.disable_notifications)
		{
			for (var i = 0; i < me_chat.length; i++)
			{
				if (me_chat[i].flash)
				{
					var chatDOM = $("[data-me-chat-id='" + me_chat[i].id + "']");
					$(chatDOM).find('.me-chat-box-header').css('background-color', me_chat_settings.box_alert_header_flash_color);
				}
			}

			setTimeout(function()
			{
				for (var i = 0; i < me_chat.length; i++)
				{
					if (me_chat[i].flash)
					{
						var chatDOM = $("[data-me-chat-id='" + me_chat[i].id + "']");
						$(chatDOM).find('.me-chat-box-header').css('background-color', me_chat_settings.box_color);
					}
				}
			}, 1000);
		}

	}, 2000);
}

// Sent & seen date of the message (event: tap)
var messageTap = 0;
$(document).on('touchstart', '.me-chat-box-message-sent, .me-chat-box-message-received', function()
{
    messageTap = new Date().getTime();
});
$(document).on('touchend', '.me-chat-box-message-sent, .me-chat-box-message-received', function()
{
    if((new Date().getTime() - messageTap) > 150) return ;

    var messageDOM_date = $(this).closest('.me-chat-box-body-content-message').find('.me-chat-box-message-received-date, .me-chat-box-message-sent-date, .me-chat-box-message-sent-seen');
        
    $(messageDOM_date).not($('.me-chat-box-message-received-date.expand, .me-chat-box-message-sent-date.expand, .me-chat-box-message-sent-seen.expand').removeClass('expand')).toggleClass('expand');
});

// Popover sent & received date (event: mouseenter, mouseleave)
var popover_Temp = false; // Save popover temporarily
$(document).on('mouseenter', '.me-chat-box-message-sent, .me-chat-box-message-received', function(event)
{
    var messageDOM_popover = $(this).parent().find('.me-chat-box-message-popover');
    
    // Stop if the message has height greater than 80px
    if(parseInt($(this).css('height')) > 80) return ;
    
    // Get the position of the element on the screen
    var messageDOM_position = $(this).offset();
    messageDOM_position.y = messageDOM_position.top - $(window).scrollTop();
    messageDOM_position.x = messageDOM_position.left - $(window).scrollLeft(); 
    
    // Get half Y of the element
    messageDOM_position.y += (parseFloat($(this).css('height')) / 2) - (parseFloat($(messageDOM_popover).css('height')) / 2);
    
    if(event.target.className == 'me-chat-box-message-sent')
    {
        // Get caret width
        var messageDOM_popover_caret = parseFloat($(messageDOM_popover).find('.me-chat-box-message-popover-caretleft, .me-chat-box-message-popover-caretright').css('border-left-width'));
        messageDOM_popover_caret += parseFloat($(messageDOM_popover).find('.me-chat-box-message-popover-caretleft, .me-chat-box-message-popover-caretright').css('border-right-width'));
        
        // Get end X of the element
        messageDOM_position.x += parseFloat($(this).css('width')) + (messageDOM_popover_caret * 2.2);
        
        $(messageDOM_popover).css('left', messageDOM_position.x + 'px'); // Set X position
        $(messageDOM_popover).css('top', messageDOM_position.y + 'px'); // Set Y position
    }
    else
    {
        // Get caret width
        var messageDOM_popover_caret = parseFloat($(messageDOM_popover).find('.me-chat-box-message-popover-caretleft, .me-chat-box-message-popover-caretright').css('border-left-width'));
        messageDOM_popover_caret += parseFloat($(messageDOM_popover).find('.me-chat-box-message-popover-caretleft, .me-chat-box-message-popover-caretright').css('border-right-width'));
        
        messageDOM_position.x = ($(window).width() - messageDOM_position.x) + (messageDOM_popover_caret * 2.2);
        
        $(messageDOM_popover).css('right', messageDOM_position.x + 'px'); // Set X position
        $(messageDOM_popover).css('top', messageDOM_position.y + 'px'); // Set Y position
    }
    
    popover_Temp = $(messageDOM_popover).clone().appendTo('body');
    $(popover_Temp).show(); // Show Popover
});
$(document).on('mouseleave', '.me-chat-box-message-sent, .me-chat-box-message-received', function(event)
{
    $(popover_Temp).remove(); // Remove Popover
});

// Popup photo
$(document).on('click', '.me-chat-box-message-image', function(event)
{
	if ($('.me-chat-popup').length) // Check if any popup was already open
		$('.me-chat-popup').remove();

	// Show popup
	$('body').append('<div class="me-chat-popup"><img src="' + $(this).data('me-chat-href') + '"><div class="me-chat-popup-close">×</div></div>');
});

// Close popup
$(document).on('click', '.me-chat-popup-close', function(event)
{

	$('.me-chat-popup').remove();
});
$(document).on('click', '.me-chat-popup', function(event)
{

	if ($(event.target).is('.me-chat-popup')) $('.me-chat-popup').remove();
});

// Open input file to send image
$(document).on('click', '.me-chat-box-imageupload', function(event)
{
	$(this).find('[type="file"]')[0].click();

	// Hide emojis menu
	var chatDOM = $(this).closest('.me-chat-box');
	$(chatDOM).find('.me-chat-box-body-content').show();
	$(chatDOM).find('.me-chat-box-body-emoji').hide();

	event.stopPropagation();
});

// Send imagem by ajax
$(document).on('change', '.me-chat-box-imageupload [type="file"]', function(event)
{
	var chatDOM = $(this).closest('.me-chat-box');
	var chatID = $(chatDOM).data('me-chat-id');

	if ((this.files[0].size / 1048576) > me_chat_settings.box_allow_imageupload_maxsize && me_chat_settings.box_allow_imageupload_maxsize != 0)
	{
		meChat_errorMessage(chatID, me_chat_strings.box_error_imageupload_maxsize);

		meChat_scrollToBottom(chatID); // Scroll to the bottom
	}
	else
	{
		// Show image loading
		var returnDOM = false;
		meChat_toDataUrl((this.files[0]), function(Base64)
		{
			returnDOM = meChat_sendDOMMessage(chatID, '[IMG]' + Base64 + '[/IMG]');

			$(returnDOM).find('.me-chat-box-message-image').append('<div class="me-chat-box-message-image-loading" style="background-image:url(' + me_chat_settings.path + 'assets/icons/imageloading.gif);"></div>');
		});

		var data = new FormData();
		data.append('to', chatID);
		data.append('file', this.files[0]);

		$.ajax(
		{
			type: 'POST',
			processData: false, // Important
			contentType: false, // Important
			data: data,
			url: me_chat_settings.path + 'php/templates/ajax.sendimage.php',
			success: function(data)
			{
				data = JSON.parse(data);

				if (data.success)
				{
					$(returnDOM).replaceWith(meChat_successMessage(chatID, data.message)); // Success
				}
				else // Failure
				{
					$(returnDOM).replaceWith(meChat_errorMessage(chatID, data.message)); // Replace the sent image
				}

				meChat_scrollToBottom(chatID); // Scroll to the bottom
			}
		});
	}
});

// Function to convert images to Base64
function meChat_toDataUrl(file, callback)
{
	if (typeof file != 'undefined')
	{
		var fileReader = new FileReader();

		fileReader.onload = function(event)
		{
			callback(event.target.result);
		};
		fileReader.readAsDataURL(file);
	}
}

// Show and hide emojis menu
$(document).on("click", ".me-chat-box-body-emoji-button", function(event)
{
	var chatDOM = $(this).closest('.me-chat-box');
	$(chatDOM).find('.me-chat-box-body-content').toggle();
	$(chatDOM).find('.me-chat-box-body-emoji').toggle();
	$(chatDOM).find('.me-chat-box-body-submit textarea').blur();
    $(chatDOM).find('.me-chat-box-body-submit .me-chat-box-body-submit-contenteditable').blur();
	event.stopPropagation();
});

// Add emojis to chatbox
$(document).on("click", ".me-chat-box-body-emoji td", function(event)
{
	var chatDOM = $(this).closest('.me-chat-box');
	var chatID = $(chatDOM).data('me-chat-id');

	var emojiRow = $(this).parent().index();
	var emojiColumn = $(this).index();
    
	var chatText = '';
    if(me_chat_contenteditable == true)
    {
        chatText = $(chatDOM).find('.me-chat-box-body-submit .me-chat-box-body-submit-contenteditable').html();
        
        $(chatDOM).find('.me-chat-box-body-submit .me-chat-box-body-submit-contenteditable').html(chatText + '<img data-mechat-emoji="'+ emojisArray[emojiRow][emojiColumn] +'" src="//twemoji.maxcdn.com/2/72x72/'+ twemoji_toCodePoint(emojisArray[emojiRow][emojiColumn]) +'.png">');

        $(chatDOM).find('.me-chat-box-body-submit .me-chat-box-body-submit-contenteditable-placeholder').hide();
    }
    else
    {
        chatText = $(chatDOM).find('.me-chat-box-body-submit textarea').val();    
        
        $(chatDOM).find('.me-chat-box-body-submit textarea').val(chatText + emojisArray[emojiRow][emojiColumn]);
    }

	// Textarea scroll down
	var chatDOM_text = $(chatDOM).find('.me-chat-box-body-submit textarea, .me-chat-box-body-submit .me-chat-box-body-submit-contenteditable');
	var height = chatDOM_text[0].scrollHeight;
	chatDOM_text.scrollTop(height);

	event.stopPropagation();

});

// Hide emojis by clicking in the textarea/contenteditable of chatbox
$(document).on("click focus", ".me-chat-box-body-submit textarea, .me-chat-box-body-submit .me-chat-box-body-submit-contenteditable", function()
{
	var chatDOM = $(this).closest('.me-chat-box');
	$(chatDOM).find('.me-chat-box-body-content').show();
	$(chatDOM).find('.me-chat-box-body-emoji').hide();
});

// Detect click inside body of the chatbox
$(document).on("click touchstart", ".me-chat-box-body-content, .me-chat-box-body-submit textarea, .me-chat-box-body-submit .me-chat-box-body-submit-contenteditable", function(event)
{
	// Stop the flash of the chatbox   
	var chatDOM = $(this).closest('.me-chat-box');
	var chatID = $(chatDOM).data('me-chat-id');
	var chatProp = new Array(); // Store array of the chatbox
	for (var i = 0; i < me_chat.length; i++)
	{
		if (chatID == me_chat[i].id)
		{
            if(me_chat[i].flash == true)
            {
                // AJAX
                $.ajax(
                {
                    url: me_chat_settings.path + 'php/templates/ajax.markread.php',
                    type: 'POST',
                    data:
                    {
                        id: chatID
                    },
                    error: function() {},
                    success: function(data) {}
                });      
            }
            
			me_chat[i].flash = false;
			me_chat[i].unread = 0;
			$(chatDOM).find('.me-chat-box-header').css('background-color', me_chat_settings.box_color);
			chatProp = me_chat[i]; // Save array of the chatbox
		}
	}

	// Force use of the scroll (iOS)
	$(chatDOM).find('.me-chat-box-body-content').focusin();

	// Call the event functions chat.body.click
	for (var i = 0; i < me_chat_event.length; i++)
	{
		if (me_chat_event[i].action.lastIndexOf('chat.body.click') > -1)
		{
			me_chat_event[i].function.apply(chatID, [chatID, chatDOM, chatProp]); // this: id, chatID: id, chatDOM: DOM element, chatProp: array of chatbox 
		}
	}
});

// Detect final click inside body of the chatbox
$(document).on("mouseup touchend", ".me-chat-box-body-content, .me-chat-box-body-submit textarea, .me-chat-box-body-submit .me-chat-box-body-submit-contenteditable", function(event)
{
	// Selected text
	var selectedtext = "";
	if (window.getSelection)
	{
		selectedtext = window.getSelection().toString();
	}
	else if (document.selection && document.selection.type != "Control")
	{
		selectedtext = document.selection.createRange().text;
	}

	if (selectedtext.length == 0 && window.innerWidth > 590 && !$(event.target).is('.me-chat-box-message-image')) // No text was selected & Larger screen than 590px & Not clicked on an uploaded image
	{
		$(this).closest('.me-chat-box').find('.me-chat-box-body-submit textarea, .me-chat-box-body-submit .me-chat-box-body-submit-contenteditable').focus(); // Focus on textarea of the chatbox
	}
});

// Detect click and focus on textarea of the chatbox - Deprecated since version 1.1
/*
$(document).on("click focus", ".me-chat-box-body-submit textarea", function(event) {

    // Textarea scroll down
    var chatDOM = $(this).closest('.me-chat-box');
    var chatDOM_content = $(chatDOM).find('.me-chat-box-body-content');
    var height = chatDOM_content[0].scrollHeight;
    chatDOM_content.scrollTop(height);
});
*/

// Detect paste on contenteditable of the chatbox
$(document).on("paste", ".me-chat-box-body-submit .me-chat-box-body-submit-contenteditable", function(event) {
	var message = $(event.currentTarget);

    setTimeout(function() {
         message.html(meChat_html($(message)[0].innerText, -1));
    }, 5);
});

// Detect keypress, input and paste on contenteditable of the chatbox
$(document).on("keypress input paste", ".me-chat-box-body-submit .me-chat-box-body-submit-contenteditable", function(event)
{
    // Prevent <div> on key enter
    if(event.which == 13 || event.keyCode == 13)
    {
        return false;
    }

    // Elastic contenteditable
    var chatDOM = $(this).closest('.me-chat-box');  
    var chatDOM_header = $(chatDOM).find('.me-chat-box-header');      
    var chatDOM_bodyContent = $(chatDOM).find('.me-chat-box-body-content');      
    var chatDOM_bodySubmit = $(chatDOM).find('.me-chat-box-body-submit');         
    var chatDOM_contentEditable = $(this).closest('.me-chat-box-body-submit-contenteditable');   
    
    if(me_chat_settings.box_contenteditable_elastic && $(chatDOM_contentEditable).hasClass('elastic'))
    {
        $(chatDOM_bodyContent).attr('style', 'height: calc(100% - '+ ($(chatDOM_header).height() + $(chatDOM_bodySubmit).height()) +'px);');
    }
});

$(document).on("keyup", ".me-chat-box-body-submit textarea, .me-chat-box-body-submit .me-chat-box-body-submit-contenteditable", function(event)
{
    // Get the text from textarea/contenteditable
    var message = '';
    if(me_chat_contenteditable == true)
    {        
        message = $(this).parent().find('.me-chat-box-body-submit-contenteditable').clone();
        
        // Transform emoji images to characters
        $(message).find('[data-mechat-emoji]').replaceWith(function() {
            return $(this).data('mechat-emoji');
        });
        
        message = $(message)[0].innerText;
    }
    else
    {
        message = $(this).parent().find('textarea').val();
    }
        
	if (event.keyCode == 13 && message.trim().length != 0)
	{
        var chatDOM = $(this).closest('.me-chat-box');
		var chatID = $(chatDOM).data('me-chat-id');
        
        // Separate messages
        var lastmessage_ajax = meChat_getProp(chatID, 'lastmessage_ajax');
        if (Math.ceil(meChat_timestamp() / 60) != Math.ceil(lastmessage_ajax.date_timestamp / 60))
        {                            
            if(me_chat_settings.box_message_timeseparator) meChat_timeSeparator(chatID, meChat_timestamp(), false, Math.ceil(meChat_timestamp() / 60) - Math.ceil(lastmessage_ajax.date_timestamp / 60));
        }    

		var returnDOM = meChat_sendDOMMessage(chatID, message); // Send DOM Message

		// Save last messages
		var lastmessagessent = meChat_getProp(chatID, 'lastmessagessent');
		lastmessagessent.push(message);
		meChat_setProp(chatID, 'lastmessagessent', lastmessagessent);
        
        // Sent message date 
        if(me_chat_settings.box_message_popoverdate) $(returnDOM).append('<div class="me-chat-box-message-popover"><div class="me-chat-box-message-popover-caretleft"></div><div class="me-chat-box-message-popover-content">'+ meChat_date(me_chat_strings.box_message_popoverdate, meChat_timestamp()) +'</div></div>');   

        if(me_chat_settings.box_message_date) $(returnDOM).prepend('<div class="me-chat-box-message-sent-date">'+ meChat_date(me_chat_strings.box_message_date, meChat_timestamp()) +'</div>');   
        
        // Seen date
        if(me_chat_settings.box_message_seen) $(returnDOM).append('<div class="me-chat-box-message-sent-seen"></div>');
        
		// AJAX
		$.ajax(
		{
			url: me_chat_settings.path + 'php/templates/ajax.sendmessage.php',
			type: 'POST',
			data:
			{
				to: chatID,
				message: message
			},
			error: function()
			{
				$(returnDOM).replaceWith(meChat_errorMessage(chatID, me_chat_strings.box_error_sendmessage)); // Replace the sent message
				meChat_scrollToBottom(chatID); // Scroll to the bottom
			},
			success: function(data)
			{
				meChat_scrollToBottom(chatID); // Scroll to the bottom
			}
		});
        
        // Clean textarea/contenteditable
        if(me_chat_contenteditable == true)
        {
            $(this).parent().find('.me-chat-box-body-submit-contenteditable').html('');
        }
        else
        {
            $(this).parent().find('textarea').val('');
        }
        
        // Elastic contenteditable
        var chatDOM = $(this).closest('.me-chat-box');  
        var chatDOM_header = $(chatDOM).find('.me-chat-box-header');      
        var chatDOM_bodyContent = $(chatDOM).find('.me-chat-box-body-content');      
        var chatDOM_bodySubmit = $(chatDOM).find('.me-chat-box-body-submit');         
        var chatDOM_contentEditable = $(this).closest('.me-chat-box-body-submit-contenteditable');   

        if(me_chat_settings.box_contenteditable_elastic && $(chatDOM_contentEditable).hasClass('elastic'))
        {
            $(chatDOM_bodyContent).attr('style', 'height: calc(100% - '+ ($(chatDOM_header).height() + $(chatDOM_bodySubmit).height()) +'px);');
        }        
	}
});

// Hide placeholder of the attr contenteditable
$(document).on("keyup keydown focusout", ".me-chat-box-body-submit .me-chat-box-body-submit-contenteditable", function(event)
{
	if ($(this).html().trim().length != 0)
	{
        $(this).parent().find('.me-chat-box-body-submit-contenteditable-placeholder').hide();
    }
    else
    {
        $(this).parent().find('.me-chat-box-body-submit-contenteditable-placeholder').show();        
    }
});
$(document).on("focusin", ".me-chat-box-body-submit .me-chat-box-body-submit-contenteditable", function(event)
{
    $(this).parent().find('.me-chat-box-body-submit-contenteditable-placeholder').hide();
});

// Detect click in placeholder of the attr contenteditable
$(document).on("mousedown", ".me-chat-box-body-submit .me-chat-box-body-submit-contenteditable-placeholder", function(event)
{
    $(this).hide();
    $(this).parent().find('.me-chat-box-body-submit-contenteditable').focusin();
});

// Detect scroll to the top of chatbox
$(document).on("mousewheel", ".me-chat-box-body-content", function()
{
	var chatID = $(this).closest('.me-chat-box').data('me-chat-id');
	if (this.scrollTop < 100 && window.innerWidth > 590)
	{
		meChat_loadOldMessages(chatID);
	}
});

// Detect click to load old messages
$(document).on("click touchstart", ".me-chat-box-message-load", function()
{
	var chatID = $(this).closest('.me-chat-box').data('me-chat-id');
	meChat_loadOldMessages(chatID);
});

// Detect click to close the chatbox
$(document).on("click touchstart", ".me-chat-box-header-close", function()
{
	var chatID = $(this).closest('.me-chat-box').data('me-chat-id');
	meChat_Close(chatID);
});

// Detect click on the header of the chatbox
$(document).on("click", ".me-chat-box-header", function(event)
{
	// Hide chatbox
	if (me_chat_settings.box_hidden)
	{
        var chatDOM = $(this).closest('.me-chat-box');        
        var chatID = $(chatDOM).data('me-chat-id');
        
        // Get hidden chatboxes
        var hiddenChats = meChatCookie_getProp('hidden_chats');
        if(typeof hiddenChats == "undefined")
        {
            hiddenChats = new Array();
        }
        
		if($(chatDOM).hasClass('me-chat-box-hidden'))
        {
            // Show chatbox
            for(var i = 0; i < hiddenChats.length; i++)
            {
                if(hiddenChats[i] == chatID)
                {
                    hiddenChats.splice(i, 1);
                    break;
                }
            }            
            
            meChat_setProp(chatID, 'hidden', false);
            $(chatDOM).removeClass('me-chat-box-hidden');
        }
        else
        {
            // Hide chatbox
            hiddenChats.push(chatID);
            
            meChat_setProp(chatID, 'hidden', true);
            $(chatDOM).addClass('me-chat-box-hidden');    
        }
        
        // Set hidden chatboxes
        meChatCookie_setProp('hidden_chats', hiddenChats);
	}
});

// Stop scroll of (HTML, body) tags, if the event hover occurs in the chatbox
var me_chat_scroll_locked = false;
var me_chat_scroll_div = false;
var div = -1;
$('body').bind('mousewheel', function(event)
{
	if (me_chat_settings.box_scrolllock && me_chat_scroll_locked)
	{
		me_chat_scroll_div.scrollTop(me_chat_scroll_div.scrollTop() - event.originalEvent.wheelDelta);
		return false;
	}
});
$(document).on('mouseover', '.me-chat-box', function()
{
	me_chat_scroll_locked = true;
	me_chat_scroll_div = $('.me-chat-box-body-content');
});
$(document).on('mouseout', '.me-chat-box', function()
{
	me_chat_scroll_locked = false;
	me_chat_scroll_div = $('.me-chat-box-body-content');
});



// meChat emojis - Twitter Emoji (Twemoji)
// Convert character to UTF16
function twemoji_toCodePoint(unicodeSurrogates, sep)
{
	var
		r = [],
		c = 0,
		p = 0,
		i = 0;
	while (i < unicodeSurrogates.length)
	{
		c = unicodeSurrogates.charCodeAt(i++);
		if (p)
		{
			r.push((0x10000 + ((p - 0xD800) << 10) + (c - 0xDC00)).toString(16));
			p = 0;
		}
		else if (0xD800 <= c && c <= 0xDBFF)
		{
			p = c;
		}
		else
		{
			r.push(c.toString(16));
		}
	}
	return r.join(sep || '-');
}

// Function to split an array each (x)
Object.defineProperty(Array.prototype, 'SeparateEach',
{
	value: function(chunkSize)
	{
		var array = this;
		return [].concat.apply([],
			array.map(function(elem, i)
			{
				return i % chunkSize ? [] : [array.slice(i, i + chunkSize)];
			})
		);
	}
});

// emojis in JSON
var emojisJSON = '["🀄","🃏","🅰","🅱","🅾","🅿","🆎","🆑","🆒","🆓","🆔","🆕","🆖","🆗","🆘","🆙","🆚","🇦","🇧","🇨🇳","🇨","🇩🇪","🇩","🇪🇸","🇪","🇫🇷","🇫","🇬🇧","🇬","🇭","🇮🇹","🇮","🇯🇵","🇯","🇰🇷","🇰","🇱","🇲","🇳","🇴","🇵","🇶","🇷🇺","🇷","🇸","🇹","🇺🇸","🇺","🇻","🇼","🇽","🇾","🇿","🈁","🈂","🈚","🈯","🈲","🈳","🈴","🈵","🈶","🈷","🈸","🈹","🈺","🉐","🉑","🌀","🌁","🌂","🌃","🌄","🌅","🌆","🌇","🌈","🌉","🌊","🌋","🌌","🌍","🌎","🌏","🌐","🌑","🌒","🌓","🌔","🌕","🌖","🌗","🌘","🌙","🌚","🌛","🌜","🌝","🌞","🌟","🌠","🌰","🌱","🌲","🌳","🌴","🌵","🌷","🌸","🌹","🌺","🌻","🌼","🌽","🌾","🌿","🍀","🍁","🍂","🍃","🍄","🍅","🍆","🍇","🍈","🍉","🍊","🍋","🍌","🍍","🍎","🍏","🍐","🍑","🍒","🍓","🍔","🍕","🍖","🍗","🍘","🍙","🍚","🍛","🍜","🍝","🍞","🍟","🍠","🍡","🍢","🍣","🍤","🍥","🍦","🍧","🍨","🍩","🍪","🍫","🍬","🍭","🍮","🍯","🍰","🍱","🍲","🍳","🍴","🍵","🍶","🍷","🍸","🍹","🍺","🍻","🍼","🎀","🎁","🎂","🎃","🎄","🎅","🎆","🎇","🎈","🎉","🎊","🎋","🎌","🎍","🎎","🎏","🎐","🎑","🎒","🎓","🎠","🎡","🎢","🎣","🎤","🎥","🎦","🎧","🎨","🎩","🎪","🎫","🎬","🎭","🎮","🎯","🎰","🎱","🎲","🎳","🎴","🎵","🎶","🎷","🎸","🎹","🎺","🎻","🎼","🎽","🎾","🎿","🏀","🏁","🏂","🏃","🏄","🏆","🏇","🏈","🏉","🏊","🏠","🏡","🏢","🏣","🏤","🏥","🏦","🏧","🏨","🏩","🏪","🏫","🏬","🏭","🏮","🏯","🏰","🐀","🐁","🐂","🐃","🐄","🐅","🐆","🐇","🐈","🐉","🐊","🐋","🐌","🐍","🐎","🐏","🐐","🐑","🐒","🐓","🐔","🐕","🐖","🐗","🐘","🐙","🐚","🐛","🐜","🐝","🐞","🐟","🐠","🐡","🐢","🐣","🐤","🐥","🐦","🐧","🐨","🐩","🐪","🐫","🐬","🐭","🐮","🐯","🐰","🐱","🐲","🐳","🐴","🐵","🐶","🐷","🐸","🐹","🐺","🐻","🐼","🐽","🐾","👀","👂","👃","👄","👅","👆","👇","👈","👉","👊","👋","👌","👍","👎","👏","👐","👑","👒","👓","👔","👕","👖","👗","👘","👙","👚","👛","👜","👝","👞","👟","👠","👡","👢","👣","👤","👥","👦","👧","👨","👩","👪","👫","👬","👭","👮","👯","👰","👱","👲","👳","👴","👵","👶","👷","👸","👹","👺","👻","👼","👽","👾","👿","💀","💁","💂","💃","💄","💅","💆","💇","💈","💉","💊","💋","💌","💍","💎","💏","💐","💑","💒","💓","💔","💕","💖","💗","💘","💙","💚","💛","💜","💝","💞","💟","💠","💡","💢","💣","💤","💥","💦","💧","💨","💩","💪","💫","💬","💭","💮","💯","💰","💱","💲","💳","💴","💵","💶","💷","💸","💹","💺","💻","💼","💽","💾","💿","📀","📁","📂","📃","📄","📅","📆","📇","📈","📉","📊","📋","📌","📍","📎","📏","📐","📑","📒","📓","📔","📕","📖","📗","📘","📙","📚","📛","📜","📝","📞","📟","📠","📡","📢","📣","📤","📥","📦","📧","📨","📩","📪","📫","📬","📭","📮","📯","📰","📱","📲","📳","📴","📵","📶","📷","📹","📺","📻","📼","🔀","🔁","🔂","🔃","🔄","🔅","🔆","🔇","🔈","🔉","🔊","🔋","🔌","🔍","🔎","🔏","🔐","🔑","🔒","🔓","🔔","🔕","🔖","🔗","🔘","🔙","🔚","🔛","🔜","🔝","🔞","🔟","🔠","🔡","🔢","🔣","🔤","🔥","🔦","🔧","🔨","🔩","🔪","🔫","🔬","🔭","🔮","🔯","🔰","🔱","🔲","🔳","🔴","🔵","🔶","🔷","🔸","🔹","🔺","🔻","🔼","🔽","🕐","🕑","🕒","🕓","🕔","🕕","🕖","🕗","🕘","🕙","🕚","🕛","🕜","🕝","🕞","🕟","🕠","🕡","🕢","🕣","🕤","🕥","🕦","🕧","🗻","🗼","🗽","🗾","🗿","😀","😁","😂","😃","😄","😅","😆","😇","😈","😉","😊","😋","😌","😍","😎","😏","😐","😑","😒","😓","😔","😕","😖","😗","😘","😙","😚","😛","😜","😝","😞","😟","😠","😡","😢","😣","😤","😥","😦","😧","😨","😩","😪","😫","😬","😭","😮","😯","😰","😱","😲","😳","😴","😵","😶","😷","😸","😹","😺","😻","😼","😽","😾","😿","🙀","🙅","🙆","🙇","🙈","🙉","🙊","🙋","🙌","🙍","🙎","🙏","🚀","🚁","🚂","🚃","🚄","🚅","🚆","🚇","🚈","🚉","🚊","🚋","🚌","🚍","🚎","🚏","🚐","🚑","🚒","🚓","🚔","🚕","🚖","🚗","🚘","🚙","🚚","🚛","🚜","🚝","🚞","🚟","🚠","🚡","🚢","🚣","🚤","🚥","🚦","🚧","🚨","🚩","🚪","🚫","🚬","🚭","🚮","🚯","🚰","🚱","🚲","🚳","🚴","🚵","🚶","🚷","🚸","🚹","🚺","🚻","🚼","🚽","🚾","🚿","🛀","🛁","🛂","🛃","🛄","🛅","‼","⁉","™","ℹ","↔","↕","↖","↗","↘","↙","↩","↪","#⃣","⌚","⌛","⏩","⏪","⏫","⏬","⏰","⏳","Ⓜ","▪","▫","▶","◀","◻","◼","◽","◾","☀","☁","☎","☑","☔","☕","☝","☺","♈","♉","♊","♋","♌","♍","♎","♏","♐","♑","♒","♓","♠","♣","♥","♦","♨","♻","♿","⚓","⚠","⚡","⚪","⚫","⚽","⚾","⛄","⛅","⛎","⛔","⛪","⛲","⛳","⛵","⛺","⛽","✂","✅","✈","✉","✊","✋","✌","✏","✒","✔","✖","✨","✳","✴","❄","❇","❌","❎","❓","❔","❕","❗","❤","➕","➖","➗","➡","➰","➿","⤴","⤵","⬅","⬆","⬇","⬛","⬜","⭐","⭕","0⃣","〰","〽","1⃣","2⃣","㊗","㊙","3⃣","4⃣","5⃣","6⃣","7⃣","8⃣","9⃣","©","®",""]';

// Transform emojisJSON in Array
var emojisArray = JSON.parse(emojisJSON);

// Separate emojis array every 5
emojisArray = emojisArray.SeparateEach(5);

// Store table of emojis
var emojisTable = '';

// Build emoji table, every 5
/*$(emojisArray).each(function(key, value) {

    emojisTable += '<tr>';

    $(value).each(function(key, value) {
        emojisTable += '<td>' + value + '</td>';
    });

    emojisTable += '</tr>';

});*/

// Transform unicode characters in images (require Twitter Twemoji)
// emojisTable = twemoji.parse(emojisTable);
emojisTable = '<tr><td><img class="emoji" draggable="false" alt="🀄" src="http://twemoji.maxcdn.com/36x36/1f004.png"></td><td><img class="emoji" draggable="false" alt="🃏" src="http://twemoji.maxcdn.com/36x36/1f0cf.png"></td><td><img class="emoji" draggable="false" alt="🅰" src="http://twemoji.maxcdn.com/36x36/1f170.png"></td><td><img class="emoji" draggable="false" alt="🅱" src="http://twemoji.maxcdn.com/36x36/1f171.png"></td><td><img class="emoji" draggable="false" alt="🅾" src="http://twemoji.maxcdn.com/36x36/1f17e.png"></td></tr><tr><td><img class="emoji" draggable="false" alt="🅿" src="http://twemoji.maxcdn.com/36x36/1f17f.png"></td><td><img class="emoji" draggable="false" alt="🆎" src="http://twemoji.maxcdn.com/36x36/1f18e.png"></td><td><img class="emoji" draggable="false" alt="🆑" src="http://twemoji.maxcdn.com/36x36/1f191.png"></td><td><img class="emoji" draggable="false" alt="🆒" src="http://twemoji.maxcdn.com/36x36/1f192.png"></td><td><img class="emoji" draggable="false" alt="🆓" src="http://twemoji.maxcdn.com/36x36/1f193.png"></td></tr><tr><td><img class="emoji" draggable="false" alt="🆔" src="http://twemoji.maxcdn.com/36x36/1f194.png"></td><td><img class="emoji" draggable="false" alt="🆕" src="http://twemoji.maxcdn.com/36x36/1f195.png"></td><td><img class="emoji" draggable="false" alt="🆖" src="http://twemoji.maxcdn.com/36x36/1f196.png"></td><td><img class="emoji" draggable="false" alt="🆗" src="http://twemoji.maxcdn.com/36x36/1f197.png"></td><td><img class="emoji" draggable="false" alt="🆘" src="http://twemoji.maxcdn.com/36x36/1f198.png"></td></tr><tr><td><img class="emoji" draggable="false" alt="🆙" src="http://twemoji.maxcdn.com/36x36/1f199.png"></td><td><img class="emoji" draggable="false" alt="🆚" src="http://twemoji.maxcdn.com/36x36/1f19a.png"></td><td><img class="emoji" draggable="false" alt="🇦" src="http://twemoji.maxcdn.com/36x36/1f1e6.png"></td><td><img class="emoji" draggable="false" alt="🇧" src="http://twemoji.maxcdn.com/36x36/1f1e7.png"></td><td><img class="emoji" draggable="false" alt="🇨🇳" src="http://twemoji.maxcdn.com/36x36/1f1e8-1f1f3.png"></td></tr><tr><td><img class="emoji" draggable="false" alt="🇨" src="http://twemoji.maxcdn.com/36x36/1f1e8.png"></td><td><img class="emoji" draggable="false" alt="🇩🇪" src="http://twemoji.maxcdn.com/36x36/1f1e9-1f1ea.png"></td><td><img class="emoji" draggable="false" alt="🇩" src="http://twemoji.maxcdn.com/36x36/1f1e9.png"></td><td><img class="emoji" draggable="false" alt="🇪🇸" src="http://twemoji.maxcdn.com/36x36/1f1ea-1f1f8.png"></td><td><img class="emoji" draggable="false" alt="🇪" src="http://twemoji.maxcdn.com/36x36/1f1ea.png"></td></tr><tr><td><img class="emoji" draggable="false" alt="🇫🇷" src="http://twemoji.maxcdn.com/36x36/1f1eb-1f1f7.png"></td><td><img class="emoji" draggable="false" alt="🇫" src="http://twemoji.maxcdn.com/36x36/1f1eb.png"></td><td><img class="emoji" draggable="false" alt="🇬🇧" src="http://twemoji.maxcdn.com/36x36/1f1ec-1f1e7.png"></td><td><img class="emoji" draggable="false" alt="🇬" src="http://twemoji.maxcdn.com/36x36/1f1ec.png"></td><td><img class="emoji" draggable="false" alt="🇭" src="http://twemoji.maxcdn.com/36x36/1f1ed.png"></td></tr><tr><td><img class="emoji" draggable="false" alt="🇮🇹" src="http://twemoji.maxcdn.com/36x36/1f1ee-1f1f9.png"></td><td><img class="emoji" draggable="false" alt="🇮" src="http://twemoji.maxcdn.com/36x36/1f1ee.png"></td><td><img class="emoji" draggable="false" alt="🇯🇵" src="http://twemoji.maxcdn.com/36x36/1f1ef-1f1f5.png"></td><td><img class="emoji" draggable="false" alt="🇯" src="http://twemoji.maxcdn.com/36x36/1f1ef.png"></td><td><img class="emoji" draggable="false" alt="🇰🇷" src="http://twemoji.maxcdn.com/36x36/1f1f0-1f1f7.png"></td></tr><tr><td><img class="emoji" draggable="false" alt="🇰" src="http://twemoji.maxcdn.com/36x36/1f1f0.png"></td><td><img class="emoji" draggable="false" alt="🇱" src="http://twemoji.maxcdn.com/36x36/1f1f1.png"></td><td><img class="emoji" draggable="false" alt="🇲" src="http://twemoji.maxcdn.com/36x36/1f1f2.png"></td><td><img class="emoji" draggable="false" alt="🇳" src="http://twemoji.maxcdn.com/36x36/1f1f3.png"></td><td><img class="emoji" draggable="false" alt="🇴" src="http://twemoji.maxcdn.com/36x36/1f1f4.png"></td></tr><tr><td><img class="emoji" draggable="false" alt="🇵" src="http://twemoji.maxcdn.com/36x36/1f1f5.png"></td><td><img class="emoji" draggable="false" alt="🇶" src="http://twemoji.maxcdn.com/36x36/1f1f6.png"></td><td><img class="emoji" draggable="false" alt="🇷🇺" src="http://twemoji.maxcdn.com/36x36/1f1f7-1f1fa.png"></td><td><img class="emoji" draggable="false" alt="🇷" src="http://twemoji.maxcdn.com/36x36/1f1f7.png"></td><td><img class="emoji" draggable="false" alt="🇸" src="http://twemoji.maxcdn.com/36x36/1f1f8.png"></td></tr><tr><td><img class="emoji" draggable="false" alt="🇹" src="http://twemoji.maxcdn.com/36x36/1f1f9.png"></td><td><img class="emoji" draggable="false" alt="🇺🇸" src="http://twemoji.maxcdn.com/36x36/1f1fa-1f1f8.png"></td><td><img class="emoji" draggable="false" alt="🇺" src="http://twemoji.maxcdn.com/36x36/1f1fa.png"></td><td><img class="emoji" draggable="false" alt="🇻" src="http://twemoji.maxcdn.com/36x36/1f1fb.png"></td><td><img class="emoji" draggable="false" alt="🇼" src="http://twemoji.maxcdn.com/36x36/1f1fc.png"></td></tr><tr><td><img class="emoji" draggable="false" alt="🇽" src="http://twemoji.maxcdn.com/36x36/1f1fd.png"></td><td><img class="emoji" draggable="false" alt="🇾" src="http://twemoji.maxcdn.com/36x36/1f1fe.png"></td><td><img class="emoji" draggable="false" alt="🇿" src="http://twemoji.maxcdn.com/36x36/1f1ff.png"></td><td><img class="emoji" draggable="false" alt="🈁" src="http://twemoji.maxcdn.com/36x36/1f201.png"></td><td><img class="emoji" draggable="false" alt="🈂" src="http://twemoji.maxcdn.com/36x36/1f202.png"></td></tr><tr><td><img class="emoji" draggable="false" alt="🈚" src="http://twemoji.maxcdn.com/36x36/1f21a.png"></td><td><img class="emoji" draggable="false" alt="🈯" src="http://twemoji.maxcdn.com/36x36/1f22f.png"></td><td><img class="emoji" draggable="false" alt="🈲" src="http://twemoji.maxcdn.com/36x36/1f232.png"></td><td><img class="emoji" draggable="false" alt="🈳" src="http://twemoji.maxcdn.com/36x36/1f233.png"></td><td><img class="emoji" draggable="false" alt="🈴" src="http://twemoji.maxcdn.com/36x36/1f234.png"></td></tr><tr><td><img class="emoji" draggable="false" alt="🈵" src="http://twemoji.maxcdn.com/36x36/1f235.png"></td><td><img class="emoji" draggable="false" alt="🈶" src="http://twemoji.maxcdn.com/36x36/1f236.png"></td><td><img class="emoji" draggable="false" alt="🈷" src="http://twemoji.maxcdn.com/36x36/1f237.png"></td><td><img class="emoji" draggable="false" alt="🈸" src="http://twemoji.maxcdn.com/36x36/1f238.png"></td><td><img class="emoji" draggable="false" alt="🈹" src="http://twemoji.maxcdn.com/36x36/1f239.png"></td></tr><tr><td><img class="emoji" draggable="false" alt="🈺" src="http://twemoji.maxcdn.com/36x36/1f23a.png"></td><td><img class="emoji" draggable="false" alt="🉐" src="http://twemoji.maxcdn.com/36x36/1f250.png"></td><td><img class="emoji" draggable="false" alt="🉑" src="http://twemoji.maxcdn.com/36x36/1f251.png"></td><td><img class="emoji" draggable="false" alt="🌀" src="http://twemoji.maxcdn.com/36x36/1f300.png"></td><td><img class="emoji" draggable="false" alt="🌁" src="http://twemoji.maxcdn.com/36x36/1f301.png"></td></tr><tr><td><img class="emoji" draggable="false" alt="🌂" src="http://twemoji.maxcdn.com/36x36/1f302.png"></td><td><img class="emoji" draggable="false" alt="🌃" src="http://twemoji.maxcdn.com/36x36/1f303.png"></td><td><img class="emoji" draggable="false" alt="🌄" src="http://twemoji.maxcdn.com/36x36/1f304.png"></td><td><img class="emoji" draggable="false" alt="🌅" src="http://twemoji.maxcdn.com/36x36/1f305.png"></td><td><img class="emoji" draggable="false" alt="🌆" src="http://twemoji.maxcdn.com/36x36/1f306.png"></td></tr><tr><td><img class="emoji" draggable="false" alt="🌇" src="http://twemoji.maxcdn.com/36x36/1f307.png"></td><td><img class="emoji" draggable="false" alt="🌈" src="http://twemoji.maxcdn.com/36x36/1f308.png"></td><td><img class="emoji" draggable="false" alt="🌉" src="http://twemoji.maxcdn.com/36x36/1f309.png"></td><td><img class="emoji" draggable="false" alt="🌊" src="http://twemoji.maxcdn.com/36x36/1f30a.png"></td><td><img class="emoji" draggable="false" alt="🌋" src="http://twemoji.maxcdn.com/36x36/1f30b.png"></td></tr><tr><td><img class="emoji" draggable="false" alt="🌌" src="http://twemoji.maxcdn.com/36x36/1f30c.png"></td><td><img class="emoji" draggable="false" alt="🌍" src="http://twemoji.maxcdn.com/36x36/1f30d.png"></td><td><img class="emoji" draggable="false" alt="🌎" src="http://twemoji.maxcdn.com/36x36/1f30e.png"></td><td><img class="emoji" draggable="false" alt="🌏" src="http://twemoji.maxcdn.com/36x36/1f30f.png"></td><td><img class="emoji" draggable="false" alt="🌐" src="http://twemoji.maxcdn.com/36x36/1f310.png"></td></tr><tr><td><img class="emoji" draggable="false" alt="🌑" src="http://twemoji.maxcdn.com/36x36/1f311.png"></td><td><img class="emoji" draggable="false" alt="🌒" src="http://twemoji.maxcdn.com/36x36/1f312.png"></td><td><img class="emoji" draggable="false" alt="🌓" src="http://twemoji.maxcdn.com/36x36/1f313.png"></td><td><img class="emoji" draggable="false" alt="🌔" src="http://twemoji.maxcdn.com/36x36/1f314.png"></td><td><img class="emoji" draggable="false" alt="🌕" src="http://twemoji.maxcdn.com/36x36/1f315.png"></td></tr><tr><td><img class="emoji" draggable="false" alt="🌖" src="http://twemoji.maxcdn.com/36x36/1f316.png"></td><td><img class="emoji" draggable="false" alt="🌗" src="http://twemoji.maxcdn.com/36x36/1f317.png"></td><td><img class="emoji" draggable="false" alt="🌘" src="http://twemoji.maxcdn.com/36x36/1f318.png"></td><td><img class="emoji" draggable="false" alt="🌙" src="http://twemoji.maxcdn.com/36x36/1f319.png"></td><td><img class="emoji" draggable="false" alt="🌚" src="http://twemoji.maxcdn.com/36x36/1f31a.png"></td></tr><tr><td><img class="emoji" draggable="false" alt="🌛" src="http://twemoji.maxcdn.com/36x36/1f31b.png"></td><td><img class="emoji" draggable="false" alt="🌜" src="http://twemoji.maxcdn.com/36x36/1f31c.png"></td><td><img class="emoji" draggable="false" alt="🌝" src="http://twemoji.maxcdn.com/36x36/1f31d.png"></td><td><img class="emoji" draggable="false" alt="🌞" src="http://twemoji.maxcdn.com/36x36/1f31e.png"></td><td><img class="emoji" draggable="false" alt="🌟" src="http://twemoji.maxcdn.com/36x36/1f31f.png"></td></tr><tr><td><img class="emoji" draggable="false" alt="🌠" src="http://twemoji.maxcdn.com/36x36/1f320.png"></td><td><img class="emoji" draggable="false" alt="🌰" src="http://twemoji.maxcdn.com/36x36/1f330.png"></td><td><img class="emoji" draggable="false" alt="🌱" src="http://twemoji.maxcdn.com/36x36/1f331.png"></td><td><img class="emoji" draggable="false" alt="🌲" src="http://twemoji.maxcdn.com/36x36/1f332.png"></td><td><img class="emoji" draggable="false" alt="🌳" src="http://twemoji.maxcdn.com/36x36/1f333.png"></td></tr><tr><td><img class="emoji" draggable="false" alt="🌴" src="http://twemoji.maxcdn.com/36x36/1f334.png"></td><td><img class="emoji" draggable="false" alt="🌵" src="http://twemoji.maxcdn.com/36x36/1f335.png"></td><td><img class="emoji" draggable="false" alt="🌷" src="http://twemoji.maxcdn.com/36x36/1f337.png"></td><td><img class="emoji" draggable="false" alt="🌸" src="http://twemoji.maxcdn.com/36x36/1f338.png"></td><td><img class="emoji" draggable="false" alt="🌹" src="http://twemoji.maxcdn.com/36x36/1f339.png"></td></tr><tr><td><img class="emoji" draggable="false" alt="🌺" src="http://twemoji.maxcdn.com/36x36/1f33a.png"></td><td><img class="emoji" draggable="false" alt="🌻" src="http://twemoji.maxcdn.com/36x36/1f33b.png"></td><td><img class="emoji" draggable="false" alt="🌼" src="http://twemoji.maxcdn.com/36x36/1f33c.png"></td><td><img class="emoji" draggable="false" alt="🌽" src="http://twemoji.maxcdn.com/36x36/1f33d.png"></td><td><img class="emoji" draggable="false" alt="🌾" src="http://twemoji.maxcdn.com/36x36/1f33e.png"></td></tr><tr><td><img class="emoji" draggable="false" alt="🌿" src="http://twemoji.maxcdn.com/36x36/1f33f.png"></td><td><img class="emoji" draggable="false" alt="🍀" src="http://twemoji.maxcdn.com/36x36/1f340.png"></td><td><img class="emoji" draggable="false" alt="🍁" src="http://twemoji.maxcdn.com/36x36/1f341.png"></td><td><img class="emoji" draggable="false" alt="🍂" src="http://twemoji.maxcdn.com/36x36/1f342.png"></td><td><img class="emoji" draggable="false" alt="🍃" src="http://twemoji.maxcdn.com/36x36/1f343.png"></td></tr><tr><td><img class="emoji" draggable="false" alt="🍄" src="http://twemoji.maxcdn.com/36x36/1f344.png"></td><td><img class="emoji" draggable="false" alt="🍅" src="http://twemoji.maxcdn.com/36x36/1f345.png"></td><td><img class="emoji" draggable="false" alt="🍆" src="http://twemoji.maxcdn.com/36x36/1f346.png"></td><td><img class="emoji" draggable="false" alt="🍇" src="http://twemoji.maxcdn.com/36x36/1f347.png"></td><td><img class="emoji" draggable="false" alt="🍈" src="http://twemoji.maxcdn.com/36x36/1f348.png"></td></tr><tr><td><img class="emoji" draggable="false" alt="🍉" src="http://twemoji.maxcdn.com/36x36/1f349.png"></td><td><img class="emoji" draggable="false" alt="🍊" src="http://twemoji.maxcdn.com/36x36/1f34a.png"></td><td><img class="emoji" draggable="false" alt="🍋" src="http://twemoji.maxcdn.com/36x36/1f34b.png"></td><td><img class="emoji" draggable="false" alt="🍌" src="http://twemoji.maxcdn.com/36x36/1f34c.png"></td><td><img class="emoji" draggable="false" alt="🍍" src="http://twemoji.maxcdn.com/36x36/1f34d.png"></td></tr><tr><td><img class="emoji" draggable="false" alt="🍎" src="http://twemoji.maxcdn.com/36x36/1f34e.png"></td><td><img class="emoji" draggable="false" alt="🍏" src="http://twemoji.maxcdn.com/36x36/1f34f.png"></td><td><img class="emoji" draggable="false" alt="🍐" src="http://twemoji.maxcdn.com/36x36/1f350.png"></td><td><img class="emoji" draggable="false" alt="🍑" src="http://twemoji.maxcdn.com/36x36/1f351.png"></td><td><img class="emoji" draggable="false" alt="🍒" src="http://twemoji.maxcdn.com/36x36/1f352.png"></td></tr><tr><td><img class="emoji" draggable="false" alt="🍓" src="http://twemoji.maxcdn.com/36x36/1f353.png"></td><td><img class="emoji" draggable="false" alt="🍔" src="http://twemoji.maxcdn.com/36x36/1f354.png"></td><td><img class="emoji" draggable="false" alt="🍕" src="http://twemoji.maxcdn.com/36x36/1f355.png"></td><td><img class="emoji" draggable="false" alt="🍖" src="http://twemoji.maxcdn.com/36x36/1f356.png"></td><td><img class="emoji" draggable="false" alt="🍗" src="http://twemoji.maxcdn.com/36x36/1f357.png"></td></tr><tr><td><img class="emoji" draggable="false" alt="🍘" src="http://twemoji.maxcdn.com/36x36/1f358.png"></td><td><img class="emoji" draggable="false" alt="🍙" src="http://twemoji.maxcdn.com/36x36/1f359.png"></td><td><img class="emoji" draggable="false" alt="🍚" src="http://twemoji.maxcdn.com/36x36/1f35a.png"></td><td><img class="emoji" draggable="false" alt="🍛" src="http://twemoji.maxcdn.com/36x36/1f35b.png"></td><td><img class="emoji" draggable="false" alt="🍜" src="http://twemoji.maxcdn.com/36x36/1f35c.png"></td></tr><tr><td><img class="emoji" draggable="false" alt="🍝" src="http://twemoji.maxcdn.com/36x36/1f35d.png"></td><td><img class="emoji" draggable="false" alt="🍞" src="http://twemoji.maxcdn.com/36x36/1f35e.png"></td><td><img class="emoji" draggable="false" alt="🍟" src="http://twemoji.maxcdn.com/36x36/1f35f.png"></td><td><img class="emoji" draggable="false" alt="🍠" src="http://twemoji.maxcdn.com/36x36/1f360.png"></td><td><img class="emoji" draggable="false" alt="🍡" src="http://twemoji.maxcdn.com/36x36/1f361.png"></td></tr><tr><td><img class="emoji" draggable="false" alt="🍢" src="http://twemoji.maxcdn.com/36x36/1f362.png"></td><td><img class="emoji" draggable="false" alt="🍣" src="http://twemoji.maxcdn.com/36x36/1f363.png"></td><td><img class="emoji" draggable="false" alt="🍤" src="http://twemoji.maxcdn.com/36x36/1f364.png"></td><td><img class="emoji" draggable="false" alt="🍥" src="http://twemoji.maxcdn.com/36x36/1f365.png"></td><td><img class="emoji" draggable="false" alt="🍦" src="http://twemoji.maxcdn.com/36x36/1f366.png"></td></tr><tr><td><img class="emoji" draggable="false" alt="🍧" src="http://twemoji.maxcdn.com/36x36/1f367.png"></td><td><img class="emoji" draggable="false" alt="🍨" src="http://twemoji.maxcdn.com/36x36/1f368.png"></td><td><img class="emoji" draggable="false" alt="🍩" src="http://twemoji.maxcdn.com/36x36/1f369.png"></td><td><img class="emoji" draggable="false" alt="🍪" src="http://twemoji.maxcdn.com/36x36/1f36a.png"></td><td><img class="emoji" draggable="false" alt="🍫" src="http://twemoji.maxcdn.com/36x36/1f36b.png"></td></tr><tr><td><img class="emoji" draggable="false" alt="🍬" src="http://twemoji.maxcdn.com/36x36/1f36c.png"></td><td><img class="emoji" draggable="false" alt="🍭" src="http://twemoji.maxcdn.com/36x36/1f36d.png"></td><td><img class="emoji" draggable="false" alt="🍮" src="http://twemoji.maxcdn.com/36x36/1f36e.png"></td><td><img class="emoji" draggable="false" alt="🍯" src="http://twemoji.maxcdn.com/36x36/1f36f.png"></td><td><img class="emoji" draggable="false" alt="🍰" src="http://twemoji.maxcdn.com/36x36/1f370.png"></td></tr><tr><td><img class="emoji" draggable="false" alt="🍱" src="http://twemoji.maxcdn.com/36x36/1f371.png"></td><td><img class="emoji" draggable="false" alt="🍲" src="http://twemoji.maxcdn.com/36x36/1f372.png"></td><td><img class="emoji" draggable="false" alt="🍳" src="http://twemoji.maxcdn.com/36x36/1f373.png"></td><td><img class="emoji" draggable="false" alt="🍴" src="http://twemoji.maxcdn.com/36x36/1f374.png"></td><td><img class="emoji" draggable="false" alt="🍵" src="http://twemoji.maxcdn.com/36x36/1f375.png"></td></tr><tr><td><img class="emoji" draggable="false" alt="🍶" src="http://twemoji.maxcdn.com/36x36/1f376.png"></td><td><img class="emoji" draggable="false" alt="🍷" src="http://twemoji.maxcdn.com/36x36/1f377.png"></td><td><img class="emoji" draggable="false" alt="🍸" src="http://twemoji.maxcdn.com/36x36/1f378.png"></td><td><img class="emoji" draggable="false" alt="🍹" src="http://twemoji.maxcdn.com/36x36/1f379.png"></td><td><img class="emoji" draggable="false" alt="🍺" src="http://twemoji.maxcdn.com/36x36/1f37a.png"></td></tr><tr><td><img class="emoji" draggable="false" alt="🍻" src="http://twemoji.maxcdn.com/36x36/1f37b.png"></td><td><img class="emoji" draggable="false" alt="🍼" src="http://twemoji.maxcdn.com/36x36/1f37c.png"></td><td><img class="emoji" draggable="false" alt="🎀" src="http://twemoji.maxcdn.com/36x36/1f380.png"></td><td><img class="emoji" draggable="false" alt="🎁" src="http://twemoji.maxcdn.com/36x36/1f381.png"></td><td><img class="emoji" draggable="false" alt="🎂" src="http://twemoji.maxcdn.com/36x36/1f382.png"></td></tr><tr><td><img class="emoji" draggable="false" alt="🎃" src="http://twemoji.maxcdn.com/36x36/1f383.png"></td><td><img class="emoji" draggable="false" alt="🎄" src="http://twemoji.maxcdn.com/36x36/1f384.png"></td><td><img class="emoji" draggable="false" alt="🎅" src="http://twemoji.maxcdn.com/36x36/1f385.png"></td><td><img class="emoji" draggable="false" alt="🎆" src="http://twemoji.maxcdn.com/36x36/1f386.png"></td><td><img class="emoji" draggable="false" alt="🎇" src="http://twemoji.maxcdn.com/36x36/1f387.png"></td></tr><tr><td><img class="emoji" draggable="false" alt="🎈" src="http://twemoji.maxcdn.com/36x36/1f388.png"></td><td><img class="emoji" draggable="false" alt="🎉" src="http://twemoji.maxcdn.com/36x36/1f389.png"></td><td><img class="emoji" draggable="false" alt="🎊" src="http://twemoji.maxcdn.com/36x36/1f38a.png"></td><td><img class="emoji" draggable="false" alt="🎋" src="http://twemoji.maxcdn.com/36x36/1f38b.png"></td><td><img class="emoji" draggable="false" alt="🎌" src="http://twemoji.maxcdn.com/36x36/1f38c.png"></td></tr><tr><td><img class="emoji" draggable="false" alt="🎍" src="http://twemoji.maxcdn.com/36x36/1f38d.png"></td><td><img class="emoji" draggable="false" alt="🎎" src="http://twemoji.maxcdn.com/36x36/1f38e.png"></td><td><img class="emoji" draggable="false" alt="🎏" src="http://twemoji.maxcdn.com/36x36/1f38f.png"></td><td><img class="emoji" draggable="false" alt="🎐" src="http://twemoji.maxcdn.com/36x36/1f390.png"></td><td><img class="emoji" draggable="false" alt="🎑" src="http://twemoji.maxcdn.com/36x36/1f391.png"></td></tr><tr><td><img class="emoji" draggable="false" alt="🎒" src="http://twemoji.maxcdn.com/36x36/1f392.png"></td><td><img class="emoji" draggable="false" alt="🎓" src="http://twemoji.maxcdn.com/36x36/1f393.png"></td><td><img class="emoji" draggable="false" alt="🎠" src="http://twemoji.maxcdn.com/36x36/1f3a0.png"></td><td><img class="emoji" draggable="false" alt="🎡" src="http://twemoji.maxcdn.com/36x36/1f3a1.png"></td><td><img class="emoji" draggable="false" alt="🎢" src="http://twemoji.maxcdn.com/36x36/1f3a2.png"></td></tr><tr><td><img class="emoji" draggable="false" alt="🎣" src="http://twemoji.maxcdn.com/36x36/1f3a3.png"></td><td><img class="emoji" draggable="false" alt="🎤" src="http://twemoji.maxcdn.com/36x36/1f3a4.png"></td><td><img class="emoji" draggable="false" alt="🎥" src="http://twemoji.maxcdn.com/36x36/1f3a5.png"></td><td><img class="emoji" draggable="false" alt="🎦" src="http://twemoji.maxcdn.com/36x36/1f3a6.png"></td><td><img class="emoji" draggable="false" alt="🎧" src="http://twemoji.maxcdn.com/36x36/1f3a7.png"></td></tr><tr><td><img class="emoji" draggable="false" alt="🎨" src="http://twemoji.maxcdn.com/36x36/1f3a8.png"></td><td><img class="emoji" draggable="false" alt="🎩" src="http://twemoji.maxcdn.com/36x36/1f3a9.png"></td><td><img class="emoji" draggable="false" alt="🎪" src="http://twemoji.maxcdn.com/36x36/1f3aa.png"></td><td><img class="emoji" draggable="false" alt="🎫" src="http://twemoji.maxcdn.com/36x36/1f3ab.png"></td><td><img class="emoji" draggable="false" alt="🎬" src="http://twemoji.maxcdn.com/36x36/1f3ac.png"></td></tr><tr><td><img class="emoji" draggable="false" alt="🎭" src="http://twemoji.maxcdn.com/36x36/1f3ad.png"></td><td><img class="emoji" draggable="false" alt="🎮" src="http://twemoji.maxcdn.com/36x36/1f3ae.png"></td><td><img class="emoji" draggable="false" alt="🎯" src="http://twemoji.maxcdn.com/36x36/1f3af.png"></td><td><img class="emoji" draggable="false" alt="🎰" src="http://twemoji.maxcdn.com/36x36/1f3b0.png"></td><td><img class="emoji" draggable="false" alt="🎱" src="http://twemoji.maxcdn.com/36x36/1f3b1.png"></td></tr><tr><td><img class="emoji" draggable="false" alt="🎲" src="http://twemoji.maxcdn.com/36x36/1f3b2.png"></td><td><img class="emoji" draggable="false" alt="🎳" src="http://twemoji.maxcdn.com/36x36/1f3b3.png"></td><td><img class="emoji" draggable="false" alt="🎴" src="http://twemoji.maxcdn.com/36x36/1f3b4.png"></td><td><img class="emoji" draggable="false" alt="🎵" src="http://twemoji.maxcdn.com/36x36/1f3b5.png"></td><td><img class="emoji" draggable="false" alt="🎶" src="http://twemoji.maxcdn.com/36x36/1f3b6.png"></td></tr><tr><td><img class="emoji" draggable="false" alt="🎷" src="http://twemoji.maxcdn.com/36x36/1f3b7.png"></td><td><img class="emoji" draggable="false" alt="🎸" src="http://twemoji.maxcdn.com/36x36/1f3b8.png"></td><td><img class="emoji" draggable="false" alt="🎹" src="http://twemoji.maxcdn.com/36x36/1f3b9.png"></td><td><img class="emoji" draggable="false" alt="🎺" src="http://twemoji.maxcdn.com/36x36/1f3ba.png"></td><td><img class="emoji" draggable="false" alt="🎻" src="http://twemoji.maxcdn.com/36x36/1f3bb.png"></td></tr><tr><td><img class="emoji" draggable="false" alt="🎼" src="http://twemoji.maxcdn.com/36x36/1f3bc.png"></td><td><img class="emoji" draggable="false" alt="🎽" src="http://twemoji.maxcdn.com/36x36/1f3bd.png"></td><td><img class="emoji" draggable="false" alt="🎾" src="http://twemoji.maxcdn.com/36x36/1f3be.png"></td><td><img class="emoji" draggable="false" alt="🎿" src="http://twemoji.maxcdn.com/36x36/1f3bf.png"></td><td><img class="emoji" draggable="false" alt="🏀" src="http://twemoji.maxcdn.com/36x36/1f3c0.png"></td></tr><tr><td><img class="emoji" draggable="false" alt="🏁" src="http://twemoji.maxcdn.com/36x36/1f3c1.png"></td><td><img class="emoji" draggable="false" alt="🏂" src="http://twemoji.maxcdn.com/36x36/1f3c2.png"></td><td><img class="emoji" draggable="false" alt="🏃" src="http://twemoji.maxcdn.com/36x36/1f3c3.png"></td><td><img class="emoji" draggable="false" alt="🏄" src="http://twemoji.maxcdn.com/36x36/1f3c4.png"></td><td><img class="emoji" draggable="false" alt="🏆" src="http://twemoji.maxcdn.com/36x36/1f3c6.png"></td></tr><tr><td><img class="emoji" draggable="false" alt="🏇" src="http://twemoji.maxcdn.com/36x36/1f3c7.png"></td><td><img class="emoji" draggable="false" alt="🏈" src="http://twemoji.maxcdn.com/36x36/1f3c8.png"></td><td><img class="emoji" draggable="false" alt="🏉" src="http://twemoji.maxcdn.com/36x36/1f3c9.png"></td><td><img class="emoji" draggable="false" alt="🏊" src="http://twemoji.maxcdn.com/36x36/1f3ca.png"></td><td><img class="emoji" draggable="false" alt="🏠" src="http://twemoji.maxcdn.com/36x36/1f3e0.png"></td></tr><tr><td><img class="emoji" draggable="false" alt="🏡" src="http://twemoji.maxcdn.com/36x36/1f3e1.png"></td><td><img class="emoji" draggable="false" alt="🏢" src="http://twemoji.maxcdn.com/36x36/1f3e2.png"></td><td><img class="emoji" draggable="false" alt="🏣" src="http://twemoji.maxcdn.com/36x36/1f3e3.png"></td><td><img class="emoji" draggable="false" alt="🏤" src="http://twemoji.maxcdn.com/36x36/1f3e4.png"></td><td><img class="emoji" draggable="false" alt="🏥" src="http://twemoji.maxcdn.com/36x36/1f3e5.png"></td></tr><tr><td><img class="emoji" draggable="false" alt="🏦" src="http://twemoji.maxcdn.com/36x36/1f3e6.png"></td><td><img class="emoji" draggable="false" alt="🏧" src="http://twemoji.maxcdn.com/36x36/1f3e7.png"></td><td><img class="emoji" draggable="false" alt="🏨" src="http://twemoji.maxcdn.com/36x36/1f3e8.png"></td><td><img class="emoji" draggable="false" alt="🏩" src="http://twemoji.maxcdn.com/36x36/1f3e9.png"></td><td><img class="emoji" draggable="false" alt="🏪" src="http://twemoji.maxcdn.com/36x36/1f3ea.png"></td></tr><tr><td><img class="emoji" draggable="false" alt="🏫" src="http://twemoji.maxcdn.com/36x36/1f3eb.png"></td><td><img class="emoji" draggable="false" alt="🏬" src="http://twemoji.maxcdn.com/36x36/1f3ec.png"></td><td><img class="emoji" draggable="false" alt="🏭" src="http://twemoji.maxcdn.com/36x36/1f3ed.png"></td><td><img class="emoji" draggable="false" alt="🏮" src="http://twemoji.maxcdn.com/36x36/1f3ee.png"></td><td><img class="emoji" draggable="false" alt="🏯" src="http://twemoji.maxcdn.com/36x36/1f3ef.png"></td></tr><tr><td><img class="emoji" draggable="false" alt="🏰" src="http://twemoji.maxcdn.com/36x36/1f3f0.png"></td><td><img class="emoji" draggable="false" alt="🐀" src="http://twemoji.maxcdn.com/36x36/1f400.png"></td><td><img class="emoji" draggable="false" alt="🐁" src="http://twemoji.maxcdn.com/36x36/1f401.png"></td><td><img class="emoji" draggable="false" alt="🐂" src="http://twemoji.maxcdn.com/36x36/1f402.png"></td><td><img class="emoji" draggable="false" alt="🐃" src="http://twemoji.maxcdn.com/36x36/1f403.png"></td></tr><tr><td><img class="emoji" draggable="false" alt="🐄" src="http://twemoji.maxcdn.com/36x36/1f404.png"></td><td><img class="emoji" draggable="false" alt="🐅" src="http://twemoji.maxcdn.com/36x36/1f405.png"></td><td><img class="emoji" draggable="false" alt="🐆" src="http://twemoji.maxcdn.com/36x36/1f406.png"></td><td><img class="emoji" draggable="false" alt="🐇" src="http://twemoji.maxcdn.com/36x36/1f407.png"></td><td><img class="emoji" draggable="false" alt="🐈" src="http://twemoji.maxcdn.com/36x36/1f408.png"></td></tr><tr><td><img class="emoji" draggable="false" alt="🐉" src="http://twemoji.maxcdn.com/36x36/1f409.png"></td><td><img class="emoji" draggable="false" alt="🐊" src="http://twemoji.maxcdn.com/36x36/1f40a.png"></td><td><img class="emoji" draggable="false" alt="🐋" src="http://twemoji.maxcdn.com/36x36/1f40b.png"></td><td><img class="emoji" draggable="false" alt="🐌" src="http://twemoji.maxcdn.com/36x36/1f40c.png"></td><td><img class="emoji" draggable="false" alt="🐍" src="http://twemoji.maxcdn.com/36x36/1f40d.png"></td></tr><tr><td><img class="emoji" draggable="false" alt="🐎" src="http://twemoji.maxcdn.com/36x36/1f40e.png"></td><td><img class="emoji" draggable="false" alt="🐏" src="http://twemoji.maxcdn.com/36x36/1f40f.png"></td><td><img class="emoji" draggable="false" alt="🐐" src="http://twemoji.maxcdn.com/36x36/1f410.png"></td><td><img class="emoji" draggable="false" alt="🐑" src="http://twemoji.maxcdn.com/36x36/1f411.png"></td><td><img class="emoji" draggable="false" alt="🐒" src="http://twemoji.maxcdn.com/36x36/1f412.png"></td></tr><tr><td><img class="emoji" draggable="false" alt="🐓" src="http://twemoji.maxcdn.com/36x36/1f413.png"></td><td><img class="emoji" draggable="false" alt="🐔" src="http://twemoji.maxcdn.com/36x36/1f414.png"></td><td><img class="emoji" draggable="false" alt="🐕" src="http://twemoji.maxcdn.com/36x36/1f415.png"></td><td><img class="emoji" draggable="false" alt="🐖" src="http://twemoji.maxcdn.com/36x36/1f416.png"></td><td><img class="emoji" draggable="false" alt="🐗" src="http://twemoji.maxcdn.com/36x36/1f417.png"></td></tr><tr><td><img class="emoji" draggable="false" alt="🐘" src="http://twemoji.maxcdn.com/36x36/1f418.png"></td><td><img class="emoji" draggable="false" alt="🐙" src="http://twemoji.maxcdn.com/36x36/1f419.png"></td><td><img class="emoji" draggable="false" alt="🐚" src="http://twemoji.maxcdn.com/36x36/1f41a.png"></td><td><img class="emoji" draggable="false" alt="🐛" src="http://twemoji.maxcdn.com/36x36/1f41b.png"></td><td><img class="emoji" draggable="false" alt="🐜" src="http://twemoji.maxcdn.com/36x36/1f41c.png"></td></tr><tr><td><img class="emoji" draggable="false" alt="🐝" src="http://twemoji.maxcdn.com/36x36/1f41d.png"></td><td><img class="emoji" draggable="false" alt="🐞" src="http://twemoji.maxcdn.com/36x36/1f41e.png"></td><td><img class="emoji" draggable="false" alt="🐟" src="http://twemoji.maxcdn.com/36x36/1f41f.png"></td><td><img class="emoji" draggable="false" alt="🐠" src="http://twemoji.maxcdn.com/36x36/1f420.png"></td><td><img class="emoji" draggable="false" alt="🐡" src="http://twemoji.maxcdn.com/36x36/1f421.png"></td></tr><tr><td><img class="emoji" draggable="false" alt="🐢" src="http://twemoji.maxcdn.com/36x36/1f422.png"></td><td><img class="emoji" draggable="false" alt="🐣" src="http://twemoji.maxcdn.com/36x36/1f423.png"></td><td><img class="emoji" draggable="false" alt="🐤" src="http://twemoji.maxcdn.com/36x36/1f424.png"></td><td><img class="emoji" draggable="false" alt="🐥" src="http://twemoji.maxcdn.com/36x36/1f425.png"></td><td><img class="emoji" draggable="false" alt="🐦" src="http://twemoji.maxcdn.com/36x36/1f426.png"></td></tr><tr><td><img class="emoji" draggable="false" alt="🐧" src="http://twemoji.maxcdn.com/36x36/1f427.png"></td><td><img class="emoji" draggable="false" alt="🐨" src="http://twemoji.maxcdn.com/36x36/1f428.png"></td><td><img class="emoji" draggable="false" alt="🐩" src="http://twemoji.maxcdn.com/36x36/1f429.png"></td><td><img class="emoji" draggable="false" alt="🐪" src="http://twemoji.maxcdn.com/36x36/1f42a.png"></td><td><img class="emoji" draggable="false" alt="🐫" src="http://twemoji.maxcdn.com/36x36/1f42b.png"></td></tr><tr><td><img class="emoji" draggable="false" alt="🐬" src="http://twemoji.maxcdn.com/36x36/1f42c.png"></td><td><img class="emoji" draggable="false" alt="🐭" src="http://twemoji.maxcdn.com/36x36/1f42d.png"></td><td><img class="emoji" draggable="false" alt="🐮" src="http://twemoji.maxcdn.com/36x36/1f42e.png"></td><td><img class="emoji" draggable="false" alt="🐯" src="http://twemoji.maxcdn.com/36x36/1f42f.png"></td><td><img class="emoji" draggable="false" alt="🐰" src="http://twemoji.maxcdn.com/36x36/1f430.png"></td></tr><tr><td><img class="emoji" draggable="false" alt="🐱" src="http://twemoji.maxcdn.com/36x36/1f431.png"></td><td><img class="emoji" draggable="false" alt="🐲" src="http://twemoji.maxcdn.com/36x36/1f432.png"></td><td><img class="emoji" draggable="false" alt="🐳" src="http://twemoji.maxcdn.com/36x36/1f433.png"></td><td><img class="emoji" draggable="false" alt="🐴" src="http://twemoji.maxcdn.com/36x36/1f434.png"></td><td><img class="emoji" draggable="false" alt="🐵" src="http://twemoji.maxcdn.com/36x36/1f435.png"></td></tr><tr><td><img class="emoji" draggable="false" alt="🐶" src="http://twemoji.maxcdn.com/36x36/1f436.png"></td><td><img class="emoji" draggable="false" alt="🐷" src="http://twemoji.maxcdn.com/36x36/1f437.png"></td><td><img class="emoji" draggable="false" alt="🐸" src="http://twemoji.maxcdn.com/36x36/1f438.png"></td><td><img class="emoji" draggable="false" alt="🐹" src="http://twemoji.maxcdn.com/36x36/1f439.png"></td><td><img class="emoji" draggable="false" alt="🐺" src="http://twemoji.maxcdn.com/36x36/1f43a.png"></td></tr><tr><td><img class="emoji" draggable="false" alt="🐻" src="http://twemoji.maxcdn.com/36x36/1f43b.png"></td><td><img class="emoji" draggable="false" alt="🐼" src="http://twemoji.maxcdn.com/36x36/1f43c.png"></td><td><img class="emoji" draggable="false" alt="🐽" src="http://twemoji.maxcdn.com/36x36/1f43d.png"></td><td><img class="emoji" draggable="false" alt="🐾" src="http://twemoji.maxcdn.com/36x36/1f43e.png"></td><td><img class="emoji" draggable="false" alt="👀" src="http://twemoji.maxcdn.com/36x36/1f440.png"></td></tr><tr><td><img class="emoji" draggable="false" alt="👂" src="http://twemoji.maxcdn.com/36x36/1f442.png"></td><td><img class="emoji" draggable="false" alt="👃" src="http://twemoji.maxcdn.com/36x36/1f443.png"></td><td><img class="emoji" draggable="false" alt="👄" src="http://twemoji.maxcdn.com/36x36/1f444.png"></td><td><img class="emoji" draggable="false" alt="👅" src="http://twemoji.maxcdn.com/36x36/1f445.png"></td><td><img class="emoji" draggable="false" alt="👆" src="http://twemoji.maxcdn.com/36x36/1f446.png"></td></tr><tr><td><img class="emoji" draggable="false" alt="👇" src="http://twemoji.maxcdn.com/36x36/1f447.png"></td><td><img class="emoji" draggable="false" alt="👈" src="http://twemoji.maxcdn.com/36x36/1f448.png"></td><td><img class="emoji" draggable="false" alt="👉" src="http://twemoji.maxcdn.com/36x36/1f449.png"></td><td><img class="emoji" draggable="false" alt="👊" src="http://twemoji.maxcdn.com/36x36/1f44a.png"></td><td><img class="emoji" draggable="false" alt="👋" src="http://twemoji.maxcdn.com/36x36/1f44b.png"></td></tr><tr><td><img class="emoji" draggable="false" alt="👌" src="http://twemoji.maxcdn.com/36x36/1f44c.png"></td><td><img class="emoji" draggable="false" alt="👍" src="http://twemoji.maxcdn.com/36x36/1f44d.png"></td><td><img class="emoji" draggable="false" alt="👎" src="http://twemoji.maxcdn.com/36x36/1f44e.png"></td><td><img class="emoji" draggable="false" alt="👏" src="http://twemoji.maxcdn.com/36x36/1f44f.png"></td><td><img class="emoji" draggable="false" alt="👐" src="http://twemoji.maxcdn.com/36x36/1f450.png"></td></tr><tr><td><img class="emoji" draggable="false" alt="👑" src="http://twemoji.maxcdn.com/36x36/1f451.png"></td><td><img class="emoji" draggable="false" alt="👒" src="http://twemoji.maxcdn.com/36x36/1f452.png"></td><td><img class="emoji" draggable="false" alt="👓" src="http://twemoji.maxcdn.com/36x36/1f453.png"></td><td><img class="emoji" draggable="false" alt="👔" src="http://twemoji.maxcdn.com/36x36/1f454.png"></td><td><img class="emoji" draggable="false" alt="👕" src="http://twemoji.maxcdn.com/36x36/1f455.png"></td></tr><tr><td><img class="emoji" draggable="false" alt="👖" src="http://twemoji.maxcdn.com/36x36/1f456.png"></td><td><img class="emoji" draggable="false" alt="👗" src="http://twemoji.maxcdn.com/36x36/1f457.png"></td><td><img class="emoji" draggable="false" alt="👘" src="http://twemoji.maxcdn.com/36x36/1f458.png"></td><td><img class="emoji" draggable="false" alt="👙" src="http://twemoji.maxcdn.com/36x36/1f459.png"></td><td><img class="emoji" draggable="false" alt="👚" src="http://twemoji.maxcdn.com/36x36/1f45a.png"></td></tr><tr><td><img class="emoji" draggable="false" alt="👛" src="http://twemoji.maxcdn.com/36x36/1f45b.png"></td><td><img class="emoji" draggable="false" alt="👜" src="http://twemoji.maxcdn.com/36x36/1f45c.png"></td><td><img class="emoji" draggable="false" alt="👝" src="http://twemoji.maxcdn.com/36x36/1f45d.png"></td><td><img class="emoji" draggable="false" alt="👞" src="http://twemoji.maxcdn.com/36x36/1f45e.png"></td><td><img class="emoji" draggable="false" alt="👟" src="http://twemoji.maxcdn.com/36x36/1f45f.png"></td></tr><tr><td><img class="emoji" draggable="false" alt="👠" src="http://twemoji.maxcdn.com/36x36/1f460.png"></td><td><img class="emoji" draggable="false" alt="👡" src="http://twemoji.maxcdn.com/36x36/1f461.png"></td><td><img class="emoji" draggable="false" alt="👢" src="http://twemoji.maxcdn.com/36x36/1f462.png"></td><td><img class="emoji" draggable="false" alt="👣" src="http://twemoji.maxcdn.com/36x36/1f463.png"></td><td><img class="emoji" draggable="false" alt="👤" src="http://twemoji.maxcdn.com/36x36/1f464.png"></td></tr><tr><td><img class="emoji" draggable="false" alt="👥" src="http://twemoji.maxcdn.com/36x36/1f465.png"></td><td><img class="emoji" draggable="false" alt="👦" src="http://twemoji.maxcdn.com/36x36/1f466.png"></td><td><img class="emoji" draggable="false" alt="👧" src="http://twemoji.maxcdn.com/36x36/1f467.png"></td><td><img class="emoji" draggable="false" alt="👨" src="http://twemoji.maxcdn.com/36x36/1f468.png"></td><td><img class="emoji" draggable="false" alt="👩" src="http://twemoji.maxcdn.com/36x36/1f469.png"></td></tr><tr><td><img class="emoji" draggable="false" alt="👪" src="http://twemoji.maxcdn.com/36x36/1f46a.png"></td><td><img class="emoji" draggable="false" alt="👫" src="http://twemoji.maxcdn.com/36x36/1f46b.png"></td><td><img class="emoji" draggable="false" alt="👬" src="http://twemoji.maxcdn.com/36x36/1f46c.png"></td><td><img class="emoji" draggable="false" alt="👭" src="http://twemoji.maxcdn.com/36x36/1f46d.png"></td><td><img class="emoji" draggable="false" alt="👮" src="http://twemoji.maxcdn.com/36x36/1f46e.png"></td></tr><tr><td><img class="emoji" draggable="false" alt="👯" src="http://twemoji.maxcdn.com/36x36/1f46f.png"></td><td><img class="emoji" draggable="false" alt="👰" src="http://twemoji.maxcdn.com/36x36/1f470.png"></td><td><img class="emoji" draggable="false" alt="👱" src="http://twemoji.maxcdn.com/36x36/1f471.png"></td><td><img class="emoji" draggable="false" alt="👲" src="http://twemoji.maxcdn.com/36x36/1f472.png"></td><td><img class="emoji" draggable="false" alt="👳" src="http://twemoji.maxcdn.com/36x36/1f473.png"></td></tr><tr><td><img class="emoji" draggable="false" alt="👴" src="http://twemoji.maxcdn.com/36x36/1f474.png"></td><td><img class="emoji" draggable="false" alt="👵" src="http://twemoji.maxcdn.com/36x36/1f475.png"></td><td><img class="emoji" draggable="false" alt="👶" src="http://twemoji.maxcdn.com/36x36/1f476.png"></td><td><img class="emoji" draggable="false" alt="👷" src="http://twemoji.maxcdn.com/36x36/1f477.png"></td><td><img class="emoji" draggable="false" alt="👸" src="http://twemoji.maxcdn.com/36x36/1f478.png"></td></tr><tr><td><img class="emoji" draggable="false" alt="👹" src="http://twemoji.maxcdn.com/36x36/1f479.png"></td><td><img class="emoji" draggable="false" alt="👺" src="http://twemoji.maxcdn.com/36x36/1f47a.png"></td><td><img class="emoji" draggable="false" alt="👻" src="http://twemoji.maxcdn.com/36x36/1f47b.png"></td><td><img class="emoji" draggable="false" alt="👼" src="http://twemoji.maxcdn.com/36x36/1f47c.png"></td><td><img class="emoji" draggable="false" alt="👽" src="http://twemoji.maxcdn.com/36x36/1f47d.png"></td></tr><tr><td><img class="emoji" draggable="false" alt="👾" src="http://twemoji.maxcdn.com/36x36/1f47e.png"></td><td><img class="emoji" draggable="false" alt="👿" src="http://twemoji.maxcdn.com/36x36/1f47f.png"></td><td><img class="emoji" draggable="false" alt="💀" src="http://twemoji.maxcdn.com/36x36/1f480.png"></td><td><img class="emoji" draggable="false" alt="💁" src="http://twemoji.maxcdn.com/36x36/1f481.png"></td><td><img class="emoji" draggable="false" alt="💂" src="http://twemoji.maxcdn.com/36x36/1f482.png"></td></tr><tr><td><img class="emoji" draggable="false" alt="💃" src="http://twemoji.maxcdn.com/36x36/1f483.png"></td><td><img class="emoji" draggable="false" alt="💄" src="http://twemoji.maxcdn.com/36x36/1f484.png"></td><td><img class="emoji" draggable="false" alt="💅" src="http://twemoji.maxcdn.com/36x36/1f485.png"></td><td><img class="emoji" draggable="false" alt="💆" src="http://twemoji.maxcdn.com/36x36/1f486.png"></td><td><img class="emoji" draggable="false" alt="💇" src="http://twemoji.maxcdn.com/36x36/1f487.png"></td></tr><tr><td><img class="emoji" draggable="false" alt="💈" src="http://twemoji.maxcdn.com/36x36/1f488.png"></td><td><img class="emoji" draggable="false" alt="💉" src="http://twemoji.maxcdn.com/36x36/1f489.png"></td><td><img class="emoji" draggable="false" alt="💊" src="http://twemoji.maxcdn.com/36x36/1f48a.png"></td><td><img class="emoji" draggable="false" alt="💋" src="http://twemoji.maxcdn.com/36x36/1f48b.png"></td><td><img class="emoji" draggable="false" alt="💌" src="http://twemoji.maxcdn.com/36x36/1f48c.png"></td></tr><tr><td><img class="emoji" draggable="false" alt="💍" src="http://twemoji.maxcdn.com/36x36/1f48d.png"></td><td><img class="emoji" draggable="false" alt="💎" src="http://twemoji.maxcdn.com/36x36/1f48e.png"></td><td><img class="emoji" draggable="false" alt="💏" src="http://twemoji.maxcdn.com/36x36/1f48f.png"></td><td><img class="emoji" draggable="false" alt="💐" src="http://twemoji.maxcdn.com/36x36/1f490.png"></td><td><img class="emoji" draggable="false" alt="💑" src="http://twemoji.maxcdn.com/36x36/1f491.png"></td></tr><tr><td><img class="emoji" draggable="false" alt="💒" src="http://twemoji.maxcdn.com/36x36/1f492.png"></td><td><img class="emoji" draggable="false" alt="💓" src="http://twemoji.maxcdn.com/36x36/1f493.png"></td><td><img class="emoji" draggable="false" alt="💔" src="http://twemoji.maxcdn.com/36x36/1f494.png"></td><td><img class="emoji" draggable="false" alt="💕" src="http://twemoji.maxcdn.com/36x36/1f495.png"></td><td><img class="emoji" draggable="false" alt="💖" src="http://twemoji.maxcdn.com/36x36/1f496.png"></td></tr><tr><td><img class="emoji" draggable="false" alt="💗" src="http://twemoji.maxcdn.com/36x36/1f497.png"></td><td><img class="emoji" draggable="false" alt="💘" src="http://twemoji.maxcdn.com/36x36/1f498.png"></td><td><img class="emoji" draggable="false" alt="💙" src="http://twemoji.maxcdn.com/36x36/1f499.png"></td><td><img class="emoji" draggable="false" alt="💚" src="http://twemoji.maxcdn.com/36x36/1f49a.png"></td><td><img class="emoji" draggable="false" alt="💛" src="http://twemoji.maxcdn.com/36x36/1f49b.png"></td></tr><tr><td><img class="emoji" draggable="false" alt="💜" src="http://twemoji.maxcdn.com/36x36/1f49c.png"></td><td><img class="emoji" draggable="false" alt="💝" src="http://twemoji.maxcdn.com/36x36/1f49d.png"></td><td><img class="emoji" draggable="false" alt="💞" src="http://twemoji.maxcdn.com/36x36/1f49e.png"></td><td><img class="emoji" draggable="false" alt="💟" src="http://twemoji.maxcdn.com/36x36/1f49f.png"></td><td><img class="emoji" draggable="false" alt="💠" src="http://twemoji.maxcdn.com/36x36/1f4a0.png"></td></tr><tr><td><img class="emoji" draggable="false" alt="💡" src="http://twemoji.maxcdn.com/36x36/1f4a1.png"></td><td><img class="emoji" draggable="false" alt="💢" src="http://twemoji.maxcdn.com/36x36/1f4a2.png"></td><td><img class="emoji" draggable="false" alt="💣" src="http://twemoji.maxcdn.com/36x36/1f4a3.png"></td><td><img class="emoji" draggable="false" alt="💤" src="http://twemoji.maxcdn.com/36x36/1f4a4.png"></td><td><img class="emoji" draggable="false" alt="💥" src="http://twemoji.maxcdn.com/36x36/1f4a5.png"></td></tr><tr><td><img class="emoji" draggable="false" alt="💦" src="http://twemoji.maxcdn.com/36x36/1f4a6.png"></td><td><img class="emoji" draggable="false" alt="💧" src="http://twemoji.maxcdn.com/36x36/1f4a7.png"></td><td><img class="emoji" draggable="false" alt="💨" src="http://twemoji.maxcdn.com/36x36/1f4a8.png"></td><td><img class="emoji" draggable="false" alt="💩" src="http://twemoji.maxcdn.com/36x36/1f4a9.png"></td><td><img class="emoji" draggable="false" alt="💪" src="http://twemoji.maxcdn.com/36x36/1f4aa.png"></td></tr><tr><td><img class="emoji" draggable="false" alt="💫" src="http://twemoji.maxcdn.com/36x36/1f4ab.png"></td><td><img class="emoji" draggable="false" alt="💬" src="http://twemoji.maxcdn.com/36x36/1f4ac.png"></td><td><img class="emoji" draggable="false" alt="💭" src="http://twemoji.maxcdn.com/36x36/1f4ad.png"></td><td><img class="emoji" draggable="false" alt="💮" src="http://twemoji.maxcdn.com/36x36/1f4ae.png"></td><td><img class="emoji" draggable="false" alt="💯" src="http://twemoji.maxcdn.com/36x36/1f4af.png"></td></tr><tr><td><img class="emoji" draggable="false" alt="💰" src="http://twemoji.maxcdn.com/36x36/1f4b0.png"></td><td><img class="emoji" draggable="false" alt="💱" src="http://twemoji.maxcdn.com/36x36/1f4b1.png"></td><td><img class="emoji" draggable="false" alt="💲" src="http://twemoji.maxcdn.com/36x36/1f4b2.png"></td><td><img class="emoji" draggable="false" alt="💳" src="http://twemoji.maxcdn.com/36x36/1f4b3.png"></td><td><img class="emoji" draggable="false" alt="💴" src="http://twemoji.maxcdn.com/36x36/1f4b4.png"></td></tr><tr><td><img class="emoji" draggable="false" alt="💵" src="http://twemoji.maxcdn.com/36x36/1f4b5.png"></td><td><img class="emoji" draggable="false" alt="💶" src="http://twemoji.maxcdn.com/36x36/1f4b6.png"></td><td><img class="emoji" draggable="false" alt="💷" src="http://twemoji.maxcdn.com/36x36/1f4b7.png"></td><td><img class="emoji" draggable="false" alt="💸" src="http://twemoji.maxcdn.com/36x36/1f4b8.png"></td><td><img class="emoji" draggable="false" alt="💹" src="http://twemoji.maxcdn.com/36x36/1f4b9.png"></td></tr><tr><td><img class="emoji" draggable="false" alt="💺" src="http://twemoji.maxcdn.com/36x36/1f4ba.png"></td><td><img class="emoji" draggable="false" alt="💻" src="http://twemoji.maxcdn.com/36x36/1f4bb.png"></td><td><img class="emoji" draggable="false" alt="💼" src="http://twemoji.maxcdn.com/36x36/1f4bc.png"></td><td><img class="emoji" draggable="false" alt="💽" src="http://twemoji.maxcdn.com/36x36/1f4bd.png"></td><td><img class="emoji" draggable="false" alt="💾" src="http://twemoji.maxcdn.com/36x36/1f4be.png"></td></tr><tr><td><img class="emoji" draggable="false" alt="💿" src="http://twemoji.maxcdn.com/36x36/1f4bf.png"></td><td><img class="emoji" draggable="false" alt="📀" src="http://twemoji.maxcdn.com/36x36/1f4c0.png"></td><td><img class="emoji" draggable="false" alt="📁" src="http://twemoji.maxcdn.com/36x36/1f4c1.png"></td><td><img class="emoji" draggable="false" alt="📂" src="http://twemoji.maxcdn.com/36x36/1f4c2.png"></td><td><img class="emoji" draggable="false" alt="📃" src="http://twemoji.maxcdn.com/36x36/1f4c3.png"></td></tr><tr><td><img class="emoji" draggable="false" alt="📄" src="http://twemoji.maxcdn.com/36x36/1f4c4.png"></td><td><img class="emoji" draggable="false" alt="📅" src="http://twemoji.maxcdn.com/36x36/1f4c5.png"></td><td><img class="emoji" draggable="false" alt="📆" src="http://twemoji.maxcdn.com/36x36/1f4c6.png"></td><td><img class="emoji" draggable="false" alt="📇" src="http://twemoji.maxcdn.com/36x36/1f4c7.png"></td><td><img class="emoji" draggable="false" alt="📈" src="http://twemoji.maxcdn.com/36x36/1f4c8.png"></td></tr><tr><td><img class="emoji" draggable="false" alt="📉" src="http://twemoji.maxcdn.com/36x36/1f4c9.png"></td><td><img class="emoji" draggable="false" alt="📊" src="http://twemoji.maxcdn.com/36x36/1f4ca.png"></td><td><img class="emoji" draggable="false" alt="📋" src="http://twemoji.maxcdn.com/36x36/1f4cb.png"></td><td><img class="emoji" draggable="false" alt="📌" src="http://twemoji.maxcdn.com/36x36/1f4cc.png"></td><td><img class="emoji" draggable="false" alt="📍" src="http://twemoji.maxcdn.com/36x36/1f4cd.png"></td></tr><tr><td><img class="emoji" draggable="false" alt="📎" src="http://twemoji.maxcdn.com/36x36/1f4ce.png"></td><td><img class="emoji" draggable="false" alt="📏" src="http://twemoji.maxcdn.com/36x36/1f4cf.png"></td><td><img class="emoji" draggable="false" alt="📐" src="http://twemoji.maxcdn.com/36x36/1f4d0.png"></td><td><img class="emoji" draggable="false" alt="📑" src="http://twemoji.maxcdn.com/36x36/1f4d1.png"></td><td><img class="emoji" draggable="false" alt="📒" src="http://twemoji.maxcdn.com/36x36/1f4d2.png"></td></tr><tr><td><img class="emoji" draggable="false" alt="📓" src="http://twemoji.maxcdn.com/36x36/1f4d3.png"></td><td><img class="emoji" draggable="false" alt="📔" src="http://twemoji.maxcdn.com/36x36/1f4d4.png"></td><td><img class="emoji" draggable="false" alt="📕" src="http://twemoji.maxcdn.com/36x36/1f4d5.png"></td><td><img class="emoji" draggable="false" alt="📖" src="http://twemoji.maxcdn.com/36x36/1f4d6.png"></td><td><img class="emoji" draggable="false" alt="📗" src="http://twemoji.maxcdn.com/36x36/1f4d7.png"></td></tr><tr><td><img class="emoji" draggable="false" alt="📘" src="http://twemoji.maxcdn.com/36x36/1f4d8.png"></td><td><img class="emoji" draggable="false" alt="📙" src="http://twemoji.maxcdn.com/36x36/1f4d9.png"></td><td><img class="emoji" draggable="false" alt="📚" src="http://twemoji.maxcdn.com/36x36/1f4da.png"></td><td><img class="emoji" draggable="false" alt="📛" src="http://twemoji.maxcdn.com/36x36/1f4db.png"></td><td><img class="emoji" draggable="false" alt="📜" src="http://twemoji.maxcdn.com/36x36/1f4dc.png"></td></tr><tr><td><img class="emoji" draggable="false" alt="📝" src="http://twemoji.maxcdn.com/36x36/1f4dd.png"></td><td><img class="emoji" draggable="false" alt="📞" src="http://twemoji.maxcdn.com/36x36/1f4de.png"></td><td><img class="emoji" draggable="false" alt="📟" src="http://twemoji.maxcdn.com/36x36/1f4df.png"></td><td><img class="emoji" draggable="false" alt="📠" src="http://twemoji.maxcdn.com/36x36/1f4e0.png"></td><td><img class="emoji" draggable="false" alt="📡" src="http://twemoji.maxcdn.com/36x36/1f4e1.png"></td></tr><tr><td><img class="emoji" draggable="false" alt="📢" src="http://twemoji.maxcdn.com/36x36/1f4e2.png"></td><td><img class="emoji" draggable="false" alt="📣" src="http://twemoji.maxcdn.com/36x36/1f4e3.png"></td><td><img class="emoji" draggable="false" alt="📤" src="http://twemoji.maxcdn.com/36x36/1f4e4.png"></td><td><img class="emoji" draggable="false" alt="📥" src="http://twemoji.maxcdn.com/36x36/1f4e5.png"></td><td><img class="emoji" draggable="false" alt="📦" src="http://twemoji.maxcdn.com/36x36/1f4e6.png"></td></tr><tr><td><img class="emoji" draggable="false" alt="📧" src="http://twemoji.maxcdn.com/36x36/1f4e7.png"></td><td><img class="emoji" draggable="false" alt="📨" src="http://twemoji.maxcdn.com/36x36/1f4e8.png"></td><td><img class="emoji" draggable="false" alt="📩" src="http://twemoji.maxcdn.com/36x36/1f4e9.png"></td><td><img class="emoji" draggable="false" alt="📪" src="http://twemoji.maxcdn.com/36x36/1f4ea.png"></td><td><img class="emoji" draggable="false" alt="📫" src="http://twemoji.maxcdn.com/36x36/1f4eb.png"></td></tr><tr><td><img class="emoji" draggable="false" alt="📬" src="http://twemoji.maxcdn.com/36x36/1f4ec.png"></td><td><img class="emoji" draggable="false" alt="📭" src="http://twemoji.maxcdn.com/36x36/1f4ed.png"></td><td><img class="emoji" draggable="false" alt="📮" src="http://twemoji.maxcdn.com/36x36/1f4ee.png"></td><td><img class="emoji" draggable="false" alt="📯" src="http://twemoji.maxcdn.com/36x36/1f4ef.png"></td><td><img class="emoji" draggable="false" alt="📰" src="http://twemoji.maxcdn.com/36x36/1f4f0.png"></td></tr><tr><td><img class="emoji" draggable="false" alt="📱" src="http://twemoji.maxcdn.com/36x36/1f4f1.png"></td><td><img class="emoji" draggable="false" alt="📲" src="http://twemoji.maxcdn.com/36x36/1f4f2.png"></td><td><img class="emoji" draggable="false" alt="📳" src="http://twemoji.maxcdn.com/36x36/1f4f3.png"></td><td><img class="emoji" draggable="false" alt="📴" src="http://twemoji.maxcdn.com/36x36/1f4f4.png"></td><td><img class="emoji" draggable="false" alt="📵" src="http://twemoji.maxcdn.com/36x36/1f4f5.png"></td></tr><tr><td><img class="emoji" draggable="false" alt="📶" src="http://twemoji.maxcdn.com/36x36/1f4f6.png"></td><td><img class="emoji" draggable="false" alt="📷" src="http://twemoji.maxcdn.com/36x36/1f4f7.png"></td><td><img class="emoji" draggable="false" alt="📹" src="http://twemoji.maxcdn.com/36x36/1f4f9.png"></td><td><img class="emoji" draggable="false" alt="📺" src="http://twemoji.maxcdn.com/36x36/1f4fa.png"></td><td><img class="emoji" draggable="false" alt="📻" src="http://twemoji.maxcdn.com/36x36/1f4fb.png"></td></tr><tr><td><img class="emoji" draggable="false" alt="📼" src="http://twemoji.maxcdn.com/36x36/1f4fc.png"></td><td><img class="emoji" draggable="false" alt="🔀" src="http://twemoji.maxcdn.com/36x36/1f500.png"></td><td><img class="emoji" draggable="false" alt="🔁" src="http://twemoji.maxcdn.com/36x36/1f501.png"></td><td><img class="emoji" draggable="false" alt="🔂" src="http://twemoji.maxcdn.com/36x36/1f502.png"></td><td><img class="emoji" draggable="false" alt="🔃" src="http://twemoji.maxcdn.com/36x36/1f503.png"></td></tr><tr><td><img class="emoji" draggable="false" alt="🔄" src="http://twemoji.maxcdn.com/36x36/1f504.png"></td><td><img class="emoji" draggable="false" alt="🔅" src="http://twemoji.maxcdn.com/36x36/1f505.png"></td><td><img class="emoji" draggable="false" alt="🔆" src="http://twemoji.maxcdn.com/36x36/1f506.png"></td><td><img class="emoji" draggable="false" alt="🔇" src="http://twemoji.maxcdn.com/36x36/1f507.png"></td><td><img class="emoji" draggable="false" alt="🔈" src="http://twemoji.maxcdn.com/36x36/1f508.png"></td></tr><tr><td><img class="emoji" draggable="false" alt="🔉" src="http://twemoji.maxcdn.com/36x36/1f509.png"></td><td><img class="emoji" draggable="false" alt="🔊" src="http://twemoji.maxcdn.com/36x36/1f50a.png"></td><td><img class="emoji" draggable="false" alt="🔋" src="http://twemoji.maxcdn.com/36x36/1f50b.png"></td><td><img class="emoji" draggable="false" alt="🔌" src="http://twemoji.maxcdn.com/36x36/1f50c.png"></td><td><img class="emoji" draggable="false" alt="🔍" src="http://twemoji.maxcdn.com/36x36/1f50d.png"></td></tr><tr><td><img class="emoji" draggable="false" alt="🔎" src="http://twemoji.maxcdn.com/36x36/1f50e.png"></td><td><img class="emoji" draggable="false" alt="🔏" src="http://twemoji.maxcdn.com/36x36/1f50f.png"></td><td><img class="emoji" draggable="false" alt="🔐" src="http://twemoji.maxcdn.com/36x36/1f510.png"></td><td><img class="emoji" draggable="false" alt="🔑" src="http://twemoji.maxcdn.com/36x36/1f511.png"></td><td><img class="emoji" draggable="false" alt="🔒" src="http://twemoji.maxcdn.com/36x36/1f512.png"></td></tr><tr><td><img class="emoji" draggable="false" alt="🔓" src="http://twemoji.maxcdn.com/36x36/1f513.png"></td><td><img class="emoji" draggable="false" alt="🔔" src="http://twemoji.maxcdn.com/36x36/1f514.png"></td><td><img class="emoji" draggable="false" alt="🔕" src="http://twemoji.maxcdn.com/36x36/1f515.png"></td><td><img class="emoji" draggable="false" alt="🔖" src="http://twemoji.maxcdn.com/36x36/1f516.png"></td><td><img class="emoji" draggable="false" alt="🔗" src="http://twemoji.maxcdn.com/36x36/1f517.png"></td></tr><tr><td><img class="emoji" draggable="false" alt="🔘" src="http://twemoji.maxcdn.com/36x36/1f518.png"></td><td><img class="emoji" draggable="false" alt="🔙" src="http://twemoji.maxcdn.com/36x36/1f519.png"></td><td><img class="emoji" draggable="false" alt="🔚" src="http://twemoji.maxcdn.com/36x36/1f51a.png"></td><td><img class="emoji" draggable="false" alt="🔛" src="http://twemoji.maxcdn.com/36x36/1f51b.png"></td><td><img class="emoji" draggable="false" alt="🔜" src="http://twemoji.maxcdn.com/36x36/1f51c.png"></td></tr><tr><td><img class="emoji" draggable="false" alt="🔝" src="http://twemoji.maxcdn.com/36x36/1f51d.png"></td><td><img class="emoji" draggable="false" alt="🔞" src="http://twemoji.maxcdn.com/36x36/1f51e.png"></td><td><img class="emoji" draggable="false" alt="🔟" src="http://twemoji.maxcdn.com/36x36/1f51f.png"></td><td><img class="emoji" draggable="false" alt="🔠" src="http://twemoji.maxcdn.com/36x36/1f520.png"></td><td><img class="emoji" draggable="false" alt="🔡" src="http://twemoji.maxcdn.com/36x36/1f521.png"></td></tr><tr><td><img class="emoji" draggable="false" alt="🔢" src="http://twemoji.maxcdn.com/36x36/1f522.png"></td><td><img class="emoji" draggable="false" alt="🔣" src="http://twemoji.maxcdn.com/36x36/1f523.png"></td><td><img class="emoji" draggable="false" alt="🔤" src="http://twemoji.maxcdn.com/36x36/1f524.png"></td><td><img class="emoji" draggable="false" alt="🔥" src="http://twemoji.maxcdn.com/36x36/1f525.png"></td><td><img class="emoji" draggable="false" alt="🔦" src="http://twemoji.maxcdn.com/36x36/1f526.png"></td></tr><tr><td><img class="emoji" draggable="false" alt="🔧" src="http://twemoji.maxcdn.com/36x36/1f527.png"></td><td><img class="emoji" draggable="false" alt="🔨" src="http://twemoji.maxcdn.com/36x36/1f528.png"></td><td><img class="emoji" draggable="false" alt="🔩" src="http://twemoji.maxcdn.com/36x36/1f529.png"></td><td><img class="emoji" draggable="false" alt="🔪" src="http://twemoji.maxcdn.com/36x36/1f52a.png"></td><td><img class="emoji" draggable="false" alt="🔫" src="http://twemoji.maxcdn.com/36x36/1f52b.png"></td></tr><tr><td><img class="emoji" draggable="false" alt="🔬" src="http://twemoji.maxcdn.com/36x36/1f52c.png"></td><td><img class="emoji" draggable="false" alt="🔭" src="http://twemoji.maxcdn.com/36x36/1f52d.png"></td><td><img class="emoji" draggable="false" alt="🔮" src="http://twemoji.maxcdn.com/36x36/1f52e.png"></td><td><img class="emoji" draggable="false" alt="🔯" src="http://twemoji.maxcdn.com/36x36/1f52f.png"></td><td><img class="emoji" draggable="false" alt="🔰" src="http://twemoji.maxcdn.com/36x36/1f530.png"></td></tr><tr><td><img class="emoji" draggable="false" alt="🔱" src="http://twemoji.maxcdn.com/36x36/1f531.png"></td><td><img class="emoji" draggable="false" alt="🔲" src="http://twemoji.maxcdn.com/36x36/1f532.png"></td><td><img class="emoji" draggable="false" alt="🔳" src="http://twemoji.maxcdn.com/36x36/1f533.png"></td><td><img class="emoji" draggable="false" alt="🔴" src="http://twemoji.maxcdn.com/36x36/1f534.png"></td><td><img class="emoji" draggable="false" alt="🔵" src="http://twemoji.maxcdn.com/36x36/1f535.png"></td></tr><tr><td><img class="emoji" draggable="false" alt="🔶" src="http://twemoji.maxcdn.com/36x36/1f536.png"></td><td><img class="emoji" draggable="false" alt="🔷" src="http://twemoji.maxcdn.com/36x36/1f537.png"></td><td><img class="emoji" draggable="false" alt="🔸" src="http://twemoji.maxcdn.com/36x36/1f538.png"></td><td><img class="emoji" draggable="false" alt="🔹" src="http://twemoji.maxcdn.com/36x36/1f539.png"></td><td><img class="emoji" draggable="false" alt="🔺" src="http://twemoji.maxcdn.com/36x36/1f53a.png"></td></tr><tr><td><img class="emoji" draggable="false" alt="🔻" src="http://twemoji.maxcdn.com/36x36/1f53b.png"></td><td><img class="emoji" draggable="false" alt="🔼" src="http://twemoji.maxcdn.com/36x36/1f53c.png"></td><td><img class="emoji" draggable="false" alt="🔽" src="http://twemoji.maxcdn.com/36x36/1f53d.png"></td><td><img class="emoji" draggable="false" alt="🕐" src="http://twemoji.maxcdn.com/36x36/1f550.png"></td><td><img class="emoji" draggable="false" alt="🕑" src="http://twemoji.maxcdn.com/36x36/1f551.png"></td></tr><tr><td><img class="emoji" draggable="false" alt="🕒" src="http://twemoji.maxcdn.com/36x36/1f552.png"></td><td><img class="emoji" draggable="false" alt="🕓" src="http://twemoji.maxcdn.com/36x36/1f553.png"></td><td><img class="emoji" draggable="false" alt="🕔" src="http://twemoji.maxcdn.com/36x36/1f554.png"></td><td><img class="emoji" draggable="false" alt="🕕" src="http://twemoji.maxcdn.com/36x36/1f555.png"></td><td><img class="emoji" draggable="false" alt="🕖" src="http://twemoji.maxcdn.com/36x36/1f556.png"></td></tr><tr><td><img class="emoji" draggable="false" alt="🕗" src="http://twemoji.maxcdn.com/36x36/1f557.png"></td><td><img class="emoji" draggable="false" alt="🕘" src="http://twemoji.maxcdn.com/36x36/1f558.png"></td><td><img class="emoji" draggable="false" alt="🕙" src="http://twemoji.maxcdn.com/36x36/1f559.png"></td><td><img class="emoji" draggable="false" alt="🕚" src="http://twemoji.maxcdn.com/36x36/1f55a.png"></td><td><img class="emoji" draggable="false" alt="🕛" src="http://twemoji.maxcdn.com/36x36/1f55b.png"></td></tr><tr><td><img class="emoji" draggable="false" alt="🕜" src="http://twemoji.maxcdn.com/36x36/1f55c.png"></td><td><img class="emoji" draggable="false" alt="🕝" src="http://twemoji.maxcdn.com/36x36/1f55d.png"></td><td><img class="emoji" draggable="false" alt="🕞" src="http://twemoji.maxcdn.com/36x36/1f55e.png"></td><td><img class="emoji" draggable="false" alt="🕟" src="http://twemoji.maxcdn.com/36x36/1f55f.png"></td><td><img class="emoji" draggable="false" alt="🕠" src="http://twemoji.maxcdn.com/36x36/1f560.png"></td></tr><tr><td><img class="emoji" draggable="false" alt="🕡" src="http://twemoji.maxcdn.com/36x36/1f561.png"></td><td><img class="emoji" draggable="false" alt="🕢" src="http://twemoji.maxcdn.com/36x36/1f562.png"></td><td><img class="emoji" draggable="false" alt="🕣" src="http://twemoji.maxcdn.com/36x36/1f563.png"></td><td><img class="emoji" draggable="false" alt="🕤" src="http://twemoji.maxcdn.com/36x36/1f564.png"></td><td><img class="emoji" draggable="false" alt="🕥" src="http://twemoji.maxcdn.com/36x36/1f565.png"></td></tr><tr><td><img class="emoji" draggable="false" alt="🕦" src="http://twemoji.maxcdn.com/36x36/1f566.png"></td><td><img class="emoji" draggable="false" alt="🕧" src="http://twemoji.maxcdn.com/36x36/1f567.png"></td><td><img class="emoji" draggable="false" alt="🗻" src="http://twemoji.maxcdn.com/36x36/1f5fb.png"></td><td><img class="emoji" draggable="false" alt="🗼" src="http://twemoji.maxcdn.com/36x36/1f5fc.png"></td><td><img class="emoji" draggable="false" alt="🗽" src="http://twemoji.maxcdn.com/36x36/1f5fd.png"></td></tr><tr><td><img class="emoji" draggable="false" alt="🗾" src="http://twemoji.maxcdn.com/36x36/1f5fe.png"></td><td><img class="emoji" draggable="false" alt="🗿" src="http://twemoji.maxcdn.com/36x36/1f5ff.png"></td><td><img class="emoji" draggable="false" alt="😀" src="http://twemoji.maxcdn.com/36x36/1f600.png"></td><td><img class="emoji" draggable="false" alt="😁" src="http://twemoji.maxcdn.com/36x36/1f601.png"></td><td><img class="emoji" draggable="false" alt="😂" src="http://twemoji.maxcdn.com/36x36/1f602.png"></td></tr><tr><td><img class="emoji" draggable="false" alt="😃" src="http://twemoji.maxcdn.com/36x36/1f603.png"></td><td><img class="emoji" draggable="false" alt="😄" src="http://twemoji.maxcdn.com/36x36/1f604.png"></td><td><img class="emoji" draggable="false" alt="😅" src="http://twemoji.maxcdn.com/36x36/1f605.png"></td><td><img class="emoji" draggable="false" alt="😆" src="http://twemoji.maxcdn.com/36x36/1f606.png"></td><td><img class="emoji" draggable="false" alt="😇" src="http://twemoji.maxcdn.com/36x36/1f607.png"></td></tr><tr><td><img class="emoji" draggable="false" alt="😈" src="http://twemoji.maxcdn.com/36x36/1f608.png"></td><td><img class="emoji" draggable="false" alt="😉" src="http://twemoji.maxcdn.com/36x36/1f609.png"></td><td><img class="emoji" draggable="false" alt="😊" src="http://twemoji.maxcdn.com/36x36/1f60a.png"></td><td><img class="emoji" draggable="false" alt="😋" src="http://twemoji.maxcdn.com/36x36/1f60b.png"></td><td><img class="emoji" draggable="false" alt="😌" src="http://twemoji.maxcdn.com/36x36/1f60c.png"></td></tr><tr><td><img class="emoji" draggable="false" alt="😍" src="http://twemoji.maxcdn.com/36x36/1f60d.png"></td><td><img class="emoji" draggable="false" alt="😎" src="http://twemoji.maxcdn.com/36x36/1f60e.png"></td><td><img class="emoji" draggable="false" alt="😏" src="http://twemoji.maxcdn.com/36x36/1f60f.png"></td><td><img class="emoji" draggable="false" alt="😐" src="http://twemoji.maxcdn.com/36x36/1f610.png"></td><td><img class="emoji" draggable="false" alt="😑" src="http://twemoji.maxcdn.com/36x36/1f611.png"></td></tr><tr><td><img class="emoji" draggable="false" alt="😒" src="http://twemoji.maxcdn.com/36x36/1f612.png"></td><td><img class="emoji" draggable="false" alt="😓" src="http://twemoji.maxcdn.com/36x36/1f613.png"></td><td><img class="emoji" draggable="false" alt="😔" src="http://twemoji.maxcdn.com/36x36/1f614.png"></td><td><img class="emoji" draggable="false" alt="😕" src="http://twemoji.maxcdn.com/36x36/1f615.png"></td><td><img class="emoji" draggable="false" alt="😖" src="http://twemoji.maxcdn.com/36x36/1f616.png"></td></tr><tr><td><img class="emoji" draggable="false" alt="😗" src="http://twemoji.maxcdn.com/36x36/1f617.png"></td><td><img class="emoji" draggable="false" alt="😘" src="http://twemoji.maxcdn.com/36x36/1f618.png"></td><td><img class="emoji" draggable="false" alt="😙" src="http://twemoji.maxcdn.com/36x36/1f619.png"></td><td><img class="emoji" draggable="false" alt="😚" src="http://twemoji.maxcdn.com/36x36/1f61a.png"></td><td><img class="emoji" draggable="false" alt="😛" src="http://twemoji.maxcdn.com/36x36/1f61b.png"></td></tr><tr><td><img class="emoji" draggable="false" alt="😜" src="http://twemoji.maxcdn.com/36x36/1f61c.png"></td><td><img class="emoji" draggable="false" alt="😝" src="http://twemoji.maxcdn.com/36x36/1f61d.png"></td><td><img class="emoji" draggable="false" alt="😞" src="http://twemoji.maxcdn.com/36x36/1f61e.png"></td><td><img class="emoji" draggable="false" alt="😟" src="http://twemoji.maxcdn.com/36x36/1f61f.png"></td><td><img class="emoji" draggable="false" alt="😠" src="http://twemoji.maxcdn.com/36x36/1f620.png"></td></tr><tr><td><img class="emoji" draggable="false" alt="😡" src="http://twemoji.maxcdn.com/36x36/1f621.png"></td><td><img class="emoji" draggable="false" alt="😢" src="http://twemoji.maxcdn.com/36x36/1f622.png"></td><td><img class="emoji" draggable="false" alt="😣" src="http://twemoji.maxcdn.com/36x36/1f623.png"></td><td><img class="emoji" draggable="false" alt="😤" src="http://twemoji.maxcdn.com/36x36/1f624.png"></td><td><img class="emoji" draggable="false" alt="😥" src="http://twemoji.maxcdn.com/36x36/1f625.png"></td></tr><tr><td><img class="emoji" draggable="false" alt="😦" src="http://twemoji.maxcdn.com/36x36/1f626.png"></td><td><img class="emoji" draggable="false" alt="😧" src="http://twemoji.maxcdn.com/36x36/1f627.png"></td><td><img class="emoji" draggable="false" alt="😨" src="http://twemoji.maxcdn.com/36x36/1f628.png"></td><td><img class="emoji" draggable="false" alt="😩" src="http://twemoji.maxcdn.com/36x36/1f629.png"></td><td><img class="emoji" draggable="false" alt="😪" src="http://twemoji.maxcdn.com/36x36/1f62a.png"></td></tr><tr><td><img class="emoji" draggable="false" alt="😫" src="http://twemoji.maxcdn.com/36x36/1f62b.png"></td><td><img class="emoji" draggable="false" alt="😬" src="http://twemoji.maxcdn.com/36x36/1f62c.png"></td><td><img class="emoji" draggable="false" alt="😭" src="http://twemoji.maxcdn.com/36x36/1f62d.png"></td><td><img class="emoji" draggable="false" alt="😮" src="http://twemoji.maxcdn.com/36x36/1f62e.png"></td><td><img class="emoji" draggable="false" alt="😯" src="http://twemoji.maxcdn.com/36x36/1f62f.png"></td></tr><tr><td><img class="emoji" draggable="false" alt="😰" src="http://twemoji.maxcdn.com/36x36/1f630.png"></td><td><img class="emoji" draggable="false" alt="😱" src="http://twemoji.maxcdn.com/36x36/1f631.png"></td><td><img class="emoji" draggable="false" alt="😲" src="http://twemoji.maxcdn.com/36x36/1f632.png"></td><td><img class="emoji" draggable="false" alt="😳" src="http://twemoji.maxcdn.com/36x36/1f633.png"></td><td><img class="emoji" draggable="false" alt="😴" src="http://twemoji.maxcdn.com/36x36/1f634.png"></td></tr><tr><td><img class="emoji" draggable="false" alt="😵" src="http://twemoji.maxcdn.com/36x36/1f635.png"></td><td><img class="emoji" draggable="false" alt="😶" src="http://twemoji.maxcdn.com/36x36/1f636.png"></td><td><img class="emoji" draggable="false" alt="😷" src="http://twemoji.maxcdn.com/36x36/1f637.png"></td><td><img class="emoji" draggable="false" alt="😸" src="http://twemoji.maxcdn.com/36x36/1f638.png"></td><td><img class="emoji" draggable="false" alt="😹" src="http://twemoji.maxcdn.com/36x36/1f639.png"></td></tr><tr><td><img class="emoji" draggable="false" alt="😺" src="http://twemoji.maxcdn.com/36x36/1f63a.png"></td><td><img class="emoji" draggable="false" alt="😻" src="http://twemoji.maxcdn.com/36x36/1f63b.png"></td><td><img class="emoji" draggable="false" alt="😼" src="http://twemoji.maxcdn.com/36x36/1f63c.png"></td><td><img class="emoji" draggable="false" alt="😽" src="http://twemoji.maxcdn.com/36x36/1f63d.png"></td><td><img class="emoji" draggable="false" alt="😾" src="http://twemoji.maxcdn.com/36x36/1f63e.png"></td></tr><tr><td><img class="emoji" draggable="false" alt="😿" src="http://twemoji.maxcdn.com/36x36/1f63f.png"></td><td><img class="emoji" draggable="false" alt="🙀" src="http://twemoji.maxcdn.com/36x36/1f640.png"></td><td><img class="emoji" draggable="false" alt="🙅" src="http://twemoji.maxcdn.com/36x36/1f645.png"></td><td><img class="emoji" draggable="false" alt="🙆" src="http://twemoji.maxcdn.com/36x36/1f646.png"></td><td><img class="emoji" draggable="false" alt="🙇" src="http://twemoji.maxcdn.com/36x36/1f647.png"></td></tr><tr><td><img class="emoji" draggable="false" alt="🙈" src="http://twemoji.maxcdn.com/36x36/1f648.png"></td><td><img class="emoji" draggable="false" alt="🙉" src="http://twemoji.maxcdn.com/36x36/1f649.png"></td><td><img class="emoji" draggable="false" alt="🙊" src="http://twemoji.maxcdn.com/36x36/1f64a.png"></td><td><img class="emoji" draggable="false" alt="🙋" src="http://twemoji.maxcdn.com/36x36/1f64b.png"></td><td><img class="emoji" draggable="false" alt="🙌" src="http://twemoji.maxcdn.com/36x36/1f64c.png"></td></tr><tr><td><img class="emoji" draggable="false" alt="🙍" src="http://twemoji.maxcdn.com/36x36/1f64d.png"></td><td><img class="emoji" draggable="false" alt="🙎" src="http://twemoji.maxcdn.com/36x36/1f64e.png"></td><td><img class="emoji" draggable="false" alt="🙏" src="http://twemoji.maxcdn.com/36x36/1f64f.png"></td><td><img class="emoji" draggable="false" alt="🚀" src="http://twemoji.maxcdn.com/36x36/1f680.png"></td><td><img class="emoji" draggable="false" alt="🚁" src="http://twemoji.maxcdn.com/36x36/1f681.png"></td></tr><tr><td><img class="emoji" draggable="false" alt="🚂" src="http://twemoji.maxcdn.com/36x36/1f682.png"></td><td><img class="emoji" draggable="false" alt="🚃" src="http://twemoji.maxcdn.com/36x36/1f683.png"></td><td><img class="emoji" draggable="false" alt="🚄" src="http://twemoji.maxcdn.com/36x36/1f684.png"></td><td><img class="emoji" draggable="false" alt="🚅" src="http://twemoji.maxcdn.com/36x36/1f685.png"></td><td><img class="emoji" draggable="false" alt="🚆" src="http://twemoji.maxcdn.com/36x36/1f686.png"></td></tr><tr><td><img class="emoji" draggable="false" alt="🚇" src="http://twemoji.maxcdn.com/36x36/1f687.png"></td><td><img class="emoji" draggable="false" alt="🚈" src="http://twemoji.maxcdn.com/36x36/1f688.png"></td><td><img class="emoji" draggable="false" alt="🚉" src="http://twemoji.maxcdn.com/36x36/1f689.png"></td><td><img class="emoji" draggable="false" alt="🚊" src="http://twemoji.maxcdn.com/36x36/1f68a.png"></td><td><img class="emoji" draggable="false" alt="🚋" src="http://twemoji.maxcdn.com/36x36/1f68b.png"></td></tr><tr><td><img class="emoji" draggable="false" alt="🚌" src="http://twemoji.maxcdn.com/36x36/1f68c.png"></td><td><img class="emoji" draggable="false" alt="🚍" src="http://twemoji.maxcdn.com/36x36/1f68d.png"></td><td><img class="emoji" draggable="false" alt="🚎" src="http://twemoji.maxcdn.com/36x36/1f68e.png"></td><td><img class="emoji" draggable="false" alt="🚏" src="http://twemoji.maxcdn.com/36x36/1f68f.png"></td><td><img class="emoji" draggable="false" alt="🚐" src="http://twemoji.maxcdn.com/36x36/1f690.png"></td></tr><tr><td><img class="emoji" draggable="false" alt="🚑" src="http://twemoji.maxcdn.com/36x36/1f691.png"></td><td><img class="emoji" draggable="false" alt="🚒" src="http://twemoji.maxcdn.com/36x36/1f692.png"></td><td><img class="emoji" draggable="false" alt="🚓" src="http://twemoji.maxcdn.com/36x36/1f693.png"></td><td><img class="emoji" draggable="false" alt="🚔" src="http://twemoji.maxcdn.com/36x36/1f694.png"></td><td><img class="emoji" draggable="false" alt="🚕" src="http://twemoji.maxcdn.com/36x36/1f695.png"></td></tr><tr><td><img class="emoji" draggable="false" alt="🚖" src="http://twemoji.maxcdn.com/36x36/1f696.png"></td><td><img class="emoji" draggable="false" alt="🚗" src="http://twemoji.maxcdn.com/36x36/1f697.png"></td><td><img class="emoji" draggable="false" alt="🚘" src="http://twemoji.maxcdn.com/36x36/1f698.png"></td><td><img class="emoji" draggable="false" alt="🚙" src="http://twemoji.maxcdn.com/36x36/1f699.png"></td><td><img class="emoji" draggable="false" alt="🚚" src="http://twemoji.maxcdn.com/36x36/1f69a.png"></td></tr><tr><td><img class="emoji" draggable="false" alt="🚛" src="http://twemoji.maxcdn.com/36x36/1f69b.png"></td><td><img class="emoji" draggable="false" alt="🚜" src="http://twemoji.maxcdn.com/36x36/1f69c.png"></td><td><img class="emoji" draggable="false" alt="🚝" src="http://twemoji.maxcdn.com/36x36/1f69d.png"></td><td><img class="emoji" draggable="false" alt="🚞" src="http://twemoji.maxcdn.com/36x36/1f69e.png"></td><td><img class="emoji" draggable="false" alt="🚟" src="http://twemoji.maxcdn.com/36x36/1f69f.png"></td></tr><tr><td><img class="emoji" draggable="false" alt="🚠" src="http://twemoji.maxcdn.com/36x36/1f6a0.png"></td><td><img class="emoji" draggable="false" alt="🚡" src="http://twemoji.maxcdn.com/36x36/1f6a1.png"></td><td><img class="emoji" draggable="false" alt="🚢" src="http://twemoji.maxcdn.com/36x36/1f6a2.png"></td><td><img class="emoji" draggable="false" alt="🚣" src="http://twemoji.maxcdn.com/36x36/1f6a3.png"></td><td><img class="emoji" draggable="false" alt="🚤" src="http://twemoji.maxcdn.com/36x36/1f6a4.png"></td></tr><tr><td><img class="emoji" draggable="false" alt="🚥" src="http://twemoji.maxcdn.com/36x36/1f6a5.png"></td><td><img class="emoji" draggable="false" alt="🚦" src="http://twemoji.maxcdn.com/36x36/1f6a6.png"></td><td><img class="emoji" draggable="false" alt="🚧" src="http://twemoji.maxcdn.com/36x36/1f6a7.png"></td><td><img class="emoji" draggable="false" alt="🚨" src="http://twemoji.maxcdn.com/36x36/1f6a8.png"></td><td><img class="emoji" draggable="false" alt="🚩" src="http://twemoji.maxcdn.com/36x36/1f6a9.png"></td></tr><tr><td><img class="emoji" draggable="false" alt="🚪" src="http://twemoji.maxcdn.com/36x36/1f6aa.png"></td><td><img class="emoji" draggable="false" alt="🚫" src="http://twemoji.maxcdn.com/36x36/1f6ab.png"></td><td><img class="emoji" draggable="false" alt="🚬" src="http://twemoji.maxcdn.com/36x36/1f6ac.png"></td><td><img class="emoji" draggable="false" alt="🚭" src="http://twemoji.maxcdn.com/36x36/1f6ad.png"></td><td><img class="emoji" draggable="false" alt="🚮" src="http://twemoji.maxcdn.com/36x36/1f6ae.png"></td></tr><tr><td><img class="emoji" draggable="false" alt="🚯" src="http://twemoji.maxcdn.com/36x36/1f6af.png"></td><td><img class="emoji" draggable="false" alt="🚰" src="http://twemoji.maxcdn.com/36x36/1f6b0.png"></td><td><img class="emoji" draggable="false" alt="🚱" src="http://twemoji.maxcdn.com/36x36/1f6b1.png"></td><td><img class="emoji" draggable="false" alt="🚲" src="http://twemoji.maxcdn.com/36x36/1f6b2.png"></td><td><img class="emoji" draggable="false" alt="🚳" src="http://twemoji.maxcdn.com/36x36/1f6b3.png"></td></tr><tr><td><img class="emoji" draggable="false" alt="🚴" src="http://twemoji.maxcdn.com/36x36/1f6b4.png"></td><td><img class="emoji" draggable="false" alt="🚵" src="http://twemoji.maxcdn.com/36x36/1f6b5.png"></td><td><img class="emoji" draggable="false" alt="🚶" src="http://twemoji.maxcdn.com/36x36/1f6b6.png"></td><td><img class="emoji" draggable="false" alt="🚷" src="http://twemoji.maxcdn.com/36x36/1f6b7.png"></td><td><img class="emoji" draggable="false" alt="🚸" src="http://twemoji.maxcdn.com/36x36/1f6b8.png"></td></tr><tr><td><img class="emoji" draggable="false" alt="🚹" src="http://twemoji.maxcdn.com/36x36/1f6b9.png"></td><td><img class="emoji" draggable="false" alt="🚺" src="http://twemoji.maxcdn.com/36x36/1f6ba.png"></td><td><img class="emoji" draggable="false" alt="🚻" src="http://twemoji.maxcdn.com/36x36/1f6bb.png"></td><td><img class="emoji" draggable="false" alt="🚼" src="http://twemoji.maxcdn.com/36x36/1f6bc.png"></td><td><img class="emoji" draggable="false" alt="🚽" src="http://twemoji.maxcdn.com/36x36/1f6bd.png"></td></tr><tr><td><img class="emoji" draggable="false" alt="🚾" src="http://twemoji.maxcdn.com/36x36/1f6be.png"></td><td><img class="emoji" draggable="false" alt="🚿" src="http://twemoji.maxcdn.com/36x36/1f6bf.png"></td><td><img class="emoji" draggable="false" alt="🛀" src="http://twemoji.maxcdn.com/36x36/1f6c0.png"></td><td><img class="emoji" draggable="false" alt="🛁" src="http://twemoji.maxcdn.com/36x36/1f6c1.png"></td><td><img class="emoji" draggable="false" alt="🛂" src="http://twemoji.maxcdn.com/36x36/1f6c2.png"></td></tr><tr><td><img class="emoji" draggable="false" alt="🛃" src="http://twemoji.maxcdn.com/36x36/1f6c3.png"></td><td><img class="emoji" draggable="false" alt="🛄" src="http://twemoji.maxcdn.com/36x36/1f6c4.png"></td><td><img class="emoji" draggable="false" alt="🛅" src="http://twemoji.maxcdn.com/36x36/1f6c5.png"></td><td><img class="emoji" draggable="false" alt="‼" src="http://twemoji.maxcdn.com/36x36/203c.png"></td><td><img class="emoji" draggable="false" alt="⁉" src="http://twemoji.maxcdn.com/36x36/2049.png"></td></tr><tr><td><img class="emoji" draggable="false" alt="™" src="http://twemoji.maxcdn.com/36x36/2122.png"></td><td><img class="emoji" draggable="false" alt="ℹ" src="http://twemoji.maxcdn.com/36x36/2139.png"></td><td><img class="emoji" draggable="false" alt="↔" src="http://twemoji.maxcdn.com/36x36/2194.png"></td><td><img class="emoji" draggable="false" alt="↕" src="http://twemoji.maxcdn.com/36x36/2195.png"></td><td><img class="emoji" draggable="false" alt="↖" src="http://twemoji.maxcdn.com/36x36/2196.png"></td></tr><tr><td><img class="emoji" draggable="false" alt="↗" src="http://twemoji.maxcdn.com/36x36/2197.png"></td><td><img class="emoji" draggable="false" alt="↘" src="http://twemoji.maxcdn.com/36x36/2198.png"></td><td><img class="emoji" draggable="false" alt="↙" src="http://twemoji.maxcdn.com/36x36/2199.png"></td><td><img class="emoji" draggable="false" alt="↩" src="http://twemoji.maxcdn.com/36x36/21a9.png"></td><td><img class="emoji" draggable="false" alt="↪" src="http://twemoji.maxcdn.com/36x36/21aa.png"></td></tr><tr><td><img class="emoji" draggable="false" alt="#⃣" src="http://twemoji.maxcdn.com/36x36/23-20e3.png"></td><td><img class="emoji" draggable="false" alt="⌚" src="http://twemoji.maxcdn.com/36x36/231a.png"></td><td><img class="emoji" draggable="false" alt="⌛" src="http://twemoji.maxcdn.com/36x36/231b.png"></td><td><img class="emoji" draggable="false" alt="⏩" src="http://twemoji.maxcdn.com/36x36/23e9.png"></td><td><img class="emoji" draggable="false" alt="⏪" src="http://twemoji.maxcdn.com/36x36/23ea.png"></td></tr><tr><td><img class="emoji" draggable="false" alt="⏫" src="http://twemoji.maxcdn.com/36x36/23eb.png"></td><td><img class="emoji" draggable="false" alt="⏬" src="http://twemoji.maxcdn.com/36x36/23ec.png"></td><td><img class="emoji" draggable="false" alt="⏰" src="http://twemoji.maxcdn.com/36x36/23f0.png"></td><td><img class="emoji" draggable="false" alt="⏳" src="http://twemoji.maxcdn.com/36x36/23f3.png"></td><td><img class="emoji" draggable="false" alt="Ⓜ" src="http://twemoji.maxcdn.com/36x36/24c2.png"></td></tr><tr><td><img class="emoji" draggable="false" alt="▪" src="http://twemoji.maxcdn.com/36x36/25aa.png"></td><td><img class="emoji" draggable="false" alt="▫" src="http://twemoji.maxcdn.com/36x36/25ab.png"></td><td><img class="emoji" draggable="false" alt="▶" src="http://twemoji.maxcdn.com/36x36/25b6.png"></td><td><img class="emoji" draggable="false" alt="◀" src="http://twemoji.maxcdn.com/36x36/25c0.png"></td><td><img class="emoji" draggable="false" alt="◻" src="http://twemoji.maxcdn.com/36x36/25fb.png"></td></tr><tr><td><img class="emoji" draggable="false" alt="◼" src="http://twemoji.maxcdn.com/36x36/25fc.png"></td><td><img class="emoji" draggable="false" alt="◽" src="http://twemoji.maxcdn.com/36x36/25fd.png"></td><td><img class="emoji" draggable="false" alt="◾" src="http://twemoji.maxcdn.com/36x36/25fe.png"></td><td><img class="emoji" draggable="false" alt="☀" src="http://twemoji.maxcdn.com/36x36/2600.png"></td><td><img class="emoji" draggable="false" alt="☁" src="http://twemoji.maxcdn.com/36x36/2601.png"></td></tr><tr><td><img class="emoji" draggable="false" alt="☎" src="http://twemoji.maxcdn.com/36x36/260e.png"></td><td><img class="emoji" draggable="false" alt="☑" src="http://twemoji.maxcdn.com/36x36/2611.png"></td><td><img class="emoji" draggable="false" alt="☔" src="http://twemoji.maxcdn.com/36x36/2614.png"></td><td><img class="emoji" draggable="false" alt="☕" src="http://twemoji.maxcdn.com/36x36/2615.png"></td><td><img class="emoji" draggable="false" alt="☝" src="http://twemoji.maxcdn.com/36x36/261d.png"></td></tr><tr><td><img class="emoji" draggable="false" alt="☺" src="http://twemoji.maxcdn.com/36x36/263a.png"></td><td><img class="emoji" draggable="false" alt="♈" src="http://twemoji.maxcdn.com/36x36/2648.png"></td><td><img class="emoji" draggable="false" alt="♉" src="http://twemoji.maxcdn.com/36x36/2649.png"></td><td><img class="emoji" draggable="false" alt="♊" src="http://twemoji.maxcdn.com/36x36/264a.png"></td><td><img class="emoji" draggable="false" alt="♋" src="http://twemoji.maxcdn.com/36x36/264b.png"></td></tr><tr><td><img class="emoji" draggable="false" alt="♌" src="http://twemoji.maxcdn.com/36x36/264c.png"></td><td><img class="emoji" draggable="false" alt="♍" src="http://twemoji.maxcdn.com/36x36/264d.png"></td><td><img class="emoji" draggable="false" alt="♎" src="http://twemoji.maxcdn.com/36x36/264e.png"></td><td><img class="emoji" draggable="false" alt="♏" src="http://twemoji.maxcdn.com/36x36/264f.png"></td><td><img class="emoji" draggable="false" alt="♐" src="http://twemoji.maxcdn.com/36x36/2650.png"></td></tr><tr><td><img class="emoji" draggable="false" alt="♑" src="http://twemoji.maxcdn.com/36x36/2651.png"></td><td><img class="emoji" draggable="false" alt="♒" src="http://twemoji.maxcdn.com/36x36/2652.png"></td><td><img class="emoji" draggable="false" alt="♓" src="http://twemoji.maxcdn.com/36x36/2653.png"></td><td><img class="emoji" draggable="false" alt="♠" src="http://twemoji.maxcdn.com/36x36/2660.png"></td><td><img class="emoji" draggable="false" alt="♣" src="http://twemoji.maxcdn.com/36x36/2663.png"></td></tr><tr><td><img class="emoji" draggable="false" alt="♥" src="http://twemoji.maxcdn.com/36x36/2665.png"></td><td><img class="emoji" draggable="false" alt="♦" src="http://twemoji.maxcdn.com/36x36/2666.png"></td><td><img class="emoji" draggable="false" alt="♨" src="http://twemoji.maxcdn.com/36x36/2668.png"></td><td><img class="emoji" draggable="false" alt="♻" src="http://twemoji.maxcdn.com/36x36/267b.png"></td><td><img class="emoji" draggable="false" alt="♿" src="http://twemoji.maxcdn.com/36x36/267f.png"></td></tr><tr><td><img class="emoji" draggable="false" alt="⚓" src="http://twemoji.maxcdn.com/36x36/2693.png"></td><td><img class="emoji" draggable="false" alt="⚠" src="http://twemoji.maxcdn.com/36x36/26a0.png"></td><td><img class="emoji" draggable="false" alt="⚡" src="http://twemoji.maxcdn.com/36x36/26a1.png"></td><td><img class="emoji" draggable="false" alt="⚪" src="http://twemoji.maxcdn.com/36x36/26aa.png"></td><td><img class="emoji" draggable="false" alt="⚫" src="http://twemoji.maxcdn.com/36x36/26ab.png"></td></tr><tr><td><img class="emoji" draggable="false" alt="⚽" src="http://twemoji.maxcdn.com/36x36/26bd.png"></td><td><img class="emoji" draggable="false" alt="⚾" src="http://twemoji.maxcdn.com/36x36/26be.png"></td><td><img class="emoji" draggable="false" alt="⛄" src="http://twemoji.maxcdn.com/36x36/26c4.png"></td><td><img class="emoji" draggable="false" alt="⛅" src="http://twemoji.maxcdn.com/36x36/26c5.png"></td><td><img class="emoji" draggable="false" alt="⛎" src="http://twemoji.maxcdn.com/36x36/26ce.png"></td></tr><tr><td><img class="emoji" draggable="false" alt="⛔" src="http://twemoji.maxcdn.com/36x36/26d4.png"></td><td><img class="emoji" draggable="false" alt="⛪" src="http://twemoji.maxcdn.com/36x36/26ea.png"></td><td><img class="emoji" draggable="false" alt="⛲" src="http://twemoji.maxcdn.com/36x36/26f2.png"></td><td><img class="emoji" draggable="false" alt="⛳" src="http://twemoji.maxcdn.com/36x36/26f3.png"></td><td><img class="emoji" draggable="false" alt="⛵" src="http://twemoji.maxcdn.com/36x36/26f5.png"></td></tr><tr><td><img class="emoji" draggable="false" alt="⛺" src="http://twemoji.maxcdn.com/36x36/26fa.png"></td><td><img class="emoji" draggable="false" alt="⛽" src="http://twemoji.maxcdn.com/36x36/26fd.png"></td><td><img class="emoji" draggable="false" alt="✂" src="http://twemoji.maxcdn.com/36x36/2702.png"></td><td><img class="emoji" draggable="false" alt="✅" src="http://twemoji.maxcdn.com/36x36/2705.png"></td><td><img class="emoji" draggable="false" alt="✈" src="http://twemoji.maxcdn.com/36x36/2708.png"></td></tr><tr><td><img class="emoji" draggable="false" alt="✉" src="http://twemoji.maxcdn.com/36x36/2709.png"></td><td><img class="emoji" draggable="false" alt="✊" src="http://twemoji.maxcdn.com/36x36/270a.png"></td><td><img class="emoji" draggable="false" alt="✋" src="http://twemoji.maxcdn.com/36x36/270b.png"></td><td><img class="emoji" draggable="false" alt="✌" src="http://twemoji.maxcdn.com/36x36/270c.png"></td><td><img class="emoji" draggable="false" alt="✏" src="http://twemoji.maxcdn.com/36x36/270f.png"></td></tr><tr><td><img class="emoji" draggable="false" alt="✒" src="http://twemoji.maxcdn.com/36x36/2712.png"></td><td><img class="emoji" draggable="false" alt="✔" src="http://twemoji.maxcdn.com/36x36/2714.png"></td><td><img class="emoji" draggable="false" alt="✖" src="http://twemoji.maxcdn.com/36x36/2716.png"></td><td><img class="emoji" draggable="false" alt="✨" src="http://twemoji.maxcdn.com/36x36/2728.png"></td><td><img class="emoji" draggable="false" alt="✳" src="http://twemoji.maxcdn.com/36x36/2733.png"></td></tr><tr><td><img class="emoji" draggable="false" alt="✴" src="http://twemoji.maxcdn.com/36x36/2734.png"></td><td><img class="emoji" draggable="false" alt="❄" src="http://twemoji.maxcdn.com/36x36/2744.png"></td><td><img class="emoji" draggable="false" alt="❇" src="http://twemoji.maxcdn.com/36x36/2747.png"></td><td><img class="emoji" draggable="false" alt="❌" src="http://twemoji.maxcdn.com/36x36/274c.png"></td><td><img class="emoji" draggable="false" alt="❎" src="http://twemoji.maxcdn.com/36x36/274e.png"></td></tr><tr><td><img class="emoji" draggable="false" alt="❓" src="http://twemoji.maxcdn.com/36x36/2753.png"></td><td><img class="emoji" draggable="false" alt="❔" src="http://twemoji.maxcdn.com/36x36/2754.png"></td><td><img class="emoji" draggable="false" alt="❕" src="http://twemoji.maxcdn.com/36x36/2755.png"></td><td><img class="emoji" draggable="false" alt="❗" src="http://twemoji.maxcdn.com/36x36/2757.png"></td><td><img class="emoji" draggable="false" alt="❤" src="http://twemoji.maxcdn.com/36x36/2764.png"></td></tr><tr><td><img class="emoji" draggable="false" alt="➕" src="http://twemoji.maxcdn.com/36x36/2795.png"></td><td><img class="emoji" draggable="false" alt="➖" src="http://twemoji.maxcdn.com/36x36/2796.png"></td><td><img class="emoji" draggable="false" alt="➗" src="http://twemoji.maxcdn.com/36x36/2797.png"></td><td><img class="emoji" draggable="false" alt="➡" src="http://twemoji.maxcdn.com/36x36/27a1.png"></td><td><img class="emoji" draggable="false" alt="➰" src="http://twemoji.maxcdn.com/36x36/27b0.png"></td></tr><tr><td><img class="emoji" draggable="false" alt="➿" src="http://twemoji.maxcdn.com/36x36/27bf.png"></td><td><img class="emoji" draggable="false" alt="⤴" src="http://twemoji.maxcdn.com/36x36/2934.png"></td><td><img class="emoji" draggable="false" alt="⤵" src="http://twemoji.maxcdn.com/36x36/2935.png"></td><td><img class="emoji" draggable="false" alt="⬅" src="http://twemoji.maxcdn.com/36x36/2b05.png"></td><td><img class="emoji" draggable="false" alt="⬆" src="http://twemoji.maxcdn.com/36x36/2b06.png"></td></tr><tr><td><img class="emoji" draggable="false" alt="⬇" src="http://twemoji.maxcdn.com/36x36/2b07.png"></td><td><img class="emoji" draggable="false" alt="⬛" src="http://twemoji.maxcdn.com/36x36/2b1b.png"></td><td><img class="emoji" draggable="false" alt="⬜" src="http://twemoji.maxcdn.com/36x36/2b1c.png"></td><td><img class="emoji" draggable="false" alt="⭐" src="http://twemoji.maxcdn.com/36x36/2b50.png"></td><td><img class="emoji" draggable="false" alt="⭕" src="http://twemoji.maxcdn.com/36x36/2b55.png"></td></tr><tr><td><img class="emoji" draggable="false" alt="0⃣" src="http://twemoji.maxcdn.com/36x36/30-20e3.png"></td><td><img class="emoji" draggable="false" alt="〰" src="http://twemoji.maxcdn.com/36x36/3030.png"></td><td><img class="emoji" draggable="false" alt="〽" src="http://twemoji.maxcdn.com/36x36/303d.png"></td><td><img class="emoji" draggable="false" alt="1⃣" src="http://twemoji.maxcdn.com/36x36/31-20e3.png"></td><td><img class="emoji" draggable="false" alt="2⃣" src="http://twemoji.maxcdn.com/36x36/32-20e3.png"></td></tr><tr><td><img class="emoji" draggable="false" alt="㊗" src="http://twemoji.maxcdn.com/36x36/3297.png"></td><td><img class="emoji" draggable="false" alt="㊙" src="http://twemoji.maxcdn.com/36x36/3299.png"></td><td><img class="emoji" draggable="false" alt="3⃣" src="http://twemoji.maxcdn.com/36x36/33-20e3.png"></td><td><img class="emoji" draggable="false" alt="4⃣" src="http://twemoji.maxcdn.com/36x36/34-20e3.png"></td><td><img class="emoji" draggable="false" alt="5⃣" src="http://twemoji.maxcdn.com/36x36/35-20e3.png"></td></tr><tr><td><img class="emoji" draggable="false" alt="6⃣" src="http://twemoji.maxcdn.com/36x36/36-20e3.png"></td><td><img class="emoji" draggable="false" alt="7⃣" src="http://twemoji.maxcdn.com/36x36/37-20e3.png"></td><td><img class="emoji" draggable="false" alt="8⃣" src="http://twemoji.maxcdn.com/36x36/38-20e3.png"></td><td><img class="emoji" draggable="false" alt="9⃣" src="http://twemoji.maxcdn.com/36x36/39-20e3.png"></td><td><img class="emoji" draggable="false" alt="©" src="http://twemoji.maxcdn.com/36x36/a9.png"></td></tr><tr><td><img class="emoji" draggable="false" alt="®" src="http://twemoji.maxcdn.com/36x36/ae.png"></td><td><img class="emoji" draggable="false" alt="" src="http://twemoji.maxcdn.com/36x36/e50a.png"></td></tr>';