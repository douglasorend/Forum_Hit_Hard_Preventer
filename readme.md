---------

# FORUM HIT HARD PREVENTER v1.2

[**By Dougiefresh**](http://www.simplemachines.org/community/index.php?action=profile;u=253913) -> [Link to Mod](http://custom.simplemachines.org/mods/index.php?mod=4091)

---------

## Introduction
One day, I released yet another mod to my website and noticed that once I published the link to the new thread, I started getting views on the thread.  In just over 15 minutes, 1,100+ views were logged for JUST THAT ONE THREAD!  It took deleting that thread for the attack to pretty much stop.  So I wrote this mod to try to play interference in attempts to bring a forum down....

This mod records all non-action visits (aka board index, individual boards and topics) from an IP address for all members **EXCEPT** for admin and moderators within the session data.  If the visitor is recorded as having more hits than a specified number of times per minutes, this mod will automatically place a ban in the **.htaccess** file.  The default (and minimum) is set to 30 (one hit every 2 seconds), which I feel is more than reasonable for most users.

This mod attempts to detect whether CloudFlare servers are being used, and writes the **.htaccess** accordingly.

## Additional Requirements
Because we really don't want to ban our "wonderful" spiders, this mod turns on **Search Engine Tracking Level** to **Standard** setting in order to properly detect spiders.  For **SMF 2.0.x**, the **Search Engine** core feature is enabled in order to properly detect spiders.

## Recommended Mods To Install

- [More Spiders](http://custom.simplemachines.org/mods/index.php?mod=1157) - Adds 83 more spiders/crawlers to your Spiders section in SMF!

## Admin Settings
There is a new setting under **Admin** => **Configuration** => **Security and Moderation** called:

- Maximum number of visits allowed before automatic ban

## Related Discussions

- [[TIP/TRICK] How to ban users properly from .htaccess](http://www.simplemachines.org/community/index.php?topic=524146.msg3710891#msg3710891)

## Compatibility Notes
This mod was tested on SMF 2.0.11 and SMF 2.1 Beta 2, but should work on SMF 2.0 and up.  SMF 1.x is not and will not be supported.  

## Changelog
The changelog can be viewed at [XPtsp.com](http://www.xptsp.com/board/free-modifications/forum-hit-hard-preventer/?tab=1).

## License
Copyright (c) 2016 - 2018, Douglas Orend

All rights reserved.

Redistribution and use in source and binary forms, with or without modification, are permitted provided that the following conditions are met:

1. Redistributions of source code must retain the above copyright notice, this list of conditions and the following disclaimer.

2. Redistributions in binary form must reproduce the above copyright notice, this list of conditions and the following disclaimer in the documentation and/or other materials provided with the distribution.

THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS IS" AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT HOLDER OR CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES; LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND ON ANY THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE OF THIS SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.
