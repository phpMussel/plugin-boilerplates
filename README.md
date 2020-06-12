[![Join the chat at https://gitter.im/phpMussel2/Lobby](https://badges.gitter.im/phpMussel2/Lobby.svg)](https://gitter.im/phpMussel2/Lobby)
[![v1: PHP >= 5.4.0](https://img.shields.io/badge/v1-PHP%20%3E%3D%205.4.0-8892bf.svg)](https://maikuolan.github.io/Compatibility-Charts/)
[![v2~v3: PHP >= 7.2.0](https://img.shields.io/badge/v2%7Ev3-PHP%20%3E%3D%207.2.0-8892bf.svg)](https://maikuolan.github.io/Compatibility-Charts/)
[![License: GPL v2](https://img.shields.io/badge/License-GPL%20v2-blue.svg)](https://www.gnu.org/licenses/old-licenses/gpl-2.0.en.html)
[![PRs Welcome](https://img.shields.io/badge/PRs-Welcome-brightgreen.svg)](http://makeapullrequest.com)

## **What is phpMussel?**

An ideal solution for shared hosting environments, where it's often not possible to utilise or install conventional anti-virus protection solutions, phpMussel is a PHP script designed to **detect trojans, viruses, malware and other threats** within files uploaded to your system wherever the script is hooked, based on the signatures of [ClamAV](https://www.clamav.net/) and others. For information regarding *HOW TO INSTALL* {2A+2B} and *HOW TO USE* {3A+3B} phpMussel, please refer either to the [Wiki](https://github.com/phpMussel/phpMussel/wiki) or to the [documentation](https://github.com/phpMussel/Docs/tree/master) (direct links to that documentation included under the "Documentation" header below this paragraph).

---

## **What's this repository for?**

This repository, "[plugin-boilerplates](https://github.com/phpMussel/plugin-boilerplates)", contains boilerplate code which can be used to create new plugins for phpMussel.

Because phpMussel v0 is deprecated, and because support will no longer be provided for that major version, boilerplate code for that major version has been entirely removed.

Because phpMussel v1 and v2 are very similarly structured, the same boilerplate code can be used for either of those two major versions (hence "boilerplate-v1-or-v2").

phpMussel v3 is currently in alpha stage of development, and doesn't yet support plugins. Some appropriate boilerplate code will be added to this repository at a later time, when phpMussel is able to support plugins.

---

### **Known plugins list:**

⬇Stage reached⬇ ➡Major version➡ | v0 | v1 | v2 | v3
:--|:-:|:-:|:-:|:-:
[plugin-legacy](https://github.com/phpMussel/plugin-legacy) (DEPRECATED) | | ✔ | |
[plugin-log2mysql](https://github.com/mtrefzer/plugin-log2mysql) | | ✔ | ✔ |
[plugin-notifications](https://github.com/phpMussel/plugin-notifications) (DEPRECATED) | ✔ | ✔ | ✔ |
[plugin-resultAsJson](https://github.com/mtrefzer/plugin-resultAsJson) | | ✔ | ✔ |

---


Last Updated: 12 June 2020 (2020.06.12).
