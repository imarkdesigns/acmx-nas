var script=directory_uri.dirPath+"/resources/scripts/route/",theme={common:{init:()=>{jQuery.getScript(script+"common.js")}},home:{finalize:()=>{jQuery.getScript(script+"home.js")}},about_nas:{finalize:()=>{jQuery.getScript(script+"about.js")}},single_nas_team:{finalize:()=>{jQuery.getScript(script+"about.js")}},asset_management:{finalize:()=>{jQuery.getScript(script+"asset.js")}},map:{finalize:()=>{jQuery.getScript(script+"map.js")}},contact:{finalize:()=>{jQuery.getScript(script+"contact.js")}}},UTIL={fire:(e,t,i)=>{var n=theme;t=void 0===t?"init":t;var r=""!==e;(r=(r=r&&n[e])&&"function"==typeof n[e][t])&&n[e][t](i)},loadEvents:()=>{UTIL.fire("common"),jQuery.each(document.body.className.replace(/-/g,"_").split(/\s+/),((e,t)=>{UTIL.fire(t),UTIL.fire(t,"finalize")})),UTIL.fire("common","finalize")}};function hidePopAfterOnlineInternetConnection(){}function showPopForOfflineConnection(){alert("Ooppss! There's something wrong about your internet. Please check!")}jQuery(document).ready(UTIL.loadEvents),window.addEventListener("offline",(e=>{showPopForOfflineConnection()})),window.addEventListener("online",(e=>{hidePopAfterOnlineInternetConnection()}));