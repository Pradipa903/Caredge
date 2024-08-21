const mix = require('laravel-mix');
const jquery = require('jquery');
global.$ = global.jQuery = jquery;
require('jquery-ui');
