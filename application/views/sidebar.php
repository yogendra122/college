                    <section class="parallax-section dashboard-header-sec gradient-bg" data-scrollax-parent="true">
                        <div class="container">
                            <div class="dashboard-breadcrumbs breadcrumbs"><a href="Home">Home</a></div>
                            <!--Tariff Plan menu-->
                            <!-- <div   class="tfp-btn"><span>Tariff Plan : </span> <strong>Extended</strong></div> -->
                            <div class="tfp-det">
                                <p>You Are on <a href="#">Extended</a> . Use link bellow to view details or upgrade. </p>
                                <a href="#" class="tfp-det-btn color2-bg">Details</a>
                            </div>
                            <!--Tariff Plan menu end-->
                            <div class="dashboard-header_conatiner fl-wrap dashboard-header_title">
                                <h1>Welcome  : <span><?php echo $_SESSION['user_session']['user_name']  ?></span></h1>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="dashboard-header fl-wrap">
                            <div class="container">
                                <div class="dashboard-header_conatiner fl-wrap">
                                    <div class="dashboard-header-avatar">
                                        <img src="upload/<?php echo $_SESSION['user_session']['user_img']?>" alt="" onerror="this.src='upload/user_placeholder.png'">
                                        <a href="user_profile" class="color-bg edit-prof_btn"><i class="fal fa-edit"></i></a>
                                    </div>
                                    
                                    <!--  dashboard-header-stats-wrap end -->
                                    <a style="visibility: hidden;" class="add_new-dashboard"> <i class=""></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="gradient-bg-figure" style="right:-30px;top:10px;"></div>
                        <div class="gradient-bg-figure" style="left:-20px;bottom:30px;"></div>
                        <div class="circle-wrap" style="left:120px;bottom:120px;" data-scrollax="properties: { translateY: '-200px' }">
                            <div class="circle_bg-bal circle_bg-bal_small"></div>
                        </div>
                        <div class="circle-wrap" style="right:420px;bottom:-70px;" data-scrollax="properties: { translateY: '150px' }">
                            <div class="circle_bg-bal circle_bg-bal_big"></div>
                        </div>
                        <div class="circle-wrap" style="left:420px;top:-70px;" data-scrollax="properties: { translateY: '100px' }">
                            <div class="circle_bg-bal circle_bg-bal_big"></div>
                        </div>
                        <div class="circle-wrap" style="left:40%;bottom:-70px;"  >
                            <div class="circle_bg-bal circle_bg-bal_middle"></div>
                        </div>
                        <div class="circle-wrap" style="right:40%;top:-10px;"  >
                            <div class="circle_bg-bal circle_bg-bal_versmall" data-scrollax="properties: { translateY: '-350px' }"></div>
                        </div>
                        <div class="circle-wrap" style="right:55%;top:90px;"  >
                            <div class="circle_bg-bal circle_bg-bal_versmall" data-scrollax="properties: { translateY: '-350px' }"></div>
                        </div>
                    </section>


                    <!--  section  end-->
                    <!--  section  -->
                    <section class="gray-bg main-dashboard-sec" id="sec1">
                        <div class="container">
                            <!--  dashboard-menu-->
                            <div class="col-md-3">
                                <div class="mob-nav-content-btn color2-bg init-dsmen fl-wrap"><i class="fal fa-bars"></i> Dashboard menu</div>
                                <div class="clearfix"></div>
                                <div class="fixed-bar fl-wrap" id="dash_menu">
                                    <div class="user-profile-menu-wrap fl-wrap block_box">
                                        <!-- user-profile-menu-->
                                        <div class="user-profile-menu">
                                            <h3>Main</h3>
                                            <ul class="no-list-style">
                                                <!-- <li><a href="user_dashboard"><i class="fal fa-chart-line"></i>Dashboard</a></li> -->
                                                <li><a href="user_profile" class="user-profile-act"><i class="fal fa-user-edit"></i> Edit profile</a></li>
                                                <li><a href="userChangePassword"><i class="fal fa-key"></i>Change Password</a></li>
                                               
                                            </ul>
                                        </div>
                                        
                                        <button class="logout_btn color2-bg"><a href="user_logout">Log Out</a> <i class="fas fa-sign-out"></i></button>
                                    </div>
                                </div>
                                <!-- <a class="back-tofilters color2-bg custom-scroll-link fl-wrap" href="#dash_menu">Back to Menu<i class="fas fa-caret-up"></i></a> -->
                                <div class="clearfix"></div>
                            </div>