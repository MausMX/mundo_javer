Vue.filter('zerofill', function (value) {
  //value = ( value < 0 ? 0 : value );
  return (value < 10 && value > -1 ? '0' : '') + value;
});
"use strict";

var Tracker = Vue.extend({
  template: "\n  <span v-show=\"show\" class=\"flip-clock__piece\">\n    <span class=\"flip-clock__card flip-card\">\n      <b class=\"flip-card__top\">{{current | zerofill}}</b>\n      <b class=\"flip-card__bottom\" data-value=\"{{current | zerofill}}\"></b>\n      <b class=\"flip-card__back\" data-value=\"{{previous | zerofill}}\"></b>\n      <b class=\"flip-card__back-bottom\" data-value=\"{{previous | zerofill}}\"></b>\n    </span>\n    <span class=\"flip-clock__slot\">{{property}}</span>\n  </span>",
  props: ['property', 'time'],
  data: function data() {
    return {
      current: 0,
      previous: 0,
      show: false
    };
  },
  events: {
    time: function time(newValue) {
      if (newValue[this.property] === undefined) {
        this.show = false;
        return;
      }

      var val = newValue[this.property];
      this.show = true;
      val = val < 0 ? 0 : val;

      if (val !== this.current) {
        this.previous = this.current;
        this.current = val;
        this.$el.classList.remove('flip');
        void this.$el.offsetWidth;
        this.$el.classList.add('flip');
      }
    }
  }
});






/*var el = document.createElement('div');
document.body.appendChild(el);*/

var el = document.createElement('div');
var el2 = document.getElementById("logo-clean").parentNode;
var sp2 = document.getElementById("logo-clean");
el2.insertBefore(el, sp2.nextSibling);
//document.body.appendChild('div.logo-clean');
"use strict";

var Countdown = new Vue({
  el: el,
  template: " \n  <div class=\"flip-clock\" data-date=\"2021-10-15 09:00:00\" @click=\"update\">\n    <tracker \n      v-for=\"tracker in trackers\"\n      :property=\"tracker\"\n      :time=\"time\"\n      v-ref:trackers\n    ></tracker>\n  </div>\n  ",
  props: ['date', 'callback'],
  data: function data() {
    return {
      time: {},
      i: 0,
      trackers: ['Días', 'Horas', 'Minutos', 'Segundos'] //'Random', 

    };
  },
  components: {
    Tracker: Tracker
  },
  beforeDestroy: function beforeDestroy() {
    if (window['cancelAnimationFrame']) {
      cancelAnimationFrame(this.frame);
    }
  },
  watch: {
    'date': function date(newVal) {
      this.setCountdown(newVal);
    }
  },
  ready: function ready() {
    if (window['requestAnimationFrame']) {
      this.setCountdown(this.date);

      this.callback = this.callback || function () {};

      this.update();
    }
  },
  methods: {
    setCountdown: function setCountdown(date) {
      if (date) {
        this.countdown = moment(date, 'YYYY-MM-DD HH:mm:ss');
      } else {
        this.countdown = moment(this.$el.getAttribute('data-date')); //this.$el.getAttribute('data-date');
      }
    },
    update: function update() {
      this.frame = requestAnimationFrame(this.update.bind(this));

      if (this.i++ % 10) {
        return;
      }

      var t = moment(new Date()); // Calculation adapted from https://www.sitepoint.com/build-javascript-countdown-timer-no-dependencies/

      if (this.countdown) {
        t = this.countdown.diff(t); //t = this.countdown.diff(t);//.getTime();
        //console.log(t);

        this.time.Días = Math.floor(t / (1000 * 60 * 60 * 24));
        this.time.Horas = Math.floor(t / (1000 * 60 * 60) % 24);
        this.time.Minutos = Math.floor(t / 1000 / 60 % 60);
        this.time.Segundos = Math.floor(t / 1000 % 60);
      } else {
        this.time.Días = undefined;
        this.time.Horas = t.Horas() % 13;
        this.time.Minutos = t.Minutos();
        this.time.Segundos = t.Segundos();
      }

      this.time.Total = t;
      this.$broadcast('time', this.time);
      return this.time;
    }
  }
});

$(function() {
	altura_wrapper_fixed();
	$(".btn-registro").click(function(){
			document.location.href=Path+"/registro";
	});
});
window.addEventListener("resize", function(){
	altura_wrapper_fixed();
		/*console.log("before"+$(".flip-clock").css("padding-left"));
	if($(window).width()>480 && $(window).width()<767){
		var pl=parseFloat($(".flip-clock").css("padding-left").slice(0,-2))+parseFloat(1.0);
		console.log("total"+pl);
		$(".contador .flip-clock").css('padding-left', parseInt(pl));
		console.log("after"+$(".flip-clock").css("padding-left"));
	}*/
	//$(".contador .flip-clock .flip-clock__slot")
	//location.reload();
},false);


function altura_wrapper_fixed(){
    altura_ventana=$(window).height();
    altura_footer=$("footer").height();
    altura_header=0;
    altura_wrapper=altura_ventana-altura_footer-altura_header;
    $(".wrapper").css({'min-height':altura_wrapper});
}