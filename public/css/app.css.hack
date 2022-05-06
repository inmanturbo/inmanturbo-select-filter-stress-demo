/*! tailwindcss v2.2.19 | MIT License | https://tailwindcss.com *//*! modern-normalize v1.1.0 | MIT License | https://github.com/sindresorhus/modern-normalize */

/*
Document
========
*/

/**
Use a better box model (opinionated).
*/

*,
::before,
::after {
	box-sizing: border-box;
}

/**
Use a more readable tab size (opinionated).
*/

html {
	-moz-tab-size: 4;
	-o-tab-size: 4;
	   tab-size: 4;
}

/**
1. Correct the line height in all browsers.
2. Prevent adjustments of font size after orientation changes in iOS.
*/

html {
	line-height: 1.15; /* 1 */
	-webkit-text-size-adjust: 100%; /* 2 */
}

/*
Sections
========
*/

/**
Remove the margin in all browsers.
*/

body {
	margin: 0;
}

/**
Improve consistency of default fonts in all browsers. (https://github.com/sindresorhus/modern-normalize/issues/3)
*/

body {
	font-family:
		system-ui,
		-apple-system, /* Firefox supports this but not yet `system-ui` */
		'Segoe UI',
		Roboto,
		Helvetica,
		Arial,
		sans-serif,
		'Apple Color Emoji',
		'Segoe UI Emoji';
}

/*
Grouping content
================
*/

/**
1. Add the correct height in Firefox.
2. Correct the inheritance of border color in Firefox. (https://bugzilla.mozilla.org/show_bug.cgi?id=190655)
*/

hr {
	height: 0; /* 1 */
	color: inherit; /* 2 */
}

/*
Text-level semantics
====================
*/

/**
Add the correct text decoration in Chrome, Edge, and Safari.
*/

abbr[title] {
	-webkit-text-decoration: underline dotted;
	        text-decoration: underline dotted;
}

/**
Add the correct font weight in Edge and Safari.
*/

b,
strong {
	font-weight: bolder;
}

/**
1. Improve consistency of default fonts in all browsers. (https://github.com/sindresorhus/modern-normalize/issues/3)
2. Correct the odd 'em' font sizing in all browsers.
*/

code,
kbd,
samp,
pre {
	font-family:
		ui-monospace,
		SFMono-Regular,
		Consolas,
		'Liberation Mono',
		Menlo,
		monospace; /* 1 */
	font-size: 1em; /* 2 */
}

/**
Add the correct font size in all browsers.
*/

small {
	font-size: 80%;
}

/**
Prevent 'sub' and 'sup' elements from affecting the line height in all browsers.
*/

sub,
sup {
	font-size: 75%;
	line-height: 0;
	position: relative;
	vertical-align: baseline;
}

sub {
	bottom: -0.25em;
}

sup {
	top: -0.5em;
}

/*
Tabular data
============
*/

/**
1. Remove text indentation from table contents in Chrome and Safari. (https://bugs.chromium.org/p/chromium/issues/detail?id=999088, https://bugs.webkit.org/show_bug.cgi?id=201297)
2. Correct table border color inheritance in all Chrome and Safari. (https://bugs.chromium.org/p/chromium/issues/detail?id=935729, https://bugs.webkit.org/show_bug.cgi?id=195016)
*/

table {
	text-indent: 0; /* 1 */
	border-color: inherit; /* 2 */
}

/*
Forms
=====
*/

/**
1. Change the font styles in all browsers.
2. Remove the margin in Firefox and Safari.
*/

button,
input,
optgroup,
select,
textarea {
	font-family: inherit; /* 1 */
	font-size: 100%; /* 1 */
	line-height: 1.15; /* 1 */
	margin: 0; /* 2 */
}

/**
Remove the inheritance of text transform in Edge and Firefox.
1. Remove the inheritance of text transform in Firefox.
*/

button,
select { /* 1 */
	text-transform: none;
}

/**
Correct the inability to style clickable types in iOS and Safari.
*/

button,
[type='button'],
[type='reset'],
[type='submit'] {
	-webkit-appearance: button;
}

/**
Remove the inner border and padding in Firefox.
*/

::-moz-focus-inner {
	border-style: none;
	padding: 0;
}

/**
Restore the focus styles unset by the previous rule.
*/

:-moz-focusring {
	outline: 1px dotted ButtonText;
}

/**
Remove the additional ':invalid' styles in Firefox.
See: https://github.com/mozilla/gecko-dev/blob/2f9eacd9d3d995c937b4251a5557d95d494c9be1/layout/style/res/forms.css#L728-L737
*/

:-moz-ui-invalid {
	box-shadow: none;
}

/**
Remove the padding so developers are not caught out when they zero out 'fieldset' elements in all browsers.
*/

legend {
	padding: 0;
}

/**
Add the correct vertical alignment in Chrome and Firefox.
*/

progress {
	vertical-align: baseline;
}

/**
Correct the cursor style of increment and decrement buttons in Safari.
*/

::-webkit-inner-spin-button,
::-webkit-outer-spin-button {
	height: auto;
}

/**
1. Correct the odd appearance in Chrome and Safari.
2. Correct the outline style in Safari.
*/

[type='search'] {
	-webkit-appearance: textfield; /* 1 */
	outline-offset: -2px; /* 2 */
}

/**
Remove the inner padding in Chrome and Safari on macOS.
*/

::-webkit-search-decoration {
	-webkit-appearance: none;
}

/**
1. Correct the inability to style clickable types in iOS and Safari.
2. Change font properties to 'inherit' in Safari.
*/

::-webkit-file-upload-button {
	-webkit-appearance: button; /* 1 */
	font: inherit; /* 2 */
}

/*
Interactive
===========
*/

/*
Add the correct display in Chrome and Safari.
*/

summary {
	display: list-item;
}/**
 * Manually forked from SUIT CSS Base: https://github.com/suitcss/base
 * A thin layer on top of normalize.css that provides a starting point more
 * suitable for web applications.
 */

/**
 * Removes the default spacing and border for appropriate elements.
 */

blockquote,
dl,
dd,
h1,
h2,
h3,
h4,
h5,
h6,
hr,
figure,
p,
pre {
  margin: 0;
}

button {
  background-color: transparent;
  background-image: none;
}

fieldset {
  margin: 0;
  padding: 0;
}

ol,
ul {
  list-style: none;
  margin: 0;
  padding: 0;
}

/**
 * Tailwind custom reset styles
 */

/**
 * 1. Use the user's configured `sans` font-family (with Tailwind's default
 *    sans-serif font stack as a fallback) as a sane default.
 * 2. Use Tailwind's default "normal" line-height so the user isn't forced
 *    to override it to ensure consistency even when using the default theme.
 */

html {
  font-family: Inter var, ui-sans-serif, system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji"; /* 1 */
  line-height: 1.5; /* 2 */
}


/**
 * Inherit font-family and line-height from `html` so users can set them as
 * a class directly on the `html` element.
 */

body {
  font-family: inherit;
  line-height: inherit;
}

/**
 * 1. Prevent padding and border from affecting element width.
 *
 *    We used to set this in the html element and inherit from
 *    the parent element for everything else. This caused issues
 *    in shadow-dom-enhanced elements like <details> where the content
 *    is wrapped by a div with box-sizing set to `content-box`.
 *
 *    https://github.com/mozdevs/cssremedy/issues/4
 *
 *
 * 2. Allow adding a border to an element by just adding a border-width.
 *
 *    By default, the way the browser specifies that an element should have no
 *    border is by setting it's border-style to `none` in the user-agent
 *    stylesheet.
 *
 *    In order to easily add borders to elements by just setting the `border-width`
 *    property, we change the default border-style for all elements to `solid`, and
 *    use border-width to hide them instead. This way our `border` utilities only
 *    need to set the `border-width` property instead of the entire `border`
 *    shorthand, making our border utilities much more straightforward to compose.
 *
 *    https://github.com/tailwindcss/tailwindcss/pull/116
 */

*,
::before,
::after {
  box-sizing: border-box; /* 1 */
  border-width: 0; /* 2 */
  border-style: solid; /* 2 */
  border-color: currentColor; /* 2 */
}

/*
 * Ensure horizontal rules are visible by default
 */

hr {
  border-top-width: 1px;
}

/**
 * Undo the `border-style: none` reset that Normalize applies to images so that
 * our `border-{width}` utilities have the expected effect.
 *
 * The Normalize reset is unnecessary for us since we default the border-width
 * to 0 on all elements.
 *
 * https://github.com/tailwindcss/tailwindcss/issues/362
 */

img {
  border-style: solid;
}

textarea {
  resize: vertical;
}

input::-moz-placeholder, textarea::-moz-placeholder {
  opacity: 1;
  color: #9ca3af;
}

input:-ms-input-placeholder, textarea:-ms-input-placeholder {
  opacity: 1;
  color: #9ca3af;
}

input::placeholder,
textarea::placeholder {
  opacity: 1;
  color: #9ca3af;
}

button,
[role="button"] {
  cursor: pointer;
}

/**
 * Override legacy focus reset from Normalize with modern Firefox focus styles.
 *
 * This is actually an improvement over the new defaults in Firefox in our testing,
 * as it triggers the better focus styles even for links, which still use a dotted
 * outline in Firefox by default.
 */
 
:-moz-focusring {
	outline: auto;
}

table {
  border-collapse: collapse;
}

h1,
h2,
h3,
h4,
h5,
h6 {
  font-size: inherit;
  font-weight: inherit;
}

/**
 * Reset links to optimize for opt-in styling instead of
 * opt-out.
 */

a {
  color: inherit;
  text-decoration: inherit;
}

/**
 * Reset form element properties that are easy to forget to
 * style explicitly so you don't inadvertently introduce
 * styles that deviate from your design system. These styles
 * supplement a partial reset that is already applied by
 * normalize.css.
 */

button,
input,
optgroup,
select,
textarea {
  padding: 0;
  line-height: inherit;
  color: inherit;
}

/**
 * Use the configured 'mono' font family for elements that
 * are expected to be rendered with a monospace font, falling
 * back to the system monospace stack if there is no configured
 * 'mono' font family.
 */

pre,
code,
kbd,
samp {
  font-family: ui-monospace, SFMono-Regular, Menlo, Monaco, Consolas, "Liberation Mono", "Courier New", monospace;
}

/**
 * 1. Make replaced elements `display: block` by default as that's
 *    the behavior you want almost all of the time. Inspired by
 *    CSS Remedy, with `svg` added as well.
 *
 *    https://github.com/mozdevs/cssremedy/issues/14
 * 
 * 2. Add `vertical-align: middle` to align replaced elements more
 *    sensibly by default when overriding `display` by adding a
 *    utility like `inline`.
 *
 *    This can trigger a poorly considered linting error in some
 *    tools but is included by design.
 * 
 *    https://github.com/jensimmons/cssremedy/issues/14#issuecomment-634934210
 */

img,
svg,
video,
canvas,
audio,
iframe,
embed,
object {
  display: block; /* 1 */
  vertical-align: middle; /* 2 */
}

/**
 * Constrain images and videos to the parent width and preserve
 * their intrinsic aspect ratio.
 *
 * https://github.com/mozdevs/cssremedy/issues/14
 */

img,
video {
  max-width: 100%;
  height: auto;
}

/**
 * Ensure the default browser behavior of the `hidden` attribute.
 */

[hidden] {
  display: none;
}

*, ::before, ::after {
	--tw-translate-x: 0;
	--tw-translate-y: 0;
	--tw-rotate: 0;
	--tw-skew-x: 0;
	--tw-skew-y: 0;
	--tw-scale-x: 1;
	--tw-scale-y: 1;
	--tw-transform: translateX(var(--tw-translate-x)) translateY(var(--tw-translate-y)) rotate(var(--tw-rotate)) skewX(var(--tw-skew-x)) skewY(var(--tw-skew-y)) scaleX(var(--tw-scale-x)) scaleY(var(--tw-scale-y));
	--tw-border-opacity: 1;
	border-color: rgba(229, 231, 235, var(--tw-border-opacity));
	--tw-ring-offset-shadow: 0 0 #0000;
	--tw-ring-shadow: 0 0 #0000;
	--tw-shadow: 0 0 #0000;
	--tw-ring-inset: var(--tw-empty,/*!*/ /*!*/);
	--tw-ring-offset-width: 0px;
	--tw-ring-offset-color: #fff;
	--tw-ring-color: rgba(59, 130, 246, 0.5);
	--tw-ring-offset-shadow: 0 0 #0000;
	--tw-ring-shadow: 0 0 #0000;
	--tw-shadow: 0 0 #0000;
	--tw-blur: var(--tw-empty,/*!*/ /*!*/);
	--tw-brightness: var(--tw-empty,/*!*/ /*!*/);
	--tw-contrast: var(--tw-empty,/*!*/ /*!*/);
	--tw-grayscale: var(--tw-empty,/*!*/ /*!*/);
	--tw-hue-rotate: var(--tw-empty,/*!*/ /*!*/);
	--tw-invert: var(--tw-empty,/*!*/ /*!*/);
	--tw-saturate: var(--tw-empty,/*!*/ /*!*/);
	--tw-sepia: var(--tw-empty,/*!*/ /*!*/);
	--tw-drop-shadow: var(--tw-empty,/*!*/ /*!*/);
	--tw-filter: var(--tw-blur) var(--tw-brightness) var(--tw-contrast) var(--tw-grayscale) var(--tw-hue-rotate) var(--tw-invert) var(--tw-saturate) var(--tw-sepia) var(--tw-drop-shadow);
}

[type='text'],[type='email'],[type='url'],[type='password'],[type='number'],[type='date'],[type='datetime-local'],[type='month'],[type='search'],[type='tel'],[type='time'],[type='week'],[multiple],textarea,select {
	-webkit-appearance: none;
	   -moz-appearance: none;
	        appearance: none;
	background-color: #fff;
	border-color: #6b7280;
	border-width: 1px;
	border-radius: 0px;
	padding-top: 0.5rem;
	padding-right: 0.75rem;
	padding-bottom: 0.5rem;
	padding-left: 0.75rem;
	font-size: 1rem;
	line-height: 1.5rem;
	--tw-shadow: 0 0 #0000;
}

[type='text']:focus, [type='email']:focus, [type='url']:focus, [type='password']:focus, [type='number']:focus, [type='date']:focus, [type='datetime-local']:focus, [type='month']:focus, [type='search']:focus, [type='tel']:focus, [type='time']:focus, [type='week']:focus, [multiple]:focus, textarea:focus, select:focus {
	outline: 2px solid transparent;
	outline-offset: 2px;
	--tw-ring-inset: var(--tw-empty,/*!*/ /*!*/);
	--tw-ring-offset-width: 0px;
	--tw-ring-offset-color: #fff;
	--tw-ring-color: #2563eb;
	--tw-ring-offset-shadow: var(--tw-ring-inset) 0 0 0 var(--tw-ring-offset-width) var(--tw-ring-offset-color);
	--tw-ring-shadow: var(--tw-ring-inset) 0 0 0 calc(1px + var(--tw-ring-offset-width)) var(--tw-ring-color);
	box-shadow: var(--tw-ring-offset-shadow), var(--tw-ring-shadow), var(--tw-shadow);
	border-color: #2563eb;
}

input::-moz-placeholder, textarea::-moz-placeholder {
	color: #6b7280;
	opacity: 1;
}

input:-ms-input-placeholder, textarea:-ms-input-placeholder {
	color: #6b7280;
	opacity: 1;
}

input::placeholder,textarea::placeholder {
	color: #6b7280;
	opacity: 1;
}

::-webkit-datetime-edit-fields-wrapper {
	padding: 0;
}

::-webkit-date-and-time-value {
	min-height: 1.5em;
}

select {
	background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 20 20'%3e%3cpath stroke='%236b7280' stroke-linecap='round' stroke-linejoin='round' stroke-width='1.5' d='M6 8l4 4 4-4'/%3e%3c/svg%3e");
	background-position: right 0.5rem center;
	background-repeat: no-repeat;
	background-size: 1.5em 1.5em;
	padding-right: 2.5rem;
	-webkit-print-color-adjust: exact;
	        color-adjust: exact;
}

[multiple] {
	background-image: initial;
	background-position: initial;
	background-repeat: unset;
	background-size: initial;
	padding-right: 0.75rem;
	-webkit-print-color-adjust: unset;
	        color-adjust: unset;
}

[type='checkbox'],[type='radio'] {
	-webkit-appearance: none;
	   -moz-appearance: none;
	        appearance: none;
	padding: 0;
	-webkit-print-color-adjust: exact;
	        color-adjust: exact;
	display: inline-block;
	vertical-align: middle;
	background-origin: border-box;
	-webkit-user-select: none;
	   -moz-user-select: none;
	    -ms-user-select: none;
	        user-select: none;
	flex-shrink: 0;
	height: 1rem;
	width: 1rem;
	color: #2563eb;
	background-color: #fff;
	border-color: #6b7280;
	border-width: 1px;
	--tw-shadow: 0 0 #0000;
}

[type='checkbox'] {
	border-radius: 0px;
}

[type='radio'] {
	border-radius: 100%;
}

[type='checkbox']:focus,[type='radio']:focus {
	outline: 2px solid transparent;
	outline-offset: 2px;
	--tw-ring-inset: var(--tw-empty,/*!*/ /*!*/);
	--tw-ring-offset-width: 2px;
	--tw-ring-offset-color: #fff;
	--tw-ring-color: #2563eb;
	--tw-ring-offset-shadow: var(--tw-ring-inset) 0 0 0 var(--tw-ring-offset-width) var(--tw-ring-offset-color);
	--tw-ring-shadow: var(--tw-ring-inset) 0 0 0 calc(2px + var(--tw-ring-offset-width)) var(--tw-ring-color);
	box-shadow: var(--tw-ring-offset-shadow), var(--tw-ring-shadow), var(--tw-shadow);
}

[type='checkbox']:checked,[type='radio']:checked {
	border-color: transparent;
	background-color: currentColor;
	background-size: 100% 100%;
	background-position: center;
	background-repeat: no-repeat;
}

[type='checkbox']:checked {
	background-image: url("data:image/svg+xml,%3csvg viewBox='0 0 16 16' fill='white' xmlns='http://www.w3.org/2000/svg'%3e%3cpath d='M12.207 4.793a1 1 0 010 1.414l-5 5a1 1 0 01-1.414 0l-2-2a1 1 0 011.414-1.414L6.5 9.086l4.293-4.293a1 1 0 011.414 0z'/%3e%3c/svg%3e");
}

[type='radio']:checked {
	background-image: url("data:image/svg+xml,%3csvg viewBox='0 0 16 16' fill='white' xmlns='http://www.w3.org/2000/svg'%3e%3ccircle cx='8' cy='8' r='3'/%3e%3c/svg%3e");
}

[type='checkbox']:checked:hover,[type='checkbox']:checked:focus,[type='radio']:checked:hover,[type='radio']:checked:focus {
	border-color: transparent;
	background-color: currentColor;
}

[type='checkbox']:indeterminate {
	background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 16 16'%3e%3cpath stroke='white' stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M4 8h8'/%3e%3c/svg%3e");
	border-color: transparent;
	background-color: currentColor;
	background-size: 100% 100%;
	background-position: center;
	background-repeat: no-repeat;
}

[type='checkbox']:indeterminate:hover,[type='checkbox']:indeterminate:focus {
	border-color: transparent;
	background-color: currentColor;
}

[type='file'] {
	background: unset;
	border-color: inherit;
	border-width: 0;
	border-radius: 0;
	padding: 0;
	font-size: unset;
	line-height: inherit;
}

[type='file']:focus {
	outline: 1px auto -webkit-focus-ring-color;
}
.container {
	width: 100%;
}
@media (min-width: 640px) {

	.container {
		max-width: 640px;
	}
}
@media (min-width: 768px) {

	.container {
		max-width: 768px;
	}
}
@media (min-width: 1024px) {

	.container {
		max-width: 1024px;
	}
}
@media (min-width: 1280px) {

	.container {
		max-width: 1280px;
	}
}
@media (min-width: 1536px) {

	.container {
		max-width: 1536px;
	}
}
.sr-only {
	position: absolute;
	width: 1px;
	height: 1px;
	padding: 0;
	margin: -1px;
	overflow: hidden;
	clip: rect(0, 0, 0, 0);
	white-space: nowrap;
	border-width: 0;
}
.static {
	position: static;
}
.fixed {
	position: fixed;
}
.absolute {
	position: absolute;
}
.relative {
	position: relative;
}
.left-0 {
	left: 0px;
}
.right-0 {
	right: 0px;
}
.top-0 {
	top: 0px;
}
.z-50 {
	z-index: 50;
}
.z-10 {
	z-index: 10;
}
.z-0 {
	z-index: 0;
}
.mx-auto {
	margin-left: auto;
	margin-right: auto;
}
.mt-4 {
	margin-top: 1rem;
}
.mt-3 {
	margin-top: 0.75rem;
}
.mb-4 {
	margin-bottom: 1rem;
}
.ml-3 {
	margin-left: 0.75rem;
}
.ml-2 {
	margin-left: 0.5rem;
}
.mb-2 {
	margin-bottom: 0.5rem;
}
.ml-1 {
	margin-left: 0.25rem;
}
.ml-0\.5 {
	margin-left: 0.125rem;
}
.ml-0 {
	margin-left: 0px;
}
.mb-3 {
	margin-bottom: 0.75rem;
}
.-mr-1 {
	margin-right: -0.25rem;
}
.mt-2 {
	margin-top: 0.5rem;
}
.mb-6 {
	margin-bottom: 1.5rem;
}
.mr-0 {
	margin-right: 0px;
}
.mt-0 {
	margin-top: 0px;
}
.mb-0 {
	margin-bottom: 0px;
}
.mb-1 {
	margin-bottom: 0.25rem;
}
.-ml-px {
	margin-left: -1px;
}
.mt-6 {
	margin-top: 1.5rem;
}
.mb-8 {
	margin-bottom: 2rem;
}
.mr-2 {
	margin-right: 0.5rem;
}
.ml-4 {
	margin-left: 1rem;
}
.mt-8 {
	margin-top: 2rem;
}
.ml-12 {
	margin-left: 3rem;
}
.-mt-px {
	margin-top: -1px;
}
.block {
	display: block;
}
.inline-block {
	display: inline-block;
}
.inline {
	display: inline;
}
.flex {
	display: flex;
}
.inline-flex {
	display: inline-flex;
}
.table {
	display: table;
}
.table-cell {
	display: table-cell;
}
.grid {
	display: grid;
}
.contents {
	display: contents;
}
.hidden {
	display: none;
}
.h-5 {
	height: 1.25rem;
}
.h-3 {
	height: 0.75rem;
}
.h-4 {
	height: 1rem;
}
.h-2 {
	height: 0.5rem;
}
.h-6 {
	height: 1.5rem;
}
.h-8 {
	height: 2rem;
}
.h-16 {
	height: 4rem;
}
.min-h-screen {
	min-height: 100vh;
}
.w-1 {
	width: 0.25rem;
}
.w-5 {
	width: 1.25rem;
}
.w-3 {
	width: 0.75rem;
}
.w-4 {
	width: 1rem;
}
.w-2 {
	width: 0.5rem;
}
.w-full {
	width: 100%;
}
.w-6 {
	width: 1.5rem;
}
.w-8 {
	width: 2rem;
}
.w-auto {
	width: auto;
}
.min-w-full {
	min-width: 100%;
}
.max-w-xl {
	max-width: 36rem;
}
.max-w-6xl {
	max-width: 72rem;
}
.flex-1 {
	flex: 1 1 0%;
}
.flex-shrink-0 {
	flex-shrink: 0;
}
.table-auto {
	table-layout: auto;
}
.origin-top-left {
	transform-origin: top left;
}
.origin-top-right {
	transform-origin: top right;
}
.scale-95 {
	--tw-scale-x: .95;
	--tw-scale-y: .95;
	transform: var(--tw-transform);
}
.scale-100 {
	--tw-scale-x: 1;
	--tw-scale-y: 1;
	transform: var(--tw-transform);
}
.transform {
	transform: var(--tw-transform);
}
.cursor-pointer {
	cursor: pointer;
}
.cursor-default {
	cursor: default;
}
.select-none {
	-webkit-user-select: none;
	   -moz-user-select: none;
	    -ms-user-select: none;
	        user-select: none;
}
.select-all {
	-webkit-user-select: all;
	   -moz-user-select: all;
	        user-select: all;
}
.resize {
	resize: both;
}
.grid-cols-1 {
	grid-template-columns: repeat(1, minmax(0, 1fr));
}
.flex-row {
	flex-direction: row;
}
.flex-col {
	flex-direction: column;
}
.flex-wrap {
	flex-wrap: wrap;
}
.items-center {
	align-items: center;
}
.justify-start {
	justify-content: flex-start;
}
.justify-center {
	justify-content: center;
}
.justify-between {
	justify-content: space-between;
}
.gap-6 {
	gap: 1.5rem;
}
/* .space-y-4 > :not([hidden]) ~ :not([hidden]) {
	--tw-space-y-reverse: 0;
	margin-top: calc(1rem * calc(1 - var(--tw-space-y-reverse)));
	margin-bottom: calc(1rem * var(--tw-space-y-reverse));
}
.space-x-2 > :not([hidden]) ~ :not([hidden]) {
	--tw-space-x-reverse: 0;
	margin-right: calc(0.5rem * var(--tw-space-x-reverse));
	margin-left: calc(0.5rem * calc(1 - var(--tw-space-x-reverse)));
}
.space-x-1 > :not([hidden]) ~ :not([hidden]) {
	--tw-space-x-reverse: 0;
	margin-right: calc(0.25rem * var(--tw-space-x-reverse));
	margin-left: calc(0.25rem * calc(1 - var(--tw-space-x-reverse)));
}
.space-y-1 > :not([hidden]) ~ :not([hidden]) {
	--tw-space-y-reverse: 0;
	margin-top: calc(0.25rem * calc(1 - var(--tw-space-y-reverse)));
	margin-bottom: calc(0.25rem * var(--tw-space-y-reverse));
} */
/* .divide-y > :not([hidden]) ~ :not([hidden]) {
	--tw-divide-y-reverse: 0;
	border-top-width: calc(1px * calc(1 - var(--tw-divide-y-reverse)));
	border-bottom-width: calc(1px * var(--tw-divide-y-reverse));
}
.divide-gray-200 > :not([hidden]) ~ :not([hidden]) {
	--tw-divide-opacity: 1;
	border-color: rgba(229, 231, 235, var(--tw-divide-opacity));
}
.divide-gray-100 > :not([hidden]) ~ :not([hidden]) {
	--tw-divide-opacity: 1;
	border-color: rgba(243, 244, 246, var(--tw-divide-opacity));
} */
.overflow-auto {
	overflow: auto;
}
.overflow-hidden {
	overflow: hidden;
}
.overflow-y-scroll {
	overflow-y: scroll;
}
.whitespace-nowrap {
	white-space: nowrap;
}
.rounded-md {
	border-radius: 0.375rem;
}
.rounded-full {
	border-radius: 9999px;
}
.rounded-none {
	border-radius: 0px;
}
.rounded {
	border-radius: 0.25rem;
}
.rounded-sm {
	border-radius: 0.125rem;
}
.rounded-l-md {
	border-top-left-radius: 0.375rem;
	border-bottom-left-radius: 0.375rem;
}
.rounded-r-md {
	border-top-right-radius: 0.375rem;
	border-bottom-right-radius: 0.375rem;
}
.border {
	border-width: 1px;
}
.border-b {
	border-bottom-width: 1px;
}
.border-l-0 {
	border-left-width: 0px;
}
.border-t {
	border-top-width: 1px;
}
.border-r {
	border-right-width: 1px;
}
.border-gray-200 {
	--tw-border-opacity: 1;
	border-color: rgba(229, 231, 235, var(--tw-border-opacity));
}
.border-gray-300 {
	--tw-border-opacity: 1;
	border-color: rgba(209, 213, 219, var(--tw-border-opacity));
}
.border-gray-100 {
	--tw-border-opacity: 1;
	border-color: rgba(243, 244, 246, var(--tw-border-opacity));
}
.border-transparent {
	border-color: transparent;
}
.border-gray-400 {
	--tw-border-opacity: 1;
	border-color: rgba(156, 163, 175, var(--tw-border-opacity));
}
.bg-gray-50 {
	--tw-bg-opacity: 1;
	background-color: rgba(249, 250, 251, var(--tw-bg-opacity));
}
.bg-white {
	--tw-bg-opacity: 1;
	background-color: rgba(255, 255, 255, var(--tw-bg-opacity));
}
.bg-red-100 {
	--tw-bg-opacity: 1;
	background-color: rgba(254, 226, 226, var(--tw-bg-opacity));
}
.bg-indigo-100 {
	--tw-bg-opacity: 1;
	background-color: rgba(224, 231, 255, var(--tw-bg-opacity));
}
.bg-gray-100 {
	--tw-bg-opacity: 1;
	background-color: rgba(243, 244, 246, var(--tw-bg-opacity));
}
.bg-indigo-50 {
	--tw-bg-opacity: 1;
	background-color: rgba(238, 242, 255, var(--tw-bg-opacity));
}
.bg-gray-700 {
	--tw-bg-opacity: 1;
	background-color: rgba(55, 65, 81, var(--tw-bg-opacity));
}
.bg-gray-800 {
	--tw-bg-opacity: 1;
	background-color: rgba(31, 41, 55, var(--tw-bg-opacity));
}
.p-0\.5 {
	padding: 0.125rem;
}
.p-0 {
	padding: 0px;
}
.p-1 {
	padding: 0.25rem;
}
.p-4 {
	padding: 1rem;
}
.p-2 {
	padding: 0.5rem;
}
.p-3 {
	padding: 0.75rem;
}
.p-6 {
	padding: 1.5rem;
}
.px-0\.5 {
	padding-left: 0.125rem;
	padding-right: 0.125rem;
}
.px-0 {
	padding-left: 0px;
	padding-right: 0px;
}
.px-4 {
	padding-left: 1rem;
	padding-right: 1rem;
}
.py-8 {
	padding-top: 2rem;
	padding-bottom: 2rem;
}
.px-6 {
	padding-left: 1.5rem;
	padding-right: 1.5rem;
}
.py-4 {
	padding-top: 1rem;
	padding-bottom: 1rem;
}
.py-3 {
	padding-top: 0.75rem;
	padding-bottom: 0.75rem;
}
.px-2\.5 {
	padding-left: 0.625rem;
	padding-right: 0.625rem;
}
.py-0\.5 {
	padding-top: 0.125rem;
	padding-bottom: 0.125rem;
}
.px-2 {
	padding-left: 0.5rem;
	padding-right: 0.5rem;
}
.py-0 {
	padding-top: 0px;
	padding-bottom: 0px;
}
.py-2 {
	padding-top: 0.5rem;
	padding-bottom: 0.5rem;
}
.px-3 {
	padding-left: 0.75rem;
	padding-right: 0.75rem;
}
.py-1 {
	padding-top: 0.25rem;
	padding-bottom: 0.25rem;
}
.pt-4 {
	padding-top: 1rem;
}
.pb-2 {
	padding-bottom: 0.5rem;
}
.pt-3 {
	padding-top: 0.75rem;
}
.pl-0 {
	padding-left: 0px;
}
.pt-8 {
	padding-top: 2rem;
}
.text-left {
	text-align: left;
}
.text-center {
	text-align: center;
}
.text-right {
	text-align: right;
}
.text-xs {
	font-size: 0.75rem;
	line-height: 1rem;
}
.text-sm {
	font-size: 0.875rem;
	line-height: 1.25rem;
}
.text-lg {
	font-size: 1.125rem;
	line-height: 1.75rem;
}
.text-xl {
	font-size: 1.25rem;
	line-height: 1.75rem;
}
.font-medium {
	font-weight: 500;
}
.font-semibold {
	font-weight: 600;
}
.uppercase {
	text-transform: uppercase;
}
.capitalize {
	text-transform: capitalize;
}
.leading-5 {
	line-height: 1.25rem;
}
.leading-4 {
	line-height: 1rem;
}
.leading-7 {
	line-height: 1.75rem;
}
.tracking-wider {
	letter-spacing: 0.05em;
}
.tracking-widest {
	letter-spacing: 0.1em;
}
.text-red-500 {
	--tw-text-opacity: 1;
	color: rgba(239, 68, 68, var(--tw-text-opacity));
}
.text-blue-500 {
	--tw-text-opacity: 1;
	color: rgba(59, 130, 246, var(--tw-text-opacity));
}
.text-indigo-500 {
	--tw-text-opacity: 1;
	color: rgba(99, 102, 241, var(--tw-text-opacity));
}
.text-gray-700 {
	--tw-text-opacity: 1;
	color: rgba(55, 65, 81, var(--tw-text-opacity));
}
.text-red-400 {
	--tw-text-opacity: 1;
	color: rgba(248, 113, 113, var(--tw-text-opacity));
}
.text-red-800 {
	--tw-text-opacity: 1;
	color: rgba(153, 27, 27, var(--tw-text-opacity));
}
.text-gray-400 {
	--tw-text-opacity: 1;
	color: rgba(156, 163, 175, var(--tw-text-opacity));
}
.text-gray-500 {
	--tw-text-opacity: 1;
	color: rgba(107, 114, 128, var(--tw-text-opacity));
}
.text-indigo-800 {
	--tw-text-opacity: 1;
	color: rgba(55, 48, 163, var(--tw-text-opacity));
}
.text-indigo-400 {
	--tw-text-opacity: 1;
	color: rgba(129, 140, 248, var(--tw-text-opacity));
}
.text-gray-800 {
	--tw-text-opacity: 1;
	color: rgba(31, 41, 55, var(--tw-text-opacity));
}
.text-white {
	--tw-text-opacity: 1;
	color: rgba(255, 255, 255, var(--tw-text-opacity));
}
.text-indigo-600 {
	--tw-text-opacity: 1;
	color: rgba(79, 70, 229, var(--tw-text-opacity));
}
.text-green-500 {
	--tw-text-opacity: 1;
	color: rgba(16, 185, 129, var(--tw-text-opacity));
}
.text-green-600 {
	--tw-text-opacity: 1;
	color: rgba(5, 150, 105, var(--tw-text-opacity));
}
.text-yellow-600 {
	--tw-text-opacity: 1;
	color: rgba(217, 119, 6, var(--tw-text-opacity));
}
.text-blue-600 {
	--tw-text-opacity: 1;
	color: rgba(37, 99, 235, var(--tw-text-opacity));
}
.text-black {
	--tw-text-opacity: 1;
	color: rgba(0, 0, 0, var(--tw-text-opacity));
}
.text-gray-100 {
	--tw-text-opacity: 1;
	color: rgba(243, 244, 246, var(--tw-text-opacity));
}
.text-gray-200 {
	--tw-text-opacity: 1;
	color: rgba(229, 231, 235, var(--tw-text-opacity));
}
.text-gray-300 {
	--tw-text-opacity: 1;
	color: rgba(209, 213, 219, var(--tw-text-opacity));
}
.text-gray-600 {
	--tw-text-opacity: 1;
	color: rgba(75, 85, 99, var(--tw-text-opacity));
}
.text-gray-900 {
	--tw-text-opacity: 1;
	color: rgba(17, 24, 39, var(--tw-text-opacity));
}
.underline {
	text-decoration: underline;
}
.antialiased {
	-webkit-font-smoothing: antialiased;
	-moz-osx-font-smoothing: grayscale;
}
.opacity-50 {
	opacity: 0.5;
}
.opacity-0 {
	opacity: 0;
}
.opacity-100 {
	opacity: 1;
}
.shadow {
	--tw-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.1), 0 1px 2px 0 rgba(0, 0, 0, 0.06);
	box-shadow: var(--tw-ring-offset-shadow, 0 0 #0000), var(--tw-ring-shadow, 0 0 #0000), var(--tw-shadow);
}
.shadow-sm {
	--tw-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
	box-shadow: var(--tw-ring-offset-shadow, 0 0 #0000), var(--tw-ring-shadow, 0 0 #0000), var(--tw-shadow);
}
.shadow-lg {
	--tw-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
	box-shadow: var(--tw-ring-offset-shadow, 0 0 #0000), var(--tw-ring-shadow, 0 0 #0000), var(--tw-shadow);
}
.ring-1 {
	--tw-ring-offset-shadow: var(--tw-ring-inset) 0 0 0 var(--tw-ring-offset-width) var(--tw-ring-offset-color);
	--tw-ring-shadow: var(--tw-ring-inset) 0 0 0 calc(1px + var(--tw-ring-offset-width)) var(--tw-ring-color);
	box-shadow: var(--tw-ring-offset-shadow), var(--tw-ring-shadow), var(--tw-shadow, 0 0 #0000);
}
.ring-black {
	--tw-ring-opacity: 1;
	--tw-ring-color: rgba(0, 0, 0, var(--tw-ring-opacity));
}
.ring-opacity-5 {
	--tw-ring-opacity: 0.05;
}
.filter {
	filter: var(--tw-filter);
}
.transition-opacity {
	transition-property: opacity;
	transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
	transition-duration: 150ms;
}
.transition {
	transition-property: background-color, border-color, color, fill, stroke, opacity, box-shadow, transform, filter, -webkit-backdrop-filter;
	transition-property: background-color, border-color, color, fill, stroke, opacity, box-shadow, transform, filter, backdrop-filter;
	transition-property: background-color, border-color, color, fill, stroke, opacity, box-shadow, transform, filter, backdrop-filter, -webkit-backdrop-filter;
	transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
	transition-duration: 150ms;
}
.duration-300 {
	transition-duration: 300ms;
}
.duration-150 {
	transition-duration: 150ms;
}
.duration-100 {
	transition-duration: 100ms;
}
.duration-75 {
	transition-duration: 75ms;
}
.ease-in-out {
	transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
}
.ease-out {
	transition-timing-function: cubic-bezier(0, 0, 0.2, 1);
}
.ease-in {
	transition-timing-function: cubic-bezier(0.4, 0, 1, 1);
}
[x-cloak] { display: none; }
.hover\:bg-indigo-200:hover {
	--tw-bg-opacity: 1;
	background-color: rgba(199, 210, 254, var(--tw-bg-opacity));
}
.hover\:bg-gray-50:hover {
	--tw-bg-opacity: 1;
	background-color: rgba(249, 250, 251, var(--tw-bg-opacity));
}
.hover\:bg-gray-100:hover {
	--tw-bg-opacity: 1;
	background-color: rgba(243, 244, 246, var(--tw-bg-opacity));
}
.hover\:bg-gray-200:hover {
	--tw-bg-opacity: 1;
	background-color: rgba(229, 231, 235, var(--tw-bg-opacity));
}
.hover\:bg-gray-700:hover {
	--tw-bg-opacity: 1;
	background-color: rgba(55, 65, 81, var(--tw-bg-opacity));
}
.hover\:text-indigo-500:hover {
	--tw-text-opacity: 1;
	color: rgba(99, 102, 241, var(--tw-text-opacity));
}
.hover\:text-gray-500:hover {
	--tw-text-opacity: 1;
	color: rgba(107, 114, 128, var(--tw-text-opacity));
}
.hover\:text-gray-900:hover {
	--tw-text-opacity: 1;
	color: rgba(17, 24, 39, var(--tw-text-opacity));
}
.hover\:text-gray-400:hover {
	--tw-text-opacity: 1;
	color: rgba(156, 163, 175, var(--tw-text-opacity));
}
.hover\:text-gray-700:hover {
	--tw-text-opacity: 1;
	color: rgba(55, 65, 81, var(--tw-text-opacity));
}
.focus\:z-10:focus {
	z-index: 10;
}
.focus\:border-indigo-300:focus {
	--tw-border-opacity: 1;
	border-color: rgba(165, 180, 252, var(--tw-border-opacity));
}
.focus\:border-gray-300:focus {
	--tw-border-opacity: 1;
	border-color: rgba(209, 213, 219, var(--tw-border-opacity));
}
.focus\:border-blue-300:focus {
	--tw-border-opacity: 1;
	border-color: rgba(147, 197, 253, var(--tw-border-opacity));
}
.focus\:border-gray-900:focus {
	--tw-border-opacity: 1;
	border-color: rgba(17, 24, 39, var(--tw-border-opacity));
}
.focus\:bg-indigo-500:focus {
	--tw-bg-opacity: 1;
	background-color: rgba(99, 102, 241, var(--tw-bg-opacity));
}
.focus\:bg-gray-100:focus {
	--tw-bg-opacity: 1;
	background-color: rgba(243, 244, 246, var(--tw-bg-opacity));
}
.focus\:text-white:focus {
	--tw-text-opacity: 1;
	color: rgba(255, 255, 255, var(--tw-text-opacity));
}
.focus\:text-gray-900:focus {
	--tw-text-opacity: 1;
	color: rgba(17, 24, 39, var(--tw-text-opacity));
}
.focus\:text-gray-800:focus {
	--tw-text-opacity: 1;
	color: rgba(31, 41, 55, var(--tw-text-opacity));
}
.focus\:text-gray-700:focus {
	--tw-text-opacity: 1;
	color: rgba(55, 65, 81, var(--tw-text-opacity));
}
.focus\:underline:focus {
	text-decoration: underline;
}
.focus\:outline-none:focus {
	outline: 2px solid transparent;
	outline-offset: 2px;
}
.focus\:ring:focus {
	--tw-ring-offset-shadow: var(--tw-ring-inset) 0 0 0 var(--tw-ring-offset-width) var(--tw-ring-offset-color);
	--tw-ring-shadow: var(--tw-ring-inset) 0 0 0 calc(3px + var(--tw-ring-offset-width)) var(--tw-ring-color);
	box-shadow: var(--tw-ring-offset-shadow), var(--tw-ring-shadow), var(--tw-shadow, 0 0 #0000);
}
.focus\:ring-0:focus {
	--tw-ring-offset-shadow: var(--tw-ring-inset) 0 0 0 var(--tw-ring-offset-width) var(--tw-ring-offset-color);
	--tw-ring-shadow: var(--tw-ring-inset) 0 0 0 calc(0px + var(--tw-ring-offset-width)) var(--tw-ring-color);
	box-shadow: var(--tw-ring-offset-shadow), var(--tw-ring-shadow), var(--tw-shadow, 0 0 #0000);
}
.focus\:ring-indigo-200:focus {
	--tw-ring-opacity: 1;
	--tw-ring-color: rgba(199, 210, 254, var(--tw-ring-opacity));
}
.focus\:ring-gray-300:focus {
	--tw-ring-opacity: 1;
	--tw-ring-color: rgba(209, 213, 219, var(--tw-ring-opacity));
}
.focus\:ring-opacity-50:focus {
	--tw-ring-opacity: 0.5;
}
.active\:bg-gray-50:active {
	--tw-bg-opacity: 1;
	background-color: rgba(249, 250, 251, var(--tw-bg-opacity));
}
.active\:bg-gray-100:active {
	--tw-bg-opacity: 1;
	background-color: rgba(243, 244, 246, var(--tw-bg-opacity));
}
.active\:bg-gray-900:active {
	--tw-bg-opacity: 1;
	background-color: rgba(17, 24, 39, var(--tw-bg-opacity));
}
.active\:text-gray-800:active {
	--tw-text-opacity: 1;
	color: rgba(31, 41, 55, var(--tw-text-opacity));
}
.active\:text-gray-700:active {
	--tw-text-opacity: 1;
	color: rgba(55, 65, 81, var(--tw-text-opacity));
}
.active\:text-gray-500:active {
	--tw-text-opacity: 1;
	color: rgba(107, 114, 128, var(--tw-text-opacity));
}
.active\:outline-none:active {
	outline: 2px solid transparent;
	outline-offset: 2px;
}
.disabled\:cursor-wait:disabled {
	cursor: wait;
}
.disabled\:bg-gray-400:disabled {
	--tw-bg-opacity: 1;
	background-color: rgba(156, 163, 175, var(--tw-bg-opacity));
}
.disabled\:opacity-50:disabled {
	opacity: 0.5;
}
.disabled\:opacity-25:disabled {
	opacity: 0.25;
}
.disabled\:hover\:bg-gray-400:disabled:hover {
	--tw-bg-opacity: 1;
	background-color: rgba(156, 163, 175, var(--tw-bg-opacity));
}
.group:hover .group-hover\:opacity-0 {
	opacity: 0;
}
.group:hover .group-hover\:opacity-100 {
	opacity: 1;
}
/* .dark .dark\:divide-none > :not([hidden]) ~ :not([hidden]) {
	border-style: none;
}
.dark .dark\:divide-gray-600 > :not([hidden]) ~ :not([hidden]) {
	--tw-divide-opacity: 1;
	border-color: rgba(75, 85, 99, var(--tw-divide-opacity));
} */
.dark .dark\:border-gray-700 {
	--tw-border-opacity: 1;
	border-color: rgba(55, 65, 81, var(--tw-border-opacity));
}
.dark .dark\:border-red-800 {
	--tw-border-opacity: 1;
	border-color: rgba(153, 27, 27, var(--tw-border-opacity));
}
.dark .dark\:border-gray-600 {
	--tw-border-opacity: 1;
	border-color: rgba(75, 85, 99, var(--tw-border-opacity));
}
.dark .dark\:border-gray-500 {
	--tw-border-opacity: 1;
	border-color: rgba(107, 114, 128, var(--tw-border-opacity));
}
.dark .dark\:bg-gray-800 {
	--tw-bg-opacity: 1;
	background-color: rgba(31, 41, 55, var(--tw-bg-opacity));
}
.dark .dark\:bg-red-500 {
	--tw-bg-opacity: 1;
	background-color: rgba(239, 68, 68, var(--tw-bg-opacity));
}
.dark .dark\:bg-gray-900 {
	--tw-bg-opacity: 1;
	background-color: rgba(17, 24, 39, var(--tw-bg-opacity));
}
.dark .dark\:bg-gray-700 {
	--tw-bg-opacity: 1;
	background-color: rgba(55, 65, 81, var(--tw-bg-opacity));
}
.dark .dark\:bg-indigo-200 {
	--tw-bg-opacity: 1;
	background-color: rgba(199, 210, 254, var(--tw-bg-opacity));
}
.dark .dark\:bg-gray-200 {
	--tw-bg-opacity: 1;
	background-color: rgba(229, 231, 235, var(--tw-bg-opacity));
}
.dark .dark\:bg-gray-500 {
	--tw-bg-opacity: 1;
	background-color: rgba(107, 114, 128, var(--tw-bg-opacity));
}
.dark .dark\:text-white {
	--tw-text-opacity: 1;
	color: rgba(255, 255, 255, var(--tw-text-opacity));
}
.dark .dark\:text-gray-400 {
	--tw-text-opacity: 1;
	color: rgba(156, 163, 175, var(--tw-text-opacity));
}
.dark .dark\:text-indigo-900 {
	--tw-text-opacity: 1;
	color: rgba(49, 46, 129, var(--tw-text-opacity));
}
.dark .dark\:text-gray-900 {
	--tw-text-opacity: 1;
	color: rgba(17, 24, 39, var(--tw-text-opacity));
}
.dark .dark\:text-gray-500 {
	--tw-text-opacity: 1;
	color: rgba(107, 114, 128, var(--tw-text-opacity));
}
.dark .dark\:opacity-60 {
	opacity: 0.6;
}
.dark .dark\:ring-gray-600 {
	--tw-ring-opacity: 1;
	--tw-ring-color: rgba(75, 85, 99, var(--tw-ring-opacity));
}
.dark .dark\:hover\:border-gray-500:hover {
	--tw-border-opacity: 1;
	border-color: rgba(107, 114, 128, var(--tw-border-opacity));
}
.dark .dark\:hover\:bg-gray-600:hover {
	--tw-bg-opacity: 1;
	background-color: rgba(75, 85, 99, var(--tw-bg-opacity));
}
.dark .dark\:hover\:text-gray-400:hover {
	--tw-text-opacity: 1;
	color: rgba(156, 163, 175, var(--tw-text-opacity));
}
.dark .dark\:focus\:bg-gray-600:focus {
	--tw-bg-opacity: 1;
	background-color: rgba(75, 85, 99, var(--tw-bg-opacity));
}
@media (min-width: 640px) {

	.sm\:col-span-4 {
		grid-column: span 4 / span 4;
	}

	.sm\:ml-0 {
		margin-left: 0px;
	}

	.sm\:block {
		display: block;
	}

	.sm\:flex {
		display: flex;
	}

	.sm\:table-cell {
		display: table-cell;
	}

	.sm\:hidden {
		display: none;
	}

	.sm\:h-20 {
		height: 5rem;
	}

	.sm\:flex-1 {
		flex: 1 1 0%;
	}

	.sm\:grid-cols-2 {
		grid-template-columns: repeat(2, minmax(0, 1fr));
	}

	.sm\:items-center {
		align-items: center;
	}

	.sm\:justify-start {
		justify-content: flex-start;
	}

	.sm\:justify-between {
		justify-content: space-between;
	}

	/* .sm\:space-y-0 > :not([hidden]) ~ :not([hidden]) {
		--tw-space-y-reverse: 0;
		margin-top: calc(0px * calc(1 - var(--tw-space-y-reverse)));
		margin-bottom: calc(0px * var(--tw-space-y-reverse));
	} */

	.sm\:rounded-lg {
		border-radius: 0.5rem;
	}

	.sm\:px-6 {
		padding-left: 1.5rem;
		padding-right: 1.5rem;
	}

	.sm\:pt-0 {
		padding-top: 0px;
	}

	.sm\:text-left {
		text-align: left;
	}

	.sm\:text-right {
		text-align: right;
	}

	.sm\:text-sm {
		font-size: 0.875rem;
		line-height: 1.25rem;
	}

	.sm\:leading-5 {
		line-height: 1.25rem;
	}
}
@media (min-width: 768px) {

	.md\:mb-0 {
		margin-bottom: 0px;
	}

	.md\:ml-2 {
		margin-left: 0.5rem;
	}

	.md\:inline-block {
		display: inline-block;
	}

	.md\:flex {
		display: flex;
	}

	.md\:table-cell {
		display: table-cell;
	}

	.md\:hidden {
		display: none;
	}

	.md\:w-2\/4 {
		width: 50%;
	}

	.md\:w-auto {
		width: auto;
	}

	.md\:w-56 {
		width: 14rem;
	}

	.md\:w-48 {
		width: 12rem;
	}

	.md\:flex-1 {
		flex: 1 1 0%;
	}

	.md\:grid-cols-4 {
		grid-template-columns: repeat(4, minmax(0, 1fr));
	}

	.md\:grid-cols-2 {
		grid-template-columns: repeat(2, minmax(0, 1fr));
	}

	.md\:items-center {
		align-items: center;
	}

	.md\:justify-between {
		justify-content: space-between;
	}

	/* .md\:space-y-0 > :not([hidden]) ~ :not([hidden]) {
		--tw-space-y-reverse: 0;
		margin-top: calc(0px * calc(1 - var(--tw-space-y-reverse)));
		margin-bottom: calc(0px * var(--tw-space-y-reverse));
	}

	.md\:space-x-2 > :not([hidden]) ~ :not([hidden]) {
		--tw-space-x-reverse: 0;
		margin-right: calc(0.5rem * var(--tw-space-x-reverse));
		margin-left: calc(0.5rem * calc(1 - var(--tw-space-x-reverse)));
	} */

	.md\:border-t-0 {
		border-top-width: 0px;
	}

	.md\:border-l {
		border-left-width: 1px;
	}

	.md\:p-0 {
		padding: 0px;
	}

	.md\:px-6 {
		padding-left: 1.5rem;
		padding-right: 1.5rem;
	}

	.md\:py-3 {
		padding-top: 0.75rem;
		padding-bottom: 0.75rem;
	}

	.md\:text-left {
		text-align: left;
	}
}
@media (min-width: 1024px) {

	.lg\:grid-cols-6 {
		grid-template-columns: repeat(6, minmax(0, 1fr));
	}

	.lg\:px-8 {
		padding-left: 2rem;
		padding-right: 2rem;
	}
}

