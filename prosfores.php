<?php
include "header.php";
?>

<?php
include "menu.php";
?>

<div class="container">
    <h1>Προσφορές</h1>
    <div class="othoni">
      
        <table class="table table-hover">
            <tr><th>Προσφορά</th><th>Αντικείμενο</th><th>Ποσότητα</th><th>Ημερομηνία</th><th>Κατάσταση</th><th>Action</th></tr>
            <tbody id="prosfores">
            

            </tbody>
        </table>

    </div>


</div>








<script>
        var marker;
       

       

        showprosfores();
    
        


        function showprosfores()
        {
            $.getJSON("api.php?q=prosforesxristi",(res)=>{
                $("#prosfores").html("");
                for (i=0;i<res.length;i++)
                {
                    xx="";
                    if(res[i].status=="Αναμονή"){
                        xx=`<button onclick='del(${res[i].id})'>Ακύρωση</button>`;
                    }

                    $("#prosfores").append(`<tr><td>${res[i].title}</td><td>${res[i].name}</td>
                    <td>${res[i].posotita}</td>
                    <td>${res[i].date}</td>
                    <td>${res[i].status}</td>
                    <td>${xx}</td></tr> `);
                }
            });
        }


        function del(ida)
        {
            $.post("api.php?q=delprosfora", {"ida":ida},(res)=>{
                showprosfores();
            });
        }
</script>
<?php
include "footer.php";

?>