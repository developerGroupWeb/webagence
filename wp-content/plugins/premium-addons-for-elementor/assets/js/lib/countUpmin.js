!function(a,e){"function"==typeof define&&define.amd?define(e):"object"==typeof exports?module.exports=e(require,exports,module):a.CountUp=e()}(this,function(a,e,n){var t=function(a,e,n,t,i,r){function o(a){a=a.toFixed(s.decimals),a+="";var e,n,t,i;if(e=a.split("."),n=e[0],t=e.length>1?s.options.decimal+e[1]:"",i=/(\d+)(\d{3})/,s.options.useGrouping)for(;i.test(n);)n=n.replace(i,"$1"+s.options.separator+"$2");return s.options.numerals.length&&(n=n.replace(/[0-9]/g,function(a){return s.options.numerals[+a]}),t=t.replace(/[0-9]/g,function(a){return s.options.numerals[+a]})),s.options.prefix+n+t+s.options.suffix}function u(a,e,n,t){return n*(-Math.pow(2,-10*a/t)+1)*1024/1023+e}function l(a){return"number"==typeof a&&!isNaN(a)}var s=this;if(s.version=function(){return"1.9.1"},s.options={useEasing:!0,useGrouping:!0,separator:",",decimal:".",easingFn:u,formattingFn:o,prefix:"",suffix:"",numerals:[]},r&&"object"==typeof r)for(var m in s.options)r.hasOwnProperty(m)&&null!==r[m]&&(s.options[m]=r[m]);""===s.options.separator&&(s.options.useGrouping=!1);for(var d=0,c=["webkit","moz","ms","o"],f=0;f<c.length&&!window.requestAnimationFrame;++f)window.requestAnimationFrame=window[c[f]+"RequestAnimationFrame"],window.cancelAnimationFrame=window[c[f]+"CancelAnimationFrame"]||window[c[f]+"CancelRequestAnimationFrame"];window.requestAnimationFrame||(window.requestAnimationFrame=function(a,e){var n=(new Date).getTime(),t=Math.max(0,16-(n-d)),i=window.setTimeout(function(){a(n+t)},t);return d=n+t,i}),window.cancelAnimationFrame||(window.cancelAnimationFrame=function(a){clearTimeout(a)}),s.initialize=function(){return!!s.initialized||(s.error="",s.d="string"==typeof a?document.getElementById(a):a,s.d?(s.startVal=Number(e),s.endVal=Number(n),l(s.startVal)&&l(s.endVal)?(s.decimals=Math.max(0,t||0),s.dec=Math.pow(10,s.decimals),s.duration=1e3*Number(i)||2e3,s.countDown=s.startVal>s.endVal,s.frameVal=s.startVal,s.initialized=!0,!0):(s.error="[CountUp] startVal ("+e+") or endVal ("+n+") is not a number",!1)):(s.error="[CountUp] target is null or undefined",!1))},s.printValue=function(a){var e=s.options.formattingFn(a);"INPUT"===s.d.tagName?this.d.value=e:"text"===s.d.tagName||"tspan"===s.d.tagName?this.d.textContent=e:this.d.innerHTML=e},s.count=function(a){s.startTime||(s.startTime=a),s.timestamp=a;var e=a-s.startTime;s.remaining=s.duration-e,s.options.useEasing?s.countDown?s.frameVal=s.startVal-s.options.easingFn(e,0,s.startVal-s.endVal,s.duration):s.frameVal=s.options.easingFn(e,s.startVal,s.endVal-s.startVal,s.duration):s.countDown?s.frameVal=s.startVal-(s.startVal-s.endVal)*(e/s.duration):s.frameVal=s.startVal+(s.endVal-s.startVal)*(e/s.duration),s.countDown?s.frameVal=s.frameVal<s.endVal?s.endVal:s.frameVal:s.frameVal=s.frameVal>s.endVal?s.endVal:s.frameVal,s.frameVal=Math.round(s.frameVal*s.dec)/s.dec,s.printValue(s.frameVal),e<s.duration?s.rAF=requestAnimationFrame(s.count):s.callback&&s.callback()},s.start=function(a){s.initialize()&&(s.callback=a,s.rAF=requestAnimationFrame(s.count))},s.pauseResume=function(){s.paused?(s.paused=!1,delete s.startTime,s.duration=s.remaining,s.startVal=s.frameVal,requestAnimationFrame(s.count)):(s.paused=!0,cancelAnimationFrame(s.rAF))},s.reset=function(){s.paused=!1,delete s.startTime,s.initialized=!1,s.initialize()&&(cancelAnimationFrame(s.rAF),s.printValue(s.startVal))},s.update=function(a){if(s.initialize()){if(a=Number(a),!l(a))return void(s.error="[CountUp] update() - new endVal is not a number: "+a);s.error="",a!==s.frameVal&&(cancelAnimationFrame(s.rAF),s.paused=!1,delete s.startTime,s.startVal=s.frameVal,s.endVal=a,s.countDown=s.startVal>s.endVal,s.rAF=requestAnimationFrame(s.count))}},s.initialize()&&s.printValue(s.startVal)};return t});