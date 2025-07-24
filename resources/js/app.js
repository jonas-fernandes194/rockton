import './bootstrap';

import Alpine from 'alpinejs';
import $ from 'jquery';
import 'select2/dist/css/select2.min.css';
import 'select2';
import '../scss/app.scss';

window.Alpine = Alpine;
Alpine.start();

// JQUERY
window.$ = $;
window.jQuery = $;