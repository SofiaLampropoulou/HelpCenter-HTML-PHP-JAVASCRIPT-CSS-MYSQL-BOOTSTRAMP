<?php
include "header.php";
?>

<?php
include "menu.php";
?>

<div class="container">
    <h1>Αιτήματα</h1>
    <div class="othoni">
        <button class="btn btn-primary" onclick="fun3()">Προσθήκη Αιτήματος</button>
        <table class="table table-hover">
            <tr><th>Αίτημα</th><th>Αντικείμενο</th><th>Πλήθος Ατόμων</th><th>Ημερομηνία</th><th>Κατάσταση</th><th>Action</th></tr>
            <tbody id="aitima">
            

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
                <h4 class="modal-title">Νέο Αίτημα</h4>
            </div>
            <div class="modal-body">
                <h1>Nέα Αίτημα:</h1>
                <form id="frm2" >
                    <div class="input-group">
                      <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                      <input id="title" type="text" class="form-control" name="title" placeholder="Τίτλος" required>
                    </div><br>
                    <div class="input-group">
                      <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                      <select id="item" type="text" class="form-control" name="item" placeholder="Αντικείμενο" required>   
                        </select>

                    </div><br>
                    <div class="input-group">
                      <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                      <input id="atoma" type="number" class="form-control" name="atoma" placeholder="Αριθμός Ατόμων" required>
                    </div><br>
                  
                      <br>
                    
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
            $("#frm2")[0].reset();
            $.getJSON("api.php?q=allitems",(res)=>{
                $("#item").html("");
                for (i=0;i<res.length;i++)
                    $("#item").append(`<option value=${res[i].id}>${res[i].name}</option>`);
            });
              
        }


        $("#frm2").submit(()=>{
            event.preventDefault();
            $.post("api.php?q=neoaitima",$("#frm2").serialize(),(res)=>{
                if(res=="ok"){
                    $("#myModal").modal("hide");
                    showaitimata();
                }
                else
                {
                    
                    alert("Λάθος στην αποθήκευση");
                }

            })

        })

       

        showaitimata();
    
        


        function showaitimata()
        {
            $.getJSON("api.php?q=aitimataxristi",(res)=>{
                $("#aitima").html("");
                for (i=0;i<res.length;i++)
                {
                    xx="";
                    if(res[i].status=="Αναμονή"){
                        xx=`<button onclick='del(${res[i].id})'>Ακύρωση</button>`;
                    }

                    $("#aitima").append(`<tr><td>${res[i].title}</td><td>${res[i].name}</td>
                    <td>${res[i].arithmos_atomwn}</td>
                    <td>${res[i].date}</td>
                    <td>${res[i].status}</td><td>${xx}</td></tr> `);
                }
            });
        }


        function del(ida)
        {
            $.post("api.php?q=delaitima", {"ida":ida},(res)=>{
                showaitimata();
            });
        }
</script>
<?php
include "footer.php";

?>