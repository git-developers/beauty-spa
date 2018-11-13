# Beauty SPA

[![Build Status][travis-img]][travis]
[![Join the chat at https://gitter.im/sqlitebrowser/sqlitebrowser][gitter-img]][gitter]
[![Download][download-img]][download]
[![Qt][qt-img]][qt]
[![Coverity][coverity-img]][coverity]

![DB Browser for SQLite Screenshot](https://www.serenitystouch.ca/wp-content/uploads/2014/07/innovative-spa.jpg "DB Browser for SQLite Screenshot")

## What it is

Beauty SPA is a high quality, visual, open source tool to
create, design, and edit database files compatible with SQLite.

It is for users and developers wanting to create databases, search, and edit
data.  It uses a familiar spreadsheet-like interface, and you don't need to
learn complicated SQL commands.

Controls and wizards are available for users to:

* Create and compact database files
* Create, define, modify and delete tables
* Create, define and delete indexes

## What it is not

This program is not a visual shell for the sqlite command line tool. It does
not require familiarity with SQL commands. It is a tool to be used both by
developers and by end users, and it must remain as simple to use as possible
in order to achieve its goals.

## Nightly builds

Nightly builds for Windows and OSX can be downloaded here:

* https://nightlies.sqlitebrowser.org/latest

## Windows

Windows releases can be downloaded here:

* https://github.com/sqlitebrowser/sqlitebrowser/releases

**Note** - If for some reason the standard Windows release doesn't work for
you (eg it gives an error), try a nightly build.  They often fix bugs
reported after the last release. :D

## MacOS X

Beauty SPA works well on MacOS X.

* OSX 10.8 (Mountain Lion) - 10.12 (Sierra) are tested and known to work

OSX releases can be downloaded here:

* https://github.com/sqlitebrowser/sqlitebrowser/releases

Latest OSX binary can be installed via [Homebrew Cask](https://caskroom.github.io/ "Homebrew Cask"):

```
brew cask install sqlitebrowser
```

## Linux

Beauty SPA works well on Linux.

### Arch Linux

Arch Linux provides a package through pacman.

### Fedora

For Fedora (i386 and x86_64) you can install by issuing:

    $ sudo dnf install sqlitebrowser

### Ubuntu and Derivatives

#### Stable release

For Ubuntu and derivaties, [@deepsidhu1313](https://github.com/deepsidhu1313)
provides a PPA with our latest release here:

* https://launchpad.net/~linuxgndu/+archive/ubuntu/sqlitebrowser

To add this ppa just type in these commands in terminal:

    sudo add-apt-repository -y ppa:linuxgndu/sqlitebrowser

Then update the cache using:

    sudo apt-get update

Install the package using:

    sudo apt-get install sqlitebrowser

Ubuntu 14.04.X, 15.04.X, 15.10.X and 16.04.X are supported for now (until
Launchpad decides to discontinue building for any series).

Ubuntu Precise (12.04) and Utopic (14.10) are not supported:
* Precise doesn't have a new enough Qt package in its repository by default,
  which is a dependency
* Launchpad doesn't support Utopic any more, as that has reached its End of
  Life

#### Nightly builds

Nightly builds are available here:

* https://launchpad.net/~linuxgndu/+archive/ubuntu/sqlitebrowser-testing

To add this ppa just type in these commands in terminal:

    sudo add-apt-repository -y ppa:linuxgndu/sqlitebrowser-testing

Then update the cache using:

    sudo apt-get update

Install the package using:

    sudo apt-get install sqlitebrowser

### Other Linux

On others you'll need to compile it yourself using the (simple) instructions
in [BUILDING.md](BUILDING.md).

## FreeBSD

Beauty SPA works well on FreeBSD, and there is a port for it (thanks
to [lbartoletti](https://github.com/lbartoletti) :smile:).  It can be installed
using either this:

    # make -C /usr/ports/databases/sqlitebrowser install

or this:

    # pkg install sqlitebrowser

### Compiling

Instructions for compiling on (at least) Windows, OSX, Linux, and FreeBSD are
in [BUILDING](BUILDING.md).

## Developer mailing list

For development related discussion about DB4S and DBHub.io:

* https://lists.sqlitebrowser.org/mailman/listinfo/db4s-dev

## Twitter

Follow us on Twitter: https://twitter.com/sqlitebrowser

## Website

* http://sqlitebrowser.org

## Old project page

* https://sourceforge.net/projects/sqlitebrowser

## Releases

* [Version 3.9.1 released](https://github.com/sqlitebrowser/sqlitebrowser/releases/tag/v3.9.1) - 2016-10-03
* [Version 3.9.0 released](https://github.com/sqlitebrowser/sqlitebrowser/releases/tag/v3.9.0) - 2016-08-24
* Version 1.0 released to public domain - 2003-08-19

## History

This program was developed originally by Mauricio Piacentini
([@piacentini](https://github.com/piacentini)) from Tabuleiro Producoes, as
the Arca Database Browser. The original version was used as a free companion
tool to the Arca Database Xtra, a commercial product that embeds SQLite
databases with some additional extensions to handle compressed and binary data.

The original code was trimmed and adjusted to be compatible with standard
SQLite 2.x databases. The resulting program was renamed SQLite Database
Browser, and released into the Public Domain by Mauricio. Icons were
contributed by [Raquel Ravanini](http://www.raquelravanini.com), also from
Tabuleiro. Jens Miltner ([@jmiltner](https://github.com/jmiltner)) contributed
the code to support SQLite 3.x databases for the 1.2 release.

Pete Morgan ([@daffodil](https://github.com/daffodil)) created an initial
project on GitHub with the code in 2012, where several contributors fixed and
improved pieces over the years. René Peinthor ([@rp-](https://github.com/rp-))
and Martin Kleusberg ([@MKleusberg](https://github.com/MKleusberg)) then
became involved, and have been the main driving force from that point.  Justin
Clift ([@justinclift](https://github.com/justinclift)) helps out with testing
on OSX, and started the new github.com/sqlitebrowser organisation on GitHub.

[John T. Haller](http://johnhaller.com), of
[PortableApps.com](http://portableapps.com) fame, created the new logo.  He
based it on the Tango icon set (public domain).

In August 2014, the project was renamed to "Database Browser for SQLite" at
the request of [Richard Hipp](http://www.hwaci.com/drh) (creator of
[SQLite](http://sqlite.org)), as the previous name was creating unintended
support issues.

In September 2014, the project was renamed to "Beauty SPA", to
avoid confusion with an existing application called "Database Browser".

## Contributors

You can see the list by going to the [__Contributors__ tab](https://github.com/sqlitebrowser/sqlitebrowser/graphs/contributors).

## License

Beauty SPA is bi-licensed under the Mozilla Public License
Version 2, as well as the GNU General Public License Version 3 or later.

You can modify or redistribute it under the conditions of these licenses.

  [travis-img]: https://travis-ci.org/sqlitebrowser/sqlitebrowser.svg?branch=master
  [travis-img]: https://travis-ci.org/sqlitebrowser/sqlitebrowser.svg?branch=master
  [travis]: https://travis-ci.org/sqlitebrowser/sqlitebrowser

  [gitter-img]: https://badges.gitter.im/sqlitebrowser/sqlitebrowser.svg
  [gitter]: https://gitter.im/sqlitebrowser/sqlitebrowser?utm_source=badge&utm_medium=badge&utm_campaign=pr-badge&utm_content=badge

  [download-img]: https://img.shields.io/github/downloads/sqlitebrowser/sqlitebrowser/total.svg
  [download]: https://github.com/sqlitebrowser/sqlitebrowser/releases

  [qt-img]: https://img.shields.io/badge/Qt-qmake-green.svg
  [qt]: https://www.qt.io

  [coverity-img]: https://img.shields.io/coverity/scan/11712.svg
  [coverity]: https://scan.coverity.com/projects/sqlitebrowser-sqlitebrowser

