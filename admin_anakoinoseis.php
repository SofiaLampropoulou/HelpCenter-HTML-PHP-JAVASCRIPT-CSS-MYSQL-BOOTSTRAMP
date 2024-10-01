<?php
include "header.php";
?>

<?php
include "menu.php";
?>

<div class="container">
    <h1>Ανακοινώσεις</h1>
    <div class="othoni">
        <button class="btn btn-primary" onclick="fun3()">Προσθήκη Ανακοίνωσης</button>
        <table class="table table-hover">
            <tr><th>Ανακοίνωση</th><th>Περιγραφή</th><th>Ημερομηνία</th><th>Action</th></tr>
            <tbody id="anakoinoseis">
            

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
                <h4 class="modal-title">Νέα ανακοίνωση</h4>
            </div>
            <div class="modal-body">
                <h1>Nέα Ανακοίνωση:</h1>
                <form id="frm2" >
                    <div class="input-group">
                      <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                      <input id="title" type="text" class="form-control" name="title" placeholder="Τίτλος" required>
                    </div><br>
                    <div class="input-group">
                      <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                      <input id="descr" type="text" class="form-control" name="descr" placeholder="Περιγραφή" required>
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



            <!-- Modal Products -->
    <div id="myModal2" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Products</h4>
            </div>
            <div class="modal-body">
                <h1 id=titleanak></h1>
                <form id="frm3"  >
                    Προϊόντα: <select id="pr1" name="item"></select> 
                    - Ποσότητα:<input type="number" value=1 name=posotita size=4>
                   
                      <button type="submit" >+</button>  
                  </form>

                  <div id="pr2"></div>

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
       
              
              }


        $("#frm2").submit(()=>{
            event.preventDefault();
            $.post("api.php?q=neaanakoinosi",$("#frm2").serialize(),(res)=>{
                if(res=="ok"){
                    $("#myModal").modal("hide");
                    showanakoinoseis();
                }
                else
                {
                    
                    alert("Λάθος στην αποθήκευση");
                }

            })

        })

        function showanakoinoseis(){

            $.getJSON("api.php?q=allanakoinwseis",(res)=>{
                    $("#anakoinoseis").html("");
                    for(i=0;i<res.length;i++)
                    {
                        $("#anakoinoseis").append(`<tr><td>${ res[i].title }</td>
                        <td>${ res[i].description }</td><td>${ res[i].date }</td>
                        <td><button onclick='productsadd(${ res[i].id })'>Products</button>
                        
                        <button onclick='del(${ res[i].id })'>Del</button>
                        </td>`)
                    }
            })
        }

        showanakoinoseis();
        var ida;
        function productsadd(id)
        {
            ida=id;
            $("#myModal2").modal("show");
            $.getJSON("api.php?q=anakoinwsi&id="+id,(res)=>{
                $("#titleanak").html(res[0].title);
            });
            $.getJSON("api.php?q=allitems",(res)=>{
                $("#pr1").html("");
                for (i=0;i<res.length;i++)
                    $("#pr1").append(`<option value=${res[i].id}>${res[i].name}</option>`);
            });
            showproducts();

        }


        function del(id)
        {
          
           
            $.get("api.php?q=anakoinwsidel&id="+id,(res)=>{
                showanakoinoseis();
            });
            

        }


        $("#frm3").submit(()=>{
            event.preventDefault();
            $.post("api.php?q=additemanak&id="+ida,$("#frm3").serialize(),(res)=>{
                showproducts();
            });
        });

        function showproducts()
        {
            $.getJSON("api.php?q=itemsanak&id="+ida,(res)=>{
                $("#pr2").html("");
                for (i=0;i<res.length;i++)
                    $("#pr2").append(`${res[i].name} ποσοτ:${res[i].pst} | `);
            });
        }

</script>
<?php
include "footer.php";

?>