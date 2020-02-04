# Mediawiki Vue.js Sandbox

This dummy extension template is intended to demonstrate how Vue.js can be
used within a MediaWiki envirionment. It is based on the Boilerplate
extension.

## Installation

Download this extension into the `extensions` directory of your local
MediaWiki instance. Make sure that you've also checked out this patch in MW
Core:

https://gerrit.wikimedia.org/r/c/mediawiki/core/+/569692/

Running `npm install` in this extension's directory will install all
development dependencies.

Once set up, running `npm test` and `composer test` will run automated code checks.

## Usage

This extension adds a new special page, `Special:VueTest`. This page contains
several interactive demos to showcase some of what you can do with Vue, as well as
how this tool can be integrated in a MediaWiki envirionment. Most source
files are annotated and contain links to the relevant areas of the [Vue.js documentation][1].

### Currently supported:

* Single-file Vue components using ES5 (plus require/module.exports)
* Linting JS, CSS/LESS, and HTML in .vue files
* Less compilation in component style blocks
* CSS Janus works (try uselang=ar to see it in action)
* Vue.js Devtools (use debug=true or set $wgVueDevelopmentMode = true in config
* mw.message and mw.api functionality is provided via plugins (see `resources/plugins` )

### Not currently supported:

* Using non-ES5 JS (in vue files or elsewhere)
* Scoped component styles
* Hot module reloading in development
* Non-LESS pre-processors
* Non-HTML templates (Jade, etc)

[1]: https://vuejs.org/v2/guide/

