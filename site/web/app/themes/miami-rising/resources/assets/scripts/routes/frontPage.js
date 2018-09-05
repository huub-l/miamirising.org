/* eslint-disable */
import anime from 'animejs';
/* eslint-enable */

export default {
  init() {
    anime({
      targets: '#miami-rising-logo',
      opacity:1,
      duration:100,
      loop: false,
      elasticity: 0,
      delay:0,
    });
    jQuery('.anime-trigger').visibility({
      once: false,
      onBottomPassed: function() {
        anime.remove('#miami-rising-logo','#miami-rising-logo #MIAMI', '#miami-rising-logo #RISING','#fist');
        anime({
          targets: '#rise-logo #Oval',
          r: 2800,
          duration:800,
          loop: false,
          elasticity: 0,
          delay:0,
        });
        anime({
          targets: '#rise-logo g#date',
          scale: 1,
          translateX: {
            value: -50,
          },
          translateY: {
            value: -170,
          },
          duration:200,
          loop: false,
          elasticity: 0,
          delay:0,
        });
        anime({
          targets: ['#event-logo-text g#rise #Shape',
                    '#event-logo-text g#for #Shape',
                    '#event-logo-text g#climate #Shape',
                    '#event-logo-text g#jobs #Shape',
                    '#event-logo-text g#plus-sign #Shape',
                    '#event-logo-text g#justice #Shape',
                    '#event-logo-text g#city #Shape'],
          scale: 1.6,
          translateX: {
            value: -100,
          },
          translateY: {
            value: -170,
          },
          duration: 200,
          loop: false,
          elasticity: 0,
          delay: function(target, index) {
            return index * 10;
          },
        });
        anime({
          targets: '#fist',
          scale: 2,
          opacity:.3,
          translateY: {
            value: -200,
          },
          translateX: {
            value: -300,
          },
          loop: false,
          elasticity: 0,
          duration:100,
          delay:0,
        });
        anime({
          targets:      '#miami-rising-text path',
          opacity:      0.2,
          scale:        8,
          translateY: {
            value:      -50,
          },
          translateX: {
            value:      -50,
          },
          delay: function(target, index) {
            if(index==0) {
              return 0;
            }
            return index * 100;
          },
          elasticity: function(target, index, totalTargets) {
            return 100 + ((totalTargets - index) * 200);
          },
          duration:     300,
          loop:         false,
        });
        anime({
          targets: '#can-do',
          opacity: 1,
          duration: 400,
          delay:200,
          translateX: {
            value: 0,
          },
          translateY: {
            value: 0,
          },
        });
      },
      onBottomPassedReverse: function() {
       anime.remove('#miami-rising-logo','#miami-rising-logo #MIAMI', '#miami-rising-logo #RISING','#fist');
        anime({
           targets: '#rise-logo #Oval',
           r: 85.1022021,
           duration:500,
           loop: false,
           elasticity: 0,
         });
         anime({
          targets: ['#event-logo-text g#rise #Shape',
                    '#event-logo-text g#for #Shape',
                    '#event-logo-text g#climate #Shape',
                    '#event-logo-text g#jobs #Shape',
                    '#event-logo-text g#plus-sign #Shape',
                    '#event-logo-text g#justice #Shape',
                    '#event-logo-text g#city #Shape'],
           opacity:1,
           translateX: {
             value: 0,
           },
           translateY: {
             value: 0,
           },
           duration: 300,
           loop: false,
           elasticity: 0,
         });
         anime({
           targets:      ['#miami-rising-logo #MIAMI', '#miami-rising-logo #RISING'],
           opacity:      1,
           scale:        1,
           translateY: {
             value:      0,
           },
           translateX: {
             value:      0,
           },
           duration:     300,
           elasticity:   0,
           loop:         false,
         });
         anime({
           targets: '#event-logo-text g',
           scale: 1,
           loop: false,
           translateY: {
             value: 0,
           },
           translateX: {
             value: 0,
           },
           duration: 100,
           elasticity: 0,
         });
         anime({
          targets: '#rise-logo g#date',
          scale: 1,
          translateX: {
            value: 0,
          },
          translateY: {
            value: 0,
          },
          duration:200,
          loop: false,
          elasticity: 0,
          delay:0,
        });
         anime({
           targets: '#fist',
           scale: 1,
           opacity: 1,
           translateY: {
             value: -40,
           },
           translateX: {
             value: 30,
           },
           loop: false,
           elasticity: 0,
           duration:100,
         });
         anime({
          targets: '#can-do',
          opacity: 0,
          duration: 400,
          delay: 0,
          translateX: {
            value: 0,
          },
          translateY: {
            value: 0,
          },
        });
        },
    });
    jQuery('.masthead').visibility({
      once: false,
      onBottomPassed: function() {
        jQuery('.fixed.menu').transition('fade in');
      },
      onBottomPassedReverse: function() {
        jQuery('.fixed.menu').transition('fade out');
      },
    });
  },
  finalize() {
    // JavaScript to be fired on the home page, after the init JS
  },
};
