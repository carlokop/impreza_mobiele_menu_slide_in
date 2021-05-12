//setCookie
const setCookie = (cookieName,value,minutes,path = '/') => {

    var d = new Date();
    d.setTime(d.getTime() + (minutes*60*1000));
    var expires = "expires="+ d.toUTCString();
    document.cookie = cookieName+"=" + value +"; " + expires +"; path="+path;

    //dataLayer event voor Google Tag Manager
    if (typeof dataLayer != "undefined") {
        dataLayer.push({'event': 'setcookie', 'cookieName': cookieName});
    }

}

//getCookie value
const getCookie = (name) => {
  name = name + '=';
  const decodedCookie = decodeURIComponent(document.cookie);
  let cookies = decodedCookie.split(';');

  for (let i = 0; i < cookies.length; i++) {
    let cookie = cookies[i].trim();
    if (cookie.indexOf(name) == 0) {
      return cookie.substring(name.length, cookie.length);
    }
  }
}

(function() {
    //setCookie wanneer op cookieconsence akkoord is geklikt en verberg element
    if(document.querySelector('#cookieOke')) {
        document.querySelector('#cookieOke').addEventListener('click',() => {
            setCookie('cookieconsence',1,525600);
            document.querySelector('#cookiebar').remove();
        });
    }

    //als er nog geen akkoord op cookieconsence is gegeven tonen we de cookiebar
    if(!getCookie('cookieconsence')) {
        document.querySelector('#cookiebar').classList.add('show');
    }

}());

(function() {
    //voeg url toe aan het einde van alle socialShare links zodat de huidige pagina gedeeld kan worden op sociale media
    if(document.querySelectorAll('.socialShare .w-socials-item-link').length != 0) {

      const socialShareLinks = document.querySelectorAll('.socialShare .w-socials-item-link');
      for(let link of socialShareLinks) {
        link.href = link + location.href;
      }

    }
}());

//Contact Forms 7 GTM dataLayer event
(function() {
  if (typeof dataLayer != "undefined") {
        document.addEventListener( 'wpcf7mailsent', function( event ) {
          window.dataLayer.push({
          "event" : "cf7submission",
          "formId" : event.detail.contactFormId,
          "response" : event.detail.inputs
          })
        });
    }
}());






