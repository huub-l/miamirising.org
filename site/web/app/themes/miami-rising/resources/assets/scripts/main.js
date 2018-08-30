import 'jquery';

// import local dependencies
import Router from './util/Router';
import common from './routes/common';
import frontPage from './routes/frontPage';
import aboutUs from './routes/about';

/** Populate Router instance with DOM routes */
const routes = new Router({
   common,
   frontPage,
   aboutUs,
});

// Load Events
jQuery(document).ready(() => routes.loadEvents());
