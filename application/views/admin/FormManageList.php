<?php
include('header.php');
?>

<style>
    body {
        margin: 0;
        padding: 0;
        background-color: #f1f1f1;
    }

    .box {
        width: 1100px;
        padding: 20px;
        background-color: #fff;
        border: 1px solid #ccc;
        border-radius: 5px;
        margin-top: 10px;
    }
</style>
<!--== BODY CONTNAINER ==-->
<div class="container-fluid sb2">
    <div class="row">

        <!--== BODY INNER CONTAINER ==-->
        <div class="sb2-2">
            <!--== breadcrumbs ==-->
            <div class="sb2-2-2">
                <ul>
                    <li><a href="index-1.html"><i class="fa fa-home" aria-hidden="true"></i> Home</a> </li>
                    <li class="active-bre"><a href="#"> Manage Form</a> </li>

                </ul>
            </div>
            <div class="tz-2 tz-2-admin">
                <div class="tz-2-com tz-2-main">
                    <h4> Manage Form</h4>

                    <div class="container box">
                        <h3 align="center"></h3><br />

                        <!-- <table id="" class="display" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>Form Name</th>
                                    <th>category</th>
                                    <th>Action</th>

                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">Enquiry Form</th>
                                    <td>University Enquiry Form</td>
                                </tr>
                                <tr>
                                    <th scope="row">Enquiry Form</th>
                                    <td>Accomdation Enquiry Form</td>
                                </tr>
                                <tr>
                                    <th scope="row">Enquiry Form</th>
                                    <td>Tourism Enquiry Form</td>
                                </tr>
                            </tbody>

                        </table> -->
                        <!DOCTYPE html>
                        <html>

                        <head>
                            <style>
                                #customers {
                                    font-family: Arial, Helvetica, sans-serif;
                                    border-collapse: collapse;
                                    width: 100%;
                                }

                                #customers td,
                                #customers th {
                                    border: 1px solid #ddd;
                                    padding: 8px;
                                }

                                #customers tr:nth-child(even) {
                                    background-color: #f2f2f2;
                                }

                                #customers tr:hover {
                                    background-color: #ddd;
                                }

                                #customers th {
                                    padding-top: 12px;
                                    padding-bottom: 12px;
                                    text-align: left;
                                    background-color: #253d52;
                                    color: white;
                                }
                            </style>
                        </head>

                        <body>

                            <table id="customers">
                                <tr>
                                    <th>Form Name</th>
                                    <th>category</th>
                                    <th>Action</th>
                                </tr>
                                <tr>

                                    <td>Enquiry Form</td>
                                    <td>Education Enquiry Form</td>
                                    <td><a type="button"  href="EditMange_form?id=2" ><button type="button" class="btn btn-primary">Manage Field</button></a></td>

                                </tr>
                                <tr>
                                    <td>Enquiry Form</td>

                                    <td>Accomdation Enquiry Form</td>
                                    <td><a type="button"  href="EditMange_form?id=3" ><button type="button" class="btn btn-primary">Manage Field</button></a></td>
                                </tr>
                                <tr>
                                    <td>Enquiry Form</td>
                                    <td>Tourism Enquiry Form</td>
                                    <td><a type="button"  href="EditMange_form?id=6" ><button type="button" class="btn btn-primary">Manage Field</button></a></td>

                                </tr>

                            </table>

                        </body>

                        </html>


                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
</div>
<!--== BOTTOM FLOAT ICON ==-->


<?php
include 'footer.php';
?>