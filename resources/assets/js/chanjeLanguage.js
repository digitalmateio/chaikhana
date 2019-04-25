$(document).ready(function(){

  $("#LanguageSwitcher").change(function(){

    var locale = $(this).val();
    var _token = $("input[name=_token]").val();
    var url = window.location.origin; //current domain

    var Urlsegments = location.pathname.split('/'); 
    Urlsegments.shift();
    Urlsegments.shift();
    //console.log(Urlsegments);
    //url = url + '/'+ locale;
    Urlsegments.forEach(function(segment) {
      url = url + '/' + segment;
    });
       
       window.location = url;
  });
});
