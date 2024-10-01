<?php
include "header.php";
?>

<?php
include "menu.php";
?>

<div class="container">
    <h1>Ανακοινώσεις - Προσφορές</h1>
    <div class="othoni">
        <a href='prosfores.php'><button class="btn btn-primary" >Προσφορές</button></a>
        <table class="table table-hover">
            <tr><th>Ανακοίνωση</th><th>Περιγραφή</th><th>Ημερομηνία</th><th>Αντικείμενα</th><th>Action</th></tr>
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
                <h4 class="modal-title">Νέα προσφορά</h4>
            </div>
            <div class="modal-body">
                <h1>Νέα Προσφορά:</h1>
            
                <form id="frm2" >
                    <input type='hidden' id=idanak name=idanak>
                    <div class="input-group">
                      <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                      <input id="title" type="text" class="form-control" name="title" placeholder="Τίτλος" required>
                    </div><br>
                    <div class="input-group">
                      <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                      <select id="item2" type="text" class="form-control" name="item" placeholder="Αντικείμενο" required>   
                        </select>

                    </div>
                   
                  
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
        function fun3(){
        
            $("#myModal").modal("show");
            $("#frm2")[0].reset();
       
              
              }


        $("#frm2").submit(()=>{
            event.preventDefault();
            $.post("api.php?q=neaprosfora",$("#frm2").serialize(),(res)=>{
                if(res=="ok"){
                    $("#myModal").modal("hide");
                    alert('H προσφορά έγινε');
                    
                }
                else
                {
                    
                    alert("Λάθος η προσφορά δεν έγινε");
                }

            })

        })

        function showanakoinoseis(){

            $.getJSON("api.php?q=allanakoinwseis",(res)=>{
                    $("#anakoinoseis").html("");
                    for(i=0;i<res.length;i++)
                    {

                            let ra=res[i];
                            $.getJSON("api.php?q=itemsanak&id="+ra.id,(res2)=>{

                                p="";
                                for (i=0;i<res2.length;i++)
                                    p+=`${res2[i].name} ποσοτ:${res2[i].pst} | `;


                                $("#anakoinoseis").append(`<tr><td>${ ra.title }</td>
                                    <td>${ ra.description }</td><td>${ ra.date }</td>
                                    <td>${ p }</td>
                                    
                                    <td><button onclick='prosfora(${ ra.id })'>Κάνε προσφορά</button></td>`)

                                
                            });

                       
                    }
            })
        }

        showanakoinoseis();
        var ida;
       
        function prosfora(idp)
        {

                $("#myModal").modal("show");
                $("#idanak").val(idp);
                showproducts(idp);

        }

     

        function showproducts(idanak)
        {
            $.getJSON("api.php?q=itemsanak&id="+idanak,(res)=>{
                $("#item2").html("");
                for (i=0;i<res.length;i++)
                    $("#item2").append(`<option value=${res[i].id}>${res[i].name} </option>`);
            });
        }

</script>
<?php
include "footer.php";

?>