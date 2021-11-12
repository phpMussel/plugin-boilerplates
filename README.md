[![Join the chat at https://gitter.im/phpMussel2/Lobby](https://badges.gitter.im/phpMussel2/Lobby.svg)](https://gitter.im/phpMussel2/Lobby)
[![v1: PHP >=5.4.0](https://img.shields.io/badge/v1-PHP%20%3E%3D%205.4.0-8892bf.svg)](https://maikuolan.github.io/Compatibility-Charts/)
[![v2~v3: PHP >=7.2.0](https://img.shields.io/badge/v2%7Ev3-PHP%20%3E%3D%207.2.0-8892bf.svg)](https://maikuolan.github.io/Compatibility-Charts/)
[![License: GPL v2](https://img.shields.io/badge/License-GPL%20v2-blue.svg)](https://www.gnu.org/licenses/old-licenses/gpl-2.0.en.html)
[![PRs Welcome](https://img.shields.io/badge/PRs-Welcome-brightgreen.svg)](http://makeapullrequest.com)

## **What is phpMussel?**

An ideal solution for shared hosting environments, where it's often not possible to utilise or install conventional anti-virus protection solutions, phpMussel is a PHP script designed to **detect trojans, viruses, malware and other threats** within files uploaded to your system wherever the script is hooked, based on the signatures of [ClamAV](https://www.clamav.net/) and others.

---


### What's this repository for?

This repository, "[plugin-boilerplates](https://github.com/phpMussel/plugin-boilerplates)", contains boilerplate code which can be used to create new plugins for phpMussel.

Because phpMussel v0 is deprecated, and because support will no longer be provided for that major version, boilerplate code for that major version has been entirely removed.

Because phpMussel v1 and v2 are very similarly structured, the same boilerplate code can be used for either of those two major versions (hence "boilerplate-v1-or-v2").

phpMussel v3 is the current latest available major version.

The boilerplate code for each major version is contained within its respective directories.

---

### **Known plugins list:**

➡Major&nbsp;version&nbsp;compatibility➡<br />⬇Plugin&nbsp;name⬇ | v0 | v1 | v2 | v3 | *Notes*
:--|:-:|:-:|:-:|:-:|:--
[plugin-legacy](https://github.com/phpMussel/plugin-legacy) | | ✔ | | | *Needed only by users migrating from v0 to v1; Completely useless otherwise.*
[plugin-log2mysql](https://github.com/mtrefzer/plugin-log2mysql) | | ✔ | ✔ | |
[plugin-notifications](https://github.com/phpMussel/plugin-notifications) | ✔ | ✔ | ✔ | | *For ≥v3, use "Plugin-PHPMailer" instead.*
[plugin-resultAsJson](https://github.com/mtrefzer/plugin-resultAsJson) | | ✔ | ✔ | | *For ≥v3, the desired functionality can be achieved at the implementation. [Examples](https://github.com/phpMussel/Examples) are available.*
[Plugin-PHPMailer](https://github.com/phpMussel/Plugin-PHPMailer) | | | | ✔ | *Replaces "plugin-notifications" (≤v2).*

---


### Documentation:
- **[English](https://github.com/phpMussel/Docs/blob/master/readme.en.md)**
- **[العربية](https://github.com/phpMussel/Docs/blob/master/readme.ar.md)**
- **[Deutsch](https://github.com/phpMussel/Docs/blob/master/readme.de.md)**
- **[Español](https://github.com/phpMussel/Docs/blob/master/readme.es.md)**
- **[Français](https://github.com/phpMussel/Docs/blob/master/readme.fr.md)**
- **[Bahasa Indonesia](https://github.com/phpMussel/Docs/blob/master/readme.id.md)**
- **[Italiano](https://github.com/phpMussel/Docs/blob/master/readme.it.md)**
- **[日本語](https://github.com/phpMussel/Docs/blob/master/readme.ja.md)**
- **[한국어](https://github.com/phpMussel/Docs/blob/master/readme.ko.md)**
- **[Nederlandse](https://github.com/phpMussel/Docs/blob/master/readme.nl.md)**
- **[Português](https://github.com/phpMussel/Docs/blob/master/readme.pt.md)**
- **[Русский](https://github.com/phpMussel/Docs/blob/master/readme.ru.md)**
- **[اردو](https://github.com/phpMussel/Docs/blob/master/readme.ur.md)**
- **[Tiếng Việt](https://github.com/phpMussel/Docs/blob/master/readme.vi.md)**
- **[中文（简体）](https://github.com/phpMussel/Docs/blob/master/readme.zh.md)**
- **[中文（傳統）](https://github.com/phpMussel/Docs/blob/master/readme.zh-tw.md)**

#### See also:
- [**phpMussel/phpMussel**](https://github.com/phpMussel/phpMussel) – The main phpMussel repository (you can get phpMussel versions prior to v3 from here).
- [**phpMussel/Core**](https://github.com/phpMussel/Core) – phpMussel core (dedicated Composer version).
- [**phpMussel/CLI**](https://github.com/phpMussel/CLI) – phpMussel CLI-mode (dedicated Composer version).
- [**phpMussel/FrontEnd**](https://github.com/phpMussel/FrontEnd) – phpMussel front-end (dedicated Composer version).
- [**phpMussel/Web**](https://github.com/phpMussel/Web) – phpMussel upload handler (dedicated Composer version).
- [**phpMussel/Examples**](https://github.com/phpMussel/Examples) – Prebuilt examples for phpMussel (useful for users which don't want to use Composer to install phpMussel).
- [**phpMussel/plugin-boilerplates**](https://github.com/phpMussel/plugin-boilerplates) – This repository contains boilerplate code which can be used to create new plugins for phpMussel.
- [**phpMussel/Plugin-PHPMailer**](https://github.com/phpMussel/Plugin-PHPMailer) – Provides 2FA and email notifications support for phpMussel v3+.
- [**CONTRIBUTING.md**](https://github.com/phpMussel/.github/blob/master/CONTRIBUTING.md) – Contribution guidelines.

---


### Current major version development status:

Development stage | Major versions
:--|:-:
__Stage 1/7: Pre-Alpha__<em><br />- Exploring early concepts/ideas. No code written/available yet.</em> |
__Stage 2/7: Alpha__<em><br />- Branched, but unstable. Not production-ready (high risk if used).</em> |
__Stage 3/7: Beta__<em><br />- Branched, but unstable. Not production-ready (low risk if used).</em> |
__Stage 4/7: Stable__<em><br />- First production-ready version has been tagged/released. Actively maintained.</em> |
__Stage 5/7: Mature__<em><br />- Multiple stable versions/releases exist. Actively maintained.</em> | __v2~v3__
__Stage 6/7: Locked__<em><br />- Still maintained (security, etc), but new features won't be implemented anymore.</em> | __v1__
__Stage 7/7: EoL/Dead__<em><br />- Not maintained anymore, and support not guaranteed. If possible, stop using, and update ASAP.</em> | __v0__

---


Last Updated: 12 November 2021 (2021.11.12).
