   <div class="sidebar-menu">
            <div class="sidebar-header">
                <div class="logo">
                    <p style="color: white">LAN Digital Arts Network [Management System]</p>
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
							                           <li>
                                <a href="javascript:void(0)" aria-expanded="true"><i class="ti-folder"></i><span>Page</span></a>
                                <ul class="collapse">
                                    <li><a href="about-us.php">About Us</a></li>
                                    <li><a href="contact-us.php">Contact Us</a></li>
                                </ul>
                            </li>
								<li>
							                                <a href="javascript:void(0)" aria-expanded="true"><i class="ti-folder"></i><span>News</span></a>
                                <ul class="collapse">
                                    <li><a href="add-news.php">Add News</a></li>
                                    <li><a href="manage-news.php">Manage News</a></li>
                                </ul>
                            </li>
								<li>
							        <a href="javascript:void(0)" aria-expanded="true"><i class="ti-folder"></i><span>Event</span></a>
                                <ul class="collapse">
                                    <li><a href="add-event.php">Add Event</a></li>
                                    <li><a href="manage-event.php">Manage Event</a></li>
                                </ul>
                            </li>
                             <li>
                                <a href="javascript:void(0)" aria-expanded="true"><i class="ti-folder"></i><span>Partner</span></a>
                                <ul class="collapse">
                                    <li><a href="add-partner.php">Add Partner</a></li>
                                    <li><a href="manage-partner.php">Manage Partner</a></li>
                                </ul>
                            </li>
				 <?php if($_SESSION['lanemptype']=='1')
{ ?>			
							<li>
							                                <a href="javascript:void(0)" aria-expanded="true"><i class="ti-folder"></i><span>Employee</span></a>
                                <ul class="collapse">
                                    <li><a href="add-employee.php">Add Employee</a></li>
                                    <li><a href="manage-employee.php">Manage Employee</a></li>
                                </ul>
                            </li>
<?php }
?>			
							<li>
							        <a href="javascript:void(0)" aria-expanded="true"><i class="ti-folder"></i><span>User</span></a>
                                <ul class="collapse">
                                    <li><a href="add-user.php">Add User</a></li>
                                    <li><a href="manage-user.php">Manage User</a></li>
                                </ul>
                            </li>
														<li>
							        <a href="javascript:void(0)" aria-expanded="true"><i class="ti-folder"></i><span>Art Collection</span></a>
                                <ul class="collapse">
                                    <li><a href="add-art-collection.php">Add Art Collection</a></li>
                                    <li><a href="manage-art-collection.php">Manage Art Collection</a></li>
                                </ul>
                            </li>
																				<li>
							        <a href="javascript:void(0)" aria-expanded="true"><i class="ti-folder"></i><span>Art Bidding</span></a>
                                <ul class="collapse">
                                    <li><a href="add-art-bidding.php">Add Art Bidding</a></li>
                                    <li><a href="manage-art-bidding.php">Manage Art Bidding</a></li>
                                </ul>
                            </li>	
																								<li>
							        <a href="javascript:void(0)" aria-expanded="true"><i class="ti-folder"></i><span>Art Order</span></a>
                                <ul class="collapse">
                                    <li><a href="manage-art-order.php">Manage Art Order</a></li>
                                </ul>
                            </li> 			
																								<li>
							        <a href="javascript:void(0)" aria-expanded="true"><i class="ti-folder"></i><span>Bidding</span></a>
                                <ul class="collapse">
                                    <li><a href="manage-bidding.php">Manage Bidding</a></li>
                                </ul>
                            </li> 									<li>
							        <a href="javascript:void(0)" aria-expanded="true"><i class="ti-folder"></i><span>Ticket</span></a>
                                <ul class="collapse">
                                    <li><a href="add-ticket.php">Add Ticket</a></li>
                                    <li><a href="manage-ticket.php">Manage Ticket</a></li>
                                </ul>
                            </li>
																	<li>
							        <a href="javascript:void(0)" aria-expanded="true"><i class="ti-folder"></i><span>Ticket Type</span></a>
                                <ul class="collapse">
                                    <li><a href="add-ticket-type.php">Add Ticket Type</a></li>
                                    <li><a href="manage-ticket-type.php">Manage Ticket Type</a></li>
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