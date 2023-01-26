$( ".change" ).on("click", function() {
    if( $( "body" ).hasClass( "dark" )) {
        $( "body" ).removeClass( "dark" );
        $( "select" ).removeClass( "dark" );
        $( "input" ).removeClass( "dark" );
        $( "th" ).removeClass( "dark" );
        $( "td" ).removeClass( "dark" );
        $( "option" ).removeClass( "dark" );
        $( "h1" ).removeClass( "dark" );
        $( ".mode" ).removeClass( "dark" );
        $( ".toggleOn" ).removeClass( "dark" );
        $( ".change" ).removeClass( "dark" );
        $( ".change" ).text( "OFF" );
    } else {
        $( "body" ).addClass( "dark" );
        $( "select" ).addClass( "dark" );
        $( "input" ).addClass( "dark" );
        $( "th" ).addClass( "dark" );
        $( "td" ).addClass( "dark" );
        $( "option" ).addClass( "dark" );
        $( "h1" ).addClass( "dark" );
        $( ".mode" ).addClass( "dark" );
        $( ".toggleOn" ).addClass( "dark" );
        $( ".change" ).addClass( "dark" );
        $( ".change" ).text( "ON" );
    }
});