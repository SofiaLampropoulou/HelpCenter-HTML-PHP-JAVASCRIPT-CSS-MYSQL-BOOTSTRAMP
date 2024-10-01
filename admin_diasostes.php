<?php
include "header.php";
?>

<?php
include "menu.php";
?>

<div class="container">
    <h1>Διασώστες</h1>
    <div class="othoni">
        <button class="btn btn-primary" onclick="fun3()">Προσθήκη Διασώστη</button>
        <table class="table table-hover">
            <tr><th>Username</th><th>Action</th></tr>
            <tbody id="diasostes">
            

            </tbody>
        </table>

    </div>


</div>



    <!-- Modal -->
    <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Εγγραφή</h4>
            </div>
            <div class="modal-body">
                <h1>Νέος Διασώστης:</h1>
                <form id="frm2" >
                    <div class="input-group">
                      <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                      <input id="username2" type="text" class="form-control" name="username" placeholder="Username" required>
                    </div><br>
                    <div class="input-group">
                      <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                      <input id="password2" type="password" class="form-control" name="password" placeholder="Password" required>
                    </div><br>
                  
                      <br><br>
                        <div id="map" style="width:100%; height:200px;"></div>
                     
                        <input type="hidden" name="x" id="xx" required><input type="hidden" name="y" id="yy" required>
                      <br>
                      <div id="msgs"></div>
                      <button type="submit" class="btn btn-success">Αποθήκευση</button>  <button type="reset" class="btn btn-danger">Καθαρισμός</button>
                  </form>
        
        
             




            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
            </div>

        </div>
        </div>



<script>

        var marker;
        function fun3()
        {
            $("#myModal").modal("show");
            
       
                setTimeout(()=>{
                      
                    var map = L.map('map').setView([38.00618294275274, 23.63976089317953], 8);
                    L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
                                maxZoom: 19,
                                attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
                            }).addTo(map);

                            map.on('click', function(e){
                                try{
                                    map.removeLayer(marker);
                                }catch(e){}
                                    marker = new L.marker(e.latlng).addTo(map);
                                    x=e.latlng.lat;
                                    y=e.latlng.lng;
                                    $("#xx").val(x);
                                    $("#yy").val(y);
                                    
                                
                            });
                },1000);
            }


            $("#frm2").submit(()=>{
            event.preventDefault();
            if($("#xx").val()=="") { alert("Επέλεξε σημειο στο χάρτη"); return;}
            $.post("api.php?q=neosdiasostis",$("#frm2").serialize(),(res)=>{
                if(res=="ok"){
                    $("#msgs").html(`<div class="alert alert-success">
                                    Ο λογαριασμός σας αποθηκεύτηκε.
                                    </div>`);
                                    showdiasostes();
                }
                else
                {
                    $("#msgs").html(`<div class="alert alert-danger">
                                    Λάθος στην αποθήκευση. Πιθανά έχετε δώσει Username που ήδη υπάρχει
                                    </div>`);
                }
            })

        })

        function showdiasostes(){
            $.getJSON("api.php?q=alldiasostes",(res)=>{
                    $("#diasostes").html("");
                    for(i=0;i<res.length;i++)
                    {
                        $("#diasostes").append(`<tr><td>${ res[i].username }</td>
                        <td><button onclick='del(${ res[i].id })'>Delete</button></td>`)
                    }
            })
        }

        function del(id)
        {
            c=confirm("Θες σίγουρα να διαγράψεις το διασώστη ;");
            if(c)
            {
                $.get("api.php?q=deldiasosti&id="+id,(res)=>{
                    showdiasostes();   
                });
            }
        }

        showdiasostes();
</script>
<?php
include "footer.php";

?>