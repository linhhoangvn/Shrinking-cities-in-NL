   <div class="sidebar-menu">
            <div class="sidebar-header">
                <div class="logo">
                    <p style="color: white">LAN Digital Arts Network<br> [User Control Panel]</p>
                </div>
            </div>
            <div class="main-menu">
                <div class="menu-inner">
                    <nav>
                        <ul class="metismenu" id="menu">
                            <li>
                                <a href="/lan/index.php" aria-expanded="true"><i class="fa fa-home"></i><span>Home</span></a>
                               
                            </li>

                            <li>
                                <a href="dashboard.php" aria-expanded="true"><i class="ti-dashboard"></i><span>Dashboard</span></a>
                               
                            </li>
				 <?php if($_SESSION['lanusertype']=='1')
{ ?>			
														<li>
							        <a href="javascript:void(0)" aria-expanded="true"><i class="ti-folder"></i><span>Art Collection</span></a>
                                <ul class="collapse">
                                    <li><a href="add-art-collection.php">Add Art Collection</a></li>
                                    <li><a href="manage-art-collection.php">Manage Art Collection</a></li>
                                </ul>
                            </li>
<?php }
?>		
																				<li>
							        <a href="javascript:void(0)" aria-expanded="true"><i class="ti-folder"></i><span>Art Bidding</span></a>
                                <ul class="collapse">
                                    <li><a href="add-art-bidding.php">Add Art Bidding</a></li>
                                    <li><a href="manage-art-bidding.php">Manage Art Bidding</a></li>
                                </ul>
                            </li>	
																															<li>
							        <a href="javascript:void(0)" aria-expanded="true"><i class="ti-folder"></i><span>Bidding</span></a>
                                <ul class="collapse">
                                    <li><a href="manage-bidding.php">Manage Bidding</a></li>
                                </ul>
                            </li> 		

	
																							<li>
							        <a href="javascript:void(0)" aria-expanded="true"><i class="ti-folder"></i><span>Art Order</span></a>
                                <ul class="collapse">
                                    <li><a href="manage-art-order.php">Manage Art Order</a></li>
                                </ul>
                            </li> 							

																								<li>
							        <a href="javascript:void(0)" aria-expanded="true"><i class="ti-folder"></i><span>Ticket Order</span></a>
                                <ul class="collapse">
                                    <li><a href="manage-ticket-order.php">Manage Ticket Order</a></li>
                                </ul>
                            </li>                           
                        </ul>
                    </nav>
                </div>
            </div>
        </div>