APP = {
  common: {
    init: function() {
      // application-wide code

    }
  },
  pages: {
    init: function() {
      // controller-wide code

    },

    index: function() {
      // action-specific code

    }
  }
};

UTIL = {
  exec: function( controller, action ) {
    var ns = APP,
        action = ( action === undefined ) ? "init" : action;

    if ( controller !== "" && ns[controller] && typeof ns[controller][action] == "function" ) {
      ns[controller][action]();
    }
  },

  init: function() {
    var body = document.body,
        controller = body.getAttribute( "data-controller" ),
        action = body.getAttribute( "data-action" );

    UTIL.exec( "common" );
    UTIL.exec( controller );
    UTIL.exec( controller, action );
  }
};