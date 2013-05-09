
$(function () {
	
	Application.init ();
	
});



var Application = function () {
	
	var validationRules = getValidationRules ();
	
	return { init: init, validationRules: validationRules };
	
	function init () {
		
		enableBackToTop ();
		enableLightbox ();
		enableCirque ();
		enableEnhancedAccordion ();

	}

	function enableCirque () {
		if ($.fn.lightbox) {
			$('.ui-lightbox').lightbox ();
		}
	}

	function enableLightbox () {
		if ($.fn.cirque) {
			$('.ui-cirque').cirque ({  });
		}
	}

	function enableBackToTop () {
		var backToTop = $('<a>', { id: 'back-to-top', href: '#top' });
		var icon = $('<i>', { class: 'icon-chevron-up' });

		backToTop.appendTo ('body');
		icon.appendTo (backToTop);
		
	    backToTop.hide();

	    $(window).scroll(function () {
	        if ($(this).scrollTop() > 150) {
	            backToTop.fadeIn ();
	        } else {
	            backToTop.fadeOut ();
	        }
	    });

	    backToTop.click (function (e) {
	    	e.preventDefault ();

	        $('body, html').animate({
	            scrollTop: 0
	        }, 600);
	    });
	}
	
	function enableEnhancedAccordion () {
		$('.accordion').on('show', function (e) {
	         $(e.target).prev('.accordion-heading').parent ().addClass('open');
	    });
	
	    $('.accordion').on('hide', function (e) {
	        $(this).find('.accordion-toggle').not($(e.target)).parents ('.accordion-group').removeClass('open');
	    });
	    
	    $('.accordion').each (function () {	    	
	    	$(this).find ('.accordion-body.in').parent ().addClass ('open');
	    });
	}
	
	function getValidationRules () {
		var custom = {
	    	focusCleanup: false,
			
			wrapper: 'div',
			errorElement: 'span',
			
			highlight: function(element) {
				$(element).parents ('.control-group').removeClass ('success').addClass('error');
			},
			success: function(element) {
				$(element).parents ('.control-group').removeClass ('error').addClass('success');
				$(element).parents ('.controls:not(:has(.clean))').find ('div:last').before ('<div class="clean"></div>');
			},
			errorPlacement: function(error, element) {
				error.appendTo(element.parents ('.controls'));
			}
	    	
	    };
	    
	    return custom;
	}
	
}();
/**
* hoverIntent r6 // 2011.02.26 // jQuery 1.5.1+
* <http://cherne.net/brian/resources/jquery.hoverIntent.html>
* 
* @param  f  onMouseOver function || An object with configuration options
* @param  g  onMouseOut function  || Nothing (use configuration options object)
* @author    Brian Cherne brian(at)cherne(dot)net
*/
(function($){$.fn.hoverIntent=function(f,g){var cfg={sensitivity:7,interval:100,timeout:0};cfg=$.extend(cfg,g?{over:f,out:g}:f);var cX,cY,pX,pY;var track=function(ev){cX=ev.pageX;cY=ev.pageY};var compare=function(ev,ob){ob.hoverIntent_t=clearTimeout(ob.hoverIntent_t);if((Math.abs(pX-cX)+Math.abs(pY-cY))<cfg.sensitivity){$(ob).unbind("mousemove",track);ob.hoverIntent_s=1;return cfg.over.apply(ob,[ev])}else{pX=cX;pY=cY;ob.hoverIntent_t=setTimeout(function(){compare(ev,ob)},cfg.interval)}};var delay=function(ev,ob){ob.hoverIntent_t=clearTimeout(ob.hoverIntent_t);ob.hoverIntent_s=0;return cfg.out.apply(ob,[ev])};var handleHover=function(e){var ev=jQuery.extend({},e);var ob=this;if(ob.hoverIntent_t){ob.hoverIntent_t=clearTimeout(ob.hoverIntent_t)}if(e.type=="mouseenter"){pX=ev.pageX;pY=ev.pageY;$(ob).bind("mousemove",track);if(ob.hoverIntent_s!=1){ob.hoverIntent_t=setTimeout(function(){compare(ev,ob)},cfg.interval)}}else{$(ob).unbind("mousemove",track);if(ob.hoverIntent_s==1){ob.hoverIntent_t=setTimeout(function(){delay(ev,ob)},cfg.timeout)}}};return this.bind('mouseenter',handleHover).bind('mouseleave',handleHover)}})(jQuery);
/*!
 * jQuery Lightbox Evolution - for jQuery 1.4+
 * http://codecanyon.net/item/jquery-lightbox-evolution/115655?ref=aeroalquimia
 *
 * Copyright (c) 2013, Eduardo Daniel Sada
 * Released under CodeCanyon Regular License.
 * http://codecanyon.net/licenses/regular
 *
 * Version: 1.7.0 (January 25 2013)
*/

eval(function(p,a,c,k,e,r){e=function(c){return(c<a?'':e(parseInt(c/a)))+((c=c%a)>35?String.fromCharCode(c+29):c.toString(36))};if(!''.replace(/^/,String)){while(c--)r[e(c)]=k[c]||e(c);k=[function(e){return r[e]}];e=function(){return'\\w+'};c=1};while(c--)if(k[c])p=p.replace(new RegExp('\\b'+e(c)+'\\b','g'),k[c]);return p}(';(I($,A,B,C){G D=(I(u){Q I(){Q u.7b(7a[0])}})((1A&&1A.3Q)?1A.3Q.3z():"");G E=O;F(D("6Z")>-1){F(D("6X")>-1||D("6W")>-1||D("6V")>-1){E=M}};F(D("6T")>-1){F(D("6R")>-1&&D("6P")>-1){E=M}};F(D("6L")>-1){E=M};F(D("6J 6D 6B 7")>-1){E=M};$.1i($.1C,{2x:I(x,t,b,c,d,s){F(s===C)s=1;Q c*((t=t/d-1)*t*((s+1)*t+s)+1)+b}});F(4p $.1s.3r==="4B"){$.1s.3r=I(a,b,c){2I(9.6z).6x(a,9.3p,b,c);Q 9}}$.1i({28:{49:{17:\'2J-11\',1w:{2y:6v,J:6u,H:6t},21:O,1v:{1n:0.6},1Z:{12:{1z:2S,1C:"2x"},1m:{1z:2t,1C:"2x"},R:{1z:6s,1C:"2x"},3g:{1z:2C,1C:"2x",4s:10,4w:2}},1G:{J:4D,H:4I},1b:{J:4D,H:4I},2D:{J:-1,H:-1},3P:M,2G:"1q",1y:{1e:"6r",6p:O,6m:"1a"}},K:{},29:{},2g:{},16:{},S:{11:[],P:{1m:[],31:[],1k:[],2H:[]},1l:[],16:[],1E:[],1a:[]},1f:O,1g:O,2n:"16",4F:{2E:{1d:/[^\\.]\\.(2E)\\s*$/i},3E:{1d:/3E\\.3K\\//i,Y:\'/\',18:3,1b:1,19:"1j://1M.2U.Z/1V/%15%?1S=1&V;4e=1&V;1Q=0&V;4h=1"},2U:{1d:/2U\\.Z\\/4i/i,Y:\'=\',18:1,1b:1,19:"1j://1M.2U.Z/1V/%15%?1S=1&V;4e=1&V;1Q=0&V;4h=1"},3d:{1d:/3d\\.Z/i,Y:\'/\',18:3,1b:1,19:"1j://3h.3d.Z/1U/%15%?6l=1&V;1S=1&V;6h=1&V;63=1&V;62=0&V;4t=&V;4u=1"},3j:{1d:/3j\\.Z\\/4i/i,Y:\'/\',18:4,19:"1j://1M.3j.Z/60/%15%/.2E?5Z=4E=5Y"},3k:{1d:/3k\\.Z\\/1U/i,Y:\'/\',18:4,1b:M,19:"1j://1M.3k.Z/1V/1U/%15%?4E=1&5X=5W"},5S:{1d:/2z\\.Z\\/1U\\//i,Y:\'1U/\',18:1,1b:M,19:"1j://1M.2z.Z/e/%15%"},2z:{1d:/2z\\.Z\\/1U:/i,Y:\'1U:\',18:1,19:"1j://1M.2z.Z/3C/3C.2E?1S=M&V;4u=1&V;5L=%15%"},3l:{1d:/3l\\.3F/i,Y:\'/\',18:4,19:"1j://1M.3l.3F/1G/1U/%15%?5K=%2F&V;1S=M&V;5J=%15%&V;5I=M&V;5H=0.5G&V;5F=0.5E&V;5D=5C"},34:{1d:/34\\.Z/i,Y:\'/\',18:3,19:"1j://1M.34.Z/3h/%15%"},3T:{1d:/v\\.3T\\.Z/i,Y:\'/\',18:3,19:"1j://5B.5A.Z/3h.2E?5s=%15%&V;v=1.5p"},3q:{1d:/3q\\.Z\\/5o/i,Y:\'/\',18:4,19:"1j://5m.3q.Z/%15%.5l?1S=M&V;25=24"}},4b:{3u:{1d:/3u\\.Z\\/1x/i,Y:\'?\',18:1,19:"1j://1M.3u.Z/1x/1V/?5k=5j-5h-5g-5f-5d&V;w=%J%&V;h=%H%&V;%15%"},5c:{1d:/1x\\.2b\\.3A(m|.3m)(.*)5b=c/i,Y:\'?\',18:1,19:"1j://1x.2b.Z/?3B=5a&V;%15%"},59:{1d:/1x\\.2b\\.3A(m|.3m)\\/1x\\/4A/i,Y:\'?\',18:1,19:"1j://1x.2b.Z/1x/4A?3B=1V&V;%15%"},2b:{1d:/1x\\.2b\\.3A(m|.3m)/i,Y:\'?\',18:1,19:"1j://1x.2b.Z/1x?%15%&V;3B=1V"}},2T:/\\.(?:58|57|56|55|54|53)/i,1v:{2P:I(a){9.K=a;9.U=$(\'<L 15="\'+2k 4O().4Q()+\'" X="\'+9.K.17+\'-1v"></L>\');9.U.W($.1i({},{\'2Y\':\'52\',\'1q\':0,\'1h\':0,\'1n\':0,\'1R\':\'24\',\'z-18\':9.K.2y},9.K.1w));9.U.1p("1P",$.T(I(e){F(!9.K.21&&!9.2j){F($.1T(9.K.1B)){9.K.1B()}N{9.1t()}}e.2r()},9));9.2j=M;9.3R();Q 9},3R:I(){9.4n=$(B.3S);9.4n.23(9.U)},1D:I(x,y){9.U.W({\'H\':0,\'J\':0});F(9.1J){9.1J.W({\'H\':0,\'J\':0})};G a={x:$(B).J(),y:$(B).H()};9.U.W({\'J\':\'2C%\',\'H\':y||a.y});F(9.1J){9.1J.W({\'H\':0,\'J\':0});9.1J.W({\'2Y\':\'3X\',\'1h\':0,\'1q\':0,\'J\':9.U.J(),\'H\':y||a.y})}Q 9},12:I(a){F(!9.2j){Q 9};F(9.2d){9.2d.1K()};F(9.1J){9.1J.W(\'1R\',\'3b\')};9.U.W({\'1R\':\'3b\',\'1n\':0});9.1D();9.2j=O;9.2d=9.U.42(9.K.43,9.K.1w.1n,$.T(I(){F(9.K.1w.1n){9.U.W(9.K.1w)};9.U.38(\'12\');F($.1T(a)){a()}},9));Q 9},1t:I(a){F(9.2j){Q 9};F(9.2d){9.2d.1K()};F(9.1J){9.1J.W(\'1R\',\'24\')};9.2j=M;9.2d=9.U.42(9.K.45,0,$.T(I(){9.U.38(\'1t\');F($.1T(a)){a()};9.U.W({\'H\':0,\'J\':0,\'1R\':\'24\'})},9));Q 9}},2P:I(a){9.K=$.1i(M,9.49,a);G b=9.K.17;G c=$(\'<L X="\'+b+\' \'+b+\'-2n-16"><L X="\'+b+\'-25-1q-1h"></L><L X="\'+b+\'-25-1q-46"></L><L X="\'+b+\'-25-1q-2f"></L><a X="\'+b+\'-1c-1m" 13="#1m"><1u>51</1u></a><L X="\'+b+\'-1A"><a X="\'+b+\'-1c-1h" 13="#"><1u>4c</1u></a><a X="\'+b+\'-1c-2f" 13="#"><1u>4d</1u></a></L><L X="\'+b+\'-P"><L X="\'+b+\'-P-4Z"></L><a X="\'+b+\'-1c-1h" 13="#"><1u>4c</1u></a><a X="\'+b+\'-1c-1k" 13="#"><1u>4Y</1u></a><L X="\'+b+\'-P-1O"></L><a X="\'+b+\'-1c-2f" 13="#"><1u>4d</1u></a><L X="\'+b+\'-P-36"></L></L><L X="\'+b+\'-1l"></L><L X="\'+b+\'-1a"></L><L X="\'+b+\'-25-2W-1h"></L><L X="\'+b+\'-25-2W-46"></L><L X="\'+b+\'-25-2W-2f"></L></L>\');G e=9.S;9.1v.2P({17:b,1w:9.K.1v,21:9.K.21,2y:9.K.1w.2y-1,1B:9.T(9.1m),43:(E?2t:9.K.1Z.12.1z),45:(E?2t:9.K.1Z.1m.1z)});e.11=c;e.1A=$(\'.\'+b+\'-1A\',c);e.P.L=$(\'.\'+b+\'-P\',c);e.P.1m=$(\'.\'+b+\'-1c-1m\',c);e.P.31=$(\'.\'+b+\'-1c-1h\',c);e.P.1k=$(\'.\'+b+\'-1c-1k\',c);e.P.2H=$(\'.\'+b+\'-1c-2f\',c);e.P.1O=$(\'.\'+b+\'-P-1O\',c);e.1l=$(\'.\'+b+\'-1l\',c);e.1a=$(\'.\'+b+\'-1a\',c);e.R=$(\'<L X="\'+b+\'-R"></L>\').W({\'2Y\':\'3X\',\'z-18\':9.K.1w.2y,\'1q\':-4X}).23(c);$(\'3S\').23(e.R);9.1o=$(A);9.4k();Q c},4k:I(){G a=9.1o;a[0].4W=I(){F(9.1f){9.1v.1D();F(9.R&&!9.1g){9.1W()}}};a.1p(\'1D\',9.T(I(){F(9.1f&&!E){9.1v.1D();F(9.R&&!9.1g){9.1W()}}}));a.1p(\'4V\',9.T(I(){F(9.1f&&9.R&&!9.1g&&!E){9.1W()}}));$(B).1p(\'4U\',9.T(I(e){F(9.1f){F(e.3f===27&&9.K.21===O){9.1m()}F(9.2g.4r>1){F(e.3f===37){9.S.P.31.2Q(\'1P\',e)}F(e.3f===39){9.S.P.2H.2Q(\'1P\',e)}}}}));9.S.P.1m.1p(\'1P 2N\',{"1s":"1m"},9.T(9.1s));9.S.P.1k.1p(\'1P 2N\',{"1s":"4v"},9.T(9.1s));9.1v.U.1p(\'12\',9.T(I(){$(9).2Q(\'12\')}));9.1v.U.1p(\'1t\',9.T(I(){$(9).2Q(\'1m\')}))},1s:I(e){9[e.2i.1s].2K(9);e.2r()},T:I(a){Q $.T(a,9)},4y:I(f,g,h){G j={1e:"",J:"",H:"",13:""};$.22(f,9.T(I(c,d){$.22(d,9.T(I(i,e){F((c=="1G"&&g.Y(\'?\')[0].1L(e.1d))||(c=="1b"&&g.1L(e.1d))){j.13=g;F(e.Y){G a=c=="1G"?g.Y(e.Y)[e.18].Y(\'?\')[0].Y(\'&\')[0]:g.Y(e.Y)[e.18];j.13=e.19.3s("%15%",a).3s("%J%",h.J).3s("%H%",h.H)}j.1e=e.1b?"1b":c;F(h.J){j.J=h.J;j.H=h.H}N{G b=9.32(9.K[j.1e].J,9.K[j.1e].H);j.J=b.J;j.H=b.H}Q O}}));F(!!j.1e)Q O}));Q j},4G:I(a,b){G c=9;G d=c.S.P.31;G f=c.S.P.2H;c.2g.4r=a.1H;F(a.1H>1){d.2p(\'.11\');f.2p(\'.11\');d.1p(\'1P.11 2N.11\',I(e){e.2r();a.4J(a.6a());c.12(a)});f.1p(\'1P.11 2N.11\',I(e){e.2r();a.3x(a.4T());c.12(a)});F(c.S.1A.W("1R")==="24"){c.S.P.L.12()}d.12();f.12();F(9.K.3P){F(a[1].13.1L(9.2T)){(2k 3y()).26=a[1].13}F(a[a.1H-1].13.1L(9.2T)){(2k 3y()).26=a[a.1H-1].13}}}N{d.1t();f.1t()}},4P:I(c,d){G f=9.S;f.P.1O.1r();$.22(c,9.T(I(i,a){G b=$(\'<a 13="#" X="\'+a[\'X\']+\'">\'+a[\'1a\']+\'</a>\');b.1p(\'1P\',9.T(I(e){F($.1T(a.1B)){a.1B(9.S.16.26,9,d)}e.2r()}));f.P.1O.23(b)}));f.P.L.12()},12:I(d,f,g){F(9.2e.2q(d)){Q O}G h=d[0];G i=\'\';G j=O;G k=h.13;G l=9.S;G m={x:9.1o.J(),y:9.1o.H()};G n,H;F(d.1H===1&&h.1e==="U"){i="U"}9.2h();j=9.1f;9.4o();F(j===O){9.1W()}9.4G(d,f);f=$.1i(M,{\'J\':0,\'H\':0,\'21\':0,\'3e\':\'\',\'3c\':M,\'R\':M,\'1g\':O,\'1b\':O,\'3a\':\'\',\'33\':M,\'35\':1,\'2v\':I(){},\'2Z\':I(){}},f||{},h);9.K.2v=f.2v;9.K.2Z=f.2Z;9.K.33=f.33;G o=9.4H(k);f=$.1i({},f,o);F(f.J&&(""+f.J).2a("p")>0){f.J=2X.4C((m.x-20)*f.J.4x(0,f.J.2a("p"))/2C)}F(f.H&&(""+f.H).2a("p")>0){f.H=2X.4C((m.y-20)*f.H.4x(0,f.H.2a("p"))/2C)}9.1v.K.21=f.21;G p=l.P.1k;p.1Y(9.K.17+\'-1c-2M\');p.1Y(9.K.17+\'-1c-1k\');p.2A(9.K.17+\'-1t\');9.R=!!f.R;9.1g=!!f.1g;F($.5e(f.P)){9.4P(f.P,h.U)}F(l.P.1O.4j(":1r")===O){l.P.L.12()}F(9.2e.2q(f.3e)===O){i=f.3e}N F(f.1b){i=\'1b\'}N F(k.1L(9.2T)){i=\'16\'}N{G q=9.4y({"1G":9.4F,"1b":9.4b},k,f);F(!!q.1e===M){k=q.13;i=q.1e;f.J=q.J;f.H=q.H}F(!!i===O){F(k.1L(/#/)){G r=k.5i(k.2a("#"));F($(r).1H>0){i=\'3v\';k=r}N{i=\'1y\'}}N{i=\'1y\'}}}F(i===\'16\'){l.16=2k 3y();$(l.16).4f(9.T(I(){G a=9.S.16;$(a).2p(\'4f\');F(9.1f===O){Q O}F(f.J){n=1F(f.J,10);H=1F(f.H,10);f.3c=O}N{a.J=1F(a.J*f.35,10);a.H=1F(a.H*f.35,10);F(f.1g){n=a.J;H=a.H}N{G b=9.32(a.J,a.H);n=b.J;H=b.H}}F(f.3c){F(f.1g||(!f.1g&&a.J!=n&&a.H!=H)){l.P.L.12();l.P.1k.1Y(9.K.17+\'-1t\');l.P.1k.2A(9.K.17+(f.1g?\'-1c-2M\':\'-1c-1k\'))}}l.1E=(9.2e.2q(f.1E))?O:$(\'<L X="\'+9.K.17+\'-1E"></L>\').1a(f.1E);9.3t();9.1D(n,H)}));9.S.16.5n=9.T(I(){9.2s("3Z 5q 16 5r 3K 3Y. 5t 5u 5v 5w.")});9.S.16.26=k}N F(i==\'1G\'||i==\'3v\'||i==\'1y\'||i==\'U\'){F(i==\'3v\'){G s=$(k);G t=f.5x=="5y"?s:s.5z(M).12();n=f.J>0?f.J:s.3o(M);H=f.H>0?f.H:s.3n(M);9.2m(t,n,H)}N F(i==\'1y\'){F(f.J){n=f.J;H=f.H}N{9.2s("3O 3N 3M 3L 2l 3J. 3I ?11[J]=3H&11[H]=2S 3G 2l 36 3D 2l 19.");Q O}F(9.29.1y){9.29.1y.5M()}9.29.1y=$.1y($.1i(M,{},9.K.1y,f.1y||{},{19:k,2s:9.T(I(a,b,c){9.2s("5N 5O "+a.5P+" "+c+". 5Q: "+k)}),5R:9.T(I(a){9.2m($(a),n,H)})}))}N F(i==\'1G\'){G u=9.4M(k,f.J,f.H,f.3a);9.2m($(u),f.J,f.H,\'1G\')}N F(i===\'U\'){n=f.J>0?f.J:h.U.3o(M);H=f.H>0?f.H:h.U.3n(M);9.2m(h.U,n,H)}}N F(i==\'1b\'){F(f.J){n=f.J;H=f.H}N{9.2s("3O 3N 3M 3L 2l 3J. 3I ?11[J]=3H&11[H]=2S&5T[1b]=M 3G 2l 36 3D 2l 19.");Q O}G v=\'<1b 15="5U\'+(2k 4O().4Q())+\'" 5V="0" 26="\'+k+\'" 1w="4L:0; 4K:0;"></1b>\';9.2m($(v).W({J:n,H:H}),n,H)}9.1B=$.1T(g)?g:I(e){}},3t:I(){G a=9.S;G b=a.1l;G c=9.K.17+\'-2h\';b.1p(\'1N\',9.T(I(){b.2p(\'1N\');F(9.1f===O){Q O}9.2O(\'16\');b.1r();a.1a.1r();F(a.1E){b.23(a.1E)}b.23(a.16);F(!$.2R.1n){b.1Y(c)}N{$(a.16).W("1l-4t","61(3i, 3i, 3i, 0)");$(a.16).1K().W("1n",0).2c({"1n":1},(E?2t:2S),I(){b.1Y(c)})}9.K.2v.2K(9)}))},4M:I(c,d,e,f){G g=$.1i(M,{64:"65:66-67-68-69-4S",J:d,H:e,6b:c,26:c,1w:"4L:0; 4K:0;",6c:"M",6d:"6e",6f:"6g",4q:"M",1S:"M",1e:"6i/x-6j-1G",3a:"4q=1&1S=1&6k=1"},f);G h="<2B ";G i="<1V ";G j="";$.22(g,I(a,b){F(b!==""){h+=a+"=\\""+b+"\\" ";i+=a+"=\\""+b+"\\" ";j+="<47 17=\\""+a+"\\" 6n=\\""+b+"\\"></47>"}});G k=h+">"+j+i+"></1V></2B>";Q k},2m:I(a,b,c,d){G e=9;G f=e.K;G g=e.S;G h=g.1l;e.2O("1a");e.1D(b+30,c+20);h.1p(\'1N\',I(){h.1Y(f.17+\'-2h\');g.1a.23(a);F(d=="1G"&&D("6o")>-1){g.1a.1a(a)}h.2p(\'1N\');F(f.33&&4p 44!==\'4B\'){44.6q()}f.2v.2K(9)})},1W:I(w,h){G a={x:$(9.1o).J(),y:$(9.1o).H()};G b={x:$(9.1o).41(),y:$(9.1o).4m()};G c=9.S;G d=h!=2u?h:c.11.3n();G e=w!=2u?w:c.11.3o();G y=0;G x=0;x=b.x+((a.x-e)/2);F(9.1f){y=b.y+(a.y-d)/2}N F(9.K.2G=="2W"){y=(b.y+a.y+14)}N F(9.K.2G=="1q"){y=(b.y-d)-14}N F(9.K.2G=="2f"){x=a.x;y=b.y+(a.y-d)/2}N F(9.K.2G=="1h"){x=-e;y=b.y+(a.y-d)/2}F(9.1f){F(!9.29.R){9.1I(c.R,{\'1h\':1F(x,10)},\'R\')}9.1I(c.R,{\'1q\':1F(y,10)},\'R\')}N{c.R.W({\'1h\':1F(x,10),\'1q\':1F(y,10)})}},1I:I(d,f,g,h,i){F(2L($.1s.2J)<1.8){G j=$.6w({2o:i||O,1z:(E?2t:9.K.1Z[g].1z),1C:9.K.1Z[g].1C,1N:($.1T(h)?9.T(h,9):2u)});Q d[j.2o===O?"22":"2o"](I(){F(2L($.1s.2J)>1.5){F(j.2o===O){$.6y(9)}}G c=$.1i({},j),3U=9;c.6A=$.1i({},f);c.4R={};2V(G p 6C f){17=p;c.4R[17]=c.4z&&c.4z[17]||c.1C||\'6E\'}$.22(f,I(a,b){G e=2k $.6F(3U,c,a);e.1O(e.6G(M)||0,b,"6H")});Q M})}N{d.2c(f,{2o:i||O,1z:(E?2t:9.K.1Z[g].1z),1C:9.K.1Z[g].1C,1N:($.1T(h)?9.T(h,9):2u)})}},1D:I(x,y){G a=9.S;F(9.1f){G b={x:$(9.1o).J(),y:$(9.1o).H()};G c={x:$(9.1o).41(),y:$(9.1o).4m()};G d=2X.1k((c.x+(b.x-(x+14))/2),0);G e=2X.1k((c.y+(b.y-(y+14))/2),0);9.29.R=M;9.1I(a.R.1K(),{\'1h\':(9.1g&&d<0)?0:d,\'1q\':(9.1g&&(y+14)>b.y)?c.y:e},\'R\',$.T(I(){9.R=O},9.29));9.1I(a.1a,{\'H\':y-20},\'R\');9.1I(a.11.1K(),{\'J\':(x+14),\'H\':y-20},\'R\',{},M);9.1I(a.1A,{\'J\':x},\'R\');9.1I(a.1A,{\'1q\':(y-(a.1A.H()))/2},\'R\');9.1I(a.1l.1K(),{\'J\':x,\'H\':y},\'R\',I(){$(a.1l).38(\'1N\')})}N{a.1a.W({\'H\':y-20});a.11.W({\'J\':x+14,\'H\':y-20});a.1l.W({\'J\':x,\'H\':y});a.1A.W({\'J\':x})}},1m:I(a){G b=9.S;9.1f=O;9.2g={};9.K.2Z();F(!$.2R.1n||E){b.1l.1r();b.1a.6I("1b").1X("26","");F(!$.2R.1n){6K(I(){b.1a.1t().1r().12()},2C)}N F(E){b.1a.1t().1r().12()}b.P.1O.1r();b.R.W("1R","24");9.1W()}N{b.R.2c({"1n":0,"1q":"-=40"},{2o:O,1N:(9.T(I(){b.1l.1r();b.1a.1r();b.P.1O.1r();9.1W();b.R.W({"1R":"24","1n":1,"3w":"1f"})}))})}9.1v.1t(9.T(I(){F($.1T(9.1B)){9.1B.2K(9,$.6M(a))}}));b.1l.1K(M,O).2p("1N")},4o:I(){9.1f=M;F(!$.2R.1n){9.S.R.6N(0).1w.6O("4l")}9.S.R.1K().W({1n:1,1R:"3b",3w:"1f"}).12();9.1v.12()},3g:I(){G z=9.K.1Z.3g;G x=z.4s;G d=z.1z;G t=z.2d;G o=z.4w;G l=9.S.R.2Y().1h;G e=9.S.R;2V(G i=0;i<o;i++){e.2c({1h:l+x},d,t);e.2c({1h:l-x},d,t)};e.2c({1h:l+x},d,t);e.2c({1h:l},d,t)},2O:I(a){F(a!=9.2n){G b=9.K.17+"-2n-";9.S.11.1Y(b+9.2n).2A(b+a);9.2n=a}9.S.R.W("3w","1f")},2s:I(a){6Q(a);9.1m()},4H:I(d){G e=/11\\[([^\\]]*)?\\]$/i;G f={};F(d.1L(/#/)){d=d.4g(0,d.2a("#"))}d=d.4g(d.2a(\'?\')+1).Y("&");$.22(d,I(){G a=9.Y("=");G b=a[0];G c=a[1];F(b.1L(e)){F(6S(c)){c=2L(c)}N F(c.3z()=="M"){c=M}N F(c.3z()=="O"){c=O}f[b.1L(e)[1]]=c}});Q f},32:I(x,y){G a=9.K.2D.J>0?9.K.2D.J:9.1o.J()-50;G b=9.K.2D.H>0?9.K.2D.H:9.1o.H()-50;F(x>a){y=y*(a/x);x=a;F(y>b){x=x*(b/y);y=b}}N F(y>b){x=x*(b/y);y=b;F(x>a){y=y*(a/x);x=a}}Q{J:1F(x,10),H:1F(y,10)}},2h:I(){G a=9.K.1w;G b=9.S;G c=b.1l;9.2O(\'16\');c.6U().1K(M);c.1r();b.1a.1r();b.P.L.1t();b.P.L.W("J");c.2A(9.K.17+\'-2h\');F(9.1f==O){9.1W(a["J"],a["H"]);9.1D(a["J"],a["H"])}},4v:I(){G a=9;G b=a.S.P;G c=a.S.16;G d=a.K.17;G e={};b.1k.1Y(d+\'-1c-2M \'+d+\'-1c-1k\').2A((a.1g)?d+\'-1c-1k\':d+\'-1c-2M\');a.2h();a.3t();b.L.12();F(a.1g){e=a.32(c.J,c.H)}N{e=c}a.1D(e.J,e.H);a.1g=!a.1g},2w:I(a){G a=$(a);Q $.1i({},{13:a.1X("13"),1Q:($.3W(a.1X("2i-1Q")||a.1X("1Q"))),3V:a.1X("2i-1Q")?"2i-1Q":"1Q",1E:$.3W(a.1X("2i-1E")||a.1X("1E")),U:a[0]},$.6Y(a.1X("2i-K")||"{}"))},4N:I(b,c){G d=$(c.U);G e=9.2w(d);G f=e.1Q;G g=e.3V;G h=c.K;G j=[];d.70();F(c.2g){j=c.2g}N F(9.2e.2q(f)||f===\'71\'){j=[e]}N{G k=[];G l=[];G m=O;$("a["+g+"], 72["+g+"]",9.73).4l("["+g+"=\\""+f+"\\"]").22($.T(I(i,a){F(d[0]===a){k.4J(9.2w(a));m=M}N F(m==O){l.3x(9.2w(a))}N{k.3x(9.2w(a))}},9));j=k.74(l)}$.11(j,h,c.1B,d);Q O},2e:{2q:I(a){F(a==2u)Q M;F(75.76.77.78(a)===\'[2B 79]\'||$.1e(a)==="4a")Q a.1H===0}}},11:I(a,b,c){G d=[];F($.28.2e.2q(a)){Q $.28}F($.1e(a)==="48"){d=[$.1i({},{13:a},b)]}N F($.1e(a)==="4a"){G e=a[0];F($.1e(e)==="48"){2V(G i=0;i<a.1H;i++){d[i]=$.1i({},{13:a[i]},b)}}N F($.1e(e)==="2B"){2V(G i=0;i<a.1H;i++){d[i]=$.1i({},b,a[i])}}}N F($.1e(a)==="2B"&&a[0].7c){d=[$.1i({},{1e:"U",13:"#",U:a},b)]}Q $.28.12(d,b,c)}});$.1s.11=I(a,b){G c={"3p":9.3p,"K":a,"1B":b};Q $(9).3r(\'1P\',I(e){e.2r();e.7d();Q $.T($.28.4N,$.28)(e,$.1i({},c,{"U":9}))})};$(I(){F(2L($.1s.2J)>1.3){$.28.2P()}N{7e"3Z 2I 7f 7g 7h 3Y 4j 7i 7j. 7k 7l 7m 2I 1.4+";}})})(2I,7n,7o);',62,459,'|||||||||this||||||||||||||||||||||||||||||||if|var|height|function|width|options|div|true|else|false|buttons|return|move|esqueleto|proxy|element|amp|css|class|split|com||lightbox|show|href||id|image|name|index|url|html|iframe|button|reg|type|visible|maximized|left|extend|http|max|background|close|opacity|win|bind|top|empty|fn|hide|span|overlay|style|maps|ajax|duration|navigator|callback|easing|resize|title|parseInt|flash|length|morph|shim|stop|match|www|complete|custom|click|rel|display|autoplay|isFunction|video|embed|movebox|attr|removeClass|animation||modal|each|append|none|border|src||LightBoxObject|animations|indexOf|google|animate|transition|utils|right|gallery|loading|data|hidden|new|the|appendhtml|mode|queue|unbind|isEmpty|preventDefault|error|200|null|onOpen|getOptions|easeOutBackMin|zIndex|collegehumor|addClass|object|100|maxsize|swf||emergefrom|next|jQuery|jquery|apply|parseFloat|min|touchend|changemode|create|triggerHandler|support|400|imgsreg|youtube|for|bottom|Math|position|onClose||prev|calculate|cufon|twitvid|ratio|end||trigger||flashvars|block|autoresize|vimeo|force|keyCode|shake|player|255|metacafe|dailymotion|ustream|uk|outerHeight|outerWidth|selector|vzaar|live|replace|loadimage|bing|inline|overflow|push|Image|toLowerCase|co|output|moogaloop|of|youtu|tv|at|600|Add|size|be|specify|to|have|You|preload|userAgent|inject|body|wordpress|self|relent|trim|absolute|loaded|The||scrollLeft|fadeTo|showDuration|Cufon|closeDuration|middle|param|string|defaults|array|mapsreg|Previous|Next|fs|load|slice|enablejsapi|watch|is|addevents|filter|scrollTop|target|open|typeof|autostart|total|distance|color|fullscreen|maximinimize|loops|substring|ex|specialEasing|ms|undefined|round|640|autoPlay|videoregs|create_gallery|unserialize|360|unshift|padding|margin|swf2html|link|Date|custombuttons|getTime|animatedProperties|444553540000|shift|keydown|scroll|onorientationchange|999|Maximize|init||Close|fixed|tiff|bmp|gif|jpeg|png|jpg|googlev2|svembed|layer|streetview|00b6ff19b1cb|isArray|d84a|8fec|227d|substr|3ede2bc8|emid|flashplayer|view|onerror|videos|01|requested|cannot|guid|Please|try|again|later|source|original|clone|videopress|s0|en_US|locale|6292|endPercent|5331|beginPercent|disabledComment|vid|loc|clip_id|abort|AJAX|Error|status|Url|success|collegehumornew|lighbox|IF_|frameborder|hd720|forcedQuality|yes|playerVars|fplayer|rgba|show_portrait|show_byline|classid|clsid|D27CDB6E|AE6D|11cf|96B8|pop|movie|allowFullScreen|allowscriptaccess|always|wmode|transparent|show_title|application|shockwave|fullscreenbutton|hd|dataType|value|chrome|cache|refresh|GET|700|280|470|99999|speed|on|_mark|context|curAnim|os|in|phone|swing|fx|cur|px|find|windows|setTimeout|iphone|makeArray|get|removeAttribute|mobi|alert|mini|isFinite|opera|children|htc_flyer|googletv|android|parseJSON|mobile|blur|nofollow|area|ownerDocument|concat|Object|prototype|toString|call|String|arguments|search|nodeType|stopImmediatePropagation|throw|version|that|was|too|old|Lightbox|Evolution|requires|window|document'.split('|'),0,{}));
$(function () {
	
$('.gallery-container > li').hoverIntent({
		over: showPreview,
	     timeout: 500,
	     out: hidePreview,
	     sensitivity: 4
	});
	
	function showPreview () {
		$(this).find ('.preview').fadeIn ();
	}
	
	function hidePreview () {
		$(this).find ('.preview').fadeOut ();
	}
	
	setTimeout (function () {
		$('.gallery-container > li').each (function () {
			var preview, img, width, height;
			
			preview = $(this).find ('.preview');
			img = $(this).find ('img');
			
			width = img.width ();
			height = img.height ();
			
			preview.css ({ width: width });
			preview.css ({ height: height });
			
			preview.addClass ('ui-lightbox');
		});
	}, 500);
	
});
/**
 * jQuery Validation Plugin 1.9.0
 *
 * http://bassistance.de/jquery-plugins/jquery-plugin-validation/
 * http://docs.jquery.com/Plugins/Validation
 *
 * Copyright (c) 2006 - 2011 Jörn Zaefferer
 *
 * Dual licensed under the MIT and GPL licenses:
 *   http://www.opensource.org/licenses/mit-license.php
 *   http://www.gnu.org/licenses/gpl.html
 */

(function($) {

$.extend($.fn, {
	// http://docs.jquery.com/Plugins/Validation/validate
	validate: function( options ) {

		// if nothing is selected, return nothing; can't chain anyway
		if (!this.length) {
			options && options.debug && window.console && console.warn( "nothing selected, can't validate, returning nothing" );
			return;
		}

		// check if a validator for this form was already created
		var validator = $.data(this[0], 'validator');
		if ( validator ) {
			return validator;
		}

		// Add novalidate tag if HTML5.
		this.attr('novalidate', 'novalidate');

		validator = new $.validator( options, this[0] );
		$.data(this[0], 'validator', validator);

		if ( validator.settings.onsubmit ) {

			var inputsAndButtons = this.find("input, button");

			// allow suppresing validation by adding a cancel class to the submit button
			inputsAndButtons.filter(".cancel").click(function () {
				validator.cancelSubmit = true;
			});

			// when a submitHandler is used, capture the submitting button
			if (validator.settings.submitHandler) {
				inputsAndButtons.filter(":submit").click(function () {
					validator.submitButton = this;
				});
			}

			// validate the form on submit
			this.submit( function( event ) {
				if ( validator.settings.debug )
					// prevent form submit to be able to see console output
					event.preventDefault();

				function handle() {
					if ( validator.settings.submitHandler ) {
						if (validator.submitButton) {
							// insert a hidden input as a replacement for the missing submit button
							var hidden = $("<input type='hidden'/>").attr("name", validator.submitButton.name).val(validator.submitButton.value).appendTo(validator.currentForm);
						}
						validator.settings.submitHandler.call( validator, validator.currentForm );
						if (validator.submitButton) {
							// and clean up afterwards; thanks to no-block-scope, hidden can be referenced
							hidden.remove();
						}
						return false;
					}
					return true;
				}

				// prevent submit for invalid forms or custom submit handlers
				if ( validator.cancelSubmit ) {
					validator.cancelSubmit = false;
					return handle();
				}
				if ( validator.form() ) {
					if ( validator.pendingRequest ) {
						validator.formSubmitted = true;
						return false;
					}
					return handle();
				} else {
					validator.focusInvalid();
					return false;
				}
			});
		}

		return validator;
	},
	// http://docs.jquery.com/Plugins/Validation/valid
	valid: function() {
        if ( $(this[0]).is('form')) {
            return this.validate().form();
        } else {
            var valid = true;
            var validator = $(this[0].form).validate();
            this.each(function() {
				valid &= validator.element(this);
            });
            return valid;
        }
    },
	// attributes: space seperated list of attributes to retrieve and remove
	removeAttrs: function(attributes) {
		var result = {},
			$element = this;
		$.each(attributes.split(/\s/), function(index, value) {
			result[value] = $element.attr(value);
			$element.removeAttr(value);
		});
		return result;
	},
	// http://docs.jquery.com/Plugins/Validation/rules
	rules: function(command, argument) {
		var element = this[0];

		if (command) {
			var settings = $.data(element.form, 'validator').settings;
			var staticRules = settings.rules;
			var existingRules = $.validator.staticRules(element);
			switch(command) {
			case "add":
				$.extend(existingRules, $.validator.normalizeRule(argument));
				staticRules[element.name] = existingRules;
				if (argument.messages)
					settings.messages[element.name] = $.extend( settings.messages[element.name], argument.messages );
				break;
			case "remove":
				if (!argument) {
					delete staticRules[element.name];
					return existingRules;
				}
				var filtered = {};
				$.each(argument.split(/\s/), function(index, method) {
					filtered[method] = existingRules[method];
					delete existingRules[method];
				});
				return filtered;
			}
		}

		var data = $.validator.normalizeRules(
		$.extend(
			{},
			$.validator.metadataRules(element),
			$.validator.classRules(element),
			$.validator.attributeRules(element),
			$.validator.staticRules(element)
		), element);

		// make sure required is at front
		if (data.required) {
			var param = data.required;
			delete data.required;
			data = $.extend({required: param}, data);
		}

		return data;
	}
});

// Custom selectors
$.extend($.expr[":"], {
	// http://docs.jquery.com/Plugins/Validation/blank
	blank: function(a) {return !$.trim("" + a.value);},
	// http://docs.jquery.com/Plugins/Validation/filled
	filled: function(a) {return !!$.trim("" + a.value);},
	// http://docs.jquery.com/Plugins/Validation/unchecked
	unchecked: function(a) {return !a.checked;}
});

// constructor for validator
$.validator = function( options, form ) {
	this.settings = $.extend( true, {}, $.validator.defaults, options );
	this.currentForm = form;
	this.init();
};

$.validator.format = function(source, params) {
	if ( arguments.length == 1 )
		return function() {
			var args = $.makeArray(arguments);
			args.unshift(source);
			return $.validator.format.apply( this, args );
		};
	if ( arguments.length > 2 && params.constructor != Array  ) {
		params = $.makeArray(arguments).slice(1);
	}
	if ( params.constructor != Array ) {
		params = [ params ];
	}
	$.each(params, function(i, n) {
		source = source.replace(new RegExp("\\{" + i + "\\}", "g"), n);
	});
	return source;
};

$.extend($.validator, {

	defaults: {
		messages: {},
		groups: {},
		rules: {},
		errorClass: "error",
		validClass: "valid",
		errorElement: "label",
		focusInvalid: true,
		errorContainer: $( [] ),
		errorLabelContainer: $( [] ),
		onsubmit: true,
		ignore: ":hidden",
		ignoreTitle: false,
		onfocusin: function(element, event) {
			this.lastActive = element;

			// hide error label and remove error class on focus if enabled
			if ( this.settings.focusCleanup && !this.blockFocusCleanup ) {
				this.settings.unhighlight && this.settings.unhighlight.call( this, element, this.settings.errorClass, this.settings.validClass );
				this.addWrapper(this.errorsFor(element)).hide();
			}
		},
		onfocusout: function(element, event) {
			if ( !this.checkable(element) && (element.name in this.submitted || !this.optional(element)) ) {
				this.element(element);
			}
		},
		onkeyup: function(element, event) {
			if ( element.name in this.submitted || element == this.lastElement ) {
				this.element(element);
			}
		},
		onclick: function(element, event) {
			// click on selects, radiobuttons and checkboxes
			if ( element.name in this.submitted )
				this.element(element);
			// or option elements, check parent select in that case
			else if (element.parentNode.name in this.submitted)
				this.element(element.parentNode);
		},
		highlight: function(element, errorClass, validClass) {
			if (element.type === 'radio') {
				this.findByName(element.name).addClass(errorClass).removeClass(validClass);
			} else {
				$(element).addClass(errorClass).removeClass(validClass);
			}
		},
		unhighlight: function(element, errorClass, validClass) {
			if (element.type === 'radio') {
				this.findByName(element.name).removeClass(errorClass).addClass(validClass);
			} else {
				$(element).removeClass(errorClass).addClass(validClass);
			}
		}
	},

	// http://docs.jquery.com/Plugins/Validation/Validator/setDefaults
	setDefaults: function(settings) {
		$.extend( $.validator.defaults, settings );
	},

	messages: {
		required: "This field is required.",
		remote: "Please fix this field.",
		email: "Please enter a valid email address.",
		url: "Please enter a valid URL.",
		date: "Please enter a valid date.",
		dateISO: "Please enter a valid date (ISO).",
		number: "Please enter a valid number.",
		digits: "Please enter only digits.",
		creditcard: "Please enter a valid credit card number.",
		equalTo: "Please enter the same value again.",
		accept: "Please enter a value with a valid extension.",
		maxlength: $.validator.format("Please enter no more than {0} characters."),
		minlength: $.validator.format("Please enter at least {0} characters."),
		rangelength: $.validator.format("Please enter a value between {0} and {1} characters long."),
		range: $.validator.format("Please enter a value between {0} and {1}."),
		max: $.validator.format("Please enter a value less than or equal to {0}."),
		min: $.validator.format("Please enter a value greater than or equal to {0}.")
	},

	autoCreateRanges: false,

	prototype: {

		init: function() {
			this.labelContainer = $(this.settings.errorLabelContainer);
			this.errorContext = this.labelContainer.length && this.labelContainer || $(this.currentForm);
			this.containers = $(this.settings.errorContainer).add( this.settings.errorLabelContainer );
			this.submitted = {};
			this.valueCache = {};
			this.pendingRequest = 0;
			this.pending = {};
			this.invalid = {};
			this.reset();

			var groups = (this.groups = {});
			$.each(this.settings.groups, function(key, value) {
				$.each(value.split(/\s/), function(index, name) {
					groups[name] = key;
				});
			});
			var rules = this.settings.rules;
			$.each(rules, function(key, value) {
				rules[key] = $.validator.normalizeRule(value);
			});

			function delegate(event) {
				var validator = $.data(this[0].form, "validator"),
					eventType = "on" + event.type.replace(/^validate/, "");
				validator.settings[eventType] && validator.settings[eventType].call(validator, this[0], event);
			}
			$(this.currentForm)
			       .validateDelegate("[type='text'], [type='password'], [type='file'], select, textarea, " +
						"[type='number'], [type='search'] ,[type='tel'], [type='url'], " +
						"[type='email'], [type='datetime'], [type='date'], [type='month'], " +
						"[type='week'], [type='time'], [type='datetime-local'], " +
						"[type='range'], [type='color'] ",
						"focusin focusout keyup", delegate)
				.validateDelegate("[type='radio'], [type='checkbox'], select, option", "click", delegate);

			if (this.settings.invalidHandler)
				$(this.currentForm).bind("invalid-form.validate", this.settings.invalidHandler);
		},

		// http://docs.jquery.com/Plugins/Validation/Validator/form
		form: function() {
			this.checkForm();
			$.extend(this.submitted, this.errorMap);
			this.invalid = $.extend({}, this.errorMap);
			if (!this.valid())
				$(this.currentForm).triggerHandler("invalid-form", [this]);
			this.showErrors();
			return this.valid();
		},

		checkForm: function() {
			this.prepareForm();
			for ( var i = 0, elements = (this.currentElements = this.elements()); elements[i]; i++ ) {
				this.check( elements[i] );
			}
			return this.valid();
		},

		// http://docs.jquery.com/Plugins/Validation/Validator/element
		element: function( element ) {
			element = this.validationTargetFor( this.clean( element ) );
			this.lastElement = element;
			this.prepareElement( element );
			this.currentElements = $(element);
			var result = this.check( element );
			if ( result ) {
				delete this.invalid[element.name];
			} else {
				this.invalid[element.name] = true;
			}
			if ( !this.numberOfInvalids() ) {
				// Hide error containers on last error
				this.toHide = this.toHide.add( this.containers );
			}
			this.showErrors();
			return result;
		},

		// http://docs.jquery.com/Plugins/Validation/Validator/showErrors
		showErrors: function(errors) {
			if(errors) {
				// add items to error list and map
				$.extend( this.errorMap, errors );
				this.errorList = [];
				for ( var name in errors ) {
					this.errorList.push({
						message: errors[name],
						element: this.findByName(name)[0]
					});
				}
				// remove items from success list
				this.successList = $.grep( this.successList, function(element) {
					return !(element.name in errors);
				});
			}
			this.settings.showErrors
				? this.settings.showErrors.call( this, this.errorMap, this.errorList )
				: this.defaultShowErrors();
		},

		// http://docs.jquery.com/Plugins/Validation/Validator/resetForm
		resetForm: function() {
			if ( $.fn.resetForm )
				$( this.currentForm ).resetForm();
			this.submitted = {};
			this.lastElement = null;
			this.prepareForm();
			this.hideErrors();
			this.elements().removeClass( this.settings.errorClass );
		},

		numberOfInvalids: function() {
			return this.objectLength(this.invalid);
		},

		objectLength: function( obj ) {
			var count = 0;
			for ( var i in obj )
				count++;
			return count;
		},

		hideErrors: function() {
			this.addWrapper( this.toHide ).hide();
		},

		valid: function() {
			return this.size() == 0;
		},

		size: function() {
			return this.errorList.length;
		},

		focusInvalid: function() {
			if( this.settings.focusInvalid ) {
				try {
					$(this.findLastActive() || this.errorList.length && this.errorList[0].element || [])
					.filter(":visible")
					.focus()
					// manually trigger focusin event; without it, focusin handler isn't called, findLastActive won't have anything to find
					.trigger("focusin");
				} catch(e) {
					// ignore IE throwing errors when focusing hidden elements
				}
			}
		},

		findLastActive: function() {
			var lastActive = this.lastActive;
			return lastActive && $.grep(this.errorList, function(n) {
				return n.element.name == lastActive.name;
			}).length == 1 && lastActive;
		},

		elements: function() {
			var validator = this,
				rulesCache = {};

			// select all valid inputs inside the form (no submit or reset buttons)
			return $(this.currentForm)
			.find("input, select, textarea")
			.not(":submit, :reset, :image, [disabled]")
			.not( this.settings.ignore )
			.filter(function() {
				!this.name && validator.settings.debug && window.console && console.error( "%o has no name assigned", this);

				// select only the first element for each name, and only those with rules specified
				if ( this.name in rulesCache || !validator.objectLength($(this).rules()) )
					return false;

				rulesCache[this.name] = true;
				return true;
			});
		},

		clean: function( selector ) {
			return $( selector )[0];
		},

		errors: function() {
			return $( this.settings.errorElement + "." + this.settings.errorClass, this.errorContext );
		},

		reset: function() {
			this.successList = [];
			this.errorList = [];
			this.errorMap = {};
			this.toShow = $([]);
			this.toHide = $([]);
			this.currentElements = $([]);
		},

		prepareForm: function() {
			this.reset();
			this.toHide = this.errors().add( this.containers );
		},

		prepareElement: function( element ) {
			this.reset();
			this.toHide = this.errorsFor(element);
		},

		check: function( element ) {
			element = this.validationTargetFor( this.clean( element ) );

			var rules = $(element).rules();
			var dependencyMismatch = false;
			for (var method in rules ) {
				var rule = { method: method, parameters: rules[method] };
				try {
					var result = $.validator.methods[method].call( this, element.value.replace(/\r/g, ""), element, rule.parameters );

					// if a method indicates that the field is optional and therefore valid,
					// don't mark it as valid when there are no other rules
					if ( result == "dependency-mismatch" ) {
						dependencyMismatch = true;
						continue;
					}
					dependencyMismatch = false;

					if ( result == "pending" ) {
						this.toHide = this.toHide.not( this.errorsFor(element) );
						return;
					}

					if( !result ) {
						this.formatAndAdd( element, rule );
						return false;
					}
				} catch(e) {
					this.settings.debug && window.console && console.log("exception occured when checking element " + element.id
						 + ", check the '" + rule.method + "' method", e);
					throw e;
				}
			}
			if (dependencyMismatch)
				return;
			if ( this.objectLength(rules) )
				this.successList.push(element);
			return true;
		},

		// return the custom message for the given element and validation method
		// specified in the element's "messages" metadata
		customMetaMessage: function(element, method) {
			if (!$.metadata)
				return;

			var meta = this.settings.meta
				? $(element).metadata()[this.settings.meta]
				: $(element).metadata();

			return meta && meta.messages && meta.messages[method];
		},

		// return the custom message for the given element name and validation method
		customMessage: function( name, method ) {
			var m = this.settings.messages[name];
			return m && (m.constructor == String
				? m
				: m[method]);
		},

		// return the first defined argument, allowing empty strings
		findDefined: function() {
			for(var i = 0; i < arguments.length; i++) {
				if (arguments[i] !== undefined)
					return arguments[i];
			}
			return undefined;
		},

		defaultMessage: function( element, method) {
			return this.findDefined(
				this.customMessage( element.name, method ),
				this.customMetaMessage( element, method ),
				// title is never undefined, so handle empty string as undefined
				!this.settings.ignoreTitle && element.title || undefined,
				$.validator.messages[method],
				"<strong>Warning: No message defined for " + element.name + "</strong>"
			);
		},

		formatAndAdd: function( element, rule ) {
			var message = this.defaultMessage( element, rule.method ),
				theregex = /\$?\{(\d+)\}/g;
			if ( typeof message == "function" ) {
				message = message.call(this, rule.parameters, element);
			} else if (theregex.test(message)) {
				message = jQuery.format(message.replace(theregex, '{$1}'), rule.parameters);
			}
			this.errorList.push({
				message: message,
				element: element
			});

			this.errorMap[element.name] = message;
			this.submitted[element.name] = message;
		},

		addWrapper: function(toToggle) {
			if ( this.settings.wrapper )
				toToggle = toToggle.add( toToggle.parent( this.settings.wrapper ) );
			return toToggle;
		},

		defaultShowErrors: function() {
			for ( var i = 0; this.errorList[i]; i++ ) {
				var error = this.errorList[i];
				this.settings.highlight && this.settings.highlight.call( this, error.element, this.settings.errorClass, this.settings.validClass );
				this.showLabel( error.element, error.message );
			}
			if( this.errorList.length ) {
				this.toShow = this.toShow.add( this.containers );
			}
			if (this.settings.success) {
				for ( var i = 0; this.successList[i]; i++ ) {
					this.showLabel( this.successList[i] );
				}
			}
			if (this.settings.unhighlight) {
				for ( var i = 0, elements = this.validElements(); elements[i]; i++ ) {
					this.settings.unhighlight.call( this, elements[i], this.settings.errorClass, this.settings.validClass );
				}
			}
			this.toHide = this.toHide.not( this.toShow );
			this.hideErrors();
			this.addWrapper( this.toShow ).show();
		},

		validElements: function() {
			return this.currentElements.not(this.invalidElements());
		},

		invalidElements: function() {
			return $(this.errorList).map(function() {
				return this.element;
			});
		},

		showLabel: function(element, message) {
			var label = this.errorsFor( element );
			if ( label.length ) {
				// refresh error/success class
				label.removeClass( this.settings.validClass ).addClass( this.settings.errorClass );

				// check if we have a generated label, replace the message then
				label.attr("generated") && label.html(message);
			} else {
				// create label
				label = $("<" + this.settings.errorElement + "/>")
					.attr({"for":  this.idOrName(element), generated: true})
					.addClass(this.settings.errorClass)
					.html(message || "");
				if ( this.settings.wrapper ) {
					// make sure the element is visible, even in IE
					// actually showing the wrapped element is handled elsewhere
					label = label.hide().show().wrap("<" + this.settings.wrapper + "/>").parent();
				}
				if ( !this.labelContainer.append(label).length )
					this.settings.errorPlacement
						? this.settings.errorPlacement(label, $(element) )
						: label.insertAfter(element);
			}
			if ( !message && this.settings.success ) {
				label.text("");
				typeof this.settings.success == "string"
					? label.addClass( this.settings.success )
					: this.settings.success( label );
			}
			this.toShow = this.toShow.add(label);
		},

		errorsFor: function(element) {
			var name = this.idOrName(element);
    		return this.errors().filter(function() {
				return $(this).attr('for') == name;
			});
		},

		idOrName: function(element) {
			return this.groups[element.name] || (this.checkable(element) ? element.name : element.id || element.name);
		},

		validationTargetFor: function(element) {
			// if radio/checkbox, validate first element in group instead
			if (this.checkable(element)) {
				element = this.findByName( element.name ).not(this.settings.ignore)[0];
			}
			return element;
		},

		checkable: function( element ) {
			return /radio|checkbox/i.test(element.type);
		},

		findByName: function( name ) {
			// select by name and filter by form for performance over form.find("[name=...]")
			var form = this.currentForm;
			return $(document.getElementsByName(name)).map(function(index, element) {
				return element.form == form && element.name == name && element  || null;
			});
		},

		getLength: function(value, element) {
			switch( element.nodeName.toLowerCase() ) {
			case 'select':
				return $("option:selected", element).length;
			case 'input':
				if( this.checkable( element) )
					return this.findByName(element.name).filter(':checked').length;
			}
			return value.length;
		},

		depend: function(param, element) {
			return this.dependTypes[typeof param]
				? this.dependTypes[typeof param](param, element)
				: true;
		},

		dependTypes: {
			"boolean": function(param, element) {
				return param;
			},
			"string": function(param, element) {
				return !!$(param, element.form).length;
			},
			"function": function(param, element) {
				return param(element);
			}
		},

		optional: function(element) {
			return !$.validator.methods.required.call(this, $.trim(element.value), element) && "dependency-mismatch";
		},

		startRequest: function(element) {
			if (!this.pending[element.name]) {
				this.pendingRequest++;
				this.pending[element.name] = true;
			}
		},

		stopRequest: function(element, valid) {
			this.pendingRequest--;
			// sometimes synchronization fails, make sure pendingRequest is never < 0
			if (this.pendingRequest < 0)
				this.pendingRequest = 0;
			delete this.pending[element.name];
			if ( valid && this.pendingRequest == 0 && this.formSubmitted && this.form() ) {
				$(this.currentForm).submit();
				this.formSubmitted = false;
			} else if (!valid && this.pendingRequest == 0 && this.formSubmitted) {
				$(this.currentForm).triggerHandler("invalid-form", [this]);
				this.formSubmitted = false;
			}
		},

		previousValue: function(element) {
			return $.data(element, "previousValue") || $.data(element, "previousValue", {
				old: null,
				valid: true,
				message: this.defaultMessage( element, "remote" )
			});
		}

	},

	classRuleSettings: {
		required: {required: true},
		email: {email: true},
		url: {url: true},
		date: {date: true},
		dateISO: {dateISO: true},
		dateDE: {dateDE: true},
		number: {number: true},
		numberDE: {numberDE: true},
		digits: {digits: true},
		creditcard: {creditcard: true}
	},

	addClassRules: function(className, rules) {
		className.constructor == String ?
			this.classRuleSettings[className] = rules :
			$.extend(this.classRuleSettings, className);
	},

	classRules: function(element) {
		var rules = {};
		var classes = $(element).attr('class');
		classes && $.each(classes.split(' '), function() {
			if (this in $.validator.classRuleSettings) {
				$.extend(rules, $.validator.classRuleSettings[this]);
			}
		});
		return rules;
	},

	attributeRules: function(element) {
		var rules = {};
		var $element = $(element);

		for (var method in $.validator.methods) {
			var value;
			// If .prop exists (jQuery >= 1.6), use it to get true/false for required
			if (method === 'required' && typeof $.fn.prop === 'function') {
				value = $element.prop(method);
			} else {
				value = $element.attr(method);
			}
			if (value) {
				rules[method] = value;
			} else if ($element[0].getAttribute("type") === method) {
				rules[method] = true;
			}
		}

		// maxlength may be returned as -1, 2147483647 (IE) and 524288 (safari) for text inputs
		if (rules.maxlength && /-1|2147483647|524288/.test(rules.maxlength)) {
			delete rules.maxlength;
		}

		return rules;
	},

	metadataRules: function(element) {
		if (!$.metadata) return {};

		var meta = $.data(element.form, 'validator').settings.meta;
		return meta ?
			$(element).metadata()[meta] :
			$(element).metadata();
	},

	staticRules: function(element) {
		var rules = {};
		var validator = $.data(element.form, 'validator');
		if (validator.settings.rules) {
			rules = $.validator.normalizeRule(validator.settings.rules[element.name]) || {};
		}
		return rules;
	},

	normalizeRules: function(rules, element) {
		// handle dependency check
		$.each(rules, function(prop, val) {
			// ignore rule when param is explicitly false, eg. required:false
			if (val === false) {
				delete rules[prop];
				return;
			}
			if (val.param || val.depends) {
				var keepRule = true;
				switch (typeof val.depends) {
					case "string":
						keepRule = !!$(val.depends, element.form).length;
						break;
					case "function":
						keepRule = val.depends.call(element, element);
						break;
				}
				if (keepRule) {
					rules[prop] = val.param !== undefined ? val.param : true;
				} else {
					delete rules[prop];
				}
			}
		});

		// evaluate parameters
		$.each(rules, function(rule, parameter) {
			rules[rule] = $.isFunction(parameter) ? parameter(element) : parameter;
		});

		// clean number parameters
		$.each(['minlength', 'maxlength', 'min', 'max'], function() {
			if (rules[this]) {
				rules[this] = Number(rules[this]);
			}
		});
		$.each(['rangelength', 'range'], function() {
			if (rules[this]) {
				rules[this] = [Number(rules[this][0]), Number(rules[this][1])];
			}
		});

		if ($.validator.autoCreateRanges) {
			// auto-create ranges
			if (rules.min && rules.max) {
				rules.range = [rules.min, rules.max];
				delete rules.min;
				delete rules.max;
			}
			if (rules.minlength && rules.maxlength) {
				rules.rangelength = [rules.minlength, rules.maxlength];
				delete rules.minlength;
				delete rules.maxlength;
			}
		}

		// To support custom messages in metadata ignore rule methods titled "messages"
		if (rules.messages) {
			delete rules.messages;
		}

		return rules;
	},

	// Converts a simple string to a {string: true} rule, e.g., "required" to {required:true}
	normalizeRule: function(data) {
		if( typeof data == "string" ) {
			var transformed = {};
			$.each(data.split(/\s/), function() {
				transformed[this] = true;
			});
			data = transformed;
		}
		return data;
	},

	// http://docs.jquery.com/Plugins/Validation/Validator/addMethod
	addMethod: function(name, method, message) {
		$.validator.methods[name] = method;
		$.validator.messages[name] = message != undefined ? message : $.validator.messages[name];
		if (method.length < 3) {
			$.validator.addClassRules(name, $.validator.normalizeRule(name));
		}
	},

	methods: {

		// http://docs.jquery.com/Plugins/Validation/Methods/required
		required: function(value, element, param) {
			// check if dependency is met
			if ( !this.depend(param, element) )
				return "dependency-mismatch";
			switch( element.nodeName.toLowerCase() ) {
			case 'select':
				// could be an array for select-multiple or a string, both are fine this way
				var val = $(element).val();
				return val && val.length > 0;
			case 'input':
				if ( this.checkable(element) )
					return this.getLength(value, element) > 0;
			default:
				return $.trim(value).length > 0;
			}
		},

		// http://docs.jquery.com/Plugins/Validation/Methods/remote
		remote: function(value, element, param) {
			if ( this.optional(element) )
				return "dependency-mismatch";

			var previous = this.previousValue(element);
			if (!this.settings.messages[element.name] )
				this.settings.messages[element.name] = {};
			previous.originalMessage = this.settings.messages[element.name].remote;
			this.settings.messages[element.name].remote = previous.message;

			param = typeof param == "string" && {url:param} || param;

			if ( this.pending[element.name] ) {
				return "pending";
			}
			if ( previous.old === value ) {
				return previous.valid;
			}

			previous.old = value;
			var validator = this;
			this.startRequest(element);
			var data = {};
			data[element.name] = value;
			$.ajax($.extend(true, {
				url: param,
				mode: "abort",
				port: "validate" + element.name,
				dataType: "json",
				data: data,
				success: function(response) {
					validator.settings.messages[element.name].remote = previous.originalMessage;
					var valid = response === true;
					if ( valid ) {
						var submitted = validator.formSubmitted;
						validator.prepareElement(element);
						validator.formSubmitted = submitted;
						validator.successList.push(element);
						validator.showErrors();
					} else {
						var errors = {};
						var message = response || validator.defaultMessage( element, "remote" );
						errors[element.name] = previous.message = $.isFunction(message) ? message(value) : message;
						validator.showErrors(errors);
					}
					previous.valid = valid;
					validator.stopRequest(element, valid);
				}
			}, param));
			return "pending";
		},

		// http://docs.jquery.com/Plugins/Validation/Methods/minlength
		minlength: function(value, element, param) {
			return this.optional(element) || this.getLength($.trim(value), element) >= param;
		},

		// http://docs.jquery.com/Plugins/Validation/Methods/maxlength
		maxlength: function(value, element, param) {
			return this.optional(element) || this.getLength($.trim(value), element) <= param;
		},

		// http://docs.jquery.com/Plugins/Validation/Methods/rangelength
		rangelength: function(value, element, param) {
			var length = this.getLength($.trim(value), element);
			return this.optional(element) || ( length >= param[0] && length <= param[1] );
		},

		// http://docs.jquery.com/Plugins/Validation/Methods/min
		min: function( value, element, param ) {
			return this.optional(element) || value >= param;
		},

		// http://docs.jquery.com/Plugins/Validation/Methods/max
		max: function( value, element, param ) {
			return this.optional(element) || value <= param;
		},

		// http://docs.jquery.com/Plugins/Validation/Methods/range
		range: function( value, element, param ) {
			return this.optional(element) || ( value >= param[0] && value <= param[1] );
		},

		// http://docs.jquery.com/Plugins/Validation/Methods/email
		email: function(value, element) {
			// contributed by Scott Gonzalez: http://projects.scottsplayground.com/email_address_validation/
			return this.optional(element) || /^((([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+(\.([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+)*)|((\x22)((((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(([\x01-\x08\x0b\x0c\x0e-\x1f\x7f]|\x21|[\x23-\x5b]|[\x5d-\x7e]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(\\([\x01-\x09\x0b\x0c\x0d-\x7f]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))))*(((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(\x22)))@((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))$/i.test(value);
		},

		// http://docs.jquery.com/Plugins/Validation/Methods/url
		url: function(value, element) {
			// contributed by Scott Gonzalez: http://projects.scottsplayground.com/iri/
			return this.optional(element) || /^(https?|ftp):\/\/(((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:)*@)?(((\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5])\.(\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5])\.(\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5])\.(\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5]))|((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.?)(:\d*)?)(\/((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)+(\/(([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)*)*)?)?(\?((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)|[\uE000-\uF8FF]|\/|\?)*)?(\#((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)|\/|\?)*)?$/i.test(value);
		},

		// http://docs.jquery.com/Plugins/Validation/Methods/date
		date: function(value, element) {
			return this.optional(element) || !/Invalid|NaN/.test(new Date(value));
		},

		// http://docs.jquery.com/Plugins/Validation/Methods/dateISO
		dateISO: function(value, element) {
			return this.optional(element) || /^\d{4}[\/-]\d{1,2}[\/-]\d{1,2}$/.test(value);
		},

		// http://docs.jquery.com/Plugins/Validation/Methods/number
		number: function(value, element) {
			return this.optional(element) || /^-?(?:\d+|\d{1,3}(?:,\d{3})+)(?:\.\d+)?$/.test(value);
		},

		// http://docs.jquery.com/Plugins/Validation/Methods/digits
		digits: function(value, element) {
			return this.optional(element) || /^\d+$/.test(value);
		},

		// http://docs.jquery.com/Plugins/Validation/Methods/creditcard
		// based on http://en.wikipedia.org/wiki/Luhn
		creditcard: function(value, element) {
			if ( this.optional(element) )
				return "dependency-mismatch";
			// accept only spaces, digits and dashes
			if (/[^0-9 -]+/.test(value))
				return false;
			var nCheck = 0,
				nDigit = 0,
				bEven = false;

			value = value.replace(/\D/g, "");

			for (var n = value.length - 1; n >= 0; n--) {
				var cDigit = value.charAt(n);
				var nDigit = parseInt(cDigit, 10);
				if (bEven) {
					if ((nDigit *= 2) > 9)
						nDigit -= 9;
				}
				nCheck += nDigit;
				bEven = !bEven;
			}

			return (nCheck % 10) == 0;
		},

		// http://docs.jquery.com/Plugins/Validation/Methods/accept
		accept: function(value, element, param) {
			param = typeof param == "string" ? param.replace(/,/g, '|') : "png|jpe?g|gif";
			return this.optional(element) || value.match(new RegExp(".(" + param + ")$", "i"));
		},

		// http://docs.jquery.com/Plugins/Validation/Methods/equalTo
		equalTo: function(value, element, param) {
			// bind to the blur event of the target in order to revalidate whenever the target field is updated
			// TODO find a way to bind the event just once, avoiding the unbind-rebind overhead
			var target = $(param).unbind(".validate-equalTo").bind("blur.validate-equalTo", function() {
				$(element).valid();
			});
			return value == target.val();
		}

	}

});

// deprecated, use $.validator.format instead
$.format = $.validator.format;

})(jQuery);

// ajax mode: abort
// usage: $.ajax({ mode: "abort"[, port: "uniqueport"]});
// if mode:"abort" is used, the previous request on that port (port can be undefined) is aborted via XMLHttpRequest.abort()
;(function($) {
	var pendingRequests = {};
	// Use a prefilter if available (1.5+)
	if ( $.ajaxPrefilter ) {
		$.ajaxPrefilter(function(settings, _, xhr) {
			var port = settings.port;
			if (settings.mode == "abort") {
				if ( pendingRequests[port] ) {
					pendingRequests[port].abort();
				}
				pendingRequests[port] = xhr;
			}
		});
	} else {
		// Proxy ajax
		var ajax = $.ajax;
		$.ajax = function(settings) {
			var mode = ( "mode" in settings ? settings : $.ajaxSettings ).mode,
				port = ( "port" in settings ? settings : $.ajaxSettings ).port;
			if (mode == "abort") {
				if ( pendingRequests[port] ) {
					pendingRequests[port].abort();
				}
				return (pendingRequests[port] = ajax.apply(this, arguments));
			}
			return ajax.apply(this, arguments);
		};
	}
})(jQuery);

// provides cross-browser focusin and focusout events
// IE has native support, in other browsers, use event caputuring (neither bubbles)

// provides delegate(type: String, delegate: Selector, handler: Callback) plugin for easier event delegation
// handler is only called when $(event.target).is(delegate), in the scope of the jquery-object for event.target
;(function($) {
	// only implement if not provided by jQuery core (since 1.4)
	// TODO verify if jQuery 1.4's implementation is compatible with older jQuery special-event APIs
	if (!jQuery.event.special.focusin && !jQuery.event.special.focusout && document.addEventListener) {
		$.each({
			focus: 'focusin',
			blur: 'focusout'
		}, function( original, fix ){
			$.event.special[fix] = {
				setup:function() {
					this.addEventListener( original, handler, true );
				},
				teardown:function() {
					this.removeEventListener( original, handler, true );
				},
				handler: function(e) {
					arguments[0] = $.event.fix(e);
					arguments[0].type = fix;
					return $.event.handle.apply(this, arguments);
				}
			};
			function handler(e) {
				e = $.event.fix(e);
				e.type = fix;
				return $.event.handle.call(this, e);
			}
		});
	};
	$.extend($.fn, {
		validateDelegate: function(delegate, type, handler) {
			return this.bind(type, function(event) {
				var target = $(event.target);
				if (target.is(delegate)) {
					return handler.apply(target, arguments);
				}
			});
		}
	});
})(jQuery);
$(function () {

	var rules = {
		    	rules: {
					name: {
						minlength: 2,
						required: true
					},
					email: {
						required: true,
						email: true
					},
					subject: {
						minlength: 2,
						required: true
					},
					message: {
						minlength: 2,
						required: true
					},
			      validateSelect: {
			      	required: true
		      	},
			      validateCheckbox: {
			      	required: true,
			      	minlength: 2	
		      	  },
			      validateRadio: {
			      	required: true
			      }
				}
		    };
		
	    var validationObj = $.extend (rules, Application.validationRules);
	    
		$('#validation-form').validate(validationObj);
		
});