<?php
include "header.php";
?>

<?php
include "menu.php";
?>

<div class="container ">
    <h1> Διαχείριση αποθήκης </h1>
   
    <div class="row cc1"><br>
    Αναζήτηση: <input type=text id=srch><br>
        <div class="col-md-4" >
            <h1>Κατηγορίες</h1>
            <button class="btn btn-primary" data-toggle="modal" data-target="#katModal">Νεά Κατηγορία</button>
            <table class="table table-hover">
                <tbody id=categories>

                </tbody>
            </table>

        </div>
        <div class="col-md-4" >
            <h1>Αντικείμενα</h1>
            <button class="btn btn-primary" data-toggle="modal" data-target="#itemModal">Νέο Αντικείμενο</button>
            <table class="table table-hover">

                <tbody id=items>

                </tbody>
            </table>
        </div>
        <div class="col-md-4" >
            <h1>Ενέργειες</h1>
            <button class="btn btn-primary" id=urljsondataload>Φόρτωση από link</button><br>
            <hr>
            <form id=frm2>
                Αρχείο: <input type=file id=fn name=fn><br>
                <button type="submit" class="btn btn-primary">Φόρτωση από Αρχείο</button><br>

            </form>

        </div>

    </div>


</div>






    <!-- Modal -->
    <div id="katModal" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Nέα κατηγορία</h4>
                </div>
                <div class="modal-body">
                
                    <form id="frmk" >
                         <div class="form-group">
                            <label for="idcat">ID Κατηγορίας:</label>
                            <input type="text" class="form-control" id="idcat" name=idcat>
                        </div>

                        <div class="form-group">
                            <label for="kat">Κατηγορία:</label>
                            <input type="text" class="form-control" id="kat" name=kat>
                        </div>
                            
                        <button type="submit" class="btn btn-success">Αποθήκευση</button>  
                        
                    </form>
                </div>
           
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
   



        <!-- Modal -->
    <div id="itemModal" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Nέο Item</h4>
                </div>
                <div class="modal-body">
                
                    <form id="frmitem" >
                    <div class="form-group">
                            <label for="iditem">ID Item:</label>
                            <input type="text" class="form-control" id="iditem" name=iditem>
                        </div>

                        <div class="form-group">
                            <label for="itemname">Όνομα:</label>
                            <input type="text" class="form-control" id="itemname" name=itemname>
                        </div>

                        <div class="form-group">
                            <label for="itemname">Κατηγορία:</label>
                            <select type="text" class="form-control" id="itemcat" name=itemcat>
                            </select>
                                    <script>
                                             $.getJSON("api.php?q=allkatigories",(res)=>{
                                               
                                                for(i=0;i<res.length;i++)
                                                {
                                                    $("#itemcat").append(`<option value='${ res[i].id }'>${ res[i].category_name }</option>`);
                                                }
                                            })
                                    </script>
                       
                            
                            <button type="submit" class="btn btn-success">Αποθήκευση</button>  
                        
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <div>
        </div>
    </div>
 
            <script>
            $("#frmk").submit(()=>{
                event.preventDefault();
                $.post("api.php?q=neakatigoria",$("#frmk").serialize(),(res)=>{
                    if(res!="ok") alert("Error Insert!")
                    else
                    {
                        $("#katModal").modal("hide");
                    
                        showkatigories();
                    }
                })

            })


            $("#frmitem").submit(()=>{
                event.preventDefault();
                $.post("api.php?q=neoitem",$("#frmitem").serialize(),(res)=>{
                    if(res!="ok") alert("Error Insert!")
                    else
                    {
                        $("#itemModal").modal("hide");
                        showitems();
                    }
                })

            })


            function showkatigories()
            {
                $.getJSON("api.php?q=allkatigories",(res)=>{
                    $("#categories").html("");
                    for(i=0;i<res.length;i++)
                    {
                        $("#categories").append(`<tr><td>${ res[i].category_name }</td><td><button onclick='delkat(${ res[i].id })'>Del</button></td>`)
                    }
                })
            }


            function showitems()
            {
                $.getJSON("api.php?q=allitems",(res)=>{
                    $("#items").html("");
                    for(i=0;i<res.length;i++)
                    {
                        $("#items").append(`<tr><td>${ res[i].name }</td>
                                <td>${ res[i].category_name }</td>
                                <td><input type=text value='${ res[i].posotita }' id=p${ res[i].id } size=5>
                                <button onclick=saveposotita(${ res[i].id })>Save</button></td>
                                <td><button onclick='delitem(${ res[i].id })'>Del</button></td>`)
                    }
                })
            }


            showkatigories();
            showitems();


            $("#urljsondataload").click(()=>{
               $.get("api.php?q=loadfromurl",(res)=>{
                if(res=="ok")
                {
                    alert("Τα δεδομένα φορτώθηκαν!");
                }
                else
                {
                    alert("Λάθος ! Τα δεδομένα δε φορτώθηκαν!");
                }
               });

            })


            $("#loadfromfile").click(()=>{
               $.get("api.php?q=loadfromfile",(res)=>{
                if(res=="ok")
                {
                    alert("Τα δεδομένα φορτώθηκαν!");
                    showkatigories();
                }
                else
                {
                    alert("Λάθος ! Τα δεδομένα φορτώθηκαν!");
                }
               });

            })


            $("#frm2").submit(()=>{
                event.preventDefault();
                var fd = new FormData(); 
                var file1 = $('#fn')[0].files[0]; 

                fd.append('fn', file1); 

                $.ajax({ 
                    url: 'api.php?q=loadformfile', 
                    type: 'post', 
                    data: fd, 
                    contentType: false, 
                    processData: false, 
                    success: function(res){ 
                        if(res == "ok"){ 
                            alert("Τα δεδομένα φορτώθηκαν!");
                            showkatigories();
                        } 
                        else{ 
                            alert("Λάθος ! Τα δεδομένα δε φορτώθηκαν!");
                        } 
                    }, 
                }); 

            });


            function delitem(id)
            {
                $.post("api.php?q=delitem",{"id":id},(res)=>{
                    alert("Item deleted");
                    showkatigories();
                    showitems();
                })
            }
                
            function delkat(id)
            {
                $.post("api.php?q=delkat",{"id":id},(res)=>{
                    alert("Category deleted");
                    showkatigories();
                    showitems();
                })
            }


            function searchdata()
            {
                f=$("#srch").val();
                C=$("#categories tr");
                for (i=0;i<C.length;i++)
                {
                    if($(C[i]).text().toUpperCase().indexOf(f.toUpperCase())>=0)
                    {
                        $(C[i]).show();
                    }
                    else
                    {
                        $(C[i]).hide();
                    }
                }

                P=$("#items tr");
                for (i=0;i<P.length;i++)
                {
                    if($(P[i]).text().toUpperCase().indexOf(f.toUpperCase())>=0)
                    {
                        $(P[i]).show();
                    }
                    else
                    {
                        $(P[i]).hide();
                    }
                }
                
            }


            function saveposotita(id)
            {
                x=$("#p"+id).val();
                
                $.post("api.php?q=saveposotita",{"id":id,"pos":x},(res)=>{ 

                });
            }

            $("#srch").on("input",()=>{
                searchdata();
            })
           
            </script>
        
             




          

        </div>
        </div>



<?php
include "footer.php";

?>