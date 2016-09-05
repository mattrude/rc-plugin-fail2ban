---
layout: default
---

<a href="https://your-url" class="github-corner" aria-label="View source on Github"><svg width="80" height="80" viewBox="0 0 250 250" style="fill:#151513; color:#fff; position: absolute; top: 0; border: 0; right: 0;" aria-hidden="true"><path d="M0,0 L115,115 L130,115 L142,142 L250,250 L250,0 Z"></path><path d="M128.3,109.0 C113.8,99.7 119.0,89.6 119.0,89.6 C122.0,82.7 120.5,78.6 120.5,78.6 C119.2,72.0 123.4,76.3 123.4,76.3 C127.3,80.9 125.5,87.3 125.5,87.3 C122.9,97.6 130.6,101.9 134.4,103.2" fill="currentColor" style="transform-origin: 130px 106px;" class="octo-arm"></path><path d="M115.0,115.0 C114.9,115.1 118.7,116.5 119.8,115.4 L133.7,101.6 C136.9,99.2 139.9,98.4 142.2,98.6 C133.8,88.0 127.5,74.4 143.8,58.0 C148.5,53.4 154.0,51.2 159.7,51.0 C160.3,49.4 163.2,43.6 171.4,40.1 C171.4,40.1 176.1,42.5 178.8,56.2 C183.1,58.6 187.2,61.8 190.9,65.4 C194.5,69.0 197.7,73.2 200.1,77.6 C213.8,80.2 216.3,84.9 216.3,84.9 C212.7,93.1 206.9,96.0 205.4,96.6 C205.1,102.4 203.0,107.8 198.3,112.5 C181.9,128.9 168.3,122.5 157.7,114.1 C157.9,116.9 156.7,120.9 152.7,124.9 L141.0,136.5 C139.8,137.7 141.6,141.9 141.8,141.8 Z" fill="currentColor" class="octo-body"></path></svg></a><style>.github-corner:hover .octo-arm{animation:octocat-wave 560ms ease-in-out}@keyframes octocat-wave{0%,100%{transform:rotate(0)}20%,60%{transform:rotate(-25deg)}40%,80%{transform:rotate(10deg)}}@media (max-width:500px){.github-corner:hover .octo-arm{animation:none}.github-corner .octo-arm{animation:octocat-wave 560ms ease-in-out}}</style>

RoundCube Fail2Ban Plugin is a small plugin that will display a failed login attempts in your syslog or userlogins log file. Using this information [Fail2Ban](http://www.fail2ban.org) will be able to block a user for a set amount of time. The best part, the block is happening at the IP level and blocks the IP address, not the user they are trying to log in as.

If you would like to help translate this plugin, or you see a problem with the current translation, please [contact me][1].

This plugin dose not install or run Fail2Ban, but only provides the program with the needed log entries. Fail2Ban has to be installed and configured independent of this plugin so that it watches Roundcube's logs for failed logins.

  
## Download

The Current Version is listed below.

{% for release in site.github.releases %}
* <a href="{{ release.html_url }}">RoundCube Fil2Ban Plugin {{ release.name }}</a> - <a href="https://github.com/mattrude/rc-plugin-fail2ban/archive/{{ release.tag_name }}.tar.gz">tgz</a> - <a href="https://github.com/mattrude/rc-plugin-fail2ban/archive/{{ release.tag_name }}.zip">zip</a>{% endfor %}
* [RoundCube Fil2Ban Plugin Release 1.1][2] - [tgz][3] - [zip][4]
* [RoundCube Fil2Ban Plugin Release 1.0][5] - [tgz][6] - [zip][7]

You can also clone the project with [Git][8] by running:

<pre>$ git clone git://github.com/mattrude/rc-plugin-fail2ban.git fail2ban</pre> 

If your using git, make sure to hit the [rc-Plugin-Fail2Ban's github page][9]. 

  
## Dependencies

[RoundCube][10] 3.0+


## Installing

1. Place this plugin folder into the RoundCube plugins directory (roundcube/plugins/)
2. Add `fail2ban` to `$rcmail_config['plugins']` in your RoundCube config

**Note:** When downloading this plugin from <http://github.com/mattrude/rc-plugin-fail2ban> you will need to create a directory called fail2ban and place fail2ban.php in there, ignoring the root directory in the downloaded archive.

You may also run `git clone git://github.com/mattrude/rc-plugin-fail2ban.git fail2ban` from the plugins directory.
  
## Setting Up

**fail2ban/jail.conf:**

<pre>[roundcube]
enabled  = true
port     = http,https
filter   = roundcube
action   = iptables-multiport[name=roundcube, port="http,https"]
logpath  = /var/www/html/roundcube/logs/userlogins</pre>

Or oldschool used a configuration simmiler to:

<pre>[roundcube]
# 0.3 and up plugin-support
 
enabled  = true
port     = http,https
filter   = roundcube
action   = iptables-multiport[name=roundcube, port="http,https"]
sendmail-whois[name=RC-Webmail, dest=you@example.com, sender=fail2ban]
logpath  = /srv/www/htdocs/webmail/logs/userlogins</pre>

**fail2ban/filter.d/roundcube.conf:**

<pre>[Definition]
failregex = FAILED login for .*. from &lt;HOST&gt;
ignoreregex =</pre>

  
## License

This plugin is licensed under the [GPLv3][11]. A copy of the license also comes with every copy download.

<pre>This program is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program.  If not, see &lt;http://www.gnu.org/licenses/>.</pre>

## Contributors

{% for user in site.github.contributors %}<a href="{{ user.html_url }}"><img src="{{ user.avatar_url }}&s=16" width="16px" height="16px" /> {{ user.login }}</a>, {% endfor %}

 [1]: http://mattrude.com/contact-me/
 [2]: https://github.com/mattrude/rc-plugin-fail2ban/releases/tag/1.1
 [3]: http://github.com/downloads/mattrude/rc-plugin-fail2ban/roundcube-fail2ban-plugin.1.1.tgz
 [4]: http://github.com/downloads/mattrude/rc-plugin-fail2ban/roundcube-fail2ban-plugin.1.1.zip
 [5]: https://github.com/mattrude/rc-plugin-fail2ban/releases/tag/1.0
 [6]: http://github.com/downloads/mattrude/rc-plugin-fail2ban/roundcube-fail2ban-plugin.1.0.tgz
 [7]: http://github.com/downloads/mattrude/rc-plugin-fail2ban/roundcube-fail2ban-plugin.1.0.zip
 [8]: http://git-scm.com
 [9]: http://github.com/mattrude/rc-plugin-fail2ban
 [10]: http://roundcube.net/
 [11]: https://raw.githubusercontent.com/{{ site.github.repository_nwo }}/master/LICENSE
 [12]: http://mattrude.com/
