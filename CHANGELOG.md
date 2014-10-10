# Changelog

All new features, changes and fixes should be listed here. Please use tickets to reference changes.

## 0.3.0 (2014/10/09)

This basically is a quality assurance release together with a new extra feature.
A lot of code cleaning was done and tests where added for yet uncovered code.

* [new] The `Workflux\State\State` class now supports `Params\Options`
* [fix] The xsd schema-validation result is now actually considered
* [chg] Options can now be nested recursively within xml definitions for states and guards.

## 0.2.0 (2014/10/08)

* [new] Introduced api doc and usage examples.
* [new] Added xsd schema validation for state machine xml declarations.
* [new] You can now configure you own `StateInterface` implementations.

## 0.1.0 (2014/10/07)

Initial version providing a working state machine, with event- and sequential-transitions.
Further more you can define state machines via xml and render them to an image.