(()=>{var t={n:e=>{var o=e&&e.__esModule?()=>e.default:()=>e;return t.d(o,{a:o}),o},d:(e,o)=>{for(var a in o)t.o(o,a)&&!t.o(e,a)&&Object.defineProperty(e,a,{enumerable:!0,get:o[a]})},o:(t,e)=>Object.prototype.hasOwnProperty.call(t,e),r:t=>{"undefined"!=typeof Symbol&&Symbol.toStringTag&&Object.defineProperty(t,Symbol.toStringTag,{value:"Module"}),Object.defineProperty(t,"__esModule",{value:!0})}},e={};(()=>{"use strict";t.r(e);const o=flarum.core.compat["common/app"];t.n(o)().initializers.add("muhammedsaidckr/flarum-chatgpt",(function(){console.log("[muhammedsaidckr/flarum-chatgpt] Hello, forum and admin!")}));const a=flarum.core.compat["admin/app"];var n=t.n(a);function i(t,e){return i=Object.setPrototypeOf?Object.setPrototypeOf.bind():function(t,e){return t.__proto__=e,t},i(t,e)}const r=flarum.core.compat["admin/components/ExtensionPage"];var s=function(t){var e,o;function a(){return t.apply(this,arguments)||this}o=t,(e=a).prototype=Object.create(o.prototype),e.prototype.constructor=e,i(e,o);var n=a.prototype;return n.oninit=function(e){t.prototype.oninit.call(this,e),this.loading=!1},n.content=function(){return m("div",{className:"ExtensionPage-settings"},m("div",{className:"container"},m("div",{className:"Form"},this.buildSettingComponent({setting:"muhammedsaidckr-chatgpt.api_key",type:"text",label:"API Key",help:"Help",placeholder:"sk-..."}),this.buildSettingComponent({setting:"muhammedsaidckr-chatgpt.model",type:"dropdown",options:{"gpt-3.5-turbo-instruct":"gpt-3.5-turbo-instruct","gpt-3.5-turbo-16k-0613":"gpt-3.5-turbo-16k-0613","gpt-3.5-turbo-16k":"gpt-3.5-turbo-16k","text-davinci-003":"text-davinci-003","gpt-4":"gpt-4","gpt-4-0613":"gpt-4-0613","gpt-4-32k":"gpt-4-32k","gpt-4-32k-0613":"gpt-4-32k-0613","gpt-4-0314":"gpt-4-0314","gpt-4-32k-0314":"gpt-4-32k-0314"}}),this.buildSettingComponent({setting:"muhammedsaidckr-chatgpt.max_tokens",type:"number",default:100}),this.buildSettingComponent({setting:"muhammedsaidckr-chatgpt.user_prompt",type:"text"}),this.buildSettingComponent({setting:"muhammedsaidckr-chatgpt.user_prompt_badge_text",type:"text"}),this.buildSettingComponent({setting:"muhammedsaidckr-chatgpt.enable_on_discussion_started",type:"boolean"}),this.buildSettingComponent({type:"flarum-tags.select-tags",setting:"muhammedsaidckr-chatgpt.enabled-tags",options:{requireParentTag:!1,limits:{max:{secondary:0}}}}),m("div",{className:"Form-group"},this.submitButton()))))},a}(t.n(r)());n().initializers.add("muhammedsaidckr/flarum-chatgpt",(function(){console.log("Hello, admin!"),n().extensionData.for("muhammedsaidckr-chatgpt").registerPermission({label:n().translator.trans("muhammedsaidckr-chatgpt.admin.permissions.use_chatgpt_assistant_label"),icon:"fas fa-comment",permission:"discussion.useChatGPTAssistant",allowGuest:!1},"start").registerPage(s)}))})(),module.exports=e})();
//# sourceMappingURL=admin.js.map