require('./bootstrap');

import Alpine from 'alpinejs';
import collapse from '@alpinejs/collapse'
import Tooltip from "@ryangjchandler/alpine-tooltip";
import intersect from '@alpinejs/intersect'
Alpine.plugin(intersect)
Alpine.plugin(Tooltip);
Alpine.plugin(collapse)
window.Alpine = Alpine;

Alpine.start();