<?php
include "header.php";
?>

<?php
include "menu.php";
?>

<div class="container">


   
   
<a href='mapdias.php'><button>Ολα</button></a>


<a href='mapdias.php?a=1'><button>Αιτήματα</button></a>
<a href='mapdias.php?a=2'><button>Προσφορές</button></a>
<br><br>

<div class="row">
    <div class=col-md-6>
    <div id="map" style="width:100%; height:500px"></div>
    </div>
    <div class=col-md-6>
        <table class=table>
            <tr><th>Task</th><th>User</th><th>Item</th><th>Ποσότητα</th><th>Ημερομηνία</th><th>Action</th></tr>
            <tbody id=datatasks>


            </tbody>
        </table>

    </div>
</div>

</div>

<?php
include "footer.php";

?>


<script>

var marker2;

$.getJSON("api.php?q=diasmap",(res)=>{

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

    var marker = L.marker([station.lat, station.lon], {icon: stationicon }).addTo(map);


       
stationxy=[station.lat, station.lon];
myplace=[diasostes[0].lat, diasostes[0].lon];
d1=map.distance(stationxy, myplace);



   <?php
        if(@$_GET['a']=='' || @$_GET['a']=="1" )
        {
            ?>
         
                for (i=0;i<aitimata.length;i++)
                    {
                        mxy=[aitimata[i].lat, aitimata[i].lon];
                        d2=map.distance(mxy, myplace);

                        cont=`Fullname: ${aitimata[i].fullname} <br>
                        Phone: ${aitimata[i].phone}<br>
                        name: ${aitimata[i].name}<br>
                        QTY: ${aitimata[i].arithmos_atomwn}<br>
                        Date: ${aitimata[i].date}<br>
                       
                        <button onclick='anal1(${aitimata[i].ida})'>Αναλαμβάνω</button><br>

                        
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
                        d2=map.distance(mxy, myplace);

                        cont=`Fullname: ${aitimata2[i].fullname} <br>
                        Phone: ${aitimata2[i].phone}<br>
                        name: ${aitimata2[i].name}<br>
                        QTY: ${aitimata2[i].arithmos_atomwn}<br>
                        Date: ${aitimata2[i].date}<br>
                        
                        

                        
                        `;

                        var polyline = L.polyline([
                            [aitimata2[i].lat, aitimata2[i].lon],
                            myplace]).addTo(map);

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

                        cont=`Fullname: ${prosfores[i].fullname} <br>
                        Phone: ${prosfores[i].phone}<br>
                        name: ${prosfores[i].name}<br>
                        QTY: ${prosfores[i].posotita}<br>
                        Date: ${prosfores[i].date}<br>
                        <button onclick='anal2(${prosfores[i].idp})'>Αναλαμβάνω</button><br>
                        

                        
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

                            cont=`Fullname: ${prosfores2[i].fullname} <br>
                            Phone: ${prosfores2[i].phone}<br>
                            name: ${prosfores2[i].name}<br>
                            QTY: ${prosfores2[i].posotita}<br>
                            Date: ${prosfores2[i].date}<br>
                           <br>
                            

                            
                            `;

                            var polyline = L.polyline([
                            [prosfores2[i].lat, prosfores2[i].lon],
                            myplace]).addTo(map);
                            var marker = L.marker([prosfores2[i].lat, prosfores2[i].lon], {icon: prosfores2icon } ).addTo(map).bindPopup(cont);

                        }



                <?php
            }

        ?>
   

             
    
                
                        cont=diasostes[0].username;
                        
                        if(d1<100)
                        {
                            cont+="<br><button onclick='fortosi()'>Φόρτωση</button><button onclick='ekfortosi()'>Εκφόρτωση</button>";
                           
                        }
                        marker2 = L.marker([diasostes[0].lat, diasostes[0].lon], {icon: diasostisicon, draggable:'true'}).addTo(map).bindPopup(cont);

                        marker2.on('dragend', function(e){
                            var marker = e.target;
                        
                            var position = marker.getLatLng();
                        
                            
                            $.post("api.php?q=placedias",{lat:position.lat,lon:position.lng},(res)=>{ });

                                window.location.href="mapdias.php";

                            
                        });
                           



                    


   
                    $h="";
                    for (i=0;i<aitimata2.length;i++)
                    {

                        mxy=[aitimata2[i].lat, aitimata2[i].lon];
                        d2=map.distance(mxy, myplace);

                        h="";
                        if(d2<100){
                            h=`<button onclick='oloklirosi(${aitimata2[i].ida})'>Ολοκλήρωση</button>`
                        }

                        $h+=`<tr><td>Αίτημα</td><td>${aitimata2[i].fullname}</td>
                        <td>${aitimata2[i].name}</td><td>${aitimata2[i].arithmos_atomwn}</td>
                        <td>${aitimata2[i].date}</td>
                        <td> ${h}
                        <button onclick='akyrosi(${aitimata2[i].ida})'>Ακύρωση</button>
                        </td>`;

                    }
                    for (i=0;i<prosfores2.length;i++)
                    {

                        mxy=[prosfores2[i].lat, prosfores2[i].lon];
                        d2=map.distance(mxy, myplace);

                     
                        h="";
                        if(d1<100){
                            h=`<button onclick='oloklirosi2(${prosfores2[i].idp})'>Ολοκλήρωση</button>`;
                        }
                        $h+=`<tr><td>Προσφορά</td><td>${prosfores2[i].fullname}</td>
                        <td>${prosfores2[i].name}</td><td>${prosfores2[i].posotita}</td>
                        <td>${prosfores2[i].date}</td>
                        <td>
                        ${h}
                        <button onclick='akyrosi2(${prosfores2[i].idp})'>Ακύρωση</button>
                        </td>`;

                    }

                    $("#datatasks").html($h);



})


function anal1(id)
{

    $.post("api.php?q=anal1",{ida:id}, (res)=>{
        if(res==1)
        {
            alert("Ανατέθηκε");
            window.location.href='mapdias.php';
        }
        else
        {
            alert("Δεν Ανατέθηκε. Φορτίο πάνω από 4");
        }

    })


}


function anal2(id)
{

    $.post("api.php?q=anal2",{idp:id}, (res)=>{
        if(res==1)
        {
            alert("Ανατέθηκε");
            window.location.href='mapdias.php';
        }
        else
        {
            alert("Δεν Ανατέθηκε. Φορτίο πάνω από 4");
        }

    })


}


function oloklirosi(id)
{
    $.post("api.php?q=oloklirosi",{idp:id}, (res)=>{
        window.location.href="mapdias.php";
    });
}


function akyrosi(id)
{
    $.post("api.php?q=akyrosi",{idp:id}, (res)=>{
        window.location.href="mapdias.php";
    });
}


function oloklirosi2(id)
{
    $.post("api.php?q=oloklirosi2",{idp:id}, (res)=>{
        window.location.href="mapdias.php";
    });
}


function akyrosi2(id)
{
    $.post("api.php?q=akyrosi2",{idp:id}, (res)=>{
        window.location.href="mapdias.php";
    });
}


function fortosi()
{
    $.post("api.php?q=fortosi", (res)=>{
        window.location.href="mapdias.php";
        alert('Η φρόρτωση έγινε');
    });

}



function ekfortosi()
{
    $.post("api.php?q=ekfortosi", (res)=>{
        window.location.href="mapdias.php";
        alert('Η εκφρόρτωση έγινε');
    });

}


</script>