<?php
include "header.php";
?>

<?php
include "menu.php";
?>

<div class="container">


   
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
     integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY="
     crossorigin=""/>

 <!-- Make sure you put this AFTER Leaflet's CSS -->
 <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
     integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo="
     crossorigin=""></script>


<h1>Σύνδεση </h1>
<a href='mapadmin.php'><button>Ολα</button></a>


<a href='mapadmin.php?a=1'><button>Αιτήματα</button></a>
<a href='mapadmin.php?a=2'><button>Προσφορές</button></a>
<a href='mapadmin.php?a=3'><button>Διασώστες</button></a><br><br>

<div id="map" style="width:100%; height:500px"></div>

<script>
var markera;

$.getJSON("api.php?q=adminmap",(res)=>{

station=res.station;
aitimata=res.aitimata;
aitimata2=res.aitimata2;
prosfores=res.prosfores;
prosfores2=res.prosfores2;
diasostes=res.diasostes;


var stationicon = L.icon({
iconUrl: 'https://maps.google.com/mapfiles/kml/shapes/schools.png',
iconSize:     [40, 40], // size of the icon

});


var diasostisicon = L.icon({
iconUrl: 'https://maps.google.com/mapfiles/kml/shapes/motorcycling.png',
iconSize:     [40, 40], // size of the icon

});
   
var aitimaicon = L.icon({
iconUrl: 'http://maps.google.com/mapfiles/kml/paddle/O.png',
iconSize:     [40, 40], // size of the icon

});


var aitima2icon = L.icon({
iconUrl: 'http://maps.google.com/mapfiles/kml/paddle/pink-circle.png',
iconSize:     [40, 40], // size of the icon

});



var prosforesicon = L.icon({
iconUrl: 'http://maps.google.com/mapfiles/kml/paddle/grn-blank.png',
iconSize:     [40, 40], // size of the icon

});


var prosfores2icon = L.icon({
iconUrl: 'http://maps.google.com/mapfiles/kml/paddle/ylw-blank.png',
iconSize:     [40, 40], // size of the icon

});





var map = L.map('map').setView([station.lat, station.lon], 13);

L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
maxZoom: 19,
attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
}).addTo(map);

markera = L.marker([station.lat, station.lon], {icon: stationicon , draggable:'true'}).addTo(map);
markera.on('dragend', function(e){
                            var marker = e.target;
                        
                            var position = marker.getLatLng();
                        
                            
                            $.post("api.php?q=placeadmin",{lat:position.lat,lon:position.lng},(res)=>{ });

                                window.location.href="mapadmin.php";

                            
                        });

   
stationxy=[station.lat, station.lon];





<?php
    if(@$_GET['a']=='' || @$_GET['a']=="1" )
    {
        ?>
     
            for (i=0;i<aitimata.length;i++)
                {
                    mxy=[aitimata[i].lat, aitimata[i].lon];
                  
                    cont=`
                    <b>Αίτημα Wait</b><br>
                    Fullname: ${aitimata[i].fullname} <br>
                    Phone: ${aitimata[i].phone}<br>
                    name: ${aitimata[i].name}<br>
                    QTY: ${aitimata[i].arithmos_atomwn}<br>
                    Date: ${aitimata[i].date}<br>

                    `;
                    var marker = L.marker([aitimata[i].lat, aitimata[i].lon],  {icon: aitimaicon }).addTo(map).bindPopup(cont);

                }



        <?php
    }

?>

<?php
if(@$_GET['a']=='' || @$_GET['a']=="1" )
    {
        ?>

       
            for (i=0;i<aitimata2.length;i++)
                {
                    mxy=[aitimata2[i].lat, aitimata2[i].lon];
                

                    cont=`<b>Αίτημα σε ανάθεση</b><br>
                    Fullname: ${aitimata2[i].fullname} <br>
                    Phone: ${aitimata2[i].phone}<br>
                    name: ${aitimata2[i].name}<br>
                    QTY: ${aitimata2[i].arithmos_atomwn}<br>
                    Date: ${aitimata2[i].date}<br>
                    
                    

                    
                    `;

                    var polyline = L.polyline([
                        [aitimata2[i].lat, aitimata2[i].lon],
                        [aitimata2[i].dlat, aitimata2[i].dlon]]).addTo(map);

                    var marker = L.marker([aitimata2[i].lat, aitimata2[i].lon],  {icon: aitima2icon }).addTo(map).bindPopup(cont);

                }



        <?php
    }

?>


<?php
    if(@$_GET['a']=='' || @$_GET['a']=="2" )
    {
        ?>
                for (i=0;i<prosfores.length;i++)
                {

                    cont=`<b>Προσφορά Wait</b><br>
                    Fullname: ${prosfores[i].fullname} <br>
                    Phone: ${prosfores[i].phone}<br>
                    name: ${prosfores[i].name}<br>
                    QTY: ${prosfores[i].posotita}<br>
                    Date: ${prosfores[i].date}<br>
                  
                    

                    
                    `;

                    
                    var marker = L.marker([prosfores[i].lat, prosfores[i].lon], {icon: prosforesicon } ).addTo(map).bindPopup(cont);

                }



        <?php
    }

?>

<?php
        if(@$_GET['a']=='' || @$_GET['a']=="2" )
        {
            ?>
                    for (i=0;i<prosfores2.length;i++)
                    {

                        cont=`<b>Προσφορά προς ανάθεση</b><br>
                        Fullname: ${prosfores2[i].fullname} <br>
                        Phone: ${prosfores2[i].phone}<br>
                        name: ${prosfores2[i].name}<br>
                        QTY: ${prosfores2[i].posotita}<br>
                        Date: ${prosfores2[i].date1}<br>
                       <br>
                        

                        
                        `;

                        var polyline = L.polyline([
                        [prosfores2[i].lat, prosfores2[i].lon],
                        [prosfores2[i].dlat, prosfores2[i].dlon]]).addTo(map);
                        var marker = L.marker([prosfores2[i].lat, prosfores2[i].lon], {icon: prosfores2icon } ).addTo(map).bindPopup(cont);

                    }



            <?php
        }

    ?>


         

              for (i=0;i<diasostes.length;i++)
                {
                    cont=diasostes[i].username;
                    
                    var marker = L.marker([diasostes[i].lat, diasostes[i].lon], {icon: diasostisicon}).addTo(map).bindPopup(cont);

                }

            })


</script>


</div>

<?php
include "footer.php";

?>