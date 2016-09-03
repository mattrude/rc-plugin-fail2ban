---
layout: home
---

# RoundCube Fail2Ban Plugin

RoundCube Fail2Ban Plugin is a small plugin that will display a failed login attempts in your syslog or userlogins log file. Using this information [Fail2Ban](http://www.fail2ban.org) will be able to block a user for a set amount of time. The best part, the block is happening at the IP level and blocks the IP address, not the user they are trying to log in as.

If you would like to help translate this plugin, or you see a problem with the current translation, please [contact me][1].

This plugin dose not install or run Fail2Ban, but only provides the program with the needed log entries. Fail2Ban has to be installed and configured independent of this plugin so that it watches Roundcube's logs for failed logins.

  
## Download

The Current Version is 1.3 released on Sept, 28th 2015.

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
