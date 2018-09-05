import lozad from 'lozad';
import './../semantic-ui/visibility.js';
import './../semantic-ui/transition.js';
import './../semantic-ui/sidebar.js';

export default {
  init() {

    const observer = lozad('.lozad', {
        rootMargin: '250px 0px',
        threshold: 0.1,
    });
    observer.observe();

    jQuery('#hamburger').click(function() {
      jQuery('.sidebar')
        .sidebar('setting','transition',{
          animation: 'fade',
          duration: '.4s'})
        .sidebar('toggle');
    });
  },
  finalize() {
    // JavaScript to be fired on all pages, after page specific JS is fired
  },
};
