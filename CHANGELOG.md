## [Unreleased] - 2021-01-02

### Added
  - [#6](https://github.com/aeon-php/automation/pull/6) - **support for generating changelogs from tags that are diverged** - [@norberttech](https://github.com/norberttech)
  - [#6](https://github.com/aeon-php/automation/pull/6) - **twig template for changelog generation** - [@norberttech](https://github.com/norberttech)
  - [#6](https://github.com/aeon-php/automation/pull/6) - **--changed-before option to changelog:generate command** - [@norberttech](https://github.com/norberttech)
  - [#6](https://github.com/aeon-php/automation/pull/6) - **--with-commit to tag:list command** - [@norberttech](https://github.com/norberttech)
  - [#5](https://github.com/aeon-php/automation/pull/5) - **PrefixParser to detect change type from change title prefix** - [@norberttech](https://github.com/norberttech)
  - [#5](https://github.com/aeon-php/automation/pull/5) - **`Change::name() : string` and `Change::all() : array`  methods** - [@norberttech](https://github.com/norberttech)
  - [#4](https://github.com/aeon-php/automation/pull/4) - **Make first character of change title uppercase** - [@norberttech](https://github.com/norberttech)
  - [#3](https://github.com/aeon-php/automation/pull/3) - **support for conventional commit format** - [@norberttech](https://github.com/norberttech)
  - [#3](https://github.com/aeon-php/automation/pull/3) - **Change object that holds Type and description** - [@norberttech](https://github.com/norberttech)
  - [#2](https://github.com/aeon-php/automation/pull/2) - **static analyze github workflow** - [@norberttech](https://github.com/norberttech)
  - [#1](https://github.com/aeon-php/automation/pull/1) - **`change-log:get --commit-end` flag that takes sha of a commit that should be the last in changelog** - [@norberttech](https://github.com/norberttech)
  - [#1](https://github.com/aeon-php/automation/pull/1) - **Github tests workflow** - [@norberttech](https://github.com/norberttech)
  - [#1](https://github.com/aeon-php/automation/pull/1) - **Dependabot configuration** - [@norberttech](https://github.com/norberttech)
  - [b3a906](https://github.com/aeon-php/automation/commit/b3a906801897f72c3e88f696aa99e9dc7b88005f) - **basic README** - [@norberttech](https://github.com/norberttech)
  - [e5849d](https://github.com/aeon-php/automation/commit/e5849da3147caaf1394cfc149fdc405589d818ec) - **initial changelog** - [@norberttech](https://github.com/norberttech)

### Changed
  - [#6](https://github.com/aeon-php/automation/pull/6) - **change-log:get command into changelog:generate** - [@norberttech](https://github.com/norberttech)
  - [#6](https://github.com/aeon-php/automation/pull/6) - **--tag-start &amp; --tag-end into --tag in changelog:generate commad** - [@norberttech](https://github.com/norberttech)
  - [ede6eb](https://github.com/aeon-php/automation/commit/ede6eb897f8bd0ba77ceedb3fc3ccb44590124a2) - **Update CHANGELOG.md** - [@norberttech](https://github.com/norberttech)
  - [#5](https://github.com/aeon-php/automation/pull/5) - **Replaced redundant methods in Changes collection with more generic ones** - [@norberttech](https://github.com/norberttech)
  - [#3](https://github.com/aeon-php/automation/pull/3) - **changes are now parsed by ChangesParser object, not directly in PullRequest/Commit** - [@norberttech](https://github.com/norberttech)
  - [#1](https://github.com/aeon-php/automation/pull/1) - **the way to access pull requests related to the commit, those are now taken from the `Commit` object** - [@norberttech](https://github.com/norberttech)
  - [6ea7ef](https://github.com/aeon-php/automation/commit/6ea7ef4eca73bccbaaab23f26a365f83b3586613) - **automation readme** - [@norberttech](https://github.com/norberttech)
  - [61b146](https://github.com/aeon-php/automation/commit/61b146ba1360436136c7dc9e57d7658b3d6da810) - **automation xsd** - [@norberttech](https://github.com/norberttech)
  - [ea9540](https://github.com/aeon-php/automation/commit/ea9540a5f4399ee4a70e8e2f4df8ef0467fbe42e) - **Improved command descriptions** - [@norberttech](https://github.com/norberttech)
  - [885e50](https://github.com/aeon-php/automation/commit/885e50c5c4e5e0a757c247d65cf4b4576ce168e3) - **Take format from option in change-log:get command** - [@norberttech](https://github.com/norberttech)
  - [933675](https://github.com/aeon-php/automation/commit/93367510905d645a23dc2d86cc2ab9bf4e203e9c) - **Improved support for -v|-vv|-vvv** - [@norberttech](https://github.com/norberttech)
  - [cf304f](https://github.com/aeon-php/automation/commit/cf304f1c0c9a4db74b017ef134d43986039953a5) - **Move initialization of github client into AbstractCommand** - [@norberttech](https://github.com/norberttech)
  - [4e4108](https://github.com/aeon-php/automation/commit/4e41083de4d76dea2fa90abc7d72815d1ab73718) - **Use commits instead of milestones to generate changelog** - [@norberttech](https://github.com/norberttech)
  - [72564b](https://github.com/aeon-php/automation/commit/72564ba0991f280a74428d10fc1dee9b02659b02) - **Initial commit** - [@norberttech](https://github.com/norberttech)

### Fixed
  - [#6](https://github.com/aeon-php/automation/pull/6) - **fetching all tags by using paginator instead of taking just first page from API** - [@norberttech](https://github.com/norberttech)
  - [#4](https://github.com/aeon-php/automation/pull/4) - **Change Log changes are sorted by date** - [@norberttech](https://github.com/norberttech)
  - [#3](https://github.com/aeon-php/automation/pull/3) - **use Repository commit data instead of GitData to make sure commit author login is always available** - [@norberttech](https://github.com/norberttech)
  - [#2](https://github.com/aeon-php/automation/pull/2) - **Tests failing at PHP 8** - [@norberttech](https://github.com/norberttech)

Generated by [Automation](https://github.com/aeon-php/automation)
