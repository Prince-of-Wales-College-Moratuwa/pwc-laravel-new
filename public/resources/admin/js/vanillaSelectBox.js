let VSBoxCounter=function(){let t=0,e=[];return{set:function(i){return e.push({offset:++t,ptr:i}),e[e.length-1].offset},remove:function(t){let i=e.filter((function(e){return e.offset!=t}));e=i.splice(0)},closeAllButMe:function(t){e.forEach((function(e){e.offset!=t&&e.ptr.closeOrder()}))}}}();function vanillaSelectBox(t,e){let i=this;if(this.instanceOffset=VSBoxCounter.set(i),this.domSelector=t,this.root=document.querySelector(t),this.rootToken=null,this.main,this.button,this.title,this.isMultiple=this.root.hasAttribute("multiple"),this.multipleSize=this.isMultiple&&this.root.hasAttribute("size")?parseInt(this.root.getAttribute("size")):-1,this.isOptgroups=!1,this.currentOptgroup=0,this.drop,this.top,this.left,this.options,this.listElements,this.isDisabled=!1,this.search=!1,this.searchZone=null,this.inputBox=null,this.disabledItems=[],this.ulminWidth=140,this.ulmaxWidth=280,this.ulminHeight=25,this.maxOptionWidth=1/0,this.maxSelect=1/0,this.isInitRemote=!1,this.isSearchRemote=!1,this.onInit=null,this.onSearch=null,this.onInitSize=null,this.forbidenAttributes=["class","selected","disabled","data-text","data-value","style"],this.forbidenClasses=["active","disabled"],this.userOptions={maxWidth:500,minWidth:-1,maxHeight:400,translations:{all:"All",items:"items",selectAll:"Select All",clearAll:"Clear All"},search:!1,placeHolder:"",stayOpen:!1,disableSelectAll:!1},e){if(null!=e.maxWidth&&(this.userOptions.maxWidth=e.maxWidth),null!=e.minWidth&&(this.userOptions.minWidth=e.minWidth),null!=e.maxHeight&&(this.userOptions.maxHeight=e.maxHeight),null!=e.translations)for(var l in e.translations)e.translations.hasOwnProperty(l)&&this.userOptions.translations[l]&&(this.userOptions.translations[l]=e.translations[l]);null!=e.placeHolder&&(this.userOptions.placeHolder=e.placeHolder),null!=e.search&&(this.search=e.search),null!=e.remote&&e.remote&&(null!=e.remote.onInit&&"function"==typeof e.remote.onInit&&(this.onInit=e.remote.onInit,this.isInitRemote=!0),null!=e.remote.onInitSize&&(this.onInitSize=e.remote.onInitSize,this.onInitSize<3&&(this.onInitSize=3)),null!=e.remote.onSearch&&"function"==typeof e.remote.onSearch&&(this.onSearch=e.remote.onSearch,this.isSearchRemote=!0)),null!=e.stayOpen&&(this.userOptions.stayOpen=e.stayOpen),null!=e.disableSelectAll&&(this.userOptions.disableSelectAll=e.disableSelectAll),null!=e.maxSelect&&!isNaN(e.maxSelect)&&e.maxSelect>=1&&(this.maxSelect=e.maxSelect,this.userOptions.disableSelectAll=!0),null!=e.maxOptionWidth&&!isNaN(e.maxOptionWidth)&&e.maxOptionWidth>=20&&(this.maxOptionWidth=e.maxOptionWidth,this.ulminWidth=e.maxOptionWidth+60,this.ulmaxWidth=e.maxOptionWidth+60)}this.closeOrder=function(){let t=this;t.userOptions.stayOpen||(t.drop.style.visibility="hidden",t.search&&(t.inputBox.value="",Array.prototype.slice.call(t.listElements).forEach((function(t){t.classList.remove("hide")}))))},this.getCssArray=function(t){let e=[];return".vsb-main button"===t&&(e=[{key:"min-width",value:"120px"},{key:"border-radius",value:"0"},{key:"width",value:"100%"},{key:"text-align",value:"left"},{key:"z-index",value:"1"},{key:"color",value:"#333"},{key:"background",value:"white !important"},{key:"border",value:"1px solid #999 !important"},{key:"line-height",value:"20px"},{key:"font-size",value:"14px"},{key:"padding",value:"6px 12px"}]),function(t){let e="";return t.forEach((function(t){e+=t.key+":"+t.value+";"})),e}(e)},this.init=function(){let t=this;t.isInitRemote?t.onInit("",t.onInitSize).then((function(e){t.buildSelect(e),t.createTree()})):t.createTree()},this.createTree=function(){this.rootToken=i.domSelector.replace(/[^A-Za-z0-9]+/,""),this.root.style.display="none";let t=document.getElementById("btn-group-"+this.rootToken);if(t&&t.remove(),this.main=document.createElement("div"),this.root.parentNode.insertBefore(this.main,this.root.nextSibling),this.main.classList.add("vsb-main"),this.main.setAttribute("id","btn-group-"+this.rootToken),this.main.style.marginLeft=this.main.style.marginLeft,i.userOptions.stayOpen&&(this.main.style.minHeight=this.userOptions.maxHeight+10+"px"),i.userOptions.stayOpen)this.button=document.createElement("div");else{this.button=document.createElement("button");var e=i.getCssArray(".vsb-main button");this.button.setAttribute("style",e)}this.button.style.maxWidth=this.userOptions.maxWidth+"px",-1!==this.userOptions.minWidth&&(this.button.style.minWidth=this.userOptions.minWidth+"px"),this.main.appendChild(this.button),this.title=document.createElement("span"),this.button.appendChild(this.title),this.title.classList.add("title");let l=document.createElement("span");if(this.button.appendChild(l),l.classList.add("caret"),l.style.position="absolute",l.style.right="8px",l.style.marginTop="8px",i.userOptions.stayOpen&&(l.style.display="none",this.title.style.paddingLeft="20px",this.title.style.fontStyle="italic",this.title.style.verticalAlign="20%"),this.drop=document.createElement("div"),this.main.appendChild(this.drop),this.drop.classList.add("vsb-menu"),this.drop.style.zIndex=2e3-this.instanceOffset,this.ul=document.createElement("ul"),this.drop.appendChild(this.ul),this.ul.style.maxHeight=this.userOptions.maxHeight+"px",this.ul.style.minWidth=this.ulminWidth+"px",this.ul.style.maxWidth=this.ulmaxWidth+"px",this.ul.style.minHeight=this.ulminHeight+"px",this.isMultiple&&(this.ul.classList.add("multi"),!i.userOptions.disableSelectAll)){let t=document.createElement("option");t.setAttribute("value","all"),t.innerText=i.userOptions.translations.selectAll,this.root.insertBefore(t,this.root.hasChildNodes()?this.root.childNodes[0]:null)}let s="",a="",n=0;if(this.search){this.searchZone=document.createElement("div"),this.ul.appendChild(this.searchZone),this.searchZone.classList.add("vsb-js-search-zone"),this.searchZone.style.zIndex=2001-this.instanceOffset,this.inputBox=document.createElement("input"),this.searchZone.appendChild(this.inputBox),this.inputBox.setAttribute("type","text"),this.inputBox.setAttribute("id","search_"+this.rootToken),this.maxOptionWidth<1/0&&(this.searchZone.style.maxWidth=i.maxOptionWidth+30+"px",this.inputBox.style.maxWidth=i.maxOptionWidth+30+"px");var o=document.createElement("p");this.ul.appendChild(o),o.style.fontSize="12px",o.innerHTML="&nbsp;",this.ul.addEventListener("scroll",(function(t){var e=this.scrollTop;i.searchZone.parentNode.style.top=e+"px"}))}if(this.options=document.querySelectorAll(this.domSelector+" > option"),Array.prototype.slice.call(this.options).forEach((function(t){let e,l=t.textContent,o=t.value;t.hasAttributes()&&(e=Array.prototype.slice.call(t.attributes).filter((function(t){return-1===i.forbidenAttributes.indexOf(t.name)})));let r=t.getAttribute("class");r=r?r.split(" ").filter((function(t){return-1===i.forbidenClasses.indexOf(t)})):[];let c=document.createElement("li"),d=t.hasAttribute("selected"),u=t.hasAttribute("disabled");i.ul.appendChild(c),c.setAttribute("data-value",o),c.setAttribute("data-text",l),void 0!==e&&e.forEach((function(t){c.setAttribute(t.name,t.value)})),r.forEach((function(t){c.classList.add(t)})),i.maxOptionWidth<1/0&&(c.classList.add("short"),c.style.maxWidth=i.maxOptionWidth+"px"),d&&(n++,s+=a+l,a=",",c.classList.add("active"),i.isMultiple||(i.title.textContent=l,0!=r.length&&r.forEach((function(t){i.title.classList.add(t)})))),u&&c.classList.add("disabled"),c.appendChild(document.createTextNode(" "+l))})),null!==document.querySelector(this.domSelector+" optgroup")){this.isOptgroups=!0,this.options=document.querySelectorAll(this.domSelector+" option");let t=document.querySelectorAll(this.domSelector+" optgroup");Array.prototype.slice.call(t).forEach((function(t){let e=t.querySelectorAll("option"),l=document.createElement("li"),o=document.createElement("span"),r=document.createElement("i"),c=document.createElement("b"),d=t.getAttribute("data-way");d||(d="closed"),(!d||"closed"!==d&&"open"!==d)&&(d="closed"),l.appendChild(o),l.appendChild(r),i.ul.appendChild(l),l.classList.add("grouped-option"),l.classList.add(d),i.currentOptgroup++;let u=i.rootToken+"-opt-"+i.currentOptgroup;l.id=u,l.appendChild(c),c.appendChild(document.createTextNode(t.label)),l.setAttribute("data-text",t.label),i.ul.appendChild(l),Array.prototype.slice.call(e).forEach((function(t){let e=t.textContent,l=t.value,o=t.getAttribute("class");o=o?o.split(" "):[],o.push(d);let r=document.createElement("li"),c=t.hasAttribute("selected");i.ul.appendChild(r),r.setAttribute("data-value",l),r.setAttribute("data-text",e),r.setAttribute("data-parent",u),0!=o.length&&o.forEach((function(t){r.classList.add(t)})),c&&(n++,s+=a+e,a=",",r.classList.add("active"),i.isMultiple||(i.title.textContent=e,0!=o.length&&o.forEach((function(t){i.title.classList.add(t)})))),r.appendChild(document.createTextNode(e))}))}))}if(-1!=i.multipleSize&&n>i.multipleSize){let t=i.userOptions.translations.items||"items";s=n+" "+t}function r(){document.removeEventListener("click",r),i.drop.style.visibility="hidden",i.search&&(i.inputBox.value="",Array.prototype.slice.call(i.listElements).forEach((function(t){t.classList.remove("hidden-search")})))}i.isMultiple&&(i.title.innerHTML=s),""!=i.userOptions.placeHolder&&""==i.title.textContent&&(i.title.textContent=i.userOptions.placeHolder),this.listElements=this.drop.querySelectorAll("li:not(.grouped-option)"),i.search&&i.inputBox.addEventListener("keyup",(function(t){let e=t.target.value.toUpperCase(),l=e.length,s=0,a=0,n=null;i.isSearchRemote?0==l?i.remoteSearchIntegrate(null):l>=3&&i.onSearch(e).then((function(t){i.remoteSearchIntegrate(t)})):(l<3?Array.prototype.slice.call(i.listElements).forEach((function(t){"all"===t.getAttribute("data-value")?n=t:(t.classList.remove("hidden-search"),s++,a+=t.classList.contains("active"))})):Array.prototype.slice.call(i.listElements).forEach((function(t){if("all"!==t.getAttribute("data-value")){-1===t.getAttribute("data-text").toUpperCase().indexOf(e)&&"all"!==t.getAttribute("data-value")?t.classList.add("hidden-search"):(s++,t.classList.remove("hidden-search"),a+=t.classList.contains("active"))}else n=t})),n&&(0===s?n.classList.add("disabled"):n.classList.remove("disabled"),a!==s?(n.classList.remove("active"),n.innerText=i.userOptions.translations.selectAll,n.setAttribute("data-selected","false")):(n.classList.add("active"),n.innerText=i.userOptions.translations.clearAll,n.setAttribute("data-selected","true"))))})),i.userOptions.stayOpen?(i.drop.style.visibility="visible",i.drop.style.boxShadow="none",i.drop.style.minHeight=this.userOptions.maxHeight+10+"px",i.drop.style.position="relative",i.drop.style.left="0px",i.drop.style.top="0px",i.button.style.border="none"):this.main.addEventListener("click",(function(t){i.isDisabled||(i.drop.style.left=i.left+"px",i.drop.style.top=i.top+"px",i.drop.style.visibility="visible",document.addEventListener("click",r),t.preventDefault(),t.stopPropagation(),i.userOptions.stayOpen||VSBoxCounter.closeAllButMe(i.instanceOffset))})),this.drop.addEventListener("click",(function(t){if(i.isDisabled)return;if("INPUT"===t.target.tagName)return;let e="SPAN"===t.target.tagName,l="I"===t.target.tagName,s=t.target.parentElement;if(!s.hasAttribute("data-value")&&s.classList.contains("grouped-option")){if(!e&&!l)return;let t,a;if(l)i.checkUncheckFromParent(s);else{s.classList.contains("open")?(t="open",a="closed"):(t="closed",a="open"),s.classList.remove(t),s.classList.add(a),i.drop.querySelectorAll("[data-parent='"+s.id+"']").forEach((function(e){e.classList.remove(t),e.classList.add(a)}))}return}let a=t.target.getAttribute("data-value"),n=t.target.getAttribute("data-text"),o=t.target.getAttribute("class");if(!(o&&-1!=o.indexOf("disabled")||o&&-1!=o.indexOf("overflow")))if("all"!==a){if(i.isMultiple){let e=!1;o&&(e=-1!=o.indexOf("active")),e?t.target.classList.remove("active"):t.target.classList.add("active"),t.target.hasAttribute("data-parent")&&i.checkUncheckFromChild(t.target);let l="",s="",n=0,r=0;for(let t=0;t<i.options.length;t++)r++,i.options[t].value==a&&(i.options[t].selected=!e),i.options[t].selected&&(n++,l+=s+i.options[t].textContent,s=",");if(r==n){l=i.userOptions.translations.all||"all"}else if(-1!=i.multipleSize&&n>i.multipleSize){l=n+" "+(i.userOptions.translations.items||"items")}i.title.textContent=l,i.checkSelectMax(n),i.checkUncheckAll(),i.privateSendChange()}else i.root.value=a,i.title.textContent=n,o?i.title.setAttribute("class",o+" title"):i.title.setAttribute("class","title"),Array.prototype.slice.call(i.listElements).forEach((function(t){t.classList.remove("active")})),""!=n&&t.target.classList.add("active"),i.privateSendChange(),i.userOptions.stayOpen||r();t.preventDefault(),t.stopPropagation(),""!=i.userOptions.placeHolder&&""==i.title.textContent&&(i.title.textContent=i.userOptions.placeHolder)}else t.target.hasAttribute("data-selected")&&"true"===t.target.getAttribute("data-selected")?i.setValue("none"):i.setValue("all")}))},this.init(),this.checkUncheckAll()}function vanillaSelectBox_type(t){return Object.prototype.toString.call(t).replace("[object ","").replace("]","").toLowerCase()}vanillaSelectBox.prototype.buildSelect=function(t){let e=this;if(!(null==t||t.length<1))if(e.isOptgroups||(e.isOptgroups=null!=t[0].parent&&""!=t[0].parent),e.isOptgroups){let i={};(t=t.filter((function(t){return null!=t.parent&&""!=t.parent}))).forEach((function(t){i[t.parent]||(i[t.parent]=!0)}));for(let l in i){let i=document.createElement("optgroup");i.setAttribute("label",l),options=t.filter((function(t){return t.parent==l})),options.forEach((function(t){let e=document.createElement("option");e.value=t.value,e.text=t.text,t.selected&&e.setAttribute("selected",!0),i.appendChild(e)})),e.root.appendChild(i)}}else t.forEach((function(t){let i=document.createElement("option");i.value=t.value,i.text=t.text,t.selected&&i.setAttribute("selected",!0),e.root.appendChild(i)}))},vanillaSelectBox.prototype.remoteSearchIntegrate=function(t){let e=this;if(null==t||0==t.length){let i=e.optionsCheckedToData();i&&(t=i.slice(0)),e.remoteSearchIntegrateIt(t)}else{let l=e.optionsCheckedToData();if(l.length>0)for(var i=t.length-1;i>=0;i--)-1!=l.indexOf(t[i].id)&&t.slice(i,1);t=t.concat(l),e.remoteSearchIntegrateIt(t)}},vanillaSelectBox.prototype.optionsCheckedToData=function(){let t=this,e=[],i=t.ul.querySelectorAll("li.active:not(.grouped-option)"),l={};return i&&Array.prototype.slice.call(i).forEach((function(i){let s={value:i.getAttribute("data-value"),text:i.getAttribute("data-text"),selected:!0};if("all"!==s.value){if(t.isOptgroups){let e=i.getAttribute("data-parent");if(null!=l[e])s.parent=l[e];else{let i=t.ul.querySelector("#"+e).getAttribute("data-text");l[e]=i,s.parent=i}}e.push(s)}})),e},vanillaSelectBox.prototype.removeOptionsNotChecked=function(t){let e=this,i=e.onInitSize,l=null==t?0:t.length,s=e.root.length;if(s+l>i){let t=s+l-i-1,n=0;for(var a=e.root.length-1;a>=0;a--)0==e.root.options[a].selected&&n<=t&&(n++,e.root.remove(a))}},vanillaSelectBox.prototype.remoteSearchIntegrateIt=function(t){let e=this;if(null!=t&&0!=t.length){for(;e.root.firstChild;)e.root.removeChild(e.root.firstChild);e.buildSelect(t),e.reloadTree()}},vanillaSelectBox.prototype.reloadTree=function(){let t=this,e=t.ul.querySelectorAll("li");if(null!=e)for(var i=e.length-1;i>=0;i--)"all"!==e[i].getAttribute("data-value")&&t.ul.removeChild(e[i]);let l="",s="";if(t.isOptgroups){if(null!==document.querySelector(t.domSelector+" optgroup")){t.options=document.querySelectorAll(this.domSelector+" option");let e=document.querySelectorAll(this.domSelector+" optgroup");Array.prototype.slice.call(e).forEach((function(e){let i=e.querySelectorAll("option"),a=document.createElement("li"),n=document.createElement("span"),o=document.createElement("i"),r=document.createElement("b"),c=e.getAttribute("data-way");c||(c="closed"),(!c||"closed"!==c&&"open"!==c)&&(c="closed"),a.appendChild(n),a.appendChild(o),t.ul.appendChild(a),a.classList.add("grouped-option"),a.classList.add(c),t.currentOptgroup++;let d=t.rootToken+"-opt-"+t.currentOptgroup;a.id=d,a.appendChild(r),r.appendChild(document.createTextNode(e.label)),a.setAttribute("data-text",e.label),t.ul.appendChild(a),Array.prototype.slice.call(i).forEach((function(e){let i=e.textContent,a=e.value,n=e.getAttribute("class");n=n?n.split(" "):[],n.push(c);let o=document.createElement("li"),r=e.hasAttribute("selected");t.ul.appendChild(o),o.setAttribute("data-value",a),o.setAttribute("data-text",i),o.setAttribute("data-parent",d),0!=n.length&&n.forEach((function(t){o.classList.add(t)})),r&&(l+=s+i,s=",",o.classList.add("active"),t.isMultiple||(t.title.textContent=i,0!=n.length&&n.forEach((function(e){t.title.classList.add(e)})))),o.appendChild(document.createTextNode(i))}))}))}t.listElements=this.drop.querySelectorAll("li:not(.grouped-option)")}else t.options=t.root.querySelectorAll("option"),Array.prototype.slice.call(t.options).forEach((function(e){let i=e.textContent,a=e.value;if("all"!=a){let n;e.hasAttributes()&&(n=Array.prototype.slice.call(e.attributes).filter((function(e){return-1===t.forbidenAttributes.indexOf(e.name)})));let o=e.getAttribute("class");o=o?o.split(" ").filter((function(e){return-1===t.forbidenClasses.indexOf(e)})):[];let r=document.createElement("li"),c=e.hasAttribute("selected"),d=e.disabled;t.ul.appendChild(r),r.setAttribute("data-value",a),r.setAttribute("data-text",i),void 0!==n&&n.forEach((function(t){r.setAttribute(t.name,t.value)})),o.forEach((function(t){r.classList.add(t)})),t.maxOptionWidth<1/0&&(r.classList.add("short"),r.style.maxWidth=t.maxOptionWidth+"px"),c&&(l+=s+i,s=",",r.classList.add("active"),t.isMultiple||(t.title.textContent=i,0!=o.length&&o.forEach((function(e){t.title.classList.add(e)})))),d&&r.classList.add("disabled"),r.appendChild(document.createTextNode(" "+i))}}))},vanillaSelectBox.prototype.disableItems=function(t){let e=this,i=[];"string"==vanillaSelectBox_type(t)&&(t=t.split(",")),"array"==vanillaSelectBox_type(t)&&Array.prototype.slice.call(e.options).forEach((function(e){-1!=t.indexOf(e.value)&&(i.push(e.value),e.setAttribute("disabled",""))})),Array.prototype.slice.call(e.listElements).forEach((function(t){let e=t.getAttribute("data-value");-1!=i.indexOf(e)&&t.classList.add("disabled")}))},vanillaSelectBox.prototype.enableItems=function(t){let e=this,i=[];"string"==vanillaSelectBox_type(t)&&(t=t.split(",")),"array"==vanillaSelectBox_type(t)&&Array.prototype.slice.call(e.options).forEach((function(e){-1!=t.indexOf(e.value)&&(i.push(e.value),e.removeAttribute("disabled"))})),Array.prototype.slice.call(e.listElements).forEach((function(t){-1!=i.indexOf(t.getAttribute("data-value"))&&t.classList.remove("disabled")}))},vanillaSelectBox.prototype.checkSelectMax=function(t){let e=this;e.maxSelect!=1/0&&e.isMultiple&&(e.maxSelect<=t?Array.prototype.slice.call(e.listElements).forEach((function(t){t.hasAttribute("data-value")&&(t.classList.contains("disabled")||t.classList.contains("active")||t.classList.add("overflow"))})):Array.prototype.slice.call(e.listElements).forEach((function(t){t.classList.contains("overflow")&&t.classList.remove("overflow")})))},vanillaSelectBox.prototype.checkUncheckFromChild=function(t){let e=t.getAttribute("data-parent"),i=document.getElementById(e);if(!this.isMultiple)return;let l=this.drop.querySelectorAll("li"),s=Array.prototype.slice.call(l).filter((function(t){return t.hasAttribute("data-parent")&&t.getAttribute("data-parent")==e&&!t.classList.contains("hidden-search")})),a=0,n=s.length;0!=n&&(s.forEach((function(t){t.classList.contains("active")&&a++})),a===n||0===a?0===a?i.classList.remove("checked"):i.classList.add("checked"):i.classList.remove("checked"))},vanillaSelectBox.prototype.checkUncheckFromParent=function(t){let e=t.id;if(!this.isMultiple)return;let i=this.drop.querySelectorAll("li"),l=Array.prototype.slice.call(i).filter((function(t){return t.hasAttribute("data-parent")&&t.getAttribute("data-parent")==e&&!t.classList.contains("hidden-search")})),s=0,a=l.length;0!=a&&(l.forEach((function(t){t.classList.contains("active")&&s++})),s===a||0===s?(l.forEach((function(t){var e=document.createEvent("HTMLEvents");e.initEvent("click",!0,!1),t.dispatchEvent(e)})),0===s?t.classList.add("checked"):t.classList.remove("checked")):(t.classList.remove("checked"),l.forEach((function(t){if(!t.classList.contains("active")){var e=document.createEvent("HTMLEvents");e.initEvent("click",!0,!1),t.dispatchEvent(e)}}))))},vanillaSelectBox.prototype.checkUncheckAll=function(){let t=this;if(!t.isMultiple)return;let e=0,i=0,l=null;null!=t.listElements&&(Array.prototype.slice.call(t.listElements).forEach((function(t){t.hasAttribute("data-value")&&("all"===t.getAttribute("data-value")&&(l=t),"all"===t.getAttribute("data-value")||t.classList.contains("hidden-search")||t.classList.contains("disabled")||(i++,e+=t.classList.contains("active")))})),l&&(e===i?(l.classList.add("active"),l.innerText=t.userOptions.translations.clearAll,l.setAttribute("data-selected","true")):0===e&&(t.title.textContent=t.userOptions.placeHolder,l.classList.remove("active"),l.innerText=t.userOptions.translations.selectAll,l.setAttribute("data-selected","false"))))},vanillaSelectBox.prototype.setValue=function(t){let e=this,i=e.drop.querySelectorAll("li");if(null==t||null==t||""==t)e.empty();else if(e.isMultiple){"string"==vanillaSelectBox_type(t)&&("all"===t?(t=[],Array.prototype.slice.call(i).forEach((function(e){if(e.hasAttribute("data-value")){let i=e.getAttribute("data-value");"all"!==i&&(e.classList.contains("hidden-search")||e.classList.contains("disabled")||t.push(e.getAttribute("data-value")),e.classList.contains("active")&&(e.classList.contains("hidden-search")||e.classList.contains("disabled"))&&t.push(i))}else e.classList.contains("grouped-option")&&e.classList.add("checked")}))):"none"===t?(t=[],Array.prototype.slice.call(i).forEach((function(e){if(e.hasAttribute("data-value")){let i=e.getAttribute("data-value");"all"!==i&&e.classList.contains("active")&&(e.classList.contains("hidden-search")||e.classList.contains("disabled"))&&t.push(i)}else e.classList.contains("grouped-option")&&e.classList.remove("checked")}))):t=t.split(","));let l=[];if("array"==vanillaSelectBox_type(t)){Array.prototype.slice.call(e.options).forEach((function(e){-1!==t.indexOf(e.value)?(e.selected=!0,l.push(e.value)):e.selected=!1}));let s="",a="",n=0,o=0;if(Array.prototype.slice.call(i).forEach((function(t){o++,-1!=l.indexOf(t.getAttribute("data-value"))?(t.classList.add("active"),n++,s+=a+t.getAttribute("data-text"),a=","):t.classList.remove("active")})),o==n){let t=e.userOptions.translations.all||"all";s=t}else if(-1!=e.multipleSize&&n>e.multipleSize){let t=e.userOptions.translations.items||"items";s=n+" "+t}e.title.textContent=s,e.privateSendChange()}e.checkUncheckAll()}else{let l=!1,s="";Array.prototype.slice.call(i).forEach((function(e){e.getAttribute("data-value")==t?(e.classList.add("active"),l=!0,s=e.getAttribute("data-text")):e.classList.remove("active")})),Array.prototype.slice.call(e.options).forEach((function(e){e.value==t?(e.selected=!0,className=e.getAttribute("class"),className||(className="")):e.selected=!1})),l&&(e.title.textContent=s,""!=e.userOptions.placeHolder&&""==e.title.textContent&&(e.title.textContent=e.userOptions.placeHolder),""!=className?e.title.setAttribute("class",className+" title"):e.title.setAttribute("class","title"))}},vanillaSelectBox.prototype.privateSendChange=function(){let t=document.createEvent("HTMLEvents");t.initEvent("change",!0,!1),this.root.dispatchEvent(t)},vanillaSelectBox.prototype.empty=function(){Array.prototype.slice.call(this.listElements).forEach((function(t){t.classList.remove("active")})),Array.prototype.slice.call(this.options).forEach((function(t){t.selected=!1})),this.title.textContent="",""!=this.userOptions.placeHolder&&""==this.title.textContent&&(this.title.textContent=this.userOptions.placeHolder),this.checkUncheckAll(),this.privateSendChange()},vanillaSelectBox.prototype.destroy=function(){let t=document.getElementById("btn-group-"+this.rootToken);t&&(VSBoxCounter.remove(this.instanceOffset),t.remove(),this.root.style.display="inline-block")},vanillaSelectBox.prototype.disable=function(){let t=document.getElementById("btn-group-"+this.rootToken);t&&(button=t.querySelector("button"),button&&button.classList.add("disabled"),this.isDisabled=!0)},vanillaSelectBox.prototype.enable=function(){let t=document.getElementById("btn-group-"+this.rootToken);t&&(button=t.querySelector("button"),button&&button.classList.remove("disabled"),this.isDisabled=!1)},vanillaSelectBox.prototype.showOptions=function(){},"remove"in Element.prototype||(Element.prototype.remove=function(){this.parentNode&&this.parentNode.removeChild(this)});