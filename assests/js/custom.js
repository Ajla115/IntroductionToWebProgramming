/*$(document).ready(function() {

  $("main#spapp > section").height($(document).height() - 60);

  var app = $.spapp({pageNotFound : 'error_404'}); // initialize

  // define routes
  app.route({
    view: 'view_1',
    onCreate: function() { $("#view_1").append($.now()+': Written on create<br/>'); },
    onReady: function() { $("#view_1").append($.now()+': Written when ready<br/>'); }
  });
  app.route({view: 'view_2', load: 'view_2.html' });
  app.route({
    view: 'view_3', 
    onCreate: function() { $("#view_3").append("I'm the third view"); }
  });

  // run app
  app.run();

});*/

$(document).ready(function () {
  $("main#spapp > section").height($(document).height() - 60);

  var app = $.spapp({ pageNotFound: "error_404" }); // initialize
  app.route({
    view: "students",
    load: "students.html",
  });
  app.route({
    view: "highcharts",
    load: "highcharts.html",
  });

  app.route({
    view: "select2",
    load: "select2.html",
  });

  app.route({
    view: "datatable",
    load: "datatable.html",
  });

  app.route({
    view: "ex1",
    load: "ex1.html",
  });

  app.route({
    view: "ex2",
    load: "ex2.html",
  });

  app.route({
    view: "form",
    load: "form.html",
  });

  // run app
  app.run();
});