
<style>
 #vpp{
    text-align: center;

    /* animation: moveRightLeft 2s infinite; */
    /* animation: shake 0.5s infinite; */
    border-right:1px solid rgb(53 80 121 / 25%);


 }
 #vpp:nth-child(6n) {
    /* thay đổi 6 phần tử ko gạch cái cuối */
  border-right: none;
}
 #vpp img {
  transition: transform 0.3s;
}
#vpp a{
    color:#593e3e;
}
#vpp :hover a{
    text-decoration: none;
}
#vpp strong:hover {
  color: #b74646;
}
 #vpp:hover img{
    transform: rotate(45deg);
 }

 .icon-title {
    content: "";
    width: 257px;
    height: 57px;
    display: block;
    margin: auto;
}


</style>

</head>


<body>
    <!-- <hr style="color: #af5b63;"> -->
        <div class="container">
            <div class="row "  style="align-items: center;margin-top:20px">

                <div class="col-1"></div>

                <div class="col-2" id="vpp">
                   <a href="../Source/menu_add/menu_student.php"> <img src="../Assets/img/index/cate_1.webp" alt="">
                   <div class="py-3"><strong>STUDENT STATIONERY</strong></a></div>
                </div>




                <div class="col-2" id="vpp">
                    <a href="../Source/menu_add/menu_office.php"><img src="../Assets/img/index/cate_2.webp" alt="">
                    <div class="py-3"><strong> OFFICE STATIONERY</strong></a></div>
                </div>


                <div class="col-2" id="vpp" style="margin-top:6px">
                    <a href="../Source/menu_add/menu_accsessory.php"><img src="../Assets/img/index/cate_3.webp" alt="">
                    <div class="py-3"><strong> STATIONERY ACCESSORY </strong></a></div>
                </div>



                <div class="col-2" id="vpp">
                  <a href="../Source/menu_add/menu_bag.php">  <img src="../Assets/img/index/cate_4.webp" alt="">
                    <div class="py-3"><strong>BACKPACK-BOOK BAG</strong></a></div>
                </div>

                <div class="col-2" id="vpp">
                  <a href="../Source/menu_add/menu_equipment.php">  <img src="../Assets/img/index/cate_5.webp" alt="">
                    <div class="py-3"><strong>OFFICE EQUIPMENT</strong></a></div>
                </div>

                <div class="col-1"></div>
                
                <div class="icon-title"><img src="../Assets/img/index/icon_after_title.webp" alt=""></div>
            </div>
        </div>




        

       


