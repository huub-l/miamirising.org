import lozad from 'lozad';
import './../semantic-ui/visibility.js';
import './../semantic-ui/transition.js';

export default {
  init() {
    // JavaScript to be fired on all pages
    const observer = lozad('.lozad', {
        rootMargin: '250px 0px',
        threshold: 0.1,
      });
    observer.observe();
  },
  finalize() {
    // JavaScript to be fired on all pages, after page specific JS is fired
  },
};
