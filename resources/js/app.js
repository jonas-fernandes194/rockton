import './bootstrap';
import Alpine from 'alpinejs';
import $ from 'jquery';
import 'select2/dist/css/select2.min.css'; 
import '../scss/app.scss';

import select2 from 'select2/dist/js/select2.full.js';

window.Alpine = Alpine;
Alpine.start();

window.$ = $;
window.jQuery = $;

select2($);

$(document).ready(function () {
    $('.select2').select2({
        placeholder: 'Selecione uma opção',
        allowClear: true,
        width: '100%',
    });
});
