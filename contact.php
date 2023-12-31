<style>
    #map {
        height: 400px;
        width: 100%;
    }
</style>
<?php
include_once("navbar.php");
?>
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d11556.636392959765!2d3.91121965427662!3d43.60322887597163!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x12b6a576a2c1a581%3A0x9c4122386e119c14!2sOdysseum%2C%2034000%20Montpellier!5e0!3m2!1sfr!2sfr!4v1699461715101!5m2!1sfr!2sfr" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous" defer></script>
        <script
            src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&callback=initMap"
            async
            defer
        ></script>
        <script>
            function initMap() {
                var myLatLng = { lat: 48.8566, lng: 2.3522 };

                var map = new google.maps.Map(document.getElementById("map"), {
                    zoom: 4,
                    center: myLatLng,
                });

                var marker = new google.maps.Marker({
                    position: myLatLng,
                    map: map,
                    title: "Hello World!",
                });
            }
        </script>
    </body>
</html>
