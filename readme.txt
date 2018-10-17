[hr]
[center][color=red][size=16pt][b]FORUM HIT HARD PREVENTER v1.0[/b][/size][/color]
[url=http://www.simplemachines.org/community/index.php?action=profile;u=253913][b]By Dougiefresh[/b][/url] -> [url=http://custom.simplemachines.org/mods/index.php?mod=4091]Link to Mod[/url]
[/center]
[hr]

[color=blue][b][size=12pt][u]Introduction[/u][/size][/b][/color]
One day, I released yet another mod to my website and noticed that once I published the link to the new thread, I started getting views on the thread.  In just over 15 minutes, 1,100+ views were logged for JUST THAT ONE THREAD!  It took deleting that thread for the attack to pretty much stop.  So I wrote this mod to try to play interference in attempts to bring a forum down....

This mod records all non-action visits (aka board index, individual boards and topics) from an IP address for all members [b]EXCEPT[/b] for admin and moderators within the session data.  If the visitor is recorded as having more hits than a specified number of times per minutes, this mod will automatically place a ban in the [b].htaccess[/b] file.  The default (and minimum) is set to 30 (one hit every 2 seconds), which I feel is more than reasonable for most users.

This mod attempts to detect whether CloudFlare servers are being used, and writes the [b].htaccess[/b] accordingly.

[color=blue][b][size=12pt][u]Admin Settings[/u][/size][/b][/color]
There is a new setting under [b]Admin[/b] => [b]Configuration[/b] => [b]Security and Moderation[/b] called:
o Maximum number of visits allowed before automatic ban

[color=blue][b][size=12pt][u]Related Discussions[/u][/size][/b][/color]
o [url=http://www.simplemachines.org/community/index.php?topic=524146.msg3710891#msg3710891][TIP/TRICK] How to ban users properly from .htaccess[/url]

[color=blue][b][size=12pt][u]Compatibility Notes[/u][/size][/b][/color]
This mod was tested on SMF 2.0.11, but should work on SMF 2.0 and up.  SMF 1.x is not and will not be supported.  

[color=blue][b][size=12pt][u]Changelog[/u][/size][/b][/color]
The changelog has been removed and can be seen at [url=http://www.xptsp.com/board/index.php?topic=666.msg984#msg984]XPtsp.com[/url].

[color=blue][b][size=12pt][u]License[/u][/size][/b][/color]
Copyright (c) 2016, Douglas Orend
All rights reserved.

Redistribution and use in source and binary forms, with or without modification, are permitted provided that the following conditions are met:

1. Redistributions of source code must retain the above copyright notice, this list of conditions and the following disclaimer.

2. Redistributions in binary form must reproduce the above copyright notice, this list of conditions and the following disclaimer in the documentation and/or other materials provided with the distribution.

THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS IS" AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT HOLDER OR CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES; LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND ON ANY THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE OF THIS SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.
