<html>
<head>
    <title>Login</title>
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

        <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

        <!-- Latest compiled JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
     integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY="
     crossorigin=""/>

     <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
     integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo="
     crossorigin=""></script>

    <link rel="stylesheet" href="my.css">
    <meta charset="utf-8">

</head>
<body>

    <div id="main" >
        <div class="title1">
            <h1>Choose Account Type</h1>
        </div>

        <div class="usertype">
            <div class="row">
              
                <div class="col-md-4 icon1" id="admin">
                    <img src="images/admin.png"><br>
                    Διαχειριστής
                </div>

                <div class="col-md-4 icon1" id="dias">
                    <img src="images/dias.png"><br>
                    Διασώστης
                </div>
                <div class="col-md-4 icon1" id="user">
                <img src="images/user.png"><br>
                    Πολίτης
                </div>
             
          
        </div>


        <div class="minima1">
            <h1>Συμπληρώστε τα στοιχεία για σύνδεση:</h1>
        </div>
        <div class="form">
        
            <div class="col-md-offset-2 col-md-8">
                <form id="frm1">

                        
                        <div class="input-group">
                          <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                          <input id="username" type="text" class="form-control" name="username" placeholder="Username">
                        </div>
                        <div class="input-group">
                          <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                          <input id="password" type="password" class="form-control" name="password" placeholder="Password">
                        </div>
                        <div id="msgl"></div>
                        <div class="btn1">
                            <div class="row">
                            <div class="col-md-6 text-left">
                               <br>
                               <button type="button" class="btn btn-warning" onclick="fun3()">Εγγραφή σαν Πολίτης</button>
                            </div>

                            <div class="col-md-6 text-right">
                                <br>
                                <input type="hidden" name="typeuser" id="typeuser" value="" >
                                <button type="submit" class="btn btn-success">Σύνδεση</button>
                            </div>
                            </div>
                        
                        </div>


                </form>
            </div>
            
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
                <h1>Συμπληρώστε την φόρμα για εγγραφή σαν πολίτης:</h1>
                <form id="frm2"  >
                    <div class="input-group">
                      <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                      <input id="username2" type="text" class="form-control" name="username" placeholder="Username" required>
                    </div><br>
                    <div class="input-group">
                      <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                      <input id="password2" type="password" class="form-control" name="password" placeholder="Password" required>
                    </div><br>
                    <div class="input-group">
                      <span class="input-group-addon">Name</span>
                      <input id="name2" type="text" class="form-control" name="fullname" placeholder="Ονοματεπώνυμο" required>
                    </div><br>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-phone"></i></span>
                        <input id="phone2" type="text" class="form-control" name="phone" placeholder="Τηλέφωνο" required>
                      </div>
                      <br><br>
                        <div id="map" style="width:100%; height:200px;"></div>
                     
                        <input type="hidden" name="x" id="xx"><input type="hidden" name="y" id="yy">
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

<style>
    .leaflet-container {
			height: 400px;
			width: 100%;
			max-width: 100%;
			max-height: 100%;
		}
</style>



    <script>

        
        $("#admin").click(()=>{
                erase(); 
                $("#admin").css("background-color","rgb(125, 168, 153)");
                $("#typeuser").val("admin");
           
        });


        $("#user").click(()=>{
                erase();
                $("#user").css("background-color","rgb(125, 168, 153)");
                $("#typeuser").val("user");
            
        });

        $("#dias").click(()=>{
                erase();
                $("#dias").css("background-color","rgb(125, 168, 153)");
                $("#typeuser").val("dias");
            
        });

        $("#frm1").submit(()=>{
            event.preventDefault();
           
            $.post("api.php?q=login",$("#frm1").serialize(),(res)=>{
                if(res=="ok"){
                    
                    window.location.href="login.php";
                }
                else
                {
                    $("#msgl").html(`<div class="alert alert-danger">
                                    Λάθος σύνδεση. Έχετε δώσει λάθος στοιχεία.
                                    </div>`);
                }
            })

        })


        $("#frm2").submit(()=>{
            event.preventDefault();
           
            $.post("api.php?q=signup",$("#frm2").serialize(),(res)=>{
                if(res=="ok"){
                    $("#msgs").html(`<div class="alert alert-success">
                                    Ο λογαριασμός σας αποθηκεύτηκε.
                                    </div>`);
                }
                else
                {
                    $("#msgs").html(`<div class="alert alert-danger">
                                    Λάθος στην αποθήκευση. Πιθανά έχετε δώσει Username που ήδη υπάρχει
                                    </div>`);
                }
            })

        })

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
        
        function erase()
        {
            $("#admin").css("background-color","transparent");
            $("#user").css("background-color","transparent");
            $("#dias").css("background-color","transparent");
        }
    </script>

</body>