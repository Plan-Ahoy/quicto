<!DOCTYPE html>
<html>
    <head>
        <title>Quicto - The quickest way to find a picto</title>
        <link rel="stylesheet" href="css/main.css"/>

    </head>
    <body>
        @include( 'layout.header' )

        <div class="container">
            @include( 'messages.errors' )
            @include( 'messages.flash' )

            @yield( 'content' )

        </div>

        <footer>
            @yield( 'footer' )

            <div class="copyright">
                <p>a PlanAhoy thingie</p>
            </div>
        </footer>
        <script src="js/app.js"></script>
    </body>
</html>
