javascript: void((function (url) {
  
  	if(!window.jQuery)
    {
      alert('No jQuery');
       var script = document.createElement('script');
       script.type = "text/javascript";
       script.src = "//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js";
       document.getElementsByTagName('head')[0].appendChild(script);
    }
  
    var productURL = encodeURIComponent(url),
        cacheBuster = Math.floor(Math.random() * 1e3),
        element = document.createElement('script');
    element.setAttribute('src', '//localhost:90/script/bookmarklet?*=' + cacheBuster + '&url=' + productURL);
    element.onload = init;
    element.setAttribute('type', 'text/javascript');
    document.getElementsByTagName('head')[0].appendChild(element);
    

    function init() {
        alert('fetching...');
        ropazi();
    }
})(window.location.href))