<?php
session_start();
$conn=mysqli_connect("localhost","root","","dbweb2324");

mysqli_query($conn, "set names 'utf8'");

if($_GET['q']=="signup")
{
    $sql1="INSERT INTO `users` (`id`, `username`, `password`, `fullname`, `phone`, lat, lon) VALUES 
            (NULL, '$_POST[username]', '$_POST[password]', '$_POST[fullname]', '$_POST[phone]', '$_POST[x]', '$_POST[y]')";

    if(mysqli_query($conn,$sql1))
    {
        echo "ok";
    }
    else
    {
        echo "error";
    }
}


if($_GET['q']=="login")
{

    if($_POST['typeuser']=="admin")
    {
        $sql1="select * from  `admin` where `username`='$_POST[username]' and `password`='$_POST[password]'";

    }
    
    if($_POST['typeuser']=="user")
    {
        $sql1="select * from  `users` where `username`='$_POST[username]' and `password`='$_POST[password]'";
    }

    
    if($_POST['typeuser']=="dias")
    {
        $sql1="select * from  `diasostes` where `username`='$_POST[username]' and `password`='$_POST[password]'";
    }

    $q=mysqli_query($conn,$sql1);

    if(mysqli_num_rows($q)>0)
    {
        $r=mysqli_fetch_assoc($q);
        $_SESSION['username']=$_POST['username'];
        $_SESSION['typeuser']=$_POST['typeuser'];
        $_SESSION['uid']=$r['id'];
        echo "ok";
    }
    else
    {
        echo "error";
    }
}





if($_GET['q']=="neosdiasostis")
{
    $sql1="INSERT INTO `diasostes` (`id`, `username`, `password`, lat, lon) VALUES 
            (NULL, '$_POST[username]', '$_POST[password]', '$_POST[x]', '$_POST[y]')";

    if(mysqli_query($conn,$sql1))
    {
        echo "ok";
    }
    else
    {
        echo "error";
    }

}



if($_GET['q']=="alldiasostes")
{
    $sql1="select * from `diasostes`" ;

    $q=mysqli_query($conn,$sql1);
    $A=$q->fetch_all(MYSQLI_ASSOC);

    echo json_encode($A);
}



if($_GET['q']=="deldiasosti")
{
    $sql1="delete from `diasostes` where id=$_GET[id]" ;

    $q=mysqli_query($conn,$sql1);
   

    echo "ok";
}




if($_GET['q']=="delkat")
{
    $sql1="delete from `categories` where id=$_POST[id]" ;

    $q=mysqli_query($conn,$sql1);
   

    echo "ok";
}


if($_GET['q']=="delitem")
{
    $sql1="delete from `item` where id=$_POST[id]" ;

    $q=mysqli_query($conn,$sql1);
   

    echo "ok";
}




if($_GET['q']=="neakatigoria")
{
    $sql1="insert into categories set id='$_POST[idcat]',category_name='$_POST[kat]'" ;

    try{
        $q=mysqli_query($conn,$sql1);
        echo "ok";
    }
    catch(Exception $ee)
    {
        echo "error";
    }

 
}




if($_GET['q']=="neoitem")
{
    $sql1="insert into item set 
                        id='$_POST[iditem]',
                         name='$_POST[itemname]',
                         category=$_POST[itemcat]" ;

                         try{
                            $q=mysqli_query($conn,$sql1);
                            echo "ok";
                        }
                        catch(Exception $ee)
                        {
                            echo "error";
                        }
}


if($_GET['q']=="saveposotita")
{
    $sql1="update item set 
                        posotita='$_POST[pos]'
                         where id=$_POST[id]" ;

                         try{
                            $q=mysqli_query($conn,$sql1);
                            echo "ok";
                        }
                        catch(Exception $ee)
                        {
                            echo "error";
                        }
}







if($_GET['q']=="allkatigories")
{
    $sql1="select * from `categories` order by category_name" ;

    $q=mysqli_query($conn,$sql1);
    $A=$q->fetch_all(MYSQLI_ASSOC);

    echo json_encode($A);
}




if($_GET['q']=="allitems")
{
    $sql1="select item.id as id,name,category_name,posotita 
            from `item`, categories where category=categories.id order by name" ;

    $q=mysqli_query($conn,$sql1);
    $A=$q->fetch_all(MYSQLI_ASSOC);

    echo json_encode($A);
}





if($_GET['q']=="loadfromurl")
{
    $link="http://usidas.ceid.upatras.gr/web/2023/export.php";

    try {
        $data=file_get_contents($link);
        $json=json_decode($data);
        foreach($json->categories as $cat){
            try{
                $sql2="insert into categories(id,category_name) value('".$cat->id."','".$cat->category_name."')";
                mysqli_query($conn,$sql2);
            }
            catch(Exception $e2)
            {
                $sql2="update categories set category_name='".$cat->category_name."' where id='".$cat->id."' ";
                mysqli_query($conn,$sql2); 
            }
        }


        foreach($json->items as $item){
            try{
                $sql2="insert into item(id,name,category) value('".$item->id."','".$item->name."','".$item->category."' )";
                mysqli_query($conn,$sql2);
                
                
            }
            catch(Exception $e2)
            {
                $sql2="update item set name='".$item->name."', category='".$item->category."' where id='".$item->id."' ";
                mysqli_query($conn,$sql2); 
            }
            mysqli_query($conn,"delete from details where item=".$item->id);
            foreach($item->details as $dt){
               
                
                    $sql2="insert into details(detail_name,detail_value,item) value('".$dt->detail_name."','".$dt->detail_value."','".$item->id."' )";
                    mysqli_query($conn,$sql2);
                    
                    
               

            }
        }
        echo "ok";
    
    }
    catch(Exception $e)
    {
        echo "error";
    }
}
    





if($_GET['q']=="loadformfile")
{
    if(move_uploaded_file($_FILES["fn"]["tmp_name"],"data.json"))
    {

            $link="data.json";

            try {
                $data=file_get_contents($link);
                $json=json_decode($data);
                foreach($json->categories as $cat){
                    try{
                        $sql2="insert into categories(id,category_name) value('".$cat->id."','".$cat->category_name."')";
                        mysqli_query($conn,$sql2);
                    }
                    catch(Exception $e2)
                    {
                        $sql2="update categories set category_name='".$cat->category_name."' where id='".$cat->id."' ";
                        mysqli_query($conn,$sql2); 
                    }
                }


                foreach($json->items as $item){
                    try{
                        $sql2="insert into item(id,name,category) value('".$item->id."','".$item->name."','".$item->category."' )";
                        mysqli_query($conn,$sql2);
                        
                        
                    }
                    catch(Exception $e2)
                    {
                        $sql2="update item set name='".$item->name."', category='".$item->category."' where id='".$item->id."' ";
                        mysqli_query($conn,$sql2); 
                    }
                    mysqli_query($conn,"delete from details where item=".$item->id);
                    foreach($item->details as $dt){
                    
                        
                            $sql2="insert into details(detail_name,detail_value,item) value('".$dt->detail_name."','".$dt->detail_value."','".$item->id."' )";
                            mysqli_query($conn,$sql2);
                            
                            
                    

                    }
                }
                echo "ok";
            
            }
            catch(Exception $e)
            {
                echo "error";
            }
    }
    else
    {
        echo "error";
    }
}
    
  



if($_GET['q']=="neaanakoinosi")
{
    $sql1="insert into anakoinosi set title='$_POST[title]', description='$_POST[descr]', `date`=now()" ;

   if( $q=mysqli_query($conn,$sql1)) echo "ok";
   else echo "error";
}


if($_GET['q']=="anakoinwsi")
{
    $sql1="select * from anakoinosi where id=$_GET[id]" ;

    $q=mysqli_query($conn,$sql1);
    $A=$q->fetch_all(MYSQLI_ASSOC);

    echo json_encode($A);
}




if($_GET['q']=="allanakoinwseis")
{
    $sql1="select * from anakoinosi order by date desc" ;
    $q=mysqli_query($conn,$sql1);
    $A=$q->fetch_all(MYSQLI_ASSOC);

   echo json_encode($A);
}

if($_GET['q']=="anakoinwsidel")
{

    $sql1="delete from anakoinosi where id=$_GET[id]" ;
    $q=mysqli_query($conn,$sql1);
    echo 1;
}







if($_GET['q']=="additemanak")
{
    $sql1="insert into item_anakoinosi set 	anakoinosi=$_GET[id], item=$_POST[item], posotita='$_POST[posotita]'" ;

    $q=mysqli_query($conn,$sql1);
    

    echo json_encode("ok");
}



if($_GET['q']=="itemsanak")
{
    $sql1="select *, item_anakoinosi.posotita as pst from item_anakoinosi, item  
            where item.id=item_anakoinosi.item 
            and anakoinosi=$_GET[id]" ;

  
    $q=mysqli_query($conn,$sql1);
    $A=$q->fetch_all(MYSQLI_ASSOC);

   echo json_encode($A);
}






if($_GET['q']=="neoaitima")
{
    $sql1="insert into aitimata set title='$_POST[title]',
        arithmos_atomwn='$_POST[atoma]', item='$_POST[item]', 
        date=now(), user=$_SESSION[uid], 
        status='Αναμονή'" ;

     
    if($q=mysqli_query($conn,$sql1))
    {
        echo "ok";
    }
    else
    {
        echo "error";
    }
 
}


if($_GET['q']=="aitimataxristi")
{

    $sql1="select aitimata.id, item.name, title, arithmos_atomwn, status,`date` from aitimata, item where
    item.id=aitimata.item  and user=$_SESSION[uid] order by id desc" ;
    $q=mysqli_query($conn,$sql1);
    $A=$q->fetch_all(MYSQLI_ASSOC);

   echo json_encode($A);

}




if($_GET['q']=="delaitima")
{

    $sql1="delete from aitimata where id=$_POST[ida]" ;
    $q=mysqli_query($conn,$sql1);
   

   echo "ok";

}




if($_GET['q']=="neaprosfora")
{
    $sql2="select * from item_anakoinosi where item=$_POST[item] and anakoinosi=$_POST[idanak]";
    $q2=mysqli_query($conn,$sql2);
    $r2=mysqli_fetch_array($q2);
  

    $sql1="insert into prosfora set title='$_POST[title]',
        posotita='$r2[posotita]', item='$_POST[item]', 
        date=now(), user=$_SESSION[uid], 
        status='Αναμονή'" ;

     
    if($q=mysqli_query($conn,$sql1))
    {
        echo "ok";
    }
    else
    {
        echo "error";
    }
 
}


if($_GET['q']=="prosforesxristi")
{

    $sql1="select prosfora.id, item.name, title, prosfora.posotita, status,`date` from prosfora, item where
    item.id=prosfora.item  and user=$_SESSION[uid] order by id desc" ;
    $q=mysqli_query($conn,$sql1);
    $A=$q->fetch_all(MYSQLI_ASSOC);

   echo json_encode($A);

}




if($_GET['q']=="delprosfora")
{

    $sql1="delete from aitimata where id=$_POST[ida]" ;
    $q=mysqli_query($conn,$sql1);
   

   echo "ok";

}





if($_GET['q']=="diasmap")
{

    $A=[];

    $q=mysqli_query( $conn, "SELECT * FROM diasostes where id=$_SESSION[uid]" );
    $B=[];
    while($r2=mysqli_fetch_assoc($q))
    {
        $B[]=$r2;
      
    }

    $A["diasostes"]=$B;
    


    $q=mysqli_query($conn,"SELECT * FROM `admin`");
    $r=mysqli_fetch_assoc($q);
    $A["station"]=$r;

    $q=mysqli_query($conn,"SELECT aitimata.id as ida , fullname,lat,lon,
                    phone,name,arithmos_atomwn,`date` 
                    FROM `users`,aitimata, item
                    where users.id=aitimata.user and item.id=aitimata.item 
                    and status='Αναμονή'");
    $B=[];
    while($r2=mysqli_fetch_assoc($q))
    {
        $B[]=$r2;
    }

    $A["aitimata"]=$B;


    $q=mysqli_query($conn,"SELECT aitimata.id as ida ,fullname,lat,lon, phone,
                        name,arithmos_atomwn,`date`
                        FROM users,aitimata, item 
                        where users.id=aitimata.user 
                        and item.id=aitimata.item
                        and status='Ανάθεση' 
                        and diasostis=$_SESSION[uid]");
    $B=[];
    while($r2=mysqli_fetch_assoc($q))
    {
        $B[]=$r2;
    }

    $A["aitimata2"]=$B;



    $q=mysqli_query($conn,"SELECT prosfora.id as idp, 
    fullname,lat,lon,phone,name,prosfora.posotita,`date`
     FROM users,prosfora , item
     where users.id=prosfora.user 
     and item.id=prosfora.item
     and status='Αναμονή'");
    $B=[];
    while($r2=mysqli_fetch_assoc($q))
    {
        $B[]=$r2;
    }

    $A["prosfores"]=$B;

    $q=mysqli_query($conn,"SELECT prosfora.id as idp,
    fullname,lat,lon,phone,name,prosfora.posotita,`date`
    FROM users,prosfora , item
    where users.id=prosfora.user 
    and item.id=prosfora.item
    and status='Ανάθεση' 
    and diasostis=$_SESSION[uid]");
    $B=[];
    while($r2=mysqli_fetch_assoc($q))
    {
        $B[]=$r2;
    }

    $A["prosfores2"]=$B;




    echo json_encode($A);

}




if($_GET['q']=="adminmap")
{

    $A=[];

    $q=mysqli_query( $conn, "SELECT * FROM diasostes " );
    $B=[];
    while($r2=mysqli_fetch_assoc($q))
    {
        $B[]=$r2;
      
    }

    $A["diasostes"]=$B;
    


    $q=mysqli_query($conn,"SELECT * FROM `admin`");
    $r=mysqli_fetch_assoc($q);
    $A["station"]=$r;

    $q=mysqli_query($conn,"SELECT aitimata.id as ida , fullname,lat,lon,
                    phone,name,arithmos_atomwn,`date` 
                    FROM `users`,aitimata, item
                    where users.id=aitimata.user and item.id=aitimata.item 
                    and status='Αναμονή'");
    $B=[];
    while($r2=mysqli_fetch_assoc($q))
    {
        $B[]=$r2;
    }

    $A["aitimata"]=$B;


    $q=mysqli_query($conn,"SELECT aitimata.id as ida ,fullname,users.lat,users.lon,
                        diasostes.lat as dlat, diasostes.lon as dlon, phone,
                        name,arithmos_atomwn,`date`
                        FROM users,aitimata, item , diasostes
                        where users.id=aitimata.user 
                        and item.id=aitimata.item
                        and status='Ανάθεση' 
                        and diasostis=diasostes.id");
    $B=[];
    while($r2=mysqli_fetch_assoc($q))
    {
        $B[]=$r2;
    }

    $A["aitimata2"]=$B;



    $q=mysqli_query($conn,"SELECT prosfora.id as idp, 
    fullname,lat,lon,phone,name,prosfora.posotita,`date`
     FROM users,prosfora , item
     where users.id=prosfora.user 
     and item.id=prosfora.item
     and status='Αναμονή'");
    $B=[];
    while($r2=mysqli_fetch_assoc($q))
    {
        $B[]=$r2;
    }

    $A["prosfores"]=$B;

    $q=mysqli_query($conn,"SELECT prosfora.id as idp,
    fullname,phone,name,prosfora.posotita,`date`,
    users.lat,users.lon,
    diasostes.lat as dlat, diasostes.lon as dlon
    FROM users,prosfora , item, diasostes
    where users.id=prosfora.user 
    and item.id=prosfora.item
    and status='Ανάθεση' 
    and diasostis=diasostes.id");
    $B=[];
    while($r2=mysqli_fetch_assoc($q))
    {
        $B[]=$r2;
    }

    $A["prosfores2"]=$B;




    echo json_encode($A);

}





if($_GET['q']=="placedias")
{

    $sql="update diasostes set lat='$_POST[lat]', lon='$_POST[lon]'
    where id=$_SESSION[uid]";

    mysqli_query($conn,$sql);
    echo "1";
}



if($_GET['q']=="placeadmin")
{

    $sql="update admin set lat='$_POST[lat]', lon='$_POST[lon]'
    where id=$_SESSION[uid]";

    mysqli_query($conn,$sql);
    echo "1";
}



if($_GET['q']=="anal1")
{

    $q1=mysqli_query($conn,"SELECT count(*)  as c from aitimata 
    where diasostis=$_SESSION[uid] and status='Ανάθεση' ");
    $c1=mysqli_fetch_assoc($q1);

    
    $q2=mysqli_query($conn,"SELECT count(*) as c  from prosfora 
     where diasostis=$_SESSION[uid] and status='Ανάθεση' ");
    $c2=mysqli_fetch_assoc($q2);

    $c=$c1['c']+$c2['c'];


    if($c<4)
    {

    mysqli_query($conn,"update aitimata 
    set status='Ανάθεση', diasostis=$_SESSION[uid] 
    where id=$_POST[ida]");


    echo 1;
    }
    else
    {
        echo 0;
    }

   

}


if($_GET['q']=="anal2")
{

    $q1=mysqli_query($conn,"SELECT count(*)  as c from aitimata 
    where diasostis=$_SESSION[uid] and status='Ανάθεση' ");
    $c1=mysqli_fetch_assoc($q1);

    
    $q2=mysqli_query($conn,"SELECT count(*) as c  from prosfora 
     where diasostis=$_SESSION[uid] and status='Ανάθεση' ");
    $c2=mysqli_fetch_assoc($q2);

    $c=$c1['c']+$c2['c'];


    if($c<4)
    {

        mysqli_query($conn,"update prosfora set status='Ανάθεση', 
        diasostis=$_SESSION[uid] where id=$_POST[idp]");

        echo 1;
    }
    else
    {
        echo 0;
    }

   

}


if($_GET['q']=="oloklirosi")
{

    mysqli_query($conn,"update aitimata set status='Ολοκλήρωση'
    where id=$_POST[idp]");
    echo 1;
   

}



if($_GET['q']=="akyrosi")
{

    mysqli_query($conn,"update aitimata set status='Αναμονή', 
            diasostis=0 where id=$_POST[idp]");
    echo 1;
   

}


if($_GET['q']=="oloklirosi2")
{

    mysqli_query($conn,"update prosfora set status='Ολοκλήρωση'
    where id=$_POST[idp]");
    echo 1;
   

}



if($_GET['q']=="akyrosi2")
{

    mysqli_query($conn,"update prosfora set status='Αναμονή', 
            diasostis=0 where id=$_POST[idp]");
    echo 1;
   

}




if($_GET['q']=="ekfortosi"){
    $q=mysqli_query($conn,"select * from prosfora where status='Ανάθεση' and diasostis=$_SESSION[uid]");
    while($r=mysqli_fetch_assoc($q))
    {
     mysqli_query($conn,"update item set posotita=posotita+$r[posotita] where id=$r[item]");

    }
         echo 1;
}


if($_GET['q']=="fortosi"){
 $q=mysqli_query($conn,"select * from aitimata where state='Ανάθεση' and diasostis=$_SESSION[ids]");
 while($r=mysqli_fetch_assoc($q))
 {
     mysqli_query($conn,"update item set posotita=posotita-$r[arithmos_atomwn] where id=$r[item]");

 }
         echo 1;
}



if($_GET['q']=="stats"){
    $q=mysqli_query($conn,"select count(*) as cn from aitimata where status='Αναμονή'");
    $r=mysqli_fetch_assoc($q);

    $A[0]=$r['cn'];

    $q=mysqli_query($conn,"select count(*) as cn from aitimata where status='Ανάθεση'");
    $r=mysqli_fetch_assoc($q);

    $A[1]=$r['cn'];

    $q=mysqli_query($conn,"select count(*) as cn from aitimata ");
    $r=mysqli_fetch_assoc($q);

    $A[2]=$r['cn'];


    $q=mysqli_query($conn,"select count(*) as cn from prosfora where status='Αναμονή'");
    $r=mysqli_fetch_assoc($q);

    $A[3]=$r['cn'];

    $q=mysqli_query($conn,"select count(*) as cn from prosfora where status='Ανάθεση'");
    $r=mysqli_fetch_assoc($q);

    $A[4]=$r['cn'];

    $q=mysqli_query($conn,"select count(*) as cn from prosfora ");
    $r=mysqli_fetch_assoc($q);

    $A[5]=$r['cn'];

    echo json_encode($A);
   }