this.wc=this.wc||{},this.wc.blocks=this.wc.blocks||{},this.wc.blocks["product-search"]=function(e){function t(t){for(var o,a,n=t[0],s=t[1],b=t[2],u=0,d=[];u<n.length;u++)a=n[u],Object.prototype.hasOwnProperty.call(r,a)&&r[a]&&d.push(r[a][0]),r[a]=0;for(o in s)Object.prototype.hasOwnProperty.call(s,o)&&(e[o]=s[o]);for(i&&i(t);d.length;)d.shift()();return l.push.apply(l,b||[]),c()}function c(){for(var e,t=0;t<l.length;t++){for(var c=l[t],o=!0,n=1;n<c.length;n++){var s=c[n];0!==r[s]&&(o=!1)}o&&(l.splice(t--,1),e=a(a.s=c[0]))}return e}var o={},r={30:0},l=[];function a(t){if(o[t])return o[t].exports;var c=o[t]={i:t,l:!1,exports:{}};return e[t].call(c.exports,c,c.exports,a),c.l=!0,c.exports}a.m=e,a.c=o,a.d=function(e,t,c){a.o(e,t)||Object.defineProperty(e,t,{enumerable:!0,get:c})},a.r=function(e){"undefined"!=typeof Symbol&&Symbol.toStringTag&&Object.defineProperty(e,Symbol.toStringTag,{value:"Module"}),Object.defineProperty(e,"__esModule",{value:!0})},a.t=function(e,t){if(1&t&&(e=a(e)),8&t)return e;if(4&t&&"object"==typeof e&&e&&e.__esModule)return e;var c=Object.create(null);if(a.r(c),Object.defineProperty(c,"default",{enumerable:!0,value:e}),2&t&&"string"!=typeof e)for(var o in e)a.d(c,o,function(t){return e[t]}.bind(null,o));return c},a.n=function(e){var t=e&&e.__esModule?function(){return e.default}:function(){return e};return a.d(t,"a",t),t},a.o=function(e,t){return Object.prototype.hasOwnProperty.call(e,t)},a.p="";var n=window.webpackWcBlocksJsonp=window.webpackWcBlocksJsonp||[],s=n.push.bind(n);n.push=t,n=n.slice();for(var b=0;b<n.length;b++)t(n[b]);var i=s;return l.push([382,0]),c()}({0:function(e,t){e.exports=window.wp.element},1:function(e,t){e.exports=window.wp.i18n},10:function(e,t){e.exports=window.wp.compose},11:function(e,t){e.exports=window.wp.primitives},13:function(e,t){e.exports=window.wp.blocks},2:function(e,t){e.exports=window.wc.wcSettings},233:function(e,t){},234:function(e,t){},3:function(e,t){e.exports=window.wp.components},382:function(e,t,c){e.exports=c(494)},494:function(e,t,c){"use strict";c.r(t);var o=c(0),r=c(1),l=c(13),a=c(110),n=c(528),s=(c(233),c(234),c(4)),b=c.n(s),i=c(2),u=e=>{let{attributes:{label:t,placeholder:c,formId:l,className:a,hasLabel:n,align:s}}=e;const u=b()("wc-block-product-search",s?"align"+s:"",a);return Object(o.createElement)("div",{className:u},Object(o.createElement)("form",{role:"search",method:"get",action:i.HOME_URL},Object(o.createElement)("label",{htmlFor:l,className:n?"wc-block-product-search__label":"wc-block-product-search__label screen-reader-text"},t),Object(o.createElement)("div",{className:"wc-block-product-search__fields"},Object(o.createElement)("input",{type:"search",id:l,className:"wc-block-product-search__field",placeholder:c,name:"s"}),Object(o.createElement)("input",{type:"hidden",name:"post_type",value:"product"}),Object(o.createElement)("button",{type:"submit",className:"wc-block-product-search__button",label:Object(r.__)("Search","woocommerce")},Object(o.createElement)("svg",{"aria-hidden":"true",role:"img",focusable:"false",className:"dashicon dashicons-arrow-right-alt2",xmlns:"http://www.w3.org/2000/svg",width:"20",height:"20",viewBox:"0 0 20 20"},Object(o.createElement)("path",{d:"M6 15l5-5-5-5 1-2 7 7-7 7z"}))))))},d=c(5),p=c(3),w=c(10),h=Object(w.withInstanceId)(e=>{let{attributes:{label:t,placeholder:c,formId:l,className:a,hasLabel:n,align:s},instanceId:i,setAttributes:u}=e;const w=b()("wc-block-product-search",s?"align"+s:"",a);return Object(o.useEffect)(()=>{l||u({formId:"wc-block-product-search-"+i})},[l,u,i]),Object(o.createElement)(o.Fragment,null,Object(o.createElement)(d.InspectorControls,{key:"inspector"},Object(o.createElement)(p.PanelBody,{title:Object(r.__)("Content","woocommerce"),initialOpen:!0},Object(o.createElement)(p.ToggleControl,{label:Object(r.__)("Show search field label","woocommerce"),help:n?Object(r.__)("Label is visible.","woocommerce"):Object(r.__)("Label is hidden.","woocommerce"),checked:n,onChange:()=>u({hasLabel:!n})}))),Object(o.createElement)("div",{className:w},!!n&&Object(o.createElement)(o.Fragment,null,Object(o.createElement)("label",{className:"screen-reader-text",htmlFor:"wc-block-product-search__label"},Object(r.__)("Search Label","woocommerce")),Object(o.createElement)(d.PlainText,{className:"wc-block-product-search__label",id:"wc-block-product-search__label",value:t,onChange:e=>u({label:e})})),Object(o.createElement)("div",{className:"wc-block-product-search__fields"},Object(o.createElement)(p.TextControl,{className:"wc-block-product-search__field input-control",value:c,placeholder:Object(r.__)("Enter search placeholder text","woocommerce"),onChange:e=>u({placeholder:e})}),Object(o.createElement)("button",{type:"submit",className:"wc-block-product-search__button",label:Object(r.__)("Search","woocommerce"),onClick:e=>e.preventDefault(),tabIndex:"-1"},Object(o.createElement)("svg",{"aria-hidden":"true",role:"img",focusable:"false",className:"dashicon dashicons-arrow-right-alt2",xmlns:"http://www.w3.org/2000/svg",width:"20",height:"20",viewBox:"0 0 20 20"},Object(o.createElement)("path",{d:"M6 15l5-5-5-5 1-2 7 7-7 7z"}))))))});const m={hasLabel:{type:"boolean",default:!0},label:{type:"string",default:Object(r.__)("Search","woocommerce")},placeholder:{type:"string",default:Object(r.__)("Search products…","woocommerce")},formId:{type:"string",default:""}};Object(l.registerBlockType)("woocommerce/product-search",{title:Object(r.__)("Product Search","woocommerce"),icon:{src:Object(o.createElement)(a.a,{icon:n.a,className:"wc-block-editor-components-block-icon"})},category:"woocommerce",keywords:[Object(r.__)("WooCommerce","woocommerce")],description:Object(r.__)("A search box to allow customers to search for products by keyword.","woocommerce"),supports:{align:["wide","full"]},example:{attributes:{hasLabel:!0}},attributes:m,transforms:{from:[{type:"block",blocks:["core/legacy-widget"],isMatch:e=>{let{idBase:t,instance:c}=e;return"woocommerce_product_search"===t&&!(null==c||!c.raw)},transform:e=>{let{instance:t}=e;return Object(l.createBlock)("woocommerce/product-search",{label:""===t.raw.title?Object(r.__)("Search","woocommerce"):t.raw.title})}}]},deprecated:[{attributes:m,save:e=>Object(o.createElement)("div",null,Object(o.createElement)(u,e))}],edit:h,save:()=>null})},5:function(e,t){e.exports=window.wp.blockEditor}});